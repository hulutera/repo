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
            $globalVarObj = new HtGlobal();
            $start = ($calculatePageArray[0] - 1) * $globalVarObj::get('itemPerPage');
            $res = $this->_pItem->runQuery($condition, $start, $globalVarObj::get('itemPerPage'));
            $result = $this->_pItem->getResultSet();
            echo '<div class="row items-board">';
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
        global $documnetRootPath;
        $this->_pItem->setFieldValues($row);
        $id =  $this->_pItem->getId();
        $itemName = $this->_runnerName;
        $uniqueId = $itemName . $id;
        $commonViewObj = new HtCommonView($itemName);
             
        //image handler
        $imageDir = $commonViewObj->getImageDir($this->_pItem);
        $image = $this->_pItem->getFieldImage();
        if ($image != null){
            $imageArr = explode(',', $image);
            $numimage = sizeof($imageArr);
        } else {
            $language = isset($_GET['lan']) ? $_GET['lan'] : "en";
            $imageDir = "../images/". $language ."/";
            $numimage = 0;
            $imageArr = ["itemnotfound.png"];
        }
        
        $jsImg = implode(',', $imageArr);
        $strReplArr= array('[', ']', '"');
        $imgString = str_replace($strReplArr, "", $jsImg);
        $thmbnlImg  = $imageDir  . str_replace($strReplArr, "", $imageArr[0]);
        //---------------------------------------------------------
       
        echo "<div id =\"divCommon\" class=\"thumblist_$uniqueId col-xs-12 col-md-4\" >";    // #divCommon start
        echo "<div class=\"thumbnail tn_$uniqueId\">";  // .thumbnail starts
        if ($numimage == 0) {
            echo "<a href=\"javascript:void(0)\" onclick=\"swap($id,'$itemName')\" >";
            echo "<div><img class=\"img-thumbnail thumb-image\" src=\"$thmbnlImg\"></div></a>";
        } else {
            echo "<a href=\"javascript:void(0)\"
			onclick=\"swap($id,'$itemName')\">";
            echo "<div >	<img class=\"img-thumbnail thumb-image\" src=\"$thmbnlImg\"></div></a>";
        }
        //-------------------------------------------------------------------
        echo "<div class=\"caption\">";  // .caption start
        echo "<a href=\"javascript:void(0)\"
		onclick=\"swap($id,'$itemName')\">";
        $commonViewObj->displayTitle($this->_pItem);
        echo "</a>";
        $commonViewObj->displayLocation($this->_pItem);
        $commonViewObj->displayUpldTime($this->_pItem);
        $commonViewObj->displayPrice($this->_pItem);
        $commonViewObj->displayMarketType($this->_pItem);
        //---------------------------------------------------------
        echo "</div>"; // .caption end
        echo "</div>"; // .thumbnail end
        echo "</div>"; // #divCommon end
        //---------------------------------------------------------
        echo "<div style =\"display:none;\" class=\"featured_detailed2 col-xs-12 col-md-12\" id=\"divDetail_$uniqueId\">"; // .featured_detailed2 start
        echo "<div id=\"featured_right_sideRemove\" class=\"col-xs-12 col-md-4 align-center\">";    // start div for the left side of the item detailed section 
        echo "<div class=\"showbutton_hideRemove  col-xs-12 col-md-12\" style=\"margin-bottom:5px\" >
		<input class=\"hide-detailRemove btn btn-primary btn-xs\" style=\"width:100%\" type=\"button\"  onclick=\"swapback($id,'$itemName')\"
		value=\"".$GLOBALS['lang']['Hide Detail']."\"/></div>";
        $commonViewObj->displayTitle($this->_pItem);
        $this->_pItem->display();
        $commonViewObj->displayPrice($this->_pItem);
        $commonViewObj->displayContactMethod($uniqueId,  $this->_pItem, $itemName);
        $commonViewObj->displayMailCfrm($uniqueId, $id, $itemName);
        $commonViewObj->displayReportReq($uniqueId, $id, $itemName);
        $commonViewObj->displayMailForm($uniqueId, $id, $itemName,  $this->_pItem->getIdUser());
        $commonViewObj->displayReportCfrm($uniqueId, $id, $itemName);
        echo "</div>"; // left side div end
        $commonViewObj->displayGallery($imageDir, $imageArr, $numimage, $id, $itemName);
        echo "</div>"; // .featured_detailed2 end
       
          
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
        echo '<div id="spanMainColumnXRemove" class="jumbotron divItemNotFind">';
            echo '<p class="col-xs-12 col-md-12 bg-primary">'.$GLOBALS["lang"]["search res"].'</p>';
            echo '<div id="spanMainColumnXRemove" style="color: red">';
            echo $GLOBALS['lang']['full no match msg'];
        echo '</div></div>';
    }
}
