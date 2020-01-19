<?php
global $documnetRootPath;
require_once $documnetRootPath . '/db/database.config.php';

class DatabaseClass
{
	private $_connection;
	private $_hostname = DB_HOST;
	private $_username = DB_USER;
	private $_password = DB_PASSWORD;
	private $_database = DB_NAME;

	private static $_instance;

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
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			/**/
			if (isset($_SESSION['uID'])) {

				if (isset($_SESSION["LAST_ACTIVITY"])) {
					if (time() - $_SESSION["LAST_ACTIVITY"] > 1800) {
						// last request was more than 30 minutes ago
						session_unset();     // unset $_SESSION variable for the run-time 
						session_destroy();   // destroy session data in storage
						header('Location: ' . $_SERVER['DOCUMENT_ROOT'] . '/helper/logout.php');
					} else if (time() - $_SESSION["LAST_ACTIVITY"] > 60) {
						$_SESSION["LAST_ACTIVITY"] = time(); // update last activity time stamp
					}
				}
				else //session is active continue
				{
					//update session time
					$_SESSION["time"] = time();
					// get user Id
					$id = $_SESSION['uID'];
					// search user role in DB
					$result = $this->_connection->query("SELECT uRole FROM user WHERE uID LIKE '$id' LIMIT 1");
					if ($userId = $result->fetch_assoc()) {
						//Check if user is Administrator for error report
						$admin = $userId['uRole'];
						if ($admin == "admin") {
							error_reporting(-1);
						} else {
							error_reporting(0);
						}
					}
				}
			}
		} else {
			error_reporting(0);
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

	private $carQuery, $houseQuery, $computerQuery, $householdQuery, $otherQuery, $phoneQuery;

	private function setQuery($obj, $itemId)
	{
		switch (get_class($obj)) {
			case "CarClass":
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
				car.cID=$itemId
				";
				break;
			case "CompClass":
				$this->computerQuery = "SELECT * FROM computer
				LEFT JOIN computerimages
				ON	computer.dID = computerimages.ItemID
				LEFT JOIN user
				ON	computer.uID = user.uID
				LEFT JOIN
				computercategory ON
				computer.compCategoryID = computercategory.categoryID
				LEFT JOIN contactmethodcategory ON
				computer.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				computer.dID=$itemId ";
				break;
			case "ElecClass":
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
				electronics.eID=$itemId ";
				break;
			case "HouseClass":
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
				house.hID=$itemId ";
				break;
			case "HouseHoldClass":
				$this->householdQuery = "SELECT * FROM household
				LEFT JOIN householdimages
				ON	household.hhID = householdimages.ItemID
				LEFT JOIN user
				ON	household.uID = user.uID
				LEFT JOIN householdcategory ON
				household.hhCategoryID = householdcategory.categoryID
				LEFT JOIN contactmethodcategory ON
				household.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				household.hhID=$itemId ";
				break;
			case "PhoneClass":
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
			case "OtherClass":
				$this->otherQuery = "SELECT * FROM others
				LEFT JOIN othersimages
				ON	others.oID = othersimages.ItemID
				LEFT JOIN user
				ON	others.uID = user.uID
				LEFT JOIN contactmethodcategory ON
				others.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				others.oID=$itemId ";
				break;
			default:
				break;
		}
	}
	public function getQuery($obj, $itemId)
	{
		$this->setQuery($obj, $itemId);
		switch (get_class($obj)) {
			case "CarClass":
				return $this->carQuery;
				break;
			case "CompClass":
				return $this->computerQuery;
				break;
			case "ElecClass":
				return $this->electronicsQuery;
				break;
			case "HouseClass":
				return $this->houseQuery;
				break;
			case "HouseHoldClass":
				return $this->householdQuery;
				break;
			case "PhoneClass":
				return $this->phoneQuery;
				break;
			case "OtherClass":
				return $this->otherQuery;
				break;
			default:
				break;
		}
	}

	public function queryGetTotalNumberOfItem($item, $status)
	{
		$sql = "";
		switch ($item) {
			case "car":
				$sql = "SELECT cID FROM car LEFT JOIN carcategory ON
					car.carCategoryID = carcategory.categoryID
					WHERE cStatus LIKE '" . $status . "'";
				break;
			case "computer":
				$sql = "SELECT dID FROM computer LEFT JOIN computercategory ON
					computer.compCategoryID = computercategory.categoryID
					WHERE dStatus LIKE '" . $status . "'";
				break;
			case "house":
				$sql = "SELECT hID FROM house 
				LEFT JOIN housecategory ON	house.houseCategoryID = housecategory.categoryID
					WHERE hStatus LIKE '" . $status . "'";
				break;
			case "phone":
				$sql = "SELECT pID FROM phone WHERE pStatus = '" . $status . "'";
				break;
			case "electronics":
				$sql = "SELECT eID FROM electronics LEFT JOIN electronicscategory ON
					electronics.electronicsCategoryID = electronicscategory.categoryID
					WHERE eStatus LIKE '" . $status . "'";
				break;
			case "household":
				$sql = "SELECT hhID FROM household LEFT JOIN householdcategory ON
					household.hhCategoryID = householdcategory.categoryID
					WHERE hhStatus LIKE '" . $status . "'";
				break;
			case "others":
				$sql = "SELECT oID FROM others WHERE oStatus LIKE '" . $status . "'";
				break;
			default:
				break;
		}
		return mysqli_num_rows($this->getConnection()->query($sql));
	}

	public function queryItemWithLimitAndDate($item, $start, $maximum, $status)
	{
		$sql = "";
		switch ($item) {
			case "car":
				$sql = "SELECT cID FROM car LEFT JOIN carcategory ON
				car.carCategoryID = carcategory.categoryID
				WHERE cStatus LIKE '" . $status . "' ORDER BY UploadedDate DESC LIMIT $start, $maximum ";
				break;
			case "computer":
				$sql = "SELECT dID,UploadedDate FROM computer LEFT JOIN
				computercategory ON
				computer.compCategoryID = computercategory.categoryID
				WHERE dStatus LIKE '" . $status . "'
				ORDER BY UploadedDate DESC LIMIT $start, $maximum ";
				break;
			case "house":
				$sql = "SELECT hID,UploadedDate FROM house
				LEFT JOIN housecategory ON
				house.houseCategoryID = housecategory.categoryID
				WHERE hStatus LIKE '" . $status . "' ORDER BY UploadedDate DESC LIMIT $start, $maximum";
				break;
			case "phone":
				$sql = "SELECT pID,UploadedDate FROM phone
				WHERE pStatus = '" . $status . "' ORDER BY UploadedDate DESC LIMIT $start, $maximum";
				break;
			case "electronics":
				$sql = "SELECT eID FROM electronics LEFT JOIN electronicscategory ON
				electronics.electronicsCategoryID = electronicscategory.categoryID
				WHERE eStatus LIKE '" . $status . "'
				ORDER BY UploadedDate DESC LIMIT $start, $maximum";
				break;
			case "household":
				$sql = "SELECT hhID,UploadedDate FROM household
				LEFT JOIN householdcategory ON
				household.hhCategoryID = householdcategory.categoryID
				WHERE hhStatus LIKE '" . $status . "'
				ORDER BY UploadedDate DESC LIMIT $start, $maximum ";
				break;
			case "others":
				$sql = "SELECT oID,UploadedDate FROM others WHERE oStatus = '" . $status . "'
				ORDER BY UploadedDate DESC LIMIT $start, $maximum ";
				break;
			default:
				break;
		}
		return $this->getConnection()->query($sql);
	}

	public function queryGetItemWithId($item, $number , $maximum, $id)
	{
		$idName = ObjectPool::getInstance()->getClassObject($item)->getIdFieldName();
		$sql = "SELECT $number FROM $item WHERE $idName = $id LIMIT $maximum";
		return $this->getConnection()->query($sql);		
	}

	public function querySearch($item, $number , $maximum, $status)
	{
		$idName = ObjectPool::getInstance()->getClassObject($item)->getIdFieldName();
		$fieldStatus = ObjectPool::getInstance()->getClassObject($item)->getStatusFieldName();
		return $this->getConnection()->query($sql);		
	}

	public function getFieldName($item, $fieldNumber)
	{
		$sql = "SELECT * FROM $item";
		return $this->getConnection()->query($sql)->fetch_field_direct($fieldNumber)->name;		
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

	
}
