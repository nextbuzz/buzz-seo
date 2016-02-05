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
 * The act of taking money from a buyer in exchange for goods or services rendered. An agent sells an object, product, or service to a buyer for a price. Reciprocal of BuyAction.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class SellActionSchema extends TradeActionSchema
{
    public static function factory()
    {
        return new SellActionSchema('http://schema.org/', 'SellAction');
    }

    /**
     * A sub property of participant. The participant/person/organization that bought the object.
     *
     * @param $buyer PersonSchema
     **/
    public function setBuyer($buyer) {
        $this->properties['buyer'] = $buyer;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getBuyer() {
        return $this->properties['buyer'];
    }

    /**
     * The warranty promise(s) included in the offer.
     *
     * @param $warrantyPromise WarrantyPromiseSchema
     **/
    public function setWarrantyPromise($warrantyPromise) {
        $this->properties['warrantyPromise'] = $warrantyPromise;

        return $this;
    }

    /**
     * @return WarrantyPromiseSchema
     **/
    public function getWarrantyPromise() {
        return $this->properties['warrantyPromise'];
    }


}
