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
 * A reservation for lodging at a hotel, motel, inn, etc.Note: This type is for information about actual reservations, e.g. in confirmation emails or HTML pages with individual confirmations of reservations.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class LodgingReservationSchema extends ReservationSchema
{
    public static function factory()
    {
        return new LodgingReservationSchema('http://schema.org/', 'LodgingReservation');
    }

    /**
     * The earliest someone may check into a lodging establishment.
     *
     * @param $checkinTime DateTimeSchema
     **/
    public function setCheckinTime($checkinTime) {
        $this->properties['checkinTime'] = $checkinTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getCheckinTime() {
        return $this->properties['checkinTime'];
    }

    /**
     * The latest someone may check out of a lodging establishment.
     *
     * @param $checkoutTime DateTimeSchema
     **/
    public function setCheckoutTime($checkoutTime) {
        $this->properties['checkoutTime'] = $checkoutTime;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getCheckoutTime() {
        return $this->properties['checkoutTime'];
    }

    /**
     * A full description of the lodging unit.
     *
     * @param $lodgingUnitDescription TextSchema
     **/
    public function setLodgingUnitDescription($lodgingUnitDescription) {
        $this->properties['lodgingUnitDescription'] = $lodgingUnitDescription;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getLodgingUnitDescription() {
        return $this->properties['lodgingUnitDescription'];
    }

    /**
     * Textual description of the unit type (including suite vs. room, size of bed, etc.).
     *
     * @param $lodgingUnitType TextSchema|QualitativeValueSchema
     **/
    public function setLodgingUnitType($lodgingUnitType) {
        $this->properties['lodgingUnitType'] = $lodgingUnitType;

        return $this;
    }

    /**
     * @return TextSchema|QualitativeValueSchema
     **/
    public function getLodgingUnitType() {
        return $this->properties['lodgingUnitType'];
    }

    /**
     * The number of adults staying in the unit.
     *
     * @param $numAdults IntegerSchema|QuantitativeValueSchema
     **/
    public function setNumAdults($numAdults) {
        $this->properties['numAdults'] = $numAdults;

        return $this;
    }

    /**
     * @return IntegerSchema|QuantitativeValueSchema
     **/
    public function getNumAdults() {
        return $this->properties['numAdults'];
    }

    /**
     * The number of children staying in the unit.
     *
     * @param $numChildren IntegerSchema|QuantitativeValueSchema
     **/
    public function setNumChildren($numChildren) {
        $this->properties['numChildren'] = $numChildren;

        return $this;
    }

    /**
     * @return IntegerSchema|QuantitativeValueSchema
     **/
    public function getNumChildren() {
        return $this->properties['numChildren'];
    }


}
