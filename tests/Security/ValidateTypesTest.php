<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 06/04/18
 * Time: 20:31
 */

use PHPUnit\Framework\TestCase as PHPUnit;

class ValidateTypesTest extends PHPUnit
{


    protected function assertPreConditions() : void
    {
        $this->assertTrue(class_exists($class = '\Ballybran\Helpers\Security\ValidateTypes') , 'Classe Not Faund');
    }

    public function testValidateTypesStringReturn()
    {
        $val = \Ballybran\Helpers\Security\ValidateTypes::getSQLValueString('IT IS A TEST' , 'text' , '0');

        $this->assertEquals('IT IS A TEST' , $val);


    }

    public function testValidateTypesIntReturn()
    {
        $val = \Ballybran\Helpers\Security\ValidateTypes::getSQLValueString(1234 , 'int' , '0');

        $this->assertEquals(1234 , $val);

    }

    public function testValidateTypesEmailReturn()
    {
        $val = \Ballybran\Helpers\Security\ValidateTypes::getSQLValueString("joehdoe@gmail.com" , 'email' , '0');

        $this->assertEquals('joehdoe@gmail.com' , $val);

    }

    public function testValidateTypesLongReturn()
    {
        $val = \Ballybran\Helpers\Security\ValidateTypes::getSQLValueString(123456 , 'long' , '0');

        $this->assertEquals(123456 , $val);

    }

    public function testValidateTypesDoubleReturn()
    {
        $val = \Ballybran\Helpers\Security\ValidateTypes::getSQLValueString(12.345 , 'floatval' , '0');

        $this->assertEquals(12.345 , $val);

    }

    public function testValidateTypesDateReturn()
    {
        $val = \Ballybran\Helpers\Security\ValidateTypes::getSQLValueString("2000-01-01" , 'date' , '0');

        $this->assertEquals("2000-01-01" , $val);

    }

    public function testValidateTypesDefinedReturn()
    {
        $val = \Ballybran\Helpers\Security\ValidateTypes::getSQLValueString("" , 'defined' , "" , "not defined");

        $this->assertEquals("not defined" , $val);

    }
}