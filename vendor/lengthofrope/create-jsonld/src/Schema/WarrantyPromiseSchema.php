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
 * A structured value representing the duration and scope of services that will be provided to a customer free of charge in case of a defect or malfunction of a product.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class WarrantyPromiseSchema extends StructuredValueSchema
{
    public static function factory()
    {
        return new WarrantyPromiseSchema('http://schema.org/', 'WarrantyPromise');
    }

    /**
     * The duration of the warranty promise. Common unitCode values are ANN for year, MON for months, or DAY for days.
     *
     * @param $durationOfWarranty QuantitativeValueSchema
     **/
    public function setDurationOfWarranty($durationOfWarranty) {
        $this->properties['durationOfWarranty'] = $durationOfWarranty;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getDurationOfWarranty() {
        return $this->properties['durationOfWarranty'];
    }

    /**
     * The scope of the warranty promise.
     *
     * @param $warrantyScope WarrantyScopeSchema
     **/
    public function setWarrantyScope($warrantyScope) {
        $this->properties['warrantyScope'] = $warrantyScope;

        return $this;
    }

    /**
     * @return WarrantyScopeSchema
     **/
    public function getWarrantyScope() {
        return $this->properties['warrantyScope'];
    }


}
