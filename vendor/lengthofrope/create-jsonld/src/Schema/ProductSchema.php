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
 * Any offered product or service. For example: a pair of shoes; a concert ticket; the rental of a car; a haircut; or an episode of a TV show streamed online.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ProductSchema extends ThingSchema
{
    public static function factory()
    {
        return new ProductSchema('http://schema.org/', 'Product');
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
     * An intended audience, i.e. a group for whom something was created.
     *
     * @param $audience AudienceSchema
     **/
    public function setAudience($audience) {
        $this->properties['audience'] = $audience;

        return $this;
    }

    /**
     * @return AudienceSchema
     **/
    public function getAudience() {
        return $this->properties['audience'];
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
     * The color of the product.
     *
     * @param $color TextSchema
     **/
    public function setColor($color) {
        $this->properties['color'] = $color;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getColor() {
        return $this->properties['color'];
    }

    /**
     * The depth of the item.
     *
     * @param $depth DistanceSchema|QuantitativeValueSchema
     **/
    public function setDepth($depth) {
        $this->properties['depth'] = $depth;

        return $this;
    }

    /**
     * @return DistanceSchema|QuantitativeValueSchema
     **/
    public function getDepth() {
        return $this->properties['depth'];
    }

    /**
     * The <a href="http://apps.gs1.org/GDD/glossary/Pages/GTIN-12.aspx">GTIN-12</a> code of the product, or the product to which the offer refers. The GTIN-12 is the 12-digit GS1 Identification Key composed of a U.P.C. Company Prefix, Item Reference, and Check Digit used to identify trade items. See <a href="http://www.gs1.org/barcodes/technical/idkeys/gtin">GS1 GTIN Summary</a> for more details.
     *
     * @param $gtin12 TextSchema
     **/
    public function setGtin12($gtin12) {
        $this->properties['gtin12'] = $gtin12;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getGtin12() {
        return $this->properties['gtin12'];
    }

    /**
     * The <a href="http://apps.gs1.org/GDD/glossary/Pages/GTIN-13.aspx">GTIN-13</a> code of the product, or the product to which the offer refers. This is equivalent to 13-digit ISBN codes and EAN UCC-13. Former 12-digit UPC codes can be converted into a GTIN-13 code by simply adding a preceeding zero. See <a href="http://www.gs1.org/barcodes/technical/idkeys/gtin">GS1 GTIN Summary</a> for more details.
     *
     * @param $gtin13 TextSchema
     **/
    public function setGtin13($gtin13) {
        $this->properties['gtin13'] = $gtin13;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getGtin13() {
        return $this->properties['gtin13'];
    }

    /**
     * The <a href="http://apps.gs1.org/GDD/glossary/Pages/GTIN-14.aspx">GTIN-14</a> code of the product, or the product to which the offer refers. See <a href="http://www.gs1.org/barcodes/technical/idkeys/gtin">GS1 GTIN Summary</a> for more details.
     *
     * @param $gtin14 TextSchema
     **/
    public function setGtin14($gtin14) {
        $this->properties['gtin14'] = $gtin14;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getGtin14() {
        return $this->properties['gtin14'];
    }

    /**
     * The <a href="http://apps.gs1.org/GDD/glossary/Pages/GTIN-8.aspx">GTIN-8</a> code of the product, or the product to which the offer refers. This code is also known as EAN/UCC-8 or 8-digit EAN. See <a href="http://www.gs1.org/barcodes/technical/idkeys/gtin">GS1 GTIN Summary</a> for more details.
     *
     * @param $gtin8 TextSchema
     **/
    public function setGtin8($gtin8) {
        $this->properties['gtin8'] = $gtin8;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getGtin8() {
        return $this->properties['gtin8'];
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
     * A pointer to another product (or multiple products) for which this product is an accessory or spare part.
     *
     * @param $isAccessoryOrSparePartFor ProductSchema
     **/
    public function setIsAccessoryOrSparePartFor($isAccessoryOrSparePartFor) {
        $this->properties['isAccessoryOrSparePartFor'] = $isAccessoryOrSparePartFor;

        return $this;
    }

    /**
     * @return ProductSchema
     **/
    public function getIsAccessoryOrSparePartFor() {
        return $this->properties['isAccessoryOrSparePartFor'];
    }

    /**
     * A pointer to another product (or multiple products) for which this product is a consumable.
     *
     * @param $isConsumableFor ProductSchema
     **/
    public function setIsConsumableFor($isConsumableFor) {
        $this->properties['isConsumableFor'] = $isConsumableFor;

        return $this;
    }

    /**
     * @return ProductSchema
     **/
    public function getIsConsumableFor() {
        return $this->properties['isConsumableFor'];
    }

    /**
     * A pointer to another, somehow related product (or multiple products).
     *
     * @param $isRelatedTo ProductSchema
     **/
    public function setIsRelatedTo($isRelatedTo) {
        $this->properties['isRelatedTo'] = $isRelatedTo;

        return $this;
    }

    /**
     * @return ProductSchema
     **/
    public function getIsRelatedTo() {
        return $this->properties['isRelatedTo'];
    }

    /**
     * A pointer to another, functionally similar product (or multiple products).
     *
     * @param $isSimilarTo ProductSchema
     **/
    public function setIsSimilarTo($isSimilarTo) {
        $this->properties['isSimilarTo'] = $isSimilarTo;

        return $this;
    }

    /**
     * @return ProductSchema
     **/
    public function getIsSimilarTo() {
        return $this->properties['isSimilarTo'];
    }

    /**
     * A predefined value from OfferItemCondition or a textual description of the condition of the product or service, or the products or services included in the offer.
     *
     * @param $itemCondition OfferItemConditionSchema
     **/
    public function setItemCondition($itemCondition) {
        $this->properties['itemCondition'] = $itemCondition;

        return $this;
    }

    /**
     * @return OfferItemConditionSchema
     **/
    public function getItemCondition() {
        return $this->properties['itemCondition'];
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
     * The manufacturer of the product.
     *
     * @param $manufacturer OrganizationSchema
     **/
    public function setManufacturer($manufacturer) {
        $this->properties['manufacturer'] = $manufacturer;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getManufacturer() {
        return $this->properties['manufacturer'];
    }

    /**
     * The model of the product. Use with the URL of a ProductModel or a textual representation of the model identifier. The URL of the ProductModel can be from an external source. It is recommended to additionally provide strong product identifiers via the gtin8/gtin13/gtin14 and mpn properties.
     *
     * @param $model ProductModelSchema|TextSchema
     **/
    public function setModel($model) {
        $this->properties['model'] = $model;

        return $this;
    }

    /**
     * @return ProductModelSchema|TextSchema
     **/
    public function getModel() {
        return $this->properties['model'];
    }

    /**
     * The Manufacturer Part Number (MPN) of the product, or the product to which the offer refers.
     *
     * @param $mpn TextSchema
     **/
    public function setMpn($mpn) {
        $this->properties['mpn'] = $mpn;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getMpn() {
        return $this->properties['mpn'];
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
     * The product identifier, such as ISBN. For example: <code>&lt;meta itemprop='productID' content='isbn:123-456-789'/&gt;</code>.
     *
     * @param $productID TextSchema
     **/
    public function setProductID($productID) {
        $this->properties['productID'] = $productID;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getProductID() {
        return $this->properties['productID'];
    }

    /**
     * The date of production of the item, e.g. vehicle.
     *
     * @param $productionDate DateSchema
     **/
    public function setProductionDate($productionDate) {
        $this->properties['productionDate'] = $productionDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getProductionDate() {
        return $this->properties['productionDate'];
    }

    /**
     * The date the item e.g. vehicle was purchased by the current owner.
     *
     * @param $purchaseDate DateSchema
     **/
    public function setPurchaseDate($purchaseDate) {
        $this->properties['purchaseDate'] = $purchaseDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getPurchaseDate() {
        return $this->properties['purchaseDate'];
    }

    /**
     * The release date of a product or product model. This can be used to distinguish the exact variant of a product.
     *
     * @param $releaseDate DateSchema
     **/
    public function setReleaseDate($releaseDate) {
        $this->properties['releaseDate'] = $releaseDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getReleaseDate() {
        return $this->properties['releaseDate'];
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
     * The Stock Keeping Unit (SKU), i.e. a merchant-specific identifier for a product or service, or the product to which the offer refers.
     *
     * @param $sku TextSchema
     **/
    public function setSku($sku) {
        $this->properties['sku'] = $sku;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSku() {
        return $this->properties['sku'];
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
     * The width of the item.
     *
     * @param $width DistanceSchema|QuantitativeValueSchema
     **/
    public function setWidth($width) {
        $this->properties['width'] = $width;

        return $this;
    }

    /**
     * @return DistanceSchema|QuantitativeValueSchema
     **/
    public function getWidth() {
        return $this->properties['width'];
    }


}
