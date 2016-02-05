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
 * A trip on a commercial train line.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class TrainTripSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new TrainTripSchema('http://schema.org/', 'TrainTrip');
    }

    /**
     * The platform where the train arrives.
     *
     * @param $arrivalPlatform TextSchema
     **/
    public function setArrivalPlatform($arrivalPlatform) {
        $this->properties['arrivalPlatform'] = $arrivalPlatform;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getArrivalPlatform() {
        return $this->properties['arrivalPlatform'];
    }

    /**
     * The station where the train trip ends.
     *
     * @param $arrivalStation TrainStationSchema
     **/
    public function setArrivalStation($arrivalStation) {
        $this->properties['arrivalStation'] = $arrivalStation;

        return $this;
    }

    /**
     * @return TrainStationSchema
     **/
    public function getArrivalStation() {
        return $this->properties['arrivalStation'];
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
     * The platform from which the train departs.
     *
     * @param $departurePlatform TextSchema
     **/
    public function setDeparturePlatform($departurePlatform) {
        $this->properties['departurePlatform'] = $departurePlatform;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDeparturePlatform() {
        return $this->properties['departurePlatform'];
    }

    /**
     * The station from which the train departs.
     *
     * @param $departureStation TrainStationSchema
     **/
    public function setDepartureStation($departureStation) {
        $this->properties['departureStation'] = $departureStation;

        return $this;
    }

    /**
     * @return TrainStationSchema
     **/
    public function getDepartureStation() {
        return $this->properties['departureStation'];
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

    /**
     * The name of the train (e.g. The Orient Express).
     *
     * @param $trainName TextSchema
     **/
    public function setTrainName($trainName) {
        $this->properties['trainName'] = $trainName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTrainName() {
        return $this->properties['trainName'];
    }

    /**
     * The unique identifier for the train.
     *
     * @param $trainNumber TextSchema
     **/
    public function setTrainNumber($trainNumber) {
        $this->properties['trainNumber'] = $trainNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTrainNumber() {
        return $this->properties['trainNumber'];
    }


}
