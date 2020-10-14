<?php

/**
 * Defines the constants for MySQL database connection parameters used by a Hulutera.
 */
if (file_exists('/home/hah3lga4knls/db.ini')) {
    $config = parse_ini_file('/home/hah3lga4knls/db.ini');
    define("DBHOST", $config["DBHOST"]);
    define("DBUSER", $config["DBUSER"]);
    define("DBPASSWORD", $config["DBPASSWORD"]);
    define("DBNAME", $config["DBNAME"]);
    define('DBPORT', $config['DBPORT']);
    $GLOBALS['status'] = "deploy-release";
} else {
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASSWORD", "");
    define("DBNAME", "hulutera_db");
    define('DBPORT', '3306');
    unset($GLOBALS['status']);
}
/**
 * Date formats:
 * @note HTML5 date format is like 2016/01/20 - aaaa/mm/dd
 */

/**
 * Defines a constant for the transformation of the date format of all
 * date fields fetched from mysql tables
 * You may change this value according to your language format.
 * For more information read the MySQL specifications for date format
 * Most used  format: define("FETCHED_DATE_FORMAT","d/m/Y");
 */
define("FETCHED_DATE_FORMAT", "d/m/Y");
// define("FETCHED_DATE_FORMAT","Y-m-d");

/**
 * Defines a constant for the transformation of the datetime format of all
 * datetime fields fetched from mysql tables.
 * You may change this value according to your language format.
 * For more information read the MySQL specifications for date format
 * Most used format: define("FETCHED_DATETIME_FORMAT","d/m/Y H:i:s");
 *
 */
define("FETCHED_DATETIME_FORMAT", "d/m/Y H:i:s");
// define("FETCHED_DATETIME_FORMAT","Y-m-d H:i:s");

/**
 * Defines a constant for interpreting of dates format used into all the
 * SQL statements for inserting or updating mysql date fields.
 * You may change this value according to your language format.
 * For more information read the MySQL specifications for date format
 * Most used format: define("STORED_DATE_FORMAT","%d/%m/%Y");
 */
define("STORED_DATE_FORMAT", "%d/%m/%Y");
// define("STORED_DATE_FORMAT","%Y-%m-%d");

/**
 * Defines a constant for interpreting of datetime format used into all the
 * SQL statements for inserting or updating mysql datetime fields.
 * You may change this value according to your language format.
 * For more information read the MySQL specifications for date format
 * Most used format: define("STORED_DATETIME_FORMAT","%d/%m/%Y %H:%i:%s");
 */
define("STORED_DATETIME_FORMAT", "%d/%m/%Y %H:%i:%s");
// define("STORED_DATETIME_FORMAT","%Y-%m-%d %H:%i:%s");

/**
 *  Includes
 */
spl_autoload_register(function ($className) {
    $classDirectories = [
        $_SERVER['DOCUMENT_ROOT'] . '/classes/',
        $_SERVER['DOCUMENT_ROOT'] . '/classes/class.',
        $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/',
        $_SERVER['DOCUMENT_ROOT'] . '/view/',
    ];
    foreach ($classDirectories as $value) {
        $fullName = $value . $className . '.php';
        if (file_exists($fullName)) {
            require_once $fullName;
            return;
        }
    }
});
