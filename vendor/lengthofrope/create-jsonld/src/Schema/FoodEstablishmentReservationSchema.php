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
 * A reservation to dine at a food-related business.Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class FoodEstablishmentReservationSchema extends ReservationSchema
{
    public static function factory()
    {
        return new FoodEstablishmentReservationSchema('http://schema.org/', 'FoodEstablishmentReservation');
    }

    /**
     * The endTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to end. For actions that span a period of time, when the action was performed. e.g. John wrote a book from January to *December*.

Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.
     *
     * @param $endTime DateTimeSchema
     **/
    public function setEndTime($endTime) {
        $this->properties['endTime'] = $endTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getEndTime() {
        return $this->properties['endTime'];
    }

    /**
     * Number of people the reservation should accommodate.
     *
     * @param $partySize IntegerSchema|QuantitativeValueSchema
     **/
    public function setPartySize($partySize) {
        $this->properties['partySize'] = $partySize;

        return $this;
    }

    /**
     * @return IntegerSchema|QuantitativeValueSchema
     **/
    public function getPartySize() {
        return $this->properties['partySize'];
    }

    /**
     * The startTime of something. For a reserved event or service (e.g. FoodEstablishmentReservation), the time that it is expected to start. For actions that span a period of time, when the action was performed. e.g. John wrote a book from *January* to December.

Note that Event uses startDate/endDate instead of startTime/endTime, even when describing dates with times. This situation may be clarified in future revisions.
     *
     * @param $startTime DateTimeSchema
     **/
    public function setStartTime($startTime) {
        $this->properties['startTime'] = $startTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getStartTime() {
        return $this->properties['startTime'];
    }


}
