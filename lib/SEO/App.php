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
        if (!is_admin()) {
            add_action('init', array($this, 'initFrontEnd'));
        } else {
            add_action('admin_init', array($this, 'initBackEnd'));
        }
    }

    /**
     * Initialize everything that is only needed in frontend
     * 
     * @return void
     */
    public function initFrontEnd()
    {
        
    }

    /**
     * Initialize everything that is only needed in backend
     * 
     * @return void
     */
    public function initBackEnd()
    {
        
    }

}
