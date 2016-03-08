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
 * Entities that have a somewhat fixed, physical extension.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class PlaceSchema extends ThingSchema
{
    public static function factory()
    {
        return new PlaceSchema('http://schema.org/', 'Place');
    }

    /**
     * A property-value pair representing an additional characteristics of the entitity, e.g. a product feature or another characteristic for which there is no matching property in schema.org. <br /><br />

Note: Publishers should be aware that applications designed to use specific schema.org properties (e.g. http://schema.org/width, http://schema.org/color, http://schema.org/gtin13, ...) will typically expect such data to be provided using those properties, rather than using the generic property/value mechanism.

     *
     * @param $additionalProperty PropertyValueSchema
     **/
    public function setAdditionalProperty($additionalProperty) {
        $this->properties['additionalProperty'] = $additionalProperty;

        return $this;
    }

    /**
     * @return PropertyValueSchema
     **/
    public function getAdditionalProperty() {
        return $this->properties['additionalProperty'];
    }

    /**
     * Physical address of the item.
     *
     * @param $address PostalAddressSchema|TextSchema
     **/
    public function setAddress($address) {
        $this->properties['address'] = $address;

        return $this;
    }

    /**
     * @return PostalAddressSchema|TextSchema
     **/
    public function getAddress() {
        return $this->properties['address'];
    }

    /**
     * The overall rating, based on a collection of reviews or ratings, of the item.
     *
     * @param $aggregateRating AggregateRatingSchema
     **/
    public function setAggregateRating($aggregateRating) {
        $this->properties['aggregateRating'] = $aggregateRating;

        return $this;
    }

    /**
     * @return AggregateRatingSchema
     **/
    public function getAggregateRating() {
        return $this->properties['aggregateRating'];
    }

    /**
     * A short textual code (also called "store code") that uniquely identifies a place of business. The code is typically assigned by the parentOrganization and used in structured URLs.
<br /><br /> For example, in the URL http://www.starbucks.co.uk/store-locator/etc/detail/3047 the code "3047" is a branchCode for a particular branch.
      
     *
     * @param $branchCode TextSchema
     **/
    public function setBranchCode($branchCode) {
        $this->properties['branchCode'] = $branchCode;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getBranchCode() {
        return $this->properties['branchCode'];
    }

    /**
     * The basic containment relation between a place and one that contains it.
     *
     * @param $containedIn PlaceSchema
     **/
    public function setContainedIn($containedIn) {
        $this->properties['containedIn'] = $containedIn;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getContainedIn() {
        return $this->properties['containedIn'];
    }

    /**
     * The basic containment relation between a place and one that contains it.
     *
     * @param $containedInPlace PlaceSchema
     **/
    public function setContainedInPlace($containedInPlace) {
        $this->properties['containedInPlace'] = $containedInPlace;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getContainedInPlace() {
        return $this->properties['containedInPlace'];
    }

    /**
     * The basic containment relation between a place and another that it contains.
     *
     * @param $containsPlace PlaceSchema
     **/
    public function setContainsPlace($containsPlace) {
        $this->properties['containsPlace'] = $containsPlace;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getContainsPlace() {
        return $this->properties['containsPlace'];
    }

    /**
     * Upcoming or past event associated with this place, organization, or action.
     *
     * @param $event EventSchema
     **/
    public function setEvent($event) {
        $this->properties['event'] = $event;

        return $this;
    }

    /**
     * @return EventSchema
     **/
    public function getEvent() {
        return $this->properties['event'];
    }

    /**
     * Upcoming or past events associated with this place or organization.
     *
     * @param $events EventSchema
     **/
    public function setEvents($events) {
        $this->properties['events'] = $events;

        return $this;
    }

    /**
     * @return EventSchema
     **/
    public function getEvents() {
        return $this->properties['events'];
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
     * The geo coordinates of the place.
     *
     * @param $geo GeoCoordinatesSchema|GeoShapeSchema
     **/
    public function setGeo($geo) {
        $this->properties['geo'] = $geo;

        return $this;
    }

    /**
     * @return GeoCoordinatesSchema|GeoShapeSchema
     **/
    public function getGeo() {
        return $this->properties['geo'];
    }

    /**
     * The <a href="http://www.gs1.org/gln">Global Location Number</a> (GLN, sometimes also referred to as International Location Number or ILN) of the respective organization, person, or place. The GLN is a 13-digit number used to identify parties and physical locations.
     *
     * @param $globalLocationNumber TextSchema
     **/
    public function setGlobalLocationNumber($globalLocationNumber) {
        $this->properties['globalLocationNumber'] = $globalLocationNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getGlobalLocationNumber() {
        return $this->properties['globalLocationNumber'];
    }

    /**
     * A URL to a map of the place.
     *
     * @param $hasMap URLSchema|MapSchema
     **/
    public function setHasMap($hasMap) {
        $this->properties['hasMap'] = $hasMap;

        return $this;
    }

    /**
     * @return URLSchema|MapSchema
     **/
    public function getHasMap() {
        return $this->properties['hasMap'];
    }

    /**
     * The International Standard of Industrial Classification of All Economic Activities (ISIC), Revision 4 code for a particular organization, business person, or place.
     *
     * @param $isicV4 TextSchema
     **/
    public function setIsicV4($isicV4) {
        $this->properties['isicV4'] = $isicV4;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getIsicV4() {
        return $this->properties['isicV4'];
    }

    /**
     * An associated logo.
     *
     * @param $logo ImageObjectSchema|URLSchema
     **/
    public function setLogo($logo) {
        $this->properties['logo'] = $logo;

        return $this;
    }

    /**
     * @return ImageObjectSchema|URLSchema
     **/
    public function getLogo() {
        return $this->properties['logo'];
    }

    /**
     * A URL to a map of the place.
     *
     * @param $map URLSchema
     **/
    public function setMap($map) {
        $this->properties['map'] = $map;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getMap() {
        return $this->properties['map'];
    }

    /**
     * A URL to a map of the place.
     *
     * @param $maps URLSchema
     **/
    public function setMaps($maps) {
        $this->properties['maps'] = $maps;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getMaps() {
        return $this->properties['maps'];
    }

    /**
     * The opening hours of a certain place.
     *
     * @param $openingHoursSpecification OpeningHoursSpecificationSchema
     **/
    public function setOpeningHoursSpecification($openingHoursSpecification) {
        $this->properties['openingHoursSpecification'] = $openingHoursSpecification;

        return $this;
    }

    /**
     * @return OpeningHoursSpecificationSchema
     **/
    public function getOpeningHoursSpecification() {
        return $this->properties['openingHoursSpecification'];
    }

    /**
     * A photograph of this place.
     *
     * @param $photo ImageObjectSchema|PhotographSchema
     **/
    public function setPhoto($photo) {
        $this->properties['photo'] = $photo;

        return $this;
    }

    /**
     * @return ImageObjectSchema|PhotographSchema
     **/
    public function getPhoto() {
        return $this->properties['photo'];
    }

    /**
     * Photographs of this place.
     *
     * @param $photos ImageObjectSchema|PhotographSchema
     **/
    public function setPhotos($photos) {
        $this->properties['photos'] = $photos;

        return $this;
    }

    /**
     * @return ImageObjectSchema|PhotographSchema
     **/
    public function getPhotos() {
        return $this->properties['photos'];
    }

    /**
     * A review of the item.
     *
     * @param $review ReviewSchema
     **/
    public function setReview($review) {
        $this->properties['review'] = $review;

        return $this;
    }

    /**
     * @return ReviewSchema
     **/
    public function getReview() {
        return $this->properties['review'];
    }

    /**
     * Review of the item.
     *
     * @param $reviews ReviewSchema
     **/
    public function setReviews($reviews) {
        $this->properties['reviews'] = $reviews;

        return $this;
    }

    /**
     * @return ReviewSchema
     **/
    public function getReviews() {
        return $this->properties['reviews'];
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
