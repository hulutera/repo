<?php 
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
global $connect;
session_start();
$oMessage = NULL;
$Item_id  = $_GET['itemid'];
$Itemtype = $_GET['itemtype'];
$Selected = $_GET['selected'];
//$user_ID  = 0;  //user not logged-in

if(isset($_SESSION['uID'])){
	$user_ID = $_SESSION['uID'];
}
switch($Selected){
	case "Bullying":
		$selectedIndex = 1;
		break;
	case "Copyright":
		$selectedIndex = 2;
		break;
	case "Discrimination":
		$selectedIndex = 3;
		break;
	case "Spam":
		$selectedIndex = 4;
		break;
	case "Identity theft":
		$selectedIndex = 5;
		break;
	case "Political violence":
		$selectedIndex = 6;
		break;
	case "Race violence":
		$selectedIndex = 7;
		break;
	case "Sex abuse":
		$selectedIndex = 8;
		break;
	case "Sexual content" :
		$selectedIndex = 9;
		break;
	case "Age abuse" :
		$selectedIndex = 10;
		break;
	case "Religious violence" :
		$selectedIndex = 11;
		break;
	case "Other" :
		$selectedIndex = 12;
		break;
	default:
		break;
}

$connect->query("INSERT INTO abuse (`$Itemtype`, `abuseCategoryID`,`userID`, `otherMessage`)
		VALUES ('$Item_id', '$selectedIndex','$user_ID','$oMessage')");
?>
