<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.php';
require_once $documnetRootPath . '/includes/pagination.php';
require_once $documnetRootPath . '/view/HtCommonView.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
require_once $documnetRootPath . '/includes/validate.php';

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
        'search' => 8
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

        $number = 0;
        if ($rows > 0) {
            $calculatePageArray = calculatePage($rows);
            $start = ($calculatePageArray[0] - 1) * $GLOBALS['general']['itemPerPage'];
            $this->_pItem->runQuery($start, $GLOBALS['general']['itemPerPage']);
            $result = $this->_pItem->getResultSet();
            echo '<div class="row items-board">';
            while ($row = $result->fetch_assoc()) {
                $number++;
                $this->_runnerName = $row['field_item_name'];
                $this->_pItem = ObjectPool::getInstance()->getObjectWithId($row['field_item_name']);
                $item_id = $row['id_item'];
                $condition = "WHERE id = $item_id";
                $this->_pItem->runQuery($condition);
                $fetchItemRow = $this->_pItem->getResultSet();
                while ($itemRow = $fetchItemRow->fetch_assoc()) {
                    $this->_itemNumber = $number;
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
        $ab = ObjectPool::getInstance();
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName);
        // Send query to the main item class
        $condition = "WHERE field_status = '$filter'";
        $rows = $this->_pItem->runQuery($condition);
        if ($rows > 0) {
            $calculatePageArray = calculatePage($rows);
            $start = ($calculatePageArray[0] - 1) * $GLOBALS['general']['itemPerPage'];
            $res = $this->_pItem->runQuery($condition, $start, $GLOBALS['general']['itemPerPage']);
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
    public function showOneItem($item_order = null)
    {
        $this->_itemNumber = $item_order;
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId, $this->_runnerStatus);
        $result = $this->_pItem->getResultSet();
        $sql =  $this->_pItem->lastSql();
        $result = $this->_pItem->query($sql);
        $result->data_seek(0);

        while ($row = $result->fetch_assoc()) {
            $this->showItemWithId($row);
        }
    }

    private function dumpData()
    {
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
        if (isset($_SESSION['uID'])) {
            $user = new HtUserAll($_SESSION['uID']);
        }
        global $documnetRootPath, $lang_url;
        $itemNumber = $this->_itemNumber;
        $this->_pItem->setFieldValues($row);
        $id =  $this->_pItem->getId();
        $itemName = $this->_runnerName;
        $uniqueId = $itemName . '-' . $id;
        $commonViewObj = new HtCommonView($itemName);
        //image handler
        $imageDir = $commonViewObj->getImageDir($this->_pItem);
        $image = $this->_pItem->getFieldImage();

        $uploadsFiles = null;
        if (is_dir($imageDir)) { //check if directory exist
            // scan uploads directory
            $uploadsFiles = array_diff(scandir($imageDir), array('.', '..'));
        }

        if (empty($uploadsFiles) || !isset($image)) {
            $imageDir = "../images/en/";
            $numimage = 0;
            $imageArr = ["en.svg"];
        } else {
            $imageArr = explode(',', $image);
            $numimage = sizeof($imageArr);
        }

        $jsImg = implode(',', $imageArr);
        $strReplArr = array('[', ']', '"');
        $imgString = str_replace($strReplArr, "", $jsImg);
        $thmbnlImg  = $imageDir  . str_replace($strReplArr, "", $imageArr[0]);
        if(!file_exists($thmbnlImg))
        {
            $thmbnlImg = "../images/en/en.svg";
            $numimage = 0;
        }

        //---------------------------------------------------------
        /*START @ divCommon col-md-4 col-sm-6*/
        if(isset($_GET['status']) and isset($_GET['id'])) {
            if ($_GET['status'] != NULL and $_GET['id'] != NULL) {
                $style = "style=\"height:480px\"";
            } else {
                $style = "style=\"height:380px\"";
            }
        } else {
            $style = "style=\"height:380px\"";
        }

        echo "<div id =\"divCommon\" class=\"thumblist_$itemName" . "_" . $itemNumber . " col-xs-12 col-md-4 col-sm-6\">";

        echo "<div class=\"thumbnail tn_$itemName" . "_" . $itemNumber . "\">";  // .thumbnail starts
        /*START @ thumbnail thumbnail-property features*/
        echo '<div class="thumbnail thumbnail-property features" '. $style .'>';
        /*START @ property-image object-fit-container compat-object-fit*/
        echo '<div class="property-image object-fit-container compat-object-fit">';
        echo '<div class="image-count"><i class="icon-image"></i><span>' . $numimage . '</span></div>';
        echo '<img src="' . $thmbnlImg . '" alt="" />';

        echo "<a   href=\"javascript:void(0)\"  class=\"property-image-hover\" onclick=\"swap('$itemName', " . $itemNumber . ")\" id=\"thumbnail_" . $itemName . "_" . $itemNumber . "\">";

        echo '<span class="property-im-m property-im-m-lt"></span>
             <span class="property-im-m property-im-m-lb"></span>
             <span class="property-im-m property-im-m-rt"></span>
             <span class="property-im-m property-im-m-rb"></span>
         </a>';
         echo  '</div>';
         echo '<p style="background-color:#19D9FD;margin-top:1px;color:black;text-align:center">' . $commonViewObj->displayMarketTypeNoCss($this->_pItem) . '</p>';
        /*END @property-image object-fit-container compat-object-fit*/

        /*START @ Caption*/
        echo '<div class="caption">';

        echo '<h3 class="property-title">';
        echo "<a   href=\"javascript:void(0)\"
        onclick=\"swap('$itemName', " . $itemNumber . ")\">";
        echo $commonViewObj->displayTitle($this->_pItem);
        echo "</a>";
        echo '</h3>';

        echo '<p class="property-description"></p>';
        $commonViewObj->displayLocation($this->_pItem);
        $commonViewObj->displayUpldTime($this->_pItem);
        echo '<span class="property-field">';
        $commonViewObj->displayPrice($this->_pItem);
        global $str_url;
        if ("template.content.php" == basename($_SERVER['PHP_SELF'])) {
            if ($row['id_user'] == $user->getId()) {
                echo '<div class="' . $uniqueId .'-rem-msg col-xs-12 col-md-12 rem-action-div" style="border:1px solid black;color:color">';
                    echo '<p style="color:red">'. $GLOBALS['lang']['item remove confirmation msg'] . '</p>';
                    echo "</br></br><button type=\"button\" class=\"btn btn-success\" onclick=\"item_action('$uniqueId', $itemNumber)\">" . $GLOBALS['lang']['yes'] . "</button> &nbsp;&nbsp; <button type=\"button\" class=\"btn btn-danger\" onclick=\"hideShowSingleDivs('". $uniqueId."-rem-msg', '". $uniqueId."-myItem-action')\">" . $GLOBALS['lang']['no'] . "</button>";
                echo '</div>';
                echo '<div class="' . $uniqueId .'-myItem-action">';
                $editLink = "";
                foreach ($row as $key => $value) {
                    $temp = "&" .$key ."=" .$value;
                    $editLink .= $temp;
                }
                $editLink = ltrim($editLink,'&');
                $crypto = new Cryptor();
                $editLinkCrypted = $crypto->urlencode_base64_encode_encryptor($editLink);
                echo '<a href="../includes/template.upload.php?function=upload&type='.$itemName.'&action=edit&data='.$editLinkCrypted.$str_url.'"><button type="button" class="btn btn-primary" >' . $GLOBALS["lang"]["edit"] . '</button></a>';
                echo "</br></br><button type=\"button\" class=\"btn btn-danger\" onclick=\"hideShowSingleDivs('". $uniqueId."-myItem-action', '". $uniqueId."-rem-msg')\">" . $GLOBALS['lang']['remove'] . "</button>";
                echo '</div>';
            }
        }
        echo '</span>';
        if (isset($user) && ($user->isWebMaster() || $user->isAdmin())) {
            echo '<p class="h4">' . $uniqueId . '</p>';
        }
        echo '</div>';
        /*END @Caption*/
        echo '</div>';
        echo '</div>';
        /*END @thumbnail thumbnail-property features*/
        echo  "</div>"; // #divCommon end
        //---------------------------------------------------------

        echo "<div style =\"display:none;\" class=\"featured_detailed col-xs-12 col-sm-12 col-md-12\" id=\"divDetail_$itemName" . "_" . $itemNumber . "\">"; // .featured_detailed2 start
        echo "<div id=\"featured_right_sideRemove\" class=\"col-xs-12 col-md-4 align-center\">";    // start div for the left side of the item detailed section
        echo "<div class=\"showbutton_hideRemove  bg-success col-xs-12 col-md-12\" style=\"margin-bottom:5px;margin-top:5px\" >
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
        echo "</div>"; // .featured_detailed end

    }

    /**
     * Main interface to display item for upload
     * e.g.
     *  (new HtMainView("all",null))->show();    // select * from all  (car, computer, ...)
     *  (new HtMainView("car",null))->show();     // select * car
     *  (new HtMainView("car",13))->show();       // select * car where id=13
     *  (new HtMainView("latest",null))->show();  //select * latestupdate
     *
     * @param resolved by construtor
     */
    public function upload($data = null)
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId, null);
        $this->_pItem->upload($data);
    }


    /**
     * Main interface to display item for editing item
     * e.g.
     *  (new HtMainView("all",null))->show();    // select * from all  (car, computer, ...)
     *  (new HtMainView("car",null))->show();     // select * car
     *  (new HtMainView("car",13))->show();       // select * car where id=13
     *  (new HtMainView("latest",null))->show();  //select * latestupdate
     *
     * @param resolved by construtor
     */
    public function edit($data = null)
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId, null);
        $this->_pItem->edit($data);
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
        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $itemstart = ($page - 1) * $GLOBALS['general']['itemPerPage'];

        // To set value for item
        if ($item == "All" or $item == "000") {
            $queryItem = ObjectPool::getInstance()->getObjectSpecial("all");
        } else {
            $queryItem = ObjectPool::getInstance()->getObjectSpecial($item);
        }


        if ($searchWordSanitized == "" and $city == "000" and $item == "000") {
            $this->failedSearch();
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
            $start = ($calculatePageArray[0] - 1) * $GLOBALS['general']['itemPerPage'];

            // fetched elements per page
            $elm_rows = array_slice($elements_array,  $start,  $GLOBALS['general']['itemPerPage']);

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
                while ($row = $fetchItemRow->fetch_assoc()) {
                    $this->showItemWithId($row);
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
                $start = ($calculatePageArray[0] - 1) * $GLOBALS['general']['itemPerPage'];
                $res = $value->searchQuery($start, $GLOBALS['general']['itemPerPage'], "single-item");
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
    public function itemNotFound()
    {
        $searchWordSanitized = isset($_GET['search_text']) ? (!empty($_GET['search_text'])) ?  "*" . $_GET['search_text'] . "*" : "" : "";
        echo '<div id="spanMainColumnXRemove" class="jumbotron divItemNotFind">';
        echo '<p class="col-xs-12 col-md-12 bg-primary">' . $GLOBALS["lang"]["search res"] . '</p>';
        echo '<div id="spanMainColumnXRemove" style="color: red;font-size:17px">';
        echo  '<span style="color:black">' . $searchWordSanitized . '</span><br />';
        echo $GLOBALS['lang']['full no match msg'];
        echo '</div></div>';
    }

    public function failedSearch()
    {
        echo '<div id="spanMainColumnXRemove" class="jumbotron divItemNotFind">';
        echo '<p class="col-xs-12 col-md-12 bg-primary">' . $GLOBALS["lang"]["search res"] . '</p>';
        echo '<div id="spanMainColumnXRemove" style="color: red;font-size:17px">';
        echo $GLOBALS['lang']['failed search'];
        echo '</div></div>';
    }
}
