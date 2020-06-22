<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/classes/global.variable.class.php';

function userLogin($email, $password)
{
    global $lang;

    $connect = DatabaseClass::getInstance()->getConnection();

    if (empty($email) && empty($password)) {
        return $lang['missing e-mail and password msg'];
    } else if (empty($email) || empty($password)) {
        if (empty($password)) {
            return $lang['missing password msg'];
        } else {
            return $lang['missing email msg'];
        }
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $lang['invalid email msg'];
    } else {
        $email_1 = $connect->real_escape_string($email);
        $password_1 = $connect->real_escape_string($password);
        $successLogin = FALSE;
        $cond2 = "WHERE uEmail = '$email_1'";
        $filter = "*";
        $table = "user";
        $result =   DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
        if (mysqli_num_rows($result) != 0) {
            $row = $result->fetch_array();
            if (crypt($password_1, $row['uNewPassword']) == $row['uNewPassword']) {
                $successLogin = TRUE;
            } else if ($row['activation'] != NULL) { //Allow login before activation for recovered password
                if (crypt($password_1, $row['uNewPassword']) == $row['uNewPassword']) {
                    $newPassword = $row['uNewPassword'];
                    $cond1 = "upassword = '$newPassword', uNewPassword = NULL, activation = NULL WHERE uEmail = '$email'";
                    $table = "user";
                    $result2 = DatabaseClass::getInstance()->updateTable($table, $cond1);
                    $successLogin = TRUE;
                }
            }
            if ($successLogin == TRUE) {
                $_SESSION['uID'] = $row['uID'];
                $_SESSION['time'] = time();
                return "LOGIN_SUCCESS";
            } else {
                return $lang['Incorrect e-mail or password msg'];
            }
        } else {
            return $lang['non-existing email msg'];
        }
    }
}
