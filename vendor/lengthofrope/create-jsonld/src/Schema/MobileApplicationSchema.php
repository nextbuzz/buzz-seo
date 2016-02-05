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
 * A software application designed specifically to work well on a mobile device such as a telephone.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MobileApplicationSchema extends SoftwareApplicationSchema
{
    public static function factory()
    {
        return new MobileApplicationSchema('http://schema.org/', 'MobileApplication');
    }

    /**
     * Specifies specific carrier(s) requirements for the application (e.g. an application may only work on a specific carrier network).
     *
     * @param $carrierRequirements TextSchema
     **/
    public function setCarrierRequirements($carrierRequirements) {
        $this->properties['carrierRequirements'] = $carrierRequirements;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCarrierRequirements() {
        return $this->properties['carrierRequirements'];
    }


}
