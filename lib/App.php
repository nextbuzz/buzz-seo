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

    private static $features;

    private function __construct()
    {
        // Just an easy way to rewrite the POT file.
        //$this->rewritePOT();

        // Check if we should upgrade
        Upgrades\Upgrader::factory();

        // Load features
        $features = array(
            'Admin',
            'Analytics',
            'CleanupHead',
            'PostSEOBox',
            'PostSEOBoxAnalysis',
            'StructuredData',
            'Sitemaps',
        );

        $enabledFeatures = get_option('_settingsSettingsAdmin');

        if (is_array($enabledFeatures['features'])) {
            $enabledFeatures = array_keys($enabledFeatures['features']);
        } else {
            $enabledFeatures = array();
        }

        if (self::$features === NULL) {
            self::$features = array();
        }

        foreach($features as $f)
        {
            // Get Namespace
            $class = '\\NextBuzz\\SEO\\Features\\' . $f;

            /* @var $Feature \NextBuzz\SEO\Features\BaseFeature */
            $feature = new $class();

            // Check if enabled in database
            $isEnabled = in_array($f, $enabledFeatures);

            // Check if feature is enabled or not
            if ($feature->allowDisable() === false || $isEnabled)
            {
                // Run init
                $feature->init();
            }

            // Insert activated class into the feature array
            self::$features[$f] = $feature;
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
     * Get activated feature by key
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
     * Get every activated feature
     * @return boolean
     */
    public function getFeatures()
    {
        if(is_array(self::$features))
        {
            return self::$features;
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
