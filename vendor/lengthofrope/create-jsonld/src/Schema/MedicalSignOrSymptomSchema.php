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
 * Any indication of the existence of a medical condition or disease.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MedicalSignOrSymptomSchema extends MedicalEntitySchema
{
    public static function factory()
    {
        return new MedicalSignOrSymptomSchema('http://schema.org/', 'MedicalSignOrSymptom');
    }

    /**
     * An underlying cause. More specifically, one of the causative agent(s) that are most directly responsible for the pathophysiologic process that eventually results in the occurrence.
     *
     * @param $cause MedicalCauseSchema
     **/
    public function setCause($cause) {
        $this->properties['cause'] = $cause;

        return $this;
    }

    /**
     * @return MedicalCauseSchema
     **/
    public function getCause() {
        return $this->properties['cause'];
    }

    /**
     * A possible treatment to address this condition, sign or symptom.
     *
     * @param $possibleTreatment MedicalTherapySchema
     **/
    public function setPossibleTreatment($possibleTreatment) {
        $this->properties['possibleTreatment'] = $possibleTreatment;

        return $this;
    }

    /**
     * @return MedicalTherapySchema
     **/
    public function getPossibleTreatment() {
        return $this->properties['possibleTreatment'];
    }


}
