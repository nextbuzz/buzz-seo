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
 * A set of characteristics describing parents, who can be interested in viewing some content.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ParentAudienceSchema extends PeopleAudienceSchema
{
    public static function factory()
    {
        return new ParentAudienceSchema('http://schema.org/', 'ParentAudience');
    }

    /**
     * Maximal age of the child.
     *
     * @param $childMaxAge NumberSchema
     **/
    public function setChildMaxAge($childMaxAge) {
        $this->properties['childMaxAge'] = $childMaxAge;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getChildMaxAge() {
        return $this->properties['childMaxAge'];
    }

    /**
     * Minimal age of the child.
     *
     * @param $childMinAge NumberSchema
     **/
    public function setChildMinAge($childMinAge) {
        $this->properties['childMinAge'] = $childMinAge;

        return $this;
    }

    /**
     * @return NumberSchema
     **/
    public function getChildMinAge() {
        return $this->properties['childMinAge'];
    }


}
