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
        add_action('admin_init', array($this, 'initBack'));
        add_action('admin_menu', array($this, 'createAdminMenu'));
        add_action('wp_head', array($this, 'addJSONLDToHead'), 1);
    }

    /**
     * Initialize everything that is only needed in backend
     *
     * @return void
     */
    public function initBack()
    {
        // Load SEO box for all Single pages
        $meta = new \NextBuzz\SEO\PHPTAL\MetaBox('StructuredDataBox', __('Structured Data (SEO)', 'buzz-seo'));
        //$meta->setRequired('test', 'het veld test is nodig');
        //$meta->setRecommended('test', 'het veld test is nodig');
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

        $Create = \LengthOfRope\JSONLD\Create::factory();
        $hasData = false;
        // Add Organization
        if ((is_home() || is_front_page()) &&
            isset($options['homepage']) &&
            isset($options['homepage']['Organization']) &&
            isset($options['homepage']['Organization']['legalName']) &&
            isset($options['homepage']['Organization']['url']) &&
            !empty($options['homepage']['Organization']['legalName']) &&
            !empty($options['homepage']['Organization']['url'])) {

            $Org = Schema\OrganizationSchema::factory();

            $add = array('legalName', 'url', 'email', 'telephone', 'faxNumber');
            foreach ($add as $key)
            {
                if (!empty($options['homepage']['Organization'][$key])) {
                    $func = "set" . ucFirst($key);
                    $Org->$func($options['homepage']['Organization'][$key]);
                }
            }

            if (intval($options['homepage']['Organization']['logo']['id']) > 0) {
                $logo = wp_get_attachment_image_src($options['homepage']['Organization']['logo']['id'], 'full');
                $Org->setLogo($logo[0]);
            }

            $hasData = true;
            $Create->add($Org);
        }

        // Add Article
        if (isset($options['addarticle']) && is_array($options['addarticle']) && is_singular()) {
            $posttype = get_post_type();
            foreach ($options['addarticle'] as $creativeWorkType => $postTypes)
            {
                $addForPostTypes = array_keys($postTypes);
                if (in_array($posttype, $addForPostTypes)) {
                    // We are in a posttype that we want to add the article data for, but since we are not in the loop, get
                    // the author data in an arbitrary way
                    $post = get_post();

                    $class = "\\LengthOfRope\\JSONLD\\Schema\\" . $creativeWorkType . "Schema";
                    $Article = $class::factory();

                    $Article->setDatePublished(get_the_date('c'), $post);
                    $Article->setHeadline(get_the_title($post));
                    $url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                    if (is_array($url)) {
                        $Article->setImage(Schema\ImageObjectSchema::factory()->setUrl($url[0])->setWidth($url[1])->setHeight($url[2]));
                    }
                    $Article->setDateModified(get_the_modified_date('c'), $post);
                    $excerpt = apply_filters('the_excerpt', get_post_field('post_excerpt', $post->ID));
                    if (!empty($excerpt)) {
                        $Article->setDescription(strip_tags($excerpt));
                    }


                    // Add author
                    if (is_array($options['addauthor']) && isset($options['addauthor'][$creativeWorkType])) {
                        $authorF = get_the_author_meta('first_name', $post->post_author);
                        $authorL = get_the_author_meta('last_name', $post->post_author);
                        $authormail = get_the_author_meta('email', $post->post_author);
                        $authorurl = get_the_author_meta('url', $post->post_author);

                        $Author = Schema\PersonSchema::factory();
                        if (!empty($authorF)) {
                            $Author->setGivenName($authorF);
                        }
                        if (!empty($authorL)) {
                            $Author->setFamilyName($authorL);
                        }
                        if (!empty($authormail)) {
                            $Author->setEmail($authormail);
                        }
                        if (!empty($authorurl)) {
                            $Author->setUrl($authorurl);
                        }

                        $Article->setAuthor($Author);
                    }

                    $hasData = true;
                    $Create->add($Article);
                }
            }
        }

        if ($hasData) {
            echo $Create->getJSONLDScript() . PHP_EOL;
        }
    }

}
