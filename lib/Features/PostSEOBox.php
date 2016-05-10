<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class PostSEOBox extends BaseFeature
{

    public function name()
    {
        return __("SEO Box", 'buzz-seo');
    }

    public function desc()
    {
        return __("Add an optimization SEO box for each post.", 'buzz-seo');
    }

    private $postMeta;

    public function init()
    {
        add_action('admin_init', array($this, 'initBack'));

        // Filter title
        add_filter('document_title_parts', array($this, 'filterTitleParts'), 15);

        add_action('wp_head', array($this, 'addMetaDescription'), 1);
        add_action('wp_head', array($this, 'addRobots'), 1);

        // Add canonical
        remove_action('wp_head', 'rel_canonical');
        add_action('wp_head', array($this, 'addCanonical'), 1);

        // Add facebook opengraph data
        add_action('wp_head', array($this, 'addOpenGraphTwitter'), 1);

        // Remove wordpress its do not cache this page option since we take care of this ourselves
        remove_action('wp_head', 'noindex', 1);
    }

    public function allowDisable()
    {
        return false;
    }

    /**
     * Initialize everything that is only needed in backend
     *
     * @return void
     */
    public function initBack()
    {
        // Load SEO box for all Single pages
        new \NextBuzz\SEO\PHPTAL\MetaBox('PostSEOBox', __('Search Engine Optimization (SEO)', 'buzz-seo'));
    }

    /**
     * Change the 'title' part of the title array
     *
     * @param array $title All parts of the title IE. title/page/tagline/site
     *
     * @return array
     */
    public function filterTitleParts($title)
    {
        $postMeta = $this->getPostMeta();

        if (!empty($postMeta['pageTitle'])) {
            $title['title'] = $postMeta['pageTitle'];
        }

        return $title;
    }

    private function getPostMeta()
    {
        if ($this->postMeta === null) {
            $this->postMeta = get_post_meta(get_the_ID(), '_metaboxPostSEOBox', true);
        }

        return $this->postMeta;
    }

    public function addMetaDescription()
    {
        if (is_singular()) {
            // Add singular description

            $postMeta = $this->getPostMeta();
            if (is_array($postMeta) && isset($postMeta['metaDescription']) && is_string($postMeta['metaDescription']) && $postMeta['metaDescription'] !== '') {
                echo '<meta name="description" content="' . esc_attr(strip_tags(stripslashes($postMeta['metaDescription']))) . '" />' . "\n";
            }
        } else {
            // Add archive descriptions
            $options = get_option('_settingsSettingsGeneral', true);
            $content = '';
            $translate = \NextBuzz\SEO\Translate\Translate::factory();
            if (is_category()) {
                $content = @trim($translate->translate($options['taxonomies']['category']['meta']));
            } else
            if (is_tag()) {
                $content = @trim($translate->translate($options['taxonomies']['post_tag']['meta']));
            } else
            if (is_date()) {
                $content = @trim($translate->translate($options['archives']['date']['meta']));
            } else
            if (is_author()) {
                $content = @trim($translate->translate($options['archives']['author']['meta']));
            } else
            if (is_tax()) {
                $tax     = get_queried_object();
                if (isset($options['taxonomies'][$tax->taxonomy])) {
                    $content = @trim($translate->translate($options['taxonomies'][$tax->taxonomy]['meta']));
                }
            } else {
                $posttype = get_post_type();
                if (isset($options['posttypes'][$posttype])) {
                    $content  = @trim($translate->translate($options['posttypes'][$posttype]['meta']));
                }
            }

            if (!empty($content)) {
                echo '<meta name="description" content="' . esc_attr(strip_tags(stripslashes($content))) . '" />' . "\n";
            }
        }
    }

    public function addRobots()
    {
        // Check if WordPress is set as do not index in options, if so override our settings
        if ('0' === get_option('blog_public')) {
            echo '<meta name="robots" content="noindex,nofollow" />' . "\n";
            return;
        }

        $robotsarr = null;
        $robotsstr = null;
        if (is_singular()) {
            // Add singular robots
            $postMeta  = $this->getPostMeta();
            if (isset($postMeta['robots'])) {
                $robotsarr = $postMeta['robots'];
            }
        } else {
            // Add archive robots

            $options = get_option('_settingsSettingsGeneral', true);
            if (is_category()) {
                $robotsarr = isset($options['taxonomies']['category']['robots']) ? $options['taxonomies']['category']['robots'] : '';
            } else
            if (is_tag()) {
                $robotsarr = isset($options['taxonomies']['post_tag']['robots']) ? $options['taxonomies']['post_tag']['robots'] : '';
            } else
            if (is_date()) {
                $robotsarr = isset($options['archives']['date']['robots']) ? $options['archives']['date']['robots'] : '';
            } else
            if (is_author()) {
                $robotsarr = isset($options['archives']['author']['robots']) ? $options['archives']['author']['robots'] : '';
            } else
            if (is_tax()) {
                $tax       = get_queried_object();
                $robotsarr = isset($options['taxonomies'][$tax->taxonomy]['robots']) ? $options['taxonomies'][$tax->taxonomy]['robots'] : '';
            } else {
                $posttype  = get_post_type();
                $robotsarr = isset($options['posttypes'][$posttype]['robots']) ? $options['posttypes'][$posttype]['robots'] : '';
            }
        }

        if (isset($robotsarr) && is_array($robotsarr)) {
            $robotsstr = implode(",", $robotsarr);
        }

        if (isset($robotsstr) && is_string($robotsstr) && $robotsstr !== '') {
            echo '<meta name="robots" content="' . esc_attr($robotsstr) . '" />' . "\n";
        }
    }

    /**
     * Add canonical url
     *
     * Based on wordpress its own rel_canonical function
     * With the added functionality we can override it through the PostSEOBox admin interface.
     *
     * @return void
     */
    public function addCanonical()
    {
        if (!is_singular()) {
            return;
        }

        if (!$id = get_queried_object_id()) {
            return;
        }

        // Get the base url
        $postMeta = $this->getPostMeta();
        if (is_array($postMeta) && isset($postMeta['canonical']) && !empty($postMeta['canonical'])) {
            $url = $postMeta['canonical'];
        } else {
            $url = get_permalink($id);
        }

        // Add pagination to url if any
        $page = get_query_var('page');
        if ($page >= 2) {
            if ('' == get_option('permalink_structure')) {
                $url = add_query_arg('page', $page, $url);
            } else {
                $url = trailingslashit($url) . user_trailingslashit($page, 'single_paged');
            }
        }

        echo '<link rel="canonical" href="' . esc_url($url) . "\" />\n";
    }

    public function addOpenGraphTwitter()
    {
        $postMeta = $this->getPostMeta();

        $hasFacebook = false;
        $hasTwitter  = false;

        if (isset($postMeta['fbTitle']) && $postMeta['fbTitle'] !== "") {
            $hasFacebook = true;
            echo '<meta property="og:title" content="' . esc_attr($postMeta['fbTitle']) . '" />' . "\n";
        }
        if (isset($postMeta['fbDescription']) && $postMeta['fbDescription'] !== "") {
            $hasFacebook = true;
            echo '<meta property="og:description" content="' . esc_attr($postMeta['fbDescription']) . '" />' . "\n";
        }

        if (isset($postMeta['fbMediaId']) && intval($postMeta['fbMediaId']) !== 0) {
            $hasFacebook = true;
            $image       = wp_get_attachment_url(intval($postMeta['fbMediaId']));
            if ($image) {
                echo '<meta property="og:image" content="' . esc_url($image) . '" />' . "\n";
            }
        }

        if ($hasFacebook) {
            $pub = get_the_date('c');
            $mod = get_the_modified_date('c');
            echo '<meta property="og:locale" content="' . esc_attr(get_locale()) . '" />' . "\n";
            echo '<meta property="og:type" content="article" />' . "\n";
            echo '<meta property="og:url" content="' . esc_url(get_permalink(get_the_ID())) . '" />' . "\n";
            echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '" />' . "\n";
            echo '<meta property="article:published_time" content="' . esc_attr($pub) . '" />' . "\n";
            echo '<meta property="article:modified_time" content="' . esc_attr($mod) . '" />' . "\n";
            echo '<meta property="og:updated_time" content="' . esc_attr($mod) . '" />' . "\n";
        }


        if (isset($postMeta['twTitle']) && $postMeta['twTitle'] !== "") {
            $hasTwitter = true;
            echo '<meta property="tw:title" content="' . esc_attr($postMeta['twTitle']) . '" />' . "\n";
        }
        if (isset($postMeta['twDescription']) && $postMeta['twDescription'] !== "") {
            $hasTwitter = true;
            echo '<meta property="tw:description" content="' . esc_attr($postMeta['twDescription']) . '" />' . "\n";
        }

        if (isset($postMeta['twMediaId']) && intval($postMeta['twMediaId']) !== 0) {
            $hasTwitter = true;
            $image      = wp_get_attachment_url(intval($postMeta['twMediaId']));
            if ($image) {
                echo '<meta property="tw:image" content="' . esc_url($image) . '" />' . "\n";
            }
        }

        if ($hasTwitter) {
            echo '<meta property="tw:card" content="summary" />' . "\n";
        }
    }

}
