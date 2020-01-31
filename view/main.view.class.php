<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/view/price.view.class.php';
require_once $documnetRootPath . '/classes/cmn.class.php';
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/classes/objectPool.class.php';
class MainView
{
    private $_itemName;
    private $_pItem;

    function __construct($itemName)
    {
        $this->_itemName = $itemName;
    }

    function __destruct()
    {
        $this->_pItem = null;
    }

    /**/
    public function show($itemId)
    {
        //creating an object
        $this->_pItem = ObjectPool::getInstance()->getClassObject($this->_itemName);
        $dbQuery = DatabaseClass::getInstance()->getQuery($this->_pItem, $itemId);
        $connect = DatabaseClass::getInstance()->getConnection();

        $result = $connect->query($dbQuery);
        while ($row = $result->fetch_assoc()) {

            $this->showRowContent($row);
        }
        $result->close();
    }

    private function showRowContent($row)
    {
        $pCommon = new CommonClass;
        $pImage = new ImgHandler;
        $pPrice = new PriceClass;
        $pUser  = new UserClass($row);

        $this->_pItem->setElements($row);
        $id = $this->_pItem->getId();
        $itemName = $this->_pItem->getItemName();
        $uniqueId = $itemName . $this->_pItem->getId();
        $datetime = $this->_pItem->getUpldTime();
        $title = $this->_pItem->getTitle();
        $location = $this->_pItem->getLoc();
        $mkTyp = $this->_pItem->getMktType();
        $contactType = $this->_pItem->getContactMethod();

        //Object for item Directory
        $dir = $pImage->setDirectory($itemName, $id);

        //Object for item Image
        $image    = $pImage->initImage($row);
        $numimage = $pImage->getNumOfImg();

        //prepare image
        $imgArr = json_encode($image);
        $jsonImgobj = json_decode($imgArr, true);
        $jsImg = implode(',', array_values($jsonImgobj));

        //---------------------------------------------------------
        echo "<div class=\"divClassified\">";
        echo "<div id =\"divCommon\" class=\"thumblist_$uniqueId\">";
        echo "<div class=\"col1\">";
        if ($numimage == 1) {
            echo "<a href=\"javascript:void(0)\" onclick=\"swap($id,'$itemName')\" >";
            echo "<div class=\"image\"><img src=\"$pImage->IMG_NOT_AVAIL_THMBNL\"></div></a>";
        } else {
            $thmbNlImg  = $dir . 'original/' . $image[1];
            echo "<a href=\"javascript:void(0)\"
			onclick=\"swap($id,'$itemName'), insertimg('$dir',$id,'$itemName','$jsImg')\">";
            echo "<div class=\"image\">	<img src=\"$thmbNlImg\" ></div></a>";
        }
        //
        echo "<div class=\"detail\">";  //start_detail
        echo "<div class=\"leftcol\">"; //start_leftcol
        echo "<a href=\"javascript:void(0)\"
		onclick=\"swap($id,'$itemName'), insertimg('$dir',$id,'$itemName','$jsImg')\">";
        $pCommon->printTitle($title, $itemName);
        echo "</a>";
        $this->_pItem->printItemSpecific();
        $pCommon->printLocation($location);
        $pCommon->printUpldTime($datetime);
        $pPrice->printPrice($this->_pItem);
        $pCommon->printMarketType($mkTyp);
        $pCommon->printAction($this->_pItem, $pUser);
        echo "</div>"; //end_leftcol
        echo "</div>"; //end_detail
        //---------------------------------------------------------
        echo "<div class=\"showbutton_show\">
		<input title=\"ተጨማሪ መረጃ\"  class=\"show\" type=\"button\"
		onclick=\"swap($id,'$itemName'), insertimg('$dir',$id,'$itemName','$jsImg')\"
		value=\"Show Detail ተጨማሪ አሳይ\"/></div>";
        echo "</div>"; //end_col1
        echo "</div>"; //end_thumblist_*
        echo "<div class=\"clear\"></div>";
        //---------------------------------------------------------
        echo "<div style =\"display:none;\" id=\"divDetail_$uniqueId\">"; //start_divDetail_*
        echo "<div id=\"featured_detailed\">";                             //start_featured_detailed
        $pCommon->printGallery($pImage, $image, $this->_pItem, $id);
        echo "<div class=\"showbutton_hide\">
		<input class=\"hide\" type=\"button\"  onclick=\"swapback($id,'$itemName')\"
		value=\"Hide Detail ዝርዝር ደብቅ\"/></div>";
        echo "<div id=\"featured_right_side\">";                         //start_featured_right_side
        $pCommon->printTitle($title, $itemName);
        $pCommon->printSpecifics($this->_pItem);
        $pPrice->printPrice($this->_pItem);
        $pCommon->printContactMethod($pImage, $uniqueId, $contactType, $id, $itemName, $pUser);
        $pCommon->printMailCfrm($uniqueId, $id, $itemName);
        $pCommon->printReportReq($uniqueId, $id, $itemName);
        $pCommon->printMailForm($uniqueId, $id, $itemName, $pUser);
        $pCommon->printReportCfrm($uniqueId, $id, $itemName);
        echo "</div>"; //end_featured_right_side
        echo "</div>"; //end_featured_detailed
        echo "</div>"; //end_divDetail_*
        echo "</div>"; //end_divClassified
        unset($pUser);
        unset($pCommon);
        unset($pImage);
        unset($pPrice);
    }
}
