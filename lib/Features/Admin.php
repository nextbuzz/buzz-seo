<?php

namespace NextBuzz\SEO\Features;

/**
 * Description of Admin
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 * @author Nick Vlug  <nick@ruddy.nl>
 */
class Admin extends BaseFeature
{

    public function init()
    {
        if (!is_admin()) {
            return;
        }

        add_action('admin_enqueue_scripts', array($this, 'enqueueAdminScripts'));
        
        add_action('admin_menu', array(&$this, 'createAdminMenu'));
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
        wp_enqueue_script('buzz-seo-admin-js', plugins_url('buzz-seo/js/admin.js'), array('jquery'), BUZZSEO_VERSION);
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
        
        // Capability edit_dashboard (Only Super Admns, Adminstrators, Editors are allowed to see this page)
        add_menu_page('Buzz SEO', 'Buzz SEO', 'edit_dashboard', 'BuzzSEO', array(&$this, "addAdminUI"));
        
        // Capability manage_sites (Only Super Admins are allowed to change SEO Settings)
        add_submenu_page('BuzzSEO', __('Settings', 'buzz-seo'), __('Settings', 'buzz-seo'), 'manage_sites', 'SEOSettings', array(&$this, "addAdminUI"));
       
        // Rename Submenu
        $submenu['BuzzSEO'][0][0] = __('General', 'buzz-seo');
    }
    
    /*
     * Add Admin UI
     */
    public function addAdminUI()
    {
        $optionPage = new \NextBuzz\SEO\PHPTAL\OptionPage();
        if($optionPage)
        {
            //Grab safe the page input.
            $page = filter_input(INPUT_GET, 'page');
            
            // Set Page into the option page render
            $optionPage->setPage($page);
            
            // Render Page
            $optionPage->render();
        }
    }
}
