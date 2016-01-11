<?php

namespace NextBuzz\SEO;

/**
 * This is the base class which starts everything
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class App
{
    private static $features = array();

    public function __construct()
    {
        // Just an easy way to rewrite the POT file.
        //$this->rewritePOT();

        // Load features
        $features = array(
            'Admin',
            'AdminOptionPage',
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
                
                self::$features[$f] = new $class();
            }
        }

        // Always init
        add_action('plugins_loaded', array($this, 'pluginsLoaded'));
    }

    public static function getFeature($id)
    {
        if (isset(self::$features[$id])) 
        {
            return self::$features[$id];
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
