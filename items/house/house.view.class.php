<?php
/*latest house from DB*/
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/view/price.view.class.php';
require_once $documnetRootPath . '/cmn/cmn.class.php';
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/object/objectPool.class.php';

class HouseView
{
	
	function show($itemId)
	{
		//creating an object
		global $maxNumOfImg,$divCommon,$sentmsg,$abusemsg;
		$objHouse = new HouseClass;
	
		$objDir   = new DirectoryClass;
		$objCmn   = new CommonClass;
		$objImg   = new ImgHandler;
		$price    = new PriceClass;
		$dbQuery = DatabaseClass::getInstance()->getQuery($objHouse, $itemId);
		$connect = DatabaseClass::getInstance()->getConnection();
		$houseResult = $connect->query($dbQuery);
		while($houserow = $houseResult->fetch_assoc())
		{
			$objUser  = new UserClass($houserow);
			//
			$objHouse->setElements($houserow);
			$houseId     = $objHouse->getId();
			$itemName    = $objHouse->getItemName();
			$uniqueId 	 = $itemName.$objHouse->getId();
			$datetime    = $objHouse->getUpldTime();
			$title       = $objHouse->getTitle();
			$loc    	 = $objHouse->getLoc();
			$mkTyp  	 = $objHouse->getMktType();
			$contactType = $objHouse->getContactMethod();

			//Object for item Directory
			$objDir->setDirectory("houseimages",$houseId);
			$dir = $objDir->getDirectory();

			//Object for item Image
			$image    = $objImg->initImage($houserow);
			$numimage = $objImg->getNumOfImg();

			//prepare image
			$imgArr   	= json_encode($image);
			$jsonImgobj = json_decode($imgArr,true);
			$jsImg 		= implode(',', array_values($jsonImgobj));

			//---------------------------------------------------------
			echo "<div class=\"divClassified\">";
			echo "<div id =\"divCommon\" class=\"thumblist_$uniqueId\">";
			echo "<div class=\"col1\">";
			if($numimage == 1)
			{
				echo "<a href=\"javascript:void(0)\" onclick=\"swap($houseId,'$itemName')\" >";
				echo "<div class=\"image\"><img src=\"$objDir->IMG_NOT_AVAIL_THMBNL\"></div></a>";
			}
			else
			{
				$thmbNlImg  = $dir.'original/'.$image[1];
				echo "<a href=\"javascript:void(0)\"
				onclick=\"swap($houseId,'$itemName'), insertimg('$dir',$houseId,'$itemName','$jsImg')\">";
				echo "<div class=\"image\">	<img src=\"$thmbNlImg\" ></div></a>";
			}
			//
			echo "<div class=\"detail\">";  //start_detail
			echo "<div class=\"leftcol\">"; //start_leftcol
			echo "<a href=\"javascript:void(0)\"
			onclick=\"swap($houseId,'$itemName'), insertimg('$dir',$houseId,'$itemName','$jsImg')\">";
			$objCmn->printTitle($title,$itemName);
			echo "</a>";
			$objCmn->printLocation($loc);
			$objCmn->printUpldTime($datetime);
			$price->printPrice($objHouse);
			$objCmn->printMarketType($mkTyp);
			$objCmn->printAction($objHouse,$objUser);
			echo "</div>"; //end_leftcol
			echo "</div>"; //end_detail
			//---------------------------------------------------------
			echo "<div class=\"showbutton_show\">
			<input title=\"???? ???\"  class=\"show\" type=\"button\"
			onclick=\"swap($houseId,'$itemName'), insertimg('$dir',$houseId,'$itemName','$jsImg')\"
			value=\"Show Detail ???? ???\"/></div>";
			echo "</div>"; //end_col1
			echo "</div>"; //end_thumblist_*
			echo "<div class=\"clear\"></div>";
			//---------------------------------------------------------
			echo "<div style =\"display:none;\" id=\"divDetail_$uniqueId\">";//start_divDetail_*
			echo "<div id=\"featured_detailed\">";							 //start_featured_detailed
			$objCmn->printGallery($objImg,$objDir,$image,$objHouse,$houseId);
			echo "<div class=\"showbutton_hide\">
			<input class=\"hide\" type=\"button\"  onclick=\"swapback($houseId,'$itemName')\"
			value=\"Hide Detail ???? ???\"/></div>";
			echo "<div id=\"featured_right_side\">";						 //start_featured_right_side
			$objCmn->printTitle($title,$itemName);
			$objCmn->printSpecifics($objHouse);
			$price->printPrice($objHouse);
			$objCmn->printContactMethod($objDir,$uniqueId,$contactType,$houseId,$itemName,$objUser);
			$objCmn->printMailCfrm($uniqueId,$houseId,$itemName);
			$objCmn->printReportReq($uniqueId,$houseId,$itemName);
			$objCmn->printMailForm($uniqueId,$houseId,$itemName,$objUser);
			$objCmn->printReportCfrm($uniqueId,$houseId,$itemName);
			echo "</div>"; //end_featured_right_side
			echo "</div>"; //end_featured_detailed
			echo "</div>"; //end_divDetail_*
			echo "</div>"; //end_divClassified
			unset($objUser);
		}
		$houseResult->close();
		unset($objImg);
		unset($objCmn);
		unset($objDB);
		unset($objDir);
		unset($objHouse);
	}
}
