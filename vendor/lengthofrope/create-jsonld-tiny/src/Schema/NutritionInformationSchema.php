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
 * Nutritional information about the recipe.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class NutritionInformationSchema extends StructuredValueSchema
{
    public static function factory()
    {
        return new NutritionInformationSchema('http://schema.org/', 'NutritionInformation');
    }

    /**
     * The number of calories.
     *
     * @param $calories EnergySchema
     **/
    public function setCalories($calories) {
        $this->properties['calories'] = $calories;

        return $this;
    }

    /**
     * @return EnergySchema
     **/
    public function getCalories() {
        return $this->properties['calories'];
    }

    /**
     * The number of grams of carbohydrates.
     *
     * @param $carbohydrateContent MassSchema
     **/
    public function setCarbohydrateContent($carbohydrateContent) {
        $this->properties['carbohydrateContent'] = $carbohydrateContent;

        return $this;
    }

    /**
     * @return MassSchema
     **/
    public function getCarbohydrateContent() {
        return $this->properties['carbohydrateContent'];
    }

    /**
     * The number of milligrams of cholesterol.
     *
     * @param $cholesterolContent MassSchema
     **/
    public function setCholesterolContent($cholesterolContent) {
        $this->properties['cholesterolContent'] = $cholesterolContent;

        return $this;
    }

    /**
     * @return MassSchema
     **/
    public function getCholesterolContent() {
        return $this->properties['cholesterolContent'];
    }

    /**
     * The number of grams of fat.
     *
     * @param $fatContent MassSchema
     **/
    public function setFatContent($fatContent) {
        $this->properties['fatContent'] = $fatContent;

        return $this;
    }

    /**
     * @return MassSchema
     **/
    public function getFatContent() {
        return $this->properties['fatContent'];
    }

    /**
     * The number of grams of fiber.
     *
     * @param $fiberContent MassSchema
     **/
    public function setFiberContent($fiberContent) {
        $this->properties['fiberContent'] = $fiberContent;

        return $this;
    }

    /**
     * @return MassSchema
     **/
    public function getFiberContent() {
        return $this->properties['fiberContent'];
    }

    /**
     * The number of grams of protein.
     *
     * @param $proteinContent MassSchema
     **/
    public function setProteinContent($proteinContent) {
        $this->properties['proteinContent'] = $proteinContent;

        return $this;
    }

    /**
     * @return MassSchema
     **/
    public function getProteinContent() {
        return $this->properties['proteinContent'];
    }

    /**
     * The number of grams of saturated fat.
     *
     * @param $saturatedFatContent MassSchema
     **/
    public function setSaturatedFatContent($saturatedFatContent) {
        $this->properties['saturatedFatContent'] = $saturatedFatContent;

        return $this;
    }

    /**
     * @return MassSchema
     **/
    public function getSaturatedFatContent() {
        return $this->properties['saturatedFatContent'];
    }

    /**
     * The serving size, in terms of the number of volume or mass.
     *
     * @param $servingSize TextSchema
     **/
    public function setServingSize($servingSize) {
        $this->properties['servingSize'] = $servingSize;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getServingSize() {
        return $this->properties['servingSize'];
    }

    /**
     * The number of milligrams of sodium.
     *
     * @param $sodiumContent MassSchema
     **/
    public function setSodiumContent($sodiumContent) {
        $this->properties['sodiumContent'] = $sodiumContent;

        return $this;
    }

    /**
     * @return MassSchema
     **/
    public function getSodiumContent() {
        return $this->properties['sodiumContent'];
    }

    /**
     * The number of grams of sugar.
     *
     * @param $sugarContent MassSchema
     **/
    public function setSugarContent($sugarContent) {
        $this->properties['sugarContent'] = $sugarContent;

        return $this;
    }

    /**
     * @return MassSchema
     **/
    public function getSugarContent() {
        return $this->properties['sugarContent'];
    }

    /**
     * The number of grams of trans fat.
     *
     * @param $transFatContent MassSchema
     **/
    public function setTransFatContent($transFatContent) {
        $this->properties['transFatContent'] = $transFatContent;

        return $this;
    }

    /**
     * @return MassSchema
     **/
    public function getTransFatContent() {
        return $this->properties['transFatContent'];
    }

    /**
     * The number of grams of unsaturated fat.
     *
     * @param $unsaturatedFatContent MassSchema
     **/
    public function setUnsaturatedFatContent($unsaturatedFatContent) {
        $this->properties['unsaturatedFatContent'] = $unsaturatedFatContent;

        return $this;
    }

    /**
     * @return MassSchema
     **/
    public function getUnsaturatedFatContent() {
        return $this->properties['unsaturatedFatContent'];
    }


}
