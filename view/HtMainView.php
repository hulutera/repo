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
        'search' => 8,
        'latest'=>9
    ];

    function __construct($newRunnerName, $newRunnerId = null, $newRunnerStatus = null)
    {
        $this->_runnerName = $newRunnerName;
        $this->_runnerId = $newRunnerId;
        $this->_runnerStatus = $newRunnerStatus == null ? 'active' : $newRunnerStatus;
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
    public function show($filter = null, $skipPagination = null, $skipId = null)
    {
        if ($this->_runnerName == 'search') {
            $this->displaySearch();
        }
        else if ($this->_runnerName == 'latest') {
            $this->showLatest();
        } else {
            if ($filter != null) {
                $this->showItem($filter, $skipPagination, $skipId);
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
            $get_array = $_GET;
            search_item_pagination($calculatePageArray[0], $calculatePageArray[1], $get_array);
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
    public function showItem($filter, $skipPagination = null, $skipId = null)
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
                // check if the user is also active fetching
                $user = new HtUserAll($row['id_user']);
                if ($filter == 'active' && !$user->isAccountStatusActive()) {
                    continue;
                }
                if ($skipId == (int)$row['id']) {
                    continue;
                }
                $number++;
                //item count
                $this->_itemNumber = $number;
                $this->showItemWithId($row);
            }
            echo '</div>';
            if (empty($dataOnly) && empty($this->_runnerId)) {
                pagination($this->_runnerName, $calculatePageArray[1], $calculatePageArray[0]);
            }
        } else {
            $this->itemNotFound();
        }
    }

    public function listRelatedItem($status)
    {
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName);
        // Send query to the main item class
        $condition = "WHERE field_status = '$status' LIMIT 5";
        $rows = $this->_pItem->runQuery($condition);
        if ($rows > 1) {
            echo '<p class="h3 text-info">' . $GLOBALS['lang']['related items'] . '</p>';
            $result = $this->_pItem->getResultSet();
            while ($row = $result->fetch_assoc()) {
                $user = new HtUserAll($row['id_user']);
                if((int)$_GET['id']==(int)$row['id'])
                {
                    continue;
                }
                if ($status == 'active' && !$user->isAccountStatusActive()) {
                    continue;
                }
                //item count
                $this->_itemNumber++;
                echo '<div class="col-md-4">';
                $this->showItemWithId($row);
                echo '</div>';
            }
        }
    }

    public function thumbnail($row)
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

        $imageArray = json_decode($this->_pItem->getFieldImage());
        $imageDir = "";
        if (isset($imageArray)) {
            $imageDir = $commonViewObj->getImageDir($this->_pItem);
        } else {
            $imageDir = "../images/en/";
            $imageArray = ["../images/en/en.svg"];
        }
        //prepend with image directory
        foreach ($imageArray as &$value1) {
            $value1 = $imageDir . "thumbnail/" . $value1;
        }

        $numimage = sizeof($imageArray);
        $thmbnlImg  = $imageArray[0];

        //---------------------------------------------------------
        /*START @ divCommon col-md-4 col-sm-6*/
        $style = "style=\"height:450px\"";
        $url = $_SERVER['REQUEST_URI'];
        if (basename(parse_url($url)['path']) == "detail.php")
            $size = " col-xs-12 col-md-12 col-sm-6";
        else
            $size = " col-xs-12 col-md-4 col-sm-6";

        echo '<a href="../includes/detail.php?type=' . $itemName . '&status=' . $this->_runnerStatus . '&id=' . $id .'">';
        echo "<div id =\"divCommon\" class=\"thumblist_$itemName" . "_" . $itemNumber . $size . "\">";
        echo "<div class=\"thumbnail tn_$itemName" . "_" . $itemNumber . "\">";  // .thumbnail starts
        /*START @ thumbnail thumbnail-property features*/
        echo '<div class="thumbnail thumbnail-property features" ' . $style . '>';
        /*START @ property-image object-fit-container compat-object-fit*/
        echo '<div class="property-image object-fit-container compat-object-fit">';
        echo '<div class="image-count"><i style="color:;font-size:16px;background-color:#333" class="icon-image"></i><span style="color:black;font-size:16px;">' . $numimage . '</span></div>';
        echo '<img src="' . $thmbnlImg . '" alt="" />';
        echo  '</div>';
        /*END @property-image object-fit-container compat-object-fit*/

        /*START @ Caption*/
        echo '<div class="caption">';
        echo '<h3 class="property-title">';
        echo $commonViewObj->displayTitle($this->_pItem);
        echo '</h3>';

        echo '<p class="property-description"></p>';
        $commonViewObj->displayLocation($this->_pItem);
        $commonViewObj->displayUpldTime($this->_pItem);
        echo '<p>';
        $commonViewObj->displayPrice($this->_pItem);
        echo '<br><p style="background-color:#e9ebee;text-align:center;border-radius:2px;padding:5px;">' . $commonViewObj->displayMarketTypeNoCss($this->_pItem) . '</p>';

        global $str_url;
        if ("template.content.php" == basename($_SERVER['PHP_SELF'])) {
            if ($row['id_user'] == $user->getId()) {
                $actualLink = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                echo '<div class="' . $uniqueId . '-rem-msg col-xs-12 col-md-12 rem-action-div" style="border:1px solid black;color:color">';
                echo '<p style="color:red">' . $GLOBALS['lang']['item remove confirmation msg'] . '</p>';
                echo "<p><button style=\"margin:4px;\" type=\"button\" class=\"btn btn-success\" onclick=\"item_action('$uniqueId', $itemNumber, $actualLink)\">" . $GLOBALS['lang']['yes']. "</button>";
                echo "<button style=\"margin:4px;\" type=\"button\" class=\"btn btn-danger\" onclick=\"hideShowSingleDivs('" . $uniqueId . "-rem-msg', '" . $uniqueId . "-myItem-action')\">" . $GLOBALS['lang']['no'] . "</button>";
                echo '</p></div>';

                echo '<div class="' . $uniqueId . '-myItem-action">';
                $editLink = "";
                foreach ($row as $key => $value) {
                    $temp = "&" . $key . "=" . $value;
                    $editLink .= $temp;
                }
                $editLink = ltrim($editLink, '&');
                $editLinkCrypted = urlencode($editLink);

                echo '<br><a href="../includes/template.upload.php?function=upload&type=' . $itemName . '&action=edit&data=' . $editLinkCrypted . $str_url . '" class="btn btn-primary" >' . $GLOBALS["lang"]["edit"] . '</a>';
                echo "<button style=\"margin:4px;\" type=\"button\" class=\"btn btn-danger\" onclick=\"hideShowSingleDivs('" . $uniqueId . "-myItem-action', '" . $uniqueId . "-rem-msg')\">" . $GLOBALS['lang']['remove'] . "</button>";
                if (isset($user) && ($user->isWebMaster() || $user->isAdmin())) {
                    echo '<span style="font-weight: bold">'.$uniqueId .'</span>';
                }
                echo '</div>';
            }
        }
        echo '</p>';

        echo '</div>';
        /*END @Caption*/
        echo '</div>';
        echo '</div>';
        echo  "</div>"; // #divCommon end
        echo "</a>";
        //---------------------------------------------------------
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

    public function showOneItemDetailed($item_order = null)
    {
        $this->_itemNumber = $item_order;
        $this->_pItem = ObjectPool::getInstance()->getObjectWithId($this->_runnerName, $this->_runnerId, $this->_runnerStatus);
        $result = $this->_pItem->getResultSet();
        $sql =  $this->_pItem->lastSql();
        $result = $this->_pItem->query($sql);
        $result->data_seek(0);

        while ($row = $result->fetch_assoc()) {
            $this->showItemWithDetailId($row);
        }
    }

    public function showItemWithDetailId($row)
    {
        $this->_itemNumber = (int)$row['id'];
        $id = $itemNumber = $this->_itemNumber;
        $this->_pItem->setFieldValues($row);
        $itemName = $this->_runnerName;
        $uniqueId = $itemName . '-' . $itemNumber;
        $commonViewObj = new HtCommonView($itemName);
        $imageArray = json_decode($this->_pItem->getFieldImage());
        $thumbImgArray = $imageArray;
        $imageDir = "";
        if (isset($imageArray)) {
            $imageDir = $commonViewObj->getImageDir($this->_pItem);
            $thumbnailImageDir = $imageDir . "thumbnail/";
        } else {
            $imageDir = "../images/en/";
            $imageArray = ["../images/en/en.svg"];
        }
        //prepend with image directory
        foreach ($imageArray as &$value1) {
            $value1 = $imageDir . $value1;
        }

        foreach ($thumbImgArray as &$value1) {
            $value1 = $thumbnailImageDir . $value1;
        }

        $numimage = sizeof($imageArray);
        echo '<div class="featured_detailed col-xs-12 col-sm-12 col-md-12" id="divDetail_' . $itemName . '_' . $itemNumber . '">'; // .featured_detailed2 start
        echo '<div class="featured_detailed_left col-xs-12 col-md-4 align-center">';    // start div for the left side of the item detailed section
        $commonViewObj->displayTitle($this->_pItem);
        // echo '<div class="fdl_spec">';    // start div for the left side of the item detailed section
        $this->_pItem->display();
        // echo "</div>"; // .fdl_spec end
        $commonViewObj->displayPrice($this->_pItem);
        $commonViewObj->displayContactMethod($uniqueId,  $this->_pItem, $itemName);
        $commonViewObj->displayMailCfrm($uniqueId, $id, $itemName);
        $commonViewObj->displayReportReq($uniqueId, $id, $itemName);
        $commonViewObj->displayMailForm($uniqueId, $id, $itemName,  $this->_pItem->getIdUser());
        $commonViewObj->displayReportCfrm($uniqueId, $id, $itemName);
        echo "</div>"; // featured_detailed_left end
        echo '<div class="featured_detailed_right col-xs-12 col-md-8">';
        $commonViewObj->displayGallery($imageArray, $thumbImgArray);
        echo "</div>"; // .featured_detailed_right end
        echo "</div>"; // .featured_detailed end
    }

    private function dumpData()
    {
        /*
        var_dump($this->_runnerName);
        var_dump($this->_runnerId);
        var_dump($this->_runnerStatus);
        var_dump($this->_pItem->lastSql());
        */
    }
    /**
     * Alternative interface to display item with id
     * e.g.
     *  (new HtMainView("car",12))->showItemWithId();  //select * item where id=12
     * @param resolved by construtor
     */
    public function showItemWithId($row)
    {
        $this->thumbnail($row);
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
