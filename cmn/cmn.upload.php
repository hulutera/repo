<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/inc/headerSearchAndFooter.php';
require_once $documnetRootPath.'/inc/centerColumns.php';

function routerItemUpld($contentType)
{
	global $documnetRootPath;
	$isValidUrl = false;
	switch($contentType)
	{
		case 'car':         
		case 'computer':    
		case 'house':       
		case 'household':   
		case 'electronics': 
		case 'phone':       
		case 'others':      $isValidUrl = true;break;
                default: break;
	}
	
	if(!isset($_SESSION['uID']) || !$isValidUrl)
	{
 		header('Location: ../main/prompt.php?type=404');
 		exit;		
	}
	
	switch($contentType)
	{
		case 'car':         require_once $documnetRootPath.'/items/car/carUpload.php';                 carUpld();         break;
		case 'computer':    require_once $documnetRootPath.'/items/computer/computerUpload.php';       compUpld();        break;
		case 'house':       require_once $documnetRootPath.'/items/house/houseUpload.php';             houseUpld();       break;
		case 'household':   require_once $documnetRootPath.'/items/household/householdUpload.php';     householdUpld();   break;
		case 'electronics': require_once $documnetRootPath.'/items/electronics/electronicsUpload.php'; electronicsUpld(); break;
		case 'phone':       require_once $documnetRootPath.'/items/phone/phoneUpload.php';             phoneUpld();       break;
		case 'others':      require_once $documnetRootPath.'/items/others/othersUpload.php';           othersUpld();      break;

	}
}
?>
