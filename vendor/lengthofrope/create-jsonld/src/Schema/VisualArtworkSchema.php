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
 * A work of art that is primarily visual in character.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class VisualArtworkSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new VisualArtworkSchema('http://schema.org/', 'VisualArtwork');
    }

    /**
     * The number of copies when multiple copies of a piece of artwork are produced - e.g. for a limited edition of 20 prints, 'artEdition' refers to the total number of copies (in this example "20").
     *
     * @param $artEdition TextSchema|IntegerSchema
     **/
    public function setArtEdition($artEdition) {
        $this->properties['artEdition'] = $artEdition;

        return $this;
    }

    /**
     * @return TextSchema|IntegerSchema
     **/
    public function getArtEdition() {
        return $this->properties['artEdition'];
    }

    /**
     * The material used. (e.g. Oil, Watercolour, Acrylic, Linoprint, Marble, Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut, Pencil, Mixed Media, etc.)
     *
     * @param $artMedium TextSchema|URLSchema
     **/
    public function setArtMedium($artMedium) {
        $this->properties['artMedium'] = $artMedium;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getArtMedium() {
        return $this->properties['artMedium'];
    }

    /**
     * e.g. Painting, Drawing, Sculpture, Print, Photograph, Assemblage, Collage, etc.
     *
     * @param $artform TextSchema|URLSchema
     **/
    public function setArtform($artform) {
        $this->properties['artform'] = $artform;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getArtform() {
        return $this->properties['artform'];
    }

    /**
     * The supporting materials for the artwork, e.g. Canvas, Paper, Wood, Board, etc.
     *
     * @param $artworkSurface TextSchema|URLSchema
     **/
    public function setArtworkSurface($artworkSurface) {
        $this->properties['artworkSurface'] = $artworkSurface;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getArtworkSurface() {
        return $this->properties['artworkSurface'];
    }

    /**
     * The depth of the item.
     *
     * @param $depth DistanceSchema|QuantitativeValueSchema
     **/
    public function setDepth($depth) {
        $this->properties['depth'] = $depth;

        return $this;
    }

    /**
     * @return DistanceSchema|QuantitativeValueSchema
     **/
    public function getDepth() {
        return $this->properties['depth'];
    }

    /**
     * The height of the item.
     *
     * @param $height DistanceSchema|QuantitativeValueSchema
     **/
    public function setHeight($height) {
        $this->properties['height'] = $height;

        return $this;
    }

    /**
     * @return DistanceSchema|QuantitativeValueSchema
     **/
    public function getHeight() {
        return $this->properties['height'];
    }

    /**
     * e.g. Oil, Watercolour, Acrylic, Linoprint, Marble, Cyanotype, Digital, Lithograph, DryPoint, Intaglio, Pastel, Woodcut, Pencil, Mixed Media, etc.
     *
     * @param $material TextSchema|URLSchema
     **/
    public function setMaterial($material) {
        $this->properties['material'] = $material;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getMaterial() {
        return $this->properties['material'];
    }

    /**
     * e.g. Canvas, Paper, Wood, Board, etc.
     *
     * @param $surface TextSchema|URLSchema
     **/
    public function setSurface($surface) {
        $this->properties['surface'] = $surface;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getSurface() {
        return $this->properties['surface'];
    }

    /**
     * The width of the item.
     *
     * @param $width DistanceSchema|QuantitativeValueSchema
     **/
    public function setWidth($width) {
        $this->properties['width'] = $width;

        return $this;
    }

    /**
     * @return DistanceSchema|QuantitativeValueSchema
     **/
    public function getWidth() {
        return $this->properties['width'];
    }


}
