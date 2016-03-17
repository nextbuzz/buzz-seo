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
            add_action('template_redirect', array($this, 'manage404'));
        }
    }

    /**
     * Add the administrator submenu
     */
    public function createAdminMenu()
    {
        // Add Settings Sub Option Page
        add_submenu_page('BuzzSEO', __('Status Codes', 'buzz-seo'), __('Status Codes', 'buzz-seo'), 'edit_posts', 'BuzzSEO_StatusCodes', array($this, "addAdminUI"));
    }

    /**
     * Create the admin interface pages.
     */
    public function addAdminUI()
    {
        \NextBuzz\SEO\PHPTAL\Settings\StatusCodes::factory()->render();
    }
    
    /**
     * Save request uri to db if a 404 is found.
     * 
     * @global type $wp_query
     * @return type
     */
    public function manage404()
    {
        global $wp_query;
        
        // If not a 404 page, bail early
        if (!$wp_query->is_404())
        {
            return;
        }
        
        $uri = $_SERVER['REQUEST_URI'];
        
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
        
        // Make sure it does not autoload
        update_option('_settingsSettingsStatusCodes404', $errors404, false);
    }
}
