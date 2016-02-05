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
 * A medical study is an umbrella type covering all kinds of research studies relating to human medicine or health, including observational studies and interventional trials and registries, randomized, controlled or not. When the specific type of study is known, use one of the extensions of this type, such as MedicalTrial or MedicalObservationalStudy. Also, note that this type should be used to mark up data that describes the study itself; to tag an article that publishes the results of a study, use MedicalScholarlyArticle. Note: use the code property of MedicalEntity to store study IDs, e.g. clinicaltrials.gov ID.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MedicalStudySchema extends MedicalEntitySchema
{
    public static function factory()
    {
        return new MedicalStudySchema('http://schema.org/', 'MedicalStudy');
    }

    /**
     * Expected or actual outcomes of the study.
     *
     * @param $outcome TextSchema
     **/
    public function setOutcome($outcome) {
        $this->properties['outcome'] = $outcome;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getOutcome() {
        return $this->properties['outcome'];
    }

    /**
     * Any characteristics of the population used in the study, e.g. 'males under 65'.
     *
     * @param $population TextSchema
     **/
    public function setPopulation($population) {
        $this->properties['population'] = $population;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPopulation() {
        return $this->properties['population'];
    }

    /**
     * Sponsor of the study.
     *
     * @param $sponsor OrganizationSchema
     **/
    public function setSponsor($sponsor) {
        $this->properties['sponsor'] = $sponsor;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getSponsor() {
        return $this->properties['sponsor'];
    }

    /**
     * The status of the study (enumerated).
     *
     * @param $status MedicalStudyStatusSchema
     **/
    public function setStatus($status) {
        $this->properties['status'] = $status;

        return $this;
    }

    /**
     * @return MedicalStudyStatusSchema
     **/
    public function getStatus() {
        return $this->properties['status'];
    }

    /**
     * The location in which the study is taking/took place.
     *
     * @param $studyLocation AdministrativeAreaSchema
     **/
    public function setStudyLocation($studyLocation) {
        $this->properties['studyLocation'] = $studyLocation;

        return $this;
    }

    /**
     * @return AdministrativeAreaSchema
     **/
    public function getStudyLocation() {
        return $this->properties['studyLocation'];
    }

    /**
     * A subject of the study, i.e. one of the medical conditions, therapies, devices, drugs, etc. investigated by the study.
     *
     * @param $studySubject MedicalEntitySchema
     **/
    public function setStudySubject($studySubject) {
        $this->properties['studySubject'] = $studySubject;

        return $this;
    }

    /**
     * @return MedicalEntitySchema
     **/
    public function getStudySubject() {
        return $this->properties['studySubject'];
    }


}
