<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class StatusCodes extends BaseFeature
{

    public function name()
    {
        return __("Status Codes", 'buzz-seo');
    }

    public function desc()
    {
        return __("Manage 404 errors and 301 redirects.", 'buzz-seo');
    }

    public function init()
    {
        add_action('admin_menu', array($this, 'createAdminMenu'));

        $options = get_option('_settingsSettingsStatusCodes', true);

        // Nothing checked, so do nothing
        if (!is_array($options)) {
            return;
        }

        if (isset($options['manage404'])) {
            add_action('template_redirect', array($this, 'manage404'), 10);
        }

        // Check for redirects (must be after manage404)
        add_action('template_redirect', array($this, 'do301Redirects'), 11);

        if (isset($options['manage301'])) {
            //add_action('template_redirect', array($this, 'manage301'));
        }
    }

    /**
     * Add the administrator submenu
     */
    public function createAdminMenu()
    {
        // Add Settings Sub Option Page
        add_submenu_page('BuzzSEO', __('Status Codes', 'buzz-seo'), __('Status Codes', 'buzz-seo'), 'edit_posts',
            'BuzzSEO_StatusCodes', array($this, "addAdminUI"));
    }

    /**
     * Create the admin interface pages.
     */
    public function addAdminUI()
    {
        \NextBuzz\SEO\PHPTAL\Settings\StatusCodes::factory()->render();
    }

    /**
     * Check if we have a redirect for the page when a 404 is found and redirect to that page.
     */
    public function do301Redirects()
    {
        // If not a 404 page or in_admin, bail early
        if (!is_404() || is_admin()) {
            return;
        }

        // Skip admin redirect url
        if (get_query_var('name') === 'admin') {
            return;
        }

        $uri = $_SERVER['REQUEST_URI'];

        // Check if we can redirect this item
        $redirects301 = get_option('_settingsSettingsStatusCodes301', array());
        if (array_key_exists($uri, $redirects301)) {
            $redirect = $redirects301[$uri];

            // Redirect home no redirect is empty
            $redirectTo = empty($redirect['redirect']) ? home_url() : $redirect['redirect'];

            wp_redirect($redirectTo, 301);
            exit;
        }
    }

    /**
     * Save request uri to db if a 404 is found.
     *
     * @global type $wp_query
     * @return type
     */
    public function manage404()
    {
        // If not a 404 page or in_admin, bail early
        if (!is_404() || is_admin()) {
            return;
        }

        // Skip admin redirect url
        if (get_query_var('name') === 'admin') {
            return;
        }

        $uri = $_SERVER['REQUEST_URI'];

        // Check if this is not already a 301
        $redirects301 = get_option('_settingsSettingsStatusCodes301', array());
        if (array_key_exists($uri, $redirects301)) {
            return;
        }

        // Make sure array exists
        $errors404 = get_option('_settingsSettingsStatusCodes404', array());

        // Add entry to array
        if (!array_key_exists($uri, $errors404)) {
            $errors404[$uri] = array();
        }

        // Update count
        if (!isset($errors404[$uri]['count'])) {
            $errors404[$uri]['count'] = 1;
        } else {
            $errors404[$uri]['count'] += 1;
        }

        $errors404[$uri]['timestamp'] = time();

        // Make sure it does not autoload
        update_option('_settingsSettingsStatusCodes404', $errors404, false);
    }

    /**
     * Auto add a redirect if the slug of an existing page changes
     */
    public function manage301()
    {

    }

}
