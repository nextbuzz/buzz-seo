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
 * A contact point&#x2014;for example, a Customer Complaints department.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ContactPointSchema extends StructuredValueSchema
{
    public static function factory()
    {
        return new ContactPointSchema('http://schema.org/', 'ContactPoint');
    }

    /**
     * The geographic area where a service or offered item is provided.
     *
     * @param $areaServed PlaceSchema|AdministrativeAreaSchema|GeoShapeSchema|TextSchema
     **/
    public function setAreaServed($areaServed) {
        $this->properties['areaServed'] = $areaServed;

        return $this;
    }

    /**
     * @return PlaceSchema|AdministrativeAreaSchema|GeoShapeSchema|TextSchema
     **/
    public function getAreaServed() {
        return $this->properties['areaServed'];
    }

    /**
     * A language someone may use with the item.
     *
     * @param $availableLanguage LanguageSchema
     **/
    public function setAvailableLanguage($availableLanguage) {
        $this->properties['availableLanguage'] = $availableLanguage;

        return $this;
    }

    /**
     * @return LanguageSchema
     **/
    public function getAvailableLanguage() {
        return $this->properties['availableLanguage'];
    }

    /**
     * An option available on this contact point (e.g. a toll-free number or support for hearing-impaired callers).
     *
     * @param $contactOption ContactPointOptionSchema
     **/
    public function setContactOption($contactOption) {
        $this->properties['contactOption'] = $contactOption;

        return $this;
    }

    /**
     * @return ContactPointOptionSchema
     **/
    public function getContactOption() {
        return $this->properties['contactOption'];
    }

    /**
     * A person or organization can have different contact points, for different purposes. For example, a sales contact point, a PR contact point and so on. This property is used to specify the kind of contact point.
     *
     * @param $contactType TextSchema
     **/
    public function setContactType($contactType) {
        $this->properties['contactType'] = $contactType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getContactType() {
        return $this->properties['contactType'];
    }

    /**
     * Email address.
     *
     * @param $email TextSchema
     **/
    public function setEmail($email) {
        $this->properties['email'] = $email;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getEmail() {
        return $this->properties['email'];
    }

    /**
     * The fax number.
     *
     * @param $faxNumber TextSchema
     **/
    public function setFaxNumber($faxNumber) {
        $this->properties['faxNumber'] = $faxNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getFaxNumber() {
        return $this->properties['faxNumber'];
    }

    /**
     * The hours during which this service or contact is available.
     *
     * @param $hoursAvailable OpeningHoursSpecificationSchema
     **/
    public function setHoursAvailable($hoursAvailable) {
        $this->properties['hoursAvailable'] = $hoursAvailable;

        return $this;
    }

    /**
     * @return OpeningHoursSpecificationSchema
     **/
    public function getHoursAvailable() {
        return $this->properties['hoursAvailable'];
    }

    /**
     * The product or service this support contact point is related to (such as product support for a particular product line). This can be a specific product or product line (e.g. "iPhone") or a general category of products or services (e.g. "smartphones").
     *
     * @param $productSupported ProductSchema|TextSchema
     **/
    public function setProductSupported($productSupported) {
        $this->properties['productSupported'] = $productSupported;

        return $this;
    }

    /**
     * @return ProductSchema|TextSchema
     **/
    public function getProductSupported() {
        return $this->properties['productSupported'];
    }

    /**
     * The geographic area where the service is provided.
     *
     * @param $serviceArea PlaceSchema|AdministrativeAreaSchema|GeoShapeSchema
     **/
    public function setServiceArea($serviceArea) {
        $this->properties['serviceArea'] = $serviceArea;

        return $this;
    }

    /**
     * @return PlaceSchema|AdministrativeAreaSchema|GeoShapeSchema
     **/
    public function getServiceArea() {
        return $this->properties['serviceArea'];
    }

    /**
     * The telephone number.
     *
     * @param $telephone TextSchema
     **/
    public function setTelephone($telephone) {
        $this->properties['telephone'] = $telephone;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTelephone() {
        return $this->properties['telephone'];
    }


}
