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
 * CreativeWorkSeries dedicated to radio broadcast and associated online delivery.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class RadioSeriesSchema extends CreativeWorkSeriesSchema
{
    public static function factory()
    {
        return new RadioSeriesSchema('http://schema.org/', 'RadioSeries');
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
     * A season that is part of the media series.
     *
     * @param $containsSeason CreativeWorkSeasonSchema
     **/
    public function setContainsSeason($containsSeason) {
        $this->properties['containsSeason'] = $containsSeason;

        return $this;
    }

    /**
     * @return CreativeWorkSeasonSchema
     **/
    public function getContainsSeason() {
        return $this->properties['containsSeason'];
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
     * The number of seasons in this series.
     *
     * @param $numberOfSeasons IntegerSchema
     **/
    public function setNumberOfSeasons($numberOfSeasons) {
        $this->properties['numberOfSeasons'] = $numberOfSeasons;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getNumberOfSeasons() {
        return $this->properties['numberOfSeasons'];
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
     * A season in a media series.
     *
     * @param $season CreativeWorkSeasonSchema
     **/
    public function setSeason($season) {
        $this->properties['season'] = $season;

        return $this;
    }

    /**
     * @return CreativeWorkSeasonSchema
     **/
    public function getSeason() {
        return $this->properties['season'];
    }

    /**
     * A season in a media series.
     *
     * @param $seasons CreativeWorkSeasonSchema
     **/
    public function setSeasons($seasons) {
        $this->properties['seasons'] = $seasons;

        return $this;
    }

    /**
     * @return CreativeWorkSeasonSchema
     **/
    public function getSeasons() {
        return $this->properties['seasons'];
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
