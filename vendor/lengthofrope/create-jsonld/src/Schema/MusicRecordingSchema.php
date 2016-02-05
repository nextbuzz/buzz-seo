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
 * A music recording (track), usually a single song.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MusicRecordingSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new MusicRecordingSchema('http://schema.org/', 'MusicRecording');
    }

    /**
     * The artist that performed this album or recording.
     *
     * @param $byArtist MusicGroupSchema
     **/
    public function setByArtist($byArtist) {
        $this->properties['byArtist'] = $byArtist;

        return $this;
    }

    /**
     * @return MusicGroupSchema
     **/
    public function getByArtist() {
        return $this->properties['byArtist'];
    }

    /**
     * The duration of the item (movie, audio recording, event, etc.) in <a href='http://en.wikipedia.org/wiki/ISO_8601'>ISO 8601 date format</a>.
     *
     * @param $duration DurationSchema
     **/
    public function setDuration($duration) {
        $this->properties['duration'] = $duration;

        return $this;
    }

    /**
     * @return DurationSchema
     **/
    public function getDuration() {
        return $this->properties['duration'];
    }

    /**
     * The album to which this recording belongs.
     *
     * @param $inAlbum MusicAlbumSchema
     **/
    public function setInAlbum($inAlbum) {
        $this->properties['inAlbum'] = $inAlbum;

        return $this;
    }

    /**
     * @return MusicAlbumSchema
     **/
    public function getInAlbum() {
        return $this->properties['inAlbum'];
    }

    /**
     * The playlist to which this recording belongs.
     *
     * @param $inPlaylist MusicPlaylistSchema
     **/
    public function setInPlaylist($inPlaylist) {
        $this->properties['inPlaylist'] = $inPlaylist;

        return $this;
    }

    /**
     * @return MusicPlaylistSchema
     **/
    public function getInPlaylist() {
        return $this->properties['inPlaylist'];
    }

    /**
     * The International Standard Recording Code for the recording.
     *
     * @param $isrcCode TextSchema
     **/
    public function setIsrcCode($isrcCode) {
        $this->properties['isrcCode'] = $isrcCode;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getIsrcCode() {
        return $this->properties['isrcCode'];
    }

    /**
     * The composition this track is a recording of.
     *
     * @param $recordingOf MusicCompositionSchema
     **/
    public function setRecordingOf($recordingOf) {
        $this->properties['recordingOf'] = $recordingOf;

        return $this;
    }

    /**
     * @return MusicCompositionSchema
     **/
    public function getRecordingOf() {
        return $this->properties['recordingOf'];
    }


}
