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
 * A recipe.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class RecipeSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new RecipeSchema('http://schema.org/', 'Recipe');
    }

    /**
     * The time it takes to actually cook the dish, in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 duration format</a>.
     *
     * @param $cookTime DurationSchema
     **/
    public function setCookTime($cookTime) {
        $this->properties['cookTime'] = $cookTime;

        return $this;
    }

    /**
     * @return DurationSchema
     **/
    public function getCookTime() {
        return $this->properties['cookTime'];
    }

    /**
     * The method of cooking, such as Frying, Steaming, ...
     *
     * @param $cookingMethod TextSchema
     **/
    public function setCookingMethod($cookingMethod) {
        $this->properties['cookingMethod'] = $cookingMethod;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCookingMethod() {
        return $this->properties['cookingMethod'];
    }

    /**
     * A single ingredient used in the recipe, e.g. sugar, flour or garlic.
     *
     * @param $ingredients TextSchema
     **/
    public function setIngredients($ingredients) {
        $this->properties['ingredients'] = $ingredients;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getIngredients() {
        return $this->properties['ingredients'];
    }

    /**
     * Nutrition information about the recipe.
     *
     * @param $nutrition NutritionInformationSchema
     **/
    public function setNutrition($nutrition) {
        $this->properties['nutrition'] = $nutrition;

        return $this;
    }

    /**
     * @return NutritionInformationSchema
     **/
    public function getNutrition() {
        return $this->properties['nutrition'];
    }

    /**
     * The length of time it takes to prepare the recipe, in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 duration format</a>.
     *
     * @param $prepTime DurationSchema
     **/
    public function setPrepTime($prepTime) {
        $this->properties['prepTime'] = $prepTime;

        return $this;
    }

    /**
     * @return DurationSchema
     **/
    public function getPrepTime() {
        return $this->properties['prepTime'];
    }

    /**
     * The category of the recipe&#x2014;for example, appetizer, entree, etc.
     *
     * @param $recipeCategory TextSchema
     **/
    public function setRecipeCategory($recipeCategory) {
        $this->properties['recipeCategory'] = $recipeCategory;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getRecipeCategory() {
        return $this->properties['recipeCategory'];
    }

    /**
     * The cuisine of the recipe (for example, French or Ethiopian).
     *
     * @param $recipeCuisine TextSchema
     **/
    public function setRecipeCuisine($recipeCuisine) {
        $this->properties['recipeCuisine'] = $recipeCuisine;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getRecipeCuisine() {
        return $this->properties['recipeCuisine'];
    }

    /**
     * A single ingredient used in the recipe, e.g. sugar, flour or garlic.
     *
     * @param $recipeIngredient TextSchema
     **/
    public function setRecipeIngredient($recipeIngredient) {
        $this->properties['recipeIngredient'] = $recipeIngredient;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getRecipeIngredient() {
        return $this->properties['recipeIngredient'];
    }

    /**
     * A step or instruction involved in making the recipe.
     *
     * @param $recipeInstructions TextSchema|ItemListSchema
     **/
    public function setRecipeInstructions($recipeInstructions) {
        $this->properties['recipeInstructions'] = $recipeInstructions;

        return $this;
    }

    /**
     * @return TextSchema|ItemListSchema
     **/
    public function getRecipeInstructions() {
        return $this->properties['recipeInstructions'];
    }

    /**
     * The quantity produced by the recipe (for example, number of people served, number of servings, etc).
     *
     * @param $recipeYield TextSchema
     **/
    public function setRecipeYield($recipeYield) {
        $this->properties['recipeYield'] = $recipeYield;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getRecipeYield() {
        return $this->properties['recipeYield'];
    }

    /**
     * The total time it takes to prepare and cook the recipe, in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 duration format</a>.
     *
     * @param $totalTime DurationSchema
     **/
    public function setTotalTime($totalTime) {
        $this->properties['totalTime'] = $totalTime;

        return $this;
    }

    /**
     * @return DurationSchema
     **/
    public function getTotalTime() {
        return $this->properties['totalTime'];
    }


}
