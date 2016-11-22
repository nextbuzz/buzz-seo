<?php

namespace NextBuzz\SEO\Features;

/**
 * Option page administration feature
 *
 * @author Bas de Kort <bas@nextbuzz.nl>
 */
class Analytics extends BaseFeature
{
    public function name()
    {
        return __("Google Analytics", "buzz-seo");
    }

    public function desc()
    {
        return __("Support for analytics.", "buzz-seo");
    }

    public function init()
    {
        add_action('admin_menu', array($this, 'createAdminMenu'));

        // Verification code somewhere on top
        add_action('wp_head', array($this, 'addSiteVerificationCode'), 0);

        // Make sure Google Analytics code is late in the head
        add_action('wp_head', array($this, 'addUACode'), 99);

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
        add_submenu_page('BuzzSEO', __('Google Analytics', 'buzz-seo'), __('Google Analytics', 'buzz-seo'), 'edit_posts', 'BuzzSEO_Analytics', array($this, "addAdminUI"));
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

}
