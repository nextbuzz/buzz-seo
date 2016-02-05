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
 * A collection of music tracks.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MusicAlbumSchema extends MusicPlaylistSchema
{
    public static function factory()
    {
        return new MusicAlbumSchema('http://schema.org/', 'MusicAlbum');
    }

    /**
     * Classification of the album by it's type of content: soundtrack, live album, studio album, etc.
     *
     * @param $albumProductionType MusicAlbumProductionTypeSchema
     **/
    public function setAlbumProductionType($albumProductionType) {
        $this->properties['albumProductionType'] = $albumProductionType;

        return $this;
    }

    /**
     * @return MusicAlbumProductionTypeSchema
     **/
    public function getAlbumProductionType() {
        return $this->properties['albumProductionType'];
    }

    /**
     * A release of this album.
     *
     * @param $albumRelease MusicReleaseSchema
     **/
    public function setAlbumRelease($albumRelease) {
        $this->properties['albumRelease'] = $albumRelease;

        return $this;
    }

    /**
     * @return MusicReleaseSchema
     **/
    public function getAlbumRelease() {
        return $this->properties['albumRelease'];
    }

    /**
     * The kind of release which this album is: single, EP or album.
     *
     * @param $albumReleaseType MusicAlbumReleaseTypeSchema
     **/
    public function setAlbumReleaseType($albumReleaseType) {
        $this->properties['albumReleaseType'] = $albumReleaseType;

        return $this;
    }

    /**
     * @return MusicAlbumReleaseTypeSchema
     **/
    public function getAlbumReleaseType() {
        return $this->properties['albumReleaseType'];
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


}
