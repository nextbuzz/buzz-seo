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
 * Any object used in a medical capacity, such as to diagnose or treat a patient.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MedicalDeviceSchema extends MedicalEntitySchema
{
    public static function factory()
    {
        return new MedicalDeviceSchema('http://schema.org/', 'MedicalDevice');
    }

    /**
     * A possible complication and/or side effect of this therapy. If it is known that an adverse outcome is serious (resulting in death, disability, or permanent damage; requiring hospitalization; or is otherwise life-threatening or requires immediate medical attention), tag it as a seriouseAdverseOutcome instead.
     *
     * @param $adverseOutcome MedicalEntitySchema
     **/
    public function setAdverseOutcome($adverseOutcome) {
        $this->properties['adverseOutcome'] = $adverseOutcome;

        return $this;
    }

    /**
     * @return MedicalEntitySchema
     **/
    public function getAdverseOutcome() {
        return $this->properties['adverseOutcome'];
    }

    /**
     * A contraindication for this therapy.
     *
     * @param $contraindication MedicalContraindicationSchema
     **/
    public function setContraindication($contraindication) {
        $this->properties['contraindication'] = $contraindication;

        return $this;
    }

    /**
     * @return MedicalContraindicationSchema
     **/
    public function getContraindication() {
        return $this->properties['contraindication'];
    }

    /**
     * A factor that indicates use of this therapy for treatment and/or prevention of a condition, symptom, etc. For therapies such as drugs, indications can include both officially-approved indications as well as off-label uses. These can be distinguished by using the ApprovedIndication subtype of MedicalIndication.
     *
     * @param $indication MedicalIndicationSchema
     **/
    public function setIndication($indication) {
        $this->properties['indication'] = $indication;

        return $this;
    }

    /**
     * @return MedicalIndicationSchema
     **/
    public function getIndication() {
        return $this->properties['indication'];
    }

    /**
     * A description of the postoperative procedures, care, and/or followups for this device.
     *
     * @param $postOp TextSchema
     **/
    public function setPostOp($postOp) {
        $this->properties['postOp'] = $postOp;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPostOp() {
        return $this->properties['postOp'];
    }

    /**
     * A description of the workup, testing, and other preparations required before implanting this device.
     *
     * @param $preOp TextSchema
     **/
    public function setPreOp($preOp) {
        $this->properties['preOp'] = $preOp;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPreOp() {
        return $this->properties['preOp'];
    }

    /**
     * A description of the procedure involved in setting up, using, and/or installing the device.
     *
     * @param $procedure TextSchema
     **/
    public function setProcedure($procedure) {
        $this->properties['procedure'] = $procedure;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getProcedure() {
        return $this->properties['procedure'];
    }

    /**
     * A goal towards an action is taken. Can be concrete or abstract.
     *
     * @param $purpose MedicalDevicePurposeSchema|ThingSchema
     **/
    public function setPurpose($purpose) {
        $this->properties['purpose'] = $purpose;

        return $this;
    }

    /**
     * @return MedicalDevicePurposeSchema|ThingSchema
     **/
    public function getPurpose() {
        return $this->properties['purpose'];
    }

    /**
     * A possible serious complication and/or serious side effect of this therapy. Serious adverse outcomes include those that are life-threatening; result in death, disability, or permanent damage; require hospitalization or prolong existing hospitalization; cause congenital anomalies or birth defects; or jeopardize the patient and may require medical or surgical intervention to prevent one of the outcomes in this definition.
     *
     * @param $seriousAdverseOutcome MedicalEntitySchema
     **/
    public function setSeriousAdverseOutcome($seriousAdverseOutcome) {
        $this->properties['seriousAdverseOutcome'] = $seriousAdverseOutcome;

        return $this;
    }

    /**
     * @return MedicalEntitySchema
     **/
    public function getSeriousAdverseOutcome() {
        return $this->properties['seriousAdverseOutcome'];
    }


}
