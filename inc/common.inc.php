<?php
/***/
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
/**/
require_once $documnetRootPath.'/helper/mysqliConnect.php';

require_once $documnetRootPath.'/inc/centerColumnsPost.php';
require_once $documnetRootPath.'/cmn/cmn.class.php';
/**/
require_once $documnetRootPath.'/items/car/car.class.php';
require_once $documnetRootPath.'/items/car/carDetailed.php';
/**/
require_once $documnetRootPath.'/items/computer/computer.class.php';
require_once $documnetRootPath.'/items/computer/computerDetailed.php';
/**/
require_once $documnetRootPath.'/items/others/others.class.php';
require_once $documnetRootPath.'/items/others/othersDetailed.php';
/**/
require_once $documnetRootPath.'/items/house/house.class.php';
require_once $documnetRootPath.'/items/house/houseDetailed.php';
/**/
require_once $documnetRootPath.'/items/household/household.class.php';
require_once $documnetRootPath.'/items/household/householdDetailed.php';
/**/
require_once $documnetRootPath.'/items/phone/phone.class.php';
require_once $documnetRootPath.'/items/phone/phoneDetailed.php';
/**/
require_once $documnetRootPath.'/items/electronics/electronics.class.php';
require_once $documnetRootPath.'/items/electronics/electronicsDetailed.php';
?>
