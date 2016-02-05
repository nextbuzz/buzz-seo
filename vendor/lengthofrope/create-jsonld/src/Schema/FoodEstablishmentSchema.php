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
 * A food-related business.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class FoodEstablishmentSchema extends LocalBusinessSchema
{
    public static function factory()
    {
        return new FoodEstablishmentSchema('http://schema.org/', 'FoodEstablishment');
    }

    /**
     * Indicates whether a FoodEstablishment accepts reservations. Values can be Boolean, a URL at which reservations can be made or (for backwards compatibility) the strings <code>Yes</code> or <code>No</code>.
     *
     * @param $acceptsReservations TextSchema|URLSchema|BooleanSchema
     **/
    public function setAcceptsReservations($acceptsReservations) {
        $this->properties['acceptsReservations'] = $acceptsReservations;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema|BooleanSchema
     **/
    public function getAcceptsReservations() {
        return $this->properties['acceptsReservations'];
    }

    /**
     * Either the actual menu or a URL of the menu.
     *
     * @param $menu TextSchema|URLSchema
     **/
    public function setMenu($menu) {
        $this->properties['menu'] = $menu;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getMenu() {
        return $this->properties['menu'];
    }

    /**
     * The cuisine of the restaurant.
     *
     * @param $servesCuisine TextSchema
     **/
    public function setServesCuisine($servesCuisine) {
        $this->properties['servesCuisine'] = $servesCuisine;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getServesCuisine() {
        return $this->properties['servesCuisine'];
    }


}
