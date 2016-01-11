<?php

namespace NextBuzz\SEO;

/**
 * This is the base class which starts everything
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 */
class App
{
    protected static $instance;
    
    private static $features = array();

    private function __construct()
    {
        // Just an easy way to rewrite the POT file.
        //$this->rewritePOT();

        // Load features
        $features = array(
            'Admin',
            'PostSEOBox',
            'PostSEOBoxAnalysis',
        );

        // TODO: Get enabled features from DB
        foreach($features as $f) {
            $class = '\\NextBuzz\\SEO\\Features\\' . $f;
            /* @var $Feature \NextBuzz\SEO\Features\BaseFeature */
            $Feature = new $class();

            // TODO: do not init feature if disable
            if ($Feature->allowDisable() === false || ($Feature->allowDisable() && true !== false)) {
                $Feature->init();
                
                // Insert activated class into the feature array
                $this->features[$f] = new $class();
            }
        }

        // Always init
        add_action('plugins_loaded', array($this, 'pluginsLoaded'));
    }
    
    private function __wakeup()
    {
        
    }
    
    private function __clone()
    {
        
    }
    
    /**
     * Get Current App
     * @return \NextBuzz\SEO\App
     */
    public static function getInstance()
    {
        return isset(static::$instance) ? static::$instance : static::$instance = new static;
    }

    /**
     * Get Activated Features
     * @param type $id
     * @return boolean
     */
    public function getFeature($id)
    {
        if (isset($this->features[$id])) 
        {
            return $this->features[$id];
        }

        return false;
    }

    /**
     * Code to run when plugins are loaded.
     *
     * @return void
     */
    public function pluginsLoaded()
    {
        // Load the translation file
        load_plugin_textdomain('buzz-seo', false, BUZZSEO_DIR_REL . '/languages');
    }

    /**
     * rewrite Pot file
     */
    private function rewritePOT()
    {
        $Pot = new \NextBuzz\SEO\Tools\CreatePot();
        $Pot->addPath(BUZZSEO_DIR . 'tal/', "xml")
            ->addPath(BUZZSEO_DIR . 'lib/', "php")
            ->stripPathInComments(BUZZSEO_DIR)
            ->parse()
            ->writePot(BUZZSEO_DIR . 'languages/buzz-seo.pot');
    }

}
