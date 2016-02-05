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
 * A statement of the money due for goods or services; a bill.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class InvoiceSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new InvoiceSchema('http://schema.org/', 'Invoice');
    }

    /**
     * The identifier for the account the payment will be applied to.
     *
     * @param $accountId TextSchema
     **/
    public function setAccountId($accountId) {
        $this->properties['accountId'] = $accountId;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAccountId() {
        return $this->properties['accountId'];
    }

    /**
     * The time interval used to compute the invoice.
     *
     * @param $billingPeriod DurationSchema
     **/
    public function setBillingPeriod($billingPeriod) {
        $this->properties['billingPeriod'] = $billingPeriod;

        return $this;
    }

    /**
     * @return DurationSchema
     **/
    public function getBillingPeriod() {
        return $this->properties['billingPeriod'];
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
     * The minimum payment required at this time.
     *
     * @param $minimumPaymentDue PriceSpecificationSchema
     **/
    public function setMinimumPaymentDue($minimumPaymentDue) {
        $this->properties['minimumPaymentDue'] = $minimumPaymentDue;

        return $this;
    }

    /**
     * @return PriceSpecificationSchema
     **/
    public function getMinimumPaymentDue() {
        return $this->properties['minimumPaymentDue'];
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
     * The status of payment; whether the invoice has been paid or not.
     *
     * @param $paymentStatus TextSchema|PaymentStatusTypeSchema
     **/
    public function setPaymentStatus($paymentStatus) {
        $this->properties['paymentStatus'] = $paymentStatus;

        return $this;
    }

    /**
     * @return TextSchema|PaymentStatusTypeSchema
     **/
    public function getPaymentStatus() {
        return $this->properties['paymentStatus'];
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
     * The Order(s) related to this Invoice. One or more Orders may be combined into a single Invoice.
     *
     * @param $referencesOrder OrderSchema
     **/
    public function setReferencesOrder($referencesOrder) {
        $this->properties['referencesOrder'] = $referencesOrder;

        return $this;
    }

    /**
     * @return OrderSchema
     **/
    public function getReferencesOrder() {
        return $this->properties['referencesOrder'];
    }

    /**
     * The date the invoice is scheduled to be paid.
     *
     * @param $scheduledPaymentDate DateSchema
     **/
    public function setScheduledPaymentDate($scheduledPaymentDate) {
        $this->properties['scheduledPaymentDate'] = $scheduledPaymentDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getScheduledPaymentDate() {
        return $this->properties['scheduledPaymentDate'];
    }

    /**
     * The total amount due.
     *
     * @param $totalPaymentDue PriceSpecificationSchema
     **/
    public function setTotalPaymentDue($totalPaymentDue) {
        $this->properties['totalPaymentDue'] = $totalPaymentDue;

        return $this;
    }

    /**
     * @return PriceSpecificationSchema
     **/
    public function getTotalPaymentDue() {
        return $this->properties['totalPaymentDue'];
    }


}
