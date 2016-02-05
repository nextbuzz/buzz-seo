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
 * An order is a confirmation of a transaction (a receipt), which can contain multiple line items, each represented by an Offer that has been accepted by the customer.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class OrderSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new OrderSchema('http://schema.org/', 'Order');
    }

    /**
     * The offer(s) -- e.g., product, quantity and price combinations -- included in the order.
     *
     * @param $acceptedOffer OfferSchema
     **/
    public function setAcceptedOffer($acceptedOffer) {
        $this->properties['acceptedOffer'] = $acceptedOffer;

        return $this;
    }

    /**
     * @return OfferSchema
     **/
    public function getAcceptedOffer() {
        return $this->properties['acceptedOffer'];
    }

    /**
     * The billing address for the order.
     *
     * @param $billingAddress PostalAddressSchema
     **/
    public function setBillingAddress($billingAddress) {
        $this->properties['billingAddress'] = $billingAddress;

        return $this;
    }

    /**
     * @return PostalAddressSchema
     **/
    public function getBillingAddress() {
        return $this->properties['billingAddress'];
    }

    /**
     * An entity that arranges for an exchange between a buyer and a seller.  In most cases a broker never acquires or releases ownership of a product or service involved in an exchange.  If it is not clear whether an entity is a broker, seller, or buyer, the latter two terms are preferred.
     *
     * @param $broker PersonSchema|OrganizationSchema
     **/
    public function setBroker($broker) {
        $this->properties['broker'] = $broker;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getBroker() {
        return $this->properties['broker'];
    }

    /**
     * A number that confirms the given order or payment has been received.
     *
     * @param $confirmationNumber TextSchema
     **/
    public function setConfirmationNumber($confirmationNumber) {
        $this->properties['confirmationNumber'] = $confirmationNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getConfirmationNumber() {
        return $this->properties['confirmationNumber'];
    }

    /**
     * Party placing the order or paying the invoice.
     *
     * @param $customer OrganizationSchema|PersonSchema
     **/
    public function setCustomer($customer) {
        $this->properties['customer'] = $customer;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getCustomer() {
        return $this->properties['customer'];
    }

    /**
     * Any discount applied (to an Order).
     *
     * @param $discount NumberSchema|TextSchema
     **/
    public function setDiscount($discount) {
        $this->properties['discount'] = $discount;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getDiscount() {
        return $this->properties['discount'];
    }

    /**
     * Code used to redeem a discount.
     *
     * @param $discountCode TextSchema
     **/
    public function setDiscountCode($discountCode) {
        $this->properties['discountCode'] = $discountCode;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDiscountCode() {
        return $this->properties['discountCode'];
    }

    /**
     * The currency (in 3-letter ISO 4217 format) of the discount.
     *
     * @param $discountCurrency TextSchema
     **/
    public function setDiscountCurrency($discountCurrency) {
        $this->properties['discountCurrency'] = $discountCurrency;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDiscountCurrency() {
        return $this->properties['discountCurrency'];
    }

    /**
     * Was the offer accepted as a gift for someone other than the buyer.
     *
     * @param $isGift BooleanSchema
     **/
    public function setIsGift($isGift) {
        $this->properties['isGift'] = $isGift;

        return $this;
    }

    /**
     * @return BooleanSchema
     **/
    public function getIsGift() {
        return $this->properties['isGift'];
    }

    /**
     * 'merchant' is an out-dated term for 'seller'.
     *
     * @param $merchant OrganizationSchema|PersonSchema
     **/
    public function setMerchant($merchant) {
        $this->properties['merchant'] = $merchant;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getMerchant() {
        return $this->properties['merchant'];
    }

    /**
     * Date order was placed.
     *
     * @param $orderDate DateTimeSchema
     **/
    public function setOrderDate($orderDate) {
        $this->properties['orderDate'] = $orderDate;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getOrderDate() {
        return $this->properties['orderDate'];
    }

    /**
     * The delivery of the parcel related to this order or order item.
     *
     * @param $orderDelivery ParcelDeliverySchema
     **/
    public function setOrderDelivery($orderDelivery) {
        $this->properties['orderDelivery'] = $orderDelivery;

        return $this;
    }

    /**
     * @return ParcelDeliverySchema
     **/
    public function getOrderDelivery() {
        return $this->properties['orderDelivery'];
    }

    /**
     * The identifier of the transaction.
     *
     * @param $orderNumber TextSchema
     **/
    public function setOrderNumber($orderNumber) {
        $this->properties['orderNumber'] = $orderNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getOrderNumber() {
        return $this->properties['orderNumber'];
    }

    /**
     * The current status of the order.
     *
     * @param $orderStatus OrderStatusSchema
     **/
    public function setOrderStatus($orderStatus) {
        $this->properties['orderStatus'] = $orderStatus;

        return $this;
    }

    /**
     * @return OrderStatusSchema
     **/
    public function getOrderStatus() {
        return $this->properties['orderStatus'];
    }

    /**
     * The item ordered.
     *
     * @param $orderedItem ProductSchema|OrderItemSchema
     **/
    public function setOrderedItem($orderedItem) {
        $this->properties['orderedItem'] = $orderedItem;

        return $this;
    }

    /**
     * @return ProductSchema|OrderItemSchema
     **/
    public function getOrderedItem() {
        return $this->properties['orderedItem'];
    }

    /**
     * The order is being paid as part of the referenced Invoice.
     *
     * @param $partOfInvoice InvoiceSchema
     **/
    public function setPartOfInvoice($partOfInvoice) {
        $this->properties['partOfInvoice'] = $partOfInvoice;

        return $this;
    }

    /**
     * @return InvoiceSchema
     **/
    public function getPartOfInvoice() {
        return $this->properties['partOfInvoice'];
    }

    /**
     * The date that payment is due.
     *
     * @param $paymentDue DateTimeSchema
     **/
    public function setPaymentDue($paymentDue) {
        $this->properties['paymentDue'] = $paymentDue;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getPaymentDue() {
        return $this->properties['paymentDue'];
    }

    /**
     * The date that payment is due.
     *
     * @param $paymentDueDate DateTimeSchema
     **/
    public function setPaymentDueDate($paymentDueDate) {
        $this->properties['paymentDueDate'] = $paymentDueDate;

        return $this;
    }

    /**
     * @return DateTimeSchema
     **/
    public function getPaymentDueDate() {
        return $this->properties['paymentDueDate'];
    }

    /**
     * The name of the credit card or other method of payment for the order.
     *
     * @param $paymentMethod PaymentMethodSchema
     **/
    public function setPaymentMethod($paymentMethod) {
        $this->properties['paymentMethod'] = $paymentMethod;

        return $this;
    }

    /**
     * @return PaymentMethodSchema
     **/
    public function getPaymentMethod() {
        return $this->properties['paymentMethod'];
    }

    /**
     * An identifier for the method of payment used (e.g. the last 4 digits of the credit card).
     *
     * @param $paymentMethodId TextSchema
     **/
    public function setPaymentMethodId($paymentMethodId) {
        $this->properties['paymentMethodId'] = $paymentMethodId;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPaymentMethodId() {
        return $this->properties['paymentMethodId'];
    }

    /**
     * The URL for sending a payment.
     *
     * @param $paymentUrl URLSchema
     **/
    public function setPaymentUrl($paymentUrl) {
        $this->properties['paymentUrl'] = $paymentUrl;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getPaymentUrl() {
        return $this->properties['paymentUrl'];
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


}
