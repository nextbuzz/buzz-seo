<?php

namespace NextBuzz\SEO\Features;

/**
 * BaseFeature
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
abstract class BaseFeature
{
    /**
     * Add all handlers needed for the feature
     */
    abstract function init();
    
    /**
     * Add name to speciafic feature
     * 
     * @return string
     */
    abstract function name();
    
    /*
     * Add desc to speciafic feature
     * 
     * @return string
     */
    abstract function desc();

    /**
     * Override this if the feature cannot be disabled in the admin panel.
     *
     * @return boolean
     */
    public function allowDisable()
    {
        return true;
    }
}
