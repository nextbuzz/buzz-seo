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
 * The act of forming a personal connection with someone/something (object) unidirectionally/asymmetrically to get updates polled from.<p>Related actions:</p><ul><li><a href="http://schema.org/BefriendAction">BefriendAction</a>: Unlike BefriendAction, FollowAction implies that the connection is *not* necessarily reciprocal.</li><li><a href="http://schema.org/SubscribeAction">SubscribeAction</a>: Unlike SubscribeAction, FollowAction implies that the follower acts as an active agent constantly/actively polling for updates.</li><li><a href="http://schema.org/RegisterAction">RegisterAction</a>: Unlike RegisterAction, FollowAction implies that the agent is interested in continuing receiving updates from the object.</li><li><a href="http://schema.org/JoinAction">JoinAction</a>: Unlike JoinAction, FollowAction implies that the agent is interested in getting updates from the object.</li><li><a href="http://schema.org/TrackAction">TrackAction</a>: Unlike TrackAction, FollowAction refers to the polling of updates of all aspects of animate objects rather than the location of inanimate objects (e.g. you track a package, but you don't follow it)</li></ul>.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class FollowActionSchema extends InteractActionSchema
{
    public static function factory()
    {
        return new FollowActionSchema('http://schema.org/', 'FollowAction');
    }

    /**
     * A sub property of object. The person or organization being followed.
     *
     * @param $followee OrganizationSchema|PersonSchema
     **/
    public function setFollowee($followee) {
        $this->properties['followee'] = $followee;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getFollowee() {
        return $this->properties['followee'];
    }


}
