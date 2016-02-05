<?php

namespace NextBuzz\SEO\PHPTAL\Settings;

/**
 * XML Sitemaps admin interface handler.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class StructuredData extends \NextBuzz\SEO\PHPTAL\SettingsPage
{

    public function __construct()
    {
        parent::__construct('SettingsStructuredData');

        // Get posttypes
        $postTypes = get_post_types(array('public' => true), 'objects');
        foreach ($postTypes as &$postType) {
            // Unentitiy labels because default translations contain entities
            $postType->label = html_entity_decode($postType->label, ENT_QUOTES, "UTF-8");
        }

        $this->setTalData(array(
            'postTypes' => $postTypes,
        ));
    }

}
