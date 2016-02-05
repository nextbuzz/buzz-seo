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
 * A listing that describes a job opening in a certain organization.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class JobPostingSchema extends IntangibleSchema
{
    public static function factory()
    {
        return new JobPostingSchema('http://schema.org/', 'JobPosting');
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
     * Description of benefits associated with the job.
     *
     * @param $benefits TextSchema
     **/
    public function setBenefits($benefits) {
        $this->properties['benefits'] = $benefits;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getBenefits() {
        return $this->properties['benefits'];
    }

    /**
     * Publication date for the job posting.
     *
     * @param $datePosted DateSchema
     **/
    public function setDatePosted($datePosted) {
        $this->properties['datePosted'] = $datePosted;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getDatePosted() {
        return $this->properties['datePosted'];
    }

    /**
     * Educational background needed for the position.
     *
     * @param $educationRequirements TextSchema
     **/
    public function setEducationRequirements($educationRequirements) {
        $this->properties['educationRequirements'] = $educationRequirements;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getEducationRequirements() {
        return $this->properties['educationRequirements'];
    }

    /**
     * Type of employment (e.g. full-time, part-time, contract, temporary, seasonal, internship).
     *
     * @param $employmentType TextSchema
     **/
    public function setEmploymentType($employmentType) {
        $this->properties['employmentType'] = $employmentType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getEmploymentType() {
        return $this->properties['employmentType'];
    }

    /**
     * Description of skills and experience needed for the position.
     *
     * @param $experienceRequirements TextSchema
     **/
    public function setExperienceRequirements($experienceRequirements) {
        $this->properties['experienceRequirements'] = $experienceRequirements;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getExperienceRequirements() {
        return $this->properties['experienceRequirements'];
    }

    /**
     * Organization offering the job position.
     *
     * @param $hiringOrganization OrganizationSchema
     **/
    public function setHiringOrganization($hiringOrganization) {
        $this->properties['hiringOrganization'] = $hiringOrganization;

        return $this;
    }

    /**
     * @return OrganizationSchema
     **/
    public function getHiringOrganization() {
        return $this->properties['hiringOrganization'];
    }

    /**
     * Description of bonus and commission compensation aspects of the job.
     *
     * @param $incentiveCompensation TextSchema
     **/
    public function setIncentiveCompensation($incentiveCompensation) {
        $this->properties['incentiveCompensation'] = $incentiveCompensation;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getIncentiveCompensation() {
        return $this->properties['incentiveCompensation'];
    }

    /**
     * Description of bonus and commission compensation aspects of the job.
     *
     * @param $incentives TextSchema
     **/
    public function setIncentives($incentives) {
        $this->properties['incentives'] = $incentives;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getIncentives() {
        return $this->properties['incentives'];
    }

    /**
     * The industry associated with the job position.
     *
     * @param $industry TextSchema
     **/
    public function setIndustry($industry) {
        $this->properties['industry'] = $industry;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getIndustry() {
        return $this->properties['industry'];
    }

    /**
     * Description of benefits associated with the job.
     *
     * @param $jobBenefits TextSchema
     **/
    public function setJobBenefits($jobBenefits) {
        $this->properties['jobBenefits'] = $jobBenefits;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getJobBenefits() {
        return $this->properties['jobBenefits'];
    }

    /**
     * A (typically single) geographic location associated with the job position.
     *
     * @param $jobLocation PlaceSchema
     **/
    public function setJobLocation($jobLocation) {
        $this->properties['jobLocation'] = $jobLocation;

        return $this;
    }

    /**
     * @return PlaceSchema
     **/
    public function getJobLocation() {
        return $this->properties['jobLocation'];
    }

    /**
     * Category or categories describing the job. Use BLS O*NET-SOC taxonomy: http://www.onetcenter.org/taxonomy.html. Ideally includes textual label and formal code, with the property repeated for each applicable value.
     *
     * @param $occupationalCategory TextSchema
     **/
    public function setOccupationalCategory($occupationalCategory) {
        $this->properties['occupationalCategory'] = $occupationalCategory;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getOccupationalCategory() {
        return $this->properties['occupationalCategory'];
    }

    /**
     * Specific qualifications required for this role.
     *
     * @param $qualifications TextSchema
     **/
    public function setQualifications($qualifications) {
        $this->properties['qualifications'] = $qualifications;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getQualifications() {
        return $this->properties['qualifications'];
    }

    /**
     * Responsibilities associated with this role.
     *
     * @param $responsibilities TextSchema
     **/
    public function setResponsibilities($responsibilities) {
        $this->properties['responsibilities'] = $responsibilities;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getResponsibilities() {
        return $this->properties['responsibilities'];
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

    /**
     * Skills required to fulfill this role.
     *
     * @param $skills TextSchema
     **/
    public function setSkills($skills) {
        $this->properties['skills'] = $skills;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSkills() {
        return $this->properties['skills'];
    }

    /**
     * Any special commitments associated with this job posting. Valid entries include VeteranCommit, MilitarySpouseCommit, etc.
     *
     * @param $specialCommitments TextSchema
     **/
    public function setSpecialCommitments($specialCommitments) {
        $this->properties['specialCommitments'] = $specialCommitments;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSpecialCommitments() {
        return $this->properties['specialCommitments'];
    }

    /**
     * The title of the job.
     *
     * @param $title TextSchema
     **/
    public function setTitle($title) {
        $this->properties['title'] = $title;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getTitle() {
        return $this->properties['title'];
    }

    /**
     * The typical working hours for this job (e.g. 1st shift, night shift, 8am-5pm).
     *
     * @param $workHours TextSchema
     **/
    public function setWorkHours($workHours) {
        $this->properties['workHours'] = $workHours;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getWorkHours() {
        return $this->properties['workHours'];
    }


}
