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
 * A <a href="/VideoGame">video game</a> series.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class VideoGameSeriesSchema extends CreativeWorkSeriesSchema
{
    public static function factory()
    {
        return new VideoGameSeriesSchema('http://schema.org/', 'VideoGameSeries');
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
     * A piece of data that represents a particular aspect of a fictional character (skill, power, character points, advantage, disadvantage).
     *
     * @param $characterAttribute ThingSchema
     **/
    public function setCharacterAttribute($characterAttribute) {
        $this->properties['characterAttribute'] = $characterAttribute;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getCharacterAttribute() {
        return $this->properties['characterAttribute'];
    }

    /**
     * Cheat codes to the game.
     *
     * @param $cheatCode CreativeWorkSchema
     **/
    public function setCheatCode($cheatCode) {
        $this->properties['cheatCode'] = $cheatCode;

        return $this;
    }

    /**
     * @return CreativeWorkSchema
     **/
    public function getCheatCode() {
        return $this->properties['cheatCode'];
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
     * An item is an object within the game world that can be collected by a player or, occasionally, a non-player character.
     *
     * @param $gameItem ThingSchema
     **/
    public function setGameItem($gameItem) {
        $this->properties['gameItem'] = $gameItem;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getGameItem() {
        return $this->properties['gameItem'];
    }

    /**
     * Real or fictional location of the game (or part of game).
     *
     * @param $gameLocation URLSchema|PlaceSchema|PostalAddressSchema
     **/
    public function setGameLocation($gameLocation) {
        $this->properties['gameLocation'] = $gameLocation;

        return $this;
    }

    /**
     * @return URLSchema|PlaceSchema|PostalAddressSchema
     **/
    public function getGameLocation() {
        return $this->properties['gameLocation'];
    }

    /**
     * The electronic systems used to play <a href="http://en.wikipedia.org/wiki/Category:Video_game_platforms">video games</a>.
     *
     * @param $gamePlatform TextSchema|URLSchema|ThingSchema
     **/
    public function setGamePlatform($gamePlatform) {
        $this->properties['gamePlatform'] = $gamePlatform;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema|ThingSchema
     **/
    public function getGamePlatform() {
        return $this->properties['gamePlatform'];
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
     * Indicate how many people can play this game (minimum, maximum, or range).
     *
     * @param $numberOfPlayers QuantitativeValueSchema
     **/
    public function setNumberOfPlayers($numberOfPlayers) {
        $this->properties['numberOfPlayers'] = $numberOfPlayers;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getNumberOfPlayers() {
        return $this->properties['numberOfPlayers'];
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
     * Indicates whether this game is multi-player, co-op or single-player.  The game can be marked as multi-player, co-op and single-player at the same time.
     *
     * @param $playMode GamePlayModeSchema
     **/
    public function setPlayMode($playMode) {
        $this->properties['playMode'] = $playMode;

        return $this;
    }

    /**
     * @return GamePlayModeSchema
     **/
    public function getPlayMode() {
        return $this->properties['playMode'];
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
     * The task that a player-controlled character, or group of characters may complete in order to gain a reward.
     *
     * @param $quest ThingSchema
     **/
    public function setQuest($quest) {
        $this->properties['quest'] = $quest;

        return $this;
    }

    /**
     * @return ThingSchema
     **/
    public function getQuest() {
        return $this->properties['quest'];
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
