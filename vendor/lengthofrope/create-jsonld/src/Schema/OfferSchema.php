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
 * An offer to transfer some rights to an item or to provide a service&#x2014;for example, an offer to sell tickets to an event, to rent the DVD of a movie, to stream a TV show over the internet, to repair a motorcycle, or to loan a book.
      <br/><br/>
      For <a href="http://www.gs1.org/barcodes/technical/idkeys/gtin">GTIN</a>-related fields, see
      <a href="http://www.gs1.org/barcodes/support/check_digit_calculator">Check Digit calculator</a>
      and <a href="http://www.gs1us.org/resources/standards/gtin-validation-guide">validation guide</a>
      from <a href="http://www.gs1.org/">GS1</a>.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class OfferSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new OfferSchema('http://schema.org/', 'Offer');
    }

    /**
     * The payment method(s) accepted by seller for this offer.
     *
     * @param $acceptedPaymentMethod PaymentMethodSchema
     **/
    public function setAcceptedPaymentMethod($acceptedPaymentMethod) {
        $this->properties['acceptedPaymentMethod'] = $acceptedPaymentMethod;

        return $this;
    }

    /**
     * @return PaymentMethodSchema
     **/
    public function getAcceptedPaymentMethod() {
        return $this->properties['acceptedPaymentMethod'];
    }

    /**
     * An additional offer that can only be obtained in combination with the first base offer (e.g. supplements and extensions that are available for a surcharge).
     *
     * @param $addOn OfferSchema
     **/
    public function setAddOn($addOn) {
        $this->properties['addOn'] = $addOn;

        return $this;
    }

    /**
     * @return OfferSchema
     **/
    public function getAddOn() {
        return $this->properties['addOn'];
    }

    /**
     * The amount of time that is required between accepting the offer and the actual usage of the resource or service.
     *
     * @param $advanceBookingRequirement QuantitativeValueSchema
     **/
    public function setAdvanceBookingRequirement($advanceBookingRequirement) {
        $this->properties['advanceBookingRequirement'] = $advanceBookingRequirement;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getAdvanceBookingRequirement() {
        return $this->properties['advanceBookingRequirement'];
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
     * The availability of this item&#x2014;for example In stock, Out of stock, Pre-order, etc.
     *
     * @param $availability ItemAvailabilitySchema
     **/
    public function setAvailability($availability) {
        $this->properties['availability'] = $availability;

        return $this;
    }

    /**
     * @return ItemAvailabilitySchema
     **/
    public function getAvailability() {
        return $this->properties['availability'];
    }

    /**
     * The end of the availability of the product or service included in the offer.
     *
     * @param $availabilityEnds DateTimeSchema
     **/
    public function setAvailabilityEnds($availabilityEnds) {
        $this->properties['availabilityEnds'] = $availabilityEnds;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getAvailabilityEnds() {
        return $this->properties['availabilityEnds'];
    }

    /**
     * The beginning of the availability of the product or service included in the offer.
     *
     * @param $availabilityStarts DateTimeSchema
     **/
    public function setAvailabilityStarts($availabilityStarts) {
        $this->properties['availabilityStarts'] = $availabilityStarts;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getAvailabilityStarts() {
        return $this->properties['availabilityStarts'];
    }

    /**
     * The place(s) from which the offer can be obtained (e.g. store locations).
     *
     * @param $availableAtOrFrom PlaceSchema
     **/
    public function setAvailableAtOrFrom($availableAtOrFrom) {
        $this->properties['availableAtOrFrom'] = $availableAtOrFrom;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getAvailableAtOrFrom() {
        return $this->properties['availableAtOrFrom'];
    }

    /**
     * The delivery method(s) available for this offer.
     *
     * @param $availableDeliveryMethod DeliveryMethodSchema
     **/
    public function setAvailableDeliveryMethod($availableDeliveryMethod) {
        $this->properties['availableDeliveryMethod'] = $availableDeliveryMethod;

        return $this;
    }

    /**
     * @return DeliveryMethodSchema
     **/
    public function getAvailableDeliveryMethod() {
        return $this->properties['availableDeliveryMethod'];
    }

    /**
     * The business function (e.g. sell, lease, repair, dispose) of the offer or component of a bundle (TypeAndQuantityNode). The default is http://purl.org/goodrelations/v1#Sell.
     *
     * @param $businessFunction BusinessFunctionSchema
     **/
    public function setBusinessFunction($businessFunction) {
        $this->properties['businessFunction'] = $businessFunction;

        return $this;
    }

    /**
     * @return BusinessFunctionSchema
     **/
    public function getBusinessFunction() {
        return $this->properties['businessFunction'];
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
     * The typical delay between the receipt of the order and the goods leaving the warehouse.
     *
     * @param $deliveryLeadTime QuantitativeValueSchema
     **/
    public function setDeliveryLeadTime($deliveryLeadTime) {
        $this->properties['deliveryLeadTime'] = $deliveryLeadTime;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getDeliveryLeadTime() {
        return $this->properties['deliveryLeadTime'];
    }

    /**
     * The type(s) of customers for which the given offer is valid.
     *
     * @param $eligibleCustomerType BusinessEntityTypeSchema
     **/
    public function setEligibleCustomerType($eligibleCustomerType) {
        $this->properties['eligibleCustomerType'] = $eligibleCustomerType;

        return $this;
    }

    /**
     * @return BusinessEntityTypeSchema
     **/
    public function getEligibleCustomerType() {
        return $this->properties['eligibleCustomerType'];
    }

    /**
     * The duration for which the given offer is valid.
     *
     * @param $eligibleDuration QuantitativeValueSchema
     **/
    public function setEligibleDuration($eligibleDuration) {
        $this->properties['eligibleDuration'] = $eligibleDuration;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getEligibleDuration() {
        return $this->properties['eligibleDuration'];
    }

    /**
     * The interval and unit of measurement of ordering quantities for which the offer or price specification is valid. This allows e.g. specifying that a certain freight charge is valid only for a certain quantity.
     *
     * @param $eligibleQuantity QuantitativeValueSchema
     **/
    public function setEligibleQuantity($eligibleQuantity) {
        $this->properties['eligibleQuantity'] = $eligibleQuantity;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getEligibleQuantity() {
        return $this->properties['eligibleQuantity'];
    }

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is valid.
      <br><br> See also <a href="/ineligibleRegion">ineligibleRegion</a>.
    
     *
     * @param $eligibleRegion GeoShapeSchema|PlaceSchema|TextSchema
     **/
    public function setEligibleRegion($eligibleRegion) {
        $this->properties['eligibleRegion'] = $eligibleRegion;

        return $this;
    }

    /**
     * @return GeoShapeSchema|PlaceSchema|TextSchema
     **/
    public function getEligibleRegion() {
        return $this->properties['eligibleRegion'];
    }

    /**
     * The transaction volume, in a monetary unit, for which the offer or price specification is valid, e.g. for indicating a minimal purchasing volume, to express free shipping above a certain order volume, or to limit the acceptance of credit cards to purchases to a certain minimal amount.
     *
     * @param $eligibleTransactionVolume PriceSpecificationSchema
     **/
    public function setEligibleTransactionVolume($eligibleTransactionVolume) {
        $this->properties['eligibleTransactionVolume'] = $eligibleTransactionVolume;

        return $this;
    }

    /**
     * @return PriceSpecificationSchema
     **/
    public function getEligibleTransactionVolume() {
        return $this->properties['eligibleTransactionVolume'];
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
     * This links to a node or nodes indicating the exact quantity of the products included in the offer.
     *
     * @param $includesObject TypeAndQuantityNodeSchema
     **/
    public function setIncludesObject($includesObject) {
        $this->properties['includesObject'] = $includesObject;

        return $this;
    }

    /**
     * @return TypeAndQuantityNodeSchema
     **/
    public function getIncludesObject() {
        return $this->properties['includesObject'];
    }

    /**
     * The ISO 3166-1 (ISO 3166-1 alpha-2) or ISO 3166-2 code, the place, or the GeoShape for the geo-political region(s) for which the offer or delivery charge specification is not valid, e.g. a region where the transaction is not allowed.
      <br><br> See also <a href="/eligibleRegion">eligibleRegion</a>.
      
     *
     * @param $ineligibleRegion GeoShapeSchema|PlaceSchema|TextSchema
     **/
    public function setIneligibleRegion($ineligibleRegion) {
        $this->properties['ineligibleRegion'] = $ineligibleRegion;

        return $this;
    }

    /**
     * @return GeoShapeSchema|PlaceSchema|TextSchema
     **/
    public function getIneligibleRegion() {
        return $this->properties['ineligibleRegion'];
    }

    /**
     * The current approximate inventory level for the item or items.
     *
     * @param $inventoryLevel QuantitativeValueSchema
     **/
    public function setInventoryLevel($inventoryLevel) {
        $this->properties['inventoryLevel'] = $inventoryLevel;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getInventoryLevel() {
        return $this->properties['inventoryLevel'];
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
     * The item being offered.
     *
     * @param $itemOffered ProductSchema|ServiceSchema
     **/
    public function setItemOffered($itemOffered) {
        $this->properties['itemOffered'] = $itemOffered;

        return $this;
    }

    /**
     * @return ProductSchema|ServiceSchema
     **/
    public function getItemOffered() {
        return $this->properties['itemOffered'];
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
     * A pointer to the organization or person making the offer.
     *
     * @param $offeredBy PersonSchema|OrganizationSchema
     **/
    public function setOfferedBy($offeredBy) {
        $this->properties['offeredBy'] = $offeredBy;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getOfferedBy() {
        return $this->properties['offeredBy'];
    }

    /**
     * The offer price of a product, or of a price component when attached to PriceSpecification and its subtypes.
<br />
<br />
      Usage guidelines:
<br />
<ul>
<li>Use the <a href="/priceCurrency">priceCurrency</a> property (with <a href="http://en.wikipedia.org/wiki/ISO_4217#Active_codes">ISO 4217 codes</a> e.g. "USD") instead of
      including <a href="http://en.wikipedia.org/wiki/Dollar_sign#Currencies_that_use_the_dollar_or_peso_sign">ambiguous symbols</a> such as '$' in the value.
</li>
<li>
      Use '.' (Unicode 'FULL STOP' (U+002E)) rather than ',' to indicate a decimal point. Avoid using these symbols as a readability separator.
</li>
<li>
      Note that both <a href="http://www.w3.org/TR/xhtml-rdfa-primer/#using-the-content-attribute">RDFa</a> and Microdata syntax allow the use of a "content=" attribute for publishing simple machine-readable values
      alongside more human-friendly formatting.
</li>
<li>
      Use values from 0123456789 (Unicode 'DIGIT ZERO' (U+0030) to 'DIGIT NINE' (U+0039)) rather than superficially similiar Unicode symbols.
</li>
</ul>
      
     *
     * @param $price NumberSchema|TextSchema
     **/
    public function setPrice($price) {
        $this->properties['price'] = $price;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getPrice() {
        return $this->properties['price'];
    }

    /**
     * The currency (in 3-letter ISO 4217 format) of the price or a price component, when attached to PriceSpecification and its subtypes.
     *
     * @param $priceCurrency TextSchema
     **/
    public function setPriceCurrency($priceCurrency) {
        $this->properties['priceCurrency'] = $priceCurrency;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPriceCurrency() {
        return $this->properties['priceCurrency'];
    }

    /**
     * One or more detailed price specifications, indicating the unit price and delivery or payment charges.
     *
     * @param $priceSpecification PriceSpecificationSchema
     **/
    public function setPriceSpecification($priceSpecification) {
        $this->properties['priceSpecification'] = $priceSpecification;

        return $this;
    }

    /**
     * @return PriceSpecificationSchema
     **/
    public function getPriceSpecification() {
        return $this->properties['priceSpecification'];
    }

    /**
     * The date after which the price is no longer available.
     *
     * @param $priceValidUntil DateSchema
     **/
    public function setPriceValidUntil($priceValidUntil) {
        $this->properties['priceValidUntil'] = $priceValidUntil;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getPriceValidUntil() {
        return $this->properties['priceValidUntil'];
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
     * An entity which offers (sells / leases / lends / loans) the services / goods.  A seller may also be a provider.
     *
     * @param $seller OrganizationSchema|PersonSchema
     **/
    public function setSeller($seller) {
        $this->properties['seller'] = $seller;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getSeller() {
        return $this->properties['seller'];
    }

    /**
     * The serial number or any alphanumeric identifier of a particular product. When attached to an offer, it is a shortcut for the serial number of the product included in the offer.
     *
     * @param $serialNumber TextSchema
     **/
    public function setSerialNumber($serialNumber) {
        $this->properties['serialNumber'] = $serialNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSerialNumber() {
        return $this->properties['serialNumber'];
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
     * The date when the item becomes valid.
     *
     * @param $validFrom DateTimeSchema
     **/
    public function setValidFrom($validFrom) {
        $this->properties['validFrom'] = $validFrom;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getValidFrom() {
        return $this->properties['validFrom'];
    }

    /**
     * The end of the validity of offer, price specification, or opening hours data.
     *
     * @param $validThrough DateTimeSchema
     **/
    public function setValidThrough($validThrough) {
        $this->properties['validThrough'] = $validThrough;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getValidThrough() {
        return $this->properties['validThrough'];
    }

    /**
     * The warranty promise(s) included in the offer.
     *
     * @param $warranty WarrantyPromiseSchema
     **/
    public function setWarranty($warranty) {
        $this->properties['warranty'] = $warranty;

        return $this;
    }

    /**
     * @return WarrantyPromiseSchema
     **/
    public function getWarranty() {
        return $this->properties['warranty'];
    }


}
