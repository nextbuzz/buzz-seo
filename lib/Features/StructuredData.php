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
    private $Org = null;

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
        add_filter('the_content', array($this, 'addJSONLDToLoop'), 1);

        // Remove hentry on post types that have structured data
        add_filter('post_class', array($this, 'removeHentry'));
    }

    /**
     * Post types that have custom structured data added, do not also need the hentry item to be added,
     * so remove them
     *
     * @param array $classes
     * @return array
     */
    public function removeHentry($classes)
    {
        $options = get_option('_settingsSettingsStructuredData', true);

        $posttype = get_post_type();
        if (isset($posttype) && is_array($options) && isset($options['addarticle'])) {
            foreach ($options['addarticle'] as $postTypes) {
                if (!is_array($postTypes)) {
                    continue;
                }
                $addForPostTypes = array_keys($postTypes);
                if (in_array($posttype, $addForPostTypes)) {
                    $classes = array_diff($classes, array('hentry'));
                    return $classes;
                }
            }
        }

        return $classes;
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
     * Get the organization entered in the Structed data admin if any
     */
    private function getOrganization()
    {
        if (!is_null($this->Org)) {
            return $this->Org;
        }

        $options = get_option('_settingsSettingsStructuredData', true);
        if (isset($options['homepage']) &&
            isset($options['homepage']['Organization']) &&
            isset($options['homepage']['Organization']['legalName']) &&
            isset($options['homepage']['Organization']['url']) &&
            !empty($options['homepage']['Organization']['legalName']) &&
            !empty($options['homepage']['Organization']['url'])) {

            $Org = Schema\OrganizationSchema::factory();

            $add = array('legalName', 'url', 'email', 'telephone', 'faxNumber');
            foreach ($add as $key) {
                if (!empty($options['homepage']['Organization'][$key])) {
                    $func = "set" . ucFirst($key);
                    $Org->$func($options['homepage']['Organization'][$key]);

                    // Name is also required in some cases, so duplicate legalName
                    if ($key === 'legalName') {
                        $Org->setName($options['homepage']['Organization'][$key]);
                    }
                }
            }

            if (intval($options['homepage']['Organization']['logo']['id']) > 0) {
                $logo = wp_get_attachment_image_src($options['homepage']['Organization']['logo']['id'], 'full');
                $Org->setLogo($logo[0]);
            }

            // Make Organization available for singular items
            $this->Org = $Org;
        } else {
            $this->Org = false;
        }

        return $this->Org;
    }

    /**
     * Output JSON-LD data in the head of the HTML page if required
     */
    public function addJSONLDToHead()
    {
        $options = get_option('_settingsSettingsStructuredData', true);

        $Create  = \LengthOfRope\JSONLD\Create::factory();
        $hasData = false;
        // Create Organization
        $Org = $this->getOrganization();

        // Add organization
        if ($Org && (is_home() || is_front_page())) {
            $hasData = true;
            $Create->add($Org);
        }

        // Add Website
        if ((is_home() || is_front_page()) &&
            isset($options['homepage']) &&
            isset($options['homepage']['Website']) &&
            isset($options['homepage']['Website']['name']) &&
            isset($options['homepage']['Website']['alternateName'])) {

            $Web = Schema\WebSiteSchema::factory();

            // Add url
            $Web->setUrl(get_site_url());
            $Web->setName(!empty($options['homepage']['Website']['name']) ? $options['homepage']['Website']['name'] : get_bloginfo('name'));
            if (!empty($options['homepage']['Website']['alternateName'])) {
                $Web->setAlternateName($options['homepage']['Website']['alternateName']);
            }

            $hasData = true;
            $Create->add($Web);
        }

        if ($hasData) {
            echo $Create->getJSONLDScript() . PHP_EOL;
        }
    }

    /**
     * Output JSON-LD data in the loop of the HTML page if required
     */
    public function addJSONLDToLoop($content)
    {
        // Not a single page, bail early
        if (!is_singular()) {
            return $content;
        }

        // Get organization
        $Org = $this->getOrganization();

        // Check if we don't want the boxes to show in code, we also don't want to output jsonld
        $pt = get_post_type();
        if (in_array($pt, apply_filters('buzz-seo-disable-posttype', array()))) {
            return $content;
        }
        $options = get_option('_settingsSettingsStructuredData', true);
        $postAuthorID = get_post_field('post_author',  get_queried_object_id());

        $Create  = \LengthOfRope\JSONLD\Create::factory();
        $hasData = false;
        // Add Article
        if (isset($options['addarticle']) && is_array($options['addarticle'])) {
            $posttype = get_post_type();
            foreach ($options['addarticle'] as $creativeWorkType => $postTypes) {
                if (!is_array($postTypes)) {
                    continue;
                }
                $addForPostTypes = array_keys($postTypes);
                if (in_array($posttype, $addForPostTypes)) {
                    // We are in a posttype that we want to add the article data for, but since we are not in the loop, get
                    // the author data in an arbitrary way

                    $class  = "\\LengthOfRope\\JSONLD\\Schema\\" . $creativeWorkType . "Schema";
                    $Schema = $class::factory();

                    if ($Schema instanceof Schema\ThingSchema) {
                        $Schema->setName(get_the_title());
                        $url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        if (is_array($url)) {
                            $Schema->setImage(Schema\ImageObjectSchema::factory()->setUrl($url[0])->setWidth($url[1])->setHeight($url[2]));
                        } else {
                            // Skip this post since it has no image
                            continue;
                        }
                        if (has_excerpt()) {
                            $excerpt = get_the_excerpt();
                            if (!empty($excerpt)) {
                                $Schema->setDescription(strip_tags($excerpt));
                            }
                        }
                    }

                    // Article and blog require a headline, we simply set it to the post title.
                    if ($Schema instanceof Schema\ArticleSchema ||
                        $Schema instanceof Schema\BlogPostingSchema) {
                        $Schema->setHeadline(get_the_title());
                    }

                    if ($Schema instanceof Schema\CreativeWorkSchema) {
                        $Schema->setDatePublished(get_the_date('c'));
                        $Schema->setDateModified(get_the_modified_date('c'));

                        // Publisher is required
                        if ($Org !== false) {
                            // Set the organization if availble
                            $Schema->setPublisher($Org);
                        }

                        // mainEntityOfPage is recommended
                        $Schema->setMainEntityOfPage(get_permalink());
                    }

                    // Add author
                    $Author = false;
                    if (isset($options['addauthor']) && is_array($options['addauthor']) && isset($options['addauthor'][$creativeWorkType])) {
                        $authorF    = get_the_author_meta('first_name', $postAuthorID);
                        $authorL    = get_the_author_meta('last_name', $postAuthorID);
                        $author    = trim($authorF . " " . $authorL);
                        $authormail = get_the_author_meta('email', $postAuthorID);
                        $authorurl  = get_the_author_meta('url', $postAuthorID);

                        $Author = Schema\PersonSchema::factory();
                        if (!empty($author)) {
                            $Author->setName($author);
                        }
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

                        $Schema->setAuthor($Author);
                    }

                    if ($Org === false && $Author !== false) {
                        // Set the author as publisher if organization is not available
                        $Schema->setPublisher($Author);
                    }


                    $hasData = true;
                    $Create->add($Schema);
                }
            }
        }

        if ($hasData) {
            return $content . $Create->getJSONLDScript() . PHP_EOL;
        }

        return $content;
    }

}
