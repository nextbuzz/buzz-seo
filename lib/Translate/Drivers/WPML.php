<?php

namespace NextBuzz\SEO\Translate\Drivers;

/**
 * Use WPML for custom translations
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 * @author srdjan <srdjan@icanlocalize.com>
 */
class WPML implements \NextBuzz\SEO\Translate\Interfaces\Translate
{

    private $package = array(
        'kind'  => 'Buzz SEO',
        'name'  => 'Buzz SEO',
        'title' => 'Buzz SEO',
    );

    /**
     * Check if the driver is available.
     *
     * @return boolean True if the driver is ready for use.
     */
    public function isAvailable()
    {
        return did_action('wpml_loaded');
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
        $postType  = get_post_type($postID);
        $languages = apply_filters('wpml_active_languages', array(), array('skip_missing' => 1));

        $result = array();
        foreach ($languages as $lang) {
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
     * @param int $termID
     * @return array Indexed array with as key the language code, and as value the post id
     */
    public function getTranslatedTerms($termID)
    {
        $term      = get_term_by('term_taxonomy_id', $termID);
        $languages = apply_filters('wpml_active_languages', array(), array('skip_missing' => 1));

        $result = array();
        foreach ($languages as $lang) {
            $transTermID = apply_filters('wpml_object_id', $termID, $term->taxonomy, false, $lang['language_code']);
            if (is_int($transTermID) && $transTermID !== $termID) {
                $result[$lang['language_code']] = $transTermID;
            }
        }
        return $result;
    }

    /**
     * Get posts in a specific language.
     *
     * @param string $lang The language code
     * @param array $args Array with get_posts arguments
     */
    public function getPostsByLanguage($lang, $args)
    {
        $current_lang = apply_filters('wpml_current_language', null);
        do_action('wpml_switch_language', $lang);

        $args['suppress_filters'] = false;
        $results                  = get_posts($args);

        do_action('wpml_switch_language', $current_lang);

        return $results;
    }

    /**
     * Get terms in a specific language.
     *
     * @param string $lang The language code
     * @param array $args Array with get_terms arguments
     */
    public function getTermsByLanguage($lang, $type)
    {
        $current_lang = apply_filters('wpml_current_language', null);
        do_action('wpml_switch_language', $lang);

        $args['suppress_filters'] = false;
        $results                  = get_terms($type);

        do_action('wpml_switch_language', $current_lang);

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

        // Get the current site language
        $currentLanguage = apply_filters('wpml_current_language', null);

        // Switch to the language we want to get the permalink for
        do_action('wpml_switch_language', $lang);

        // Get permalink
        $permalink = get_permalink($postID);

        // Restore site language
        do_action('wpml_switch_language', $currentLanguage);

        // Return permalink
        return $permalink;
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
        if (!$lang) {
            return get_term_link($termID);
        }

        // Get the current site language
        $currentLanguage = apply_filters('wpml_current_language', null);

        // Switch to the language we want to get the permalink for
        do_action('wpml_switch_language', $lang);

        // Get permalink
        $termlink = get_term_link($termID);

        // Restore site language
        do_action('wpml_switch_language', $currentLanguage);

        // Return termlink
        return $termlink;
    }

}
