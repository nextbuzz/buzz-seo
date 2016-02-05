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
 * The mailing address.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class PostalAddressSchema extends ContactPointSchema
{
    public static function factory()
    {
        return new PostalAddressSchema('http://schema.org/', 'PostalAddress');
    }

    /**
     * The country. For example, USA. You can also provide the two-letter <a href='http://en.wikipedia.org/wiki/ISO_3166-1'>ISO 3166-1 alpha-2 country code</a>.
     *
     * @param $addressCountry TextSchema|CountrySchema
     **/
    public function setAddressCountry($addressCountry) {
        $this->properties['addressCountry'] = $addressCountry;

        return $this;
    }

    /**
     * @return TextSchema|CountrySchema
     **/
    public function getAddressCountry() {
        return $this->properties['addressCountry'];
    }

    /**
     * The locality. For example, Mountain View.
     *
     * @param $addressLocality TextSchema
     **/
    public function setAddressLocality($addressLocality) {
        $this->properties['addressLocality'] = $addressLocality;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAddressLocality() {
        return $this->properties['addressLocality'];
    }

    /**
     * The region. For example, CA.
     *
     * @param $addressRegion TextSchema
     **/
    public function setAddressRegion($addressRegion) {
        $this->properties['addressRegion'] = $addressRegion;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAddressRegion() {
        return $this->properties['addressRegion'];
    }

    /**
     * The post office box number for PO box addresses.
     *
     * @param $postOfficeBoxNumber TextSchema
     **/
    public function setPostOfficeBoxNumber($postOfficeBoxNumber) {
        $this->properties['postOfficeBoxNumber'] = $postOfficeBoxNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPostOfficeBoxNumber() {
        return $this->properties['postOfficeBoxNumber'];
    }

    /**
     * The postal code. For example, 94043.
     *
     * @param $postalCode TextSchema
     **/
    public function setPostalCode($postalCode) {
        $this->properties['postalCode'] = $postalCode;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPostalCode() {
        return $this->properties['postalCode'];
    }

    /**
     * The street address. For example, 1600 Amphitheatre Pkwy.
     *
     * @param $streetAddress TextSchema
     **/
    public function setStreetAddress($streetAddress) {
        $this->properties['streetAddress'] = $streetAddress;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getStreetAddress() {
        return $this->properties['streetAddress'];
    }


}
