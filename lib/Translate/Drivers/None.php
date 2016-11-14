<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace NextBuzz\SEO\Translate\Drivers;

/**
 * Use no translations at all. This is a fallback driver if no driver is available.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class None implements \NextBuzz\SEO\Translate\Interfaces\Translate
{

    /**
     * Check if the driver is available.
     *
     * @return boolean True if the driver is ready for use.
     */
    public function isAvailable()
    {
        return true;
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

    }

    /**
     * Retrieve a translated string from the translation plugin.
     *
     * @param string $text The string to get the translated content for from the multilingual plugin.
     * @return string
     */
    public function translate($text)
    {
        return $text;
    }

    /**
     * Get the default language
     *
     * @return string
     */
    public function getDefaultLanguage()
    {
        return '';
    }

    /**
     * Get an array with all available translations for a given post
     *
     * @param int $postID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedPosts($postID)
    {
        return array();
    }

    /**
     * Get an array with all available translations for a given term
     *
     * @param int $postID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedTerms($postID)
    {
        return array();
    }
}
