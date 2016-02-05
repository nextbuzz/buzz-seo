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
 * The act of physically/electronically taking delivery of an object thathas been transferred from an origin to a destination. Reciprocal of SendAction.<p>Related actions:</p><ul><li><a href="http://schema.org/SendAction">SendAction</a>: The reciprocal of ReceiveAction.</li><li><a href="http://schema.org/TakeAction">TakeAction</a>: Unlike TakeAction, ReceiveAction does not imply that the ownership has been transfered (e.g. I can receive a package, but it does not mean the package is now mine)</li></ul>.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ReceiveActionSchema extends TransferActionSchema
{
    public static function factory()
    {
        return new ReceiveActionSchema('http://schema.org/', 'ReceiveAction');
    }

    /**
     * A sub property of instrument. The method of delivery.
     *
     * @param $deliveryMethod DeliveryMethodSchema
     **/
    public function setDeliveryMethod($deliveryMethod) {
        $this->properties['deliveryMethod'] = $deliveryMethod;

        return $this;
    }

    /**
     * @return DeliveryMethodSchema
     **/
    public function getDeliveryMethod() {
        return $this->properties['deliveryMethod'];
    }

    /**
     * A sub property of participant. The participant who is at the sending end of the action.
     *
     * @param $sender AudienceSchema|OrganizationSchema|PersonSchema
     **/
    public function setSender($sender) {
        $this->properties['sender'] = $sender;

        return $this;
    }

    /**
     * @return AudienceSchema|OrganizationSchema|PersonSchema
     **/
    public function getSender() {
        return $this->properties['sender'];
    }


}
