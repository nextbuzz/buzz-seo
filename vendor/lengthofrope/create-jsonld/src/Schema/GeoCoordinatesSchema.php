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
 * The geographic coordinates of a place or event.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class GeoCoordinatesSchema extends StructuredValueSchema
{
    public static function factory()
    {
        return new GeoCoordinatesSchema('http://schema.org/', 'GeoCoordinates');
    }

    /**
     * Physical address of the item.
     *
     * @param $address PostalAddressSchema|TextSchema
     **/
    public function setAddress($address) {
        $this->properties['address'] = $address;

        return $this;
    }

    /**
     * @return PostalAddressSchema|TextSchema
     **/
    public function getAddress() {
        return $this->properties['address'];
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
     * The elevation of a location (<a href="https://en.wikipedia.org/wiki/World_Geodetic_System">WGS 84</a>).
     *
     * @param $elevation NumberSchema|TextSchema
     **/
    public function setElevation($elevation) {
        $this->properties['elevation'] = $elevation;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getElevation() {
        return $this->properties['elevation'];
    }

    /**
     * The latitude of a location. For example <code>37.42242</code> (<a href="https://en.wikipedia.org/wiki/World_Geodetic_System">WGS 84</a>).
     *
     * @param $latitude NumberSchema|TextSchema
     **/
    public function setLatitude($latitude) {
        $this->properties['latitude'] = $latitude;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getLatitude() {
        return $this->properties['latitude'];
    }

    /**
     * The longitude of a location. For example <code>-122.08585</code> (<a href="https://en.wikipedia.org/wiki/World_Geodetic_System">WGS 84</a>).
     *
     * @param $longitude NumberSchema|TextSchema
     **/
    public function setLongitude($longitude) {
        $this->properties['longitude'] = $longitude;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getLongitude() {
        return $this->properties['longitude'];
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


}
