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
 * A reservation for air travel.Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations. For offers of tickets, use http://schema.org/Offer.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class FlightReservationSchema extends ReservationSchema
{
    public static function factory()
    {
        return new FlightReservationSchema('http://schema.org/', 'FlightReservation');
    }

    /**
     * The airline-specific indicator of boarding order / preference.
     *
     * @param $boardingGroup TextSchema
     **/
    public function setBoardingGroup($boardingGroup) {
        $this->properties['boardingGroup'] = $boardingGroup;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getBoardingGroup() {
        return $this->properties['boardingGroup'];
    }

    /**
     * The priority status assigned to a passenger for security or boarding (e.g. FastTrack or Priority).
     *
     * @param $passengerPriorityStatus TextSchema|QualitativeValueSchema
     **/
    public function setPassengerPriorityStatus($passengerPriorityStatus) {
        $this->properties['passengerPriorityStatus'] = $passengerPriorityStatus;

        return $this;
    }

    /**
     * @return TextSchema|QualitativeValueSchema
     **/
    public function getPassengerPriorityStatus() {
        return $this->properties['passengerPriorityStatus'];
    }

    /**
     * The passenger's sequence number as assigned by the airline.
     *
     * @param $passengerSequenceNumber TextSchema
     **/
    public function setPassengerSequenceNumber($passengerSequenceNumber) {
        $this->properties['passengerSequenceNumber'] = $passengerSequenceNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPassengerSequenceNumber() {
        return $this->properties['passengerSequenceNumber'];
    }

    /**
     * The type of security screening the passenger is subject to.
     *
     * @param $securityScreening TextSchema
     **/
    public function setSecurityScreening($securityScreening) {
        $this->properties['securityScreening'] = $securityScreening;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSecurityScreening() {
        return $this->properties['securityScreening'];
    }


}
