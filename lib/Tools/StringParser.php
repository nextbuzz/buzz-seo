<?php

namespace NextBuzz\SEO\Tools;

/**
 * This class provides some string utilities.
 * Code borrowed from \LengthOfRope\Treehouse\Utils
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class StringParser
{

    protected $string = "";

    /**
     * Create the String object
     *
     * @param string $string The string to perform some things to
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * A simple factory to allow chaining
     *
     * @param string $string The string to perform some things to
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public static function factory($string)
    {
        return new StringParser($string);
    }

    /**
     * This will trim each line in a multiline string.
     *
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public function trimMultiline()
    {
        $this->string = trim(implode("\n", array_map('trim', explode("\n", $this->string))));

        return $this;
    }

    /**
     * This wil trim a string.
     *
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public function trim()
    {
        $this->string = trim($this->string);

        return $this;
    }

    /**
     * Escape HTML using the WordPress esc_html function.
     *
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public function escapeHTML()
    {
        $this->string = esc_html($this->string);

        return $this;
    }

    /**
     * Escape attributes using the WordPress esc_attr function.
     *
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public function escapeAttr()
    {
        $this->string = esc_attr($this->string);

        return $this;
    }

    /**
     * Replaces double line-breaks with paragraph elements.
     *
     * @param bool   $br  If true, this will convert all remaining line-breaks after paragraphing.
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public function autoParagraph($lineBreak = true)
    {
        $this->string = wpautop($this->string, $lineBreak);

        return $this;
    }

    /**
     * Strip tags
     *
     * @param string $allowableTags Tags to allow, i.e. '<p><a>'
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public function stripTags($allowableTags = '')
    {
        $this->string = strip_tags($this->string, $allowableTags);

        return $this;
    }

    /**
     * Convert string to uppercase (using multibyte).
     *
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public function toUpper()
    {
        $this->string = mb_convert_case($this->string, MB_CASE_UPPER, "UTF-8");

        return $this;
    }

    /**
     * Convert string to lowercase (using multibyte).
     *
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public function toLower()
    {
        $this->string = mb_convert_case($this->string, MB_CASE_LOWER, "UTF-8");

        return $this;
    }

    /**
     * Make a strings's first character uppercase (using multibyte).
     *
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public function toUpperFirst()
    {
        $this->string = mb_strtoupper(mb_substr($this->string, 0, 1)) . mb_substr($this->string, 1);

        return $this;
    }

    /**
     * Uppercase the first character of each word in a string (using multibyte).
     *
     * @return \LengthOfRope\Treehouse\Utils\StringParser
     */
    public function toUpperWords()
    {
        $this->string = mb_convert_case($this->string, MB_CASE_TITLE, "UTF-8");

        return $this;
    }

    /**
     * Add a trailing slash if it does not end with a file.
     *
     * I.E. 'demo' becomes 'demo/'
     *      'demo/demo.php' becomes 'demo/demo.php'
     *
     * This uses WordPress trailingslashit but adds additional file-check.
     *
     * @return \NextBuzz\SEO\Tools\StringParser
     */
    public function trailingSlashIt()
    {
        $parts = explode('/', $this->string);
        $popped = array_pop($parts);
        if (substr_count($popped, '.') === 0) {
            $this->string = trailingslashit($this->string);
        }

        return $this;
    }

    /**
     * Remove trailing slash.
     *
     * Equivalent of WordPress untrailingslashit
     *
     * @return \NextBuzz\SEO\Tools\StringParser
     */
    public function unTrailingSlashIt()
    {
        $this->string = untrailingslashit($this->string);

        return $this;
    }

    /**
     * Return the parsed string
     *
     * @return string
     */
    public function get()
    {
        return $this->string;
    }

    /**
     * Return the parsed string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->get();
    }

}
