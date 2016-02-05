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
 * A rating is an evaluation on a numeric scale, such as 1 to 5 stars.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class RatingSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new RatingSchema('http://schema.org/', 'Rating');
    }

    /**
     * The highest value allowed in this rating system. If bestRating is omitted, 5 is assumed.
     *
     * @param $bestRating NumberSchema|TextSchema
     **/
    public function setBestRating($bestRating) {
        $this->properties['bestRating'] = $bestRating;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getBestRating() {
        return $this->properties['bestRating'];
    }

    /**
     * The rating for the content.
     *
     * @param $ratingValue TextSchema
     **/
    public function setRatingValue($ratingValue) {
        $this->properties['ratingValue'] = $ratingValue;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getRatingValue() {
        return $this->properties['ratingValue'];
    }

    /**
     * The lowest value allowed in this rating system. If worstRating is omitted, 1 is assumed.
     *
     * @param $worstRating NumberSchema|TextSchema
     **/
    public function setWorstRating($worstRating) {
        $this->properties['worstRating'] = $worstRating;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getWorstRating() {
        return $this->properties['worstRating'];
    }


}
