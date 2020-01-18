<?php
/*@ dataase.class.php 
	 * input: $obj
	* */
require_once $documnetRootPath . '/db/database.config.php';
class DatabaseClass
{
	private $_connection;
	private $_hostname = DB_HOST;
	private $_username = DB_USER;
	private $_password = DB_PASSWORD;
	private $_database = DB_NAME;

	private static $_instance;
	private static $connect = false;

	static function databaseConnect()
	{
		if (self::$_instance == FALSE) {
			self::$connect = new DatabaseClass();
		}
		self::$_instance = true;
		return self::$connect;
	}
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance()
	{
		if (!self::$_instance) { // If no instance then make one
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
				// calculate session remaining time
				$sessiontimer = time() - $_SESSION['time'];
				if ($sessiontimer > $SESSION_MAX_INACTIVE_TIME) {
					//redirect to logout since session have expired
					header('Location: '. $_SERVER['DOCUMENT_ROOT'].'/helper/logout.php');
				} else //session is active continue
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
						if ($admin == $USER_TYPE) {
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

	// Magic method clone is empty to prevent duplication of connection
	private function __clone()
	{
	}

	// Get mysqli connection
	public function getConnection()
	{
		return $this->_connection;
	}

	private $carQuery, $houseQuery, $computerQuery, $householdQuery, $otherQuery, $phoneQuery;

	public function setQuery($obj, $itemId)
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
	public function getQuery($obj)
	{
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
}
