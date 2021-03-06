<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class Analytics extends BaseFeature
{
    static $bodyGTMCodeRun = false;

    public function name()
    {
        return __("Analytics / GTM", "buzz-seo");
    }

    public function desc()
    {
        return __("Support for Google Analytics or for setting up a Google Tag Manager container.", "buzz-seo");
    }

    public function init()
    {
        add_action('admin_menu', array($this, 'createAdminMenu'));

        // Verification code somewhere on top
        add_action('wp_head', array($this, 'addSiteVerificationCode'), 0);

        // Make sure Google Analytics code is late in the head
        add_action('wp_head', array($this, 'addUACode'), 99);

        // Make sure Google Analytics code is late in the head
        add_action('wp_head', array($this, 'addGTMCode'), 1);
        add_action('buzz-seo-after-body', array($this, 'addGTMCodeBody'), 1);
        add_action('wp_footer', array($this, 'addGTMCodeBody'), 1);

        // Add GTM Basic datalayer filter
        add_filter('buzz-seo-gtm-datalayer', array($this, 'addBasicGTMDataLayer'), 10, 1);

        // Track events
        $options = get_option('_settingsSettingsAnalytics', true);
        if (isset($options['eventsforms']) || isset($options['eventsexternal']) || (isset($options['eventsclicks']) && !empty($options['eventsclicks'][0]['query']))) {
            add_action('wp_enqueue_scripts', array($this, 'enqueueEventsScript'));
        }

        if (isset($options['eventsforms'])) {
            add_action("gform_after_submission", array($this, "gravityFormsSubmission"), 10, 2);
            add_action("frm_after_create_entry", array($this, "formidableSubmission"), 30, 2);
        }
    }

    public function enqueueEventsScript()
    {
        $options = get_option('_settingsSettingsAnalytics', true);
        wp_enqueue_script('buzz-seo-ae', plugins_url('buzz-seo/js/analytics-events.js'),
            array('jquery'), BUZZSEO_VERSION, true);
        wp_localize_script('buzz-seo-ae', 'BuzzSEOAnalyticsEvents',
            array(
                'Tracker' => $this->trackerVar(),
                'FormSubmissions' => isset($options['eventsforms']),
                'ExternalLinks' => isset($options['eventsexternal']),
                'CustomClicks' => is_array($options['eventsclicks']) && count($options['eventsclicks']) > 0 ? $options['eventsclicks'] : false,
            )
        );
    }

    /**
     * Gravity Forms after submission
     * @param array $entry
     * @param array $form
     */
    public function gravityFormsSubmission($entry, $form)
    {
        // Since a lot of form types do not reload the page, we handle the form event server side.
        $tracker = $this->getGATracker();
        if ($tracker) {
            $id = $form['id'];
            $tracker->event("Gravity Forms", "Submit Form ID " . $id, $entry['source_url']);
        }
    }

    /**
     * Formidable after submission
     * @param int $entryId
     * @param int $formId
     */
    public function formidableSubmission($entryId, $formId)
    {
        // Since a lot of form types do not reload the page, we handle the form event server side.
        $tracker = $this->getGATracker();
        if ($tracker) {
            $entry = \FrmEntry::getOne($entryId);
            $description = unserialize($entry->description);
            $referrer = $description['referrer'];
            $tracker->event("Formidable", "Submit Form ID " . $formId, $referrer);
        }
    }

    /**
     * Get the serverside tracker
     * @return \NextBuzz\SEO\Tracking\GoogleAnalytics | false
     */
    private function getGATracker()
    {
        $options = get_option('_settingsSettingsAnalytics', true);
        $ua = isset($options['uacode']) && !empty($options['uacode']) ? $options['uacode'] : false;
        $hostname = isset($options['setdomainname']) && !empty($options['setdomainname']) ? $options['setdomainname'] : gethostname();

        if ($ua !== false && $hostname !== false) {
            $userId = intval(get_current_user_id());
            return \NextBuzz\SEO\Tracking\GoogleAnalytics::factory($ua, $hostname)
                ->anonimizeIP(isset($options['anonymize']))
                ->userID(isset($options['userid']) && $userId > 0 ? $userId : false);
        }

        return false;
    }

    /**
     * Add the administrator submenu
     */
    public function createAdminMenu()
    {
        // Add Settings Sub Option Page
        add_submenu_page('BuzzSEO', __('Analytics / GTM', 'buzz-seo'), __('Analytics / GTM', 'buzz-seo'), 'buzz_seo_settings_ga', 'BuzzSEO_Analytics', array($this, "addAdminUI"));
    }

    /**
     * Create the admin interface pages.
     */
    public function addAdminUI()
    {
        \NextBuzz\SEO\PHPTAL\Settings\Analytics::factory()->render();
    }

    /**
     * Allow overriding the analytics Tracker var
     * @return string
     */
    private function trackerVar()
    {
        return esc_js(apply_filters('buzz_seo_ga_tracker_var', 'ga'));
    }

    /**
     * Add the UA code if available in the head
     */
    public function addUACode()
    {
        $options = get_option('_settingsSettingsAnalytics', true);

        // Nothing checked, so do nothing
        if (!is_array($options) || !isset($options['uacode'])) {
            return;
        }

        $uacode = $options['uacode'];
        if (!empty($uacode) && preg_match("/\bua-\d{4,9}-\d{1,4}\b/i", $uacode)) {
            $code       = "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','" . $this->trackerVar() . "');";
            // Set UA code
            $domainName = 'auto';
            if (isset($options['setdomainname']) && !empty($options['setdomainname'])) {
                $domainName = $options['setdomainname'];
            }
            $code .= $this->trackerVar() . "('create', '" . esc_js($uacode) . "', '" . esc_js($domainName) . "');";

            // Anonymize
            if (isset($options['anonymize'])) {
                $code .= $this->trackerVar() . "('set', 'anonymizeIp', true);";
            }

            // Track user ID
            $userId = intval(get_current_user_id());
            if (isset($options['userid']) && $userId > 0) {
                $code .= $this->trackerVar() . "('set', 'userId', " . $userId . ");";
            }

            // Display advertising
            if (isset($options['displayadvertising'])) {
                $code .= $this->trackerVar() . "('require', 'displayfeatures');";
            }

            // Track pageview
            $code .= $this->trackerVar() . "('send', 'pageview');";

            // Output script
            echo "<script>{$code}</script>";
        }
    }

    public function addSiteVerificationCode()
    {
        $options = get_option('_settingsSettingsAnalytics', true);

        // Nothing checked, so do nothing
        if (!is_array($options) || !isset($options['siteverification'])) {
            return;
        }

        $verificationcode = $options['siteverification'];
        if (!empty($verificationcode)) {
            echo '<meta name="google-site-verification" content="' . esc_attr($verificationcode) . '" />' . PHP_EOL;
        }
    }

    /**
     * Add the GTM code if available in the head
     */
    public function addGTMCode()
    {
        $options = get_option('_settingsSettingsAnalytics', true);

        // Nothing checked, so do nothing
        if (!is_array($options) || !isset($options['gtmcode'])) {
            return;
        }

        $gtmcode = $options['gtmcode'];
        if (!empty($gtmcode) && preg_match("/\bgtm-[a-z0-9]+\b/i", $gtmcode)) {
            echo "<!-- Google Tag Manager Datalayer -->".PHP_EOL."<script>var dataLayerBuzzSEO = dataLayerBuzzSEO || [];" . PHP_EOL;
            $data = apply_filters('buzz-seo-gtm-datalayer', array());
            if (!empty($data)) {
                foreach($data as $object) {
                    echo 'dataLayerBuzzSEO.push(' . json_encode($object) . ');' . PHP_EOL;
                }
            }
            echo "</script>" . PHP_EOL;
            echo '<!-- End Google Tag Manager Datalayer -->' . PHP_EOL;
            echo "<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayerBuzzSEO','".$gtmcode."');</script>
<!-- End Google Tag Manager -->";
        }
    }

    /**
     * Add the no-script part of the GTM code inside the body
     */
    public function addGTMCodeBody()
    {
        if (self::$bodyGTMCodeRun) {
            return;
        }

        self::$bodyGTMCodeRun = true;

        $options = get_option('_settingsSettingsAnalytics', true);

        // Nothing checked, so do nothing
        if (!is_array($options) || !isset($options['gtmcode'])) {
            return;
        }

        $gtmcode = $options['gtmcode'];
        if (!empty($gtmcode) && preg_match("/\bgtm-[a-z0-9]+\b/i", $gtmcode)) {
            echo  '<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id='.$gtmcode.'"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->';
        }
    }

    /**
     * Add the basic datalayer according to the given options.
     *
     * @param array $data
     * @return array mixed
     */
    public function addBasicGTMDataLayer($data)
    {
        $options = get_option('_settingsSettingsAnalytics', true);

        $basic = array();
        if (isset($options['gtm_layer_posttype'])) {
            $basic['postType'] = is_front_page() ? 'frontpage' : get_post_type();
        }

        $data[] = $basic;

        return $data;
    }
}
