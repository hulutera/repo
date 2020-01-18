<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
require_once $documnetRootPath.'/inc/userStatus.php';

if(!isset($_SESSION['uID']) ){
	header('Location:'. $documnetRootPath.'index.php');
}

if(isset($_POST['Save']))
{
	$err = crypt(100);
	$objectWantedRole  =  $_POST['privilege'];
	$objectCurrentRole =  $_POST['modtype'];
	$objectId   =  $_POST['modId'];

	$myId    = $_SESSION['uID'];
	$result  = queryUserWithId($myId);
	$val     = $result->fetch_assoc();
	$myRole  = $val['uRole'];

	if($objectWantedRole!='000' && $objectId != $myId)    //you can not change your role
	{
		if(found($objectCurrentRole) <= found($myRole))   //object role should be less than your role 
		{
			if(found($objectWantedRole) <= found($myRole)) //wanted role should be below your role 
			{
				func_changeprevliage($objectWantedRole, $objectId);
				$err = 0;
			}
		}
	}
	header('Location: ../content/controlPanel.php?err='.$err.'&uId='.$myId);
}

function func_changeprevliage($privilege,$uId){
	global $connect;
	$connect->query("UPDATE user SET uRole ='".$privilege."' WHERE uID = '".$uId."'");
}
// echo 'TEST 1:'.
// 		'<br>My Role is'.$myRole.
// 		'<br>My Id is '.$myId.
// 		'<br>.............'.
// 		'<br>His current Id is '.$objectId.
// 		'<br>His Current Role is '.$objectCurrentRole.
// 		'<br>His Wanted  Role is '.$objectWantedRole;
// //exit;
?>