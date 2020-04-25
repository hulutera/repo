<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/pagination.php';


class HtMainView
{

    private $_runnerName; //track current running item name (car, ..., all, latest)
    private $_runnerId;   //track current running item id, optional for all, latest
    private $_pItem;      //track object to classes

    function __construct($newRunnerName, $newRunnerId=null)
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
    public function show($filter=null)
    {
        if ($this->_runnerName == 'latest') {
            $this->showLatest();
        } elseif ($this->_runnerName == 'search') {
            $this->search();
        } else {
                if ($filter != null) {
                    $this->showItem($filter);
                } else {
                    //$this->showItemWithId();
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
            //$this->showItemWithId();
        }
    }

    /**
     * Alternative interface to display item
     * e.g.
     *  (new HtMainView("car",null))->showItem();  //select * item 
     * @param resolved by construtor
     */
    public function showItem($filter)
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName);
        // Send query to the main item class
        $condition = "field_status = '$filter'";
        $rows = $this->_pItem->runQuery($condition);
        if($rows > 0) {
            $calculatePageArray = calculatePage($rows);
            $start = ($calculatePageArray[0] - 1) * HtGlobal::get('itemPerPage');
            $res = $this->_pItem->runQuery($condition, $start, HtGlobal::get('itemPerPage'));
            $result = $this->_pItem->getResultSet();
            echo '<div class="row">';
            while ($row = $result->fetch_assoc()) {
                $this->showItemWithId($row);
            }
            echo '</div>';
            pagination($this->_runnerName, $calculatePageArray[1], $calculatePageArray[0], 0);
        } else {
            $this->itemNotFound();
        }
    }


    /**
     *  This function shows a search result
     * 
     */
    public function search(){
       
    }
    /**
     * Alternative interface to display item with id
     * e.g.
     *  (new HtMainView("car",12))->showItemWithId();  //select * item where id=12
     * @param resolved by construtor
     */
    public function showItemWithId($row)
    {
        $this->_pItem->setFieldAll($row);
        $id =  $this->_pItem->getId();
        $itemName = $this->_runnerName;
        $uniqueId = $itemName . $id;
        $commonViewObj = new HtCommonView($itemName);
             
        //image handler
        $imageDir = $commonViewObj->getImageDir($this->_pItem);
        $image = $this->_pItem->getFieldImage();
        $imageArr = explode(',', $image);
        $numimage = sizeof($imageArr);
        $jsImg = implode(',', $imageArr);
        $strReplArr= array('[', ']', '"');
        $imgString = str_replace($strReplArr, "", $jsImg);

        //---------------------------------------------------------
       echo "<div id =\"divCommon\" class=\"thumblist_$uniqueId col-md-4 col-md-4\" style =\"height:400px\" >";
        echo "<div class=\"col1 thumbnail\">";
        if ($numimage == 1) {
            echo "<a href=\"javascript:void(0)\" onclick=\"swap($id,'$itemName')\" >";
            echo "<div class=\"img-thumbnail\" <img src=\"$pImage->IMG_NOT_AVAIL_THMBNL\"></div></a>";
        } else {
            $thmbNlImg  = $imageDir  . str_replace($strReplArr, "", $imageArr[0]);
            echo "<a href=\"javascript:void(0)\"
			onclick=\"swap($id,'$itemName'), insertimg('$imageDir',$id,'$itemName',$imgString)\">";
            echo "<div>	<img src=\"$thmbNlImg\" class=\"img-thumbnail\"></div></a>";
        }
        //-------------------------------------------------------------------
        echo "<div class=\"caption\">";  //start_detail
        echo "<div class=\"caption\">"; //start_leftcol
        echo "<a href=\"javascript:void(0)\"
		onclick=\"swap($id,'$itemName'), insertimg('$imageDir',$id,'$itemName',$imgString)\">";
        $commonViewObj->displayTitle($this->_pItem);
        echo "</a>";
        $commonViewObj->displayLocation($this->_pItem);
        $commonViewObj->displayUpldTime($this->_pItem);
        $commonViewObj->displayPrice($this->_pItem);
        
        //optional item on thumbnail only for car, phone and computer
        $commonViewObj->displayMake($this->_pItem);
        
        $commonViewObj->displayMarketType($this->_pItem);
        echo "</div>"; //end_leftcol
        echo "</div>"; //end_detail
        //---------------------------------------------------------
        echo "<div class=\"showbutton_show\" style =\"width:auto\">
		<input class=\"show\" type=\"button\"
		onclick=\"swap($id,'$itemName'), insertimg('$imageDir',$id,'$itemName',$imgString)\"
		value=\"".$GLOBALS['lang']['Show Detail']."\"/ ></div>";
        echo "</div>"; //end_col1
        echo "</div>"; //end_thumblist_*
        //echo "<div class=\"clear\"></div>";
        //---------------------------------------------------------
        echo "<div style =\"display:none;\" id=\"divDetail_$uniqueId\">"; //start_divDetail_*
        echo "<div id=\"featured_detailed\">";                             //start_featured_detailed
        $commonViewObj->displayGallery($imageDir, $imageArr, $id, $itemName);
        echo "<div class=\"showbutton_hide\">
		<input class=\"hide-detail\" type=\"button\"  onclick=\"swapback($id,'$itemName')\"
		value=\"".$GLOBALS['lang']['Hide Detail']."\"/></div>";
        echo "<div id=\"featured_right_side\">";                         //start_featured_right_side
        $commonViewObj->displayTitle($this->_pItem);
        $this->_pItem->display();
        $commonViewObj->displayPrice($this->_pItem);
        $commonViewObj->displayContactMethod($uniqueId,  $this->_pItem, $itemName);
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
                //$this->showItemWithId();
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
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId, null);
        $this->_pItem->upload();
    }

    /**
     * Shall be used when there is no item to show
     * This function shall expect to take more args for search
     */

    public function itemNotFound() {
        global $lang;
        echo '<div id="mainColumnX" style="width:80%; margin-left:auto;margin-right:auto;float:none;">
            <p style="text-align:center;padding-top:10px;padding-bottom:10px;background-color:#378de5;color:white">'.$lang['search res'].'</p>';
            echo '<div id="spanMainColumnX" style="color: red">';
            
                echo $lang['full no match msg'];
                       
        echo '</div></div>';
    }
}
