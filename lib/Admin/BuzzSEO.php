<?php

namespace NextBuzz\SEO\Admin;

/**
 * BuzzSEO
 *
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 */

class BuzzSEO extends BaseAdmin
{  
    public function init()
    {
        // grab app
        $seo = \NextBuzz\SEO\App::getInstance();
        
        // grapping every feature
        $features = $seo->getFeatures();

        // check if its an array
        if(is_array($features) == false)
        {
            throw new Exception("No Features available", 401);
        }
        
        // safe post function
        $array = isset($_POST['BuzzSEO']) ? filter_var($_POST['BuzzSEO'], FILTER_SANITIZE_ENCODED, FILTER_REQUIRE_ARRAY) : null;
        
        // check if its an array
        if(is_array($array))
        {
            if (wp_verify_nonce($array['nonce'], 'buzzSEO') === false) 
            {
                $this->setTalData('errorMessage', __("Nonce value is invalide."));
            }
            else
            {
                $this->setTalData('message', __("Settings has been saved."));
                
                /* @var $class \NextBuzz\SEO\Features\BaseFeature */
                foreach($features as $key => $class)
                {                    
                    // to prefent html5 edit;
                    if($class->allowDisable() !== false)
                    {
                        // update option name + true or false
                        update_option($key, $array[$key]);
                    }
                }
            }
        }
        
        $optionList = array();
        
        /* @var $class \NextBuzz\SEO\Features\BaseFeature */
        foreach($features as $key => $class)
        {
            array_push($optionList, array(
                'key'       => $key, 
                'name'      => ucfirst($class->name()),
                'desc'      => ucfirst($class->desc()),
                'check'     => get_option($key) === "on" ? true : false,
                'disable'   => $class->allowDisable()));
        }
        
        $this->setTalData(array(
            'nonce' => wp_nonce_field('buzzSEO', 'BuzzSEO[nonce]', false),
            'options' => $optionList,
            'hasOptions' => count($optionList) > 0));
    }
}