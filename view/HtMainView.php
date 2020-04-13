<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';


class HtMainView
{

    private $_runnerName; //track current running item name (car, ..., all, latest)
    private $_runnerId;   //track current running item id, optional for all, latest
    private $_pItem;      //track object to classes

    function __construct($newRunnerName, $newRunnerId)
    {
        $this->_runnerName = $newRunnerName;
        $this->_runnerId = $newRunnerId;
    }

    function __destruct()
    {
        $this->_pItem->__destruct();
    }

    /**
     * Main interface to display item
     * e.g.
     *  (new HtMainView("all",null))->show();    // select * from all  (car, computer, ...)
     *  (new HtMainView("car",null))->show();     // select * car
     *  (new HtMainView("car",13))->show();       // select * car where id=13
     *  (new HtMainView("latest",null))->show();  //select * latestupdate 
     *  
     * @param resolved by construtor
     */
    public function show()
    {
        if ($this->_runnerName == 'latest') {
            $this->showLatest();
        } elseif ($this->_runnerName == 'all') {
            $this->showAll();
        } else {
            if (!empty($this->_runnerId)) {
                if ($this->_runnerId == "*") {
                    $this->showItem();
                } else {
                    $this->showItemWithId();
                }
            }
        }
    }

    /**
     * Alternative interface to display item
     * e.g.
     *  (new HtMainView("latest",null))->showLatest();  //select * latestupdate 
     *  
     * @param resolved by construtor
     */
    public function showLatest()
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId);
        $result = $this->_pItem->getResultSet();
        while ($row = $result->fetch_assoc()) {
            $runnerObj = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $row['id']);
            $this->_runnerId = $runnerObj->getId();
            $this->_runnerName = $runnerObj->getFieldItemName();
            $this->showItemWithId();
        }
    }

    /**
     * Alternative interface to display item
     * e.g.
     *  (new HtMainView("car",null))->showItem();  //select * item 
     * @param resolved by construtor
     */
    public function showItem()
    {
        $tempFilter_statua = "active";
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId, $tempFilter_statua);
        $result = $this->_pItem->getResultSet();
        while ($row = $result->fetch_assoc()) {
            $this->showItemWithId($row, $this->_pItem);
        }
    }

    /**
     * Alternative interface to display item with id
     * e.g.
     *  (new HtMainView("car",12))->showItemWithId();  //select * item where id=12
     * @param resolved by construtor
     */
    public function showItemWithId($row, $itemObj)
    {
        //$this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId);
        $itemObj->elemSetter($row);
        $id = $itemObj->getId();
        $itemName = $this->_runnerName;
        $uniqueId = $itemName . $id;
        $commonViewObj = new HtCommonView($itemName);
        //$contactType = $this->_pItem->getFieldContactMethod();
        
        //image handler
        $imageDir = $commonViewObj->getImageDir($itemObj);
        $image = $this->_pItem->getFieldImage();
        $imageArr = explode(',', $image);
        $numimage = sizeof($imageArr);
        $jsImg = implode(',', $imageArr);
        $strReplArr= array('[', ']', '"');
        $imgString = str_replace($strReplArr, "", $jsImg);
        
        //---------------------------------------------------------
       echo "<div id =\"divCommon\" class=\"thumblist_$uniqueId\">";
        echo "<div class=\"col1\">";
        if ($numimage == 1) {
            echo "<a href=\"javascript:void(0)\" onclick=\"swap($id,'$itemName')\" >";
            echo "<div class=\"image\"><img src=\"$pImage->IMG_NOT_AVAIL_THMBNL\"></div></a>";
        } else {
            $thmbNlImg  = $imageDir  . str_replace($strReplArr, "", $imageArr[0]);
            echo "<a href=\"javascript:void(0)\"
			onclick=\"swap($id,'$itemName'), insertimg('$imageDir',$id,'$itemName',$imgString)\">";
            echo "<div class=\"image\">	<img src=\"$thmbNlImg\" ></div></a>";
        }
        //
        echo "<div class=\"detail\">";  //start_detail
        echo "<div class=\"leftcol\">"; //start_leftcol
        echo "<a href=\"javascript:void(0)\"
		onclick=\"swap($id,'$itemName'), insertimg('$imageDir',$id,'$itemName',$imgString)\">";
        $commonViewObj->displayTitle($itemObj);
        echo "</a>";
        $commonViewObj->displayLocation($itemObj);
        $commonViewObj->displayUpldTime($itemObj);
        $commonViewObj->displayPrice($itemObj);
        $commonViewObj->displayMake($itemObj);
        $commonViewObj->displayMarketType($itemObj);
        echo "</div>"; //end_leftcol
        echo "</div>"; //end_detail
        //---------------------------------------------------------
        echo "<div class=\"showbutton_show\">
		<input title=\"ተጨማሪ መረጃ\"  class=\"show\" type=\"button\"
		onclick=\"swap($id,'$itemName'), insertimg('$imageDir',$id,'$itemName',$imgString)\"
		value=\"Show Detail ተጨማሪ አሳይ\"/></div>";
        echo "</div>"; //end_col1
        echo "</div>"; //end_thumblist_*
        echo "<div class=\"clear\"></div>";
        //---------------------------------------------------------
        echo "<div style =\"display:none;\" id=\"divDetail_$uniqueId\">"; //start_divDetail_*
        echo "<div id=\"featured_detailed\">";                             //start_featured_detailed
        $commonViewObj->displayGallery($imageDir, $imageArr, $id, $itemName);
        echo "<div class=\"showbutton_hide\">
		<input class=\"hide\" type=\"button\"  onclick=\"swapback($id,'$itemName')\"
		value=\"Hide Detail ዝርዝር ደብቅ\"/></div>";
        echo "<div id=\"featured_right_side\">";                         //start_featured_right_side
        $commonViewObj->displayTitle($itemObj);
        $this->_pItem->display();
        $commonViewObj->displayPrice($itemObj);
        $commonViewObj->displayContactMethod($uniqueId, $itemObj, $itemName);
        $commonViewObj->displayMailCfrm($uniqueId, $id, $itemName);
        $commonViewObj->displayReportReq($uniqueId, $id, $itemName);
        $commonViewObj->displayMailForm($uniqueId, $id, $itemName, $pUser);
        $commonViewObj->displayReportCfrm($uniqueId, $id, $itemName);
        echo "</div>"; //end_featured_right_side
        echo "</div>"; //end_featured_detailed
        echo "</div>"; //end_divDetail_*
           
    }

    /**
     * Alternative interface to display item with id
     * e.g.
     *  (new HtMainView("all",null))->showAll();  //select * item where id=12
     * @param resolved by construtor
     */
    public function showAll()
    {
        //every thing from one item
        // all, array pointers return 
        $this->_pItem = ObjectPool::getInstance()->getObjectSpecial($this->_runnerName, $this->_runnerId);
        foreach ($this->_pItem as $key => $value) {
            $this->_pItem = $value;
            $result = $this->_pItem->getResultSet();
            while ($row = $result->fetch_assoc()) {
                $this->_runnerId = $row['id'];
                $this->_runnerName = $key;
                $this->showItemWithId();
            }
        }
    }

    /**
     * Main interface to display item
     * e.g.
     *  (new HtMainView("all",null))->show();    // select * from all  (car, computer, ...)
     *  (new HtMainView("car",null))->show();     // select * car
     *  (new HtMainView("car",13))->show();       // select * car where id=13
     *  (new HtMainView("latest",null))->show();  //select * latestupdate 
     *  
     * @param resolved by construtor
     */
    public function upload()
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId);
        $this->_pItem->upload();
    }
}
