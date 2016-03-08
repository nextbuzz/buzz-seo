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
 * A property, used to indicate attributes and relationships of some Thing; equivalent to rdf:Property.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class PropertySchema extends IntangibleSchema
{
    public static function factory()
    {
        return new PropertySchema('http://schema.org/', 'Property');
    }

    /**
     * Relates a property to a class that is (one of) the type(s) the property is expected to be used on.
     *
     * @param $domainIncludes ClassSchema
     **/
    public function setDomainIncludes($domainIncludes) {
        $this->properties['domainIncludes'] = $domainIncludes;

        return $this;
    }

    /**
     * @return ClassSchema
     **/
    public function getDomainIncludes() {
        return $this->properties['domainIncludes'];
    }

    /**
     * Relates a property to a property that is its inverse. Inverse properties relate the same pairs of items to each other, but in reversed direction. For example, the 'alumni' and 'alumniOf' properties are inverseOf each other. Some properties don't have explicit inverses; in these situations RDFa and JSON-LD syntax for reverse properties can be used.
     *
     * @param $inverseOf PropertySchema
     **/
    public function setInverseOf($inverseOf) {
        $this->properties['inverseOf'] = $inverseOf;

        return $this;
    }

    /**
     * @return PropertySchema
     **/
    public function getInverseOf() {
        return $this->properties['inverseOf'];
    }

    /**
     * Relates a property to a class that constitutes (one of) the expected type(s) for values of the property.
     *
     * @param $rangeIncludes ClassSchema
     **/
    public function setRangeIncludes($rangeIncludes) {
        $this->properties['rangeIncludes'] = $rangeIncludes;

        return $this;
    }

    /**
     * @return ClassSchema
     **/
    public function getRangeIncludes() {
        return $this->properties['rangeIncludes'];
    }

    /**
     * Relates a term (i.e. a property, class or enumeration) to one that supersedes it.
     *
     * @param $supersededBy PropertySchema|ClassSchema|EnumerationSchema
     **/
    public function setSupersededBy($supersededBy) {
        $this->properties['supersededBy'] = $supersededBy;

        return $this;
    }

    /**
     * @return PropertySchema|ClassSchema|EnumerationSchema
     **/
    public function getSupersededBy() {
        return $this->properties['supersededBy'];
    }


}
