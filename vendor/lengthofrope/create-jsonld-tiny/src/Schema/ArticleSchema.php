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
 * An article, such as a news article or piece of investigative report. Newspapers and magazines have articles of many different types and this is intended to cover them all.

      <br/><br/>See also <a href="http://blog.schema.org/2014/09/schemaorg-support-for-bibliographic_2.html">blog post</a>.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ArticleSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new ArticleSchema('http://schema.org/', 'Article');
    }

    /**
     * The actual body of the article.
     *
     * @param $articleBody TextSchema
     **/
    public function setArticleBody($articleBody) {
        $this->properties['articleBody'] = $articleBody;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getArticleBody() {
        return $this->properties['articleBody'];
    }

    /**
     * Articles may belong to one or more 'sections' in a magazine or newspaper, such as Sports, Lifestyle, etc.
     *
     * @param $articleSection TextSchema
     **/
    public function setArticleSection($articleSection) {
        $this->properties['articleSection'] = $articleSection;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getArticleSection() {
        return $this->properties['articleSection'];
    }

    /**
     * The page on which the work ends; for example "138" or "xvi".
     *
     * @param $pageEnd IntegerSchema|TextSchema
     **/
    public function setPageEnd($pageEnd) {
        $this->properties['pageEnd'] = $pageEnd;

        return $this;
    }

    /**
     * @return IntegerSchema|TextSchema
     **/
    public function getPageEnd() {
        return $this->properties['pageEnd'];
    }

    /**
     * The page on which the work starts; for example "135" or "xiii".
     *
     * @param $pageStart IntegerSchema|TextSchema
     **/
    public function setPageStart($pageStart) {
        $this->properties['pageStart'] = $pageStart;

        return $this;
    }

    /**
     * @return IntegerSchema|TextSchema
     **/
    public function getPageStart() {
        return $this->properties['pageStart'];
    }

    /**
     * Any description of pages that is not separated into pageStart and pageEnd; for example, "1-6, 9, 55" or "10-12, 46-49".
     *
     * @param $pagination TextSchema
     **/
    public function setPagination($pagination) {
        $this->properties['pagination'] = $pagination;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPagination() {
        return $this->properties['pagination'];
    }

    /**
     * The number of words in the text of the Article.
     *
     * @param $wordCount IntegerSchema
     **/
    public function setWordCount($wordCount) {
        $this->properties['wordCount'] = $wordCount;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getWordCount() {
        return $this->properties['wordCount'];
    }


}
