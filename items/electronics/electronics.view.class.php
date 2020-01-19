<?php

$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/view/price.view.class.php';
require_once $documnetRootPath . '/cmn/cmn.class.php';
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/object/objectPool.class.php';

class ElectronicsView
{
/*Latest electronics from DB*/
    function show($itemId)
    {
        //creating an object
        global $connect,$maxNumOfImg,$divCommon,$sentmsg,$abusemsg;
        $objElec  = new ElecClass;
        $objUser  = new UserClass;
        $objDir   = new DirectoryClass;
        $objCmn   = new CommonClass;
        $objImg   = new ImgHandler;
        $price    = new PriceClass;
        $dbQuery = DatabaseClass::getInstance()->getQuery($objElec, $itemId);
		$connect = DatabaseClass::getInstance()->getConnection();
		$electronicsResult = $connect->query($dbQuery);
        while($electronicsrow = $electronicsResult->fetch_assoc())
        {
            $objUser->setUserElements($electronicsrow);
            $userName  = $objUser->getUserName();
            $userPhone = $objUser->getUserPhone();
            $userEmail = $objUser->getUserEmail();
            $userRole  = $objUser->getUserRole();
            $userId    = $objUser->getUserId();
            //
            $objElec->setElements($electronicsrow);
            $electronicsId = $objElec->getId();
            $itemName      = $objElec->getItemName();
            $uniqueId 	   = $itemName.$objElec->getId();
            $datetime      = $objElec->getUpldTime();
            $title         = $objElec->getTitle();
            $loc    	   = $objElec->getLoc();
            $mkTyp  	   = $objElec->getMktType();
            $contactType   = $objElec->getContactMethod();

            //Object for item Directory
            $objDir->setDirectory("electronicsimages",$electronicsId);
            $dir = $objDir->getDirectory();

            //Object for item Image
            $image    = $objImg->initImage($electronicsrow);
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
                echo "<a href=\"javascript:void(0)\" onclick=\"swap($electronicsId,'$itemName')\" >";
                echo "<div class=\"image\"><img src=\"$objDir->IMG_NOT_AVAIL_THMBNL\"></div></a>";
            }
            else
            {
                $thmbNlImg  = $dir.'original/'.$image[1];
                echo "<a href=\"javascript:void(0)\"
                onclick=\"swap($electronicsId,'$itemName'), insertimg('$dir',$electronicsId,'$itemName','$jsImg')\">";
                echo "<div class=\"image\">	<img src=\"$thmbNlImg\" ></div></a>";
            }
            //
            echo "<div class=\"detail\">";  //start_detail
            echo "<div class=\"leftcol\">"; //start_leftcol
            echo "<a href=\"javascript:void(0)\"
            onclick=\"swap($electronicsId,'$itemName'), insertimg('$dir',$electronicsId,'$itemName','$jsImg')\">";
            $objCmn->printTitle($title,$itemName);
            echo "</a>";
            $objCmn->printLocation($loc);
            $objCmn->printUpldTime($datetime);
            $price->printPrice($objElec);
            $objCmn->printMarketType($mkTyp);
            $objCmn->printAction($objElec,$objUser);
            echo "</div>"; //end_leftcol
            echo "</div>"; //end_detail
            //---------------------------------------------------------
            echo "<div class=\"showbutton_show\">
            <input title=\"ተጨማሪ መረጃ\"  class=\"show\" type=\"button\"
            onclick=\"swap($electronicsId,'$itemName'), insertimg('$dir',$electronicsId,'$itemName','$jsImg')\"
            value=\"Show Detail ተጨማሪ አሳይ\"/></div>";
            echo "</div>"; //end_col1
            echo "</div>"; //end_thumblist_*
            echo "<div class=\"clear\"></div>";
            //---------------------------------------------------------
            echo "<div style =\"display:none;\" id=\"divDetail_$uniqueId\">";//start_divDetail_*
            echo "<div id=\"featured_detailed\">";							 //start_featured_detailed
            $objCmn->printGallery($objImg,$objDir,$image,$objElec,$electronicsId);
            echo "<div class=\"showbutton_hide\">
            <input class=\"hide\" type=\"button\"  onclick=\"swapback($electronicsId,'$itemName')\"
            value=\"Hide Detail ዝርዝር ደብቅ\"/></div>";
            echo "<div id=\"featured_right_side\">";						 //start_featured_right_side
            $objCmn->printTitle($title,$itemName);
            $objCmn->printSpecifics($objElec);
            $price->printPrice($objElec);
            $objCmn->printContactMethod($objDir,$uniqueId,$contactType,$electronicsId,$itemName,$userName,$userPhone);
            $objCmn->printMailCfrm($uniqueId,$electronicsId,$itemName);
            $objCmn->printReportReq($uniqueId,$electronicsId,$itemName);
            $objCmn->printMailForm($uniqueId,$electronicsId,$itemName,$userEmail);
            $objCmn->printReportCfrm($uniqueId,$electronicsId,$itemName);
            echo "</div>"; //end_featured_right_side
            echo "</div>"; //end_featured_detailed
            echo "</div>"; //end_divDetail_*
            echo "</div>"; //end_divClassified
        }
        $electronicsResult->close();
        unset($objImg);
        unset($objCmn);
        unset($objDB);
        unset($objDir);
        unset($objUser);
        unset($objElec);
    }
}
?>