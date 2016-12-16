<?php

namespace NextBuzz\SEO\Translate\Interfaces;

/**
 * Translation interface which allows connection with different translation plugins like PolyLang and WPML.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
interface Translate
{
    /**
     * Check if the driver is available.
     *
     * @return boolean True if the driver is ready for use.
     */
    public function isAvailable();

    /**
     * Registers the string to the translation plugin.
     *
     * @param string $text The string to register to the multilingual plugin.
     * @param boolean $multiline True if multiline text, false otherwise.
     * @param string $context The context of the registered string.
     * @param string $identifier A unique identifier ie. plugin name
     */
    public function register($text, $multiline = false, $context = 'Buzz SEO', $identifier = 'buzz-seo');

    /**
     * Retrieve a translated string from the translation plugin.
     *
     * @param string $text The string to get the translated content for from the multilingual plugin.
     * @return string
     */
    public function translate($text);

    /**
     * Get the default language
     *
     * @return string
     */
    public function getDefaultLanguage();

    /**
     * Get an array with all available translations for a given post
     *
     * @param int $postID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedPosts($postID);

    /**
     * Get an array with all available translations for a given term
     *
     * @param int $termID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedTerms($termID);

    /**
     * Get posts in a specific language.
     *
     * @param string $lang The language code
     * @param array $args Array with get_posts arguments
     */
    public function getPostsByLanguage($lang, $args);

}
