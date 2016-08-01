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
     * Retrieve a translated string from the translation plugin.
     *
     * @param string $text The string to get the translated content for from the multilingual plugin.
     * @return string
     */
    public function translate($text)
    {
        return self::$driver->translate($text);
    }

}
