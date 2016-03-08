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
 * The most generic type of item.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ThingSchema extends \LengthOfRope\JSONLD\Elements\Element
{
    public static function factory()
    {
        return new ThingSchema('http://schema.org/', 'Thing');
    }

    /**
     * An additional type for the item, typically used for adding more specific types from external vocabularies in microdata syntax. This is a relationship between something and a class that the thing is in. In RDFa syntax, it is better to use the native RDFa syntax - the 'typeof' attribute - for multiple types. Schema.org tools may have only weaker understanding of extra types, in particular those defined externally.
     *
     * @param $additionalType URLSchema
     **/
    public function setAdditionalType($additionalType) {
        $this->properties['additionalType'] = $additionalType;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getAdditionalType() {
        return $this->properties['additionalType'];
    }

    /**
     * An alias for the item.
     *
     * @param $alternateName TextSchema
     **/
    public function setAlternateName($alternateName) {
        $this->properties['alternateName'] = $alternateName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAlternateName() {
        return $this->properties['alternateName'];
    }

    /**
     * A short description of the item.
     *
     * @param $description TextSchema
     **/
    public function setDescription($description) {
        $this->properties['description'] = $description;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDescription() {
        return $this->properties['description'];
    }

    /**
     * An image of the item. This can be a <a href="http://schema.org/URL">URL</a> or a fully described <a href="http://schema.org/ImageObject">ImageObject</a>.
     *
     * @param $image URLSchema|ImageObjectSchema
     **/
    public function setImage($image) {
        $this->properties['image'] = $image;

        return $this;
    }

    /**
     * @return URLSchema|ImageObjectSchema
     **/
    public function getImage() {
        return $this->properties['image'];
    }

    /**
     * Indicates a page (or other CreativeWork) for which this thing is the main entity being described.
      <br /><br />
      See <a href="/docs/datamodel.html#mainEntityBackground">background notes</a> for details.
      
     *
     * @param $mainEntityOfPage CreativeWorkSchema|URLSchema
     **/
    public function setMainEntityOfPage($mainEntityOfPage) {
        $this->properties['mainEntityOfPage'] = $mainEntityOfPage;

        return $this;
    }

    /**
     * @return CreativeWorkSchema|URLSchema
     **/
    public function getMainEntityOfPage() {
        return $this->properties['mainEntityOfPage'];
    }

    /**
     * The name of the item.
     *
     * @param $name TextSchema
     **/
    public function setName($name) {
        $this->properties['name'] = $name;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getName() {
        return $this->properties['name'];
    }

    /**
     * Indicates a potential Action, which describes an idealized action in which this thing would play an 'object' role.
     *
     * @param $potentialAction ActionSchema
     **/
    public function setPotentialAction($potentialAction) {
        $this->properties['potentialAction'] = $potentialAction;

        return $this;
    }

    /**
     * @return ActionSchema
     **/
    public function getPotentialAction() {
        return $this->properties['potentialAction'];
    }

    /**
     * URL of a reference Web page that unambiguously indicates the item's identity. E.g. the URL of the item's Wikipedia page, Freebase page, or official website.
     *
     * @param $sameAs URLSchema
     **/
    public function setSameAs($sameAs) {
        $this->properties['sameAs'] = $sameAs;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getSameAs() {
        return $this->properties['sameAs'];
    }

    /**
     * URL of the item.
     *
     * @param $url URLSchema
     **/
    public function setUrl($url) {
        $this->properties['url'] = $url;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getUrl() {
        return $this->properties['url'];
    }


}
