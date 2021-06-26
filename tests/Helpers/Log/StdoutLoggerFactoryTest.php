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
 * @version   1.0.7
 */

use PHPUnit\Framework\TestCase as PHPUnit;

class StdoutLoggerFactoryTest extends PHPUnit
{
    const DIR_LOGS = '';
    public function testCanCreateStdoutLogging(){

        $loggerFactory = new \Ballybran\Helpers\Log\StdoutLoggerFactory();
        $logger = $loggerFactory->createLogger();
        $this->assertInstanceOf(Ballybran\Helpers\Log\StdoutLogger::class, $logger);
    }

    public function testCanCreateFileLogging(){
        $loggerFactory = new \Ballybran\Helpers\Log\FileLoggerFactory(sys_get_temp_dir());
        $logger = $loggerFactory->createLogger();
        $this->assertInstanceOf(Ballybran\Helpers\Log\FileLogger::class, $logger);
    }
}