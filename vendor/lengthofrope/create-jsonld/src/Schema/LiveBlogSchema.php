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
 * A blog post intended to provide a rolling textual coverage of an ongoing event through continuous updates.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class LiveBlogSchema extends BlogPostingSchema
{
    public static function factory()
    {
        return new LiveBlogSchema('http://schema.org/', 'LiveBlog');
    }

    /**
     * The time when the live blog will stop covering the Event. Note that coverage may continue after the Event concludes.
     *
     * @param $coverageEndTime DateTimeSchema
     **/
    public function setCoverageEndTime($coverageEndTime) {
        $this->properties['coverageEndTime'] = $coverageEndTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getCoverageEndTime() {
        return $this->properties['coverageEndTime'];
    }

    /**
     * The time when the live blog will begin covering the Event. Note that coverage may begin before the Event's start time. The LiveBlogPosting may also be created before coverage begins.
     *
     * @param $coverageStartTime DateTimeSchema
     **/
    public function setCoverageStartTime($coverageStartTime) {
        $this->properties['coverageStartTime'] = $coverageStartTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getCoverageStartTime() {
        return $this->properties['coverageStartTime'];
    }

    /**
     * An update to the LiveBlog.
     *
     * @param $liveBlogUpdate BlogPostingSchema
     **/
    public function setLiveBlogUpdate($liveBlogUpdate) {
        $this->properties['liveBlogUpdate'] = $liveBlogUpdate;

        return $this;
    }

    /**
     * @return BlogPostingSchema
     **/
    public function getLiveBlogUpdate() {
        return $this->properties['liveBlogUpdate'];
    }


}
