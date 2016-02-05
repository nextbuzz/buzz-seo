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
 * Computer programming source code. Example: Full (compile ready) solutions, code snippet samples, scripts, templates.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class SoftwareSourceCodeSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new SoftwareSourceCodeSchema('http://schema.org/', 'SoftwareSourceCode');
    }

    /**
     * Link to the repository where the un-compiled, human readable code and related code is located (SVN, github, CodePlex).
     *
     * @param $codeRepository URLSchema
     **/
    public function setCodeRepository($codeRepository) {
        $this->properties['codeRepository'] = $codeRepository;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getCodeRepository() {
        return $this->properties['codeRepository'];
    }

    /**
     * What type of code sample: full (compile ready) solution, code snippet, inline code, scripts, template.
     *
     * @param $codeSampleType TextSchema
     **/
    public function setCodeSampleType($codeSampleType) {
        $this->properties['codeSampleType'] = $codeSampleType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCodeSampleType() {
        return $this->properties['codeSampleType'];
    }

    /**
     * The computer programming language.
     *
     * @param $programmingLanguage LanguageSchema
     **/
    public function setProgrammingLanguage($programmingLanguage) {
        $this->properties['programmingLanguage'] = $programmingLanguage;

        return $this;
    }

    /**
     * @return LanguageSchema
     **/
    public function getProgrammingLanguage() {
        return $this->properties['programmingLanguage'];
    }

    /**
     * Runtime platform or script interpreter dependencies (Example - Java v1, Python2.3, .Net Framework 3.0).
     *
     * @param $runtime TextSchema
     **/
    public function setRuntime($runtime) {
        $this->properties['runtime'] = $runtime;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getRuntime() {
        return $this->properties['runtime'];
    }

    /**
     * Runtime platform or script interpreter dependencies (Example - Java v1, Python2.3, .Net Framework 3.0).
     *
     * @param $runtimePlatform TextSchema
     **/
    public function setRuntimePlatform($runtimePlatform) {
        $this->properties['runtimePlatform'] = $runtimePlatform;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getRuntimePlatform() {
        return $this->properties['runtimePlatform'];
    }

    /**
     * What type of sample: full (compile ready) solution, code snippet, inline code, scripts, template.
     *
     * @param $sampleType TextSchema
     **/
    public function setSampleType($sampleType) {
        $this->properties['sampleType'] = $sampleType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSampleType() {
        return $this->properties['sampleType'];
    }

    /**
     * Target Operating System / Product to which the code applies.  If applies to several versions, just the product name can be used.
     *
     * @param $targetProduct SoftwareApplicationSchema
     **/
    public function setTargetProduct($targetProduct) {
        $this->properties['targetProduct'] = $targetProduct;

        return $this;
    }

    /**
     * @return SoftwareApplicationSchema
     **/
    public function getTargetProduct() {
        return $this->properties['targetProduct'];
    }


}
