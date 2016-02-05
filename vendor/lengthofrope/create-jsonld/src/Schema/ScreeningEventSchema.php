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
 * A screening of a movie or other video.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ScreeningEventSchema extends EventSchema
{
    public static function factory()
    {
        return new ScreeningEventSchema('http://schema.org/', 'ScreeningEvent');
    }

    /**
     * Languages in which subtitles/captions are available, in <a href='http://tools.ietf.org/html/bcp47'>IETF BCP 47 standard format.</a>
     *
     * @param $subtitleLanguage TextSchema|LanguageSchema
     **/
    public function setSubtitleLanguage($subtitleLanguage) {
        $this->properties['subtitleLanguage'] = $subtitleLanguage;

        return $this;
    }

    /**
     * @return TextSchema|LanguageSchema
     **/
    public function getSubtitleLanguage() {
        return $this->properties['subtitleLanguage'];
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

    /**
     * The movie presented during this event.
     *
     * @param $workPresented MovieSchema
     **/
    public function setWorkPresented($workPresented) {
        $this->properties['workPresented'] = $workPresented;

        return $this;
    }

    /**
     * @return MovieSchema
     **/
    public function getWorkPresented() {
        return $this->properties['workPresented'];
    }


}
