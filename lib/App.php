<?php

namespace NextBuzz\SEO;

/**
 * This is the base class which starts everything
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class App
{

    public function __construct()
    {
        // Always init
        add_action('plugins_loaded', array($this, 'pluginsLoaded'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueAdminScripts'));

        if (!is_admin()) {
            // Only add frontend stuff
            add_action('init', array($this, 'initFront'));
        } else {
            // Only add backend stuff
            add_action('admin_init', array($this, 'initBack'));
        }
    }

    /**
     * Code to run when plugins are loaded.
     *
     * @return void
     */
    public function pluginsLoaded()
    {
        // Load the translation file
        load_plugin_textdomain('buzz-seo', false, BUZZSEO_DIR_REL . '/languages');
    }

    /**
     * Initialize everything that is only needed in frontend
     *
     * @return void
     */
    public function initFront()
    {

    }

    /**
     * Initialize everything that is only needed in backend
     *
     * @return void
     */
    public function initBack()
    {
        // Load SEO box for all Single pages
        new PHPTAL\MetaBox('PostSEOBox', __('Search Engine Optimization (SEO)', 'buzz-seo'));
        new PHPTAL\MetaBox('PostSEOBoxAnalysis', __('SEO Content Analysis', 'buzz-seo'));
    }

    /**
     * Enqueue admin scripts and styles
     */
    public function enqueueAdminScripts()
    {
        wp_enqueue_style('buzz-seo-admin', plugins_url('buzz-seo/css/admin.css'), false, BUZZSEO_VERSION);
        wp_enqueue_script('buzz-seo-admin-js', plugins_url('buzz-seo/js/admin.js'), array('jquery'), BUZZSEO_VERSION);
        wp_localize_script('buzz-seo-admin-js', 'LORSEOData', array(
            'Analysis' => array(
                array(
                    'id' => 'wordCount',
                    'data' => array(
                        array(
                            'min' => 300,
                            'score' => 10,
                            'text' => __('The text contains {0} words, this is more than the {1} word recommended minimum.', 'buzz-seo')
                        ),
                        array(
                            'min' => 250,
                            'max' => 299,
                            'score' => 7,
                            'text' => __('The text contains {0} words, this is slightly below the {1} word recommended minimum. Add a bit more copy.', 'buzz-seo')
                        ),
                        array(
                            'min' => 200,
                            'max' => 249,
                            'score' => 5,
                            'text' => __('The text contains {0} words, this is below the {1} word recommended minimum. Add a little more useful content on this topic for readers.', 'buzz-seo')
                        ),
                        array(
                            'min' => 100,
                            'max' => 199,
                            'score' => 3,
                            'text' => __('The text contains {0} words, this is below the {1} word recommended minimum. Add more useful content on this topic for readers.', 'buzz-seo')
                        ),
                        array(
                            'min' => 0,
                            'max' => 99,
                            'score' => 1,
                            'text' => __('The text contains {0} word(s). This is far too low and should be increased.', 'buzz-seo')
                        )
                    )
                ),
                array(
                    'id' => 'metaDescriptionLength',
                    'data' => array(
                        array(
                            'min' => 158,
                            'score' => 5,
                            'text' => __('The specified meta description is {2} character(s) over the {1} available. Reducing it will ensure the entire description is visible.', 'buzz-seo')
                        ),
                        array(
                            'min' => 0,
                            'max' => 0,
                            'score' => 1,
                            'text' => __('No meta description has been specified, search engines will display copy from the page instead.', 'buzz-seo')
                        ),
                        array(
                            'min' => 1,
                            'max' => 120,
                            'score' => 6,
                            'text' => __('The meta description is {0} character(s), however up to {1} characters are available.', 'buzz-seo')
                        ),
                        array(
                            'min' => 121,
                            'max' => 157,
                            'score' => 10,
                            'text' => __('The meta description has an optimal length of {0} out of max {1} characters.', 'buzz-seo')
                        )
                    )
                ),
                array(
                    'id' => 'subHeadings',
                    'data' => array(
                        array(
                            'max' => 0,
                            'score' => 1,
                            'text' => __('No subheading tags (like an H2) appear in the copy.', 'buzz-seo')
                        ),
                        array(
                            'min' => 1,
                            'score' => 10,
                            'text' => __('Subheadings appear in the copy.', 'buzz-seo')
                        )
                    )
                ),
                array(
                    'id' => 'pageTitleLength',
                    'data' => array(
                        array(
                            'max' => 0,
                            'score' => 1,
                            'text' => __('Please create a page title.', 'buzz-seo')
                        ),
                        array(
                            'min' => 1,
                            'max' => 39,
                            'score' => 6,
                            'text' => __('The page title contains %3$d characters, which is less than the recommended minimum of %1$d characters.', 'buzz-seo')
                        ),
                        array(
                            'min' => 40,
                            'max' => 70,
                            'score' => 9,
                            'text' => __('The page title is between the %1$d character minimum and the recommended %2$d character maximum.', 'buzz-seo')
                        )
                    )
                ),
            )
        ));
    }

}
