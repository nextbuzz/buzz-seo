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
 * A Property value specification.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class PropertyValueSpecificationSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new PropertyValueSpecificationSchema('http://schema.org/', 'PropertyValueSpecification');
    }

    /**
     * The default value of the input.  For properties that expect a literal, the default is a literal value, for properties that expect an object, it's an ID reference to one of the current values.
     *
     * @param $defaultValue ThingSchema|TextSchema
     **/
    public function setDefaultValue($defaultValue) {
        $this->properties['defaultValue'] = $defaultValue;

        return $this;
    }

    /**
     * @return ThingSchema|TextSchema
     **/
    public function getDefaultValue() {
        return $this->properties['defaultValue'];
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
     * Whether multiple values are allowed for the property.  Default is false.
     *
     * @param $multipleValues BooleanSchema
     **/
    public function setMultipleValues($multipleValues) {
        $this->properties['multipleValues'] = $multipleValues;

        return $this;
    }

    /**
     * @return BooleanSchema
     **/
    public function getMultipleValues() {
        return $this->properties['multipleValues'];
    }

    /**
     * Whether or not a property is mutable.  Default is false. Specifying this for a property that also has a value makes it act similar to a "hidden" input in an HTML form.
     *
     * @param $readonlyValue BooleanSchema
     **/
    public function setReadonlyValue($readonlyValue) {
        $this->properties['readonlyValue'] = $readonlyValue;

        return $this;
    }

    /**
     * @return BooleanSchema
     **/
    public function getReadonlyValue() {
        return $this->properties['readonlyValue'];
    }

    /**
     * The stepValue attribute indicates the granularity that is expected (and required) of the value in a PropertyValueSpecification.
     *
     * @param $stepValue NumberSchema
     **/
    public function setStepValue($stepValue) {
        $this->properties['stepValue'] = $stepValue;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getStepValue() {
        return $this->properties['stepValue'];
    }

    /**
     * Specifies the allowed range for number of characters in a literal value.
     *
     * @param $valueMaxLength NumberSchema
     **/
    public function setValueMaxLength($valueMaxLength) {
        $this->properties['valueMaxLength'] = $valueMaxLength;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getValueMaxLength() {
        return $this->properties['valueMaxLength'];
    }

    /**
     * Specifies the minimum allowed range for number of characters in a literal value.
     *
     * @param $valueMinLength NumberSchema
     **/
    public function setValueMinLength($valueMinLength) {
        $this->properties['valueMinLength'] = $valueMinLength;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getValueMinLength() {
        return $this->properties['valueMinLength'];
    }

    /**
     * Indicates the name of the PropertyValueSpecification to be used in URL templates and form encoding in a manner analogous to HTML's input@name.
     *
     * @param $valueName TextSchema
     **/
    public function setValueName($valueName) {
        $this->properties['valueName'] = $valueName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getValueName() {
        return $this->properties['valueName'];
    }

    /**
     * Specifies a regular expression for testing literal values according to the HTML spec.
     *
     * @param $valuePattern TextSchema
     **/
    public function setValuePattern($valuePattern) {
        $this->properties['valuePattern'] = $valuePattern;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getValuePattern() {
        return $this->properties['valuePattern'];
    }

    /**
     * Whether the property must be filled in to complete the action.  Default is false.
     *
     * @param $valueRequired BooleanSchema
     **/
    public function setValueRequired($valueRequired) {
        $this->properties['valueRequired'] = $valueRequired;

        return $this;
    }

    /**
     * @return BooleanSchema
     **/
    public function getValueRequired() {
        return $this->properties['valueRequired'];
    }


}
