<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
require_once $documnetRootPath.'/classes/global.variable.class.php';

function userLogin($email, $password)
{
    $connect = DatabaseClass::getInstance()->getConnection();

    if(empty($email) && empty($password)) {
        return htGlobal::get('ERR_ENTER_EMAIL_AND_PASS');
    }
    else if (empty($email) || empty($password)) {
        if (empty($password)) {
            return htGlobal::get('ERR_ENTER_PASS');
        }
        else {
            return htGlobal::get('ERR_ENTER_EMAIL');                
        }
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return htGlobal::get('ERR_INVALID_EMAIL');
    }
    else {
        $email_1 = $connect->real_escape_string($email);
        $password_1 = $connect->real_escape_string($password);
        $successLogin = FALSE;
        $result = $connect->query("SELECT * FROM user WHERE uEmail = '$email_1'");
        if (mysqli_num_rows($result) != 0) {
            $row = $result->fetch_array();
            if (crypt($password_1, $row['uPassword']) == $row['uPassword']){
                $successLogin = TRUE;
            }
            else if($row['activation'] != NULL) { //Allow login before activation for recovered password    
                if (crypt($password_1, $row['uNewPassword']) == $row['uNewPassword']) {
                    $newPassword=$row['uNewPassword'];
                    $result2=$connect->query("UPDATE user SET upassword = '$newPassword', uNewPassword = NULL, activation= NULL WHERE uEmail = '$email'") or die (mysqli_error());
                    $successLogin = TRUE;
                }
            }
            if($successLogin == TRUE) {
                $_SESSION['uID'] = $row['uID'];
                $_SESSION['time'] = time();
                return htGlobal::get('LOGIN_SUCCESS');                
            }
            else {
                return htGlobal::get('ERR_WORNG_EMAIL_OR_PASS');
            }
        }
        else {
            return htGlobal::get('ERR_USER_NOT_EXIST');
        }
    }
}
?>
