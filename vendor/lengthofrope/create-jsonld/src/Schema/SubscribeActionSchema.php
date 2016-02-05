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
 * The act of forming a personal connection with someone/something (object) unidirectionally/asymmetrically to get updates pushed to.<p>Related actions:</p><ul><li><a href="http://schema.org/FollowAction">FollowAction</a>: Unlike FollowAction, SubscribeAction implies that the subscriber acts as a passive agent being constantly/actively pushed for updates.</li><li><a href="http://schema.org/RegisterAction">RegisterAction</a>: Unlike RegisterAction, SubscribeAction implies that the agent is interested in continuing receiving updates from the object.</li><li><a href="http://schema.org/JoinAction">JoinAction</a>: Unlike JoinAction, SubscribeAction implies that the agent is interested in continuing receiving updates from the object</li></ul>.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class SubscribeActionSchema extends InteractActionSchema
{
    public static function factory()
    {
        return new SubscribeActionSchema('http://schema.org/', 'SubscribeAction');
    }


}
