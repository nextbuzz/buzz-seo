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
 * The cost per unit of a medical drug. Note that this type is not meant to represent the price in an offer of a drug for sale; see the Offer type for that. This type will typically be used to tag wholesale or average retail cost of a drug, or maximum reimbursable cost. Costs of medical drugs vary widely depending on how and where they are paid for, so while this type captures some of the variables, costs should be used with caution by consumers of this schema's markup.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class DrugCostSchema extends MedicalIntangibleSchema
{
    public static function factory()
    {
        return new DrugCostSchema('http://schema.org/', 'DrugCost');
    }

    /**
     * The location in which the status applies.
     *
     * @param $applicableLocation AdministrativeAreaSchema
     **/
    public function setApplicableLocation($applicableLocation) {
        $this->properties['applicableLocation'] = $applicableLocation;

        return $this;
    }

    /**
     * @return AdministrativeAreaSchema
     **/
    public function getApplicableLocation() {
        return $this->properties['applicableLocation'];
    }

    /**
     * The category of cost, such as wholesale, retail, reimbursement cap, etc.
     *
     * @param $costCategory DrugCostCategorySchema
     **/
    public function setCostCategory($costCategory) {
        $this->properties['costCategory'] = $costCategory;

        return $this;
    }

    /**
     * @return DrugCostCategorySchema
     **/
    public function getCostCategory() {
        return $this->properties['costCategory'];
    }

    /**
     * The currency (in 3-letter <a href=http://en.wikipedia.org/wiki/ISO_4217>ISO 4217 format</a>) of the drug cost.
     *
     * @param $costCurrency TextSchema
     **/
    public function setCostCurrency($costCurrency) {
        $this->properties['costCurrency'] = $costCurrency;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCostCurrency() {
        return $this->properties['costCurrency'];
    }

    /**
     * Additional details to capture the origin of the cost data. For example, 'Medicare Part B'.
     *
     * @param $costOrigin TextSchema
     **/
    public function setCostOrigin($costOrigin) {
        $this->properties['costOrigin'] = $costOrigin;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCostOrigin() {
        return $this->properties['costOrigin'];
    }

    /**
     * The cost per unit of the drug.
     *
     * @param $costPerUnit NumberSchema|TextSchema
     **/
    public function setCostPerUnit($costPerUnit) {
        $this->properties['costPerUnit'] = $costPerUnit;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getCostPerUnit() {
        return $this->properties['costPerUnit'];
    }

    /**
     * The unit in which the drug is measured, e.g. '5 mg tablet'.
     *
     * @param $drugUnit TextSchema
     **/
    public function setDrugUnit($drugUnit) {
        $this->properties['drugUnit'] = $drugUnit;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDrugUnit() {
        return $this->properties['drugUnit'];
    }


}
