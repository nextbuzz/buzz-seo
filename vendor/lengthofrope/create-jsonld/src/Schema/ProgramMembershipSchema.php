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
 * Used to describe membership in a loyalty programs (e.g. "StarAliance"), traveler clubs (e.g. "AAA"), purchase clubs ("Safeway Club"), etc.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class ProgramMembershipSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new ProgramMembershipSchema('http://schema.org/', 'ProgramMembership');
    }

    /**
     * The organization (airline, travelers' club, etc.) the membership is made with.
     *
     * @param $hostingOrganization OrganizationSchema
     **/
    public function setHostingOrganization($hostingOrganization) {
        $this->properties['hostingOrganization'] = $hostingOrganization;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getHostingOrganization() {
        return $this->properties['hostingOrganization'];
    }

    /**
     * A member of an Organization or a ProgramMembership. Organizations can be members of organizations; ProgramMembership is typically for individuals.
     *
     * @param $member OrganizationSchema|PersonSchema
     **/
    public function setMember($member) {
        $this->properties['member'] = $member;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getMember() {
        return $this->properties['member'];
    }

    /**
     * A member of this organization.
     *
     * @param $members OrganizationSchema|PersonSchema
     **/
    public function setMembers($members) {
        $this->properties['members'] = $members;

        return $this;
    }

    /**
     * @return OrganizationSchema|PersonSchema
     **/
    public function getMembers() {
        return $this->properties['members'];
    }

    /**
     * A unique identifier for the membership.
     *
     * @param $membershipNumber TextSchema
     **/
    public function setMembershipNumber($membershipNumber) {
        $this->properties['membershipNumber'] = $membershipNumber;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getMembershipNumber() {
        return $this->properties['membershipNumber'];
    }

    /**
     * The program providing the membership.
     *
     * @param $programName TextSchema
     **/
    public function setProgramName($programName) {
        $this->properties['programName'] = $programName;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getProgramName() {
        return $this->properties['programName'];
    }


}
