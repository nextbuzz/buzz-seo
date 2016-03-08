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
 *  A point value or interval for product characteristics and other purposes.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class QuantitativeValueSchema extends StructuredValueSchema
{
    public static function factory()
    {
        return new QuantitativeValueSchema('http://schema.org/', 'QuantitativeValue');
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
     * The upper value of some characteristic or property.
     *
     * @param $maxValue NumberSchema
     **/
    public function setMaxValue($maxValue) {
        $this->properties['maxValue'] = $maxValue;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getMaxValue() {
        return $this->properties['maxValue'];
    }

    /**
     * The lower value of some characteristic or property.
     *
     * @param $minValue NumberSchema
     **/
    public function setMinValue($minValue) {
        $this->properties['minValue'] = $minValue;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getMinValue() {
        return $this->properties['minValue'];
    }

    /**
     * The unit of measurement given using the UN/CEFACT Common Code (3 characters) or a URL. Other codes than the UN/CEFACT Common Code may be used with a prefix followed by a colon.
     *
     * @param $unitCode TextSchema|URLSchema
     **/
    public function setUnitCode($unitCode) {
        $this->properties['unitCode'] = $unitCode;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getUnitCode() {
        return $this->properties['unitCode'];
    }

    /**
     * A string or text indicating the unit of measurement. Useful if you cannot provide a standard unit code for
<a href='unitCode'>unitCode</a>.
     *
     * @param $unitText TextSchema
     **/
    public function setUnitText($unitText) {
        $this->properties['unitText'] = $unitText;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getUnitText() {
        return $this->properties['unitText'];
    }

    /**
     * The value of the quantitative value or property value node. For QuantitativeValue, the recommended type for values is 'Number'. For PropertyValue, it can be 'Text;', 'Number', 'Boolean', or 'StructuredValue'.
     *
     * @param $value NumberSchema|TextSchema|BooleanSchema|StructuredValueSchema
     **/
    public function setValue($value) {
        $this->properties['value'] = $value;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema|BooleanSchema|StructuredValueSchema
     **/
    public function getValue() {
        return $this->properties['value'];
    }

    /**
     * A pointer to a secondary value that provides additional information on the original value, e.g. a reference temperature.
     *
     * @param $valueReference EnumerationSchema|StructuredValueSchema|PropertyValueSchema|QualitativeValueSchema|QuantitativeValueSchema
     **/
    public function setValueReference($valueReference) {
        $this->properties['valueReference'] = $valueReference;

        return $this;
    }

    /**
     * @return EnumerationSchema|StructuredValueSchema|PropertyValueSchema|QualitativeValueSchema|QuantitativeValueSchema
     **/
    public function getValueReference() {
        return $this->properties['valueReference'];
    }


}
