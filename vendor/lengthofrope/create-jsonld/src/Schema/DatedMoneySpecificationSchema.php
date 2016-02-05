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
 * A DatedMoneySpecification represents monetary values with optional start and end dates. For example, this could represent an employee's salary over a specific period of time.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class DatedMoneySpecificationSchema extends StructuredValueSchema
{
    public static function factory()
    {
        return new DatedMoneySpecificationSchema('http://schema.org/', 'DatedMoneySpecification');
    }

    /**
     * The amount of money.
     *
     * @param $amount NumberSchema
     **/
    public function setAmount($amount) {
        $this->properties['amount'] = $amount;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getAmount() {
        return $this->properties['amount'];
    }

    /**
     * The currency in which the monetary amount is expressed (in 3-letter <a href='http://en.wikipedia.org/wiki/ISO_4217'">ISO 4217</a> format).
     *
     * @param $currency TextSchema
     **/
    public function setCurrency($currency) {
        $this->properties['currency'] = $currency;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCurrency() {
        return $this->properties['currency'];
    }

    /**
     * The end date and time of the item (in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 date format</a>).
     *
     * @param $endDate DateSchema
     **/
    public function setEndDate($endDate) {
        $this->properties['endDate'] = $endDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getEndDate() {
        return $this->properties['endDate'];
    }

    /**
     * The start date and time of the item (in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 date format</a>).
     *
     * @param $startDate DateSchema
     **/
    public function setStartDate($startDate) {
        $this->properties['startDate'] = $startDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getStartDate() {
        return $this->properties['startDate'];
    }


}
