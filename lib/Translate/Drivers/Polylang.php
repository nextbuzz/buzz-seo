<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NextBuzz\SEO\Translate\Drivers;

/**
 * Use PolyLang for custom translations
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Polylang implements \NextBuzz\SEO\Translate\Interfaces\Translate
{
    /**
     * Check if the driver is available.
     *
     * @return boolean True if the driver is ready for use.
     */
    public function isAvailable() {
        return function_exists('pll_register_string');
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
        pll_register_string($identifier, $text, $context, $multiline);
    }

    /**
     * Retrieve a translated string from the translation plugin.
     *
     * @param string $text The string to get the translated content for from the multilingual plugin.
     * @return string
     */
    public function translate($text)
    {
        return pll__($text);
    }

    /**
     * Get the default language
     *
     * @return string
     */
    public function getDefaultLanguage()
    {
        return pll_default_language();
    }

    /**
     * Get an array with all available translations for a given post
     *
     * @param int $postID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedPosts($postID)
    {
        $languages = pll_the_languages(array('raw'=>1));

        $result = array();
        foreach($languages as $lang) {
            $lang = $lang['slug'];

            $transPostID = pll_get_post($postID, $lang);
            if (is_int($transPostID) && $transPostID !== $postID) {
                $result[$lang] = $transPostID;
            }
        }

        return $result;
    }

    /**
     * Get an array with all available translations for a given term
     *
     * @param int $termID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedTerms($termID)
    {
        $languages = pll_the_languages(array('raw'=>1));

        $result = array();
        foreach($languages as $lang) {
            $lang = $lang['slug'];

            $transTermID = pll_get_term($termID, $lang);
            if (is_int($transTermID) && $transTermID !== $termID) {
                $result[$lang] = $transTermID;
            }
        }

        return $result;
    }
}
