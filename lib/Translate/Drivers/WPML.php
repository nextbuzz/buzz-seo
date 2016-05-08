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

}
