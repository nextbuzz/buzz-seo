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
 * 
          A CreativeWorkSeries in schema.org is a group of related items, typically but not necessarily of the same kind.
          CreativeWorkSeries are usually organized into some order, often chronological. Unlike <a href="/ItemList">ItemList</a> which
          is a general purpose data structure for lists of things, the emphasis with
          CreativeWorkSeries is on published materials (written e.g. books and periodicals,
          or media such as tv, radio and games).

          <br/><br/>

          Specific subtypes are available for describing <a href="/TVSeries">TVSeries</a>, <a href="/RadioSeries">RadioSeries</a>,
          <a href="/MovieSeries">MovieSeries</a>,
          <a href="/BookSeries">BookSeries</a>,
          <a href="/Periodical">Periodical</a>
          and <a href="/VideoGameSeries">VideoGameSeries</a>. In each case,
          the <a href="/hasPart">hasPart</a> / <a href="/isPartOf">isPartOf</a> properties
          can be used to relate the CreativeWorkSeries to its parts. The general CreativeWorkSeries type serves largely
          just to organize these more specific and practical subtypes.

          <br/><br/>

          It is common for properties applicable to an item from the series to be usefully applied to the containing group.
          Schema.org attempts to anticipate some of these cases, but publishers should be free to apply
          properties of the series parts to the series as a whole wherever they seem appropriate.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class CreativeWorkSeriesSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new CreativeWorkSeriesSchema('http://schema.org/', 'CreativeWorkSeries');
    }

    /**
     * The end date and time of the item (in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 date format</a>).
     *
     * @param $endDate DateSchema
     **/
    public function setEndDate($endDate) {
        $this->properties['endDate'] = $endDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getEndDate() {
        return $this->properties['endDate'];
    }

    /**
     * The start date and time of the item (in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 date format</a>).
     *
     * @param $startDate DateSchema
     **/
    public function setStartDate($startDate) {
        $this->properties['startDate'] = $startDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getStartDate() {
        return $this->properties['startDate'];
    }


}
