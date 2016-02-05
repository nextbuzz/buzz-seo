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
 * Fitness-related activity designed for a specific health-related purpose, including defined exercise routines as well as activity prescribed by a clinician.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ExercisePlanSchema extends \LengthOfRope\JSONLD\Elements\Element
{
    public static function factory()
    {
        return new ExercisePlanSchema('http://schema.org/', 'ExercisePlan');
    }

    /**
     * Length of time to engage in the activity.
     *
     * @param $activityDuration DurationSchema
     **/
    public function setActivityDuration($activityDuration) {
        $this->properties['activityDuration'] = $activityDuration;

        return $this;
    }

    /**
     * @return DurationSchema
     **/
    public function getActivityDuration() {
        return $this->properties['activityDuration'];
    }

    /**
     * How often one should engage in the activity.
     *
     * @param $activityFrequency TextSchema
     **/
    public function setActivityFrequency($activityFrequency) {
        $this->properties['activityFrequency'] = $activityFrequency;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getActivityFrequency() {
        return $this->properties['activityFrequency'];
    }

    /**
     * Any additional component of the exercise prescription that may need to be articulated to the patient. This may include the order of exercises, the number of repetitions of movement, quantitative distance, progressions over time, etc.
     *
     * @param $additionalVariable TextSchema
     **/
    public function setAdditionalVariable($additionalVariable) {
        $this->properties['additionalVariable'] = $additionalVariable;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAdditionalVariable() {
        return $this->properties['additionalVariable'];
    }

    /**
     * Type(s) of exercise or activity, such as strength training, flexibility training, aerobics, cardiac rehabilitation, etc.
     *
     * @param $exerciseType TextSchema
     **/
    public function setExerciseType($exerciseType) {
        $this->properties['exerciseType'] = $exerciseType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getExerciseType() {
        return $this->properties['exerciseType'];
    }

    /**
     * Quantitative measure gauging the degree of force involved in the exercise, for example, heartbeats per minute. May include the velocity of the movement.
     *
     * @param $intensity TextSchema
     **/
    public function setIntensity($intensity) {
        $this->properties['intensity'] = $intensity;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getIntensity() {
        return $this->properties['intensity'];
    }

    /**
     * Number of times one should repeat the activity.
     *
     * @param $repetitions NumberSchema
     **/
    public function setRepetitions($repetitions) {
        $this->properties['repetitions'] = $repetitions;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getRepetitions() {
        return $this->properties['repetitions'];
    }

    /**
     * How often one should break from the activity.
     *
     * @param $restPeriods TextSchema
     **/
    public function setRestPeriods($restPeriods) {
        $this->properties['restPeriods'] = $restPeriods;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getRestPeriods() {
        return $this->properties['restPeriods'];
    }

    /**
     * Quantitative measure of the physiologic output of the exercise; also referred to as energy expenditure.
     *
     * @param $workload EnergySchema
     **/
    public function setWorkload($workload) {
        $this->properties['workload'] = $workload;

        return $this;
    }

    /**
     * @return EnergySchema
     **/
    public function getWorkload() {
        return $this->properties['workload'];
    }


}
