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
 * The price asked for a given offer by the respective organization or person.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class UnitPriceSpecificationSchema extends PriceSpecificationSchema
{
    public static function factory()
    {
        return new UnitPriceSpecificationSchema('http://schema.org/', 'UnitPriceSpecification');
    }

    /**
     * This property specifies the minimal quantity and rounding increment that will be the basis for the billing. The unit of measurement is specified by the unitCode property.
     *
     * @param $billingIncrement NumberSchema
     **/
    public function setBillingIncrement($billingIncrement) {
        $this->properties['billingIncrement'] = $billingIncrement;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getBillingIncrement() {
        return $this->properties['billingIncrement'];
    }

    /**
     * A short text or acronym indicating multiple price specifications for the same offer, e.g. SRP for the suggested retail price or INVOICE for the invoice price, mostly used in the car industry.
     *
     * @param $priceType TextSchema
     **/
    public function setPriceType($priceType) {
        $this->properties['priceType'] = $priceType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPriceType() {
        return $this->properties['priceType'];
    }

    /**
     * The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.
     *
     * @param $unitCode TextSchema|URLSchema
     **/
    public function setUnitCode($unitCode) {
        $this->properties['unitCode'] = $unitCode;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getUnitCode() {
        return $this->properties['unitCode'];
    }

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for
<a href='unitCode'>unitCode</a>.
     *
     * @param $unitText TextSchema
     **/
    public function setUnitText($unitText) {
        $this->properties['unitText'] = $unitText;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getUnitText() {
        return $this->properties['unitText'];
    }


}
