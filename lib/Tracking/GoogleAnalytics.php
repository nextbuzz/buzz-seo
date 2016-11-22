<?php

namespace NextBuzz\SEO\Tracking;

/**
 * GoogleAnalytics
 *
 * This implements a server-side pageview/ events tracker which can be used as a fallback for certain events if
 * a pagerefresh is not available.
 *
 * At the moment it still requires client side _ga cookie, to prevent analytics data to screw up. So any blockers will
 * also block these server side requests. This can be rewritten later on if we do all requests serverside.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class GoogleAnalytics
{

    const GA_URL = 'https://www.google-analytics.com/collect';

    private $UA       = null;
    private $hostname = null;
    private $anonymizeIP = false;
    private $userID = false;

    private $payload = array();

    /**
     * Constructor
     * @param string $UA        Universal Analytics Code
     * @param string $hostname  The hostname
     */
    public function __construct($UA, $hostname)
    {
        $this->UA       = $UA;
        $this->hostname = $hostname;
    }

    /**
     * Factory method
     *
     * @param string $UA        Universal Analytics Code
     * @param string $hostname  The hostname
     * @return \NextBuzz\SEO\Tracking\GoogleAnalytics
     */
    public static function factory($UA, $hostname)
    {
        return new GoogleAnalytics($UA, $hostname);
    }

    /**
     * Anonymize IP
     * @param boolean $bool
     * @return \NextBuzz\SEO\Tracking\GoogleAnalytics
     */
    public function anonimizeIP($bool)
    {
        $this->anonymizeIP = intval($bool) === 1;

        return $this;
    }

    /**
     * Optionally track user ID
     *
     * @param int $uid
     *
     * @return \NextBuzz\SEO\Tracking\GoogleAnalytics
     */
    public function userID($uid)
    {
        $this->userID = $uid;

        return $this;
    }

    /**
     * Retrieves the Google Analytics CID from the Javascript library if available
     *
     * @return string
     */
    private function getCID()
    {
        if (isset($_COOKIE['_ga'])) {
            list($version, $domainDepth, $cid1, $cid2) = explode('.', $_COOKIE["_ga"], 4);
            $contents = array('version' => $version, 'domainDepth' => $domainDepth, 'cid' => $cid1 . '.' . $cid2);
            $cid      = $contents['cid'];
        } else {
            return false;
        }
        return $cid;
    }

    /**
     * Send data to Google Analytics
     *
     * @param array $data
     * @return \WP_Error | array
     */
    private function sendData($data)
    {
        $url    = self::GA_URL;
        $url .= '?payload_data&';
        $url .= http_build_query($data);

        // Anonymize?
        if ($this->anonymizeIP) {
            $data['aip'] = 1;
        }

        if ($this->userID) {
            $data['uid'] = $this->userID;
        }

        // Only send request if cid is known
        if ($data['cid'] !== false) {
            $result = wp_remote_get($url);
        }

        return $result;
    }

    /**
     * Sends a pageview
     *
     * @param string $uri The page uri we are sending. I.E. "/news/item-1"
     * @param string $title The page title
     * @return \NextBuzz\SEO\Tracking\GoogleAnalytics
     */
    public function pageview($uri = null, $title = null)
    {
        $data = array(
            'v'   => 1,
            'tid' => $this->UA,
            'cid' => $this->getCID(),
            't'   => 'pageview',
            'dh'  => $this->hostname,
            'dp'  => $uri,
            'dt'  => $title
        );

        $this->sendData($data);

        return $this;
    }

    /**
     * Send an event
     *
     * @param string $category Category (required)
     * @param string $action   Action   (required)
     * @param string $label    Label    (optional)
     * @return \NextBuzz\SEO\Tracking\GoogleAnalytics
     */
    public function event($category = null, $action = null, $label = null)
    {
        $data = array(
            'v'   => 1,
            'tid' => $this->UA,
            'cid' => $this->getCID(),
            't'   => 'event',
            'ec'  => $category,
            'ea'  => $action,
            'el'  => $label
        );
        $this->sendData($data);

        return $this;
    }

}
