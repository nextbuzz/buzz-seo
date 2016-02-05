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
 * The anatomical location at which two or more bones make contact.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class JointSchema extends AnatomicalStructureSchema
{
    public static function factory()
    {
        return new JointSchema('http://schema.org/', 'Joint');
    }

    /**
     * The biomechanical properties of the bone.
     *
     * @param $biomechnicalClass TextSchema
     **/
    public function setBiomechnicalClass($biomechnicalClass) {
        $this->properties['biomechnicalClass'] = $biomechnicalClass;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getBiomechnicalClass() {
        return $this->properties['biomechnicalClass'];
    }

    /**
     * The degree of mobility the joint allows.
     *
     * @param $functionalClass TextSchema
     **/
    public function setFunctionalClass($functionalClass) {
        $this->properties['functionalClass'] = $functionalClass;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getFunctionalClass() {
        return $this->properties['functionalClass'];
    }

    /**
     * The name given to how bone physically connects to each other.
     *
     * @param $structuralClass TextSchema
     **/
    public function setStructuralClass($structuralClass) {
        $this->properties['structuralClass'] = $structuralClass;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getStructuralClass() {
        return $this->properties['structuralClass'];
    }


}
