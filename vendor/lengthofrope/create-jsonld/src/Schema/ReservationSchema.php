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
 * Describes a reservation for travel, dining or an event. Some reservations require tickets.Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations. For offers of tickets, restaurant reservations, flights, or rental cars, use http://schema.org/Offer.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ReservationSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new ReservationSchema('http://schema.org/', 'Reservation');
    }

    /**
     * 'bookingAgent' is an out-dated term indicating a 'broker' that serves as a booking agent.
     *
     * @param $bookingAgent PersonSchema|OrganizationSchema
     **/
    public function setBookingAgent($bookingAgent) {
        $this->properties['bookingAgent'] = $bookingAgent;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getBookingAgent() {
        return $this->properties['bookingAgent'];
    }

    /**
     * The date and time the reservation was booked.
     *
     * @param $bookingTime DateTimeSchema
     **/
    public function setBookingTime($bookingTime) {
        $this->properties['bookingTime'] = $bookingTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getBookingTime() {
        return $this->properties['bookingTime'];
    }

    /**
     * An entity that arranges for an exchange between a buyer and a seller.  In most cases a broker never acquires or releases ownership of a product or service involved in an exchange.  If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred.
     *
     * @param $broker PersonSchema|OrganizationSchema
     **/
    public function setBroker($broker) {
        $this->properties['broker'] = $broker;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getBroker() {
        return $this->properties['broker'];
    }

    /**
     * The date and time the reservation was modified.
     *
     * @param $modifiedTime DateTimeSchema
     **/
    public function setModifiedTime($modifiedTime) {
        $this->properties['modifiedTime'] = $modifiedTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getModifiedTime() {
        return $this->properties['modifiedTime'];
    }

    /**
     * The currency (in 3-letter ISO 4217 format) of the price or a price component, when attached to PriceSpecification and its subtypes.
     *
     * @param $priceCurrency TextSchema
     **/
    public function setPriceCurrency($priceCurrency) {
        $this->properties['priceCurrency'] = $priceCurrency;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPriceCurrency() {
        return $this->properties['priceCurrency'];
    }

    /**
     * Any membership in a frequent flyer, hotel loyalty program, etc. being applied to the reservation.
     *
     * @param $programMembershipUsed ProgramMembershipSchema
     **/
    public function setProgramMembershipUsed($programMembershipUsed) {
        $this->properties['programMembershipUsed'] = $programMembershipUsed;

        return $this;
    }

    /**
     * @return ProgramMembershipSchema
     **/
    public function getProgramMembershipUsed() {
        return $this->properties['programMembershipUsed'];
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
     * The thing -- flight, event, restaurant,etc. being reserved.
     *
     * @param $reservationFor ThingSchema
     **/
    public function setReservationFor($reservationFor) {
        $this->properties['reservationFor'] = $reservationFor;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getReservationFor() {
        return $this->properties['reservationFor'];
    }

    /**
     * A unique identifier for the reservation.
     *
     * @param $reservationId TextSchema
     **/
    public function setReservationId($reservationId) {
        $this->properties['reservationId'] = $reservationId;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getReservationId() {
        return $this->properties['reservationId'];
    }

    /**
     * The current status of the reservation.
     *
     * @param $reservationStatus ReservationStatusTypeSchema
     **/
    public function setReservationStatus($reservationStatus) {
        $this->properties['reservationStatus'] = $reservationStatus;

        return $this;
    }

    /**
     * @return ReservationStatusTypeSchema
     **/
    public function getReservationStatus() {
        return $this->properties['reservationStatus'];
    }

    /**
     * A ticket associated with the reservation.
     *
     * @param $reservedTicket TicketSchema
     **/
    public function setReservedTicket($reservedTicket) {
        $this->properties['reservedTicket'] = $reservedTicket;

        return $this;
    }

    /**
     * @return TicketSchema
     **/
    public function getReservedTicket() {
        return $this->properties['reservedTicket'];
    }

    /**
     * The total price for the reservation or ticket, including applicable taxes, shipping, etc.
     *
     * @param $totalPrice NumberSchema|TextSchema|PriceSpecificationSchema
     **/
    public function setTotalPrice($totalPrice) {
        $this->properties['totalPrice'] = $totalPrice;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema|PriceSpecificationSchema
     **/
    public function getTotalPrice() {
        return $this->properties['totalPrice'];
    }

    /**
     * The person or organization the reservation or ticket is for.
     *
     * @param $underName PersonSchema|OrganizationSchema
     **/
    public function setUnderName($underName) {
        $this->properties['underName'] = $underName;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getUnderName() {
        return $this->properties['underName'];
    }


}
