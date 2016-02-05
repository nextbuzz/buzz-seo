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
 * A chemical or biologic substance, used as a medical therapy, that has a physiological effect on an organism.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class DrugSchema extends MedicalTherapySchema
{
    public static function factory()
    {
        return new DrugSchema('http://schema.org/', 'Drug');
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
     * A route by which this drug may be administered, e.g. 'oral'.
     *
     * @param $administrationRoute TextSchema
     **/
    public function setAdministrationRoute($administrationRoute) {
        $this->properties['administrationRoute'] = $administrationRoute;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAdministrationRoute() {
        return $this->properties['administrationRoute'];
    }

    /**
     * Any precaution, guidance, contraindication, etc. related to consumption of alcohol while taking this drug.
     *
     * @param $alcoholWarning TextSchema
     **/
    public function setAlcoholWarning($alcoholWarning) {
        $this->properties['alcoholWarning'] = $alcoholWarning;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAlcoholWarning() {
        return $this->properties['alcoholWarning'];
    }

    /**
     * An available dosage strength for the drug.
     *
     * @param $availableStrength DrugStrengthSchema
     **/
    public function setAvailableStrength($availableStrength) {
        $this->properties['availableStrength'] = $availableStrength;

        return $this;
    }

    /**
     * @return DrugStrengthSchema
     **/
    public function getAvailableStrength() {
        return $this->properties['availableStrength'];
    }

    /**
     * Any precaution, guidance, contraindication, etc. related to this drug's use by breastfeeding mothers.
     *
     * @param $breastfeedingWarning TextSchema
     **/
    public function setBreastfeedingWarning($breastfeedingWarning) {
        $this->properties['breastfeedingWarning'] = $breastfeedingWarning;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getBreastfeedingWarning() {
        return $this->properties['breastfeedingWarning'];
    }

    /**
     * Description of the absorption and elimination of drugs, including their concentration (pharmacokinetics, pK) and biological effects (pharmacodynamics, pD).
     *
     * @param $clinicalPharmacology TextSchema
     **/
    public function setClinicalPharmacology($clinicalPharmacology) {
        $this->properties['clinicalPharmacology'] = $clinicalPharmacology;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getClinicalPharmacology() {
        return $this->properties['clinicalPharmacology'];
    }

    /**
     * Cost per unit of the drug, as reported by the source being tagged.
     *
     * @param $cost DrugCostSchema
     **/
    public function setCost($cost) {
        $this->properties['cost'] = $cost;

        return $this;
    }

    /**
     * @return DrugCostSchema
     **/
    public function getCost() {
        return $this->properties['cost'];
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
     * A dosing schedule for the drug for a given population, either observed, recommended, or maximum dose based on the type used.
     *
     * @param $doseSchedule DoseScheduleSchema
     **/
    public function setDoseSchedule($doseSchedule) {
        $this->properties['doseSchedule'] = $doseSchedule;

        return $this;
    }

    /**
     * @return DoseScheduleSchema
     **/
    public function getDoseSchedule() {
        return $this->properties['doseSchedule'];
    }

    /**
     * The class of drug this belongs to (e.g., statins).
     *
     * @param $drugClass DrugClassSchema
     **/
    public function setDrugClass($drugClass) {
        $this->properties['drugClass'] = $drugClass;

        return $this;
    }

    /**
     * @return DrugClassSchema
     **/
    public function getDrugClass() {
        return $this->properties['drugClass'];
    }

    /**
     * Any precaution, guidance, contraindication, etc. related to consumption of specific foods while taking this drug.
     *
     * @param $foodWarning TextSchema
     **/
    public function setFoodWarning($foodWarning) {
        $this->properties['foodWarning'] = $foodWarning;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getFoodWarning() {
        return $this->properties['foodWarning'];
    }

    /**
     * Another drug that is known to interact with this drug in a way that impacts the effect of this drug or causes a risk to the patient. Note: disease interactions are typically captured as contraindications.
     *
     * @param $interactingDrug DrugSchema
     **/
    public function setInteractingDrug($interactingDrug) {
        $this->properties['interactingDrug'] = $interactingDrug;

        return $this;
    }

    /**
     * @return DrugSchema
     **/
    public function getInteractingDrug() {
        return $this->properties['interactingDrug'];
    }

    /**
     * True if the drug is available in a generic form (regardless of name).
     *
     * @param $isAvailableGenerically BooleanSchema
     **/
    public function setIsAvailableGenerically($isAvailableGenerically) {
        $this->properties['isAvailableGenerically'] = $isAvailableGenerically;

        return $this;
    }

    /**
     * @return BooleanSchema
     **/
    public function getIsAvailableGenerically() {
        return $this->properties['isAvailableGenerically'];
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
     * Link to the drug's label details.
     *
     * @param $labelDetails URLSchema
     **/
    public function setLabelDetails($labelDetails) {
        $this->properties['labelDetails'] = $labelDetails;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getLabelDetails() {
        return $this->properties['labelDetails'];
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
     * Any information related to overdose on a drug, including signs or symptoms, treatments, contact information for emergency response.
     *
     * @param $overdosage TextSchema
     **/
    public function setOverdosage($overdosage) {
        $this->properties['overdosage'] = $overdosage;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getOverdosage() {
        return $this->properties['overdosage'];
    }

    /**
     * Pregnancy category of this drug.
     *
     * @param $pregnancyCategory DrugPregnancyCategorySchema
     **/
    public function setPregnancyCategory($pregnancyCategory) {
        $this->properties['pregnancyCategory'] = $pregnancyCategory;

        return $this;
    }

    /**
     * @return DrugPregnancyCategorySchema
     **/
    public function getPregnancyCategory() {
        return $this->properties['pregnancyCategory'];
    }

    /**
     * Any precaution, guidance, contraindication, etc. related to this drug's use during pregnancy.
     *
     * @param $pregnancyWarning TextSchema
     **/
    public function setPregnancyWarning($pregnancyWarning) {
        $this->properties['pregnancyWarning'] = $pregnancyWarning;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPregnancyWarning() {
        return $this->properties['pregnancyWarning'];
    }

    /**
     * Link to prescribing information for the drug.
     *
     * @param $prescribingInfo URLSchema
     **/
    public function setPrescribingInfo($prescribingInfo) {
        $this->properties['prescribingInfo'] = $prescribingInfo;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getPrescribingInfo() {
        return $this->properties['prescribingInfo'];
    }

    /**
     * Indicates whether this drug is available by prescription or over-the-counter.
     *
     * @param $prescriptionStatus DrugPrescriptionStatusSchema
     **/
    public function setPrescriptionStatus($prescriptionStatus) {
        $this->properties['prescriptionStatus'] = $prescriptionStatus;

        return $this;
    }

    /**
     * @return DrugPrescriptionStatusSchema
     **/
    public function getPrescriptionStatus() {
        return $this->properties['prescriptionStatus'];
    }

    /**
     * Any other drug related to this one, for example commonly-prescribed alternatives.
     *
     * @param $relatedDrug DrugSchema
     **/
    public function setRelatedDrug($relatedDrug) {
        $this->properties['relatedDrug'] = $relatedDrug;

        return $this;
    }

    /**
     * @return DrugSchema
     **/
    public function getRelatedDrug() {
        return $this->properties['relatedDrug'];
    }

    /**
     * Any FDA or other warnings about the drug (text or URL).
     *
     * @param $warning TextSchema|URLSchema
     **/
    public function setWarning($warning) {
        $this->properties['warning'] = $warning;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getWarning() {
        return $this->properties['warning'];
    }


}
