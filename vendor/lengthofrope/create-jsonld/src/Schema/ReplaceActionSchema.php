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
 * The act of editing a recipient by replacing an old object with a new object.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ReplaceActionSchema extends UpdateActionSchema
{
    public static function factory()
    {
        return new ReplaceActionSchema('http://schema.org/', 'ReplaceAction');
    }

    /**
     * A sub property of object. The object that is being replaced.
     *
     * @param $replacee ThingSchema
     **/
    public function setReplacee($replacee) {
        $this->properties['replacee'] = $replacee;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getReplacee() {
        return $this->properties['replacee'];
    }

    /**
     * A sub property of object. The object that replaces.
     *
     * @param $replacer ThingSchema
     **/
    public function setReplacer($replacer) {
        $this->properties['replacer'] = $replacer;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getReplacer() {
        return $this->properties['replacer'];
    }


}
