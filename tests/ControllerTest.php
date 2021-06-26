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

use Ballybran\Core\Controller\AbstractControllerInterface;
use Ballybran\Helpers\Utility\Hash;
use PHPUnit\Framework\TestCase as PHPUnit;


class ControllerTest extends PHPUnit
{

    private $objController;

    public function setUp() : void
    {
        $this->objController = new \Ballybran\Core\Controller\AbstractController();

    }

    public function testIfControllerIsInstanciOf()
    {


        $this->assertInstanceOf(AbstractControllerInterface::class , $this->objController);
    }

    public function testClassInstance()
    {

        $this->assertInstanceOf('\Ballybran\Core\Model\Model' , $this->objController);

    }

    public function testCreateHashCript()
    {

        $string = "test1234";
        $hash = Hash::Create("MD5" , $string , "0mh2s0hay2");

        $this->assertNotFalse($hash);

    }


}