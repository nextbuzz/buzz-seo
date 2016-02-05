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
 * Used to describe a seat, such as a reserved seat in an event reservation.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class SeatSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new SeatSchema('http://schema.org/', 'Seat');
    }

    /**
     * The location of the reserved seat (e.g., 27).
     *
     * @param $seatNumber TextSchema
     **/
    public function setSeatNumber($seatNumber) {
        $this->properties['seatNumber'] = $seatNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSeatNumber() {
        return $this->properties['seatNumber'];
    }

    /**
     * The row location of the reserved seat (e.g., B).
     *
     * @param $seatRow TextSchema
     **/
    public function setSeatRow($seatRow) {
        $this->properties['seatRow'] = $seatRow;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSeatRow() {
        return $this->properties['seatRow'];
    }

    /**
     * The section location of the reserved seat (e.g. Orchestra).
     *
     * @param $seatSection TextSchema
     **/
    public function setSeatSection($seatSection) {
        $this->properties['seatSection'] = $seatSection;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSeatSection() {
        return $this->properties['seatSection'];
    }

    /**
     * The type/class of the seat.
     *
     * @param $seatingType TextSchema|QualitativeValueSchema
     **/
    public function setSeatingType($seatingType) {
        $this->properties['seatingType'] = $seatingType;

        return $this;
    }

    /**
     * @return TextSchema|QualitativeValueSchema
     **/
    public function getSeatingType() {
        return $this->properties['seatingType'];
    }


}
