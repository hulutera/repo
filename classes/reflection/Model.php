<?php

/**
 * Class Model
 * Class to interact with MySQL (simply by extending PHP msqli)
 *
 * @note Extracted from my PHP Web MVC Framework
 *
 * @author Rosario Carvello <rosario.carvello@gmail.com>
 * @version GIT:v1.1.0
 * @copyright (c) 2016 Rosario Carvello <rosario.carvello@gmail.com> - All rights reserved. See License.txt file
 * @license BSD Clause 3 License
 * @license https://opensource.org/licenses/BSD-3-Clause This software is distributed under BSD-3-Clause Public License
 */

abstract class Model extends mysqli
{
    public $sql;
    // protected $resultArray;
    protected $resultSet;
    // protected $resultRecord;
    const SESSION_EXPIRE_TIME = 1800; //30min inactive time
    const SESSION_UPDATE_TIME = 60;

    public function __construct()
    {
        echo DBHOST;
        @parent::__construct(DBHOST, DBUSER, DBPASSWORD, DBNAME);
        $this->throwIfDBError();
        $this->autorun();
    }

    protected function autorun()
    {
        if (isset($_GET['lan'])) {
            $lang_url = "?&lan=" . $_GET['lan'];
        } else {
            $lang_url = "";
        }

        //Redirect to index page when session expired
        if (isset($_SESSION['uID'])) {
            if (isset($_SESSION["LAST_ACTIVITY"])) {
                if (time() - $_SESSION["LAST_ACTIVITY"] > self::SESSION_EXPIRE_TIME) {
                    header('Location:../includes/logout.php' . $lang_url);
                }
                else if (time() - $_SESSION["LAST_ACTIVITY"] > self:: SESSION_UPDATE_TIME) {
                    $_SESSION["LAST_ACTIVITY"] = time();
                }
            } else {
                $_SESSION["LAST_ACTIVITY"] = time();
            }
        }
    }

    public function setResultSet($mysqliResult)
    {
        $this->resultSet = $mysqliResult;
    }

    public function getResultSet()
    {
        return $this->resultSet;
    }

    public function updateResultSet()
    {
        $result = $this->query($this->sql);
        $this->throwIfDBError();
        $this->setResultSet($result);
    }

    # fetches all result rows as an associative array, a numeric array, or both
    # mysqli_fetch_all (PHP 5 >= 5.3.0)
    public function fetch_all($query)
    {
        $result = parent::query($query);
        if ($result) {
            # check if mysqli_fetch_all function exist or not
            if (function_exists('mysqli_fetch_all')) {
                # NOTE: this below always gets error on certain live server
                # Fatal error: Call to undefined method mysqli_result::fetch_all() in /.../class_database.php on line 28
                return $result->fetch_all(MYSQLI_ASSOC);
            }

            # fall back to use while to loop through the result using fetch_assoc
            else {
                while ($row = $result->fetch_assoc()) {
                    $return_this[] = $row;
                }

                if (isset($return_this)) {
                    return $return_this;
                } else {
                    return false;
                }
            }
        } else {
            return self::get_error();
        }
    }

    # fetch a result row as an associative array
    public function fetch_assoc($query)
    {
        $result = parent::query($query);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            # call the get_error function
            return self::get_error();
            # or:
            # return $this->get_error();
        }
    }

    public function get_error()
    {
        if ($this->errno || $this->error) {
            return sprintf("Error (%d): %s", $this->errno, $this->error);
        }
    }

    private function throwIfDBError()
    {

        if ($this->connect_error) {
            throw new Exception($this->connect_error);
        }
        if ($this->error) {
            throw new Exception($this->error);
        }
    }
}
