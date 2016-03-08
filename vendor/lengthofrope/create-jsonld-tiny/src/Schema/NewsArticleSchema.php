<?php

/*
 * The MIT License
 *
 * Copyright 2016 LengthOfRope, Bas de Kort <bdekort@gmail.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 **/

namespace LengthOfRope\JSONLD\Schema;

/**
 * A news article.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class NewsArticleSchema extends ArticleSchema
{
    public static function factory()
    {
        return new NewsArticleSchema('http://schema.org/', 'NewsArticle');
    }

    /**
     * The location where the NewsArticle was produced.
     *
     * @param $dateline TextSchema
     **/
    public function setDateline($dateline) {
        $this->properties['dateline'] = $dateline;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDateline() {
        return $this->properties['dateline'];
    }

    /**
     * The number of the column in which the NewsArticle appears in the print edition.
     *
     * @param $printColumn TextSchema
     **/
    public function setPrintColumn($printColumn) {
        $this->properties['printColumn'] = $printColumn;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPrintColumn() {
        return $this->properties['printColumn'];
    }

    /**
     * The edition of the print product in which the NewsArticle appears.
     *
     * @param $printEdition TextSchema
     **/
    public function setPrintEdition($printEdition) {
        $this->properties['printEdition'] = $printEdition;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPrintEdition() {
        return $this->properties['printEdition'];
    }

    /**
     * If this NewsArticle appears in print, this field indicates the name of the page on which the article is found. Please note that this field is intended for the exact page name (e.g. A5, B18).
     *
     * @param $printPage TextSchema
     **/
    public function setPrintPage($printPage) {
        $this->properties['printPage'] = $printPage;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPrintPage() {
        return $this->properties['printPage'];
    }

    /**
     * If this NewsArticle appears in print, this field indicates the print section in which the article appeared.
     *
     * @param $printSection TextSchema
     **/
    public function setPrintSection($printSection) {
        $this->properties['printSection'] = $printSection;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPrintSection() {
        return $this->properties['printSection'];
    }


}
