<?php
global $connect;
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
$user_id = $_GET['userId'];
$de_key  = $_GET['de_key'];

//check if it is a number and is positive
$is_userid_int = isset($user_id) && ctype_digit($user_id);

$table = "user";
$filter = "*";
$cond = "WHERE uID  = '$user_id' AND deactivation = '$de_key' Limit 1";
$q = DatabaseClass::getInstance()->updateTable($filter, $table, $cond);
if($is_userid_int &&
mysqli_num_rows($q))!=0)
{
	$cond1 = "WHERE uID  = '$user_id'";
	DatabaseClass::getInstance()->updateUser($table, $cond1);
}
session_destroy();
header('Location: ../index.php');
?>