<?php
/**
 * KNUT7 K7F (https://marciozebedeu.com/)
 * KNUT7 K7F (tm) : Rapid Development Framework (https://marciozebedeu.com/).
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @see      http://github.com/knut7/knut7 for the canonical source repository
 *
 * @copyright (c) 2015.  KNUT7  Software Technologies AO Inc. (https://marciozebedeu.com/)
 * @license   https://marciozebedeu.com//license/new-bsd New BSD License
 * @author    Marcio Zebedeu - artphoweb@artphoweb.com
 *
 * @version   1.0.6
 */

use Ballybran\Helpers\Routing\Routes;

if (!defined('VERSION')) {
    define('VERSION', '1.0.14');
}

// composer auto-load
require 'vendor/autoload.php';

// ballybran configuration. Here contains the main constants etc.
require 'vendor/knut7/framework/src/Ballybran/Config/Config.php';
require 'vendor/knut7/framework/src/Ballybran/Config/autoload.php';

/*
 *
 * Load the Bootstrap!
 *
 */
error_reporting(E_ALL);
ini_set('display_errors' , 1);


$registry = \Ballybran\Database\RegistryDatabase::getInstance();
$registry->set('PDO' ,
    new Ballybran\Database\Drives\AbstractDatabasePDO(
        include __DIR__ . '/config/Database/config.database.php'
    )
);

$registry->set('MYSQL' ,
    new \Ballybran\Database\Drives\AbstractDatabaseMysqli()
);
$registry->set('POSTGL' ,
    new \Ballybran\Database\Drives\AbstractDatabasePDO(
        include __DIR__ . '/config/Database/config.database.php'
    )
);

require 'config/routes/web.php';

exit;
