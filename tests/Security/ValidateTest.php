<?php
/**
 * KNUT7 K7F (https://marciozebedeu.com/)
 * KNUT7 K7F (tm) : Rapid Development Framework (https://marciozebedeu.com/)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @link      https://github.com/knut7/knu7 for the canonical source repository
 * @copyright (c) 2015.  KNUT7  Software Technologies AO Inc. (https://marciozebedeu.com/)
 * @license   https://marciozebedeu.com/license/new-bsd New BSD License
 * @author    Marcio Zebedeu - artphoweb@artphoweb.com
 * @version   1.0.2
 */

/**
 * Created by PhpStorm.
 * User: artphotografie
 * Date: 17/10/17
 * Time: 11:54
 */

use Ballybran\Helpers\Security\Val;
use Ballybran\Helpers\Security\Validate;
use PHPUnit\Framework\TestCase as PHPUnit;


class ValidateTest extends PHPUnit
{
    private $valid;
    private $val;


    protected function assertPreConditions(): void
    {
        $this->assertTrue(class_exists($class = 'Ballybran\Helpers\Security\Validate') , "Class $class not exist");

    }

    public function setUp() : void
    {
        $this->val = new Val();
        $this->valid = new Validate($this->val);
    }

    public function testValidIMethod()
    {
        $this->valid->setMethod("POST");
        $this->assertEquals("POST" , $this->valid->getMethod());
    }

    public function testValidInputPost()
    {
        $_POST["firstname"] = "John";
        $_POST["lastname"] = "Doe";
        $_POST["email"] = "johnDoe@gmail.com";
        $_POST["telephone"] = 244913750140;

        $this->valid->setMethod("POST");
        $this->valid->getMethod();

        $this->valid->post('firstname')->val("maxlength" , 12)
            ->post('lastname')->val('maxlength' , 20)
            ->post('email')->val('minlength' , 5)
            ->post('telephone')->val('digit' , 15)->numeric()->submit();
        $this->assertEquals(["firstname" => "John" , "lastname" => "Doe" , "email" => "johnDoe@gmail.com" , "telephone" => 244913750140] , $this->valid->getPostData());


    }

    public function testValidFields()
    {
        $_POST["firstname"] = "John";
        $_POST["lastname"] = "Doe";
        $_POST["email"] = "johnDoe@gmail.com";
        $_POST["url"] = "http://google.com";
        $_POST["domain"] = "google.com";
        $_POST["ip"] = "123.43.54.56";
        $_POST["date"] = "2018-04-18";
        $_POST["price"] = 60.000;
        $_POST["telephone"] = 244913750140;

        $this->valid->setMethod("POST");
        $this->valid->getMethod();

        $this->valid->post('firstname')->val("maxlength" , 12)->text()
            ->post('lastname')->val('maxlength' , 20)->text()
            ->post('price')->val('minlength' , 2)->numeric()
            ->post('ip')->val('minlength' , 5)->ip()
            ->post('domain')->val('minlength' , 5)->domain()
            ->post('url')->val('minlength' , 5)->url()
            ->post('date')->val('minlength' , 5)->date()
            ->post('telephone')->val('minlength' , 5)->numeric()
            ->post('email')->val('minlength' , 5)->email()->submit();


        $this->assertEquals(["firstname" => "John" , "lastname" => "Doe" , "email" => "johnDoe@gmail.com" , "telephone" => 244913750140 , "url" => "http://google.com" , "domain" => "google.com" , "ip" => "123.43.54.56" , "date" => "2018-04-18" , "price" => 60.000] , $this->valid->getPostData());


    }

    public function testValidInputGet()
    {
        $_GET["firstname"] = "John";
        $_GET["lastname"] = "Doe";
        $_GET["email"] = "johnDoe@gmail.com";
        $_GET["telephone"] = 244913750140;

        $this->valid->setMethod("GET");
        $this->valid->getMethod();

        $this->valid->post('firstname')->val("maxlength" , 12)
            ->post('lastname')->val('maxlength' , 20)
            ->post('email')->val('minlength' , 17)
            ->post('telephone')->val('digit' , 15)->submit();
        $this->assertEquals(["firstname" => "John" , "lastname" => "Doe" , "email" => "johnDoe@gmail.com" , "telephone" => 244913750140] , $this->valid->getPostData());

    }

    public function testIfValIsInstanceOfValidate()
    {

        $this->assertInstanceOf(Ballybran\Helpers\Security\Val::class , $this->val);

    }
}
