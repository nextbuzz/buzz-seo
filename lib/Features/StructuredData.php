<?php

namespace NextBuzz\SEO\Features;

/**
 * Rich Snippets feature implementing some JSON-LD structured data
 * @see https://developers.google.com/structured-data/
 * @see https://builtvisible.com/implementing-json-ld-wordpress/
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class StructuredData extends BaseFeature
{

    public function name()
    {
        return __("Structured Data", "buzz-seo");
    }

    public function desc()
    {
        return __("Add structured data to the content to allow search engines to show the content as rich snippets.", "buzz-seo");
    }

    public function init()
    {
        add_action('admin_menu', array($this, 'createAdminMenu'));
    }

    /**
     * Add the administrator submenu
     */
    public function createAdminMenu()
    {
        // Add Settings Sub Option Page
        add_submenu_page('BuzzSEO', __('Structured Data', 'buzz-seo'), __('Structured Data', 'buzz-seo'), 'edit_posts', 'BuzzSEO_JSONLD', array($this, "addAdminUI"));
    }

    /**
     * Create the admin interface pages.
     */
    public function addAdminUI()
    {
        \NextBuzz\SEO\PHPTAL\Settings\StructuredData::factory()->render();
    }
}
