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
 * The act of transferring/moving (abstract or concrete) animate or inanimate objects from one place to another.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class TransferActionSchema extends ActionSchema
{
    public static function factory()
    {
        return new TransferActionSchema('http://schema.org/', 'TransferAction');
    }

    /**
     * A sub property of location. The original location of the object or the agent before the action.
     *
     * @param $fromLocation PlaceSchema
     **/
    public function setFromLocation($fromLocation) {
        $this->properties['fromLocation'] = $fromLocation;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getFromLocation() {
        return $this->properties['fromLocation'];
    }

    /**
     * A sub property of location. The final location of the object or the agent after the action.
     *
     * @param $toLocation PlaceSchema
     **/
    public function setToLocation($toLocation) {
        $this->properties['toLocation'] = $toLocation;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getToLocation() {
        return $this->properties['toLocation'];
    }


}
