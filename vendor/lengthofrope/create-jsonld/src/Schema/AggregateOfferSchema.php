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
 * When a single product is associated with multiple offers (for example, the same pair of shoes is offered by different merchants), then AggregateOffer can be used.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class AggregateOfferSchema extends OfferSchema
{
    public static function factory()
    {
        return new AggregateOfferSchema('http://schema.org/', 'AggregateOffer');
    }

    /**
     * The highest price of all offers available.
     *
     * @param $highPrice NumberSchema|TextSchema
     **/
    public function setHighPrice($highPrice) {
        $this->properties['highPrice'] = $highPrice;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getHighPrice() {
        return $this->properties['highPrice'];
    }

    /**
     * The lowest price of all offers available.
     *
     * @param $lowPrice NumberSchema|TextSchema
     **/
    public function setLowPrice($lowPrice) {
        $this->properties['lowPrice'] = $lowPrice;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getLowPrice() {
        return $this->properties['lowPrice'];
    }

    /**
     * The number of offers for the product.
     *
     * @param $offerCount IntegerSchema
     **/
    public function setOfferCount($offerCount) {
        $this->properties['offerCount'] = $offerCount;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getOfferCount() {
        return $this->properties['offerCount'];
    }

    /**
     * An offer to provide this item&#x2014;for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.
     *
     * @param $offers OfferSchema
     **/
    public function setOffers($offers) {
        $this->properties['offers'] = $offers;

        return $this;
    }

    /**
     * @return OfferSchema
     **/
    public function getOffers() {
        return $this->properties['offers'];
    }


}
