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
 * A book.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class BookSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new BookSchema('http://schema.org/', 'Book');
    }

    /**
     * The edition of the book.
     *
     * @param $bookEdition TextSchema
     **/
    public function setBookEdition($bookEdition) {
        $this->properties['bookEdition'] = $bookEdition;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getBookEdition() {
        return $this->properties['bookEdition'];
    }

    /**
     * The format of the book.
     *
     * @param $bookFormat BookFormatTypeSchema
     **/
    public function setBookFormat($bookFormat) {
        $this->properties['bookFormat'] = $bookFormat;

        return $this;
    }

    /**
     * @return BookFormatTypeSchema
     **/
    public function getBookFormat() {
        return $this->properties['bookFormat'];
    }

    /**
     * The illustrator of the book.
     *
     * @param $illustrator PersonSchema
     **/
    public function setIllustrator($illustrator) {
        $this->properties['illustrator'] = $illustrator;

        return $this;
    }

    /**
     * @return PersonSchema
     **/
    public function getIllustrator() {
        return $this->properties['illustrator'];
    }

    /**
     * The ISBN of the book.
     *
     * @param $isbn TextSchema
     **/
    public function setIsbn($isbn) {
        $this->properties['isbn'] = $isbn;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getIsbn() {
        return $this->properties['isbn'];
    }

    /**
     * The number of pages in the book.
     *
     * @param $numberOfPages IntegerSchema
     **/
    public function setNumberOfPages($numberOfPages) {
        $this->properties['numberOfPages'] = $numberOfPages;

        return $this;
    }

    /**
     * @return IntegerSchema
     **/
    public function getNumberOfPages() {
        return $this->properties['numberOfPages'];
    }


}
