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
 * A comment on an item - for example, a comment on a blog post. The comment's content is expressed via the "text" property, and its topic via "about", properties shared with all CreativeWorks.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class CommentSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new CommentSchema('http://schema.org/', 'Comment');
    }

    /**
     * The number of downvotes this question, answer or comment has received from the community.
     *
     * @param $downvoteCount IntegerSchema
     **/
    public function setDownvoteCount($downvoteCount) {
        $this->properties['downvoteCount'] = $downvoteCount;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getDownvoteCount() {
        return $this->properties['downvoteCount'];
    }

    /**
     * The parent of a question, answer or item in general.
     *
     * @param $parentItem QuestionSchema
     **/
    public function setParentItem($parentItem) {
        $this->properties['parentItem'] = $parentItem;

        return $this;
    }

    /**
     * @return QuestionSchema
     **/
    public function getParentItem() {
        return $this->properties['parentItem'];
    }

    /**
     * The number of upvotes this question, answer or comment has received from the community.
     *
     * @param $upvoteCount IntegerSchema
     **/
    public function setUpvoteCount($upvoteCount) {
        $this->properties['upvoteCount'] = $upvoteCount;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getUpvoteCount() {
        return $this->properties['upvoteCount'];
    }


}
