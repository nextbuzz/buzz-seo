<?php

namespace NextBuzz\SEO\PHPTAL;

/**
 * OptionPage
 *
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 */

abstract class OptionPage 
{
    /**
     * Page Varaiable
     * @var type 
     */
    private $_page;
    
    /**
     * set the page which have to be rendered
     * @param type $page
     */
    public function setPage($page)
    {
        $this->_page = $page;
    }
    
    /**
     * Rendering Tal Page
     */
    public function render()
    {      
        // Create namespace
        $class = "\\NextBuzz\\SEO\\Admin\\" . $this->_page;
        if(class_exists($class))
        {
            /* @var $load \NextBuzz\SEO\Admin\BaseAdmin */
            $load = new $class();

            if($load)
            {
                // Load OptionPage
                $load->init();
                
                // Execute Tal and render it.
                $load->echoExecute();
            }
        }
    }
}