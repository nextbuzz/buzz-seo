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
 * An organization that provides flights for passengers.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class AirlineSchema extends OrganizationSchema
{
    public static function factory()
    {
        return new AirlineSchema('http://schema.org/', 'Airline');
    }

    /**
     * The type of boarding policy used by the airline (e.g. zone-based or group-based).
     *
     * @param $boardingPolicy BoardingPolicyTypeSchema
     **/
    public function setBoardingPolicy($boardingPolicy) {
        $this->properties['boardingPolicy'] = $boardingPolicy;

        return $this;
    }

    /**
     * @return BoardingPolicyTypeSchema
     **/
    public function getBoardingPolicy() {
        return $this->properties['boardingPolicy'];
    }

    /**
     * IATA identifier for an airline or airport.
     *
     * @param $iataCode TextSchema
     **/
    public function setIataCode($iataCode) {
        $this->properties['iataCode'] = $iataCode;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getIataCode() {
        return $this->properties['iataCode'];
    }


}
