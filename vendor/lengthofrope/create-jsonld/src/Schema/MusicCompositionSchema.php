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
 * A musical composition.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class MusicCompositionSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new MusicCompositionSchema('http://schema.org/', 'MusicComposition');
    }

    /**
     * The person or organization who wrote the composition.
     *
     * @param $composer PersonSchema|OrganizationSchema
     **/
    public function setComposer($composer) {
        $this->properties['composer'] = $composer;

        return $this;
    }

    /**
     * @return PersonSchema|OrganizationSchema
     **/
    public function getComposer() {
        return $this->properties['composer'];
    }

    /**
     * The date and place the work was first performed.
     *
     * @param $firstPerformance EventSchema
     **/
    public function setFirstPerformance($firstPerformance) {
        $this->properties['firstPerformance'] = $firstPerformance;

        return $this;
    }

    /**
     * @return EventSchema
     **/
    public function getFirstPerformance() {
        return $this->properties['firstPerformance'];
    }

    /**
     * Smaller compositions included in this work (e.g. a movement in a symphony).
     *
     * @param $includedComposition MusicCompositionSchema
     **/
    public function setIncludedComposition($includedComposition) {
        $this->properties['includedComposition'] = $includedComposition;

        return $this;
    }

    /**
     * @return MusicCompositionSchema
     **/
    public function getIncludedComposition() {
        return $this->properties['includedComposition'];
    }

    /**
     * The International Standard Musical Work Code for the composition.
     *
     * @param $iswcCode TextSchema
     **/
    public function setIswcCode($iswcCode) {
        $this->properties['iswcCode'] = $iswcCode;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getIswcCode() {
        return $this->properties['iswcCode'];
    }

    /**
     * The person who wrote the words.
     *
     * @param $lyricist PersonSchema
     **/
    public function setLyricist($lyricist) {
        $this->properties['lyricist'] = $lyricist;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getLyricist() {
        return $this->properties['lyricist'];
    }

    /**
     * The words in the song.
     *
     * @param $lyrics CreativeWorkSchema
     **/
    public function setLyrics($lyrics) {
        $this->properties['lyrics'] = $lyrics;

        return $this;
    }

    /**
     * @return CreativeWorkSchema
     **/
    public function getLyrics() {
        return $this->properties['lyrics'];
    }

    /**
     * An arrangement derived from the composition.
     *
     * @param $musicArrangement MusicCompositionSchema
     **/
    public function setMusicArrangement($musicArrangement) {
        $this->properties['musicArrangement'] = $musicArrangement;

        return $this;
    }

    /**
     * @return MusicCompositionSchema
     **/
    public function getMusicArrangement() {
        return $this->properties['musicArrangement'];
    }

    /**
     * The type of composition (e.g. overture, sonata, symphony, etc.).
     *
     * @param $musicCompositionForm TextSchema
     **/
    public function setMusicCompositionForm($musicCompositionForm) {
        $this->properties['musicCompositionForm'] = $musicCompositionForm;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getMusicCompositionForm() {
        return $this->properties['musicCompositionForm'];
    }

    /**
     * The key, mode, or scale this composition uses.
     *
     * @param $musicalKey TextSchema
     **/
    public function setMusicalKey($musicalKey) {
        $this->properties['musicalKey'] = $musicalKey;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getMusicalKey() {
        return $this->properties['musicalKey'];
    }

    /**
     * An audio recording of the work.
     *
     * @param $recordedAs MusicRecordingSchema
     **/
    public function setRecordedAs($recordedAs) {
        $this->properties['recordedAs'] = $recordedAs;

        return $this;
    }

    /**
     * @return MusicRecordingSchema
     **/
    public function getRecordedAs() {
        return $this->properties['recordedAs'];
    }


}
