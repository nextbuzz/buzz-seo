<?php

namespace NextBuzz\SEO\PHPTAL\Settings;

/**
 * XML Sitemaps admin interface handler.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Analytics extends \NextBuzz\SEO\PHPTAL\SettingsPage
{

    public function __construct($tplName)
    {
        // Make sure eventclicks is an before constructen the parent
        $options = get_option('_settingsSettingsAnalytics', true);

        if (!is_array($options) || !isset($options['eventsclicks']) || !is_array($options['eventsclicks']))
        {
            if (!is_array($options)) {
                $options = array();
            }
            $options['eventsclicks'] = array();

            // Make sure we re-retrieve the new settings
            wp_cache_delete('_settingsSettingsAnalytics');
            update_option('_settingsSettingsAnalytics', $options);
        }

        if (isset($_POST) && isset($_POST['SettingsAnalytics']['eventsclicks'])) {
            foreach($_POST['SettingsAnalytics']['eventsclicks'] as $k => $v) {
                if (empty($v['category']) || empty($v['action']) || empty($v['query'])) {
                    unset($_POST['SettingsAnalytics']['eventsclicks'][$k]);
                }
            }
        }

        parent::__construct('SettingsAnalytics');
    }
}
