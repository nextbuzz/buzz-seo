<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class CleanupHead extends BaseFeature
{

    public function name()
    {
        return __("Cleanup HTML", 'buzz-seo');
    }

    public function desc()
    {
        return __("Removes WordPress junk from the HTML to speed up page loading.", 'buzz-seo');
    }

    public function init()
    {
        add_action('admin_menu', array($this, 'createAdminMenu'));

        $options = get_option('_settingsSettingsCleanup', true);

        // Nothing checked, so do nothing
        if (!is_array($options)) {
            return;
        }

        // Removes the shortlink
        if (isset($options['shortlink'])) {
            remove_action('wp_head', 'wp_shortlink_wp_head');
        }

        // Remove the links to the extra feeds such as category feeds
        if (isset($options['extrafeeds'])) {
            remove_action('wp_head', 'feed_links_extra', 3);
        }

        // Remove the links to the general feeds: Post and Comment Feed
        if (isset($options['feeds'])) {
            remove_action('wp_head', 'feed_links', 2);
        }

        // Remove the link to the Really Simple Discovery service endpoint, EditURI link
        if (isset($options['rsd'])) {
            remove_action('wp_head', 'rsd_link');
        }

        // Remove the link to the Windows Live Writer manifest file.
        if (isset($options['wlw'])) {
            remove_action('wp_head', 'wlwmanifest_link');
        }

        // Remove relational links for the posts adjacent to the current post.
        if (isset($options['rel'])) {
            remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        }

        // Remove the WP version
        if (isset($options['wpver'])) {
            remove_action('wp_head', 'wp_generator');
        }

        // Remove WP Emoij
        if (isset($options['emoji'])) {
            add_action('init', array($this, 'disableWPEmoij'));
        }
    }

    /**
     * Add the administrator submenu
     */
    public function createAdminMenu()
    {
        // Add Settings Sub Option Page
        add_submenu_page('BuzzSEO', __('Cleanup HTML', 'buzz-seo'), __('Cleanup HTML', 'buzz-seo'), 'buzz_seo_settings_cleanup', 'BuzzSEO_CleanupHead', array($this, "addAdminUI"));
    }

    /**
     * Create the admin interface pages.
     */
    public function addAdminUI()
    {
        \NextBuzz\SEO\PHPTAL\Settings\CleanupHead::factory()->render();
    }

    public function disableWPEmoij()
    {

        // all actions related to emojis
        remove_action('admin_print_styles', 'print_emoji_styles');
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('admin_print_scripts', 'print_emoji_detection_script');
        remove_action('wp_print_styles', 'print_emoji_styles');
        remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
        remove_filter('the_content_feed', 'wp_staticize_emoji');
        remove_filter('comment_text_rss', 'wp_staticize_emoji');

        // filter to remove TinyMCE emojis
        add_filter('tiny_mce_plugins', array($this, 'disableEmoijTinymce'));
    }

    public function disableEmoijTinymce($plugins)
    {
        if (is_array($plugins)) {
            return array_diff($plugins, array('wpemoji'));
        } else {
            return array();
        }
    }

}
