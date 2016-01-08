<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class PostSEOBoxAnalysis extends BaseFeature
{

    public function init()
    {
        if (!is_admin()) {
            return;
        }

        add_action('admin_init', array($this, 'initBack'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueAdminScripts'));
    }

    /**
     * Initialize everything that is only needed in backend
     *
     * @return void
     */
    public function initBack()
    {
        // Load SEO box for all Single pages
        new \NextBuzz\SEO\PHPTAL\MetaBox('PostSEOBoxAnalysis', __('SEO Content Analysis', 'buzz-seo'));
    }

    /**
     * Enqueue admin scripts and styles
     */
    public function enqueueAdminScripts()
    {
        wp_localize_script('buzz-seo-admin-js', 'BuzzSEOAnalysis', array(
            array(
                'id'   => 'wordCount',
                'data' => array(
                    array(
                        'min'   => 300,
                        'score' => 10,
                        'text'  => __('The text contains {0} words, this is more than the {1} word recommended minimum.', 'buzz-seo')
                    ),
                    array(
                        'min'   => 250,
                        'max'   => 299,
                        'score' => 7,
                        'text'  => __('The text contains {0} words, this is slightly below the {1} word recommended minimum. Add a bit more copy.', 'buzz-seo')
                    ),
                    array(
                        'min'   => 200,
                        'max'   => 249,
                        'score' => 5,
                        'text'  => __('The text contains {0} words, this is below the {1} word recommended minimum. Add a little more useful content on this topic for readers.', 'buzz-seo')
                    ),
                    array(
                        'min'   => 100,
                        'max'   => 199,
                        'score' => 3,
                        'text'  => __('The text contains {0} words, this is below the {1} word recommended minimum. Add more useful content on this topic for readers.', 'buzz-seo')
                    ),
                    array(
                        'min'   => 0,
                        'max'   => 99,
                        'score' => 1,
                        'text'  => __('The text contains {0} word(s). This is far too low and should be increased.', 'buzz-seo')
                    )
                )
            ),
            array(
                'id'   => 'metaDescriptionLength',
                'data' => array(
                    array(
                        'min'   => 158,
                        'score' => 5,
                        'text'  => __('The specified meta description is {2} character(s) over the {1} available. Reducing it will ensure the entire description is visible.', 'buzz-seo')
                    ),
                    array(
                        'min'   => 0,
                        'max'   => 0,
                        'score' => 1,
                        'text'  => __('No meta description has been specified, search engines will display copy from the page instead.', 'buzz-seo')
                    ),
                    array(
                        'min'   => 1,
                        'max'   => 120,
                        'score' => 6,
                        'text'  => __('The meta description is {0} character(s), however up to {1} characters are available.', 'buzz-seo')
                    ),
                    array(
                        'min'   => 121,
                        'max'   => 157,
                        'score' => 10,
                        'text'  => __('The meta description has an optimal length of {0} out of max {1} characters.', 'buzz-seo')
                    )
                )
            ),
            array(
                'id'   => 'subHeadings',
                'data' => array(
                    array(
                        'max'   => 0,
                        'score' => 1,
                        'text'  => __('No subheading tags (like an H2) appear in the copy.', 'buzz-seo')
                    ),
                    array(
                        'min'   => 1,
                        'score' => 10,
                        'text'  => __('Subheadings appear in the copy.', 'buzz-seo')
                    )
                )
            ),
            array(
                'id'   => 'pageTitleLength',
                'data' => array(
                    array(
                        'max'   => 0,
                        'score' => 1,
                        'text'  => __('Please create a page title.', 'buzz-seo')
                    ),
                    array(
                        'min'   => 1,
                        'max'   => 39,
                        'score' => 6,
                        'text'  => __('The page title contains {2} characters, which is less than the recommended minimum of {0} characters.', 'buzz-seo')
                    ),
                    array(
                        'min'   => 40,
                        'max'   => 70,
                        'score' => 9,
                        'text'  => __('The page title is between the {0} character minimum and the recommended {1} character maximum.', 'buzz-seo')
                    )
                )
            )
        ));
    }

}
