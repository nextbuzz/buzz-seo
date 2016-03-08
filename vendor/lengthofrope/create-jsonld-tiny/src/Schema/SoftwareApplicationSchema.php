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
 * A software application.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class SoftwareApplicationSchema extends CreativeWorkSchema
{
    public static function factory()
    {
        return new SoftwareApplicationSchema('http://schema.org/', 'SoftwareApplication');
    }

    /**
     * Type of software application, e.g. "Game, Multimedia".
     *
     * @param $applicationCategory TextSchema|URLSchema
     **/
    public function setApplicationCategory($applicationCategory) {
        $this->properties['applicationCategory'] = $applicationCategory;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getApplicationCategory() {
        return $this->properties['applicationCategory'];
    }

    /**
     * Subcategory of the application, e.g. "Arcade Game".
     *
     * @param $applicationSubCategory TextSchema|URLSchema
     **/
    public function setApplicationSubCategory($applicationSubCategory) {
        $this->properties['applicationSubCategory'] = $applicationSubCategory;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getApplicationSubCategory() {
        return $this->properties['applicationSubCategory'];
    }

    /**
     * The name of the application suite to which the application belongs (e.g. Excel belongs to Office).
     *
     * @param $applicationSuite TextSchema
     **/
    public function setApplicationSuite($applicationSuite) {
        $this->properties['applicationSuite'] = $applicationSuite;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getApplicationSuite() {
        return $this->properties['applicationSuite'];
    }

    /**
     * Device required to run the application. Used in cases where a specific make/model is required to run the application.
     *
     * @param $availableOnDevice TextSchema
     **/
    public function setAvailableOnDevice($availableOnDevice) {
        $this->properties['availableOnDevice'] = $availableOnDevice;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getAvailableOnDevice() {
        return $this->properties['availableOnDevice'];
    }

    /**
     * Countries for which the application is not supported. You can also provide the two-letter ISO 3166-1 alpha-2 country code.
     *
     * @param $countriesNotSupported TextSchema
     **/
    public function setCountriesNotSupported($countriesNotSupported) {
        $this->properties['countriesNotSupported'] = $countriesNotSupported;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCountriesNotSupported() {
        return $this->properties['countriesNotSupported'];
    }

    /**
     * Countries for which the application is supported. You can also provide the two-letter ISO 3166-1 alpha-2 country code.
     *
     * @param $countriesSupported TextSchema
     **/
    public function setCountriesSupported($countriesSupported) {
        $this->properties['countriesSupported'] = $countriesSupported;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getCountriesSupported() {
        return $this->properties['countriesSupported'];
    }

    /**
     * Device required to run the application. Used in cases where a specific make/model is required to run the application.
     *
     * @param $device TextSchema
     **/
    public function setDevice($device) {
        $this->properties['device'] = $device;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getDevice() {
        return $this->properties['device'];
    }

    /**
     * If the file can be downloaded, URL to download the binary.
     *
     * @param $downloadUrl URLSchema
     **/
    public function setDownloadUrl($downloadUrl) {
        $this->properties['downloadUrl'] = $downloadUrl;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getDownloadUrl() {
        return $this->properties['downloadUrl'];
    }

    /**
     * Features or modules provided by this application (and possibly required by other applications).
     *
     * @param $featureList TextSchema|URLSchema
     **/
    public function setFeatureList($featureList) {
        $this->properties['featureList'] = $featureList;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getFeatureList() {
        return $this->properties['featureList'];
    }

    /**
     * Size of the application / package (e.g. 18MB). In the absence of a unit (MB, KB etc.), KB will be assumed.
     *
     * @param $fileSize TextSchema
     **/
    public function setFileSize($fileSize) {
        $this->properties['fileSize'] = $fileSize;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getFileSize() {
        return $this->properties['fileSize'];
    }

    /**
     * URL at which the app may be installed, if different from the URL of the item.
     *
     * @param $installUrl URLSchema
     **/
    public function setInstallUrl($installUrl) {
        $this->properties['installUrl'] = $installUrl;

        return $this;
    }

    /**
     * @return URLSchema
     **/
    public function getInstallUrl() {
        return $this->properties['installUrl'];
    }

    /**
     * Minimum memory requirements.
     *
     * @param $memoryRequirements TextSchema|URLSchema
     **/
    public function setMemoryRequirements($memoryRequirements) {
        $this->properties['memoryRequirements'] = $memoryRequirements;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getMemoryRequirements() {
        return $this->properties['memoryRequirements'];
    }

    /**
     * Operating systems supported (Windows 7, OSX 10.6, Android 1.6).
     *
     * @param $operatingSystem TextSchema
     **/
    public function setOperatingSystem($operatingSystem) {
        $this->properties['operatingSystem'] = $operatingSystem;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getOperatingSystem() {
        return $this->properties['operatingSystem'];
    }

    /**
     * Permission(s) required to run the app (for example, a mobile app may require full internet access or may run only on wifi).
     *
     * @param $permissions TextSchema
     **/
    public function setPermissions($permissions) {
        $this->properties['permissions'] = $permissions;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getPermissions() {
        return $this->properties['permissions'];
    }

    /**
     * Processor architecture required to run the application (e.g. IA64).
     *
     * @param $processorRequirements TextSchema
     **/
    public function setProcessorRequirements($processorRequirements) {
        $this->properties['processorRequirements'] = $processorRequirements;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getProcessorRequirements() {
        return $this->properties['processorRequirements'];
    }

    /**
     * Description of what changed in this version.
     *
     * @param $releaseNotes TextSchema|URLSchema
     **/
    public function setReleaseNotes($releaseNotes) {
        $this->properties['releaseNotes'] = $releaseNotes;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getReleaseNotes() {
        return $this->properties['releaseNotes'];
    }

    /**
     * Component dependency requirements for application. This includes runtime environments and shared libraries that are not included in the application distribution package, but required to run the application (Examples: DirectX, Java or .NET runtime).
     *
     * @param $requirements TextSchema|URLSchema
     **/
    public function setRequirements($requirements) {
        $this->properties['requirements'] = $requirements;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getRequirements() {
        return $this->properties['requirements'];
    }

    /**
     * A link to a screenshot image of the app.
     *
     * @param $screenshot ImageObjectSchema|URLSchema
     **/
    public function setScreenshot($screenshot) {
        $this->properties['screenshot'] = $screenshot;

        return $this;
    }

    /**
     * @return ImageObjectSchema|URLSchema
     **/
    public function getScreenshot() {
        return $this->properties['screenshot'];
    }

    /**
     * Additional content for a software application.
     *
     * @param $softwareAddOn SoftwareApplicationSchema
     **/
    public function setSoftwareAddOn($softwareAddOn) {
        $this->properties['softwareAddOn'] = $softwareAddOn;

        return $this;
    }

    /**
     * @return SoftwareApplicationSchema
     **/
    public function getSoftwareAddOn() {
        return $this->properties['softwareAddOn'];
    }

    /**
     * Software application help.
     *
     * @param $softwareHelp CreativeWorkSchema
     **/
    public function setSoftwareHelp($softwareHelp) {
        $this->properties['softwareHelp'] = $softwareHelp;

        return $this;
    }

    /**
     * @return CreativeWorkSchema
     **/
    public function getSoftwareHelp() {
        return $this->properties['softwareHelp'];
    }

    /**
     * Component dependency requirements for application. This includes runtime environments and shared libraries that are not included in the application distribution package, but required to run the application (Examples: DirectX, Java or .NET runtime).
     *
     * @param $softwareRequirements TextSchema|URLSchema
     **/
    public function setSoftwareRequirements($softwareRequirements) {
        $this->properties['softwareRequirements'] = $softwareRequirements;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getSoftwareRequirements() {
        return $this->properties['softwareRequirements'];
    }

    /**
     * Version of the software instance.
     *
     * @param $softwareVersion TextSchema
     **/
    public function setSoftwareVersion($softwareVersion) {
        $this->properties['softwareVersion'] = $softwareVersion;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getSoftwareVersion() {
        return $this->properties['softwareVersion'];
    }

    /**
     * Storage requirements (free space required).
     *
     * @param $storageRequirements TextSchema|URLSchema
     **/
    public function setStorageRequirements($storageRequirements) {
        $this->properties['storageRequirements'] = $storageRequirements;

        return $this;
    }

    /**
     * @return TextSchema|URLSchema
     **/
    public function getStorageRequirements() {
        return $this->properties['storageRequirements'];
    }

    /**
     * Supporting data for a SoftwareApplication.
     *
     * @param $supportingData DataFeedSchema
     **/
    public function setSupportingData($supportingData) {
        $this->properties['supportingData'] = $supportingData;

        return $this;
    }

    /**
     * @return DataFeedSchema
     **/
    public function getSupportingData() {
        return $this->properties['supportingData'];
    }


}
