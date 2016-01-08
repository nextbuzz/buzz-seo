<?php

/*
 * © Copyright NextBuzz B.V.
 */

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
        
        add_menu_page('Buzz SEO', 'Buzz SEO', 'edit_theme_options', 'BuzzSEO');
        
        // Show only if user is a super admin.
        if(is_super_admin())
        {
            add_submenu_page('BuzzSEO', __('Settings', 'buzz-seo'), __('Settings', 'buzz-seo'), 'edit_theme_options', 'SEOSettings');
        }
       
        // Rename Submenu
        $submenu['BuzzSEO'][0][0] = __('General', 'buzz-seo');
    }
}
