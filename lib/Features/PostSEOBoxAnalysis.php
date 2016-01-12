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
            'noErrors' => __('There are currently no errors found in the analysis.', 'buzz-seo'),
            'noWarnings' => __('There are currently no warnings found in the analysis.', 'buzz-seo'),
            'noGood' => __('There is probably a lot wrong with your content SEO wise.', 'buzz-seo'),
            'data' => array(
                array(
                    'id' => 'wordCount',
                    'info' => array(
                        'recommendedMin' => 300,
                        'recommendedMax' => -1,
                    ),
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
                    'info' => array(
                        'recommendedMin' => 121,
                        'recommendedMax' => 157,
                    ),
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
                    'info' => array(),
                    'data' => array(
                        array(
                            'min' => 0,
                            'max' => 0,
                            'score' => 5,
                            'text' => __('No subheading tags (like an H2) appear in the copy.', 'buzz-seo')
                        ),
                        array(
                            'min' => 1,
                            'score' => 8,
                            'text' => __('Subheadings appear in the copy.', 'buzz-seo')
                        )
                    )
                ),
                array(
                    'id' => 'pageTitleLength',
                    'info' => array(
                        'recommendedMin' => 40,
                        'recommendedMax' => 70,
                    ),
                    'data' => array(
                        array(
                            'min' => 0,
                            'max' => 0,
                            'score' => 1,
                            'text' => __('Please create a page title.', 'buzz-seo')
                        ),
                        array(
                            'min' => 1,
                            'max' => 29,
                            'score' => 4,
                            'text' => __('The page title contains {0} characters, which is less than the recommended minimum of {3} characters.', 'buzz-seo')
                        ),
                        array(
                            'min' => 30,
                            'max' => 39,
                            'score' => 6,
                            'text' => __('The page title contains {0} characters, which is slightly less than the recommended minimum of {3} characters.', 'buzz-seo')
                        ),
                        array(
                            'min' => 40,
                            'max' => 70,
                            'score' => 9,
                            'text' => __('The page title is between the {3} character minimum and the recommended {1} character maximum.', 'buzz-seo')
                        ),
                        array(
                            'min' => 71,
                            'score' => 6,
                            'text' => __('The specified meta description is {2} character(s) over the {1} available. Reducing it will ensure the entire title is visible.', 'buzz-seo')
                        ),
                    )
                ),
                array(
                    'id' => 'keyphraseSizeCheck',
                    'info' => array(
                        'recommendedMin' => 1,
                        'recommendedMax' => 10,
                    ),
                    'data' => array(
                        array(
                            'min' => 0,
                            'max' => 0,
                            'score' => 1,
                            'text' => __('No main focus keyword was set for this page.', 'buzz-seo')
                        ),
                        array(
                            'min' => 1,
                            'max' => 10,
                            'score' => 8,
                            'text' => __('Your main focus keyword has a valid length.', 'buzz-seo')
                        ),
                        array(
                            'min' => 11,
                            'score' => 4,
                            'text' => __('Your main focus keyphrase is over {2} words, a keyphrase should be shorter.', 'buzz-seo')
                        )
                    )
                ),
                array(
                    'id' => 'keywordDensity',
                    'info' => array(
                        'recommendedMin' => 0.5,
                        'recommendedMax' => 2.5,
                    ),
                    'data' => array(
                        array(
                            'min' => 3.5,
                            'max' => 100,
                            'score' => 1,
                            'text' => __('The keyword density for `{1}` is {0}%, which is way over the advised {2}% maximum. The focus keyword was found {3} time(s).', 'buzz-seo')
                        ),
                        array(
                            'min' => 2.51,
                            'max' => 3.49,
                            'score' => 4,
                            'text' => __('The keyword density for `{1}` is {0}%, which over the advised {2}% maximum. The focus keyword was found {3} time(s).', 'buzz-seo')
                        ),
                        array(
                            'min' => 0.5,
                            'max' => 2.50,
                            'score' => 8,
                            'text' => __('The keyword density for `{1}` is {0}%, which is great. The focus keyword was found {3} time(s).', 'buzz-seo')
                        ),
                        array(
                            'min' => 0,
                            'max' => 0.49,
                            'score' => 4,
                            'text' => __('The keyword density for `{1}` is {0}%, which is low. The focus keyword was found {3} time(s).', 'buzz-seo')
                        ),
                    )
                ),
                array(
                    'id' => 'metaDescriptionKeyword',
                    'info' => array(
                        'recommendedMin' => 1,
                        'recommendedMax' => -1,
                    ),
                    'data' => array(
                        array(
                            'min' => 0,
                            'max' => 0,
                            'score' => 3,
                            'text' => __('The meta description does not contain the main focus keyword.', 'buzz-seo')
                        ),
                        array(
                            'min' => 1,
                            'score' => 8,
                            'text' => __('The meta description contains the focus keyword.', 'buzz-seo')
                        )
                    )
                ),
                array(
                    'id' => 'firstParagraph',
                    'info' => array(
                        'recommendedMin' => 1,
                        'recommendedMax' => -1,
                    ),
                    'data' => array(
                        array(
                            'min' => 0,
                            'max' => 0,
                            'score' => 3,
                            'text' => __('The main focus keyword does not appear in the first paragraph of the copy.', 'buzz-seo')
                        ),
                        array(
                            'min' => 1,
                            'score' => 9,
                            'text' => __('The main focus keyword appears in the first paragraph.', 'buzz-seo')
                        )
                    )
                ),
                array(
                    'id' => 'pageTitleKeyword',
                    'info' => array(
                        'recommendedMin' => 1,
                        'recommendedMax' => -1,
                    ),
                    'data' => array(
                        array(
                            'min' => 0,
                            'max' => 0,
                            'score' => 3,
                            'text' => __('The main focus keyword does not appear in the page title.', 'buzz-seo')
                        ),
                        array(
                            'min' => 1,
                            'score' => 9,
                            'text' => __('The main focus keyword appears in the page title.', 'buzz-seo')
                        )
                    )
                )
            )
        ));
    }

}
