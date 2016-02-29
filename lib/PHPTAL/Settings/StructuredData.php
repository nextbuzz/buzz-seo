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

        // Creative Works
        $creativeWorks = array(
            'Article' => array(
                'name' => __('Article', 'buzz-seo'),
                'intro' => __('An article, such as a news article or piece of investigative report. Newspapers and magazines have articles of many different types and this is intended to cover them all.', 'buzz-seo'),
                'addauthoroption' => true,
            ),
            'BlogPosting' => array(
                'name' => __('Blog posting', 'buzz-seo'),
                'intro' => __('A blog post', 'buzz-seo'),
                'addauthoroption' => true,
            ),
            'Book' => array(
                'name' => __('Book', 'buzz-seo'),
                'intro' => __('A book', 'buzz-seo'),
            ),
            'Code' => array(
                'name' => __('Code', 'buzz-seo'),
                'intro' => __('Computer programming source code. Example: Full (compile ready) solutions, code snippet samples, scripts, templates.', 'buzz-seo'),
                'addauthoroption' => true,
            ),
            'Game' => array(
                'name' => __('Game', 'buzz-seo'),
                'intro' => __('A game', 'buzz-seo'),
            ),
            'Movie' => array(
                'name' => __('Movie', 'buzz-seo'),
                'intro' => __('A movie', 'buzz-seo'),
            ),
            'MusicRecording' => array(
                'name' => __('Music recording', 'buzz-seo'),
                'intro' => __('A music recording (track), usually a single song.', 'buzz-seo'),
            ),
            'Painting' =>  array(
                'name' => __('Painting', 'buzz-seo'),
                'intro' => __('A painting', 'buzz-seo'),
                'addauthoroption' => true,
            ),
            'Photograph' => array(
                'name' => __('Photograph', 'buzz-seo'),
                'intro' => __('A photograph', 'buzz-seo'),
                'addauthoroption' => true,
            ),
            'Recipe' => array(
                'name' => __('Recipe', 'buzz-seo'),
                'intro' => __('A recipe', 'buzz-seo'),
                'addauthoroption' => true,
            ),
        );

        // Get posttypes
        $postTypes = get_post_types(array('public' => true), 'objects');
        foreach ($postTypes as &$postType)
        {
            // Unentitiy labels because default translations contain entities
            $postType->label = html_entity_decode($postType->label, ENT_QUOTES, "UTF-8");
        }

        $this->setTalData(array(
            'postTypes' => $postTypes,
            'creativeWorks' => $creativeWorks,
        ));
    }

}
