<?php

namespace NextBuzz\SEO\Features;
use \LengthOfRope\JSONLD\Schema;

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
        add_action('wp_head', array($this, 'addJSONLDToHead'), 1);
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

    /**
     * Output JSON-LD data in the head of the HTML page if required
     */
    public function addJSONLDToHead()
    {
        $options = get_option('_settingsSettingsStructuredData', true);

        // Add Organization
        if ((is_home() || is_front_page()) &&
            isset($options['homepage']) &&
            isset($options['homepage']['Organization']) &&
            isset($options['homepage']['Organization']['legalName']) &&
            !empty($options['homepage']['Organization']['legalName'])) {

            $Org = Schema\OrganizationSchema::factory()
                    ->setLegalName($options['homepage']['Organization']['legalName']);

            if (intval($options['homepage']['Organization']['logo']['id']) > 0) {
                $logo = wp_get_attachment_image_src($options['homepage']['Organization']['logo']['id'], 'full');
                $Org->setLogo($logo[0]);
            }

            echo \LengthOfRope\JSONLD\Create::factory()->add($Org)->getJSONLDScript() . PHP_EOL;
        }
    }
}
