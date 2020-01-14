<?php
/*Latest computer from DB*/
function showComputer($itemId)
{
	//creating an object
	global $connect,$maxNumOfImg,$divCommon,$sentmsg,$abusemsg;
	$objComp = new CompClass;
	$objUser  = new UserClass;
	$objDir   = new DirectoryClass;
	$objDB    = new DatabaseClass;
	$objCmn   = new CommonClass;
	$objImg   = new ImgHandler;
	$price    = new PriceClass;
	$objDB->setQuery($objComp,$itemId);
	$compResult = $connect->query($objDB->getQuery($objComp));
	while($comprow = $compResult->fetch_assoc())
	{
		$objUser->setUserElements($comprow);
		$userName  = $objUser->getUserName();
		$userPhone = $objUser->getUserPhone();
		$userEmail = $objUser->getUserEmail();
		$userRole  = $objUser->getUserRole();
		$userId    = $objUser->getUserId();
		//
		$objComp->setElements($comprow);
		$compId     = $objComp->getId();
		$itemName    = $objComp->getItemName();
		$uniqueId 	 = $itemName.$objComp->getId();
		$datetime    = $objComp->getUpldTime();
		$title       = $objComp->getTitle();
		$loc    	 = $objComp->getLoc();
		$mkTyp  	 = $objComp->getMktType();
		$contactType = $objComp->getContactMethod();

		//Object for item Directory
		$objDir->setDirectory("computerimages",$compId);
		$dir = $objDir->getDirectory();

		//Object for item Image
		$image    = $objImg->initImage($comprow);
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
			echo "<a href=\"javascript:void(0)\" onclick=\"swap($compId,'$itemName')\" >";
			echo "<div class=\"image\"><img src=\"$objDir->IMG_NOT_AVAIL_THMBNL\"></div></a>";
		}
		else
		{
			$thmbNlImg  = $dir.'original/'.$image[1];
			echo "<a href=\"javascript:void(0)\"
			onclick=\"swap($compId,'$itemName'), insertimg('$dir',$compId,'$itemName','$jsImg')\">";
			echo "<div class=\"image\">	<img src=\"$thmbNlImg\" ></div></a>";
		}
		//
		echo "<div class=\"detail\">";  //start_detail
		echo "<div class=\"leftcol\">"; //start_leftcol
		echo "<a href=\"javascript:void(0)\"
		onclick=\"swap($compId,'$itemName'), insertimg('$dir',$compId,'$itemName','$jsImg')\">";
		$objCmn->printTitle($title,$itemName);
		echo "</a>";
		$objCmn->printLocation($loc);
		$objCmn->printUpldTime($datetime);
		$price->printPrice($objComp);
		$objCmn->printMarketType($mkTyp);
		$objCmn->printAction($objComp,$objUser);
		echo "</div>"; //end_leftcol
		echo "</div>"; //end_detail
		//---------------------------------------------------------
		echo "<div class=\"showbutton_show\">
		<input title=\"ተጨማሪ መረጃ\"  class=\"show\" type=\"button\"
		onclick=\"swap($compId,'$itemName'), insertimg('$dir',$compId,'$itemName','$jsImg')\"
		value=\"Show Detail ተጨማሪ አሳይ\"/></div>";
		echo "</div>"; //end_col1
		echo "</div>"; //end_thumblist_*
		echo "<div class=\"clear\"></div>";
		//---------------------------------------------------------
		echo "<div style =\"display:none;\" id=\"divDetail_$uniqueId\">";//start_divDetail_*
		echo "<div id=\"featured_detailed\">";							 //start_featured_detailed
		$objCmn->printGallery($objImg,$objDir,$image,$objComp,$compId);
		echo "<div class=\"showbutton_hide\">
		<input class=\"hide\" type=\"button\"  onclick=\"swapback($compId,'$itemName')\"
		value=\"Hide Detail ዝርዝር ደብቅ\"/></div>";
		echo "<div id=\"featured_right_side\">";						 //start_featured_right_side
		$objCmn->printTitle($title,$itemName);
		$objCmn->printSpecifics($objComp);
		$price->printPrice($objComp);
		$objCmn->printContactMethod($objDir,$uniqueId,$contactType,$compId,$itemName,$userName,$userPhone);
		$objCmn->printMailCfrm($uniqueId,$compId,$itemName);
		$objCmn->printReportReq($uniqueId,$compId,$itemName);
		$objCmn->printMailForm($uniqueId,$compId,$itemName,$userEmail);
		$objCmn->printReportCfrm($uniqueId,$compId,$itemName);
		echo "</div>"; //end_featured_right_side
		echo "</div>"; //end_featured_detailed
		echo "</div>"; //end_divDetail_*
		echo "</div>"; //end_divClassified
	}
	$compResult->close();
	unset($objImg);
	unset($objCmn);
	unset($objDB);
	unset($objDir);
	unset($objUser);
	unset($objComp);

}
?>