<?php

namespace LengthOfRope\SEO;

/**
 * This is the base class which starts everything
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class App
{

    public function __construct()
    {
        // Always init
        add_action('plugins_loaded', array($this, 'pluginsLoaded'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueAdminScripts'));

        if (!is_admin()) {
            // Only add frontend stuff
            add_action('init', array($this, 'initFront'));
        } else {
            // Only add backend stuff
            add_action('admin_init', array($this, 'initBack'));
        }
    }

    /**
     * Code to run when plugins are loaded.
     * 
     * @return void
     */
    public function pluginsLoaded()
    {
        // Load the translation file
        load_plugin_textdomain('lor-seo', false, LORSEO_DIR_REL . '/languages');
    }

    /**
     * Initialize everything that is only needed in frontend
     * 
     * @return void
     */
    public function initFront()
    {
        
    }

    /**
     * Initialize everything that is only needed in backend
     * 
     * @return void
     */
    public function initBack()
    {
        // Load SEO box for all Single pages
        new PHPTAL\MetaBox('PostSEOBox', __('Search Engine Optimization (SEO)', 'lor-seo'));
    }

    /**
     * Enqueue admin scripts and styles
     */
    public function enqueueAdminScripts()
    {
        wp_enqueue_style('lor-seo-admin', plugins_url('lor-seo/css/admin.css'), false, LORSEO_VERSION);
        wp_enqueue_script('lor-seo-admin-js', plugins_url('lor-seo/js/admin.js'), array('jquery'), LORSEO_VERSION);
    }

}
