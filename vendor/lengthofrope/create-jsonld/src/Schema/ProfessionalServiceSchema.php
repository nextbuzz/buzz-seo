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
 * Original definition: "provider of professional services."
        <br><br>
        The general <a href="/ProfessionalService">ProfessionalService</a> type
        for local businesses was deprecated due to confusion with <a href="/Service">Service</a>.
        For reference, the types that it included were: <a href="/Dentist">Dentist</a>,
        <a href="/AccountingService">AccountingService</a>,
        <a href="/Attorney">Attorney</a>,
        <a href="/Notary">Notary</a>, as well as types for several kinds of
        <a href="/HomeAndConstructionBusiness">HomeAndConstructionBusiness</a>:
        <a href="/Electrician">Electrician</a>,
        <a href="/GeneralContractor">GeneralContractor</a>,
        <a href="/HousePainter">HousePainter</a>,
        <a href="/Locksmith">Locksmith</a>,
        <a href="/Plumber">Plumber</a>,
        <a href="/Plumber">RoofingContractor</a>.
        <a href="/LegalService">LegalService</a> was introduced as a more
        inclusive supertype of <a href="/Attorney">Attorney</a>.

      
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ProfessionalServiceSchema extends LocalBusinessSchema
{
    public static function factory()
    {
        return new ProfessionalServiceSchema('http://schema.org/', 'ProfessionalService');
    }


}
