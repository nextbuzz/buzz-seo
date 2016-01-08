/* global tinyMCE, console, BuzzSEOAnalysis, BuzzSEOAdmin */
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
        var tabContainer = $('.buzz-seo-tabs');
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
        if (typeof BuzzSEOAnalysis === "undefined") {
            return;
        }

        /**
         * Bind the change event to the editor (text/tinyMCE), title and focus keywords.
         */
        var elems = ['content', 'title', 'buzz-seo-pagetitle', 'buzz-seo-metadescription',
            'buzz-seo-keyword0', 'buzz-seo-keyword1', 'buzz-seo-keyword2', 'buzz-seo-keyword3',
            'buzz-seo-keyword4', 'buzz-seo-keyword5'];
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

        var analysisOutput = $("#buzz-seo-content-analysis"), analysisTimeout, analysisDelay = 1000;
        doAnalysis();
        function doAnalysis()
        {
            // Make sure we do not rapidly fire the analysis
            var now = Date.now();
            var nt = $(this).data("lastime") || now;
            if (nt > now) {
                clearTimeout(analysisTimeout);
                analysisTimeout = setTimeout(doAnalysis, analysisDelay);
                return;
            }
            $(this).data("lastime", now + analysisDelay);

            var output = "<ul>", index, id, data;
            for (index = 0; index < BuzzSEOAnalysis.length; ++index) {
                id = BuzzSEOAnalysis[index].id;
                data = BuzzSEOAnalysis[index].data;
                switch (id) {
                    case 'wordCount':
                        output += analyseWordCount(data, getEditorText());
                        break;

                    case 'metaDescriptionLength':
                        output += analyseCharCount(data, $("#buzz-seo-metadescription").val());
                        break;
                    default:
                        break;
                }
            }
            analysisOutput.html(output + "</ul>");
        }

        function analyseWordCount(data, text)
        {
            var index, item,
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

        function analyseCharCount(data, text)
        {
            var index, item,
                    numOfChars = 0, optimal = false;

            // Count words
            if (text) {
                numOfChars = text.length;
            }

            for (index = 0; index < data.length; ++index) {
                item = data[index];
                if (!optimal) {
                    optimal = item.min - 1;
                }
                if (item.min <= numOfChars && (item.max === undefined || item.max >= numOfChars)) {
                    return "<li class='score" + item.score + "'>" + item.text.replaceText(numOfChars, optimal, (numOfChars - optimal)) + "</li>";
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

    /**
     * Media uploader
     */
    $(function () {
        var file_frame, attachment, mediaIdField, mediaThumbField;
        $('.buzz-media-button').on('click', function (event) {
            mediaIdField = $("#" + $(event.currentTarget).data("media-id"));
            mediaThumbField = $("#" + $(event.currentTarget).data("media-thumb"));
            event.preventDefault();

            // If the media frame already exists, reopen it.
            if (file_frame) {
                file_frame.open();
                return;
            }

            // Create the media frame.
            file_frame = wp.media.frames.file_frame = wp.media({
                title: BuzzSEOAdmin.MediaUploader.title,
                button: {
                    text: BuzzSEOAdmin.MediaUploader.button
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });

            // When an image is selected, run a callback.
            file_frame.on('select', function () {
                // We set multiple to false so only get one image from the uploader
                attachment = file_frame.state().get('selection').first().toJSON();

                // Do something with attachment.id and/or attachment.url here
                var selection = file_frame.state().get('selection');

                selection.map(function (attachment) {
                    attachment = attachment.toJSON();
                    // Do something with attachment.id and/or attachment.url here
                    if (attachment.type !== "image") {
                        alert("No image selected...");
                        return;
                    }

                    mediaIdField.val(attachment.id);
                    mediaThumbField.val(attachment.sizes.thumbnail.url);
                });
            });

            // Finally, open the modal
            file_frame.open();
        });

        $('.buzz-media-button-remove').on('click', function (event) {
            var that = $(this);

            // Make current image vars empty
            $("#" + that.data("media-id")).val("");
            $("#" + that.data("media-thumb")).val("");
            $("#" + that.data("hide")).addClass("hidden");
        });

    });
})(jQuery);