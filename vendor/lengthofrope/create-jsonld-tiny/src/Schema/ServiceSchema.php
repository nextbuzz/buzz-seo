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
 * A service provided by an organization, e.g. delivery service, print services, etc.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ServiceSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new ServiceSchema('http://schema.org/', 'Service');
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
     * A means of accessing the service (e.g. a phone bank, a web site, a location, etc.).
     *
     * @param $availableChannel ServiceChannelSchema
     **/
    public function setAvailableChannel($availableChannel) {
        $this->properties['availableChannel'] = $availableChannel;

        return $this;
    }

    /**
     * @return ServiceChannelSchema
     **/
    public function getAvailableChannel() {
        return $this->properties['availableChannel'];
    }

    /**
     * An award won by or for this item.
     *
     * @param $award TextSchema
     **/
    public function setAward($award) {
        $this->properties['award'] = $award;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAward() {
        return $this->properties['award'];
    }

    /**
     * A category for the item. Greater signs or slashes can be used to informally indicate a category hierarchy.
     *
     * @param $category PhysicalActivityCategorySchema|TextSchema|ThingSchema
     **/
    public function setCategory($category) {
        $this->properties['category'] = $category;

        return $this;
    }

    /**
     * @return PhysicalActivityCategorySchema|TextSchema|ThingSchema
     **/
    public function getCategory() {
        return $this->properties['category'];
    }

    /**
     * Indicates an OfferCatalog listing for this Organization, Person, or Service.
     *
     * @param $hasOfferCatalog OfferCatalogSchema
     **/
    public function setHasOfferCatalog($hasOfferCatalog) {
        $this->properties['hasOfferCatalog'] = $hasOfferCatalog;

        return $this;
    }

    /**
     * @return OfferCatalogSchema
     **/
    public function getHasOfferCatalog() {
        return $this->properties['hasOfferCatalog'];
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
     * An offer to provide this item&#x2014;for example, an offer to sell a product, rent the DVD of a movie, perform a service, or give away tickets to an event.
     *
     * @param $offers OfferSchema
     **/
    public function setOffers($offers) {
        $this->properties['offers'] = $offers;

        return $this;
    }

    /**
     * @return OfferSchema
     **/
    public function getOffers() {
        return $this->properties['offers'];
    }

    /**
     * The tangible thing generated by the service, e.g. a passport, permit, etc.
     *
     * @param $produces ThingSchema
     **/
    public function setProduces($produces) {
        $this->properties['produces'] = $produces;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getProduces() {
        return $this->properties['produces'];
    }

    /**
     * The service provider, service operator, or service performer; the goods producer. Another party (a seller) may offer those services or goods on behalf of the provider. A provider may also serve as the seller.
     *
     * @param $provider PersonSchema|OrganizationSchema
     **/
    public function setProvider($provider) {
        $this->properties['provider'] = $provider;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getProvider() {
        return $this->properties['provider'];
    }

    /**
     * Indicates the mobility of a provided service (e.g. 'static', 'dynamic').
     *
     * @param $providerMobility TextSchema
     **/
    public function setProviderMobility($providerMobility) {
        $this->properties['providerMobility'] = $providerMobility;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getProviderMobility() {
        return $this->properties['providerMobility'];
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
     * The audience eligible for this service.
     *
     * @param $serviceAudience AudienceSchema
     **/
    public function setServiceAudience($serviceAudience) {
        $this->properties['serviceAudience'] = $serviceAudience;

        return $this;
    }

    /**
     * @return AudienceSchema
     **/
    public function getServiceAudience() {
        return $this->properties['serviceAudience'];
    }

    /**
     * The tangible thing generated by the service, e.g. a passport, permit, etc.
     *
     * @param $serviceOutput ThingSchema
     **/
    public function setServiceOutput($serviceOutput) {
        $this->properties['serviceOutput'] = $serviceOutput;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getServiceOutput() {
        return $this->properties['serviceOutput'];
    }

    /**
     * The type of service being offered, e.g. veterans' benefits, emergency relief, etc.
     *
     * @param $serviceType TextSchema
     **/
    public function setServiceType($serviceType) {
        $this->properties['serviceType'] = $serviceType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getServiceType() {
        return $this->properties['serviceType'];
    }


}
