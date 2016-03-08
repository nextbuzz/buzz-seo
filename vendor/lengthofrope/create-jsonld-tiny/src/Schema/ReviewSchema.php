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
 * A review of an item - for example, of a restaurant, movie, or store.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ReviewSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new ReviewSchema('http://schema.org/', 'Review');
    }

    /**
     * The item that is being reviewed/rated.
     *
     * @param $itemReviewed ThingSchema
     **/
    public function setItemReviewed($itemReviewed) {
        $this->properties['itemReviewed'] = $itemReviewed;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getItemReviewed() {
        return $this->properties['itemReviewed'];
    }

    /**
     * The actual body of the review.
     *
     * @param $reviewBody TextSchema
     **/
    public function setReviewBody($reviewBody) {
        $this->properties['reviewBody'] = $reviewBody;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getReviewBody() {
        return $this->properties['reviewBody'];
    }

    /**
     * The rating given in this review. Note that reviews can themselves be rated. The <code>reviewRating</code> applies to rating given by the review. The <code>aggregateRating</code> property applies to the review itself, as a creative work.
     *
     * @param $reviewRating RatingSchema
     **/
    public function setReviewRating($reviewRating) {
        $this->properties['reviewRating'] = $reviewRating;

        return $this;
    }

    /**
     * @return RatingSchema
     **/
    public function getReviewRating() {
        return $this->properties['reviewRating'];
    }


}
