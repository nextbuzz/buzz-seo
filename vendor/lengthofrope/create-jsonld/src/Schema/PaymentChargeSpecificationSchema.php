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
 * The costs of settling the payment using a particular payment method.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class PaymentChargeSpecificationSchema extends PriceSpecificationSchema
{
    public static function factory()
    {
        return new PaymentChargeSpecificationSchema('http://schema.org/', 'PaymentChargeSpecification');
    }

    /**
     * The delivery method(s) to which the delivery charge or payment charge specification applies.
     *
     * @param $appliesToDeliveryMethod DeliveryMethodSchema
     **/
    public function setAppliesToDeliveryMethod($appliesToDeliveryMethod) {
        $this->properties['appliesToDeliveryMethod'] = $appliesToDeliveryMethod;

        return $this;
    }

    /**
     * @return DeliveryMethodSchema
     **/
    public function getAppliesToDeliveryMethod() {
        return $this->properties['appliesToDeliveryMethod'];
    }

    /**
     * The payment method(s) to which the payment charge specification applies.
     *
     * @param $appliesToPaymentMethod PaymentMethodSchema
     **/
    public function setAppliesToPaymentMethod($appliesToPaymentMethod) {
        $this->properties['appliesToPaymentMethod'] = $appliesToPaymentMethod;

        return $this;
    }

    /**
     * @return PaymentMethodSchema
     **/
    public function getAppliesToPaymentMethod() {
        return $this->properties['appliesToPaymentMethod'];
    }


}
