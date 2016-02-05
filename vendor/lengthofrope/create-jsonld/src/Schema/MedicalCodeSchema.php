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
 * A code for a medical entity.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MedicalCodeSchema extends MedicalIntangibleSchema
{
    public static function factory()
    {
        return new MedicalCodeSchema('http://schema.org/', 'MedicalCode');
    }

    /**
     * The actual code.
     *
     * @param $codeValue TextSchema
     **/
    public function setCodeValue($codeValue) {
        $this->properties['codeValue'] = $codeValue;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCodeValue() {
        return $this->properties['codeValue'];
    }

    /**
     * The coding system, e.g. 'ICD-10'.
     *
     * @param $codingSystem TextSchema
     **/
    public function setCodingSystem($codingSystem) {
        $this->properties['codingSystem'] = $codingSystem;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCodingSystem() {
        return $this->properties['codingSystem'];
    }


}
