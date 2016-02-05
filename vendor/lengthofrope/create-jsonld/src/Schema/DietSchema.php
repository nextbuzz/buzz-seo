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
 * A strategy of regulating the intake of food to achieve or maintain a specific health-related goal.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class DietSchema extends \LengthOfRope\JSONLD\Elements\Element
{
    public static function factory()
    {
        return new DietSchema('http://schema.org/', 'Diet');
    }

    /**
     * Nutritional information specific to the dietary plan. May include dietary recommendations on what foods to avoid, what foods to consume, and specific alterations/deviations from the USDA or other regulatory body's approved dietary guidelines.
     *
     * @param $dietFeatures TextSchema
     **/
    public function setDietFeatures($dietFeatures) {
        $this->properties['dietFeatures'] = $dietFeatures;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDietFeatures() {
        return $this->properties['dietFeatures'];
    }

    /**
     * People or organizations that endorse the plan.
     *
     * @param $endorsers OrganizationSchema|PersonSchema
     **/
    public function setEndorsers($endorsers) {
        $this->properties['endorsers'] = $endorsers;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getEndorsers() {
        return $this->properties['endorsers'];
    }

    /**
     * Medical expert advice related to the plan.
     *
     * @param $expertConsiderations TextSchema
     **/
    public function setExpertConsiderations($expertConsiderations) {
        $this->properties['expertConsiderations'] = $expertConsiderations;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getExpertConsiderations() {
        return $this->properties['expertConsiderations'];
    }

    /**
     * Descriptive information establishing the overarching theory/philosophy of the plan. May include the rationale for the name, the population where the plan first came to prominence, etc.
     *
     * @param $overview TextSchema
     **/
    public function setOverview($overview) {
        $this->properties['overview'] = $overview;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getOverview() {
        return $this->properties['overview'];
    }

    /**
     * Specific physiologic benefits associated to the plan.
     *
     * @param $physiologicalBenefits TextSchema
     **/
    public function setPhysiologicalBenefits($physiologicalBenefits) {
        $this->properties['physiologicalBenefits'] = $physiologicalBenefits;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPhysiologicalBenefits() {
        return $this->properties['physiologicalBenefits'];
    }

    /**
     * Proprietary name given to the diet plan, typically by its originator or creator.
     *
     * @param $proprietaryName TextSchema
     **/
    public function setProprietaryName($proprietaryName) {
        $this->properties['proprietaryName'] = $proprietaryName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getProprietaryName() {
        return $this->properties['proprietaryName'];
    }

    /**
     * Specific physiologic risks associated to the plan.
     *
     * @param $risks TextSchema
     **/
    public function setRisks($risks) {
        $this->properties['risks'] = $risks;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getRisks() {
        return $this->properties['risks'];
    }


}
