<?php

namespace NextBuzz\SEO\Features;

/**
 * Description of Admin
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 */
class Admin extends BaseFeature
{

    public function name()
    {
        return __("Admin Core", "buzz-seo");
    }

    public function desc()
    {
        return __("Admin Core of Buzz SEO.", "buzz-seo");
    }

    public function init()
    {
        // Front end actions
        add_filter('document_title_parts', array($this, 'filterTitleParts'), 15);
        add_filter('document_title_separator', array($this, 'filterTitleSeparator'), 15);

        // Everything below this is only used when in the admin interface
        if (!is_admin()) {
            return;
        }

        add_action('admin_enqueue_scripts', array($this, 'enqueueAdminScripts'));

        add_action('admin_menu', array($this, 'createAdminMenu'));

        add_action('custom_menu_order', array($this, 'changeSubmenuOrder'));
    }

    public function allowDisable()
    {
        return false;
    }

    /**
     * Enqueue admin scripts and styles
     */
    public function enqueueAdminScripts()
    {
        wp_enqueue_style('buzz-seo-admin', plugins_url('buzz-seo/css/admin.css'), false, BUZZSEO_VERSION);

        // All required for media upload
        wp_enqueue_media();

        wp_enqueue_script('buzz-seo-admin-js', plugins_url('buzz-seo/js/admin.js'), array('jquery', 'thickbox', 'media-upload'), BUZZSEO_VERSION, true);
        wp_localize_script('buzz-seo-admin-js', 'BuzzSEOAdmin', array(
            'MediaUploader' => array(
                'title'  => __('Select an image', 'buzz-seo'),
                'button' => __('Select', 'buzz-seo'),
            )
        ));
    }

    /**
     * Create Admin Menu
     */
    public function createAdminMenu()
    {
        global $submenu;

        // Add Menu Page
        add_menu_page('Buzz SEO', 'Buzz SEO', 'edit_posts', 'BuzzSEO', array($this, "addAdminUI"), 'dashicons-analytics');

        // Make sure this submenu is only visiable for admin users.
        if (current_user_can('manage_options')) {
            // Add Settings Sub Option Page
            add_submenu_page('BuzzSEO', __('Settings', 'buzz-seo'), __('Settings', 'buzz-seo'), 'edit_dashboard', 'BuzzSEO_Settings', array($this, "addAdminUI"));

            // Rename Submenu
            $submenu['BuzzSEO'][0][0] = __('General', 'buzz-seo');
        }
    }

    public function changeSubmenuOrder($menu_ord)
    {
        global $submenu;

        // Make sure settings is always last if it exists
        if (isset($submenu['BuzzSEO'][1][2]) && $submenu['BuzzSEO'][1][2] === 'BuzzSEO_Settings') {
            $settings       = array_splice($submenu['BuzzSEO'], 1, 1);
            $settings[0][0] = '<div style="border-top: 1px solid rgba(255, 255, 255, .2); padding-top: .5rem;">' . $settings[0][0] . '</div>';
            array_push($submenu['BuzzSEO'], $settings[0]);
        }

        return $menu_ord;
    }

    /*
     * Add Admin UI
     */

    public function addAdminUI()
    {
        //Grab safe the page input.
        $page = filter_input(INPUT_GET, 'page');
        switch ($page) {
            case 'BuzzSEO':
                \NextBuzz\SEO\PHPTAL\Settings\General::factory()->render();
                break;

            case 'BuzzSEO_Settings':
                \NextBuzz\SEO\PHPTAL\Settings\Admin::factory()->render();
                break;
            default:
                break;
        }
    }

    /**
     * Update the title parts as set in the admin interface
     *
     * @param array $title
     * @return array
     */
    public function filterTitleParts($title)
    {
        $options = get_option('_settingsSettingsGeneral', true);

        if (!isset($options['showtitletagline']) && isset($title['tagline'])) {
            unset($title['tagline']);
        }

        if (!isset($options['showtitlepagination']) && isset($title['page'])) {
            unset($title['page']);
        }

        if (!isset($options['showtitlesitename']) && isset($title['site'])) {
            unset($title['site']);
        }

        // Update archive title if archive
        if (!is_singular()) {
            if (is_category()) {
                $title['title'] = trim($options['taxonomies']['category']['titleprefix'] . ' ' . $title['title'] . ' ' . $options['taxonomies']['category']['titlesuffix']);
            } else
            if (is_tag()) {
                $title['title'] = trim($options['taxonomies']['post_tag']['titleprefix'] . ' ' . $title['title'] . ' ' . $options['taxonomies']['post_tag']['titlesuffix']);
            } else
            if (is_date()) {
                $title['title'] = trim($options['archives']['date']['titleprefix'] . ' ' . $title['title'] . ' ' . $options['archives']['date']['titlesuffix']);
            } else
            if (is_author()) {
                $title['title'] = trim($options['archives']['author']['titleprefix'] . ' ' . $title['title'] . ' ' . $options['archives']['author']['titlesuffix']);
            } else
            if (is_tax()) {
                $tax            = get_queried_object();
                $title['title'] = trim($options['taxonomies'][$tax->taxonomy]['titleprefix'] . ' ' . $title['title'] . ' ' . $options['taxonomies'][$tax->taxonomy]['titlesuffix']);
            } else {
                $posttype       = get_post_type();
                $title['title'] = trim($options['posttypes'][$posttype]['titleprefix'] . ' ' . $title['title'] . ' ' . $options['posttypes'][$posttype]['titlesuffix']);
            }
        }

        return $title;
    }

    /**
     * Update the document title separator
     *
     * @param string $sep
     * @return string
     */
    public function filterTitleSeparator($sep)
    {
        $options = get_option('_settingsSettingsGeneral', true);

        if (isset($options['titleseparator'])) {
            return $options['titleseparator'];
        }

        return $sep;
    }

}
