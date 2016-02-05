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
 * A product taken by mouth that contains a dietary ingredient intended to supplement the diet. Dietary ingredients may include vitamins, minerals, herbs or other botanicals, amino acids, and substances such as enzymes, organ tissues, glandulars and metabolites.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class DietarySupplementSchema extends MedicalTherapySchema
{
    public static function factory()
    {
        return new DietarySupplementSchema('http://schema.org/', 'DietarySupplement');
    }

    /**
     * An active ingredient, typically chemical compounds and/or biologic substances.
     *
     * @param $activeIngredient TextSchema
     **/
    public function setActiveIngredient($activeIngredient) {
        $this->properties['activeIngredient'] = $activeIngredient;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getActiveIngredient() {
        return $this->properties['activeIngredient'];
    }

    /**
     * Descriptive information establishing a historical perspective on the supplement. May include the rationale for the name, the population where the supplement first came to prominence, etc.
     *
     * @param $background TextSchema
     **/
    public function setBackground($background) {
        $this->properties['background'] = $background;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getBackground() {
        return $this->properties['background'];
    }

    /**
     * A dosage form in which this drug/supplement is available, e.g. 'tablet', 'suspension', 'injection'.
     *
     * @param $dosageForm TextSchema
     **/
    public function setDosageForm($dosageForm) {
        $this->properties['dosageForm'] = $dosageForm;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDosageForm() {
        return $this->properties['dosageForm'];
    }

    /**
     * True if this item's name is a proprietary/brand name (vs. generic name).
     *
     * @param $isProprietary BooleanSchema
     **/
    public function setIsProprietary($isProprietary) {
        $this->properties['isProprietary'] = $isProprietary;

        return $this;
    }

    /**
     * @return BooleanSchema
     **/
    public function getIsProprietary() {
        return $this->properties['isProprietary'];
    }

    /**
     * The drug or supplement's legal status, including any controlled substance schedules that apply.
     *
     * @param $legalStatus DrugLegalStatusSchema
     **/
    public function setLegalStatus($legalStatus) {
        $this->properties['legalStatus'] = $legalStatus;

        return $this;
    }

    /**
     * @return DrugLegalStatusSchema
     **/
    public function getLegalStatus() {
        return $this->properties['legalStatus'];
    }

    /**
     * The manufacturer of the product.
     *
     * @param $manufacturer OrganizationSchema
     **/
    public function setManufacturer($manufacturer) {
        $this->properties['manufacturer'] = $manufacturer;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getManufacturer() {
        return $this->properties['manufacturer'];
    }

    /**
     * Recommended intake of this supplement for a given population as defined by a specific recommending authority.
     *
     * @param $maximumIntake MaximumDoseScheduleSchema
     **/
    public function setMaximumIntake($maximumIntake) {
        $this->properties['maximumIntake'] = $maximumIntake;

        return $this;
    }

    /**
     * @return MaximumDoseScheduleSchema
     **/
    public function getMaximumIntake() {
        return $this->properties['maximumIntake'];
    }

    /**
     * The specific biochemical interaction through which this drug or supplement produces its pharmacological effect.
     *
     * @param $mechanismOfAction TextSchema
     **/
    public function setMechanismOfAction($mechanismOfAction) {
        $this->properties['mechanismOfAction'] = $mechanismOfAction;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getMechanismOfAction() {
        return $this->properties['mechanismOfAction'];
    }

    /**
     * The generic name of this drug or supplement.
     *
     * @param $nonProprietaryName TextSchema
     **/
    public function setNonProprietaryName($nonProprietaryName) {
        $this->properties['nonProprietaryName'] = $nonProprietaryName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getNonProprietaryName() {
        return $this->properties['nonProprietaryName'];
    }

    /**
     * Recommended intake of this supplement for a given population as defined by a specific recommending authority.
     *
     * @param $recommendedIntake RecommendedDoseScheduleSchema
     **/
    public function setRecommendedIntake($recommendedIntake) {
        $this->properties['recommendedIntake'] = $recommendedIntake;

        return $this;
    }

    /**
     * @return RecommendedDoseScheduleSchema
     **/
    public function getRecommendedIntake() {
        return $this->properties['recommendedIntake'];
    }

    /**
     * Any potential safety concern associated with the supplement. May include interactions with other drugs and foods, pregnancy, breastfeeding, known adverse reactions, and documented efficacy of the supplement.
     *
     * @param $safetyConsideration TextSchema
     **/
    public function setSafetyConsideration($safetyConsideration) {
        $this->properties['safetyConsideration'] = $safetyConsideration;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSafetyConsideration() {
        return $this->properties['safetyConsideration'];
    }

    /**
     * Characteristics of the population for which this is intended, or which typically uses it, e.g. 'adults'.
     *
     * @param $targetPopulation TextSchema
     **/
    public function setTargetPopulation($targetPopulation) {
        $this->properties['targetPopulation'] = $targetPopulation;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTargetPopulation() {
        return $this->properties['targetPopulation'];
    }


}
