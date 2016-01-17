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
        
        add_rewrite_rule( 'sitemap\.xml$', 'index.php?buzz_sitemap=1', 'top' );
        add_rewrite_rule('sitemap-([^/]+?)-?([0-9]+)?\.xml$', 'index.php?buzz_sitemap=$matches[1]&buzz_sitemap_page=$matches[2]', 'top');
    }

    /**
     * Render the xml output if requested.
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
        if ($page === 0 ) {
            $page = 1;
        }
        
        if ($type === "1") {
            // Build the sitemapindex
            \NextBuzz\SEO\PHPTAL\XML::factory('XMLSitemapIndex')->render();
        } else {
            // Build the sitemap
            \NextBuzz\SEO\PHPTAL\XML::factory('XMLSitemap')->render();
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

}
