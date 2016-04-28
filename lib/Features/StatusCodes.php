<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class StatusCodes extends BaseFeature
{

    private $oldSlug;

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

        // Check for redirects (must be with priority 0 to beat WordPress own internal redirection handling)
        add_action('template_redirect', array($this, 'do301Redirects'), 0);

        if (isset($options['manage404'])) {
            add_action('template_redirect', array($this, 'manage404'));
        }

        if (isset($options['manage301'])) {
            add_filter('wp_insert_post_data', array($this, 'manage301SlugChangesGetOld'), 99, 2);
            add_action('save_post', array($this, 'manage301SlugChanges'), 10, 3);
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

        $uri = trailingslashit($_SERVER['REQUEST_URI']);
        $uriNoTrail = untrailingslashit($_SERVER['REQUEST_URI']);

        // Check if we can redirect this item
        $redirects301 = get_option('_settingsSettingsStatusCodes301', array());
        if (array_key_exists($uri, $redirects301)) {
            $redirect = $redirects301[$uri];

            // Redirect home no redirect is empty
            $redirectTo = empty($redirect['redirect']) ? home_url() : $redirect['redirect'];

            wp_redirect($redirectTo, 301);
            exit;
        } elseif (array_key_exists($uriNoTrail, $redirects301)) {
            $redirect = $redirects301[$uriNoTrail];

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

        $uri = trailingslashit($_SERVER['REQUEST_URI']);
        $uriNoTrail = untrailingslashit($_SERVER['REQUEST_URI']);

        // Check if this is not already a 301
        $redirects301 = get_option('_settingsSettingsStatusCodes301', array());
        if (array_key_exists($uri, $redirects301) || array_key_exists($uriNoTrail, $redirects301)) {
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
    public function manage301SlugChangesGetOld($data, $postArr)
    {
        $this->oldSlug = get_permalink($postArr['ID']);

        return $data;
    }

    /**
     * Auto add a redirect if the slug of an existing page changes
     */
    public function manage301SlugChanges($postId, $data, $update)
    {
        $newSlug = get_permalink($postId);

        // Add 301 if it is an update and the slug has changed
        if ($update && $newSlug !== $this->oldSlug) {
            $oldPath = parse_url($this->oldSlug, PHP_URL_PATH);
            $oldPath = trailingslashit($oldPath);
            $newPath = parse_url($newSlug, PHP_URL_PATH);
            $newPath = trailingslashit($newPath);
            $redirects301 = get_option('_settingsSettingsStatusCodes301', array());

            // Add (or overwrite) 301
            $redirects301[$oldPath] = array(
                'redirect' => $newPath,
                'timestamp' => time(),
            );

            // Save new data
            update_option('_settingsSettingsStatusCodes301', $redirects301, false);
        }
    }

}
