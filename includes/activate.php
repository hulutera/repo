<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
$connect = DatabaseClass::getInstance()->getConnection();
$key = $connect->real_escape_string($_GET['key']);
$passRecovery = $_GET['newPass'];
var_dump($GET);
if(!empty($passRecovery) && !empty($key)){
	$userTable = "user";
	$filter = "uNewPassword";
    $result = DatabaseClass::getInstance()->userPassword($userTable, $filter, $key);
    if (mysqli_num_rows($result)==0) {
        header('Location: ../includes/prompt.php?type=14');
    }
    else {
        $row=mysqli_fetch_array($result);
        $newPassword=$row['uNewPassword'];
        $result2 = DatabaseClass::getInstance()->updateUserPass($newPassword, $key);
        header('Location: ../includes/prompt.php?type=3');   
    }
}
else if(!empty($key)){ 
    $userTable = "tempuser";
	$filter = "*";      
	$result = DatabaseClass::getInstance()->userPassword($userTable, $filter, $key);
	if (mysqli_num_rows($result)==0) {
		header('Location: ../includes/prompt.php?type=15');
	}
	else if (mysqli_num_rows($result)==1)  {
		while ($row= $result->fetch_assoc()){
			$user_id= $row['tuID'];
			$username= $row['username'];
			$email= $row['email'];
			$password= $row['password'];
			$firstname= $row['firstname'];
			$lastname= $row['lastname'];
			$address= $row['address'];
			$phone= $row['phone'];
            $regDate= $row['regDate'];
		}
        // Calculate the activation key expiration date
        // 2,592,000 is number of seconds per month that the activation key will be active. After a month the user will be removed from tempuser table
        $today = strtotime("tomorrow");		
        $regDateSrting =strtotime($regDate);
        $endDate = 2592000 ;
        if ($today - $regDateSrting >= $endDate ){
			$resulst2 = DatabaseClass::getInstance()->updateTempUser($user_id);
			header ('Location: ../includes/prompt.php?type=11');
        }
		else{
            $result1 = DatabaseClass::getInstance()-> insertUserInfo($username, $email, $password, $firstname, $lastname, $phone, $address);
			if(!$result1){
				echo "Sorry! Your account could not be activated, please contact the administrator.";
			}
			else{
                $resulst2 = DatabaseClass::getInstance()->updateTempUser($user_id);
				header('Location: ../includes/prompt.php?type=0');
            }
	    }
    }
}
?>