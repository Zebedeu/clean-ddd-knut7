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
 * @version   1.0.2
 */

/*
|--------------------------------------------------------------------------
| MY PROJECT NAME
|--------------------------------------------------------------------------
|   insert the name for your project
*/

if (isset($_GET['demo'])) {
    $demo['demo'] = $_GET['demo'];
    $MY_PROJECT_NAME = $demo['demo'];
} else {
    $MY_PROJECT_NAME = 'Http';
}

/*
|--------------------------------------------------------------------------
| HEADER TITLE
|--------------------------------------------------------------------------
|
|
*/

$HEADER_TITLE = 'KNUT 7';

/*
|--------------------------------------------------------------------------
| HEADER DESCRIPTION
|--------------------------------------------------------------------------
|
*/

$HEADER_DESCRIPTION = 'Modelo site de advocacia';

/*
|--------------------------------------------------------------------------
| MY LOCALE
|--------------------------------------------------------------------------
|
*/

$code = 'en';
$MY_LOCALE = 'pt_PT.UTF-8';

/*
  |--------------------------------------------------------------------------
  |  DEFAULT_UTC
  |--------------------------------------------------------------------------
  |
  | define('Country UTC - DEFAULT is UTC
  |
  */

$country_utc = 'Africa/Luanda';

/*
|--------------------------------------------------------------------------
|  Database Connection ERROR
|--------------------------------------------------------------------------
|
| 1 - dev -
|
*/

$_dev = '';

/*
|--------------------------------------------------------------------------
|  Database Connection
|--------------------------------------------------------------------------
|
| define('TYPInsert ou type database Drive hire. \\ PDO, MYSQLI, POSTGROUL and SQLite
|
*/

define('TYPE' , 'PDO'); // Insert ou type database Drive hire. \\ PDO, MYSQLI, POSTGROUL and SQLite
define('DB_PORT' , 3306);
define('DB_TYPE' , 'mysql');
define('DB_HOST' , 'localhost');
define('DB_USER' , 'root');
define('DB_PASS' , '');
define('DB_NAME' , 'knut');

