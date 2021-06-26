<?php
/**
 * Created by PhpStorm.
 * User: macbookpro
 * Date: 06/04/18
 * Time: 15:58
 */

use PHPUnit\Framework\TestCase as PHPUnit;

class SessionTest extends PHPUnit
{

    public function testGetUserSession()
    {
        $user = \Ballybran\Helpers\Security\Session::set("U_NAME" , "John Doe");

        $this->assertEquals("John Doe" , $user);

    }

    public function testsetUserSession()
    {
        $user = \Ballybran\Helpers\Security\Session::set("U_NAME" , "John Doe Other");
        $this->assertEquals("John Doe Other" , $user);


    }

    public function tearDown(): void
    {
        \Ballybran\Helpers\Security\Session::Destroy();
    }

}