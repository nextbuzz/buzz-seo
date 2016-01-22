<?php

namespace NextBuzz\SEO\PHPTAL\Settings;

/**
 * BuzzSEO
 *
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 */
class General extends \NextBuzz\SEO\PHPTAL\SettingsPage
{

    public function __construct()
    {
        parent::__construct('SettingsGeneral');

        $availableSeps = array(
            array('item' => '-'),
            array('item' => '—'),
            array('item' => '·'),
            array('item' => '•'),
            array('item' => '*'),
            array('item' => '⋆'),
            array('item' => '|'),
            array('item' => '~'),
            array('item' => '«'),
            array('item' => '»'),
            array('item' => '<'),
            array('item' => '>'),
        );

        foreach ($availableSeps as &$sep) {
            $sep['selected'] = ($sep['item'] === $this->options['titleseparator']);
        }

        $this->setTalData('availableSeps', $availableSeps);

        // Get posttypes
        $postTypes = get_post_types(array('public' => true), 'objects');
        foreach ($postTypes as &$postType) {
            // Unentitiy labels because default translations contain entities
            $postType->label = html_entity_decode($postType->label, ENT_QUOTES, "UTF-8");
        }

        // Get taxonomies
        $taxonomyTypes = get_taxonomies(array('public' => true), 'objects');
        foreach ($taxonomyTypes as &$taxonomy) {
            // Unentitiy labels because default translations contain entities
            $taxonomy->label = html_entity_decode($taxonomy->label, ENT_QUOTES, "UTF-8");
        }

        $this->setTalData(array(
            'postTypes' => $postTypes,
            'taxonomyTypes' => $taxonomyTypes,
            'archiveTranslation' => __("archive", "buzz-seo")
        ));
    }

}
