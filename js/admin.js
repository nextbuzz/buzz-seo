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
        var tabContainer = $('.buzz-seo-tabs'), hashCount = 1, hashDepth = 0, tablist = [];
        tabContainer.each(function () {
            hashDepth++;
            var that = $(this), navTabs = that.children('.nav-tab-wrapper'),
                    tabIndex = null;

            navTabs.children().each(function () {
                $(this).data("hashId", hashDepth + "_" + hashCount++);
                $(this).data("hashDepth", hashDepth);
                tablist.push($(this));
                $(this).on('click', function (evt) {
                    evt.preventDefault();

                    var hash = location.hash.replace('#', '');
                    if (hash === '') {
                        // Setup hash
                        location.hash = 'tab';
                    } else {
                        // Remove hash id's in same childloop
                        var hashes = hash.split('-'), newhash = 'tab';
                        hashes.shift();
                        for (var hashindex in hashes) {
                            var hashitem = hashes[hashindex], hashitempart = hashitem.split('_');
                            if (parseInt(hashitempart[0]) !== $(this).data("hashDepth") && hashitem !== $(this).data("hashId")) {
                                newhash += '-' + hashitem;
                            }
                        }
                        location.hash = newhash;
                    }

                    // Add current tab to new hash
                    location.hash += '-' + $(this).data("hashId");

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

                    // Update all links in tab to have the current hash
                    $(".buzz-seo-tabs .inner:not(.hidden) a").each(function () {
                        var url = $(this).attr("href");
                        var anchorIndex = url.indexOf('#');
                        if (anchorIndex !== -1) {
                            url = url.substring(0, anchorIndex);
                        }
                        $(this).attr("href", url + document.location.hash);
                    });
                });
            });
        });

        // Open all existing hash tabs
        var hash = location.hash.replace('#', ''), hashes = hash.split('-'), tab, tabindex;
        hashes.shift();

        for (tabindex in tablist) {
            tab = tablist[tabindex];
            if (hashes.indexOf(tab.data("hashId")) !== -1) {
                tab.click();
            }
        }
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
                    $("textarea#" + e.editor.id).on(events[i], doAnalysis);
                }
            });
        }

        $("#buzz-seo-metadescription").keypress(function(event) {
            if(parseInt(event.which) === 13) {
                return false;
            }
        });

        var analysisTimeout, analysisDelay = 2000, totalScore = 0, maxScore = 0, minScore = 0,
                outputGood = [], outputWarning = [], outputError = [], calculatedHTML = false, calculatedText = false;

        // Trigger first analyses manually
        doAnalysis();
        analysisTimeout = setInterval(doAnalysis, analysisDelay);

        function doAnalysis()
        {
            // Reset html/ text data
            calculatedHTML = false;
            calculatedText = false;

            var output, index, id, data, info, dataItem, itemMaxScore = 0;
            outputGood = [];
            outputWarning = [];
            outputError = [];
            totalScore = 0;
            maxScore = 0;
            for (index = 0; index < BuzzSEOAnalysis.data.length; ++index) {
                id = BuzzSEOAnalysis.data[index].id;
                data = BuzzSEOAnalysis.data[index].data;
                info = BuzzSEOAnalysis.data[index].info;

                itemMaxScore = 0;
                for (dataItem in data) {
                    if (data[dataItem].score >= itemMaxScore) {
                        itemMaxScore = data[dataItem].score;
                    }
                }
                maxScore += itemMaxScore;

                switch (id) {
                    case 'wordCount':
                        handleScoreOutput(analyseWordCount(data, info, getEditorText()));
                        break;

                    case 'metaDescriptionLength':
                        handleScoreOutput(analyseCharCount(data, info, $("#buzz-seo-metadescription").val()));
                        break;

                    case 'subHeadings':
                        handleScoreOutput(analyseSubheadings(data, getEditorHTML()));
                        break;

                    case 'pageTitleLength':
                        // Check if something is entered in the seo title, if so use that as a validator
                        if ($("#buzz-seo-pagetitle").val() && $("#buzz-seo-pagetitle").val().length === 0) {
                            handleScoreOutput(analyseCharCount(data, info, $("#title").val()));
                        } else {
                            handleScoreOutput(analyseCharCount(data, info, $("#buzz-seo-pagetitle").val()));
                        }
                        break;

                    case 'keywordDensity':
                        [$("#buzz-seo-keyword0").val(), $("#buzz-seo-keyword1").val(),
                            $("#buzz-seo-keyword2").val(), $("#buzz-seo-keyword3").val(),
                            $("#buzz-seo-keyword4").val(), $("#buzz-seo-keyword5").val()].forEach(function (item) {
                            if (item !== "") {
                                handleScoreOutput(analyseFocusDensity(data, info, item, getEditorText()));
                            }
                        });
                        break;

                    case 'keyphraseSizeCheck':
                        handleScoreOutput(analyseWordCount(data, info, $("#buzz-seo-keyword0").val()));
                        break;

                    case 'metaDescriptionKeyword':
                        if ($("#buzz-seo-metadescription").val() !== "") {
                            handleScoreOutput(analyseFocusDensity(data, info, $("#buzz-seo-keyword0").val(), $("#buzz-seo-metadescription").val()));
                        }
                        break;

                    case 'firstParagraph':
                        var html = getEditorHTML();
                        if (html && $("#buzz-seo-keyword0").val() !== "") {
                            //numSubheadings = (html.match(/\<h[2|3|4|5|6]/g) || []).length;
                            var paragraphs = $($.parseHTML(html, document, false)).filter("p");
                            if (paragraphs[0] !== undefined) {
                                handleScoreOutput(analyseFocusDensity(data, info, $("#buzz-seo-keyword0").val(), $.text(paragraphs[0])));
                            }
                        }
                        break;

                    case 'pageTitleKeyword':
                        if ($("#title").val() !== "") {
                            handleScoreOutput(analyseFocusDensity(data, info, $("#buzz-seo-keyword0").val(), $("#title").val()));
                        }
                        break;

                    case 'readabilityScore':
                        var readability = analyseEnglishReadability(data, info, getEditorText());
                        if (readability !== false) {
                            // Supported language (EN / NL)
                            $("#buzz-seo-readability-score").html(readability.html);
                        } else {
                            // Non supported language
                            $("#buzz-seo-readability").addClass("hidden");
                        }
                        break;

                    default:
                        break;
                }
            }

            // Sort arrays
            outputError.sort(sortByScore);
            outputWarning.sort(sortByScore);
            outputGood.sort(sortByScore);

            // Update score
            var grade = Math.round((10/maxScore) * totalScore), gradeHTML = '', number, cls;
            for (number = 1; number <= 5; number++) {
                cls = 'dashicons-star-empty';
                if ((grade/2) >= number) {
                    cls = 'dashicons-star-filled';
                } else if (Math.ceil((grade/2)) >= number) {
                    cls = 'dashicons-star-half';
                }
                gradeHTML += '<span class="dashicons ' + cls + '"></span>';
            }
            $("#buzz-seo-grade-score").html(gradeHTML);
            $("#buzz-seo-grade-score-publish").html(gradeHTML);
            $("#buzz-seo-grade-score-input").val(grade);

            // Create output
            output = "";
            if (outputError.length > 0) {
                for (var i = 0; i < outputError.length; i++) {
                    output += outputError[i].html;
                }
            } else {
                output = "<li>" + BuzzSEOAnalysis.noErrors + "</li>";
            }
            $("#buzz-seo-content-analysis-errors").html(output);
            $("#buzz-seo-error-count").html(outputError.length);
            output = "";
            if (outputWarning.length > 0) {
                for (var i = 0; i < outputWarning.length; i++) {
                    output += outputWarning[i].html;
                }
            } else {
                output = "<li>" + BuzzSEOAnalysis.noWarnings + "</li>";
            }
            $("#buzz-seo-content-analysis-warnings").html(output);
            $("#buzz-seo-warning-count").html(outputWarning.length);
            output = "";
            if (outputGood.length > 0) {
                for (var i = 0; i < outputGood.length; i++) {
                    output += outputGood[i].html;
                }
            } else {
                output = "<li>" + BuzzSEOAnalysis.noGood + "</li>";
            }
            $("#buzz-seo-content-analysis-good").html(output);
            $("#buzz-seo-good-count").html(outputGood.length);

            // Inline count analysis
            $("input[data-buzz-counter], textarea[data-buzz-counter]").each(updateInlineCount);
        }

        function sortByScore(a, b)
        {
            return a['score'] > b['score'];
        }

        function handleScoreOutput(scoreObject)
        {
            if (typeof scoreObject !== 'object') {
                return;
            }
            totalScore += scoreObject.score;

            if (scoreObject.score < 5) {
                outputError.push(scoreObject);
            } else if (scoreObject.score < 8) {
                outputWarning.push(scoreObject);
            } else {
                outputGood.push(scoreObject);
            }
        }

        function analyseEnglishReadability(data, info, text)
        {
            var index, item,
                    numOfWords = 0, numOfSentences = 0, numOfSyllables = 0,
                    optimalMin = info.recommendedMin, optimalMax = info.recommendedMax,
                    scoreFlesh = 0, scoreDouma = 0;

            // Count words
            if (text) {
                numOfWords = countWords(text);
                numOfSentences = countSentences(getEditorText(true));
                numOfSyllables = countSyllables(text);
                // Flesh reading score (English)/ Douma reading score (Dutch)
                scoreFlesh = 206.835 - (1.015 * (numOfWords / numOfSentences)) - (84.6 * (numOfSyllables / numOfWords));
                scoreDouma = 206.835 - (0.93 * (numOfWords / numOfSentences)) - (77 * (numOfSyllables / numOfWords));
            }

            if (scoreFlesh < 0) {
                scoreFlesh = 0;
            }
            if (scoreFlesh > 100) {
                scoreFlesh = 100;
            }
            if (scoreDouma < 0) {
                scoreDouma = 0;
            }
            if (scoreDouma > 100) {
                scoreDouma = 100;
            }

            scoreFlesh = scoreFlesh.toFixed(2);
            scoreDouma = scoreDouma.toFixed(2);

            var score = 0, language = BuzzSEOAnalysis.locale.substr(0, 2);
            if (language === "en") {
                score = scoreFlesh;
            } else
            if (language === "nl") {
                score = scoreDouma;
            } else {
                return false;
            }

            for (index = 0; index < data.length; ++index) {
                item = data[index];
                if (item.min <= score && (item.max === undefined || item.max >= score)) {
                    return {
                        score: item.score,
                        html: item.text.replaceText(score, optimalMin, optimalMax)
                    };
                }
            }

            return false;
        }

        function analyseWordCount(data, info, text)
        {
            var index, item,
                    numOfWords = 0, optimalMin = info.recommendedMin, optimalMax = info.recommendedMax;

            // Count words
            if (text) {
                numOfWords = countWords(text);
            }

            for (index = 0; index < data.length; ++index) {
                item = data[index];
                if (item.min <= numOfWords && (item.max === undefined || item.max >= numOfWords)) {
                    return {
                        score: item.score,
                        html: "<li class='score" + item.score + "'>" + item.text.replaceText(numOfWords, optimalMin, optimalMax) + "</li>"
                    };
                }
            }
        }

        function analyseFocusDensity(data, info, keyword, text)
        {
            var index, item,
                    numOfWords = 0, density = 0, keyCount = 0, optimalMin = info.recommendedMin, optimalMax = info.recommendedMax;

            // Count words
            if (text) {
                numOfWords = countWords(text);

                // Find keyword
                var keyArray = text.match(new RegExp(keyword, "gi")) || [];
                keyCount = keyArray.length;

                density = (100 / numOfWords) * keyCount;
            }

            for (index = 0; index < data.length; ++index) {
                item = data[index];
                if (item.min <= density && (item.max === undefined || item.max >= density)) {
                    return {
                        score: item.score,
                        html: "<li class='score" + item.score + "'>" + item.text.replaceText(density.toFixed(2), keyword, optimalMax, keyCount) + "</li>"
                    };
                }
            }
        }

        function analyseSubheadings(data, html)
        {
            var index, item,
                    numSubheadings = 0, optimal = false;

            // Count words
            if (html) {
                numSubheadings = (html.match(/\<h[2|3|4|5|6]/g) || []).length;
            }

            for (index = 0; index < data.length; ++index) {
                item = data[index];
                if (!optimal) {
                    optimal = item.min;
                }
                if (item.min <= numSubheadings && (item.max === undefined || item.max >= numSubheadings)) {
                    return {
                        score: item.score,
                        html: "<li class='score" + item.score + "'>" + item.text + "</li>"
                    };
                }
            }
        }

        function analyseCharCount(data, info, text)
        {
            var index, item,
                    numOfChars = 0, optimalMin = info.recommendedMin, optimalMax = info.recommendedMax;

            // Count words
            if (text) {
                numOfChars = text.length;
            }

            for (index = 0; index < data.length; ++index) {
                item = data[index];
                if (item.min <= numOfChars && (item.max === undefined || item.max >= numOfChars)) {
                    return {
                        score: item.score,
                        html: "<li class='score" + item.score + "'>" + item.text.replaceText(numOfChars, optimalMax, (numOfChars - optimalMax), optimalMin) + "</li>"
                    };
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
            if (calculatedHTML !== false) {
                return calculatedHTML;
            }

            var val = '';
            if (wp && wp.blocks === undefined) {
                // Old editor
                var i, skipMainContent = $("#postdivrich").css("display") === "none";
                if (typeof tinyMCE !== 'undefined' && typeof tinyMCE.editors !== 'undefined' && tinyMCE.editors.length !== 0) {
                    for (i = 0; i < tinyMCE.editors.length; i++) {
                        if (tinyMCE.editors[i].id === "content" && skipMainContent) {
                            continue;
                        }
                        var textArea = $('textarea#' + tinyMCE.editors[i].id);
                        val += textArea.length > 0 ? textArea.val() : '';
                    }
                }
            } else if (wp) {
                // Gutenberg
                val = wp.data.select( "core/editor" ).getEditedPostContent();
            }

            calculatedHTML = val;
            return calculatedHTML;
        }

        function getEditorText(keepPunctuation)
        {
            if (keepPunctuation !== true && calculatedText !== false) {
                return calculatedText;
            }
            var text = getEditorHTML();
            if (text) {
                text = text.replace(/\.\.\./g, ' '); // convert ellipses to spaces
                text = text.replace(/<.[^<>]*?>/g, ' ').replace(/&nbsp;|&#160;/gi, ' '); // remove html tags and space chars

                // deal with html entities
                text = text.replace(/(\w+)(&#?[a-z0-9]+;)+(\w+)/i, "$1$3").replace(/&.+?;/g, ' ');

                if (keepPunctuation !== true) {
                    text = text.replace(/[0-9.(),;:!?%#$?\x27\x22_+=\\\/\-]*/g, ''); // remove numbers and punctuation
                    calculatedText = text;
                    return calculatedText;
                }

                return text;
            }

            return '';
        }

        function countWords(text)
        {
            if (text) {
                var wordArray = text.match(/[\w\u2019\x27\-\u00C0-\u1FFF]+/g);
                if (wordArray) {
                    return wordArray.length;
                }
            }

            return 0;
        }

        function countSyllables(text)
        {
            text = text.toLowerCase();
            if (text.length <= 3) {
                return 1;
            }
            text = text.replace(/(?:[^laeiouy]es|ed|[^laeiouy]e)$/, '');
            text = text.replace(/^y/, '');

            var syllables = text.match(/[aeiouy]{1,2}/g);
            return (syllables === null) ? 0 : syllables.length;
        }

        function countSentences(text)
        {
            var sentences = text.split(".");
            var sentenceCount = 0;
            for (var i = 0; i < sentences.length; i++) {
                if (sentences[ i ] !== "" && sentences[ i ] !== " ") {
                    sentenceCount++;
                }
            }

            return sentenceCount;
        }

        function updateInlineCount()
        {
            var that = $(this), length = that.val().length, counterID = that.attr("data-buzz-counter"),
                index, id, min, max, result;
            for (index = 0; index < BuzzSEOAnalysis.data.length; ++index) {
                id = BuzzSEOAnalysis.data[index].id;

                if (id !== counterID) {
                    continue;
                }

                // Get recommendations for this item
                min = BuzzSEOAnalysis.data[index].info.recommendedMin;
                max = BuzzSEOAnalysis.data[index].info.recommendedMax;

                // Add calculation attributes to element
                that.attr("data-buzz-counter-min", min);
                that.attr("data-buzz-counter-max", max);
                that.attr("data-buzz-counter-length", length);
                result = $("#"+that.attr('id')+'_results');
                if (result.length !== 1) {
                    that.parent().append('<span id="'+that.attr('id')+'_results" class="buzz-counter-results">');
                    result = $("#"+that.attr('id')+'_results');
                }
                if (length < min) {
                    result.addClass("error");
                    result.html(length + " / " + max + " <span class='dashicons dashicons-warning' />");
                } else if(length <= max) {
                    result.removeClass("error");
                    result.html(length + " / " + max + " <span class='dashicons dashicons-awards' />");
                } else {
                    result.addClass("error");
                    result.html(length + " / " + max + " <span class='dashicons dashicons-warning' />");
                }
                that.css('width', 'calc(100% - 6rem)');
            }
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
                    if (attachment.sizes.thumbnail) {
                        mediaThumbField.val(attachment.sizes.thumbnail.url);
                    } else {
                        mediaThumbField.val(attachment.url);
                    }
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