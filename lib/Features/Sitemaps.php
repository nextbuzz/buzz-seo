<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class Sitemaps extends BaseFeature
{

    public function name()
    {
        return __("Sitemaps", "buzz-seo");
    }

    public function desc()
    {
        return __("Automatic generation of XML sitemaps.", "buzz-seo");
    }

    public function init()
    {
        add_action('init', array($this, 'setupRewriteRule'), 1);
        add_action('admin_menu', array($this, 'createAdminMenu'));
        add_action('pre_get_posts', array($this, 'checkRenderSitemap'), 1);
        add_filter('redirect_canonical', array($this, 'noXMLTrailingSlash'));
    }

    /**
     * Add the administrator submenu
     */
    public function createAdminMenu()
    {
        // Add Settings Sub Option Page
        add_submenu_page('BuzzSEO', __('XML Sitemaps', 'buzz-seo'), __('XML Sitemaps', 'buzz-seo'), 'edit_posts', 'XMLSitemaps', array($this, "addAdminUI"));
    }

    /**
     * Create the admin interface pages.
     */
    public function addAdminUI()
    {
        \NextBuzz\SEO\PHPTAL\Settings\Sitemaps::factory()->render();
    }

    public function setupRewriteRule()
    {
        global $wp;

        $wp->add_query_var('buzz_sitemap');
        $wp->add_query_var('buzz_sitemap_page');

        add_rewrite_rule('sitemap\.xml$', 'index.php?buzz_sitemap=1', 'top');
        add_rewrite_rule('sitemap-([^/]+?)-?([0-9]+)?\.xml$', 'index.php?buzz_sitemap=$matches[1]&buzz_sitemap_page=$matches[2]', 'top');
    }

    /**
     * Render the xml output if requested.
     * 
     * Note: currently priorities and change frequencies are added like this:
     * - frontpage:  1.0, daily
     * - homepage:   1.0, daily
     * - posts:      0.8, monthly
     * - pages:      0.8, monthly
     * - archives:   0.8, weekly
     * - taxonomies: 0.6, weekly (at least 10 posts)
     *               0.4, weekly (at least 3 posts)
     *               0.2, weekly (lower number of posts)
     * - author      0.8, weekly
     */
    public function checkRenderSitemap($query)
    {
        // If not the main query, we don't need to check if output is requested
        if (!$query->is_main_query()) {
            return;
        }

        // Detect if we are requesting a sitemap xml page
        $type = get_query_var('buzz_sitemap');

        if (empty($type)) {
            return;
        }

        // Set some headers
        if (!headers_sent()) {
            header($this->getHTTPProtocol() . ' 200 OK', true, 200);
            // Prevent indexing the sitemaps
            header('X-Robots-Tag: noindex, follow', true);
            header('Content-Type: text/xml');
        }

        // Get the page number
        $page = intval(get_query_var('buzz_sitemap_page'));
        if ($page === 0) {
            $page = 1;
        }

        // Get sitemap data and set some default options
        $options = get_option('_settingsSettingsXML', array(
            'itemsperpage' => 250
        ));
        $itemsperpage = $options['itemsperpage'];

        $talData = array();
        $baseurl = home_url('/');
        if ($type === "1") {
            // Build the sitemapindex
            // Get all data
            foreach ($options['posttypes'] as $posttype => $value)
            {
                // Get pagination count for post type (and just return ids, since we just want a count)
                $numposts = count(get_posts(array(
                    'post_type' => $posttype,
                    'posts_per_page' => -1,
                    'cache_results' => false,
                    'fields' => 'ids'
                )));
                $pages = ceil($numposts / $itemsperpage);
                for ($p = 1; $p <= $pages; $p++)
                {
                    $talData[] = array(
                        'loc' => $baseurl . 'sitemap-' . $posttype . '-' . $p . '.xml',
                        'lastmod' => $this->getLastModifiedDate($posttype, $p, $itemsperpage),
                    );
                }
            }
            foreach ($options['taxonomies'] as $taxonomy => $value)
            {
                // Get taxonomies
                $numposts = wp_count_terms($taxonomy, array('hide_empty' => true));
                $pages = ceil($numposts / $itemsperpage);
                for ($p = 1; $p <= $pages; $p++)
                {
                    $talData[] = array(
                        'loc' => $baseurl . 'sitemap-' . $taxonomy . '-' . $p . '.xml',
                        'lastmod' => $this->getLastModifiedDateTax($taxonomy, $p, $itemsperpage),
                    );
                }
            }

            // Add author map
            if ($options['includeauthor']) {
                $users = get_users(array('who' => 'authors'));
                $users = wp_list_pluck($users, 'ID');
                
                $numusers = count($users);
                $pages = ceil($numusers / $itemsperpage);
                for ($p = 1; $p <= $pages; $p++)
                {
                    $talData[] = array(
                        'loc' => $baseurl . 'sitemap-author-' . $p . '.xml',
                        'lastmod' => '',
                    );
                }
            }

            // Render
            \NextBuzz\SEO\PHPTAL\XML::factory('XMLSitemapIndex')
                ->setTalData('sitemaps', $talData)
                ->render();
        } else if ($options['includeauthor'] && $type === 'author') {
            // Build author map
            // Get all data
            $users = get_users(array('who' => 'authors'));
            $users = array_splice($users, (($page - 1) * $itemsperpage), $itemsperpage);
            foreach ($users as $user)
            {
                $latestPost = get_posts(array(
                    'posts_per_page' => '1',
                    'author' => $user->ID,
                    'orderby' => 'modified',
                    'order' => 'DESC'
                ));

                $modified = is_array($latestPost) && isset($latestPost[0]) ? $latestPost[0]->post_modified_gmt : $user->user_registered;
                $talData[] = array(
                    'loc' => get_author_posts_url($user->ID),
                    'lastmod' => \NextBuzz\SEO\Date\Timezone::dateFromTimestamp($modified),
                    'changefreq' => 'weekly',
                    'priority' => 0.8,
                );
            }
            
            // Render
            \NextBuzz\SEO\PHPTAL\XML::factory('XMLSitemap')
                ->setTalData('urls', $talData)
                ->render();
        } else {
            // Build the sitemap
            // Get all data
            $postTypes = get_post_types();
            if (in_array($type, $postTypes)) {
                // Get post type posts
                $posts = get_posts(array(
                    'post_type' => $type,
                    'posts_per_page' => $itemsperpage,
                    'paged' => $page,
                    'orderby' => 'modified',
                    'order' => 'DESC'
                ));

                $frontId = intval(get_option('page_on_front', -1));
                $blogId = intval(get_option('page_for_posts', -1));

                foreach ($posts as $post)
                {
                    $talData[] = array(
                        'loc' => get_permalink($post->ID),
                        'lastmod' => \NextBuzz\SEO\Date\Timezone::dateFromTimestamp($post->post_modified_gmt),
                        'changefreq' => ($post->ID === $frontId || $post->ID === $blogId) ? 'daily' : 'monthly',
                        'priority' => ($post->ID === $frontId || $post->ID === $blogId) ? 1.0 : 0.8,
                    );
                }
            } else {
                // Get taxonomy posts
                $terms = get_terms($type);
                $terms = array_splice($terms, (($page - 1) * $itemsperpage), $itemsperpage);
                foreach ($terms as $term)
                {
                    $priority = 0.2;
                    if ($term->count >= 3) {
                        $priority = 0.4;
                    }
                    if ($term->count >= 10) {
                        $priority = 0.6;
                    }
                    $talData[] = array(
                        'loc' => get_term_link($term->term_id),
                        'lastmod' => $this->getLastModifiedDateTerm($type, $term->term_id),
                        'changefreq' => 'weekly',
                        'priority' => $priority,
                    );
                }
            }

            // Render
            \NextBuzz\SEO\PHPTAL\XML::factory('XMLSitemap')
                ->setTalData('urls', $talData)
                ->render();
        }


        // Make sure WordPress does not output any footer content
        remove_all_actions('wp_footer');
        exit();
    }

    /**
     * Get the output protocol. Defaults to HTTP/1.1 if none found
     * 
     * @return string
     */
    private function getHTTPProtocol()
    {
        return (isset($_SERVER['SERVER_PROTOCOL']) && $_SERVER['SERVER_PROTOCOL'] !== '') ? sanitize_text_field($_SERVER['SERVER_PROTOCOL']) : 'HTTP/1.1';
    }

    /**
     * Hook into redirect_canonical to stop trailing slashes on sitemap.xml URLs
     *
     * @param string $redirect The redirect URL currently determined.
     * @return bool|string $redirect
     */
    public function noXMLTrailingSlash($redirect)
    {
        $sitemap = get_query_var('buzz_sitemap');
        if (!empty($sitemap)) {
            return false;
        }

        return $redirect;
    }

    /**
     * Retrieve the last modified date of a posttype
     * 
     * @global type $wpdb
     * @param string $posttype
     * @param int $page
     * @param int $itemsperpage
     * @return string
     */
    private function getLastModifiedDate($posttype, $page, $itemsperpage)
    {
        global $wpdb;

        $results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT post_modified_gmt AS date FROM "
                . "$wpdb->posts WHERE post_status IN ('publish','inherit') "
                . "AND post_type=%s "
                . "ORDER BY post_modified_gmt DESC LIMIT %d, %d", $posttype, ($itemsperpage * ($page - 1)), $itemsperpage
            )
        );
        if (is_array($results) && isset($results[0])) {
            return \NextBuzz\SEO\Date\Timezone::dateFromTimestamp($results[0]->date);
        }

        return null;
    }

    /**
     * Retrieve the last modified date of a taxonomy
     * 
     * @global type $wpdb
     * @param string $taxonomy
     * @param int $page
     * @param int $itemsperpage
     * @return string
     */
    private function getLastModifiedDateTax($taxonomy, $page, $itemsperpage)
    {
        $terms = get_terms($taxonomy);

        $termids = array();
        foreach ($terms as $term)
        {
            $termids[] = intval($term->term_id);
        }

        $results = get_posts(
            array(
                'posts_per_page' => 1,
                'orderby' => 'modified',
                'order' => 'DESC',
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field' => 'term_id',
                        'operator' => 'IN',
                        'terms' => $termids
                    )
                )
            )
        );

        if (is_array($results) && isset($results[0])) {
            return \NextBuzz\SEO\Date\Timezone::dateFromTimestamp($results[0]->post_modified_gmt);
        }

        return null;
    }

    /**
     * Retrieve the last modified date of a term
     * 
     * @global type $wpdb
     * @param string $taxonomy
     * @param int $termId
     * @return string
     */
    private function getLastModifiedDateTerm($taxonomy, $termId)
    {
        $terms = get_terms($taxonomy);

        $termids = array();
        foreach ($terms as $term)
        {
            $termids[] = intval($term->term_id);
        }

        $results = get_posts(array(
            'posts_per_page' => 1,
            'orderby' => 'modified',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'id',
                    'terms' => $termId,
                    'include_children' => false
                )
            )
        ));

        if (is_array($results) && isset($results[0])) {
            return \NextBuzz\SEO\Date\Timezone::dateFromTimestamp($results[0]->post_modified_gmt);
        }

        return null;
    }

}
