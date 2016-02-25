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
 */

namespace LengthOfRope\JSONLD;

/**
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 */
class Create extends Elements\ElementGroup
{

    /**
     * Create an instance of the class and return it, so everyone
     * can use chaining.
     *
     * @return Create
     */
    public static function factory()
    {
        return new Create();
    }

    /**
     * Retrieve the elements (and all childrens) as an array
     *
     * @return array
     */
    public function getDataArray()
    {
        $return = array();

        foreach ($this->elements as $element)
        {
            $return[] = $element->getDataArray();
        }

        return $return;
    }

    public function getJSONLD()
    {
        $data = $this->getDataArray();
        if (count($data) === 1) {
            $return = json_encode($data[0]);
        } else {
            $return = json_encode($data);
        }

        return $return;
    }

    public function getJSONLDScript()
    {
        return '<script type="application/ld+json">' . $this->getJSONLD() . '</script>';
    }

    /**
     * Add a JSONLD Element
     * 
     * @param Interfaces\IElement $element
     * @return Create
     */
    public function add(Interfaces\IElement $element)
    {
        return parent::add($element);
    }
}
