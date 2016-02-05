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
 * A reservation for a rental car.Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class RentalCarReservationSchema extends ReservationSchema
{
    public static function factory()
    {
        return new RentalCarReservationSchema('http://schema.org/', 'RentalCarReservation');
    }

    /**
     * Where a rental car can be dropped off.
     *
     * @param $dropoffLocation PlaceSchema
     **/
    public function setDropoffLocation($dropoffLocation) {
        $this->properties['dropoffLocation'] = $dropoffLocation;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getDropoffLocation() {
        return $this->properties['dropoffLocation'];
    }

    /**
     * When a rental car can be dropped off.
     *
     * @param $dropoffTime DateTimeSchema
     **/
    public function setDropoffTime($dropoffTime) {
        $this->properties['dropoffTime'] = $dropoffTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getDropoffTime() {
        return $this->properties['dropoffTime'];
    }

    /**
     * Where a taxi will pick up a passenger or a rental car can be picked up.
     *
     * @param $pickupLocation PlaceSchema
     **/
    public function setPickupLocation($pickupLocation) {
        $this->properties['pickupLocation'] = $pickupLocation;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getPickupLocation() {
        return $this->properties['pickupLocation'];
    }

    /**
     * When a taxi will pickup a passenger or a rental car can be picked up.
     *
     * @param $pickupTime DateTimeSchema
     **/
    public function setPickupTime($pickupTime) {
        $this->properties['pickupTime'] = $pickupTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getPickupTime() {
        return $this->properties['pickupTime'];
    }


}
