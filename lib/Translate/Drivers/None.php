<?php

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

    /**
     * Get posts in a specific language.
     *
     * @param string $lang The language code
     * @param array $args Array with get_posts arguments
     */
    public function getPostsByLanguage($lang, $args)
    {
        return get_posts($args);
    }

	/**
	 * Get terms in a specific language.
	 *
	 * @param string $lang The language code
	 * @param array $args Array with get_terms arguments
	 */
	public function getTermsByLanguage($lang, $args)
	{
		return get_terms($args);
	}

    /**
     * Force language plugin to return the permalink of the given ID.
     * This might be required in some situation using WPML.
     *
     * @param int $postID
     * @param string|bool $lang
     * @return string
     */
    public function getPermalink($postID, $lang = false)
    {
        return get_permalink($postID);
    }

    /**
     * Force language plugin to return the link of the given term ID.
     * This might be required in some situation using WPML.
     *
     * @param int $termID
     * @param string|bool $lang
     * @return string
     */
    public function getTermlink($termID, $lang = false)
    {
        return get_term_link($termID);
    }
}
