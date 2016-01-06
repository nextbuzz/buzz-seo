/* global tinyMCE, console, LORSEOData */
(function ($) {
    'use strict';

    /**
     * TABS
     * 
     * Whenever each of the navigation tabs is clicked, check to see if it has the 'nav-tab-active'
     * class name. If not, then mark it as active; otherwise, don't do anything (as it's already
     * marked as active.
     *
     * Next, when a new tab is marked as active, the corresponding child view needs to be marked
     * as visible. We do this by toggling the 'hidden' class attribute of the corresponding variables.
     **/
    $(function () {
        var tabContainer = $('.lor-seo-tabs');
        tabContainer.each(function () {
            var that = $(this), navTabs = that.children('.nav-tab-wrapper'),
                    tabIndex = null;

            navTabs.children().each(function () {
                $(this).on('click', function (evt) {

                    evt.preventDefault();

                    // If this tab is not active...
                    if (!$(this).hasClass('nav-tab-active')) {

                        // Unmark the current tab and mark the new one as active
                        navTabs.children('.nav-tab-active').removeClass('nav-tab-active');
                        $(this).addClass('nav-tab-active');

                        // Save the index of the tab that's just been marked as active. It will be 0 - 3.
                        tabIndex = $(this).index();

                        // Hide the old active content
                        that.children('div:not(.inside.hidden)').addClass('hidden');

                        that.children('div:nth-child(' + (tabIndex) + ')').addClass('hidden');

                        // And display the new content
                        that.children('div:nth-child( ' + (tabIndex + 2) + ')').removeClass('hidden');

                        navTabs.removeClass("hidden");
                    }
                });
            });
        });
    });

    /**
     * Analysis
     * 
     * Analyse the current content (without HTML markup)
     */
    $(function () {
        /**
         * Bind the change event to the editor (text/tinyMCE), title and focus keywords.
         */
        var elems = ['content', 'title', 'lor-seo-keyword0', 'lor-seo-keyword1', 'lor-seo-keyword2', 'lor-seo-keyword3', 'lor-seo-keyword4', 'lor-seo-keyword5'];
        for (var i = 0; i < elems.length; i++) {
            var elem = document.getElementById(elems[ i ]);
            if (elem !== null) {
                document.getElementById(elems[ i ]).addEventListener('input', doAnalysis);
            }
        }

        if (typeof tinyMCE !== 'undefined' && typeof tinyMCE.on === 'function') {
            //binds the input, change, cut and paste event to tinyMCE. All events are needed, because sometimes tinyMCE doesn'
            //trigger them, or takes up to ten seconds to fire an event.
            var events = ['input', 'change', 'cut', 'paste'];
            tinyMCE.on('addEditor', function (e) {
                for (var i = 0; i < events.length; i++) {
                    e.editor.on(events[i], doAnalysis);
                }
            });
        }

        var analysisOutput = $("#lor-seo-content-analysis"), lastupdate;
        doAnalysis();
        function doAnalysis()
        {
            // Make sure we do not rapidly fire the analysis
            var now = Date.now();
            var nt = $(this).data("lastime") || now;
            if (nt > now) {
                clearTimeout(lastupdate);
                lastupdate = setTimeout(doAnalysis, 1000);
                return;
            }
            $(this).data("lastime", now + 1000);

            var output = "<ul>", index, id, data;
            for (index = 0; index < LORSEOData.Analysis.length; ++index) {
                id = LORSEOData.Analysis[index].id;
                data = LORSEOData.Analysis[index].data;
                switch (id) {
                    case 'wordCount':
                        output += analyseWordCount(data);
                        break;
                    default:
                        break;
                }
            }
            analysisOutput.html(output + "</ul>");
        }

        function analyseWordCount(data)
        {
            var index, item,
                    text = getEditorText(),
                    numOfWords = 0, optimal = false;

            // Count words
            if (text) {
                var wordArray = text.match(/[\w\u2019\x27\-\u00C0-\u1FFF]+/g);
                if (wordArray) {
                    numOfWords = wordArray.length;
                }
            }

            for (index = 0; index < data.length; ++index) {
                item = data[index];
                if (!optimal) {
                    optimal = item.min;
                }
                if (item.min <= numOfWords && (item.max === undefined || item.max >= numOfWords)) {
                    return "<li class='score" + item.score + "'>" + item.text.replaceText(numOfWords, optimal) + "</li>";
                }
            }
        }

        /**
         * Gets content from the content field, if tinyMCE is initialized, use the getContent function to get the data from tinyMCE
         * If tiny is hidden, take the value from the contentfield, since tinyMCE isn't updated when it isn't visible.
         * @returns {String}
         */
        function getEditorHTML()
        {
            var val = document.getElementById('content') && document.getElementById('content').value || '';
            if (jQuery("#wp-content-wrap").hasClass("tmce-active") && typeof tinyMCE !== 'undefined' && typeof tinyMCE.editors !== 'undefined' && tinyMCE.editors.length !== 0) {
                var tinyMceContent = tinyMCE.get('content');
                val = tinyMceContent && tinyMceContent.hidden === false && tinyMceContent.getContent() || '';
            }
            return val;
        }

        function getEditorText()
        {
            var text = getEditorHTML();
            if (text) {
                text = text.replace(/\.\.\./g, ' '); // convert ellipses to spaces
                text = text.replace(/<.[^<>]*?>/g, ' ').replace(/&nbsp;|&#160;/gi, ' '); // remove html tags and space chars

                // deal with html entities
                text = text.replace(/(\w+)(&#?[a-z0-9]+;)+(\w+)/i, "$1$3").replace(/&.+?;/g, ' ');
                text = text.replace(/[0-9.(),;:!?%#$?\x27\x22_+=\\\/\-]*/g, ''); // remove numbers and punctuation

                return text;
            }

            return '';
        }
    });

    /**
     * Replaces {[int]} values in a string with corresponding index values.
     * IE.
     * 'Hello {0}, I am {1}'.replaceText('you', 'the one');
     * @returns {String}
     */
    String.prototype.replaceText = function () {
        var formatted = this;
        for (var arg in arguments) {
            formatted = formatted.replace("{" + arg + "}", arguments[arg]);
        }
        return formatted;
    };
})(jQuery);