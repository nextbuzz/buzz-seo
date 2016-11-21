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
            if (BuzzSEOAnalyticsEvents.CustomClicks.length > 0) {
                for(var index in BuzzSEOAnalyticsEvents.CustomClicks) {
                    // Get all links starting with http (this includes https)
                    var CustomClick = BuzzSEOAnalyticsEvents.CustomClicks[index];
                    $(CustomClick.query).on('click', {CustomClick: CustomClick}, function(event) {
                        var CustomClick = event.data.CustomClick;
                        trackEvent(CustomClick.category, CustomClick.action, document.location.href);
                    });
                }
            }
        }

        if (BuzzSEOAnalyticsEvents.CustomClicks !== false) {
            setupCustomClicks();
        }

        function setupGravityFormsAjaxHandler()
        {
            $(function(){
                // Ajax form handler
                $(document).bind('gform_confirmation_loaded', function(event, formId) {
                    trackEvent("Gravity Forms", "Submit Form ID " + formId, document.location.href);
                });

                // Non ajax form handler
                if(BuzzSEOAnalyticsEvents.GravityFormConfirmation !== "") {
                    trackEvent("Gravity Forms", "Submit Form ID " + BuzzSEOAnalyticsEvents.GravityFormConfirmation.id, document.location.href);
                }
            });
        }

        if (BuzzSEOAnalyticsEvents.FormSubmissions !== false) {
            setupGravityFormsAjaxHandler();
        }
    });
})(jQuery);