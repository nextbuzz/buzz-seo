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
 * A vehicle is a device that is designed or used to transport people or cargo over land, water, air, or through space.
 *
 * @author LengthOfRope, Bas de Kort <bdekort@gmail.com>
 **/
class VehicleSchema extends ProductSchema
{
    public static function factory()
    {
        return new VehicleSchema('http://schema.org/', 'Vehicle');
    }

    /**
     * The available volume for cargo or luggage. For automobiles, this is usually the trunk volume.<br />
Typical unit code(s): LTR for liters, FTQ for cubic foot/feet<br />

Note: You can use <a href="minValue">minValue</a> and <a href="maxValue">maxValue</a> to indicate ranges.
     *
     * @param $cargoVolume QuantitativeValueSchema
     **/
    public function setCargoVolume($cargoVolume) {
        $this->properties['cargoVolume'] = $cargoVolume;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getCargoVolume() {
        return $this->properties['cargoVolume'];
    }

    /**
     * The date of the first registration of the vehicle with the respective public authorities.
     *
     * @param $dateVehicleFirstRegistered DateSchema
     **/
    public function setDateVehicleFirstRegistered($dateVehicleFirstRegistered) {
        $this->properties['dateVehicleFirstRegistered'] = $dateVehicleFirstRegistered;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getDateVehicleFirstRegistered() {
        return $this->properties['dateVehicleFirstRegistered'];
    }

    /**
     * The drive wheel configuration, i.e. which roadwheels will receive torque from the vehicle's engine via the drivetrain.
     *
     * @param $driveWheelConfiguration DriveWheelConfigurationValueSchema|TextSchema
     **/
    public function setDriveWheelConfiguration($driveWheelConfiguration) {
        $this->properties['driveWheelConfiguration'] = $driveWheelConfiguration;

        return $this;
    }

    /**
     * @return DriveWheelConfigurationValueSchema|TextSchema
     **/
    public function getDriveWheelConfiguration() {
        return $this->properties['driveWheelConfiguration'];
    }

    /**
     * The amount of fuel consumed for traveling a particular distance or temporal duration with the given vehicle (e.g. liters per 100 km).<br />
Note 1: There are unfortunately no standard unit codes for liters per 100 km.<br />
Use <a href="unitText">unitText</a> to indicate the unit of measurement, e.g. L/100 km.
Note 2: There are two ways of indicating the fuel consumption, <a href="fuelConsumption">fuelConsumption</a> (e.g. 8 liters per 100 km) and <a href="fuelEfficiency">fuelEfficiency</a> (e.g. 30 miles per gallon). They are reciprocal.<br />
Note 3: Often, the absolute value is useful only when related to driving speed ("at 80 km/h") or usage pattern ("city traffic"). You can use <a href="valueReference">valueReference</a> to link the value for the fuel consumption to another value.
     *
     * @param $fuelConsumption QuantitativeValueSchema
     **/
    public function setFuelConsumption($fuelConsumption) {
        $this->properties['fuelConsumption'] = $fuelConsumption;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getFuelConsumption() {
        return $this->properties['fuelConsumption'];
    }

    /**
     * The distance traveled per unit of fuel used; most commonly miles per gallon (mpg) or kilometers per liter (km/L).<br />
Note 1: There are unfortunately no standard unit codes for miles per gallon or kilometers per liter.<br />
Use <a href="unitText">unitText</a> to indicate the unit of measurement, e.g. mpg or km/L.
Note 2: There are two ways of indicating the fuel consumption, <a href="fuelConsumption">fuelConsumption</a> (e.g. 8 liters per 100 km) and <a href="fuelEfficiency">fuelEfficiency</a> (e.g. 30 miles per gallon). They are reciprocal.<br />
Note 3: Often, the absolute value is useful only when related to driving speed ("at 80 km/h") or usage pattern ("city traffic"). You can use <a href="valueReference">valueReference</a> to link the value for the fuel economy to another value.
     *
     * @param $fuelEfficiency QuantitativeValueSchema
     **/
    public function setFuelEfficiency($fuelEfficiency) {
        $this->properties['fuelEfficiency'] = $fuelEfficiency;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getFuelEfficiency() {
        return $this->properties['fuelEfficiency'];
    }

    /**
     * The type of fuel suitable for the engine or engines of the vehicle. If the vehicle has only one engine, this property can be attached directly to the vehicle.
     *
     * @param $fuelType TextSchema|QualitativeValueSchema|URLSchema
     **/
    public function setFuelType($fuelType) {
        $this->properties['fuelType'] = $fuelType;

        return $this;
    }

    /**
     * @return TextSchema|QualitativeValueSchema|URLSchema
     **/
    public function getFuelType() {
        return $this->properties['fuelType'];
    }

    /**
     * A textual description of known damages, both repaired and unrepaired.
     *
     * @param $knownVehicleDamages TextSchema
     **/
    public function setKnownVehicleDamages($knownVehicleDamages) {
        $this->properties['knownVehicleDamages'] = $knownVehicleDamages;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getKnownVehicleDamages() {
        return $this->properties['knownVehicleDamages'];
    }

    /**
     * The total distance travelled by the particular vehicle since its initial production, as read from its odometer.<br />
Typical unit code(s): KMT for kilometers, SMI for statute miles
     *
     * @param $mileageFromOdometer QuantitativeValueSchema
     **/
    public function setMileageFromOdometer($mileageFromOdometer) {
        $this->properties['mileageFromOdometer'] = $mileageFromOdometer;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema
     **/
    public function getMileageFromOdometer() {
        return $this->properties['mileageFromOdometer'];
    }

    /**
     * The number or type of airbags in the vehicle.
     *
     * @param $numberOfAirbags NumberSchema|TextSchema
     **/
    public function setNumberOfAirbags($numberOfAirbags) {
        $this->properties['numberOfAirbags'] = $numberOfAirbags;

        return $this;
    }

    /**
     * @return NumberSchema|TextSchema
     **/
    public function getNumberOfAirbags() {
        return $this->properties['numberOfAirbags'];
    }

    /**
     * The number of axles.<br />
Typical unit code(s): C62
     *
     * @param $numberOfAxles QuantitativeValueSchema|NumberSchema
     **/
    public function setNumberOfAxles($numberOfAxles) {
        $this->properties['numberOfAxles'] = $numberOfAxles;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema|NumberSchema
     **/
    public function getNumberOfAxles() {
        return $this->properties['numberOfAxles'];
    }

    /**
     * The number of doors.<br />
Typical unit code(s): C62
     *
     * @param $numberOfDoors QuantitativeValueSchema|NumberSchema
     **/
    public function setNumberOfDoors($numberOfDoors) {
        $this->properties['numberOfDoors'] = $numberOfDoors;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema|NumberSchema
     **/
    public function getNumberOfDoors() {
        return $this->properties['numberOfDoors'];
    }

    /**
     * The total number of forward gears available for the transmission system of the vehicle.<br />
Typical unit code(s): C62
     *
     * @param $numberOfForwardGears QuantitativeValueSchema|NumberSchema
     **/
    public function setNumberOfForwardGears($numberOfForwardGears) {
        $this->properties['numberOfForwardGears'] = $numberOfForwardGears;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema|NumberSchema
     **/
    public function getNumberOfForwardGears() {
        return $this->properties['numberOfForwardGears'];
    }

    /**
     * The number of owners of the vehicle, including the current one.<br />
Typical unit code(s): C62
     *
     * @param $numberOfPreviousOwners QuantitativeValueSchema|NumberSchema
     **/
    public function setNumberOfPreviousOwners($numberOfPreviousOwners) {
        $this->properties['numberOfPreviousOwners'] = $numberOfPreviousOwners;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema|NumberSchema
     **/
    public function getNumberOfPreviousOwners() {
        return $this->properties['numberOfPreviousOwners'];
    }

    /**
     * The date of production of the item, e.g. vehicle.
     *
     * @param $productionDate DateSchema
     **/
    public function setProductionDate($productionDate) {
        $this->properties['productionDate'] = $productionDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getProductionDate() {
        return $this->properties['productionDate'];
    }

    /**
     * The date the item e.g. vehicle was purchased by the current owner.
     *
     * @param $purchaseDate DateSchema
     **/
    public function setPurchaseDate($purchaseDate) {
        $this->properties['purchaseDate'] = $purchaseDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getPurchaseDate() {
        return $this->properties['purchaseDate'];
    }

    /**
     * The position of the steering wheel or similar device (mostly for cars).
     *
     * @param $steeringPosition SteeringPositionValueSchema
     **/
    public function setSteeringPosition($steeringPosition) {
        $this->properties['steeringPosition'] = $steeringPosition;

        return $this;
    }

    /**
     * @return SteeringPositionValueSchema
     **/
    public function getSteeringPosition() {
        return $this->properties['steeringPosition'];
    }

    /**
     * A short text indicating the configuration of the vehicle, e.g. '5dr hatchback ST 2.5 MT 225 hp' or 'limited edition'.
     *
     * @param $vehicleConfiguration TextSchema
     **/
    public function setVehicleConfiguration($vehicleConfiguration) {
        $this->properties['vehicleConfiguration'] = $vehicleConfiguration;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getVehicleConfiguration() {
        return $this->properties['vehicleConfiguration'];
    }

    /**
     * Information about the engine or engines of the vehicle.
     *
     * @param $vehicleEngine EngineSpecificationSchema
     **/
    public function setVehicleEngine($vehicleEngine) {
        $this->properties['vehicleEngine'] = $vehicleEngine;

        return $this;
    }

    /**
     * @return EngineSpecificationSchema
     **/
    public function getVehicleEngine() {
        return $this->properties['vehicleEngine'];
    }

    /**
     * The Vehicle Identification Number (VIN) is a unique serial number used by the automotive industry to identify individual motor vehicles.
     *
     * @param $vin TextSchema
     **/
    public function setVin($vin) {
        $this->properties['vin'] = $vin;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getVin() {
        return $this->properties['vin'];
    }

    /**
     * The color or color combination of the interior of the vehicle.
     *
     * @param $vehicleInteriorColor TextSchema
     **/
    public function setVehicleInteriorColor($vehicleInteriorColor) {
        $this->properties['vehicleInteriorColor'] = $vehicleInteriorColor;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getVehicleInteriorColor() {
        return $this->properties['vehicleInteriorColor'];
    }

    /**
     * The type or material of the interior of the vehicle (e.g. synthetic fabric, leather, wood, etc.). While most interior types are characterized by the material used, an interior type can also be based on vehicle usage or target audience.
     *
     * @param $vehicleInteriorType TextSchema
     **/
    public function setVehicleInteriorType($vehicleInteriorType) {
        $this->properties['vehicleInteriorType'] = $vehicleInteriorType;

        return $this;
    }

    /**
     * @return TextSchema
     **/
    public function getVehicleInteriorType() {
        return $this->properties['vehicleInteriorType'];
    }

    /**
     * The release date of a vehicle model (often used to differentiate versions of the same make and model).
     *
     * @param $vehicleModelDate DateSchema
     **/
    public function setVehicleModelDate($vehicleModelDate) {
        $this->properties['vehicleModelDate'] = $vehicleModelDate;

        return $this;
    }

    /**
     * @return DateSchema
     **/
    public function getVehicleModelDate() {
        return $this->properties['vehicleModelDate'];
    }

    /**
     * The number of passengers that can be seated in the vehicle, both in terms of the physical space available, and in terms of limitations set by law.<br />
Typical unit code(s): C62 for persons.
     *
     * @param $vehicleSeatingCapacity QuantitativeValueSchema|NumberSchema
     **/
    public function setVehicleSeatingCapacity($vehicleSeatingCapacity) {
        $this->properties['vehicleSeatingCapacity'] = $vehicleSeatingCapacity;

        return $this;
    }

    /**
     * @return QuantitativeValueSchema|NumberSchema
     **/
    public function getVehicleSeatingCapacity() {
        return $this->properties['vehicleSeatingCapacity'];
    }

    /**
     * The type of component used for transmitting the power from a rotating power source to the wheels or other relevant component(s) ("gearbox" for cars).
     *
     * @param $vehicleTransmission TextSchema|QualitativeValueSchema|URLSchema
     **/
    public function setVehicleTransmission($vehicleTransmission) {
        $this->properties['vehicleTransmission'] = $vehicleTransmission;

        return $this;
    }

    /**
     * @return TextSchema|QualitativeValueSchema|URLSchema
     **/
    public function getVehicleTransmission() {
        return $this->properties['vehicleTransmission'];
    }


}
