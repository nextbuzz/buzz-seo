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
 * Any medical intervention designed to prevent, treat, and cure human diseases and medical conditions, including both curative and palliative therapies. Medical therapies are typically processes of care relying upon pharmacotherapy, behavioral therapy, supportive therapy (with fluid or nutrition for example), or detoxification (e.g. hemodialysis) aimed at improving or preventing a health condition.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MedicalTherapySchema extends MedicalEntitySchema
{
    public static function factory()
    {
        return new MedicalTherapySchema('http://schema.org/', 'MedicalTherapy');
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
     * A therapy that duplicates or overlaps this one.
     *
     * @param $duplicateTherapy MedicalTherapySchema
     **/
    public function setDuplicateTherapy($duplicateTherapy) {
        $this->properties['duplicateTherapy'] = $duplicateTherapy;

        return $this;
    }

    /**
     * @return MedicalTherapySchema
     **/
    public function getDuplicateTherapy() {
        return $this->properties['duplicateTherapy'];
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
