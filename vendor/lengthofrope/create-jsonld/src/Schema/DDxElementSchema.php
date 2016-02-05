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
 * An alternative, closely-related condition typically considered later in the differential diagnosis process along with the signs that are used to distinguish it.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class DDxElementSchema extends MedicalIntangibleSchema
{
    public static function factory()
    {
        return new DDxElementSchema('http://schema.org/', 'DDxElement');
    }

    /**
     * One or more alternative conditions considered in the differential diagnosis process.
     *
     * @param $diagnosis MedicalConditionSchema
     **/
    public function setDiagnosis($diagnosis) {
        $this->properties['diagnosis'] = $diagnosis;

        return $this;
    }

    /**
     * @return MedicalConditionSchema
     **/
    public function getDiagnosis() {
        return $this->properties['diagnosis'];
    }

    /**
     * One of a set of signs and symptoms that can be used to distinguish this diagnosis from others in the differential diagnosis.
     *
     * @param $distinguishingSign MedicalSignOrSymptomSchema
     **/
    public function setDistinguishingSign($distinguishingSign) {
        $this->properties['distinguishingSign'] = $distinguishingSign;

        return $this;
    }

    /**
     * @return MedicalSignOrSymptomSchema
     **/
    public function getDistinguishingSign() {
        return $this->properties['distinguishingSign'];
    }


}
