/* global BuzzSEOAnalyticsEvents */
(function ($) {
    'use strict';

    /**
     * Analytics Events
     */
    $(function () {
        if (typeof BuzzSEOAnalyticsEvents === "undefined") {
            return;
        }

        function trackEvent(eventCategory, eventAction, eventLabel, eventValue, hitCallback)
        {
            var obj = {
                hitType: 'event',
                transport: 'beacon', // Make sure it also sends if page is closed (modern browser required)
                eventCategory: eventCategory,
                eventAction: eventAction
            };

            if (typeof eventLabel !== "undefined") {
                obj.eventLabel = eventLabel;
            }
            if (typeof eventValue === "number") {
                obj.eventValue = parseInt(eventValue);
            }
            if (typeof hitCallback === "function") {
                obj.hitCallback = hitCallback;
            }

            eval(BuzzSEOAnalyticsEvents.Tracker)('send', obj);
        }

        function setupExternalLinks()
        {
            var hostName = document.location.hostname;
            // Get all links starting with http (this includes https)
            $("a[href^=http]").click(function() {
                var that = $(this), href = that.attr("href");

                // If href does not contain current hostName, it is an external link
                if (href.indexOf(hostName) === -1) {
                    trackEvent("Outbound Link", "click", href);
                }
            });
        }

        if (BuzzSEOAnalyticsEvents.ExternalLinks) {
            setupExternalLinks();
        }

        function setupCustomClicks()
        {
            // Get all links starting with http (this includes https)
            $(BuzzSEOAnalyticsEvents.CustomClicks).click(function() {
                var that = $(this), href = that.attr("href");

                // If href does not contain current hostName, it is an external link
                if (href.indexOf(hostName) === -1) {
                    trackEvent("Custom Click", that.attr("class"), document.location.href);
                }
            });
        }

        if (BuzzSEOAnalyticsEvents.CustomClicks !== false) {
            setupCustomClicks();
        }
    });
})(jQuery);