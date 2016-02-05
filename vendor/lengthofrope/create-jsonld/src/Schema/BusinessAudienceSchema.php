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
 * A set of characteristics belonging to businesses, e.g. who compose an item's target audience.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class BusinessAudienceSchema extends AudienceSchema
{
    public static function factory()
    {
        return new BusinessAudienceSchema('http://schema.org/', 'BusinessAudience');
    }

    /**
     * The number of employees in an organization e.g. business.
     *
     * @param $numberOfEmployees QuantitativeValueSchema
     **/
    public function setNumberOfEmployees($numberOfEmployees) {
        $this->properties['numberOfEmployees'] = $numberOfEmployees;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getNumberOfEmployees() {
        return $this->properties['numberOfEmployees'];
    }

    /**
     * The size of the business in annual revenue.
     *
     * @param $yearlyRevenue QuantitativeValueSchema
     **/
    public function setYearlyRevenue($yearlyRevenue) {
        $this->properties['yearlyRevenue'] = $yearlyRevenue;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getYearlyRevenue() {
        return $this->properties['yearlyRevenue'];
    }

    /**
     * The age of the business.
     *
     * @param $yearsInOperation QuantitativeValueSchema
     **/
    public function setYearsInOperation($yearsInOperation) {
        $this->properties['yearsInOperation'] = $yearsInOperation;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getYearsInOperation() {
        return $this->properties['yearsInOperation'];
    }


}
