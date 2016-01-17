<?php

namespace NextBuzz\SEO\PHPTAL\Settings;

/**
 * XML Sitemaps admin interface handler.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Sitemaps extends \NextBuzz\SEO\PHPTAL\SettingsPage
{

    public function __construct($tplName)
    {
        parent::__construct('SettingsXML');

        // Get all public post types
        $postTypes = get_post_types(array(
            'public' => true,
            ), 'object');

        $postTypeList = array();
        foreach ($postTypes as $key => $postType)
        {
            array_push($postTypeList, array(
                'key' => $key,
                'name' => $postType->labels->name,
                'check' => isset($this->options['posttypes'][$key]) && $this->options['posttypes'][$key] === "1",
            ));
        }
        
        // Get all public taxonomies
        $taxonomies = get_taxonomies(array(
            'public' => true,
            ), 'object');

        $taxonomyList = array();
        foreach ($taxonomies as $key => $postType)
        {
            array_push($taxonomyList, array(
                'key' => $key,
                'name' => $postType->labels->name,
                'check' => isset($this->options['taxonomies'][$key]) && $this->options['taxonomies'][$key] === "1",
            ));
        }

        // Output post types and taxonomies to TAL
        $this->setTalData(array(
            'sitemapURL' => home_url('/sitemap.xml'),
            'postTypes' => $postTypeList,
            'taxonomies' => $taxonomyList,
        ));
    }
}
