<?php

namespace NextBuzz\SEO\PHPTAL\Settings;

/**
 * BuzzSEO
 *
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 */
class Admin extends \NextBuzz\SEO\PHPTAL\SettingsPage
{
    public function __construct($tplName)
    {
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
                    'key'     => $key,
                    'name'    => ucfirst($class->name()),
                    'desc'    => ucfirst($class->desc()),
                    'check'   => isset($this->options['features'][$key]) && $this->options['features'][$key] === "1",
                ));
            }
        }

        $this->setTalData(array(
            'options'    => $optionList,
            'hasOptions' => count($optionList) > 0
        ));
    }
}
