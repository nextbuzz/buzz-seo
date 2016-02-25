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
        return __("Cleanup HTML header", 'buzz-seo');
    }

    public function desc()
    {
        return __("Removes WordPress junk from the HTML header to speed up page loading.", 'buzz-seo');
    }

    public function init()
    {
        // Remove the links to the extra feeds such as category feeds
        remove_action('wp_head', 'feed_links_extra', 3);

        // Remove the links to the general feeds: Post and Comment Feed
        remove_action('wp_head', 'feed_links', 2);

        // Remove the link to the Really Simple Discovery service endpoint, EditURI link
        remove_action('wp_head', 'rsd_link');

        // Remove the link to the Windows Live Writer manifest file.
        remove_action('wp_head', 'wlwmanifest_link');

        // Remove the index link
        remove_action('wp_head', 'index_rel_link');

        // Remove prev link
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);

        // Remove start link
        remove_action('wp_head', 'start_post_rel_link', 10, 0);

        // Remove relational links for the posts adjacent to the current post.
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

        // Remove the WP version
        remove_action('wp_head', 'wp_generator');

        // Remove WP Emoij
        add_action('init', array($this, 'disableWPEmoij'));
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
