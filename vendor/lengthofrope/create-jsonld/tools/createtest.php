<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use \LengthOfRope\JSONLD;
use \LengthOfRope\JSONLD\Schema;

$Create = JSONLD\Create::factory()->add(
    Schema\BookSchema::factory()
        ->setAuthor(Schema\PersonSchema::factory()->setName("Bas de Kort")->setEmail("bdekort@gmail.com"))
        ->setAbout("PHP")
        ->setName("Superb PHP Book")
        ->setAlternateName("Book one of three")
)->add(
    Schema\OrganizationSchema::factory()
        ->setAddress(
            Schema\PostalAddressSchema::factory()
                ->setPostalCode("1234 AA")
                ->setStreetAddress("Somewhere 12")
                ->setAddressCountry("NL")
                ->setAddressLocality("Amersfoort")
                ->setEmail("info@lengthofrope.nl")
                ->setTelephone("033-1234567")
                ->setAddressRegion("Utrecht")
        )
        ->setName("LengthOfRope")
        ->setDescription("Just another developer")
);

//echo "<pre>";
//print_r($Create->getDataArray());
print_r($Create->getJSONLDScript());
