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
 * A short TV or radio program or a segment/part of a program.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ClipSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new ClipSchema('http://schema.org/', 'Clip');
    }

    /**
     * An actor, e.g. in tv, radio, movie, video games etc. Actors can be associated with individual items or with a series, episode, clip.
     *
     * @param $actor PersonSchema
     **/
    public function setActor($actor) {
        $this->properties['actor'] = $actor;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getActor() {
        return $this->properties['actor'];
    }

    /**
     * An actor, e.g. in tv, radio, movie, video games etc. Actors can be associated with individual items or with a series, episode, clip.
     *
     * @param $actors PersonSchema
     **/
    public function setActors($actors) {
        $this->properties['actors'] = $actors;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getActors() {
        return $this->properties['actors'];
    }

    /**
     * Position of the clip within an ordered group of clips.
     *
     * @param $clipNumber IntegerSchema|TextSchema
     **/
    public function setClipNumber($clipNumber) {
        $this->properties['clipNumber'] = $clipNumber;

        return $this;
    }

    /**
     * @return IntegerSchema|TextSchema
     **/
    public function getClipNumber() {
        return $this->properties['clipNumber'];
    }

    /**
     * A director of e.g. tv, radio, movie, video games etc. content. Directors can be associated with individual items or with a series, episode, clip.
     *
     * @param $director PersonSchema
     **/
    public function setDirector($director) {
        $this->properties['director'] = $director;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getDirector() {
        return $this->properties['director'];
    }

    /**
     * A director of e.g. tv, radio, movie, video games etc. content. Directors can be associated with individual items or with a series, episode, clip.
     *
     * @param $directors PersonSchema
     **/
    public function setDirectors($directors) {
        $this->properties['directors'] = $directors;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getDirectors() {
        return $this->properties['directors'];
    }

    /**
     * The composer of the soundtrack.
     *
     * @param $musicBy MusicGroupSchema|PersonSchema
     **/
    public function setMusicBy($musicBy) {
        $this->properties['musicBy'] = $musicBy;

        return $this;
    }

    /**
     * @return MusicGroupSchema|PersonSchema
     **/
    public function getMusicBy() {
        return $this->properties['musicBy'];
    }

    /**
     * The episode to which this clip belongs.
     *
     * @param $partOfEpisode EpisodeSchema
     **/
    public function setPartOfEpisode($partOfEpisode) {
        $this->properties['partOfEpisode'] = $partOfEpisode;

        return $this;
    }

    /**
     * @return EpisodeSchema
     **/
    public function getPartOfEpisode() {
        return $this->properties['partOfEpisode'];
    }

    /**
     * The season to which this episode belongs.
     *
     * @param $partOfSeason CreativeWorkSeasonSchema
     **/
    public function setPartOfSeason($partOfSeason) {
        $this->properties['partOfSeason'] = $partOfSeason;

        return $this;
    }

    /**
     * @return CreativeWorkSeasonSchema
     **/
    public function getPartOfSeason() {
        return $this->properties['partOfSeason'];
    }

    /**
     * The series to which this episode or season belongs.
     *
     * @param $partOfSeries CreativeWorkSeriesSchema
     **/
    public function setPartOfSeries($partOfSeries) {
        $this->properties['partOfSeries'] = $partOfSeries;

        return $this;
    }

    /**
     * @return CreativeWorkSeriesSchema
     **/
    public function getPartOfSeries() {
        return $this->properties['partOfSeries'];
    }


}
