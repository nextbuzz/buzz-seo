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
        
    }

}
