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
 * The act of physically/electronically dispatching an object for transfer from an origin to a destination.<p>Related actions:</p><ul><li><a href="http://schema.org/ReceiveAction">ReceiveAction</a>: The reciprocal of SendAction.</li><li><a href="http://schema.org/GiveAction">GiveAction</a>: Unlike GiveAction, SendAction does not imply the transfer of ownership (e.g. I can send you my laptop, but I'm not necessarily giving it to you)</li></ul>.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class SendActionSchema extends TransferActionSchema
{
    public static function factory()
    {
        return new SendActionSchema('http://schema.org/', 'SendAction');
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
     * A sub property of participant. The participant who is at the receiving end of the action.
     *
     * @param $recipient AudienceSchema|OrganizationSchema|PersonSchema
     **/
    public function setRecipient($recipient) {
        $this->properties['recipient'] = $recipient;

        return $this;
    }

    /**
     * @return AudienceSchema|OrganizationSchema|PersonSchema
     **/
    public function getRecipient() {
        return $this->properties['recipient'];
    }


}
