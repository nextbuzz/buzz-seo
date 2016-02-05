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
 * The most generic type of entity related to health and the practice of medicine.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MedicalEntitySchema extends ThingSchema
{
    public static function factory()
    {
        return new MedicalEntitySchema('http://schema.org/', 'MedicalEntity');
    }

    /**
     * A medical code for the entity, taken from a controlled vocabulary or ontology such as ICD-9, DiseasesDB, MeSH, SNOMED-CT, RxNorm, etc.
     *
     * @param $code MedicalCodeSchema
     **/
    public function setCode($code) {
        $this->properties['code'] = $code;

        return $this;
    }

    /**
     * @return MedicalCodeSchema
     **/
    public function getCode() {
        return $this->properties['code'];
    }

    /**
     * A medical guideline related to this entity.
     *
     * @param $guideline MedicalGuidelineSchema
     **/
    public function setGuideline($guideline) {
        $this->properties['guideline'] = $guideline;

        return $this;
    }

    /**
     * @return MedicalGuidelineSchema
     **/
    public function getGuideline() {
        return $this->properties['guideline'];
    }

    /**
     * The system of medicine that includes this MedicalEntity, for example 'evidence-based', 'homeopathic', 'chiropractic', etc.
     *
     * @param $medicineSystem MedicineSystemSchema
     **/
    public function setMedicineSystem($medicineSystem) {
        $this->properties['medicineSystem'] = $medicineSystem;

        return $this;
    }

    /**
     * @return MedicineSystemSchema
     **/
    public function getMedicineSystem() {
        return $this->properties['medicineSystem'];
    }

    /**
     * If applicable, the organization that officially recognizes this entity as part of its endorsed system of medicine.
     *
     * @param $recognizingAuthority OrganizationSchema
     **/
    public function setRecognizingAuthority($recognizingAuthority) {
        $this->properties['recognizingAuthority'] = $recognizingAuthority;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getRecognizingAuthority() {
        return $this->properties['recognizingAuthority'];
    }

    /**
     * If applicable, a medical specialty in which this entity is relevant.
     *
     * @param $relevantSpecialty MedicalSpecialtySchema
     **/
    public function setRelevantSpecialty($relevantSpecialty) {
        $this->properties['relevantSpecialty'] = $relevantSpecialty;

        return $this;
    }

    /**
     * @return MedicalSpecialtySchema
     **/
    public function getRelevantSpecialty() {
        return $this->properties['relevantSpecialty'];
    }

    /**
     * A medical study or trial related to this entity.
     *
     * @param $study MedicalStudySchema
     **/
    public function setStudy($study) {
        $this->properties['study'] = $study;

        return $this;
    }

    /**
     * @return MedicalStudySchema
     **/
    public function getStudy() {
        return $this->properties['study'];
    }


}
