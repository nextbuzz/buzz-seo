<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class Sitemaps extends BaseFeature
{

    public function name()
    {
        return __("Sitemaps", "buzz-seo");
    }

    public function desc()
    {
        return __("Automatic generation of XML sitemaps.", "buzz-seo");
    }

    public function init()
    {
        add_action('admin_menu', array(&$this, 'createAdminMenu'));
    }

    public function createAdminMenu()
    {
        // Add Settings Sub Option Page
        add_submenu_page('BuzzSEO', __('XML Sitemaps', 'buzz-seo'), __('XML Sitemaps', 'buzz-seo'), 'edit_posts', 'XMLSitemaps', array($this, "addAdminUI"));
    }

    public function addAdminUI()
    {
        \NextBuzz\SEO\PHPTAL\Settings\Sitemaps::factory()->render();
    }

}
