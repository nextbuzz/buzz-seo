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
 * The geographic shape of a place. A GeoShape can be described using several properties whose values are based on latitude/longitude pairs. Either whitespace or commas can be used to separate latitude and longitude; whitespace should be used when writing a list of several such points.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class GeoShapeSchema extends StructuredValueSchema
{
    public static function factory()
    {
        return new GeoShapeSchema('http://schema.org/', 'GeoShape');
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
     * A box is the area enclosed by the rectangle formed by two points. The first point is the lower corner, the second point is the upper corner. A box is expressed as two points separated by a space character.
     *
     * @param $box TextSchema
     **/
    public function setBox($box) {
        $this->properties['box'] = $box;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getBox() {
        return $this->properties['box'];
    }

    /**
     * A circle is the circular region of a specified radius centered at a specified latitude and longitude. A circle is expressed as a pair followed by a radius in meters.
     *
     * @param $circle TextSchema
     **/
    public function setCircle($circle) {
        $this->properties['circle'] = $circle;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCircle() {
        return $this->properties['circle'];
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
     * A line is a point-to-point path consisting of two or more points. A line is expressed as a series of two or more point objects separated by space.
     *
     * @param $line TextSchema
     **/
    public function setLine($line) {
        $this->properties['line'] = $line;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getLine() {
        return $this->properties['line'];
    }

    /**
     * A polygon is the area enclosed by a point-to-point path for which the starting and ending points are the same. A polygon is expressed as a series of four or more space delimited points where the first and final points are identical.
     *
     * @param $polygon TextSchema
     **/
    public function setPolygon($polygon) {
        $this->properties['polygon'] = $polygon;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPolygon() {
        return $this->properties['polygon'];
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
