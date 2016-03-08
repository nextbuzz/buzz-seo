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
 * A person (alive, dead, undead, or fictional).
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class PersonSchema extends ThingSchema
{
    public static function factory()
    {
        return new PersonSchema('http://schema.org/', 'Person');
    }

    /**
     * An additional name for a Person, can be used for a middle name.
     *
     * @param $additionalName TextSchema
     **/
    public function setAdditionalName($additionalName) {
        $this->properties['additionalName'] = $additionalName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAdditionalName() {
        return $this->properties['additionalName'];
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
     * An organization that this person is affiliated with. For example, a school/university, a club, or a team.
     *
     * @param $affiliation OrganizationSchema
     **/
    public function setAffiliation($affiliation) {
        $this->properties['affiliation'] = $affiliation;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getAffiliation() {
        return $this->properties['affiliation'];
    }

    /**
     * An organization that the person is an alumni of.
     *
     * @param $alumniOf EducationalOrganizationSchema|OrganizationSchema
     **/
    public function setAlumniOf($alumniOf) {
        $this->properties['alumniOf'] = $alumniOf;

        return $this;
    }

    /**
     * @return EducationalOrganizationSchema|OrganizationSchema
     **/
    public function getAlumniOf() {
        return $this->properties['alumniOf'];
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
     * Date of birth.
     *
     * @param $birthDate DateSchema
     **/
    public function setBirthDate($birthDate) {
        $this->properties['birthDate'] = $birthDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getBirthDate() {
        return $this->properties['birthDate'];
    }

    /**
     * The place where the person was born.
     *
     * @param $birthPlace PlaceSchema
     **/
    public function setBirthPlace($birthPlace) {
        $this->properties['birthPlace'] = $birthPlace;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getBirthPlace() {
        return $this->properties['birthPlace'];
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
     * A child of the person.
     *
     * @param $children PersonSchema
     **/
    public function setChildren($children) {
        $this->properties['children'] = $children;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getChildren() {
        return $this->properties['children'];
    }

    /**
     * A colleague of the person.
     *
     * @param $colleague PersonSchema
     **/
    public function setColleague($colleague) {
        $this->properties['colleague'] = $colleague;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getColleague() {
        return $this->properties['colleague'];
    }

    /**
     * A colleague of the person.
     *
     * @param $colleagues PersonSchema
     **/
    public function setColleagues($colleagues) {
        $this->properties['colleagues'] = $colleagues;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getColleagues() {
        return $this->properties['colleagues'];
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
     * Date of death.
     *
     * @param $deathDate DateSchema
     **/
    public function setDeathDate($deathDate) {
        $this->properties['deathDate'] = $deathDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getDeathDate() {
        return $this->properties['deathDate'];
    }

    /**
     * The place where the person died.
     *
     * @param $deathPlace PlaceSchema
     **/
    public function setDeathPlace($deathPlace) {
        $this->properties['deathPlace'] = $deathPlace;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getDeathPlace() {
        return $this->properties['deathPlace'];
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
     * Family name. In the U.S., the last name of an Person. This can be used along with givenName instead of the name property.
     *
     * @param $familyName TextSchema
     **/
    public function setFamilyName($familyName) {
        $this->properties['familyName'] = $familyName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getFamilyName() {
        return $this->properties['familyName'];
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
     * The most generic uni-directional social relation.
     *
     * @param $follows PersonSchema
     **/
    public function setFollows($follows) {
        $this->properties['follows'] = $follows;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getFollows() {
        return $this->properties['follows'];
    }

    /**
     * Gender of the person.
     *
     * @param $gender TextSchema
     **/
    public function setGender($gender) {
        $this->properties['gender'] = $gender;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getGender() {
        return $this->properties['gender'];
    }

    /**
     * Given name. In the U.S., the first name of a Person. This can be used along with familyName instead of the name property.
     *
     * @param $givenName TextSchema
     **/
    public function setGivenName($givenName) {
        $this->properties['givenName'] = $givenName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getGivenName() {
        return $this->properties['givenName'];
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
     * The height of the item.
     *
     * @param $height DistanceSchema|QuantitativeValueSchema
     **/
    public function setHeight($height) {
        $this->properties['height'] = $height;

        return $this;
    }

    /**
     * @return DistanceSchema|QuantitativeValueSchema
     **/
    public function getHeight() {
        return $this->properties['height'];
    }

    /**
     * A contact location for a person's residence.
     *
     * @param $homeLocation ContactPointSchema|PlaceSchema
     **/
    public function setHomeLocation($homeLocation) {
        $this->properties['homeLocation'] = $homeLocation;

        return $this;
    }

    /**
     * @return ContactPointSchema|PlaceSchema
     **/
    public function getHomeLocation() {
        return $this->properties['homeLocation'];
    }

    /**
     * An honorific prefix preceding a Person's name such as Dr/Mrs/Mr.
     *
     * @param $honorificPrefix TextSchema
     **/
    public function setHonorificPrefix($honorificPrefix) {
        $this->properties['honorificPrefix'] = $honorificPrefix;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getHonorificPrefix() {
        return $this->properties['honorificPrefix'];
    }

    /**
     * An honorific suffix preceding a Person's name such as M.D. /PhD/MSCSW.
     *
     * @param $honorificSuffix TextSchema
     **/
    public function setHonorificSuffix($honorificSuffix) {
        $this->properties['honorificSuffix'] = $honorificSuffix;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getHonorificSuffix() {
        return $this->properties['honorificSuffix'];
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
     * The job title of the person (for example, Financial Manager).
     *
     * @param $jobTitle TextSchema
     **/
    public function setJobTitle($jobTitle) {
        $this->properties['jobTitle'] = $jobTitle;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getJobTitle() {
        return $this->properties['jobTitle'];
    }

    /**
     * The most generic bi-directional social/work relation.
     *
     * @param $knows PersonSchema
     **/
    public function setKnows($knows) {
        $this->properties['knows'] = $knows;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getKnows() {
        return $this->properties['knows'];
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
     * Nationality of the person.
     *
     * @param $nationality CountrySchema
     **/
    public function setNationality($nationality) {
        $this->properties['nationality'] = $nationality;

        return $this;
    }

    /**
     * @return CountrySchema
     **/
    public function getNationality() {
        return $this->properties['nationality'];
    }

    /**
     * The total financial value of the person as calculated by subtracting assets from liabilities.
     *
     * @param $netWorth PriceSpecificationSchema
     **/
    public function setNetWorth($netWorth) {
        $this->properties['netWorth'] = $netWorth;

        return $this;
    }

    /**
     * @return PriceSpecificationSchema
     **/
    public function getNetWorth() {
        return $this->properties['netWorth'];
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
     * A parent of this person.
     *
     * @param $parent PersonSchema
     **/
    public function setParent($parent) {
        $this->properties['parent'] = $parent;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getParent() {
        return $this->properties['parent'];
    }

    /**
     * A parents of the person.
     *
     * @param $parents PersonSchema
     **/
    public function setParents($parents) {
        $this->properties['parents'] = $parents;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getParents() {
        return $this->properties['parents'];
    }

    /**
     * Event that this person is a performer or participant in.
     *
     * @param $performerIn EventSchema
     **/
    public function setPerformerIn($performerIn) {
        $this->properties['performerIn'] = $performerIn;

        return $this;
    }

    /**
     * @return EventSchema
     **/
    public function getPerformerIn() {
        return $this->properties['performerIn'];
    }

    /**
     * The most generic familial relation.
     *
     * @param $relatedTo PersonSchema
     **/
    public function setRelatedTo($relatedTo) {
        $this->properties['relatedTo'] = $relatedTo;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getRelatedTo() {
        return $this->properties['relatedTo'];
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
     * A sibling of the person.
     *
     * @param $sibling PersonSchema
     **/
    public function setSibling($sibling) {
        $this->properties['sibling'] = $sibling;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getSibling() {
        return $this->properties['sibling'];
    }

    /**
     * A sibling of the person.
     *
     * @param $siblings PersonSchema
     **/
    public function setSiblings($siblings) {
        $this->properties['siblings'] = $siblings;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getSiblings() {
        return $this->properties['siblings'];
    }

    /**
     * The person's spouse.
     *
     * @param $spouse PersonSchema
     **/
    public function setSpouse($spouse) {
        $this->properties['spouse'] = $spouse;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getSpouse() {
        return $this->properties['spouse'];
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

    /**
     * The weight of the product or person.
     *
     * @param $weight QuantitativeValueSchema
     **/
    public function setWeight($weight) {
        $this->properties['weight'] = $weight;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getWeight() {
        return $this->properties['weight'];
    }

    /**
     * A contact location for a person's place of work.
     *
     * @param $workLocation ContactPointSchema|PlaceSchema
     **/
    public function setWorkLocation($workLocation) {
        $this->properties['workLocation'] = $workLocation;

        return $this;
    }

    /**
     * @return ContactPointSchema|PlaceSchema
     **/
    public function getWorkLocation() {
        return $this->properties['workLocation'];
    }

    /**
     * Organizations that the person works for.
     *
     * @param $worksFor OrganizationSchema
     **/
    public function setWorksFor($worksFor) {
        $this->properties['worksFor'] = $worksFor;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getWorksFor() {
        return $this->properties['worksFor'];
    }


}
