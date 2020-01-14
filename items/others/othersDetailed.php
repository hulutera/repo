<?php
/*Latest other from DB*/
function showOthers($itemId)
{
	//creating an object
	global $connect,$maxNumOfImg,$divCommon,$sentmsg,$abusemsg;
	$objOther = new OtherClass;
	$objUser  = new UserClass;
	$objDir   = new DirectoryClass;
	$objDB    = new DatabaseClass;
	$objCmn   = new CommonClass;
	$objImg   = new ImgHandler;
	$price    = new PriceClass;
	$objDB->setQuery($objOther,$itemId);
	$otherResult = $connect->query($objDB->getQuery($objOther));
	while($otherrow = $otherResult->fetch_assoc())
	{
		$objUser->setUserElements($otherrow);
		$userName  = $objUser->getUserName();
		$userPhone = $objUser->getUserPhone();
		$userEmail = $objUser->getUserEmail();
		$userRole  = $objUser->getUserRole();
		$userId    = $objUser->getUserId();
		//
		$objOther->setElements($otherrow);
		$otherId = $objOther->getId();
		$itemName      = $objOther->getItemName();
		$uniqueId 	   = $itemName.$objOther->getId();
		$datetime      = $objOther->getUpldTime();
		$title         = $objOther->getTitle();
		$loc    	   = $objOther->getLoc();
		$mkTyp  	   = $objOther->getMktType();
		$contactType   = $objOther->getContactMethod();

		//Object for item Directory
		$objDir->setDirectory("othersimages",$otherId);
		$dir = $objDir->getDirectory();
		
		//Object for item Image
		$image    = $objImg->initImage($otherrow);
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
			echo "<a href=\"javascript:void(0)\" onclick=\"swap($otherId,'$itemName')\" >";
			echo "<div class=\"image\"><img src=\"$objDir->IMG_NOT_AVAIL_THMBNL\"></div></a>";
		}
		else
		{
			$thmbNlImg  = $dir.'original/'.$image[1];
			echo "<a href=\"javascript:void(0)\"
			onclick=\"swap($otherId,'$itemName'), insertimg('$dir',$otherId,'$itemName','$jsImg')\">";
			echo "<div class=\"image\">	<img src=\"$thmbNlImg\" ></div></a>";
		}
		//
		echo "<div class=\"detail\">";  //start_detail
		echo "<div class=\"leftcol\">"; //start_leftcol
		echo "<a href=\"javascript:void(0)\"
		onclick=\"swap($otherId,'$itemName'), insertimg('$dir',$otherId,'$itemName','$jsImg')\">";
		$objCmn->printTitle($title,$itemName);
		echo "</a>";
		$objCmn->printLocation($loc);
		$objCmn->printUpldTime($datetime);
		$price->printPrice($objOther);
		$objCmn->printMarketType($mkTyp);
		$objCmn->printAction($objOther,$objUser);
		echo "</div>"; //end_leftcol
		echo "</div>"; //end_detail
		//---------------------------------------------------------
		echo "<div class=\"showbutton_show\">
		<input title=\"ተጨማሪ መረጃ\"  class=\"show\" type=\"button\"
		onclick=\"swap($otherId,'$itemName'), insertimg('$dir',$otherId,'$itemName','$jsImg')\"
		value=\"Show Detail ተጨማሪ አሳይ\"/></div>";
		echo "</div>"; //end_col1
		echo "</div>"; //end_thumblist_*
		echo "<div class=\"clear\"></div>";
		//---------------------------------------------------------
		echo "<div style =\"display:none;\" id=\"divDetail_$uniqueId\">";//start_divDetail_*
		echo "<div id=\"featured_detailed\">";							 //start_featured_detailed
		$objCmn->printGallery($objImg,$objDir,$image,$objOther,$otherId);
		echo "<div class=\"showbutton_hide\">
		<input class=\"hide\" type=\"button\"  onclick=\"swapback($otherId,'$itemName')\"
		value=\"Hide Detail ዝርዝር ደብቅ\"/></div>";
		echo "<div id=\"featured_right_side\">";						 //start_featured_right_side
		$objCmn->printTitle($title,$itemName);
		$objCmn->printSpecifics($objOther);
		$price->printPrice($objOther);
		$objCmn->printContactMethod($objDir,$uniqueId,$contactType,$otherId,$itemName,$userName,$userPhone);
		$objCmn->printMailCfrm($uniqueId,$otherId,$itemName);
		$objCmn->printReportReq($uniqueId,$otherId,$itemName);
		$objCmn->printMailForm($uniqueId,$otherId,$itemName,$userEmail);
		$objCmn->printReportCfrm($uniqueId,$otherId,$itemName);
		echo "</div>"; //end_featured_right_side
		echo "</div>"; //end_featured_detailed
		echo "</div>"; //end_divDetail_*
		echo "</div>"; //end_divClassified
	}
	$otherResult->close();
	unset($objImg);
	unset($objCmn);
	unset($objDB);
	unset($objDir);
	unset($objUser);
	unset($objOther);
}
?>