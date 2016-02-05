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
 * An airline flight.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class FlightSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new FlightSchema('http://schema.org/', 'Flight');
    }

    /**
     * The kind of aircraft (e.g., "Boeing 747").
     *
     * @param $aircraft TextSchema|VehicleSchema
     **/
    public function setAircraft($aircraft) {
        $this->properties['aircraft'] = $aircraft;

        return $this;
    }

    /**
     * @return TextSchema|VehicleSchema
     **/
    public function getAircraft() {
        return $this->properties['aircraft'];
    }

    /**
     * The airport where the flight terminates.
     *
     * @param $arrivalAirport AirportSchema
     **/
    public function setArrivalAirport($arrivalAirport) {
        $this->properties['arrivalAirport'] = $arrivalAirport;

        return $this;
    }

    /**
     * @return AirportSchema
     **/
    public function getArrivalAirport() {
        return $this->properties['arrivalAirport'];
    }

    /**
     * Identifier of the flight's arrival gate.
     *
     * @param $arrivalGate TextSchema
     **/
    public function setArrivalGate($arrivalGate) {
        $this->properties['arrivalGate'] = $arrivalGate;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getArrivalGate() {
        return $this->properties['arrivalGate'];
    }

    /**
     * Identifier of the flight's arrival terminal.
     *
     * @param $arrivalTerminal TextSchema
     **/
    public function setArrivalTerminal($arrivalTerminal) {
        $this->properties['arrivalTerminal'] = $arrivalTerminal;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getArrivalTerminal() {
        return $this->properties['arrivalTerminal'];
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
     * 'carrier' is an out-dated term indicating the 'provider' for parcel delivery and flights.
     *
     * @param $carrier OrganizationSchema
     **/
    public function setCarrier($carrier) {
        $this->properties['carrier'] = $carrier;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getCarrier() {
        return $this->properties['carrier'];
    }

    /**
     * The airport where the flight originates.
     *
     * @param $departureAirport AirportSchema
     **/
    public function setDepartureAirport($departureAirport) {
        $this->properties['departureAirport'] = $departureAirport;

        return $this;
    }

    /**
     * @return AirportSchema
     **/
    public function getDepartureAirport() {
        return $this->properties['departureAirport'];
    }

    /**
     * Identifier of the flight's departure gate.
     *
     * @param $departureGate TextSchema
     **/
    public function setDepartureGate($departureGate) {
        $this->properties['departureGate'] = $departureGate;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDepartureGate() {
        return $this->properties['departureGate'];
    }

    /**
     * Identifier of the flight's departure terminal.
     *
     * @param $departureTerminal TextSchema
     **/
    public function setDepartureTerminal($departureTerminal) {
        $this->properties['departureTerminal'] = $departureTerminal;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDepartureTerminal() {
        return $this->properties['departureTerminal'];
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
     * The estimated time the flight will take.
     *
     * @param $estimatedFlightDuration TextSchema|DurationSchema
     **/
    public function setEstimatedFlightDuration($estimatedFlightDuration) {
        $this->properties['estimatedFlightDuration'] = $estimatedFlightDuration;

        return $this;
    }

    /**
     * @return TextSchema|DurationSchema
     **/
    public function getEstimatedFlightDuration() {
        return $this->properties['estimatedFlightDuration'];
    }

    /**
     * The distance of the flight.
     *
     * @param $flightDistance TextSchema|DistanceSchema
     **/
    public function setFlightDistance($flightDistance) {
        $this->properties['flightDistance'] = $flightDistance;

        return $this;
    }

    /**
     * @return TextSchema|DistanceSchema
     **/
    public function getFlightDistance() {
        return $this->properties['flightDistance'];
    }

    /**
     * The unique identifier for a flight including the airline IATA code. For example, if describing United flight 110, where the IATA code for United is 'UA', the flightNumber is 'UA110'.
     *
     * @param $flightNumber TextSchema
     **/
    public function setFlightNumber($flightNumber) {
        $this->properties['flightNumber'] = $flightNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getFlightNumber() {
        return $this->properties['flightNumber'];
    }

    /**
     * Description of the meals that will be provided or available for purchase.
     *
     * @param $mealService TextSchema
     **/
    public function setMealService($mealService) {
        $this->properties['mealService'] = $mealService;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getMealService() {
        return $this->properties['mealService'];
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
     * An entity which offers (sells / leases / lends / loans) the services / goods.  A seller may also be a provider.
     *
     * @param $seller OrganizationSchema|PersonSchema
     **/
    public function setSeller($seller) {
        $this->properties['seller'] = $seller;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getSeller() {
        return $this->properties['seller'];
    }

    /**
     * The time when a passenger can check into the flight online.
     *
     * @param $webCheckinTime DateTimeSchema
     **/
    public function setWebCheckinTime($webCheckinTime) {
        $this->properties['webCheckinTime'] = $webCheckinTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getWebCheckinTime() {
        return $this->properties['webCheckinTime'];
    }


}
