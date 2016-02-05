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
 * An list item, e.g. a step in a checklist or how-to description.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ListItemSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new ListItemSchema('http://schema.org/', 'ListItem');
    }

    /**
     * An entity represented by an entry in a list or data feed (e.g. an 'artist' in a list of 'artists')’.
     *
     * @param $item ThingSchema
     **/
    public function setItem($item) {
        $this->properties['item'] = $item;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getItem() {
        return $this->properties['item'];
    }

    /**
     * A link to the ListItem that follows the current one.
     *
     * @param $nextItem ListItemSchema
     **/
    public function setNextItem($nextItem) {
        $this->properties['nextItem'] = $nextItem;

        return $this;
    }

    /**
     * @return ListItemSchema
     **/
    public function getNextItem() {
        return $this->properties['nextItem'];
    }

    /**
     * The position of an item in a series or sequence of items.
     *
     * @param $position TextSchema|IntegerSchema
     **/
    public function setPosition($position) {
        $this->properties['position'] = $position;

        return $this;
    }

    /**
     * @return TextSchema|IntegerSchema
     **/
    public function getPosition() {
        return $this->properties['position'];
    }

    /**
     * A link to the ListItem that preceeds the current one.
     *
     * @param $previousItem ListItemSchema
     **/
    public function setPreviousItem($previousItem) {
        $this->properties['previousItem'] = $previousItem;

        return $this;
    }

    /**
     * @return ListItemSchema
     **/
    public function getPreviousItem() {
        return $this->properties['previousItem'];
    }


}
