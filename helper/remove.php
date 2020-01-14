<?php
global $connect;
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/helper/mysqliConnect.php';
$user_id = $_GET['userId'];
$de_key  = $_GET['de_key'];

//check if it is a number and is positive
$is_userid_int = isset($user_id) && ctype_digit($user_id);

if($is_userid_int &&
mysqli_num_rows($connect->query("SELECT * FROM user WHERE uID  = '$user_id' AND deactivation = '$de_key' Limit 1"))!=0)
{
	$connect->query("DELETE FROM user WHERE uID  = '$user_id'");
}
session_destroy();
header('Location: ../index.php');
?>