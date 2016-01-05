<?php

namespace LengthOfRope\SEO;

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
        load_plugin_textdomain('lor-seo', false, LORSEO_DIR_REL . '/languages');
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
        new PHPTAL\MetaBox('PostSEOBox', __('Search Engine Optimization (SEO)', 'lor-seo'));
        new PHPTAL\MetaBox('PostSEOBoxAnalysis', __('SEO Content Analysis', 'lor-seo'));
    }

    /**
     * Enqueue admin scripts and styles
     */
    public function enqueueAdminScripts()
    {
        wp_enqueue_style('lor-seo-admin', plugins_url('lor-seo/css/admin.css'), false, LORSEO_VERSION);
        wp_enqueue_script('lor-seo-admin-js', plugins_url('lor-seo/js/admin.js'), array('jquery'), LORSEO_VERSION);
        wp_localize_script('lor-seo-admin-js', 'LORSEOL10N', array(
            'Analyse' => array(
                'wordCount' => array(
                    'data' => array(
                        array(
                            'min' => 300,
                            'score' => 10,
                            'text' => __('The text contains %1$d words, this is more than the %2$d word recommended minimum.', 'lor-seo')
                        ),
                        array(
                            'min' => 250,
                            'max' => 299,
                            'score' => 7,
                            'text' => __('The text contains %1$d words, this is slightly below the %2$d word recommended minimum. Add a bit more copy.', 'lor-seo')
                        ),
                        array(
                            'min' => 200,
                            'max' => 249,
                            'score' => 5,
                            'text' => __('The text contains %1$d words, this is below the %2$d word recommended minimum. Add more useful content on this topic for readers.', 'lor-seo')
                        ),
                        array(
                            'min' => 100,
                            'max' => 199,
                            'score' => 3,
                            'text' => __('The text contains %1$d words, this is below the %2$d word recommended minimum. Add more useful content on this topic for readers.', 'lor-seo')
                        ),
                        array(
                            'min' => 0,
                            'max' => 99,
                            'score' => 1,
                            'text' => __('The text contains %1$d words. This is far too low and should be increased.', 'lor-seo')
                        )
                    )
                ),
                'metaDescriptionLength' => array(
                    'data' => array(
                        array(
                            'max' => 0,
                            'score' => 1,
                            'text' => __('No meta description has been specified, search engines will display copy from the page instead.', 'lor-seo')
                        ),
                        array(
                            'min' => 1,
                            'max' => 120,
                            'score' => 6,
                            'text' => __('The meta description is under %1$d characters, however up to %2$d characters are available.', 'lor-seo')
                        ),
                        array(
                            'min' => 121,
                            'max' => 157,
                            'score' => 5,
                            'text' => __('In the specified meta description, consider: How does it compare to the competition? Could it be made more appealing?', 'lor-seo')
                        ),
                        array(
                            'min' => 158,
                            'score' => 3,
                            'text' => __('The specified meta description is over %2$d characters. Reducing it will ensure the entire description is visible.', 'lor-seo')
                        )
                    )
                ),
                'subHeadings' => array(
                    'data' => array(
                        array(
                            'max' => 0,
                            'score' => 1,
                            'text' => __('No subheading tags (like an H2) appear in the copy.', 'lor-seo')
                        ),
                        array(
                            'min' => 1,
                            'score' => 10,
                            'text' => __('Subheadings appear in the copy.', 'lor-seo')
                        )
                    )
                ),
                'pageTitleLength' => array(
                    'data' => array(
                        array(
                            'max' => 0,
                            'score' => 1,
                            'text' => __('Please create a page title.', 'lor-seo')
                        ),
                        array(
                            'min' => 1,
                            'max' => 39,
                            'score' => 6,
                            'text' => __('The page title contains %3$d characters, which is less than the recommended minimum of %1$d characters.', 'lor-seo')
                        ),
                        array(
                            'min' => 40,
                            'max' => 70,
                            'score' => 9,
                            'text' => __('The page title is between the %1$d character minimum and the recommended %2$d character maximum.', 'lor-seo')
                        )
                    )
                ),
            )
        ));
    }

}
