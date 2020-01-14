<?php
//connect DB
error_reporting(0);
//HOST-USER-PASSWORD-DATABASE
$MASTER = array('localhost', 'root', '', 'hulutera');
$connect = new mysqli($MASTER[0], $MASTER[1], $MASTER[2], $MASTER[3]);
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];

if ($connect) {
	/* Check DB connection */
	if ($connect->connect_errno) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	/**/
	if (isset($_SESSION['uID'])) {
		// calculate session remaining time
		$sessiontimer = time() - $_SESSION['time'];
		if ($sessiontimer > $SESSION_MAX_INACTIVE_TIME) {
			//redirect to logout since session have expired
			header('Location: ../helper/logout.php');
		} else //session is active continue
		{
			//update session time
			$_SESSION["time"] = time();
			// get user Id
			$id = $_SESSION['uID'];
			// search user role in DB
			$result = $connect->query("SELECT uRole FROM user WHERE uID LIKE '$id' LIMIT 1");
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

?>