<?php

namespace NextBuzz\SEO\Admin;

/**
 * BaseAdmin
 *
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 */

abstract class BaseAdmin extends \NextBuzz\SEO\PHPTAL\Template
{  
    private $_reflection = null;
    
    public function __construct()
    {
        $reflection = new \ReflectionClass($this);
        if($reflection == null)
        {
            throw new \Exception(__("ReflectionClass has been initialized wrong.", "buzz-seo"), 404);
        }
        else
        {
            $this->_reflection = $reflection;
        }

        $name = $this->getTalName();
        
        parent::__construct($name);
    }
    
    /**
     * 
     * @return type
     */
    private function getTalName()
    {
        return "admin" . DIRECTORY_SEPARATOR . $this->getReflection()->getShortName();
    }
    
    /**
     * 
     * @return type
     */
    private function getReflection()
    {
        return $this->_reflection;
    }
    
    /**
     * Add all handlers needed for the feature
     */
    abstract function init();
}
