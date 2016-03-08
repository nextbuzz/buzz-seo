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
 * A MusicRelease is a specific release of a music album.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MusicReleaseSchema extends MusicPlaylistSchema
{
    public static function factory()
    {
        return new MusicReleaseSchema('http://schema.org/', 'MusicRelease');
    }

    /**
     * The catalog number for the release.
     *
     * @param $catalogNumber TextSchema
     **/
    public function setCatalogNumber($catalogNumber) {
        $this->properties['catalogNumber'] = $catalogNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCatalogNumber() {
        return $this->properties['catalogNumber'];
    }

    /**
     * The group the release is credited to if different than the byArtist. For example, Red and Blue is credited to "Stefani Germanotta Band", but by Lady Gaga.
     *
     * @param $creditedTo PersonSchema|OrganizationSchema
     **/
    public function setCreditedTo($creditedTo) {
        $this->properties['creditedTo'] = $creditedTo;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getCreditedTo() {
        return $this->properties['creditedTo'];
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
     * Format of this release (the type of recording media used, ie. compact disc, digital media, LP, etc.).
     *
     * @param $musicReleaseFormat MusicReleaseFormatTypeSchema
     **/
    public function setMusicReleaseFormat($musicReleaseFormat) {
        $this->properties['musicReleaseFormat'] = $musicReleaseFormat;

        return $this;
    }

    /**
     * @return MusicReleaseFormatTypeSchema
     **/
    public function getMusicReleaseFormat() {
        return $this->properties['musicReleaseFormat'];
    }

    /**
     * The label that issued the release.
     *
     * @param $recordLabel OrganizationSchema
     **/
    public function setRecordLabel($recordLabel) {
        $this->properties['recordLabel'] = $recordLabel;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getRecordLabel() {
        return $this->properties['recordLabel'];
    }

    /**
     * The album this is a release of.
     *
     * @param $releaseOf MusicAlbumSchema
     **/
    public function setReleaseOf($releaseOf) {
        $this->properties['releaseOf'] = $releaseOf;

        return $this;
    }

    /**
     * @return MusicAlbumSchema
     **/
    public function getReleaseOf() {
        return $this->properties['releaseOf'];
    }


}
