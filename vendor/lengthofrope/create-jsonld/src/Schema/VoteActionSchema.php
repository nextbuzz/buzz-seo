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
 * The act of expressing a preference from a fixed/finite/structured set of choices/options.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class VoteActionSchema extends ChooseActionSchema
{
    public static function factory()
    {
        return new VoteActionSchema('http://schema.org/', 'VoteAction');
    }

    /**
     * A sub property of object. The candidate subject of this action.
     *
     * @param $candidate PersonSchema
     **/
    public function setCandidate($candidate) {
        $this->properties['candidate'] = $candidate;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getCandidate() {
        return $this->properties['candidate'];
    }


}
