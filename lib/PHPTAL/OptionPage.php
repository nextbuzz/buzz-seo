<?php

namespace NextBuzz\SEO\PHPTAL;

/**
 * OptionPage
 *
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 */

class OptionPage 
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
            // Build and attach class
            $load = new $class();

            if($load)
            {
                // Set Output mode which can be XML, XHTML or in this case HTML5.
                $load->setOutputMode(\PHPTAL::HTML5);

                // Don't show the end user developer comments
                $load->stripComments(true);

                // Execute Tal and render it.
                $load->echoExecute();
            }
        }
    }
}