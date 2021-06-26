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
 * Time: 11:39
 */

use Ballybran\Helpers\Security\Val;
use PHPUnit\Framework\TestCase as PHPUnit;

class ValTest extends PHPUnit
{
    private $val;

    public function setUp(): void
    {
        $this->val = new Val();
    }

    public function testValMaxLength()
    {
        $max = $this->val->maxlength("IT IS A TEST" , 12);
        $val = strlen("IT IS A TEST") > 12;


        $this->assertEquals($val , $max);

    }

    public function testValMinLength()
    {
        $max = $this->val->minlength("IT IS A TEST" , 12);
        $val = strlen("IT IS A TESTES") < 12;

        $this->assertEquals($val , $max);

    }


    public function testValDigit()
    {
        $max = $this->val->digit('1');
        $val = strlen("IT IS A TESTES") < 12;

        $this->assertEquals($val , $max);

    }
}
