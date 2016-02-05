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
 * A list of items of any sort&#x2014;for example, Top 10 Movies About Weathermen, or Top 100 Party Songs. Not to be confused with HTML lists, which are often used only for formatting.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ItemListSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new ItemListSchema('http://schema.org/', 'ItemList');
    }

    /**
     * For itemListElement values, you can use simple strings (e.g. "Peter", "Paul", "Mary"), existing entities, or use ListItem.
    <br/><br/>
    Text values are best if the elements in the list are plain strings. Existing entities are best for a simple, unordered list of existing things in your data. ListItem is used with ordered lists when you want to provide additional context about the element in that list or when the same item might be in different places in different lists.
    <br/><br/>
    Note: The order of elements in your mark-up is not sufficient for indicating the order or elements.  Use ListItem with a 'position' property in such cases.
     *
     * @param $itemListElement TextSchema|ListItemSchema|ThingSchema
     **/
    public function setItemListElement($itemListElement) {
        $this->properties['itemListElement'] = $itemListElement;

        return $this;
    }

    /**
     * @return TextSchema|ListItemSchema|ThingSchema
     **/
    public function getItemListElement() {
        return $this->properties['itemListElement'];
    }

    /**
     * Type of ordering (e.g. Ascending, Descending, Unordered).
     *
     * @param $itemListOrder ItemListOrderTypeSchema|TextSchema
     **/
    public function setItemListOrder($itemListOrder) {
        $this->properties['itemListOrder'] = $itemListOrder;

        return $this;
    }

    /**
     * @return ItemListOrderTypeSchema|TextSchema
     **/
    public function getItemListOrder() {
        return $this->properties['itemListOrder'];
    }

    /**
     * The number of items in an ItemList. Note that some descriptions might not fully describe all items in a list (e.g., multi-page pagination); in such cases, the numberOfItems would be for the entire list.
     *
     * @param $numberOfItems IntegerSchema
     **/
    public function setNumberOfItems($numberOfItems) {
        $this->properties['numberOfItems'] = $numberOfItems;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getNumberOfItems() {
        return $this->properties['numberOfItems'];
    }


}
