<?php
session_start();
define("LOGIN_SUCCESS",             20);
define("ERR_ENTER_EMAIL",           21);
define("ERR_ENTER_PASS",            22);
define("ERR_ENTER_EMAIL_AND_PASS",  23);
define("ERR_INVALID_EMAIL",         24);
define("ERR_WORNG_EMAIL_OR_PASS",   25);
define("ERR_USER_NOT_EXIST",        26);
function userLogin($email, $password)
{
    global $connect;
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
        $result = $connect->query("SELECT * FROM user WHERE uEmail = '$email_1'") or die (mysqli_error());
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
