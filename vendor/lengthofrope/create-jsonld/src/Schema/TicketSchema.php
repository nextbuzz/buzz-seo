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
 * Used to describe a ticket to an event, a flight, a bus ride, etc.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class TicketSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new TicketSchema('http://schema.org/', 'Ticket');
    }

    /**
     * The date the ticket was issued.
     *
     * @param $dateIssued DateTimeSchema
     **/
    public function setDateIssued($dateIssued) {
        $this->properties['dateIssued'] = $dateIssued;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getDateIssued() {
        return $this->properties['dateIssued'];
    }

    /**
     * The organization issuing the ticket or permit.
     *
     * @param $issuedBy OrganizationSchema
     **/
    public function setIssuedBy($issuedBy) {
        $this->properties['issuedBy'] = $issuedBy;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getIssuedBy() {
        return $this->properties['issuedBy'];
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
     * The unique identifier for the ticket.
     *
     * @param $ticketNumber TextSchema
     **/
    public function setTicketNumber($ticketNumber) {
        $this->properties['ticketNumber'] = $ticketNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTicketNumber() {
        return $this->properties['ticketNumber'];
    }

    /**
     * Reference to an asset (e.g., Barcode, QR code image or PDF) usable for entrance.
     *
     * @param $ticketToken TextSchema|URLSchema
     **/
    public function setTicketToken($ticketToken) {
        $this->properties['ticketToken'] = $ticketToken;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getTicketToken() {
        return $this->properties['ticketToken'];
    }

    /**
     * The seat associated with the ticket.
     *
     * @param $ticketedSeat SeatSchema
     **/
    public function setTicketedSeat($ticketedSeat) {
        $this->properties['ticketedSeat'] = $ticketedSeat;

        return $this;
    }

    /**
     * @return SeatSchema
     **/
    public function getTicketedSeat() {
        return $this->properties['ticketedSeat'];
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
