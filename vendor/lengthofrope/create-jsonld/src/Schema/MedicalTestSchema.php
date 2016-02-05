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
 * Any medical test, typically performed for diagnostic purposes.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MedicalTestSchema extends MedicalEntitySchema
{
    public static function factory()
    {
        return new MedicalTestSchema('http://schema.org/', 'MedicalTest');
    }

    /**
     * Drugs that affect the test's results.
     *
     * @param $affectedBy DrugSchema
     **/
    public function setAffectedBy($affectedBy) {
        $this->properties['affectedBy'] = $affectedBy;

        return $this;
    }

    /**
     * @return DrugSchema
     **/
    public function getAffectedBy() {
        return $this->properties['affectedBy'];
    }

    /**
     * Range of acceptable values for a typical patient, when applicable.
     *
     * @param $normalRange TextSchema
     **/
    public function setNormalRange($normalRange) {
        $this->properties['normalRange'] = $normalRange;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getNormalRange() {
        return $this->properties['normalRange'];
    }

    /**
     * A sign detected by the test.
     *
     * @param $signDetected MedicalSignSchema
     **/
    public function setSignDetected($signDetected) {
        $this->properties['signDetected'] = $signDetected;

        return $this;
    }

    /**
     * @return MedicalSignSchema
     **/
    public function getSignDetected() {
        return $this->properties['signDetected'];
    }

    /**
     * A condition the test is used to diagnose.
     *
     * @param $usedToDiagnose MedicalConditionSchema
     **/
    public function setUsedToDiagnose($usedToDiagnose) {
        $this->properties['usedToDiagnose'] = $usedToDiagnose;

        return $this;
    }

    /**
     * @return MedicalConditionSchema
     **/
    public function getUsedToDiagnose() {
        return $this->properties['usedToDiagnose'];
    }

    /**
     * Device used to perform the test.
     *
     * @param $usesDevice MedicalDeviceSchema
     **/
    public function setUsesDevice($usesDevice) {
        $this->properties['usesDevice'] = $usesDevice;

        return $this;
    }

    /**
     * @return MedicalDeviceSchema
     **/
    public function getUsesDevice() {
        return $this->properties['usesDevice'];
    }


}
