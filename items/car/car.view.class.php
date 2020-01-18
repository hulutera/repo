<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/view/price.view.class.php';
require_once $documnetRootPath . '/cmn/cmn.class.php';
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/object/objectPool.class.php';

class CarView
{
	/*latest car from DB*/
	public function show($itemId)
	{
		//creating an object
		$objCar   = ObjectPool::getInstance()->getClassObject("car");		
		$objUser  = new UserClass;
		$objDir   = new DirectoryClass;
		
		$objCmn   = new CommonClass;
		$objImg   = new ImgHandler;
		$price    = new PriceClass;		
		$dbQuery = DatabaseClass::getInstance()->getQuery($objCar, $itemId);
		$connect = DatabaseClass::getInstance()->getConnection();
		$carResult = $connect->query($dbQuery);
		while ($carrow = $carResult->fetch_assoc()) {
			$objUser->setUserElements($carrow);
			$userName  = $objUser->getUserName();
			$userPhone = $objUser->getUserPhone();
			$userEmail = $objUser->getUserEmail();
			$userRole  = $objUser->getUserRole();
			$userId    = $objUser->getUserId();
			//
			$objCar->setElements($carrow);
			$carId       = $objCar->getId();
			$itemName    = $objCar->getItemName();
			$uniqueId 	 = $itemName . $objCar->getId();
			$datetime    = $objCar->getUpldTime();
			$title       = $objCar->getTitle();
			$loc    	 = $objCar->getLoc();
			$mkTyp  	 = $objCar->getMktType();
			$contactType = $objCar->getContactMethod();

			//Object for item Directory
			$objDir->setDirectory("carimages", $carId);
			$dir = $objDir->getDirectory();

			//Object for item Image
			$image    = $objImg->initImage($carrow);
			$numimage = $objImg->getNumOfImg();

			//prepare image
			$imgArr   	= json_encode($image);
			$jsonImgobj = json_decode($imgArr, true);
			$jsImg 		= implode(',', array_values($jsonImgobj));

			//---------------------------------------------------------
			echo "<div class=\"divClassified\">";
			echo "<div id =\"divCommon\" class=\"thumblist_$uniqueId\">";
			echo "<div class=\"col1\">";
			if ($numimage == 0) {
				echo "<a href=\"javascript:void(0)\" onclick=\"swap($carId,'$itemName')\" >";
				echo "<div class=\"image\"><img src=\"$objDir->IMG_NOT_AVAIL_THMBNL\"></div></a>";
			} else {
				$thmbNlImg  = $dir . 'original/' . $image[1];
				echo "<a href=\"javascript:void(0)\"
			onclick=\"swap($carId,'$itemName'), insertimg('$dir',$carId,'$itemName','$jsImg')\">";
				echo "<div class=\"image\">	<img src=\"$thmbNlImg\" ></div></a>";
			}
			//
			echo "<div class=\"detail\">";  //start_detail
			echo "<div class=\"leftcol\">"; //start_leftcol
			echo "<a href=\"javascript:void(0)\"
		onclick=\"swap($carId,'$itemName'), insertimg('$dir',$carId,'$itemName','$jsImg')\">";
			$objCmn->printTitle($title, $itemName);
			echo "</a>";
			$objCar->printModel();
			$objCmn->printLocation($loc);
			$objCmn->printUpldTime($datetime);
			$price->printPrice($objCar);
			$objCmn->printMarketType($mkTyp);
			$objCmn->printAction($objCar, $objUser);
			echo "</div>"; //end_leftcol
			echo "</div>"; //end_detail
			//---------------------------------------------------------
			echo "<div class=\"showbutton_show\">
		<input title=\"ተጨማሪ መረጃ\"  class=\"show\" type=\"button\"
		onclick=\"swap($carId,'$itemName'), insertimg('$dir',$carId,'$itemName','$jsImg')\"
		value=\"Show Detail ተጨማሪ አሳይ\"/></div>";
			echo "</div>"; //end_col1
			echo "</div>"; //end_thumblist_*
			echo "<div class=\"clear\"></div>";
			//---------------------------------------------------------
			echo "<div style =\"display:none;\" id=\"divDetail_$uniqueId\">"; //start_divDetail_*
			echo "<div id=\"featured_detailed\">";							 //start_featured_detailed
			$objCmn->printGallery($objImg, $objDir, $image, $objCar, $carId);
			echo "<div class=\"showbutton_hide\">
		<input class=\"hide\" type=\"button\"  onclick=\"swapback($carId,'$itemName')\"
		value=\"Hide Detail ዝርዝር ደብቅ\"/></div>";
			echo "<div id=\"featured_right_side\">";						 //start_featured_right_side
			$objCmn->printTitle($title, $itemName);
			$objCmn->printSpecifics($objCar);
			$price->printPrice($objCar);
			$objCmn->printContactMethod($objDir, $uniqueId, $contactType, $carId, $itemName, $userName, $userPhone);
			$objCmn->printMailCfrm($uniqueId, $carId, $itemName);
			$objCmn->printReportReq($uniqueId, $carId, $itemName);
			$objCmn->printMailForm($uniqueId, $carId, $itemName, $userEmail);
			$objCmn->printReportCfrm($uniqueId, $carId, $itemName);
			echo "</div>"; //end_featured_right_side
			echo "</div>"; //end_featured_detailed
			echo "</div>"; //end_divDetail_*
			echo "</div>"; //end_divClassified
		}
		$carResult->close();
		unset($objImg);
		unset($objCmn);
		unset($objDir);
		unset($objUser);
		unset($objCar);
	}
}
