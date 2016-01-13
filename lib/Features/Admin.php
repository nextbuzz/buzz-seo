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
        wp_enqueue_script('buzz-seo-admin-js', plugins_url('buzz-seo/js/admin.js'), array('jquery'), BUZZSEO_VERSION, true);
        wp_localize_script('buzz-seo-admin-js', 'BuzzSEOAdmin', array(
            'MediaUploader' => array(
                'title' => __('Select an image', 'buzz-seo'),
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

        // grab app singleton
        $seo = \NextBuzz\SEO\App::getInstance();

        // Add Menu Page
        add_menu_page('Buzz SEO', 'Buzz SEO', 'edit_posts', 'BuzzSEO', array($this, "addAdminUI"), 'dashicons-analytics');

        // Make sure this submenu is only visiable for admin users.
        if(current_user_can('manage_options'))
        {
            // Add Settings Sub Option Page
            add_submenu_page('BuzzSEO', __('Settings', 'buzz-seo'), __('Settings', 'buzz-seo'), 'edit_dashboard', 'SEOSettings', array($this, "addAdminUI"));

            // Rename Submenu
            $submenu['BuzzSEO'][0][0] = __('General', 'buzz-seo');
        }
    }

    public function changeSubmenuOrder($menu_ord)
    {
        global $submenu;

        // Make sure settings is always last if it exists
        if (isset($submenu['BuzzSEO'][1][2]) && $submenu['BuzzSEO'][1][2] === 'SEOSettings') {
            $settings = array_splice($submenu['BuzzSEO'], 1, 1);
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
                \NextBuzz\SEO\PHPTAL\SettingsPage::factory('SettingsGeneral')->render();
                break;

            case 'SEOSettings':
                \NextBuzz\SEO\PHPTAL\Settings\Admin::factory()->render();
                break;
            default:
                break;
        }
    }
}
