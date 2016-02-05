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
 * The act of responding to a question/message asked/sent by the object. Related to <a href="AskAction">AskAction</a>.<p>Related actions:</p><ul><li><a href="http://schema.org/AskAction">AskAction</a>: Appears generally as an origin of a ReplyAction</li></ul>.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ReplyActionSchema extends CommunicateActionSchema
{
    public static function factory()
    {
        return new ReplyActionSchema('http://schema.org/', 'ReplyAction');
    }

    /**
     * A sub property of result. The Comment created or sent as a result of this action.
     *
     * @param $resultComment CommentSchema
     **/
    public function setResultComment($resultComment) {
        $this->properties['resultComment'] = $resultComment;

        return $this;
    }

    /**
     * @return CommentSchema
     **/
    public function getResultComment() {
        return $this->properties['resultComment'];
    }


}
