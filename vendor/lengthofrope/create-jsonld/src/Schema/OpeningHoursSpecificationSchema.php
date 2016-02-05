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
 * A structured value providing information about the opening hours of a place or a certain service inside a place.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class OpeningHoursSpecificationSchema extends StructuredValueSchema
{
    public static function factory()
    {
        return new OpeningHoursSpecificationSchema('http://schema.org/', 'OpeningHoursSpecification');
    }

    /**
     * The closing hour of the place or service on the given day(s) of the week.
     *
     * @param $closes TimeSchema
     **/
    public function setCloses($closes) {
        $this->properties['closes'] = $closes;

        return $this;
    }

    /**
     * @return TimeSchema
     **/
    public function getCloses() {
        return $this->properties['closes'];
    }

    /**
     * The day of the week for which these opening hours are valid.
     *
     * @param $dayOfWeek DayOfWeekSchema
     **/
    public function setDayOfWeek($dayOfWeek) {
        $this->properties['dayOfWeek'] = $dayOfWeek;

        return $this;
    }

    /**
     * @return DayOfWeekSchema
     **/
    public function getDayOfWeek() {
        return $this->properties['dayOfWeek'];
    }

    /**
     * The opening hour of the place or service on the given day(s) of the week.
     *
     * @param $opens TimeSchema
     **/
    public function setOpens($opens) {
        $this->properties['opens'] = $opens;

        return $this;
    }

    /**
     * @return TimeSchema
     **/
    public function getOpens() {
        return $this->properties['opens'];
    }

    /**
     * The date when the item becomes valid.
     *
     * @param $validFrom DateTimeSchema
     **/
    public function setValidFrom($validFrom) {
        $this->properties['validFrom'] = $validFrom;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getValidFrom() {
        return $this->properties['validFrom'];
    }

    /**
     * The end of the validity of offer, price specification, or opening hours data.
     *
     * @param $validThrough DateTimeSchema
     **/
    public function setValidThrough($validThrough) {
        $this->properties['validThrough'] = $validThrough;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getValidThrough() {
        return $this->properties['validThrough'];
    }


}
