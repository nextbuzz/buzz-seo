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
 * The act of giving money in return for temporary use, but not ownership, of an object such as a vehicle or property. For example, an agent rents a property from a landlord in exchange for a periodic payment.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class RentActionSchema extends TradeActionSchema
{
    public static function factory()
    {
        return new RentActionSchema('http://schema.org/', 'RentAction');
    }

    /**
     * A sub property of participant. The owner of the real estate property.
     *
     * @param $landlord OrganizationSchema|PersonSchema
     **/
    public function setLandlord($landlord) {
        $this->properties['landlord'] = $landlord;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getLandlord() {
        return $this->properties['landlord'];
    }

    /**
     * A sub property of participant. The real estate agent involved in the action.
     *
     * @param $realEstateAgent RealEstateAgentSchema
     **/
    public function setRealEstateAgent($realEstateAgent) {
        $this->properties['realEstateAgent'] = $realEstateAgent;

        return $this;
    }

    /**
     * @return RealEstateAgentSchema
     **/
    public function getRealEstateAgent() {
        return $this->properties['realEstateAgent'];
    }


}
