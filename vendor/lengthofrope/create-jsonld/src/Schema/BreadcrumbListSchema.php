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
 * 
      A BreadcrumbList is an ItemList consisting of a chain of linked Web pages, typically described using at least their URL and their name, and typically ending with the current page.
      <br />
      <br />
      The 'position' property is used to reconstruct the order of the items in a BreadcrumbList.
      The convention is that a breadcrumb list has an itemListOrder of ItemListOrderAscending (lower values listed first), and that the
      first items in this list correspond to the "top" or beginning of the breadcrumb trail, e.g. with a site or section homepage.
      The specific values of 'position' are not assigned meaning for a BreadcrumbList, but they should be integers, e.g. beginning
      with '1' for the first item in the list.
      
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class BreadcrumbListSchema extends ItemListSchema
{
    public static function factory()
    {
        return new BreadcrumbListSchema('http://schema.org/', 'BreadcrumbList');
    }


}
