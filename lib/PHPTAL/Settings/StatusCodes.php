<?php

namespace NextBuzz\SEO\PHPTAL\Settings;

/**
 * XML Sitemaps admin interface handler.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class StatusCodes extends \NextBuzz\SEO\PHPTAL\SettingsPage
{

    public function __construct($tplName)
    {
        parent::__construct('SettingsStatusCodes');
        $this->add301RedirectAction();

        $table404 = new \NextBuzz\SEO\Tables\Table404();
        $table404->prepare_items();

        $table301 = new \NextBuzz\SEO\Tables\Table301();
        $table301->prepare_items();

        $this->setTalData(array(
            'table404'    => $table404->get_display(),
            'table301'    => $table301->get_display(),
            'homeURI'     => get_home_url(),
            'add301Nonce' => wp_nonce_field('add301_settings', 'add301_settings_nonce', true, false),
        ));
    }

    public function add301RedirectAction()
    {
        // Check if our nonce is set.
        $nonceCheck = 'add301_settings_nonce';
        if (!isset($_POST[$nonceCheck])) {
            return;
        }

        $nonce = $_POST[$nonceCheck];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'add301_settings')) {
            $this->setTalData('errorMessage', __("Nonce value is invalid.", "buzz-seo"));
            return;
        }

        // All okay, so add the data to the 301 table
        $redirects301 = get_option('_settingsSettingsStatusCodes301', array());

        $uri = filter_input(INPUT_POST, 'addNew301RequestURI');
        $uri = trailingslashit($uri);
        $redirect = filter_input(INPUT_POST, 'addNew301RedirectURI');

        if (!isset($redirects301[$uri]) && $uri !== $redirect && !empty($uri)) {
            $redirects301[$uri] = array(
                'redirect'  => $redirect,
                'timestamp' => time(),
            );

            // Save new data
            update_option('_settingsSettingsStatusCodes301', $redirects301, false);

            $this->setTalData('message', __("Redirect added.", "buzz-seo"));
            return;
        }

        $this->setTalData('errorMessage', __("Could not save new redirect.", "buzz-seo"));
    }

}
