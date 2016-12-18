<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NextBuzz\SEO\Translate\Drivers;

/**
 * Use WPML for custom translations
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class WPML implements \NextBuzz\SEO\Translate\Interfaces\Translate
{
    private $package = array(
        'kind' => 'Buzz SEO',
        'name' => 'Buzz SEO',
        'title' => 'Buzz SEO',
    );

    /**
     * Check if the driver is available.
     *
     * @return boolean True if the driver is ready for use.
     */
    public function isAvailable()
    {
        return defined('ICL_LANGUAGE_CODE');
    }

    /**
     * Registers the string to the translation plugin.
     *
     * @param string $text The string to register to the multilingual plugin.
     * @param boolean $multiline True if multiline text, false otherwise.
     * @param string $context The context of the registered string.
     * @param string $identifier A unique identifier ie. plugin name
     */
    public function register($text, $multiline = false, $context = 'Buzz SEO', $identifier = 'buzz-seo')
    {
        do_action('wpml_register_string', $text, $text, $this->package, $context, $multiline ? 'AREA' : 'LINE');
    }


    /**
     * Retrieve a translated string from the translation plugin.
     *
     * @param string $text The string to get the translated content for from the multilingual plugin.
     * @return string
     */
    public function translate($text)
    {
        return apply_filters('wpml_translate_string', $text, $text, $this->package);
    }

    /**
     * Get the default language
     *
     * @return string
     */
    public function getDefaultLanguage()
    {
        return wpml_get_default_language();
    }

    /**
     * Get an array with all available translations for a given post
     *
     * @param int $postID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedPosts($postID)
    {
        $postType = get_post_type($postID);
        $languages = icl_get_languages('skip_missing=1');

        $result = array();
        foreach($languages as $lang) {
            $transPostID = apply_filters('wpml_object_id', $postID, $postType, false, $lang['language_code']);
            if (is_int($transPostID) && $transPostID !== $postID) {
                $result[$lang['language_code']] = $transPostID;
            }
        }

        return $result;
    }

    /**
     * Get an array with all available translations for a given term
     *
     * @param int $postID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedTerms($postID)
    {
        // TODO: implement this function for WPML
        return array();
    }


    /**
     * Get posts in a specific language.
     *
     * @param string $lang The language code
     * @param array $args Array with get_posts arguments
     */
    public function getPostsByLanguage($lang, $args)
    {
        global $sitepress;
        $current_lang = $sitepress->get_current_language();
        $sitepress->switch_lang($lang);

        $args['suppress_filters'] = false;
        $results = get_posts($args);

        $sitepress->switch_lang($current_lang);

        return $results;
    }

    /**
     * Force language plugin to return the permalink of the given ID.
     * This might be required in some situation using WPML.
     *
     * @global object $sitepress
     * @param int $postID
     * @param string|bool $lang
     * @return string
     */
    public function getPermalink($postID, $lang = false)
    {
        if (!$lang) {
            return get_permalink($postID);
        }

        global $sitepress;
        // Get the current site language
        $currentLanguage = $sitepress->get_current_language();

        // Switch to the language we want to get the permalink for
        $sitepress->switch_lang($lang, true);

        // Get permalink
        $permalink = get_permalink($postID);

        // Restore site language
        $sitepress->switch_lang($currentLanguage, true);

        // Return permalink
        return $permalink;
    }
}
