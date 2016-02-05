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
 * A permit issued by an organization, e.g. a parking pass.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class PermitSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new PermitSchema('http://schema.org/', 'Permit');
    }

    /**
     * The organization issuing the ticket or permit.
     *
     * @param $issuedBy OrganizationSchema
     **/
    public function setIssuedBy($issuedBy) {
        $this->properties['issuedBy'] = $issuedBy;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getIssuedBy() {
        return $this->properties['issuedBy'];
    }

    /**
     * The service through with the permit was granted.
     *
     * @param $issuedThrough ServiceSchema
     **/
    public function setIssuedThrough($issuedThrough) {
        $this->properties['issuedThrough'] = $issuedThrough;

        return $this;
    }

    /**
     * @return ServiceSchema
     **/
    public function getIssuedThrough() {
        return $this->properties['issuedThrough'];
    }

    /**
     * The target audience for this permit.
     *
     * @param $permitAudience AudienceSchema
     **/
    public function setPermitAudience($permitAudience) {
        $this->properties['permitAudience'] = $permitAudience;

        return $this;
    }

    /**
     * @return AudienceSchema
     **/
    public function getPermitAudience() {
        return $this->properties['permitAudience'];
    }

    /**
     * The time validity of the permit.
     *
     * @param $validFor DurationSchema
     **/
    public function setValidFor($validFor) {
        $this->properties['validFor'] = $validFor;

        return $this;
    }

    /**
     * @return DurationSchema
     **/
    public function getValidFor() {
        return $this->properties['validFor'];
    }

    /**
     * The date when the item becomes valid.
     *
     * @param $validFrom DateTimeSchema
     **/
    public function setValidFrom($validFrom) {
        $this->properties['validFrom'] = $validFrom;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getValidFrom() {
        return $this->properties['validFrom'];
    }

    /**
     * The geographic area where the permit is valid.
     *
     * @param $validIn AdministrativeAreaSchema
     **/
    public function setValidIn($validIn) {
        $this->properties['validIn'] = $validIn;

        return $this;
    }

    /**
     * @return AdministrativeAreaSchema
     **/
    public function getValidIn() {
        return $this->properties['validIn'];
    }

    /**
     * The date when the item is no longer valid.
     *
     * @param $validUntil DateSchema
     **/
    public function setValidUntil($validUntil) {
        $this->properties['validUntil'] = $validUntil;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getValidUntil() {
        return $this->properties['validUntil'];
    }


}
