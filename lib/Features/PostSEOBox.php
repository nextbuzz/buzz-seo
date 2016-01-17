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
        $postMeta = $this->getPostMeta();

        if (is_string($postMeta['metaDescription']) && $postMeta['metaDescription'] !== '') {
            echo '<meta name="description" content="' . esc_attr(strip_tags(stripslashes($postMeta['metaDescription']))) . '" />' . "\n";
        }
    }

    public function addRobots()
    {
        $postMeta = $this->getPostMeta();

        if (isset($postMeta['robots']) && is_array($postMeta['robots'])) {
            $robotsstr = implode(",", $postMeta['robots']);
        }

        // Check if WordPress is set as do not index in options, if so override our settings
        if ('0' === get_option('blog_public')) {
            echo '<meta name="robots" content="noindex,nofollow" />' . "\n";
        } else
        if (isset($robotsstr) && is_string($robotsstr) && $robotsstr !== '') {
            echo '<meta name="robots" content="' . esc_attr($robotsstr) . '" />' . "\n";
        }
    }

    public function addOpenGraphTwitter()
    {
        $postMeta = $this->getPostMeta();

        $hasFacebook = false;
        $hasTwitter = false;

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
            $image = wp_get_attachment_url(intval($postMeta['fbMediaId']));
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
            $image = wp_get_attachment_url(intval($postMeta['twMediaId']));
            if ($image) {
                echo '<meta property="tw:image" content="' . esc_url($image) . '" />' . "\n";
            }
        }

        if ($hasTwitter) {
            echo '<meta property="tw:card" content="summary" />' . "\n";
        }

    }

}
