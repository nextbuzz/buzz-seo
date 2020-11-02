<?php
/**
 * The Redirections Import Class
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Admin\Importers
 * @author     Rank Math <support@rankmath.com>
 */

namespace NextBuzz\SEO\RankMath;

use RankMath\Helper;
use RankMath\Admin\Admin_Helper;
use RankMath\Redirections\Redirection;
use RankMath\Schema\JsonLD;
use RankMath\Schema\Singular;
use MyThemeShop\Helpers\DB;

defined( 'ABSPATH' ) || exit;

/**
 * Redirections class.
 */
class RankMathExporter extends \RankMath\Admin\Importers\Plugin_Importer {

	/**
	 * The plugin name.
	 *
	 * @var string
	 */
	protected $plugin_name = 'Buzz SEO';

    /**
     * Plugin options meta key.
     *
     * @var string
     */
    protected $meta_key = '_metaboxPostSEOBox';

    /**
	 * Option keys to import and clean.
	 *
	 * @var array
	 */
	protected $option_keys = ['_settingsSettingsGeneral'];

	/**
	 * Choices keys to import.
	 *
	 * @var array
	 */
    //protected $choices = [ 'settings', 'postmeta', 'termmeta'];
    protected $choices = ['postmeta'];

    /**
     * Import general settings of plugin.
     *
     * @return bool
     */
	protected function settings()
    {
        return true;
    }

    /**
     * Import post meta of plugin.
     *
     * @return array
     */
    protected function postmeta() {
        $this->set_pagination( $this->get_post_ids( true ) );

        $post_ids = $this->get_post_ids();

        //$this->set_primary_term( $post_ids );

        // Set Converter.
        $this->json_ld = new JsonLD();
        $this->single  = new Singular();

        foreach ( $post_ids as $post ) {
            $post_id = $post->ID;

            // Update meta
            $meta = get_post_meta($post_id, '_metaboxPostSEOBox', true);
            $metaAna = get_post_meta($post_id, '_metaboxPostSEOBoxAnalysis', true);
            update_post_meta($post_id, 'rank_math_title', $meta['pageTitle']);
            update_post_meta($post_id, 'rank_math_description', $meta['metaDescription']);
            update_post_meta($post_id, 'rank_math_focus_keyword', implode(',', $metaAna['keywords']));
            update_post_meta($post_id, 'rank_math_canonical_url', $meta['canonical']);
            update_post_meta($post_id, 'rank_math_facebook_title', $meta['fbTitle']);
            update_post_meta($post_id, 'rank_math_facebook_description', $meta['fbDescription']);
            update_post_meta($post_id, 'rank_math_facebook_image', $meta['fbMediaThumb']);
            update_post_meta($post_id, 'rank_math_facebook_image_id', $meta['fbMediaId']);
            update_post_meta($post_id, 'rank_math_twitter_title', $meta['twTitle']);
            update_post_meta($post_id, 'rank_math_twitter_description', $meta['twDescription']);
            update_post_meta($post_id, 'rank_math_twitter_image', $meta['twMediaThumb']);
            update_post_meta($post_id, 'rank_math_twitter_image_id', $meta['twMediaId']);
            update_post_meta($post_id, 'rank_math_breadcrumb_title', $meta['pageTitle']);

            // Update robots
            //$meta['robots'] = ['noindex' => 'noindex', 'nofollow' => 'nofollow'];
            $robots = [];
            foreach($meta['robots'] as $robot) {
                $robots[] = $robot;
            }
            if (!in_array('noindex', $robots)) {
                $robots[] = 'index';
            }
            update_post_meta($post_id, 'rank_math_robots', $robots);
        }

        return $this->get_pagination_arg();
    }

    /**
     * Import term meta of plugin.
     * TODO
     * @return array
     */
    protected function termmeta() {
        $data = get_option('_settingsSettingsGeneral', true);

        /*
        Array
        (
            [titleseparator] => •
            [showtitlepagination] => 1
            [showtitlesitename] => 1
            [posttypes] => Array
                (
                    [post] => Array
                    (
                        [titleprefix] =>
                            [titlesuffix] =>
                            [meta] =>
                        )

                    [page] => Array
                (
                    [titleprefix] =>
                        [titlesuffix] =>
                            [meta] =>
                        )

                    [attachment] => Array
                (
                    [titleprefix] =>
                        [titlesuffix] =>
                            [meta] =>
                        )

                    [diensten] => Array
                (
                    [titleprefix] =>
                        [titlesuffix] =>
                            [meta] =>
                        )

                    [portfolio] => Array
                (
                    [titleprefix] =>
                        [titlesuffix] =>
                            [meta] =>
                        )

                )

            [taxonomies] => Array
                (
                    [category] => Array
                    (
                        [titleprefix] =>
                        [titlesuffix] =>
                        [meta] =>
                        [robots] => Array
                        (
                            [noindex] => noindex
                            [nofollow] => nofollow
                        )
                    )

                    [post_tag] => Array
                (
                    [titleprefix] =>
                        [titlesuffix] =>
                            [meta] =>
                        )

                    [post_format] => Array
                (
                    [titleprefix] =>
                        [titlesuffix] =>
                            [meta] =>
                        )

                    [filter_category] => Array
                (
                    [titleprefix] =>
                        [titlesuffix] =>
                            [meta] =>
                        )

                )

            [archives] => Array
                (
                    [author] => Array
                    (
                        [titleprefix] =>
                            [titlesuffix] =>
                            [meta] =>
                        )

                    [date] => Array
                (
                    [titleprefix] =>
                        [titlesuffix] =>
                            [meta] =>
                        )

                )

        )*/

        // Sample code
        /*$count = 0;
        $terms = new \WP_Term_Query(
            [
                'meta_key'   => '_seopress_titles_title',
                'fields'     => 'ids',
                'hide_empty' => false,
                'get'        => 'all',
            ]
        );

        if ( empty( $terms ) || is_wp_error( $terms ) ) {
            return false;
        }

        $hash = [
            '_seopress_titles_title'         => 'rank_math_title',
            '_seopress_titles_desc'          => 'rank_math_description',
            '_seopress_robots_canonical'     => 'rank_math_canonical_url',
            '_seopress_social_fb_title'      => 'rank_math_facebook_title',
            '_seopress_social_fb_desc'       => 'rank_math_facebook_description',
            '_seopress_social_fb_img'        => 'rank_math_facebook_image',
            '_seopress_social_twitter_title' => 'rank_math_twitter_title',
            '_seopress_social_twitter_desc'  => 'rank_math_twitter_description',
            '_seopress_social_twitter_img'   => 'rank_math_twitter_image',
        ];

        foreach ( $terms->get_terms() as $term_id ) {
            $count++;

            $this->replace_meta( $hash, [], $term_id, 'term', 'convert_variables' );
            delete_term_meta( $term_id, 'rank_math_permalink' );
            $this->is_twitter_using_facebook( 'term', $term_id );
            //$this->set_object_robots( $term_id, 'term' );
            //$this->set_object_redirection( $term_id, 'term' );
        }*/

        return compact( 'count' );
    }
}
