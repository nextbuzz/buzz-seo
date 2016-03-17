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
}
