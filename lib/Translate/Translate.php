<?php

namespace NextBuzz\SEO\Translate;

/**
 * Description of Driver
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Translate
{

    private $drivers = array('Polylang', 'WPML');

    /* @var \NextBuzz\SEO\Translate\Interfaces\Translate $driver */
    private static $driver = false;
    private static $isMultilingualSite = false;

    public function __construct()
    {
        // Load the driver if not yet loaded
        if (self::$driver == false) {
            self::$isMultilingualSite = $this->initDriver();
        }
    }

    /**
     * Setup the driver
     *
     * @return boolean
     */
    private function initDriver()
    {
        foreach ($this->drivers as $item) {
            $class  = '\\NextBuzz\\SEO\\Translate\\Drivers\\' . $item;
            $driver = new $class();

            if ($driver->isAvailable()) {
                self::$driver = $driver;
                return true;
            }
        }

        // No driver available, so load the fallback driver
        self::$driver = new \NextBuzz\SEO\Translate\Drivers\None();

        return false;
    }

    public static function factory()
    {
        return new Translate();
    }

    /**
     * If a driver could be loaded, returns true, otherwise false
     *
     * @return boolean
     */
    public function siteIsMultilingual()
    {
        return self::$isMultilingualSite;
    }

    /**
     * Registers the string to the translation plugin.
     *
     * @param string $text The string to register to the multilingual plugin.
     * @param string $identifier A unique identifier so people can find the translation
     * @param string $context The context of the registered string.
     * @param boolean $multiline True if multiline text, false otherwise.
     */
    public function register($text, $identifier, $context = 'Buzz SEO', $multiline = false)
    {
        return self::$driver->register($text, $multiline, $context, $identifier);
    }

    /**
     * Get the default language
     * @return string
     */
    public function getDefaultLanguage()
    {
        return self::$driver->getDefaultLanguage();
    }

    /**
     * Get an array with all available translations for a given post
     *
     * @param int $postID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedPosts($postID)
    {
        return self::$driver->getTranslatedPosts($postID);
    }

    /**
     * Get an array with all available translations for a given post
     *
     * @param int $termID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedTerms($termID)
    {
        return self::$driver->getTranslatedTerms($termID);
    }
    /**
     * Retrieve a translated string from the translation plugin.
     *
     * @param string $text The string to get the translated content for from the multilingual plugin.
     * @return string
     */
    public function translate($text)
    {
        // We only translate strings
        if (!is_string($text)) {
            return $text;
        }
        return self::$driver->translate($text);
    }


    /**
     * Get posts in a specific language.
     *
     * @param string $lang The language code
     * @param array $args Array with get_posts arguments
     */
    public function getPostsByLanguage($lang, $args)
    {
        return self::$driver->getPostsByLanguage($lang, $args);
    }

    /**
     * Force language plugin to return the permalink of the given ID.
     * This might be required in some situation using WPML.
     *
     * @param int $postID
     * @param string|bool $lang
     * @return string
     */
    public function getPermalink($postID, $lang = false) {
        return self::$driver->getPermalink($postID, $lang);
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
        return self::$driver->getTermlink($termID, $lang);
    }
}
