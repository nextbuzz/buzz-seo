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
 * A media season e.g. tv, radio, video game etc.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class CreativeWorkSeasonSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new CreativeWorkSeasonSchema('http://schema.org/', 'CreativeWorkSeason');
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
     * The end date and time of the item (in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 date format</a>).
     *
     * @param $endDate DateSchema
     **/
    public function setEndDate($endDate) {
        $this->properties['endDate'] = $endDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getEndDate() {
        return $this->properties['endDate'];
    }

    /**
     * An episode of a tv, radio or game media within a series or season.
     *
     * @param $episode EpisodeSchema
     **/
    public function setEpisode($episode) {
        $this->properties['episode'] = $episode;

        return $this;
    }

    /**
     * @return EpisodeSchema
     **/
    public function getEpisode() {
        return $this->properties['episode'];
    }

    /**
     * An episode of a TV/radio series or season.
     *
     * @param $episodes EpisodeSchema
     **/
    public function setEpisodes($episodes) {
        $this->properties['episodes'] = $episodes;

        return $this;
    }

    /**
     * @return EpisodeSchema
     **/
    public function getEpisodes() {
        return $this->properties['episodes'];
    }

    /**
     * The number of episodes in this season or series.
     *
     * @param $numberOfEpisodes IntegerSchema
     **/
    public function setNumberOfEpisodes($numberOfEpisodes) {
        $this->properties['numberOfEpisodes'] = $numberOfEpisodes;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getNumberOfEpisodes() {
        return $this->properties['numberOfEpisodes'];
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

    /**
     * The production company or studio responsible for the item e.g. series, video game, episode etc.
     *
     * @param $productionCompany OrganizationSchema
     **/
    public function setProductionCompany($productionCompany) {
        $this->properties['productionCompany'] = $productionCompany;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getProductionCompany() {
        return $this->properties['productionCompany'];
    }

    /**
     * Position of the season within an ordered group of seasons.
     *
     * @param $seasonNumber IntegerSchema|TextSchema
     **/
    public function setSeasonNumber($seasonNumber) {
        $this->properties['seasonNumber'] = $seasonNumber;

        return $this;
    }

    /**
     * @return IntegerSchema|TextSchema
     **/
    public function getSeasonNumber() {
        return $this->properties['seasonNumber'];
    }

    /**
     * The start date and time of the item (in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 date format</a>).
     *
     * @param $startDate DateSchema
     **/
    public function setStartDate($startDate) {
        $this->properties['startDate'] = $startDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getStartDate() {
        return $this->properties['startDate'];
    }

    /**
     * The trailer of a movie or tv/radio series, season, episode, etc.
     *
     * @param $trailer VideoObjectSchema
     **/
    public function setTrailer($trailer) {
        $this->properties['trailer'] = $trailer;

        return $this;
    }

    /**
     * @return VideoObjectSchema
     **/
    public function getTrailer() {
        return $this->properties['trailer'];
    }


}
