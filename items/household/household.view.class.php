<?php
/*Latest household from DB*/
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/view/price.view.class.php';
require_once $documnetRootPath . '/cmn/cmn.class.php';
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/object/objectPool.class.php';

class HouseholdView
{
    function show($itemId)
    {
        //creating an object
        global $maxNumOfImg,$divCommon,$sentmsg,$abusemsg;
        $objHouseHold  = new HouseHoldClass;
        $objUser       = new UserClass;
        $objDir        = new DirectoryClass;
        $objCmn        = new CommonClass;
        $objImg        = new ImgHandler;
        $price         = new PriceClass;
        $dbQuery = DatabaseClass::getInstance()->getQuery($objHouseHold, $itemId);
		$connect = DatabaseClass::getInstance()->getConnection();
		$householdResult = $connect->query($dbQuery);
        while($householdrow = $householdResult->fetch_assoc())
        {
            $objUser->setUserElements($householdrow);
            $userName  = $objUser->getUserName();
            $userPhone = $objUser->getUserPhone();
            $userEmail = $objUser->getUserEmail();
            $userRole  = $objUser->getUserRole();
            $userId    = $objUser->getUserId();
            //
            $objHouseHold->setElements($householdrow);
            $householdId   = $objHouseHold->getId();
            $itemName      = $objHouseHold->getItemName();
            $uniqueId 	   = $itemName.$objHouseHold->getId();
            $datetime      = $objHouseHold->getUpldTime();
            $title         = $objHouseHold->getTitle();
            $loc    	   = $objHouseHold->getLoc();
            $mkTyp  	   = $objHouseHold->getMktType();
            $contactType   = $objHouseHold->getContactMethod();

            //Object for item Directory
            $objDir->setDirectory("householdimages",$householdId);
            $dir = $objDir->getDirectory();
            

            //Object for item Image
            $image    = $objImg->initImage($householdrow);
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
                echo "<a href=\"javascript:void(0)\" onclick=\"swap($householdId,'$itemName')\" >";
                echo "<div class=\"image\"><img src=\"$objDir->IMG_NOT_AVAIL_THMBNL\"></div></a>";
            }
            else
            {
                $thmbNlImg  = $dir.'original/'.$image[1];
                echo "<a href=\"javascript:void(0)\"
                onclick=\"swap($householdId,'$itemName'), insertimg('$dir',$householdId,'$itemName','$jsImg')\">";
                echo "<div class=\"image\">	<img src=\"$thmbNlImg\" ></div></a>";
            }
            //
            echo "<div class=\"detail\">";  //start_detail
            echo "<div class=\"leftcol\">"; //start_leftcol
            echo "<a href=\"javascript:void(0)\"
            onclick=\"swap($householdId,'$itemName'), insertimg('$dir',$householdId,'$itemName','$jsImg')\">";
            $objCmn->printTitle($title,$itemName);
            echo "</a>";
            $objCmn->printLocation($loc);
            $objCmn->printUpldTime($datetime);
            $price->printPrice($objHouseHold);
            $objCmn->printMarketType($mkTyp);
            $objCmn->printAction($objHouseHold,$objUser);
            echo "</div>"; //end_leftcol
            echo "</div>"; //end_detail
            //---------------------------------------------------------
            echo "<div class=\"showbutton_show\">
            <input title=\"ተጨማሪ መረጃ\"  class=\"show\" type=\"button\"
            onclick=\"swap($householdId,'$itemName'), insertimg('$dir',$householdId,'$itemName','$jsImg')\"
            value=\"Show Detail ተጨማሪ አሳይ\"/></div>";
            echo "</div>"; //end_col1
            echo "</div>"; //end_thumblist_*
            echo "<div class=\"clear\"></div>";
            //---------------------------------------------------------
            echo "<div style =\"display:none;\" id=\"divDetail_$uniqueId\">";//start_divDetail_*
            echo "<div id=\"featured_detailed\">";							 //start_featured_detailed
            $objCmn->printGallery($objImg,$objDir,$image,$objHouseHold,$householdId);
            echo "<div class=\"showbutton_hide\">
            <input class=\"hide\" type=\"button\"  onclick=\"swapback($householdId,'$itemName')\"
            value=\"Hide Detail ዝርዝር ደብቅ\"/></div>";
            echo "<div id=\"featured_right_side\">";						 //start_featured_right_side
            $objCmn->printTitle($title,$itemName);
            $objCmn->printSpecifics($objHouseHold);
            $price->printPrice($objHouseHold);
            $objCmn->printContactMethod($objDir,$uniqueId,$contactType,$householdId,$itemName,$userName,$userPhone);
            $objCmn->printMailCfrm($uniqueId,$householdId,$itemName);
            $objCmn->printReportReq($uniqueId,$householdId,$itemName);
            $objCmn->printMailForm($uniqueId,$householdId,$itemName,$userEmail);
            $objCmn->printReportCfrm($uniqueId,$householdId,$itemName);
            echo "</div>"; //end_featured_right_side
            echo "</div>"; //end_featured_detailed
            echo "</div>"; //end_divDetail_*
            echo "</div>"; //end_divClassified
        }
        $householdResult->close();
        unset($objImg);
        unset($objCmn);
        unset($objDB);
        unset($objDir);
        unset($objUser);
        unset($objHouseHold);
    }
}
?>