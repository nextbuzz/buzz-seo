<?php

namespace LengthOfRope\JSONLD;

class CreateTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test if we can instantiate the class using the new operator. This should
     * be prohibited, since we have a nice factory for all classes to support chaining.
     */
    public function testCannotBeInstantiatedExternally()
    {
        $reflection = new \ReflectionClass('\LengthOfRope\JSONLD\Create');
        $constructor = $reflection->getConstructor();
        $this->assertFalse($constructor->isPublic());
    }

    /**
     * Test if the class is an IElement
     */
    public function testIsAnIElement()
    {
        $this->assertTrue(is_a(Create::factory(), 'LengthOfRope\JSONLD\Interfaces\IElement'));
    }

    /**
     * Test if the class is an ElementGroup
     */
    public function testIsAnElementGroup()
    {
        $this->assertTrue(is_a(Create::factory(), 'LengthOfRope\JSONLD\Elements\ElementGroup'));
    }

    /**
     * Test if the getDataArray() returns an array with children
     */
    public function testReturnsADataArray()
    {
        $obj1 = Create::factory();
        $obj2 = Create::factory()->add($obj1);
        $this->assertArraySubset($obj1->getDataArray(), $obj2->getDataArray());
    }

    /**
     * Test if we can validate an empty IElement
     */
    public function testIfWeCanValidate()
    {
        $obj1 = Create::factory();

        $this->assertTrue($obj1->validate());
    }

    /**
     * Test if we can add a IElement and validate
     */
    public function testIfWeCanAddAndValidate()
    {
        $obj1 = Create::factory();
        $obj2 = Create::factory();

        $obj1->add($obj2);

        $this->assertTrue($obj1->validate());
    }

    /**
     * Test if we can add and remove an IElement
     */
    public function testIfWeCanAddAndRemoveAndValidate()
    {
        $obj1 = Create::factory();
        $obj2 = Create::factory();

        $obj1->add($obj2)->remove($obj2);

        $this->assertTrue($obj1->validate());
    }

}
