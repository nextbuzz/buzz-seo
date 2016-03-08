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
 * An organization such as a school, NGO, corporation, club, etc.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class OrganizationSchema extends ThingSchema
{
    public static function factory()
    {
        return new OrganizationSchema('http://schema.org/', 'Organization');
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
     * Alumni of an organization.
     *
     * @param $alumni PersonSchema
     **/
    public function setAlumni($alumni) {
        $this->properties['alumni'] = $alumni;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getAlumni() {
        return $this->properties['alumni'];
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
     * Awards won by or for this item.
     *
     * @param $awards TextSchema
     **/
    public function setAwards($awards) {
        $this->properties['awards'] = $awards;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAwards() {
        return $this->properties['awards'];
    }

    /**
     * The brand(s) associated with a product or service, or the brand(s) maintained by an organization or business person.
     *
     * @param $brand BrandSchema|OrganizationSchema
     **/
    public function setBrand($brand) {
        $this->properties['brand'] = $brand;

        return $this;
    }

    /**
     * @return BrandSchema|OrganizationSchema
     **/
    public function getBrand() {
        return $this->properties['brand'];
    }

    /**
     * A contact point for a person or organization.
     *
     * @param $contactPoint ContactPointSchema
     **/
    public function setContactPoint($contactPoint) {
        $this->properties['contactPoint'] = $contactPoint;

        return $this;
    }

    /**
     * @return ContactPointSchema
     **/
    public function getContactPoint() {
        return $this->properties['contactPoint'];
    }

    /**
     * A contact point for a person or organization.
     *
     * @param $contactPoints ContactPointSchema
     **/
    public function setContactPoints($contactPoints) {
        $this->properties['contactPoints'] = $contactPoints;

        return $this;
    }

    /**
     * @return ContactPointSchema
     **/
    public function getContactPoints() {
        return $this->properties['contactPoints'];
    }

    /**
     * A relationship between an organization and a department of that organization, also described as an organization (allowing different urls, logos, opening hours). For example: a store with a pharmacy, or a bakery with a cafe.
     *
     * @param $department OrganizationSchema
     **/
    public function setDepartment($department) {
        $this->properties['department'] = $department;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getDepartment() {
        return $this->properties['department'];
    }

    /**
     * The date that this organization was dissolved.
     *
     * @param $dissolutionDate DateSchema
     **/
    public function setDissolutionDate($dissolutionDate) {
        $this->properties['dissolutionDate'] = $dissolutionDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getDissolutionDate() {
        return $this->properties['dissolutionDate'];
    }

    /**
     * The Dun & Bradstreet DUNS number for identifying an organization or business person.
     *
     * @param $duns TextSchema
     **/
    public function setDuns($duns) {
        $this->properties['duns'] = $duns;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDuns() {
        return $this->properties['duns'];
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
     * Someone working for this organization.
     *
     * @param $employee PersonSchema
     **/
    public function setEmployee($employee) {
        $this->properties['employee'] = $employee;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getEmployee() {
        return $this->properties['employee'];
    }

    /**
     * People working for this organization.
     *
     * @param $employees PersonSchema
     **/
    public function setEmployees($employees) {
        $this->properties['employees'] = $employees;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getEmployees() {
        return $this->properties['employees'];
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
     * A person who founded this organization.
     *
     * @param $founder PersonSchema
     **/
    public function setFounder($founder) {
        $this->properties['founder'] = $founder;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getFounder() {
        return $this->properties['founder'];
    }

    /**
     * A person who founded this organization.
     *
     * @param $founders PersonSchema
     **/
    public function setFounders($founders) {
        $this->properties['founders'] = $founders;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getFounders() {
        return $this->properties['founders'];
    }

    /**
     * The date that this organization was founded.
     *
     * @param $foundingDate DateSchema
     **/
    public function setFoundingDate($foundingDate) {
        $this->properties['foundingDate'] = $foundingDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getFoundingDate() {
        return $this->properties['foundingDate'];
    }

    /**
     * The place where the Organization was founded.
     *
     * @param $foundingLocation PlaceSchema
     **/
    public function setFoundingLocation($foundingLocation) {
        $this->properties['foundingLocation'] = $foundingLocation;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getFoundingLocation() {
        return $this->properties['foundingLocation'];
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
     * Points-of-Sales operated by the organization or person.
     *
     * @param $hasPOS PlaceSchema
     **/
    public function setHasPOS($hasPOS) {
        $this->properties['hasPOS'] = $hasPOS;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getHasPOS() {
        return $this->properties['hasPOS'];
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
     * The official name of the organization, e.g. the registered company name.
     *
     * @param $legalName TextSchema
     **/
    public function setLegalName($legalName) {
        $this->properties['legalName'] = $legalName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getLegalName() {
        return $this->properties['legalName'];
    }

    /**
     * The location of for example where the event is happening, an organization is located, or where an action takes place.
     *
     * @param $location PlaceSchema|PostalAddressSchema|TextSchema
     **/
    public function setLocation($location) {
        $this->properties['location'] = $location;

        return $this;
    }

    /**
     * @return PlaceSchema|PostalAddressSchema|TextSchema
     **/
    public function getLocation() {
        return $this->properties['location'];
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
     * A pointer to products or services offered by the organization or person.
     *
     * @param $makesOffer OfferSchema
     **/
    public function setMakesOffer($makesOffer) {
        $this->properties['makesOffer'] = $makesOffer;

        return $this;
    }

    /**
     * @return OfferSchema
     **/
    public function getMakesOffer() {
        return $this->properties['makesOffer'];
    }

    /**
     * A member of an Organization or a ProgramMembership. Organizations can be members of organizations; ProgramMembership is typically for individuals.
     *
     * @param $member OrganizationSchema|PersonSchema
     **/
    public function setMember($member) {
        $this->properties['member'] = $member;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getMember() {
        return $this->properties['member'];
    }

    /**
     * An Organization (or ProgramMembership) to which this Person or Organization belongs.
     *
     * @param $memberOf OrganizationSchema|ProgramMembershipSchema
     **/
    public function setMemberOf($memberOf) {
        $this->properties['memberOf'] = $memberOf;

        return $this;
    }

    /**
     * @return OrganizationSchema|ProgramMembershipSchema
     **/
    public function getMemberOf() {
        return $this->properties['memberOf'];
    }

    /**
     * A member of this organization.
     *
     * @param $members OrganizationSchema|PersonSchema
     **/
    public function setMembers($members) {
        $this->properties['members'] = $members;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getMembers() {
        return $this->properties['members'];
    }

    /**
     * The North American Industry Classification System (NAICS) code for a particular organization or business person.
     *
     * @param $naics TextSchema
     **/
    public function setNaics($naics) {
        $this->properties['naics'] = $naics;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getNaics() {
        return $this->properties['naics'];
    }

    /**
     * The number of employees in an organization e.g. business.
     *
     * @param $numberOfEmployees QuantitativeValueSchema
     **/
    public function setNumberOfEmployees($numberOfEmployees) {
        $this->properties['numberOfEmployees'] = $numberOfEmployees;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getNumberOfEmployees() {
        return $this->properties['numberOfEmployees'];
    }

    /**
     * Products owned by the organization or person.
     *
     * @param $owns OwnershipInfoSchema|ProductSchema
     **/
    public function setOwns($owns) {
        $this->properties['owns'] = $owns;

        return $this;
    }

    /**
     * @return OwnershipInfoSchema|ProductSchema
     **/
    public function getOwns() {
        return $this->properties['owns'];
    }

    /**
     * The larger organization that this organization is a branch of, if any.
     *
     * @param $parentOrganization OrganizationSchema
     **/
    public function setParentOrganization($parentOrganization) {
        $this->properties['parentOrganization'] = $parentOrganization;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getParentOrganization() {
        return $this->properties['parentOrganization'];
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
     * A pointer to products or services sought by the organization or person (demand).
     *
     * @param $seeks DemandSchema
     **/
    public function setSeeks($seeks) {
        $this->properties['seeks'] = $seeks;

        return $this;
    }

    /**
     * @return DemandSchema
     **/
    public function getSeeks() {
        return $this->properties['seeks'];
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
     * A relationship between two organizations where the first includes the second, e.g., as a subsidiary. See also: the more specific 'department' property.
     *
     * @param $subOrganization OrganizationSchema
     **/
    public function setSubOrganization($subOrganization) {
        $this->properties['subOrganization'] = $subOrganization;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getSubOrganization() {
        return $this->properties['subOrganization'];
    }

    /**
     * The Tax / Fiscal ID of the organization or person, e.g. the TIN in the US or the CIF/NIF in Spain.
     *
     * @param $taxID TextSchema
     **/
    public function setTaxID($taxID) {
        $this->properties['taxID'] = $taxID;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTaxID() {
        return $this->properties['taxID'];
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

    /**
     * The Value-added Tax ID of the organization or person.
     *
     * @param $vatID TextSchema
     **/
    public function setVatID($vatID) {
        $this->properties['vatID'] = $vatID;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getVatID() {
        return $this->properties['vatID'];
    }


}
