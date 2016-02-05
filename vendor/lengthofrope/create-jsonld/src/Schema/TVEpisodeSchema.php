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
 * A TV episode which can be part of a series or season.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class TVEpisodeSchema extends EpisodeSchema
{
    public static function factory()
    {
        return new TVEpisodeSchema('http://schema.org/', 'TVEpisode');
    }

    /**
     * The country of the principal offices of the production company or individual responsible for the movie or program.
     *
     * @param $countryOfOrigin CountrySchema
     **/
    public function setCountryOfOrigin($countryOfOrigin) {
        $this->properties['countryOfOrigin'] = $countryOfOrigin;

        return $this;
    }

    /**
     * @return CountrySchema
     **/
    public function getCountryOfOrigin() {
        return $this->properties['countryOfOrigin'];
    }

    /**
     * The TV series to which this episode or season belongs.
     *
     * @param $partOfTVSeries TVSeriesSchema
     **/
    public function setPartOfTVSeries($partOfTVSeries) {
        $this->properties['partOfTVSeries'] = $partOfTVSeries;

        return $this;
    }

    /**
     * @return TVSeriesSchema
     **/
    public function getPartOfTVSeries() {
        return $this->properties['partOfTVSeries'];
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


}
