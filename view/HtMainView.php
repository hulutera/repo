<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/pagination.php';
require_once $documnetRootPath . '/view/HtCommonView.php';
class HtMainView
{

    private $_runnerName; //track current running item name (car, ..., all, latest)
    private $_runnerId;   //track current running item id, optional for all, latest
    private $_pItem;      //track object to classes
    private $_itemNumber;
    private $_itemName2Id = [
        'car' => 1,
        'house' => 2,
        'computer' => 3,
        'phone' => 4,
        'electronic' => 5,
        'household' => 6,
        'other' => 7,
    ];

    function __construct($newRunnerName, $newRunnerId = null, $newRunnerStatus = null)
    {
        $this->_runnerName = $newRunnerName;
        $this->_runnerId = $newRunnerId;
        $this->_runnerStatus = $newRunnerStatus;
        $this->_itemNumber = 100 * $this->_runnerId + $this->_itemName2Id[$this->_runnerName];
    }

    function __destruct()
    {
        // Exit
    }

    public function getItemObject()
    {
        return $this->_pItem;
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
    public function show($filter = null)
    {
        if ($this->_runnerName == 'search') {
            $this->displaySearch();
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
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId("latest");
        $rows = $this->_pItem->runQuery();

        if ($rows > 0) {
            $calculatePageArray = calculatePage($rows);
            $globalVarObj = new HtGlobal();
            $start = ($calculatePageArray[0] - 1) * $globalVarObj::get('itemPerPage');
            $this->_pItem->runQuery($start, $globalVarObj::get('itemPerPage'));
            $result = $this->_pItem->getResultSet();
            echo '<div class="row items-board">';
            while ($row = $result->fetch_assoc()) {
                $this->_runnerName = $row['field_item_name'];
                $this->_pItem = ObjectPool::getInstance()->getObjectWithId($row['field_item_name']);
                $item_id = $row['id_item'];
                $condition = "WHERE id = $item_id";
                $this->_pItem->runQuery($condition);
                $fetchItemRow = $this->_pItem->getResultSet();
                while ($itemRow = $fetchItemRow->fetch_assoc()) {
                    $this->_itemNumber = 100 * $item_id + $this->_itemName2Id[$this->_runnerName];
                    $this->showItemWithId($itemRow);
                }
            }
            echo '</div>';
            search_pagination($calculatePageArray[0], $calculatePageArray[1], "", "All", "All");
        } else {
            $this->itemNotFound();
        }
    }


    public function showRawData($filter = null)
    {
        $dataOnly = [];
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName);
        $condition = "WHERE field_status = '$filter'";
        $this->_pItem->runQuery($condition);
        $result = $this->_pItem->getResultSet();
        while ($row = $result->fetch_assoc()) {
            array_push($dataOnly, $row);
        }
        return $dataOnly;
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
        $condition = "WHERE field_status = '$filter'";
        $rows = $this->_pItem->runQuery($condition);
        if ($rows > 0) {
            $calculatePageArray = calculatePage($rows);
            $start = ($calculatePageArray[0] - 1) * HtGlobal::get('itemPerPage');
            $res = $this->_pItem->runQuery($condition, $start, HtGlobal::get('itemPerPage'));
            $result = $this->_pItem->getResultSet();
            echo '<div class="row items-board">';
            $number = 0;
            while ($row = $result->fetch_assoc()) {
                // check if the user is alos active fetching
                $user = new HtUserAll($row['id_user']);
                if ($filter == 'active' && !$user->isAccountStatusActive()) {
                    continue;
                }
                $number++;
                //item count
                $this->_itemNumber = $number;
                $this->showItemWithId($row);
            }
            echo '</div>';
            if (empty($dataOnly) && empty($this->_runnerId)) {
                pagination($this->_runnerName, $calculatePageArray[1], $calculatePageArray[0], 0);
            }
        } else {
            $this->itemNotFound();
        }
    }

    /**
     *
     */
    public function showOneItem()
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId, $this->_runnerStatus);
        $result = $this->_pItem->getResultSet();
        $sql =  $this->_pItem->lastSql();
        $result = $this->_pItem->query($sql);
        $result->data_seek(0);
        //$this->dumpData();
        while ($row = $result->fetch_assoc()) {
            //echo '<div class="row items-board">';
            $this->showItemWithId($row);
            //echo '</div>';
        }

    }

    private function dumpData(){
        var_dump($this->_runnerName);
        var_dump($this->_runnerId);
        var_dump($this->_runnerStatus);
        var_dump($this->_pItem->lastSql());
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
        $itemNumber = $this->_itemNumber;
        $this->_pItem->setFieldValues($row);
        $id =  $this->_pItem->getId();
        $itemName = $this->_runnerName;
        $uniqueId = $itemName . $id;
        $commonViewObj = new HtCommonView($itemName);
        //image handler
        $imageDir = $commonViewObj->getImageDir($this->_pItem);
        $image = $this->_pItem->getFieldImage();
        if ($image != null) {
            $imageArr = explode(',', $image);
            $numimage = sizeof($imageArr);
        } else {
            $language = isset($_GET['lan']) ? $_GET['lan'] : "en";
            $imageDir = "../images/" . $language . "/";
            $numimage = 0;
            $imageArr = ["itemnotfound.png"];
        }

        $jsImg = implode(',', $imageArr);
        $strReplArr = array('[', ']', '"');
        $imgString = str_replace($strReplArr, "", $jsImg);
        $thmbnlImg  = $imageDir  . str_replace($strReplArr, "", $imageArr[0]);

        //---------------------------------------------------------
        /*START @ col-md-4 col-sm-6*/
        echo '<div class="col-md-4 col-sm-6 thumblist_'.$uniqueId.'">';
        /*START @ thumbnail thumbnail-property features*/
        echo '<div class="thumbnail thumbnail-property features">';
        /*START @ property-image object-fit-container compat-object-fit*/
        echo '<div class="property-image object-fit-container compat-object-fit">';
        echo "<a href=\"javascript:void(0)\" onclick=\"swap('$itemName', " . $itemNumber . ")\" >";
        echo '<div class="object-fit-imagediv" style="background-image: url(&quot;'.$thmbnlImg.'&quot;);"></div>';
        echo '</a>';

        echo '<div class="image-count"><i class="icon-image"></i><span>2</span></div>';
        echo '<div class="budget budget-used"><div class="budget-mask"><span>'.$commonViewObj->displayMarketTypeNoCss($this->_pItem).'</span></div></div>';
    //     echo '<a href="listing.html" class="property-image-hover">
    //     <span class="property-im-m property-im-m-lt"></span>
    //     <span class="property-im-m property-im-m-lb"></span>
    //     <span class="property-im-m property-im-m-rt"></span>
    //     <span class="property-im-m property-im-m-rb"></span>
    // </a>';
        echo  '</div>';
        /*END @property-image object-fit-container compat-object-fit*/

        /*START @ Caption*/
        echo '<div class="caption">';
        echo '<div class="anchor">
            <a href="#" class=""><i class="fa fa-bookmark"></i>
            </a>
        </div>';



        echo'
        <h3 class="property-title">';
        echo "<a href=\"javascript:void(0)\"
        onclick=\"swap('$itemName', " . $itemNumber . ")\">";
        echo $commonViewObj->displayTitle($this->_pItem);
        echo "</a>";
        echo '</h3>';

        echo '<p class="property-description"></p>';
        $commonViewObj->displayLocation($this->_pItem);
        $commonViewObj->displayUpldTime($this->_pItem);
        echo '<span class="property-field">';
        $commonViewObj->displayPrice($this->_pItem);
        echo '</span>
        <div class="property-ratings">
            <i class="icon-star-ratings-1"></i>
        </div>';
        echo '</div>';
        /*END @Caption*/
        echo '</div>';
        /*END @thumbnail thumbnail-property features*/
        echo  '</div>';
        //---------------------------------------------------------






/*
        //---------------------------------------------------------
        echo "<div id =\"divCommon\" class=\"thumblist_$uniqueId col-xs-12 col-md-4\" >";    // #divCommon start
        echo "<div class=\"thumbnail tn_$itemName" . "_" . $itemNumber . "\">";  // .thumbnail starts
        if ($numimage == 0) {
            echo "<a href=\"javascript:void(0)\" onclick=\"swap('$itemName', " . $itemNumber . ")\" >";
            echo "<div><img class=\"img-thumbnail thumb-image\" src=\"$thmbnlImg\"></div></a>";
        } else {
            echo "<a href=\"javascript:void(0)\"
			onclick=\"swap('$itemName', " . $itemNumber . ")\">";
            echo "<div >	<img class=\"img-thumbnail thumb-image\" src=\"$thmbnlImg\"></div></a>";
        }
        //-------------------------------------------------------------------
        echo "<div class=\"caption\">";  // .caption start
        echo "<a href=\"javascript:void(0)\"
        onclick=\"swap('$itemName', " . $itemNumber . ")\">";
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
        */
        //---------------------------------------------------------
        echo "<div style =\"display:none;\" class=\"featured_detailed2 col-xs-12 col-md-12\" id=\"divDetail_$itemName" . "_" . $itemNumber . "\">"; // .featured_detailed2 start
        echo "<div id=\"featured_right_sideRemove\" class=\"col-xs-12 col-md-4 align-center\">";    // start div for the left side of the item detailed section
        echo "<div class=\"showbutton_hideRemove  col-xs-12 col-md-12\" style=\"margin-bottom:5px\" >
		<input class=\"hide-detailRemove btn btn-primary btn-xs\" style=\"width:100%\" type=\"button\"  onclick=\"swapback('$itemName', " . $itemNumber . ")\"
		value=\"" . $GLOBALS['lang']['Hide Detail'] . "\"/></div>";
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
     *  This function shows a search result
     *
     */
    public function displaySearch()
    {
        global $locationPerTable, $lang, $str_url, $lang_url;

        $searchWordSanitized = $_GET['search_text'];
        $city = $_GET['cities'];
        $item = $_GET['item'];
        $globalVarObj = new HtGlobal();
        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $itemstart = ($page - 1) * $globalVarObj::get('itemPerPage');

        // To set value for item
        if ($item == "All" or $item == "000") {
            $queryItem = ObjectPool::getInstance()->getObjectSpecial("all");
        } else {
            $queryItem = ObjectPool::getInstance()->getObjectSpecial($item);
        }


        if ($searchWordSanitized == "" and $city == "000" and $item == "000") {
            $this->failedSearch($searchWordSanitized, $city, $item);
        } else if ($searchWordSanitized == "" and ($city == "All" or $city == "000") and ($item == "All" or $item == "000")) {
            $this->showLatest();
        } else if (($searchWordSanitized != "" or $searchWordSanitized == "") and ($item == "All" or $item == "000")) {
            $this->allItemSearch($queryItem);
        } else {
            $this->singleItemSearch($queryItem);
        }
    }

    /*
      Search in all Items
    */
    public function allItemSearch($queryItem)
    {
        $elements_array = array();
        foreach ($queryItem as $key => $value) {
            $value->setSearchElements();
            $value->searchQuery(null, null, "all-items");
            $result = $value->getResultSet();
            while ($elm = $result->fetch_assoc()) {
                array_push($elements_array, $elm);
            }
        }

        $rows = count($elements_array);

        if ($rows > 0) {
            // Sort matched element with date
            uasort($elements_array, array($this, 'date_compare'));

            // descending order
            array_reverse($elements_array);

            $calculatePageArray = calculatePage($rows);
            $globalVarObj = new HtGlobal();
            $start = ($calculatePageArray[0] - 1) * $globalVarObj::get('itemPerPage');

            // fetched elements per page
            $elm_rows = array_slice($elements_array,  $start,  $globalVarObj::get('itemPerPage'));

            echo '<div class="row items-board">';
            $number = 0;
            foreach ($elm_rows as $value) {
                $number++;
                //item count
                $this->_itemNumber = $number;
                $obj_pool = new ObjectPool();
                $it = $obj_pool->tableType2item[$value['field_table_type']];
                $main_obj = $obj_pool->getObjectWithId($it);
                $this->_runnerName = $it;
                $this->_pItem = $main_obj;
                $item_id = $value['id'];
                $condition = "WHERE id = $item_id";
                $obj = $main_obj->runQuery($condition);
                $fetchItemRow = $this->_pItem->getResultSet();
                while ($ab = $fetchItemRow->fetch_assoc()) {
                    $this->showItemWithId($ab);
                }
            }
            echo '</div>';
            $get_array = $_GET;
            search_item_pagination($calculatePageArray[0], $calculatePageArray[1], $get_array);
        } else {
            $this->itemNotFound();
        }
    }

    /*
      Search per Items
    */
    public function singleItemSearch($queryItem)
    {
        $rows = 0;
        foreach ($queryItem as $key => $value) {
            $value->setSearchElements();
            $row =  $value->searchQuery(null, null, "single-item");
            $rows += $row;
        }

        if ($rows > 0) {
            $number = 0;
            foreach ($queryItem as $key => $value) {
                $this->_pItem = $value;
                $this->_runnerName = $key;
                $calculatePageArray = calculatePage($rows);
                $globalVarObj = new HtGlobal();
                $start = ($calculatePageArray[0] - 1) * $globalVarObj::get('itemPerPage');
                $res = $value->searchQuery($start, $globalVarObj::get('itemPerPage'), "single-item");
                $result = $value->getResultSet();
                echo '<div class="row items-board">';
                while ($row = $result->fetch_assoc()) {
                    $number++;
                    //item count
                    $this->_itemNumber = $number;
                    $this->showItemWithId($row);
                }
                echo '</div>';
            }
            $get_array = $_GET;
            search_item_pagination($calculatePageArray[0], $calculatePageArray[1], $get_array);
        } else {
            $this->itemNotFound();
        }
    }

    // Compare dates function
    public function date_compare($element1, $element2)
    {
        $datetime1 = strtotime($element1['field_upload_date']);
        $datetime2 = strtotime($element2['field_upload_date']);
        return $datetime1 - $datetime2;
    }

    /**
     * Shall be used when there is no item to show
     * This function shall expect to take more args for search
     */
    public function itemNotFound($searchWordSanitized = null, $city = null, $item = null)
    {
        echo '<div id="spanMainColumnXRemove" class="jumbotron divItemNotFind">';
        echo '<p class="col-xs-12 col-md-12 bg-primary">' . $GLOBALS["lang"]["search res"] . '</p>';
        echo '<div id="spanMainColumnXRemove" style="color: red">';
        echo $GLOBALS['lang']['full no match msg'];
        echo '</div></div>';
    }

    public function failedSearch($searchWordSanitized = null, $city = null, $item = null)
    {
        echo '<div id="spanMainColumnXRemove" class="jumbotron divItemNotFind">';
        echo '<p class="col-xs-12 col-md-12 bg-primary">' . $GLOBALS["lang"]["search res"] . '</p>';
        echo '<div id="spanMainColumnXRemove" style="color: red">';
        echo $GLOBALS['lang']['failed search'];
        echo '</div></div>';
    }
}
