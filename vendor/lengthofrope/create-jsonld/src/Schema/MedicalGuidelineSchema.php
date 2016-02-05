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
 * Any recommendation made by a standard society (e.g. ACC/AHA) or consensus statement that denotes how to diagnose and treat a particular condition. Note: this type should be used to tag the actual guideline recommendation; if the guideline recommendation occurs in a larger scholarly article, use MedicalScholarlyArticle to tag the overall article, not this type. Note also: the organization making the recommendation should be captured in the recognizingAuthority base property of MedicalEntity.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MedicalGuidelineSchema extends MedicalEntitySchema
{
    public static function factory()
    {
        return new MedicalGuidelineSchema('http://schema.org/', 'MedicalGuideline');
    }

    /**
     * Strength of evidence of the data used to formulate the guideline (enumerated).
     *
     * @param $evidenceLevel MedicalEvidenceLevelSchema
     **/
    public function setEvidenceLevel($evidenceLevel) {
        $this->properties['evidenceLevel'] = $evidenceLevel;

        return $this;
    }

    /**
     * @return MedicalEvidenceLevelSchema
     **/
    public function getEvidenceLevel() {
        return $this->properties['evidenceLevel'];
    }

    /**
     * Source of the data used to formulate the guidance, e.g. RCT, consensus opinion, etc.
     *
     * @param $evidenceOrigin TextSchema
     **/
    public function setEvidenceOrigin($evidenceOrigin) {
        $this->properties['evidenceOrigin'] = $evidenceOrigin;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getEvidenceOrigin() {
        return $this->properties['evidenceOrigin'];
    }

    /**
     * Date on which this guideline's recommendation was made.
     *
     * @param $guidelineDate DateSchema
     **/
    public function setGuidelineDate($guidelineDate) {
        $this->properties['guidelineDate'] = $guidelineDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getGuidelineDate() {
        return $this->properties['guidelineDate'];
    }

    /**
     * The medical conditions, treatments, etc. that are the subject of the guideline.
     *
     * @param $guidelineSubject MedicalEntitySchema
     **/
    public function setGuidelineSubject($guidelineSubject) {
        $this->properties['guidelineSubject'] = $guidelineSubject;

        return $this;
    }

    /**
     * @return MedicalEntitySchema
     **/
    public function getGuidelineSubject() {
        return $this->properties['guidelineSubject'];
    }


}
