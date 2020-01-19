<?php
/*Latest phone from DB*/
function showPhone($itemId)
{
	//creating an object
	global $connect,$maxNumOfImg,$divCommon,$sentmsg,$abusemsg;
	$objPhone = new PhoneClass;
	$objUser  = new UserClass;
	$objDir   = new DirectoryClass;	
	$objCmn   = new CommonClass;
	$objImg   = new ImgHandler;
	$price    = new PriceClass;
	$dbQuery = DatabaseClass::getInstance()->getQuery($objPhone, $itemId);
	$connect = DatabaseClass::getInstance()->getConnection();
	$phoneResult = $connect->query($dbQuery);
	while($phonerow = $phoneResult->fetch_assoc())
	{
		$objUser->setUserElements($phonerow);
		$userName  = $objUser->getUserName();
		$userPhone = $objUser->getUserPhone();
		$userEmail = $objUser->getUserEmail();
		$userRole  = $objUser->getUserRole();
		$userId    = $objUser->getUserId();
		//
		$objPhone->setElements($phonerow);
		$phoneId = $objPhone->getId();
		$itemName      = $objPhone->getItemName();
		$uniqueId 	   = $itemName.$objPhone->getId();
		$datetime      = $objPhone->getUpldTime();
		$title         = $objPhone->getTitle();
		$loc    	   = $objPhone->getLoc();
		$mkTyp  	   = $objPhone->getMktType();
		$contactType   = $objPhone->getContactMethod();

		//Object for item Directory
		$objDir->setDirectory("phoneimages",$phoneId);
		$dir = $objDir->getDirectory();

		//Object for item Image
		$image    = $objImg->initImage($phonerow);
		$numimage = $objImg->getNumOfImg();

		//prepare image
		$imgArr   	= json_encode($image);
		$jsonImgobj = json_decode($imgArr,true);
		$jsImg 		= implode(',', array_values($jsonImgobj));

		//---------------------------------------------------------
		echo "<div class=\"divClassified\">";
		echo "<div id =\"divCommon\" class=\"thumblist_$uniqueId\">";
		echo "<div class=\"col1\">";
		if($numimage == 0)
		{
			echo "<a href=\"javascript:void(0)\" onclick=\"swap($phoneId,'$itemName')\" >";
			echo "<div class=\"image\"><img src=\"$objDir->IMG_NOT_AVAIL_THMBNL\"></div></a>";
		}
		else
		{
			$thmbNlImg  = $dir.'original/'.$image[1];
			echo "<a href=\"javascript:void(0)\"
			onclick=\"swap($phoneId,'$itemName'), insertimg('$dir',$phoneId,'$itemName','$jsImg')\">";
			echo "<div class=\"image\">	<img src=\"$thmbNlImg\" ></div></a>";
		}
		//
		echo "<div class=\"detail\">";  //start_detail
		echo "<div class=\"leftcol\">"; //start_leftcol
		echo "<a href=\"javascript:void(0)\"
		onclick=\"swap($phoneId,'$itemName'), insertimg('$dir',$phoneId,'$itemName','$jsImg')\">";
		$objCmn->printTitle($title,$itemName);
		echo "</a>";
		$objCmn->printLocation($loc);
		$objCmn->printUpldTime($datetime);
		$price->printPrice($objPhone);
		$objCmn->printMarketType($mkTyp);
		$objCmn->printAction($objPhone,$objUser);
		echo "</div>"; //end_leftcol
		echo "</div>"; //end_detail
		//---------------------------------------------------------
		echo "<div class=\"showbutton_show\">
		<input title=\"ተጨማሪ መረጃ\"  class=\"show\" type=\"button\"
		onclick=\"swap($phoneId,'$itemName'), insertimg('$dir',$phoneId,'$itemName','$jsImg')\"
		value=\"Show Detail ተጨማሪ አሳይ\"/></div>";
		echo "</div>"; //end_col1
		echo "</div>"; //end_thumblist_*
		echo "<div class=\"clear\"></div>";
		//---------------------------------------------------------
		echo "<div style =\"display:none;\" id=\"divDetail_$uniqueId\">";//start_divDetail_*
		echo "<div id=\"featured_detailed\">";							 //start_featured_detailed
		$objCmn->printGallery($objImg,$objDir,$image,$objPhone,$phoneId);
		echo "<div class=\"showbutton_hide\">
		<input class=\"hide\" type=\"button\"  onclick=\"swapback($phoneId,'$itemName')\"
		value=\"Hide Detail ዝርዝር ደብቅ\"/></div>";
		echo "<div id=\"featured_right_side\">";						 //start_featured_right_side
		$objCmn->printTitle($title,$itemName);
		$objCmn->printSpecifics($objPhone);
		$price->printPrice($objPhone);
		$objCmn->printContactMethod($objDir,$uniqueId,$contactType,$phoneId,$itemName,$userName,$userPhone);
		$objCmn->printMailCfrm($uniqueId,$phoneId,$itemName);
		$objCmn->printReportReq($uniqueId,$phoneId,$itemName);
		$objCmn->printMailForm($uniqueId,$phoneId,$itemName,$userEmail);
		$objCmn->printReportCfrm($uniqueId,$phoneId,$itemName);
		echo "</div>"; //end_featured_right_side
		echo "</div>"; //end_featured_detailed
		echo "</div>"; //end_divDetail_*
		echo "</div>"; //end_divClassified
	}
	$phoneResult->close();
	unset($objImg);
	unset($objCmn);
	unset($objDB);
	unset($objDir);
	unset($objUser);
	unset($objPhone);
}
?>