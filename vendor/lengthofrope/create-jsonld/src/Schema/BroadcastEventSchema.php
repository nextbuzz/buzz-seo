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
 * An over the air or online broadcast event.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class BroadcastEventSchema extends PublicationEventSchema
{
    public static function factory()
    {
        return new BroadcastEventSchema('http://schema.org/', 'BroadcastEvent');
    }

    /**
     * The event being broadcast such as a sporting event or awards ceremony.
     *
     * @param $broadcastOfEvent EventSchema
     **/
    public function setBroadcastOfEvent($broadcastOfEvent) {
        $this->properties['broadcastOfEvent'] = $broadcastOfEvent;

        return $this;
    }

    /**
     * @return EventSchema
     **/
    public function getBroadcastOfEvent() {
        return $this->properties['broadcastOfEvent'];
    }

    /**
     * True is the broadcast is of a live event.
     *
     * @param $isLiveBroadcast BooleanSchema
     **/
    public function setIsLiveBroadcast($isLiveBroadcast) {
        $this->properties['isLiveBroadcast'] = $isLiveBroadcast;

        return $this;
    }

    /**
     * @return BooleanSchema
     **/
    public function getIsLiveBroadcast() {
        return $this->properties['isLiveBroadcast'];
    }

    /**
     * The type of screening or video broadcast used (e.g. IMAX, 3D, SD, HD, etc.).
     *
     * @param $videoFormat TextSchema
     **/
    public function setVideoFormat($videoFormat) {
        $this->properties['videoFormat'] = $videoFormat;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getVideoFormat() {
        return $this->properties['videoFormat'];
    }


}
