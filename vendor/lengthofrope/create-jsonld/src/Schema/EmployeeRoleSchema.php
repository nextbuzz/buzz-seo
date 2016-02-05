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
 * A subclass of OrganizationRole used to describe employee relationships.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class EmployeeRoleSchema extends OrganizationRoleSchema
{
    public static function factory()
    {
        return new EmployeeRoleSchema('http://schema.org/', 'EmployeeRole');
    }

    /**
     * The base salary of the job or of an employee in an EmployeeRole.
     *
     * @param $baseSalary NumberSchema|PriceSpecificationSchema
     **/
    public function setBaseSalary($baseSalary) {
        $this->properties['baseSalary'] = $baseSalary;

        return $this;
    }

    /**
     * @return NumberSchema|PriceSpecificationSchema
     **/
    public function getBaseSalary() {
        return $this->properties['baseSalary'];
    }

    /**
     * The currency (coded using ISO 4217, http://en.wikipedia.org/wiki/ISO_4217 ) used for the main salary information in this job posting or for this employee.
     *
     * @param $salaryCurrency TextSchema
     **/
    public function setSalaryCurrency($salaryCurrency) {
        $this->properties['salaryCurrency'] = $salaryCurrency;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSalaryCurrency() {
        return $this->properties['salaryCurrency'];
    }


}
