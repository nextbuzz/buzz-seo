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
 * A set of characteristics belonging to people, e.g. who compose an item's target audience.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class PeopleAudienceSchema extends AudienceSchema
{
    public static function factory()
    {
        return new PeopleAudienceSchema('http://schema.org/', 'PeopleAudience');
    }

    /**
     * Expectations for health conditions of target audience.
     *
     * @param $healthCondition MedicalConditionSchema
     **/
    public function setHealthCondition($healthCondition) {
        $this->properties['healthCondition'] = $healthCondition;

        return $this;
    }

    /**
     * @return MedicalConditionSchema
     **/
    public function getHealthCondition() {
        return $this->properties['healthCondition'];
    }

    /**
     * Audiences defined by a person's gender.
     *
     * @param $requiredGender TextSchema
     **/
    public function setRequiredGender($requiredGender) {
        $this->properties['requiredGender'] = $requiredGender;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getRequiredGender() {
        return $this->properties['requiredGender'];
    }

    /**
     * Audiences defined by a person's maximum age.
     *
     * @param $requiredMaxAge IntegerSchema
     **/
    public function setRequiredMaxAge($requiredMaxAge) {
        $this->properties['requiredMaxAge'] = $requiredMaxAge;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getRequiredMaxAge() {
        return $this->properties['requiredMaxAge'];
    }

    /**
     * Audiences defined by a person's minimum age.
     *
     * @param $requiredMinAge IntegerSchema
     **/
    public function setRequiredMinAge($requiredMinAge) {
        $this->properties['requiredMinAge'] = $requiredMinAge;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getRequiredMinAge() {
        return $this->properties['requiredMinAge'];
    }

    /**
     * The gender of the person or audience.
     *
     * @param $suggestedGender TextSchema
     **/
    public function setSuggestedGender($suggestedGender) {
        $this->properties['suggestedGender'] = $suggestedGender;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSuggestedGender() {
        return $this->properties['suggestedGender'];
    }

    /**
     * Maximal age recommended for viewing content.
     *
     * @param $suggestedMaxAge NumberSchema
     **/
    public function setSuggestedMaxAge($suggestedMaxAge) {
        $this->properties['suggestedMaxAge'] = $suggestedMaxAge;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getSuggestedMaxAge() {
        return $this->properties['suggestedMaxAge'];
    }

    /**
     * Minimal age recommended for viewing content.
     *
     * @param $suggestedMinAge NumberSchema
     **/
    public function setSuggestedMinAge($suggestedMinAge) {
        $this->properties['suggestedMinAge'] = $suggestedMinAge;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getSuggestedMinAge() {
        return $this->properties['suggestedMinAge'];
    }


}
