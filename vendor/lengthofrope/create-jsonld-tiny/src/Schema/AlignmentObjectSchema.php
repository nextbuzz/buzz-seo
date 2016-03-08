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
 * An intangible item that describes an alignment between a learning resource and a node in an educational framework.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class AlignmentObjectSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new AlignmentObjectSchema('http://schema.org/', 'AlignmentObject');
    }

    /**
     * A category of alignment between the learning resource and the framework node. Recommended values include: 'assesses', 'teaches', 'requires', 'textComplexity', 'readingLevel', 'educationalSubject', and 'educationLevel'.
     *
     * @param $alignmentType TextSchema
     **/
    public function setAlignmentType($alignmentType) {
        $this->properties['alignmentType'] = $alignmentType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAlignmentType() {
        return $this->properties['alignmentType'];
    }

    /**
     * The framework to which the resource being described is aligned.
     *
     * @param $educationalFramework TextSchema
     **/
    public function setEducationalFramework($educationalFramework) {
        $this->properties['educationalFramework'] = $educationalFramework;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getEducationalFramework() {
        return $this->properties['educationalFramework'];
    }

    /**
     * The description of a node in an established educational framework.
     *
     * @param $targetDescription TextSchema
     **/
    public function setTargetDescription($targetDescription) {
        $this->properties['targetDescription'] = $targetDescription;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTargetDescription() {
        return $this->properties['targetDescription'];
    }

    /**
     * The name of a node in an established educational framework.
     *
     * @param $targetName TextSchema
     **/
    public function setTargetName($targetName) {
        $this->properties['targetName'] = $targetName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTargetName() {
        return $this->properties['targetName'];
    }

    /**
     * The URL of a node in an established educational framework.
     *
     * @param $targetUrl URLSchema
     **/
    public function setTargetUrl($targetUrl) {
        $this->properties['targetUrl'] = $targetUrl;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getTargetUrl() {
        return $this->properties['targetUrl'];
    }


}
