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
 * A GeoCircle is a GeoShape representing a circular geographic area. As it is a GeoShape
          it provides the simple textual property 'circle', but also allows the combination of postalCode alongside geoRadius.
          The center of the circle can be indicated via the 'geoMidpoint' property, or more approximately using 'address', 'postalCode'.
       
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class GeoCircleSchema extends GeoShapeSchema
{
    public static function factory()
    {
        return new GeoCircleSchema('http://schema.org/', 'GeoCircle');
    }

    /**
     * Indicates the GeoCoordinates at the centre of a GeoShape e.g. GeoCircle.
     *
     * @param $geoMidpoint GeoCoordinatesSchema
     **/
    public function setGeoMidpoint($geoMidpoint) {
        $this->properties['geoMidpoint'] = $geoMidpoint;

        return $this;
    }

    /**
     * @return GeoCoordinatesSchema
     **/
    public function getGeoMidpoint() {
        return $this->properties['geoMidpoint'];
    }

    /**
     * Indicates the approximate radius of a GeoCircle (metres unless indicated otherwise via Distance notation).
     *
     * @param $geoRadius TextSchema|NumberSchema|DistanceSchema
     **/
    public function setGeoRadius($geoRadius) {
        $this->properties['geoRadius'] = $geoRadius;

        return $this;
    }

    /**
     * @return TextSchema|NumberSchema|DistanceSchema
     **/
    public function getGeoRadius() {
        return $this->properties['geoRadius'];
    }


}
