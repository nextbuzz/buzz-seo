<?php

namespace NextBuzz\SEO\Features;

/**
 * Description of Admin
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 * @author HeroBanana, Nick Vlug <nick@ruddy.nl>
 */
class Admin extends BaseFeature
{

    public function name()
    {
        return __("Admin Core", "buzz-seo");
    }

    public function desc()
    {
        return __("Admin Core of Buzz SEO.", "buzz-seo");
    }

    public function init()
    {
        // Front end actions
        add_filter('document_title_parts', array($this, 'filterTitleParts'), 15);
        add_filter('document_title_separator', array($this, 'filterTitleSeparator'), 15);

        // Register strings for translation
        add_action('plugins_loaded', array($this, 'registerTranslations'));

        // Everything below this is only used when in the admin interface
        if (!is_admin()) {
            return;
        }

        // Turn on output buffering in admin, so we can use wp_redirect in TAL
        add_action('admin_init', function() {
            ob_start();
        });

        // Check for title-tag theme support
        add_action('admin_init', array($this, 'checkTitleTagSupport'));
        add_action('admin_init', array($this, 'checkBlogPublic'));
        add_action('admin_init', array($this, 'checkPermalinkStructure'));

        add_action('admin_enqueue_scripts', array($this, 'enqueueAdminScripts'));

        add_action('admin_menu', array($this, 'createAdminMenu'));

        add_action('custom_menu_order', array($this, 'changeSubmenuOrder'));

        $this->initGithubUpdater();
    }

    /**
     * If multilingual site, register some strings
     */
    public function registerTranslations()
    {
        $translate = \NextBuzz\SEO\Translate\Translate::factory();

        if (!$translate->siteIsMultilingual()) {
            // Bail early
            return;
        }

        $options = get_option('_settingsSettingsGeneral', array());

        if (isset($options['posttypes'])) {
            $this->registerTranslationsOfType($translate, $options['posttypes'], __('Posttype', 'buzz-seo'));
        }

        if (isset($options['taxonomies'])) {
            $this->registerTranslationsOfType($translate, $options['taxonomies'], __('Taxonomy', 'buzz-seo'));
        }

        if (isset($options['archives'])) {
            $this->registerTranslationsOfType($translate, $options['archives'], __('Archive', 'buzz-seo'));
        }
    }

    /**
     * Register translations
     * @param \NextBuzz\SEO\Translate\Translate $translate The translate object
     * @param array $data An array with keys containing array with titleprefix, titlesuffix and meta
     */
    private function registerTranslationsOfType($translate, $data, $group)
    {
        foreach ($data as $key => $translates) {
            $translate->register($translates['titleprefix'], ucfirst($key) . ' ' . $group);
            $translate->register($translates['titlesuffix'], ucfirst($key) . ' ' . $group);
            $translate->register($translates['meta'], ucfirst($key) . ' ' . $group);
        }
    }

    /**
     * Make sure wordpress can translate the plugin metadata as well
     * This method is never called, but here to allow it to be added to the pot file.
     *
     * @ignore
     */
    public static function setupPluginMetadataTranslations()
    {
        $void = __('This is a WordPress SEO plugin. It covers the basics of SEO optimization. Requires PHP 5.3+ and WP 4.1+', 'buzz-seo');
        $void = __('Buzz SEO', 'buzz-seo');
    }

    public function allowDisable()
    {
        return false;
    }

    /*
     * Check if the theme allows WordPress to manage the document title.
     * Which is required to properly display the document titles
     */

    public function checkTitleTagSupport()
    {
        if (!current_theme_supports('title-tag')) {
            // Output a nag error on admin interface
            add_action('admin_notices',
                function() {
                echo '<div class="error"><p>' . __('The theme you are using is using the deprecated wp_title() functions which prevents Buzz SEO from generating the correct titles. Please ask your theme developer to update the theme.', 'buzz-seo') . '</p></div>';
            });
        }
    }

    /*
     * Check if the theme allows WordPress to manage the document title.
     * Which is required to properly display the document titles
     */

    public function checkBlogPublic()
    {
        global $pagenow;
        if ($pagenow === 'index.php' && !get_option('blog_public')) {
            // Output a nag error on admin interface
            add_action('admin_notices',
                function() {
                if (current_user_can('manage_options')) {
                    echo '<div class="notice notice-error"><p>' . sprintf(__('Search engines are not allowed to index the site. This is bad for SEO. Click <a href="%s">here</a> to adjust this.', 'buzz-seo'), admin_url('options-reading.php')) . '</p></div>';
                } else {
                    echo '<div class="notice notice-error"><p>' . __('Search engines are not allowed to index the site. This is bad for SEO. Please ask a WordPress administrator to change this.', 'buzz-seo') . '</p></div>';
                }
            });
        }
    }

    /*
     * Check if the theme allows WordPress to manage the document title.
     * Which is required to properly display the document titles
     */

    public function checkPermalinkStructure()
    {
        global $pagenow;
        if ($pagenow === 'index.php' && get_option('permalink_structure') === '') {
            // Output a nag error on admin interface
            add_action('admin_notices',
                function() {
                if (current_user_can('manage_options')) {
                    echo '<div class="notice notice-warning"><p>' . sprintf(__('Permalinks are set to the "default" value. If you want to take SEO seriously, you should change this. Also some features do not work properly in this mode. Click <a href="%s">here</a> to adjust this.', 'buzz-seo'), admin_url('options-permalink.php')) . '</p></div>';
                } else {
                    echo '<div class="notice notice-warning"><p>' . __('Permalinks are set to the "default" value. If you want to take SEO seriously, you should change this. Also some features do not work properly in this mode. Please ask a WordPress administrator to change this.', 'buzz-seo') . '</p></div>';
                }
            });
        }
    }

    /**
     * Enqueue admin scripts and styles
     */
    public function enqueueAdminScripts()
    {
        wp_enqueue_style('buzz-seo-admin', plugins_url('buzz-seo/css/admin.css'), false, BUZZSEO_VERSION);

        // All required for media upload
        wp_enqueue_media();

        wp_enqueue_script('buzz-seo-admin-js', plugins_url('buzz-seo/js/admin.js'),
            array('jquery', 'thickbox', 'media-upload'), BUZZSEO_VERSION, true);
        wp_localize_script('buzz-seo-admin-js', 'BuzzSEOAdmin',
            array(
            'MediaUploader' => array(
                'title'  => __('Select an image', 'buzz-seo'),
                'button' => __('Select', 'buzz-seo'),
            )
        ));
    }

    /**
     * Create Admin Menu
     */
    public function createAdminMenu()
    {
        global $submenu;

        if (!current_user_can('buzz_seo_settings')) {
            return;
        }

        // Add Menu Page and allow programmers to change its administrative name
        $name = apply_filters('buzz-seo-menu-name', 'Buzz SEO');
        add_menu_page($name, $name, 'buzz_seo_settings', 'BuzzSEO', array($this, "addAdminUI"), 'dashicons-analytics');

        // Make sure this submenu is only visiable for admin users.
        if (current_user_can('buzz_seo_settings_setup')) {
            // Add Settings Sub Option Page
            add_submenu_page('BuzzSEO', __('Settings', 'buzz-seo'), __('Settings', 'buzz-seo'), 'buzz_seo_settings_setup',
                'BuzzSEO_Settings', array($this, "addAdminUI"));

            // Rename Submenu
            $submenu['BuzzSEO'][0][0] = __('General', 'buzz-seo');
        }
    }

    public function changeSubmenuOrder($menu_ord)
    {
        global $submenu;

        // Make sure settings is always last if it exists
        if (isset($submenu['BuzzSEO'][1][2]) && $submenu['BuzzSEO'][1][2] === 'BuzzSEO_Settings') {
            $settings       = array_splice($submenu['BuzzSEO'], 1, 1);
            $settings[0][0] = '<div style="border-top: 1px solid rgba(255, 255, 255, .2); padding-top: .5rem;">' . $settings[0][0] . '</div>';
            array_push($submenu['BuzzSEO'], $settings[0]);
        }

        return $menu_ord;
    }

    /*
     * Add Admin UI
     */

    public function addAdminUI()
    {
        //Grab safe the page input.
        $page = filter_input(INPUT_GET, 'page');
        switch ($page) {
            case 'BuzzSEO':
                \NextBuzz\SEO\PHPTAL\Settings\General::factory()->render();
                break;

            case 'BuzzSEO_Settings':
                \NextBuzz\SEO\PHPTAL\Settings\Admin::factory()->render();
                break;
            default:
                break;
        }
    }

    /**
     * Update the title parts as set in the admin interface
     *
     * @param array $title
     * @return array
     */
    public function filterTitleParts($title)
    {
        $options = get_option('_settingsSettingsGeneral', true);

        if (!isset($options['showtitletagline']) && isset($title['tagline'])) {
            unset($title['tagline']);
        }

        if (!isset($options['showtitlepagination']) && isset($title['page'])) {
            unset($title['page']);
        }

        if (!isset($options['showtitlesitename']) && isset($title['site'])) {
            unset($title['site']);
        }

        // Update archive title if archive
        if (!is_singular()) {
            $translate = \NextBuzz\SEO\Translate\Translate::factory();
            if ($translate->siteIsMultilingual()) {
                foreach($options['taxonomies'] as $cat => $items) {
                    foreach($items as $key => $value) {
                        if (empty($value)) continue;
                        $options['taxonomies'][$cat][$key] = $translate->translate($value);
                        $options['taxonomies'][$cat][$key] = $translate->translate($value);
                    }
                }
                foreach($options['archives'] as $cat => $items) {
                    foreach($items as $key => $value) {
                        if (empty($value)) continue;
                        $options['archives'][$cat][$key] = $translate->translate($value);
                        $options['archives'][$cat][$key] = $translate->translate($value);
                    }
                }
                foreach($options['posttypes'] as $cat => $items) {
                    foreach($items as $key => $value) {
                        if (empty($value)) continue;
                        $options['posttypes'][$cat][$key] = $translate->translate($value);
                        $options['posttypes'][$cat][$key] = $translate->translate($value);
                    }
                }
            }
            if (is_category()) {
                $title['title'] = @trim($options['taxonomies']['category']['titleprefix'] . ' ' . $title['title'] . ' ' . $options['taxonomies']['category']['titlesuffix']);
            } else
            if (is_tag()) {
                $title['title'] = @trim($options['taxonomies']['post_tag']['titleprefix'] . ' ' . $title['title'] . ' ' . $options['taxonomies']['post_tag']['titlesuffix']);
            } else
            if (is_date()) {
                $title['title'] = @trim($options['archives']['date']['titleprefix'] . ' ' . $title['title'] . ' ' . $options['archives']['date']['titlesuffix']);
            } else
            if (is_author()) {
                $title['title'] = @trim($options['archives']['author']['titleprefix'] . ' ' . $title['title'] . ' ' . $options['archives']['author']['titlesuffix']);
            } else
            if (is_tax()) {
                $tax            = get_queried_object();
                if (isset($options['taxonomies'][$tax->taxonomy])) {
                    $title['title'] = @trim($options['taxonomies'][$tax->taxonomy]['titleprefix'] . ' ' . $title['title'] . ' ' . $options['taxonomies'][$tax->taxonomy]['titlesuffix']);
                }
            } else {
                $posttype       = get_post_type();
                if (isset($options['posttypes'][$posttype])) {
                    $title['title'] = @trim($options['posttypes'][$posttype]['titleprefix'] . ' ' . $title['title'] . ' ' . $options['posttypes'][$posttype]['titlesuffix']);
                }
            }
        }

        return $title;
    }

    /**
     * Update the document title separator
     *
     * @param string $sep
     * @return string
     */
    public function filterTitleSeparator($sep)
    {
        $options = get_option('_settingsSettingsGeneral', true);

        if (isset($options['titleseparator'])) {
            return $options['titleseparator'];
        }

        return $sep;
    }

    public function initGithubUpdater()
    {
        // Add some translations
        add_filter('puc_manual_check_link-buzz-seo', function() {
            return '';
        }, 10, 0);

        add_filter('puc_manual_check_message-buzz-seo',
            function($message, $status) {
            if ($status == 'no_update') {
                return __('Buzz SEO plugin is up to date.', 'buzz-seo');
            } else if ($status == 'update_available') {
                return __('A new version of the Buzz SEO plugin is available.', 'buzz-seo');
            } else {
                return sprintf(__('Unknown update checker status `%s`.', 'buzz-seo'), htmlentities($status));
            }
        }, 10, 2);


        // Require file since it doesn't have an autoloader
        require_once BUZZSEO_DIR . 'vendor/yahnis-elsts/plugin-update-checker/plugin-update-checker.php';

        $className = \PucFactory::getLatestClassVersion('PucGitHubChecker');

        /* @var $updateChecker \PucGitHubChecker_2_2 */
        $updateChecker = new $className(
            'https://github.com/nextbuzz/buzz-seo/', BUZZSEO_FILE, 'master'
        );
    }

}
