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
 * A trip on a commercial bus line.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class BusTripSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new BusTripSchema('http://schema.org/', 'BusTrip');
    }

    /**
     * The stop or station from which the bus arrives.
     *
     * @param $arrivalBusStop BusStationSchema|BusStopSchema
     **/
    public function setArrivalBusStop($arrivalBusStop) {
        $this->properties['arrivalBusStop'] = $arrivalBusStop;

        return $this;
    }

    /**
     * @return BusStationSchema|BusStopSchema
     **/
    public function getArrivalBusStop() {
        return $this->properties['arrivalBusStop'];
    }

    /**
     * The expected arrival time.
     *
     * @param $arrivalTime DateTimeSchema
     **/
    public function setArrivalTime($arrivalTime) {
        $this->properties['arrivalTime'] = $arrivalTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getArrivalTime() {
        return $this->properties['arrivalTime'];
    }

    /**
     * The name of the bus (e.g. Bolt Express).
     *
     * @param $busName TextSchema
     **/
    public function setBusName($busName) {
        $this->properties['busName'] = $busName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getBusName() {
        return $this->properties['busName'];
    }

    /**
     * The unique identifier for the bus.
     *
     * @param $busNumber TextSchema
     **/
    public function setBusNumber($busNumber) {
        $this->properties['busNumber'] = $busNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getBusNumber() {
        return $this->properties['busNumber'];
    }

    /**
     * The stop or station from which the bus departs.
     *
     * @param $departureBusStop BusStationSchema|BusStopSchema
     **/
    public function setDepartureBusStop($departureBusStop) {
        $this->properties['departureBusStop'] = $departureBusStop;

        return $this;
    }

    /**
     * @return BusStationSchema|BusStopSchema
     **/
    public function getDepartureBusStop() {
        return $this->properties['departureBusStop'];
    }

    /**
     * The expected departure time.
     *
     * @param $departureTime DateTimeSchema
     **/
    public function setDepartureTime($departureTime) {
        $this->properties['departureTime'] = $departureTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getDepartureTime() {
        return $this->properties['departureTime'];
    }

    /**
     * The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.
     *
     * @param $provider PersonSchema|OrganizationSchema
     **/
    public function setProvider($provider) {
        $this->properties['provider'] = $provider;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getProvider() {
        return $this->properties['provider'];
    }


}
