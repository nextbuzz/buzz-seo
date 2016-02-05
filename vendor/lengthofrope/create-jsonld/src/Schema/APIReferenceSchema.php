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
 * Reference documentation for application programming interfaces (APIs).
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class APIReferenceSchema extends TechArticleSchema
{
    public static function factory()
    {
        return new APIReferenceSchema('http://schema.org/', 'APIReference');
    }

    /**
     * Library file name e.g., mscorlib.dll, system.web.dll.
     *
     * @param $assembly TextSchema
     **/
    public function setAssembly($assembly) {
        $this->properties['assembly'] = $assembly;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAssembly() {
        return $this->properties['assembly'];
    }

    /**
     * Associated product/technology version. e.g., .NET Framework 4.5.
     *
     * @param $assemblyVersion TextSchema
     **/
    public function setAssemblyVersion($assemblyVersion) {
        $this->properties['assemblyVersion'] = $assemblyVersion;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAssemblyVersion() {
        return $this->properties['assemblyVersion'];
    }

    /**
     * Library file name e.g., mscorlib.dll, system.web.dll.
     *
     * @param $executableLibraryName TextSchema
     **/
    public function setExecutableLibraryName($executableLibraryName) {
        $this->properties['executableLibraryName'] = $executableLibraryName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getExecutableLibraryName() {
        return $this->properties['executableLibraryName'];
    }

    /**
     * Indicates whether API is managed or unmanaged.
     *
     * @param $programmingModel TextSchema
     **/
    public function setProgrammingModel($programmingModel) {
        $this->properties['programmingModel'] = $programmingModel;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getProgrammingModel() {
        return $this->properties['programmingModel'];
    }

    /**
     * Type of app development: phone, Metro style, desktop, XBox, etc.
     *
     * @param $targetPlatform TextSchema
     **/
    public function setTargetPlatform($targetPlatform) {
        $this->properties['targetPlatform'] = $targetPlatform;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTargetPlatform() {
        return $this->properties['targetPlatform'];
    }


}
