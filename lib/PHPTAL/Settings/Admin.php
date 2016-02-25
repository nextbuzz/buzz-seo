<?php

namespace NextBuzz\SEO\PHPTAL\Settings;

/**
 * BuzzSEO
 *
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class Admin extends \NextBuzz\SEO\PHPTAL\SettingsPage
{

    public function __construct()
    {
        // Add additional action after saving (must be above parent constructor!)
        add_action('buzz-seo-settings-page-save-SettingsAdmin', array($this, 'rewritePermalinks'), 10, 2);

        parent::__construct('SettingsAdmin');

        // grab app
        $seo = \NextBuzz\SEO\App::getInstance();

        // grapping every feature
        $features = $seo->getFeatures();

        // check if its an array
        if (is_array($features) == false) {
            throw new \Exception(__("No Features available", "buzz-seo"), 401);
        }

        $optionList = array();

        /* @var $class \NextBuzz\SEO\Features\BaseFeature */
        foreach ($features as $key => $class) {
            if ($class->allowDisable()) {
                array_push($optionList, array(
                    'key'   => $key,
                    'name'  => ucfirst($class->name()),
                    'desc'  => ucfirst($class->desc()),
                    'check' => isset($this->options['features'][$key]) && $this->options['features'][$key] === "1",
                ));
            }
        }

        $this->setTalData(array(
            'options'    => $optionList,
            'hasOptions' => count($optionList) > 0
        ));
    }

    public function rewritePermalinks($old_options, $new_options)
    {
        if (isset($old_options['features']['Sitemaps']) && !isset($new_options['features']['Sitemaps'])) {
            // Disabled
            add_filter('rewrite_rules_array', function ($rules)
            {
                unset($rules['sitemap\.xml$']);
                unset($rules['sitemap-([^/]+?)-?([0-9]+)?\.xml$']);
                
                return $rules;
            });
            flush_rewrite_rules();
        }
        if (!isset($old_options['features']['Sitemaps']) && isset($new_options['features']['Sitemaps'])) {
            // Enabled
            add_rewrite_rule('sitemap\.xml$', 'index.php?buzz_sitemap=1', 'top');
            add_rewrite_rule('sitemap-([^/]+?)-?([0-9]+)?\.xml$', 'index.php?buzz_sitemap=$matches[1]&buzz_sitemap_page=$matches[2]', 'top');
            flush_rewrite_rules();
        }
    }

}
