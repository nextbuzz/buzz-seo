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
 * A type of blood vessel that specifically carries blood away from the heart.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ArterySchema extends VesselSchema
{
    public static function factory()
    {
        return new ArterySchema('http://schema.org/', 'Artery');
    }

    /**
     * The branches that comprise the arterial structure.
     *
     * @param $arterialBranch AnatomicalStructureSchema
     **/
    public function setArterialBranch($arterialBranch) {
        $this->properties['arterialBranch'] = $arterialBranch;

        return $this;
    }

    /**
     * @return AnatomicalStructureSchema
     **/
    public function getArterialBranch() {
        return $this->properties['arterialBranch'];
    }

    /**
     * The anatomical or organ system that the artery originates from.
     *
     * @param $source AnatomicalStructureSchema
     **/
    public function setSource($source) {
        $this->properties['source'] = $source;

        return $this;
    }

    /**
     * @return AnatomicalStructureSchema
     **/
    public function getSource() {
        return $this->properties['source'];
    }

    /**
     * The area to which the artery supplies blood.
     *
     * @param $supplyTo AnatomicalStructureSchema
     **/
    public function setSupplyTo($supplyTo) {
        $this->properties['supplyTo'] = $supplyTo;

        return $this;
    }

    /**
     * @return AnatomicalStructureSchema
     **/
    public function getSupplyTo() {
        return $this->properties['supplyTo'];
    }


}
