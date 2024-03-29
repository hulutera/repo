<?php

/**
 * Defines the constants for MySQL database connection parameters used by a Hulutera.
 */
if (file_exists('/home/s25la3lysvyo/db.ini')) {
    $config = parse_ini_file('/home/s25la3lysvyo/db.ini');
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
 * SESSION ACTIVITY SETTING
 */
define("SESSION_EXPIRE_TIME", 1800); //30min inactive time
define("SESSION_UPDATE_TIME", 60);

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
    $fileName = $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/' . $className . '.php';
    if (!file_exists($fileName)) {
        $fileName = $_SERVER['DOCUMENT_ROOT'] . '/classes/reflection/class.' . $className . '.php';
        if (!file_exists($fileName)) {
            $fileName = $_SERVER['DOCUMENT_ROOT'] . '/view/' . $className . '.php';
            if (!file_exists($fileName)) {
                $fileName = $_SERVER['DOCUMENT_ROOT'] . '/classes/' . $className . '.php';
                if (!file_exists($fileName)) {
                    return;
                }
            }
        }
    }
    include_once($fileName);
});
