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
 * The act of organizing tasks/objects/events by associating resources to it.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class AllocateActionSchema extends OrganizeActionSchema
{
    public static function factory()
    {
        return new AllocateActionSchema('http://schema.org/', 'AllocateAction');
    }

    /**
     * A goal towards an action is taken. Can be concrete or abstract.
     *
     * @param $purpose MedicalDevicePurposeSchema|ThingSchema
     **/
    public function setPurpose($purpose) {
        $this->properties['purpose'] = $purpose;

        return $this;
    }

    /**
     * @return MedicalDevicePurposeSchema|ThingSchema
     **/
    public function getPurpose() {
        return $this->properties['purpose'];
    }


}
