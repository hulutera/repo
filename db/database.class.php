<?php

global $documnetRootPath;
require_once $documnetRootPath . '/db/database.config.php';
require_once $documnetRootPath . '/classes/global.variable.class.php';

class DatabaseClass
{
    private $_connection;
    private $_hostname = DB_HOST;
    private $_username = DB_USER;
    private $_password = DB_PASSWORD;
    private $_database = DB_NAME;

    private static $_instance;

    private $_allItem;

    /*
    Get an instance of the Database
    @return Instance
    */
    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    // Constructor
    private function __construct()
    {
        //connect DB
        error_reporting(0);

        $this->_connection = new mysqli(
            $this->_hostname,
            $this->_username,
            $this->_password,
            $this->_database
        );

        if ($this->_connection) {
            /* Check DB connection */
            if ($this->_connection->connect_errno) {
                printf('Connect failed: %s<br>', mysqli_connect_error());
                exit();
            }

            if (isset($_SESSION['uID'])) {
                if (isset($_SESSION['LAST_ACTIVITY'])) {
                    if (time() - $_SESSION['LAST_ACTIVITY'] > 1800) {
                        // last request was more than 30 minutes ago
                        session_unset();     // unset $_SESSION variable for the run-time
                        session_destroy();   // destroy session data in storage
                        header('Location: ' . $_SERVER['DOCUMENT_ROOT'] . '/includes/logout.php');
                    } elseif (time() - $_SESSION['LAST_ACTIVITY'] > 60) {
                        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
                    }
                } else { //session is active continue
                    //update session time
                    $_SESSION['time'] = time();
                    // get user Id
                    $id = $_SESSION['uID'];
                    // search user role in DB
                    $result = $this->_connection->query("SELECT uRole FROM user WHERE uID LIKE '$id' LIMIT 1");
                    if ($userId = $result->fetch_assoc()) {
                        //Check if user is Administrator for error report
                        $admin = $userId['uRole'];
                        if ($admin == 'admin') {
                            error_reporting(-1);
                        } else {
                            error_reporting(0);
                        }
                    }
                }
            }
            //initialize all exiting items
            $this->_allItem = $this->queryAllItem();
            //initlialize global variables
            HtGlobal::init();
        } else {
            error_reporting(-1);
            die('Could not connect:' . mysqli_connect_errno());
        }
    }

    // prevent duplication of connection
    private function __clone()
    {
    }

    // Get mysqli connection
    public function getConnection()
    {
        return $this->_connection;
    }

    private $carQuery;
    private $houseQuery;
    private $computerQuery;
    private $householdQuery;
    private $otherQuery;
    private $phoneQuery;

    private function setQuery($obj, $itemId)
    {
        switch (get_class($obj)) {
            case 'CarClass':
                $this->carQuery = "SELECT * FROM car
				LEFT JOIN carimages
				ON	car.cID = carimages.ItemID
				LEFT JOIN user
				ON	car.uID = user.uID
				LEFT JOIN carcategory ON
				car.carCategoryID = carcategory.categoryID
				LEFT JOIN contactmethodcategory ON
				car.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				car.cID=$itemId";
                break;
            case 'CompClass':
                $this->computerQuery = "SELECT * FROM computer
				LEFT JOIN computerimages
				ON	computer.dID = computerimages.ItemID
				LEFT JOIN user
				ON	computer.uID = user.uID
				LEFT JOIN
				computercategory ON
				computer.computerCategoryID = computercategory.categoryID
				LEFT JOIN contactmethodcategory ON
				computer.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				computer.dID=$itemId";
                break;
            case 'ElecClass':
                $this->electronicsQuery = "SELECT * FROM electronics
				LEFT JOIN electronicsimages
				ON	electronics.eID = electronicsimages.ItemID
				LEFT JOIN user
				ON	electronics.uID = user.uID
				LEFT JOIN electronicscategory ON
				electronics.electronicsCategoryID = electronicscategory.categoryID
				LEFT JOIN contactmethodcategory ON
				electronics.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				electronics.eID=$itemId";
                break;
            case 'HouseClass':
                $this->houseQuery = "SELECT * FROM house
				LEFT JOIN houseimages
				ON	house.hID = houseimages.ItemID
				LEFT JOIN user
				ON	house.uID = user.uID
				LEFT JOIN housecategory ON
				house.houseCategoryID = housecategory.categoryID
				LEFT JOIN contactmethodcategory ON
				house.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				house.hID=$itemId";
                break;
            case 'HouseHoldClass':
                $this->householdQuery = "SELECT * FROM household
				LEFT JOIN householdimages
				ON	household.hhID = householdimages.ItemID
				LEFT JOIN user
				ON	household.uID = user.uID
				LEFT JOIN householdcategory ON
				household.householdCategoryID = householdcategory.categoryID
				LEFT JOIN contactmethodcategory ON
				household.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				household.hhID=$itemId";
                break;
            case 'PhoneClass':
                $this->phoneQuery = "SELECT * FROM phone
				LEFT JOIN phoneimages
				ON	phone.pId = phoneimages.ItemId
				LEFT JOIN user
				ON	phone.uId = user.uId
				LEFT JOIN contactmethodcategory ON
				phone.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				phone.pID=$itemId";
                break;
            case 'OtherClass':
                $this->otherQuery = "SELECT * FROM others
				LEFT JOIN othersimages
				ON	others.oID = othersimages.ItemID
				LEFT JOIN user
				ON	others.uID = user.uID
				LEFT JOIN contactmethodcategory ON
				others.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				others.oID=$itemId";
                break;
            default:
                break;
        }
    }

    public function getQuery($obj, $itemId)
    {
        $this->setQuery($obj, $itemId);
        switch (get_class($obj)) {
            case 'CarClass':
                return $this->carQuery;
                break;
            case 'CompClass':
                return $this->computerQuery;
                break;
            case 'ElecClass':
                return $this->electronicsQuery;
                break;
            case 'HouseClass':
                return $this->houseQuery;
                break;
            case 'HouseHoldClass':
                return $this->householdQuery;
                break;
            case 'PhoneClass':
                return $this->phoneQuery;
                break;
            case 'OtherClass':
                return $this->otherQuery;
                break;
            default:
                break;
        }
    }

    public function queryGetTotalNumberOfItem($item, $status)
    {
        $sql = '';
        switch ($item) {
            case 'car':
                $sql = "SELECT cID FROM car LEFT JOIN carcategory ON
					car.carCategoryID = carcategory.categoryID
					WHERE cStatus LIKE '" . $status . "'";
                break;
            case 'computer':
                $sql = "SELECT dID FROM computer LEFT JOIN computercategory ON
					computer.computerCategoryID = computercategory.categoryID
					WHERE dStatus LIKE '" . $status . "'";
                break;
            case 'house':
                $sql = "SELECT hID FROM house
				LEFT JOIN housecategory ON	house.houseCategoryID = housecategory.categoryID
					WHERE hStatus LIKE '" . $status . "'";
                break;
            case 'phone':
                $sql = "SELECT pID FROM phone WHERE pStatus = '" . $status . "'";
                break;
            case 'electronics':
                $sql = "SELECT eID FROM electronics LEFT JOIN electronicscategory ON
					electronics.electronicsCategoryID = electronicscategory.categoryID
					WHERE eStatus LIKE '" . $status . "'";
                break;
            case 'household':
                $sql = "SELECT hhID FROM household LEFT JOIN householdcategory ON
					household.householdCategoryID = householdcategory.categoryID
					WHERE hhStatus LIKE '" . $status . "'";
                break;
            case 'others':
                $sql = "SELECT oID FROM others WHERE oStatus LIKE '" . $status . "'";
                break;
            default:
                break;
        }

        return mysqli_num_rows($this->getConnection()->query($sql));
    }

    public function queryItemWithLimitAndDate($item, $start, $maximum, $status)
    {
        $sql = '';
        switch ($item) {
            case 'car':
                $sql = "SELECT cID FROM car LEFT JOIN carcategory ON
				car.carCategoryID = carcategory.categoryID
				WHERE cStatus LIKE '" . $status . "' ORDER BY UploadedDate DESC LIMIT $start, $maximum ";
                break;
            case 'computer':
                $sql = "SELECT dID,UploadedDate FROM computer LEFT JOIN
				computercategory ON
				computer.computerCategoryID = computercategory.categoryID
				WHERE dStatus LIKE '" . $status . "'
				ORDER BY UploadedDate DESC LIMIT $start, $maximum ";
                break;
            case 'house':
                $sql = "SELECT hID,UploadedDate FROM house
				LEFT JOIN housecategory ON
				house.houseCategoryID = housecategory.categoryID
				WHERE hStatus LIKE '" . $status . "' ORDER BY UploadedDate DESC LIMIT $start, $maximum";
                break;
            case 'phone':
                $sql = "SELECT pID,UploadedDate FROM phone
				WHERE pStatus = '" . $status . "' ORDER BY UploadedDate DESC LIMIT $start, $maximum";
                break;
            case 'electronics':
                $sql = "SELECT eID FROM electronics LEFT JOIN electronicscategory ON
				electronics.electronicsCategoryID = electronicscategory.categoryID
				WHERE eStatus LIKE '" . $status . "'
				ORDER BY UploadedDate DESC LIMIT $start, $maximum";
                break;
            case 'household':
                $sql = "SELECT hhID,UploadedDate FROM household
				LEFT JOIN householdcategory ON
				household.householdCategoryID = householdcategory.categoryID
				WHERE hhStatus LIKE '" . $status . "'
				ORDER BY UploadedDate DESC LIMIT $start, $maximum ";
                break;
            case 'others':
                $sql = "SELECT oID,UploadedDate FROM others WHERE oStatus = '" . $status . "'
				ORDER BY UploadedDate DESC LIMIT $start, $maximum ";
                break;
            default:
                break;
        }

        return $this->getConnection()->query($sql);
    }

    public function queryGetItemWithId($item, $number, $maximum, $id)
    {
        $idName = ObjectPool::getInstance()->getClassObject($item)->getIdFieldName();
        $sql = "SELECT $number FROM $item WHERE $idName = $id LIMIT $maximum";

        return $this->getConnection()->query($sql);
    }

    // public function querySearch($item, $number, $maximum, $status)
    // {
    // 	$idName = ObjectPool::getInstance()->getClassObject($item)->getIdFieldName();
    // 	$fieldStatus = ObjectPool::getInstance()->getClassObject($item)->getStatusFieldName();
    // 	return $this->getConnection()->query($sql);
    // }

    public function getFieldName($item, $fieldNumber)
    {
        $sql = "SELECT * FROM $item";

        return $this->getConnection()->query($sql)->fetch_field_direct($fieldNumber)->name;
    }

    public function getAllItem()
    {
        return $this->_allItem;
    }

    public function queryAllItem()
    {
        $sql = 'SELECT * FROM item';

        return $this->getConnection()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function checkIfItemExitByName($item)
    {
        foreach ($this->_allItem as $key => $value) {
            if ($value['table_name'] == $item) {
                return true;
            }
        }

        return false;
    }
    public function getTableNameById($id)
    {
        foreach ($this->_allItem as $key => $value) {
            if ($value['table_id'] == $id) {
                return $value['table_name'];
            }
        }

        return "";
    }

    public function getItemIdField($table)
    {
        if ($table == "car") {
            return "cID";
        } elseif ($table == "house") {
            return "hID";
        } elseif ($table == "computer") {
            return "dID";
        } elseif ($table == "electronics") {
            return "eID";
        } elseif ($table == "household") {
            return "hhID";
        } elseif ($table == "phone") {
            return "pID";
        } elseif ($table == "others") {
            return "oID";
        } else {
            return "";
        }
    }

    public function getAllFields($item)
    {
        $sql = "SELECT * FROM $item";
        $variable = DatabaseClass::getInstance()->getConnection()->query($sql)->fetch_fields();
        $table = array();
        foreach ($variable as $val) {
            $table[] = $val->name;
        }

        return $table;
    }

    public function displayFields($item, $variable)
    {
        $sql = "SELECT * FROM $item";
        $finfo = DatabaseClass::getInstance()->getConnection()->query($sql)->fetch_fields();

        foreach ($finfo as $val) {
            if ($variable == 'table') {
                echo $val->table . '<br>';
                break;
            }
            switch ($variable) {
                case 'name':
                    echo $val->name . '<br>';
                    break;
                case 'length':
                    echo $val->length . '<br>';
                    break;
                case 'max_length':
                    echo $val->max_length . '<br>';
                    break;
                case 'charsetnr':
                    echo $val->charsetnr . '<br>';
                    break;
                case 'flags':
                    echo $val->flags . '<br>';
                    break;
                case 'type':
                    echo $val->type . '<br>';
                    break;
                default:
                    // code...
                    break;
            }
        }
    }

    public function queryUnionAllItemWithStatus($status)
    {
        $sql = "SELECT cID FROM car   WHERE cStatus  LIKE $status
			UNION ALL
			SELECT hID  FROM house       WHERE hStatus  LIKE $status
			UNION ALL
			SELECT dID  FROM computer    WHERE dStatus  LIKE $status
			UNION ALL
			SELECT eID  FROM electronics WHERE eStatus  LIKE $status
			UNION ALL
			SELECT pID  FROM phone       WHERE pStatus  LIKE $status
			UNION ALL
			SELECT hhID FROM household   WHERE hhStatus LIKE $status
			UNION ALL
			SELECT oID  FROM others      WHERE oStatus  LIKE $status";

        return $this->getConnection()->query($sql);
    }

    // Action on messages queries
    public function actionOnTables($action, $idType, $numeric)
    {
        $this->getConnection()->query("$action WHERE $idType = $numeric");
    }

    /// User information
    // Password recovery
    public function userPassword($userTable, $filter, $key)
    {
        return $this->getConnection()->query("SELECT $filter FROM $userTable WHERE activation='$key' LIMIT 1") or die(mysqli_error());
    }

    // User password recovery
    public function updateTable($table, $condition)
    {
        $this->getConnection()->query("UPDATE $table SET $condition") or die(mysqli_error());
    }

    // PempUser update
    public function updateUser($table, $condition)
    {
        $this->getConnection()->query("DELETE FROM $table $condition") or die(mysqli_error());
    }

    // PempUser update
    public function insertUser($table, $username, $email, $password, $firstname, $lastname, $phone, $address, $activation)
    {
        if ($table == "user") {
            $this->getConnection()->query("INSERT INTO $table (userName, uEmail, uPassword, uFirstName, uLastName, uPhone, uAddress, uRole) VALUES ('$username', '$email', '$password','$firstname','$lastname','$phone','$address', 'user')") or die(mysqli_error());
        } else {
            $this->getConnection()->query("INSERT INTO tempuser (username, email, password, firstname, lastname, address, phone, activation) VALUES ('$username','$email','$hashed_password','$firstname','$lastname','$address','$phone','$activation')") or die(mysqli_error());
        }
    }

    // return the total number of stored items from tables
    public function findTotalItemNumb($filter, $table, $condition)
    {
        return $this->getConnection()->query("SELECT $filter FROM $table $condition");
    }

    // query for pagination
    public function queryForPagination($start, $itemStatus)
    {
        return $this->getConnection->query("SELECT cID,tableType,UploadedDate FROM car WHERE cStatus LIKE '$itemStatus'
				UNION ALL
				SELECT hID,tableType,UploadedDate FROM house WHERE hStatus LIKE '$itemStatus'
				UNION ALL
				SELECT dID,tableType,UploadedDate FROM computer WHERE dStatus LIKE '$itemStatus'
				UNION ALL
				SELECT eID,tableType,UploadedDate FROM electronics WHERE eStatus LIKE '$itemStatus'
				UNION ALL
				SELECT pID,tableType,UploadedDate FROM phone WHERE pStatus LIKE '$itemStatus'
				UNION ALL
				SELECT hhID,tableType,UploadedDate FROM household WHERE hhStatus LIKE '$itemStatus'
				UNION ALL
				SELECT oID,tableType,UploadedDate FROM others WHERE oStatus LIKE '$itemStatus'
				ORDER BY UploadedDate DESC LIMIT $start ," .  HtGlobal::get('itemPerPage'));
    }

    // Run query
    public function runQuery($sql)
    {
        return $this->getConnection()->query($sql);
    }

    // Find deleted items
    public function findIteamWithUser($queryCondition, $uid)
    {
        return $this->getConnection()->query(
            "SELECT cID FROM car WHERE cStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
        SELECT hID FROM house WHERE hStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
        SELECT dID FROM computer WHERE dStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
        SELECT eID FROM electronics WHERE eStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
        SELECT pID FROM phone WHERE pStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
        SELECT hhID FROM household WHERE hhStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
        SELECT oID FROM others WHERE oStatus LIKE '$queryCondition' AND uID LIKE '$uid'"
        );
    }
}
