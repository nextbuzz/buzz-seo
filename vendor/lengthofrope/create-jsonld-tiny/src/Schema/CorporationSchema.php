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
 * Organization: A business corporation.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class CorporationSchema extends OrganizationSchema
{
    public static function factory()
    {
        return new CorporationSchema('http://schema.org/', 'Corporation');
    }

    /**
     * The exchange traded instrument associated with a Corporation object. The tickerSymbol is expressed as an exchange and an instrument name separated by a space character. For the exchange component of the tickerSymbol attribute, we reccommend using the controlled vocaulary of Market Identifier Codes (MIC) specified in ISO15022.
     *
     * @param $tickerSymbol TextSchema
     **/
    public function setTickerSymbol($tickerSymbol) {
        $this->properties['tickerSymbol'] = $tickerSymbol;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTickerSymbol() {
        return $this->properties['tickerSymbol'];
    }


}
