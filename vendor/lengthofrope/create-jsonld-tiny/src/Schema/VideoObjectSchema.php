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
 * A video file.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class VideoObjectSchema extends MediaObjectSchema
{
    public static function factory()
    {
        return new VideoObjectSchema('http://schema.org/', 'VideoObject');
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
     * The caption for this object.
     *
     * @param $caption TextSchema
     **/
    public function setCaption($caption) {
        $this->properties['caption'] = $caption;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCaption() {
        return $this->properties['caption'];
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
     * Thumbnail image for an image or video.
     *
     * @param $thumbnail ImageObjectSchema
     **/
    public function setThumbnail($thumbnail) {
        $this->properties['thumbnail'] = $thumbnail;

        return $this;
    }

    /**
     * @return ImageObjectSchema
     **/
    public function getThumbnail() {
        return $this->properties['thumbnail'];
    }

    /**
     * If this MediaObject is an AudioObject or VideoObject, the transcript of that object.
     *
     * @param $transcript TextSchema
     **/
    public function setTranscript($transcript) {
        $this->properties['transcript'] = $transcript;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTranscript() {
        return $this->properties['transcript'];
    }

    /**
     * The frame size of the video.
     *
     * @param $videoFrameSize TextSchema
     **/
    public function setVideoFrameSize($videoFrameSize) {
        $this->properties['videoFrameSize'] = $videoFrameSize;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getVideoFrameSize() {
        return $this->properties['videoFrameSize'];
    }

    /**
     * The quality of the video.
     *
     * @param $videoQuality TextSchema
     **/
    public function setVideoQuality($videoQuality) {
        $this->properties['videoQuality'] = $videoQuality;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getVideoQuality() {
        return $this->properties['videoQuality'];
    }


}
