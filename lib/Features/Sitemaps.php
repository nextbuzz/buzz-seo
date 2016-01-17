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
        add_action('admin_menu', array($this, 'createAdminMenu'));
        add_action('pre_get_posts', array($this, 'checkRenderSitemap'), 1);
    }

    /**
     * Add the administrator submenu
     */
    public function createAdminMenu()
    {
        // Add Settings Sub Option Page
        add_submenu_page('BuzzSEO', __('XML Sitemaps', 'buzz-seo'), __('XML Sitemaps', 'buzz-seo'), 'edit_posts', 'XMLSitemaps', array($this, "addAdminUI"));
    }

    /**
     * Create the admin interface pages.
     */
    public function addAdminUI()
    {
        \NextBuzz\SEO\PHPTAL\Settings\Sitemaps::factory()->render();
    }

    /**
     * Render the xml output if requested.
     */
    public function checkRenderSitemap($query)
    {
        // If not the main query, we don't need to check if output is requested
        if (!$query->is_main_query()) {
            return;
        }
        
        // TODO: Somehow detect if we are a sitemap xml page
        
        if (!headers_sent()) {
            header($this->getHTTPProtocol() . ' 200 OK', true, 200);
            // Prevent the search engines from indexing the XML Sitemap.
            header('X-Robots-Tag: noindex, follow', true);
            header('Content-Type: text/xml');
        }
        
        

        // Make sure WordPress does not output any footer content
        remove_all_actions('wp_footer');
        exit();
    }

    /**
     * Get the output protocol. Defaults to HTTP/1.1 if none found
     * 
     * @return string
     */
    private function getHTTPProtocol()
    {
        return (isset($_SERVER['SERVER_PROTOCOL']) && $_SERVER['SERVER_PROTOCOL'] !== '') ? sanitize_text_field($_SERVER['SERVER_PROTOCOL']) : 'HTTP/1.1';
    }

}
