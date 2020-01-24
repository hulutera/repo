<?php
//to include common files
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/inc/headerSearchAndFooter.php';
require_once $documnetRootPath.'/db/database.class.php';
require_once $documnetRootPath.'/inc/centerColumnsPost.php';
require_once $documnetRootPath.'/classes/cmn.class.php';
function includeClass($itemUrl)
{	
	global $documnetRootPath;
	switch($itemUrl)
	{
		case "car":
			require_once $documnetRootPath.'/items/car/car.class.php';
			$isValidUrl = array(0=>"መኪና",1=>true);
			break;
		case "computer":
			require_once $documnetRootPath.'/items/computer/computer.class.php';
			$isValidUrl = array(0=>"ኮምፒውተር",1=>true);
			break;
		case "house":
			require_once $documnetRootPath.'/items/house/house.class.php';
			$isValidUrl = array(0=>"ቤት",1=>true);
			break;
		case "phone":
			require_once $documnetRootPath.'/items/phone/phone.class.php';
			$isValidUrl = array(0=>"ስልክ",1=>true);
			break;
		case "electronics":
			require_once $documnetRootPath.'/items/electronics/electronics.class.php';
			$isValidUrl = array(0=>"ኤሌክትሮኒክስ",1=>true);
			break;
		case "household":
			require_once $documnetRootPath.'/items/household/household.class.php';
			$isValidUrl = array(0=>"የቤት ዕቃዎች",1=>true);
			break;
		case "others":
			require_once $documnetRootPath.'/items/others/others.class.php';
			$isValidUrl = array(0=>"ሌሎች",1=>true);
			break;
		default:
			$isValidUrl = array(0=>"",1=>false);
			break;
	}
	return $isValidUrl;
}
?>