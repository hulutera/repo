<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
require_once $documnetRootPath.'/includes/global.variable.php';

function userLogin($email, $password)
{
    $connect = DatabaseClass::getInstance()->getConnection();
    
    if(empty($email) && empty($password)) {
        return ERR_ENTER_EMAIL_AND_PASS;
    }
    else if (empty($email) || empty($password)) {
        if (empty($password)) {
            return ERR_ENTER_PASS;
        }
        else {
            return ERR_ENTER_EMAIL;                
        }
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return ERR_INVALID_EMAIL;
    }
    else {
        $email_1 = $connect->real_escape_string($email);
        $password_1 = $connect->real_escape_string($password);
        $successLogin = FALSE;
		$table = "user";
	    $filterId = "*";
	    $condition = "WHERE uEmail = '$email_1'";
	    $result = DatabaseClass::getInstance()->findTotalItemNumb($filterId, $table, $condition);
        if (mysqli_num_rows($result) != 0) {
            $row = $result->fetch_array();
            if (crypt($password_1, $row['uNewPassword']) == $row['uPassword']){
                $successLogin = TRUE;
            }
            else if($row['activation'] != NULL) { //Allow login before activation for recovered password    
                if (crypt($password_1, $row['uNewPassword']) == $row['uNewPassword']) {
                    $newPassword=$row['uNewPassword'];
					$sql = "UPDATE user SET upassword = '$newPassword', uNewPassword = NULL, activation= NULL WHERE uEmail = '$email'";
					$result2 = DatabaseClass::getInstance()->runQuery($sql);
                    $successLogin = TRUE;
                }
            }
            if($successLogin == TRUE) {
                $_SESSION['uID'] = $row['uID'];
                $_SESSION['time'] = time();
                return LOGIN_SUCCESS;                
            }
            else {
                return ERR_WORNG_EMAIL_OR_PASS;
            }
        }
        else {
            return ERR_USER_NOT_EXIST;
        }
    }
}
?>
