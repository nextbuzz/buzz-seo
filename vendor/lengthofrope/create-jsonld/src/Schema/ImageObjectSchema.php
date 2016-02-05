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
 * An image file.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ImageObjectSchema extends MediaObjectSchema
{
    public static function factory()
    {
        return new ImageObjectSchema('http://schema.org/', 'ImageObject');
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
     * exif data for this object.
     *
     * @param $exifData TextSchema|PropertyValueSchema
     **/
    public function setExifData($exifData) {
        $this->properties['exifData'] = $exifData;

        return $this;
    }

    /**
     * @return TextSchema|PropertyValueSchema
     **/
    public function getExifData() {
        return $this->properties['exifData'];
    }

    /**
     * Indicates whether this image is representative of the content of the page.
     *
     * @param $representativeOfPage BooleanSchema
     **/
    public function setRepresentativeOfPage($representativeOfPage) {
        $this->properties['representativeOfPage'] = $representativeOfPage;

        return $this;
    }

    /**
     * @return BooleanSchema
     **/
    public function getRepresentativeOfPage() {
        return $this->properties['representativeOfPage'];
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


}
