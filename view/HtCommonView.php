<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/cmn.class.php';
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/classes/global.variable.class.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
require_once $documnetRootPath . '/includes/pagination.php';

require_once $documnetRootPath . '/test/backtracer.php';
class HtCommonView extends MySqlRecord {

    private $_itemName;
    
    function __construct($itemName)
    {
        $this->_itemName = $itemName;
    }

    /**/
    public function show($itemElm)
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
    
    public function showRowContent($item, $id)
    {
        $itemObj = ObjectPool::getInstance()->getObjectWithId($item, $id);
        $pImage = new ImgHandler;
        $itemName = $this->_itemName;
        $id = $itemObj->getId();
        $uniqueId = $itemName . $id; 
        $datetime = $itemObj->getFieldUploadDate();
        $title = $itemObj->getFieldTitle();
        $location = $itemObj->getFieldLocation();
        $mkTyp = $itemObj->getFieldMake();
        $contactType = $itemObj->getFieldContactMethod();
        $imageDir = $this->getImageDir($itemName, $itemObj);
        $image = $itemObj->getFieldImage();
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
        $this->displayTitle($title, $itemName);
        echo "</a>";
        $this->displayLocation($location);
        $this->displayUpldTime($datetime);
        $this->displayPrice($itemObj);
        $this->displayMarketType($mkTyp);
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
        $this->displayGallery($imageDir, $imageArr, $id, $itemName);
        echo "<div class=\"showbutton_hide\">
		<input class=\"hide\" type=\"button\"  onclick=\"swapback($id,'$itemName')\"
		value=\"Hide Detail ዝርዝር ደብቅ\"/></div>";
        echo "<div id=\"featured_right_side\">";                         //start_featured_right_side
        $this->displayTitle($title, $itemName);
        $this->displaySpecifics($itemObj, $itemName);
        $this->displayPrice($itemObj);
        $this->displayContactMethod($uniqueId, $itemObj, $itemName);
        $this->displayMailCfrm($uniqueId, $id, $itemName);
        $this->displayReportReq($uniqueId, $id, $itemName);
        $this->displayMailForm($uniqueId, $id, $itemName, $pUser);
        $this->displayReportCfrm($uniqueId, $id, $itemName);
        echo "</div>"; //end_featured_right_side
        echo "</div>"; //end_featured_detailed
        echo "</div>"; //end_divDetail_*
        unset($pUser);
        unset($pCommon);
        unset($pImage);
        //backTrace($row);
    }

    /** 
     * Get the image directory
     * */
    public function getImageDir($itemObj) {
        $itemImageDir = "item_" . $this->_itemName;
        $userImageDir = "/user_id_" . $itemObj->getIdUser();
        $tmpIdImageDir = "/item_temp_id_" . $itemObj->getIdTemp() . "/";
        $path = "../upload/";
        $dir = $path . $itemImageDir . $userImageDir .  $tmpIdImageDir;
        return $dir ;     

    }


    /*@ function to display action to take by admin/moderator/user/
	 * input: objects $pItem,$pUser
	* */
    private function displayAction($pItem, $pUser)
    {
        $itemId = $pItem->getId();
        $name   = $pItem->getItemName();
        $time   = $pItem->getUpldTime();
        $time   = strtotime($time);
        $userId    =  $pUser->userId;
        $userRole  = $pUser->getUserRole();

        echo "<div  class=\"delete_activate\">
		<input class=\"modActionDelete\" type=\"button\" value=\"Delete\" id=\"delete_button\"  onclick=\"func_moderatorActions('delete','$name',$itemId,'1','$userId','pendingNumb') \" />
		<input class=\"modActionActive\" type=\"button\" value=\"Activate\" id=\"activate_button\" onclick=\"func_moderatorActions('activate','$name',$itemId,$time,'$userId','pendingNumb')\" />
		</div>"; //end_delete_activate
        echo "<div  class=\"moderatorDelete\">
		<input class=\"modActionDelete\" type=\"button\" value=\"Delete\" id=\"delete_button\"  onclick=\"func_moderatorActions('delete','$name',$itemId,'1','$userId','deletedNumb') \" />
		<input class=\"modActionActive\" type=\"button\" value=\"Activate\" id=\"activate_button\" onclick=\"func_moderatorActions('activate','$name',$itemId,$time,'$userId','deletedNumb')\" />
		</div>"; //end_moderatorDelete
        echo "<div  class=\"delete_ignore\">
		<input class=\"modActionDelete\" type=\"button\" value=\"Delete\" onclick=\"func_moderatorActions('remove','$name',$itemId,'1','$userId','reportedNumb') \" />
		<input class=\"modActionActive\" type=\"button\" value=\"Ignore\" id=\"activate_button\" onclick=\"func_moderatorActions('ignore','$name',$itemId,'1','$userId','reportedNumb')\" />
		<input class=\"modActionActive\" type=\"button\" value=\"show Report\" onclick=\"func_moderatorShow('show','$name',$itemId) \" />
		</div>"; //end_delete_ignore
        echo "<div class=\"userActiveButton\">";
        echo "<input  class=\"modActionDelete\"  type=\"button\" value=\"Delete\"   onclick=\"func_moderatorActions('delete','$name',$itemId,'1',$userId,'userActiveNumb') \" />";
        echo "</div>"; //end_userActiveButton
        echo "<div  class=\"userPendingButton\">";
        echo "<input class=\"modActionDelete\" type=\"button\" value=\"Delete\"   onclick=\"func_moderatorActions('delete','$name',$itemId,'1',$userId,'userPendingNumb') \" />";
        if ($userRole == 'admin' || $userRole == 'mod') {
            echo "<input class=\"modActionActive\" type=\"button\" value=\"Activate\" id=\"activate_button\" onclick=\"func_moderatorActions('activate','$name',$itemId,$time,'%','pendingNumb')\" />";
        }
        echo "</div>"; //end_userPendingButton
    }
    /*@ function to display uploaded date
	 * input:$datetime
	* */
    public function displayUpldTime($itemObj)
    {
        $datetime = $itemObj->getFieldUploadDate();
        $datetimestr = strtotime($datetime);
        $today       = strtotime("today");
        $yesterday   = strtotime("yesterday");
        $tomorrow    = strtotime("tomorrow");
               
        if ($datetimestr >= $today) {
            echo '<p>' .$GLOBALS['lang']["today"] . '</p>';
        } else if ($datetimestr >= $yesterday) {
            echo '<p>' . $GLOBALS['lang']["yesterday"] . '</p>';
        } else {
            echo '<p>' . $datetime . '</p>';
        }
    }
    /*@ function to display titile of the item
	 * if found else item category is displayed
	* input: title, itemName
	* */
    public function displayTitle($itemObj)
    {
        $title = $itemObj->getFieldTitle();
        echo "<h5>";
        echo $title != null ? $title : $this->$_itemName;
        echo "</h5>";
    }
    /*@function to display location of item
	 * input : location /loc
	* */ 
    
    /*@ function to display make of the item
	 * 
	* input: item object
	* */
    public function displayMake($itemObj)
    {
        $itemName = $this->_itemName;
        if($itemName == "car" or $itemName == "phone" or $itemName == "computer") {
            echo "<div class=\"location\">";
            echo $itemObj->getFieldMake();
            echo "</div>";
        }
    }

    public function displayLocation($itemObj)
    {
       $loc =  $itemObj->getFieldLocation();
        if ($loc != "") {
            echo '<p>'.$GLOBALS['lang']["$loc"]. '</p>';
        }
    }
    /*@function to display market type /SELL/RENT
	 * input: mkTyp
	* */
    public function displayMarketType($itemObj)
    {
        $mrkTyp = $itemObj->getFieldMarketCategory();
       
        if ($mrkTyp != "No Action") {
            echo '<p class="text-center alert-info">' . $GLOBALS["upload_specific_array"]["common"]["marketType"][$mrkTyp] . "</p>";
        } else {
            echo '<p class="text-center alert-info">' . $GLOBALS["upload_specific_array"]["common"]["marketType"]["sell"] . "</p>";
        }
    }

    /*@ function to display a dialog to submit abuses
	 * input:  $uniqueId,$itemId,$itemName
	* */
    public function displayReportReq($uniqueId, $itemId, $itemName)
    {
        echo "<div class = \"reportabuse\">";
        echo "<div style=\"display:none;\" class=\"errorabuse_$uniqueId\">";
        echo "<p style=\"background-color: #FFBABA; color: #D8000C;\">".$GLOBALS["abuse_type_lang_arr"][1]['You forgort to choose the Report type']."</p></div>";
        echo "<div id=\"reportbox\" class=\"reportbox_$uniqueId\">";        
        echo "<p>".$GLOBALS['lang']['Report Abuse']."</p>";
        echo "<select id=\"selectabuse_$uniqueId\">";
        foreach($GLOBALS["abuse_type_lang_arr"][0] as $key=>$value){
            echo "<option value=\"$key\">".$value."</option>";
        }
        echo "</select>";
        echo "<br>";
        echo "<input class=\"report\" type=\"button\" onclick=\"swapabuseback($itemId,'$itemName')\" value=\"".$GLOBALS['lang']['report']."\" />";
        echo "<input class=\"closereport\" type=\"button\" onclick=\"closeAbusebox($itemId,'$itemName')\" value=\"".$GLOBALS['lang']['close']."\" />";
        echo "</div>"; //end_reportbox_*
        echo "</div>"; //end_reportabuse
    }
    /*@ function to display confirmation for mail sent to contact owner
	 * input: $uniqueId,$itemId,$itemName
	* */
    public function displayMailCfrm($uniqueId, $itemId, $itemName)
    {
        echo "<div class=\"msgcompleted col-xs-12 col-md-12\">";
        echo "<div style=\"width:100%;display:none;\" class=\"sent_$uniqueId\">";
        echo "<p class=\"bg-success\">".$GLOBALS['lang']['msg sent']."</p> ";
        echo "<input  class=\"closeInnerRemove btn btn-danger btn-sm\" type=\"button\" onclick=\"swapmailclose($itemId,'$itemName')\" value=\"".$GLOBALS['lang']['close']."\" />";
        echo "</div>"; //end_msgcompleted
        echo "</div>"; //end_sent_*
    }
    /*@ function to display confirmation for report sent to contact owner
	 * input: $uniqueId,$itemId,$itemName
	* */
    public function displayReportCfrm($uniqueId, $itemId, $itemName)
    {
        echo "<div class=\"reportmsgcompleted\">";
        echo "<div style=\"width:100%; height:100px;display:none;\" class=\"reportcfrm_$uniqueId\">";
        echo '<p>'.$GLOBALS["abuse_type_lang_arr"][1]["You successfully reported the item!"].'</p>';
        echo "<input  class=\"closeReportInnerRemove btn btn-danger btn-sm\" type=\"button\" onclick=\"swapabuseclose($itemId,'$itemName')\" value=\"".$GLOBALS['lang']['close']."\" />";
        echo "</div>"; //end_reportcfrm_*
        echo "</div>"; //end_reportmsgcompleted
    }
    /*@ function to display mail dialog sent to contact owner
	 * input: $uniqueId,$itemId,$itemName,$userEmail
	* */
    public function displayMailForm($uniqueId, $itemId, $itemName, $userId)
    {
        $userObj = new HtUserAll(settype($userId, "Integer"));
        $email = $userObj->getFieldEmail() ? $userObj->getFieldEmail() : NULL;
        echo "<div style=\"display:none;\" class=\"message_$uniqueId col-xs-12 col-md-12\">";
        echo "<form class=\"msgcontainerRemove thumbnail\" method=\"post\">";
        echo "<div style=\"display:none;\" class=\"error_1$uniqueId form-group\">
             <p class=\"bg-danger\">".$GLOBALS['lang']['You forgort to enter your name, email address and Message']."
             </div>";
        echo "<div style=\"display:none;\" class=\"error_2$uniqueId form-group\">
             <p class=\"bg-danger\">".$GLOBALS['lang']['Your e-mail address is invalid']."
             </div>";
        echo "<div class =\"msgformRemove\">";
        echo '<p>'.$GLOBALS["lang"]["contact owner"].'</p>';
        echo "<div class=\"fieldRemove form-group\">";
        echo "<label for=\"name\">".$GLOBALS['lang']['Your name']."</label></br>";
        echo '<input type="text" style="width:90%" id="name_' . $uniqueId . '" name="name"/>';
        echo "</div>"; //end_field
        echo "<div class=\"fieldRemove form-group\">";
        echo "<label for=\"email\">".$GLOBALS['lang']['Email']."</label></br>";
        echo '<input style="text-transform:lowercase;width:90%" type="email"  id="email_' . $uniqueId . '" name="email"/>';
        echo "</div>"; //end_field
        echo "<div class=\"fieldRemove form-group\">";
        echo "<label for=\"description\">".$GLOBALS['lang']['Message']."</label>";
        echo '<textarea name="description" id="description_' . $uniqueId . '" style="height:50px;width:100%" placeholder="'.$GLOBALS['lang']['Enter your message'].'"></textarea>';
        echo "</div>"; //end_field
        echo "<div class=\"messageRouter1 form-group\">";
        echo "<input class=\"sendRemove btn btn-primary btn-sm\" type=\"button\" style=\"margin: 0px 10px\" onclick=\"swapmailback($itemId, '$email','$itemName')\" value=\"".$GLOBALS['lang']['Send']."\" />";
        echo "<input class=\"closeRemove btn btn-danger btn-sm\" type=\"button\" style=\"margin: 0px 10px\" onclick=\"closeMsgbox($itemId,'$itemName')\" value=\"".$GLOBALS['lang']['close']."\" />";
        echo "</div>";
        echo "</div>"; //end_msgform
        echo "<div class=\"clear\"></div>";
        echo "</form>"; //end_form
        echo "</div>"; //end_msgcontainer
    }
    /*@ function to display contact method /mail/phone/
	 * input: $objDir,$uniqueId,$contactType,$itemId,$itemName,$userName,$userPhone
	* */
    public function displayContactMethod($uniqueId, $itemObj, $itemName)
    {
        $pImage = new ImgHandler;
        $contactType = $itemObj->getFieldContactMethod();
        $itemId = $itemObj->getId();
        $userId = $itemObj->getIdUser();
        $userObj = new HtUserAll(settype($UserId, "Integer"));
        $userName = $userObj->getFieldFirstName() ? $userObj->getFieldFirstName() : NULL;
        $phone = $userObj->getFieldPhoneNr() ? $userObj->getFieldPhoneNr() : NULL;
        $email = $userObj->getFieldEmail() ? $userObj->getFieldEmail() : NULL;
        
        echo "<div id=\"mail_reportRemove\" style=\"margin-top:20px\" class=\"contact_$uniqueId \">";
        echo '<div class="headerRemove"><p class="bg-success"><strong>'.$GLOBALS["lang"]["Contact method"].'</strong></p></div>';
        if ($contactType == "email" or $contactType == "both")
            echo "<div class=\"email\">
			<p><i class=\"glyphicon glyphicon-envelope\" style=\"color:cornflowerblue\"></i>&nbsp<a  href=\"javascript:void(0)\" onclick=\"swapmail($itemId,'$itemName')\">".$GLOBALS['lang']['Send a message']."</a></p></div>";
        if ($contactType == "phone" or $contactType == "both")
            echo "<div class=\"phone\">
			<p><i class=\"glyphicon glyphicon-phone-alt\"  style=\"color:cornflowerblue\"></i>&nbsp" . $userName . ": " . $phone . "</p></div>";
        echo "<div class=\"abuse\" style=\"color:#0d6aac\"><i class=\"glyphicon glyphicon-alert\" style=\"color:red\"></i><a  href=\"javascript:void(0)\" onclick=\"swapabuse($itemId,'$itemName')\">".$GLOBALS['lang']['Report Abuse']."</a></div>";
        echo "</div>";
    }
    /*@ function to display image gallery
	 * input: $objImg, $objDir, $image, $objItem, $itemId
    * */
    public function displayGallery($dir, $imageNameArray, $itemId, $itemName)
    {
        $imageFileNameLarge = $imageNameArray[0];
        $filterArr = array('"', '[', ']');
        $fileNmaeLarge = str_replace($filterArr, '', $imageFileNameLarge);
        $numimage = sizeof($imageNameArray);
        echo "<div class=\"featured_left_sideRemove col-xs-12 col-md-8\"  style=\"padding:0px;\">";
        if ($numimage == 1) {
            $file_path = '../../images/icons/ht_logo_2.png';
            echo '<div id="featured_left_side_bigImageOnlyRemove" class="col-xs-12 col-md-12"><img class="largeImg" src="' . $file_path . '" ></div>';
        }
        if ($numimage > 1) {
            echo "<div id=\"featured_left_side_bigImageRemove\" class=\"largeImg1 col-xs-12 col-md-12\" style=\"background-color:#ebf0f1\"><img class=\"largeImg\"  id=\"largeImg" . $itemName . $itemId ."\" src=\"" . $dir . $fileNmaeLarge . "\"></div>";
            echo '<div class="col-xs-12 col-md-12" style="padding:0px; background-color:beige;border:2px solid black">';
            for ($i = 0; $i < $numimage; $i++) {
               $imageFileName = $imageNameArray[$i];
               $fileName = str_replace($filterArr, '', $imageFileName);
               $divName = $fileName . $i;
               echo "<div id=\"featured_buttom1\" class=\"col-xs-3 col-md-2\" style=\"padding:0px\">";
               echo "<div class=\"imagesGallery1 thumbnail\">";
                echo "
				<a href=\"javascript:void(0)\" onclick=\"imgnumber('$dir','$fileName',$itemId, '$itemName')\"\">
				<img class=\"featured_buttom_img1\"  id=\"$divName\" src=\"$dir$fileName\" />
				</a>
                ";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
              
        }
        echo "</div>";
    }
    /*@ function to display item specific contents
	 * input: $obj
    * */
       
    private function displaySpecifics($itemObj, $itemName)
    {
        switch ($itemName) { 
            case "car":
                echo $itemObj->getFieldMake()   ? "<p><strong>Make:&nbsp</strong>" . $itemObj->getFieldMake() . "</p>" : "";
                echo $itemObj->getFieldModel() != "0000"       ? "<p><strong>Model:&nbsp</strong>" . $itemObj->getFieldModel() . "</p>" : "";
                echo $itemObj->getIdCategory() ? "<p><strong>Type:&nbsp</strong>" . $itemObj->getIdCategory() . "</p>" : "";
                echo $itemObj->getFieldModelYear() != "0000"       ? "<p><strong>Year of Make:&nbsp</strong>" . $itemObj->getFieldModelYear() . "</p>" : "";
                echo $itemObj->getFieldFuelType()     ? "<p><strong>Fuel:&nbsp</strong>" . $itemObj->getFieldFuelType() . "</p>" : "";
                echo $itemObj->getFieldNoOfSeat()     ? "<p><strong>Nr of Seats:&nbsp</strong>" . $itemObj->getFieldNoOfSeat() . "</p>" : "";
                echo $itemObj->getFieldColor() != "999"     ? "<p><strong>Color:&nbsp</strong>" .  $itemObj->getFieldColor() . "</p>" : "";
                echo $itemObj->getFieldMilage()      ? "<p><strong>Milage:&nbsp</strong>" . $itemObj->getFieldMilage() . "</p>" : "";
                echo $itemObj->getFieldGearType()      ? "<p><strong>Gear:&nbsp</strong>" . $itemObj->getFieldGearType() . "</p>" : "";
                echo $itemObj->getFieldExtraInfo()      ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">" . $itemObj->getFieldExtraInfo() . "</p>" : "";
                break;
            case "CompClass":
                echo $obj->getMake()      ? "<p><strong>Make:&nbsp</strong>" . $obj->getMake() . "</p>" : "";
                echo $obj->getCategory()  ? "<p><strong>Type:&nbsp</strong>" . $obj->getCategory() . "</p>" : "";
                echo $obj->getOS()           ? "<p><strong>OS:&nbsp</strong>" . $obj->getOS() . "</p>" : "";
                echo $obj->getProcessor() ? "<p><strong>Processor:&nbsp</strong>" . $obj->getProcessor() . "</p>" : "";
                echo $obj->getRAM()       ? "<p><strong>RAM:&nbsp</strong>" . $obj->getRAM() . "</p>" : "";
                echo $obj->getHardDisk() ? "<p><strong>Hard Drive:&nbsp</strong>" . $obj->getHardDisk() . "</p>" : "";
                //echo $obj->getColor() 	  ? "<p><strong>Color:&nbsp</strong>".$obj->getColor()."</p>":"";
                echo $obj->getInfo()       ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">" . $obj->getInfo() . "</p>" : "";
                break;
            case "ElecClass":
                echo $obj->getCategory() ? "<p><strong>Type:&nbsp</strong>" . $obj->getCategory() . "</p>" : "";
                echo $obj->getInfo()     ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">" . $obj->getInfo() . "</p>" : "";
                break;
            case "HouseClass":
                echo $obj->getCategory() ? "<p><strong>Type:&nbsp</strong>" . $obj->getCategory() . "</p>" : "";
                echo $obj->getWereda()   ? "<p><strong>Wereda:&nbsp</strong>" . $obj->getWereda() . "</p>" : "";
                echo $obj->getLotSize()  ? "<p><strong>Lot Size:&nbsp</strong>" . $obj->getLotSize() . "</p>" : "";
                echo $obj->getBedrooms() ? "<p><strong>Bed Rooms:&nbsp</strong>" . $obj->getBedrooms() . "</p>" : "";
                echo $obj->getToilet()   ? "<p><strong>Toilet:&nbsp</strong>" . $obj->getToilet() . "</p>" : "";
                echo $obj->getBathrooms() ? "<p><strong>Bath Rooms:&nbsp</strong>" . $obj->getBathrooms() . "</p>" : "";
                echo $obj->getYrOfBlt()  ? "<p><strong>Built Year:&nbsp</strong>" . $obj->getYrOfBlt() . "</p>" : "";
                if ($obj->getWater()) {
                    if ($obj->getWater() == 1)
                        echo "<p><strong>Water:&nbsp</strong>Yes</p>";
                    else
                        echo "<p><strong>Water:&nbsp</strong>No</p>";
                }
                if ($obj->getElec()) {
                    if ($obj->getElec() == 1)
                        echo "<p><strong>Electricity:&nbsp</strong>Yes</p>";
                    else
                        echo "<p><strong>Electricity:&nbsp</strong>No</p>";
                }

                echo $obj->getInfo()     ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">" . $obj->getInfo() . "</p>" : "";
                break;
            case "HouseHoldClass":
                break;
            case "PhoneClass":
                echo ($obj->getMake() != "000"   && $obj->getMake())   ? "<p><strong>Make:&nbsp</strong>" . $obj->getMake() . "</p>" : "";
                echo ($obj->getModel() != "000"  && $obj->getModel())  ? "<p><strong>Model:&nbsp</strong>" . $obj->getModel() . "</p>" : "";
                echo ($obj->getOS() != "000"     && $obj->getOS())     ? "<p><strong>OS:&nbsp</strong>" . $obj->getOS() . "</p>" : "";
                echo $obj->getInfo()    ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">" . $obj->getInfo() . "</p>" : "";
                break;
            case "OtherClass":
                break;
        }
    }
    
    public function displayPrice($itemObj)
    {
        global $lang;
        echo "<div class=\"price\">";
        switch ($this->_itemName) {
            case "car":
            case "house":
                $rentValue = $itemObj->getFieldPriceRent();
                $sellValue = $itemObj->getFieldPriceSell();
                $negoValue = $itemObj->getFieldPriceNego();
                $negoDisplay = ($negoValue == 'Yes') ? $itemObj->getFieldPriceNego() : "";
                $curr  = $itemObj->getFieldPriceCurrency();
                $rate  = $itemObj->getFieldPriceRate();

                //ctrl var
                $rentsellwnego =   $rentValue &&  $sellValue &&  $negoDisplay;
                $rentsell      =   $rentValue &&  $sellValue && !$negoDisplay;
                $rentnego      =   $rentValue && !$sellValue &&  $negoDisplay;
                $rent          =   $rentValue && !$sellValue && !$negoDisplay;
                $sellnego      =  !$rentValue &&  $sellValue &&  $negoDisplay;
                $sell          =  !$rentValue &&  $sellValue && !$negoDisplay;
                $noprice       =  !$rentValue && !$sellValue && !$negoDisplay;
                $nego          =  !$rentValue && !$sellValue &&  $negoDisplay;

                //display var
                if ($rate != NULL) $rent_var = '<p>'.$GLOBALS["upload_specific_array"]["common"]["fieldPriceRent"][0].':&nbsp' . $rentValue . ' ' .$GLOBALS["upload_specific_array"]["common"]["fieldPriceCurrency"][2][$curr].' ' .$GLOBALS["upload_specific_array"]["common"]["fieldPriceRate"][2][$rate]. '</p>';
                $sell_var = '<p>'.$GLOBALS["upload_specific_array"]["common"]["fieldPriceSell"][0].':&nbsp' . $sellValue . ' ' .$GLOBALS["upload_specific_array"]["common"]["fieldPriceCurrency"][2][$curr].'</p>';
                $nego_var = '<p>&nbsp&nbsp' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceNego"][2][$itemObj->getFieldPriceNego()] . '</p>';
                //$not_for_sell = 
                $not_for_rent = '<p>'.$GLOBALS["upload_specific_array"]["common"]["fieldPriceRent"][0].':&nbsp'.$GLOBALS["upload_specific_array"]["common"]["fieldPriceRent"][2].'</p>';
                $not_for_sell = '<p>'.$GLOBALS["upload_specific_array"]["common"]["fieldPriceSell"][0].':&nbsp'.$GLOBALS["upload_specific_array"]["common"]["fieldPriceSell"][2].'</p>';
                
                if ($rentsellwnego) {
                    echo $rent_var . $sell_var . $nego_var;
                } else if ($sellnego) {
                    echo $sell_var . $nego_var . $not_for_rent;
                } else if ($rentnego) {
                    echo $rent_var . $nego_var . $not_for_sell;
                } else if ($rentsell) {
                    echo $rent_var . $sell_var . $nego_var;
                } else if ($nego) {
                    echo $nego_var;
                } else if ($rent) {
                    echo $rent_var . $nego_var . $not_for_sell;
                } else if ($sell) {
                    echo $sell_var . $nego_var . $not_for_rent;
                } else if ($noprice) {
                    echo "<p style=\"text-indent: 10px;\">No price information Available</p>";
                }
                break;
            case "computer":
            case "electronic":
            case "household":
            case "phone":
            case "other":
                //ctrl var
                $sellValue = $itemObj->getFieldPriceSell();
                $negoValue = $itemObj->getFieldPriceNego();
                $negoDisplay = ($negoValue == 'Yes') ? $itemObj->getFieldPriceNego() : "";
                $sellnego  =  $sellValue  &&  $negoValue;
                $sell      =  $sellValue  && !$negoValue;
                $noprice   =  !$sellValue && !$negoValue;
                $nego      =  !$sellValue &&  $negoValue;
                $curr  =  $itemObj->getFieldPriceCurrency();

                //display var
                $sell_var = '<p>'.$GLOBALS["upload_specific_array"]["common"]["fieldPriceSell"][0].':&nbsp' . $sellValue . ' ' .$GLOBALS["upload_specific_array"]["common"]["fieldPriceCurrency"][2][$curr].'</p>';
                $nego_var = '<p>&nbsp&nbsp' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceNego"][2][$itemObj->getFieldPriceNego()] . '</p>';
                               
                if ($sellnego) {
                    echo $sell_var . $nego_var;
                } else if ($nego) {
                    echo $nego_var;
                } else if ($sell) {
                    echo $sell_var;
                } else if ($noprice) {
                    echo "<p style=\"text-indent: 10px;\">No price information Available</p>";
                }
                break;
            default:
                break;
        }
        echo "</div>";
    }
    
    /**/
    public function displayAllItem()
    {
        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $itemstart = HtGlobal::get('itemPerPage') * ($page - 1);
        $table = "latestupdate";
        $countItems = DatabaseClass::getInstance()->findTotalItemNumb("*", $table, "");
        $totalItems = mysqli_num_rows($countItems);
        if ($totalItems == 0) {
            ObjectPool::getInstance()->getViewObject("empty")->show(0);
            return;
        }
        $filter = " ORDER BY LatestTime DESC LIMIT $itemstart," . HtGlobal::get('itemPerPage');
        $result = DatabaseClass::getInstance()->findTotalItemNumb("*", $table, $filter);
        while ($row = $result->fetch_assoc()) {
            if ($row['cID'] != 0) {
                ObjectPool::getInstance()->getViewObject("car")->show($row['cID']);
            } else if ($row['hID'] != 0) {
                ObjectPool::getInstance()->getViewObject("house")->show($row['hID']);
            } else if ($row['dID'] != 0) {
                ObjectPool::getInstance()->getViewObject("computer")->show($row['dID']);
            } else if ($row['pID'] != 0) {
                ObjectPool::getInstance()->getViewObject("phone")->show($row['pID']);
            } else if ($row['eID'] != 0) {
                ObjectPool::getInstance()->getViewObject("electronics")->show($row['eID']);
            } else if ($row['hhID'] != 0) {
                ObjectPool::getInstance()->getViewObject("household")->show($row['hhID']);
            } else if ($row['oID'] != 0) {
                ObjectPool::getInstance()->getViewObject("others")->show($row['oID']);
            }
        }
        
        $calculatePageArray = calculatePage($totalItems);
        $result->close();
        item_list_pagination($calculatePageArray[0], $calculatePageArray[1], "", "All",  "All");
    }


    /* To display a single element
 * */
    private function displayOneItem($id)
    {
        if (is_numeric($id)) {
            $queryOneItem = DatabaseClass::getInstance()->queryGetItemWithId($this->_itemName, 1, 1, $id);
            if (mysqli_num_rows($queryOneItem) == 1) {
                ObjectPool::getInstance()->getViewObject($this->_itemName)->show($id);
            } else {
                ObjectPool::getInstance()->getViewObject("empty")->show($id);
            }
        } else {
            ObjectPool::getInstance()->getViewObject("empty")->show($id);
        }
    }
    private function displayAllActive()
    {
        $item = $this->_itemName;
        $itemClass = "HtItem".ucfirst($item);
        //$total = DatabaseClass::getInstance()->queryGetTotalNumberOfItem($item, HtGlobal::get('ACTIVE'));
        $itemObj = new $itemClass();
        $rows = $itemObj->select("*", "active");
        if ($rows > 0) {
            $calculatePageArray = calculatePage($rows);
            $start = HtGlobal::get('itemPerPage') * ($calculatePageArray[0] - 1);
            $result = $itemObj->getResultSet();
            while ($row = $result->fetch_array()) {
                $itemObj->setFieldAll($row);
                $this->showRowContent($itemObj);                
            }
            
            pagination($item, $calculatePageArray[1], $calculatePageArray[0], 0);
        } else {
            ObjectPool::getInstance()->getViewObject("empty")->show($id);
        }
    }
    /**/
    public function displayItem()
    {
        if ($this->_itemName == "all") {
            $this->displayAllItem();
            return;
        } else if ($this->_itemName == "search") {
            $this->displaySearch();
            return;
        } else {
            if (isset($_GET['Id'])) {
                $this->displayOneItem($_GET['Id']);
            } else {
                $this->displayAllActive();
            }
        }
    }

    public function searchFieldInTables($id, $table, $value)
    {
        global $locationPerTable;
        $result = DatabaseClass::getInstance()->findTotalItemNumb("*", $table, "WHERE $id = $value");
        $res = $result->fetch_assoc();
        $locField = $locationPerTable[$table];
        $itemPostedLocation = $res[$locField];
        return $itemPostedLocation;
    }


    private function displaySearch()
    {
        global $locationPerTable, $lang, $str_url;
        
        if (isset($_GET['lan'])) {
            $lang_url = "&lan=" . $_GET['lan'];
        }
        else { 
            $lang_url = "";
        }
        $searchWordRaw = $_GET['search_text'];
        $city = $_GET['cities'];
        $item = $_GET['item'];

        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $itemstart = HtGlobal::get('itemPerPage') * ($page - 1);

        $searchWordSanitized = DatabaseClass::getInstance()->getConnection()->real_escape_string($searchWordRaw);
        $bigQuery = "";
        $itemToStatus = array(
            "car" => "cStatus",
            "house" => "hStatus",
            "computer" => "dStatus",
            "electronics" => "eStatus",
            "phone" => "pStatus",
            "household" => "hhStatus",
            "others" => "oStatus"
        );

        $locationPerTable = array(
            "car" => "cLocation",
            "house" => "hLocation",
            "computer" => "dLocation",
            "electronics" => "eLocation",
            "phone" => "pLocation",
            "household" => "hhLocation",
            "others" => "oLocation"
        );

        if ($searchWordSanitized == "" and $city == "000" and $item == "000") {
            $this->itemNotFound($searchWordRaw, $city, $item);
            return;
        } elseif ($searchWordSanitized == "" and ($city == "All" or $city == "000") and $item == "All"){
            $this->displayAllItem();
        } elseif ($searchWordSanitized == "" and $item == "All") {
            $table = "latestupdate";
            $countItems = DatabaseClass::getInstance()->findTotalItemNumb("*", $table, "");
            $totalItems = mysqli_num_rows($countItems);
            if ($totalItems == 0) {
                ObjectPool::getInstance()->getViewObject("empty")->show(0);
                return;
            }
            $condition = " ORDER BY LatestTime DESC LIMIT $itemstart,". HtGlobal::get('itemPerPage');
            $result = DatabaseClass::getInstance()->findTotalItemNumb("*", $table, $condition);
            while ($row = $result->fetch_assoc()) {
                if ($row['cID'] != 0) {
                    $location = $this -> searchFieldInTables("cID", "car", $row['cID']);
                    if($city == $location){
                        ObjectPool::getInstance()->getViewObject("car")->show($row['cID']);
                    }else{
                        $totalItems = $totalItems - 1;
                    }
                } else if ($row['hID'] != 0) {
                    $location = $this -> searchFieldInTables("hID", "house", $row['hID']);
                    if($city == $location){
                        ObjectPool::getInstance()->getViewObject("house")->show($row['hID']);
                    }else{
                        $totalItems = $totalItems - 1;
                    }
                } else if ($row['dID'] != 0) {
                    $location = $this -> searchFieldInTables("dID", "computer", $row['dID']);
                    if($city == $location){
                        ObjectPool::getInstance()->getViewObject("computer")->show($row['dID']);
                    }else{
                        $totalItems = $totalItems - 1;
                    }
                } else if ($row['pID'] != 0) {
                    $location = $this -> searchFieldInTables("pID", "phone", $row['pID']);
                    if($city == $location){
                        ObjectPool::getInstance()->getViewObject("phone")->show($row['pID']);
                    }else{
                        $totalItems = $totalItems - 1;
                    }
                } else if ($row['eID'] != 0) {
                    $location = $this -> searchFieldInTables("eID", "electronics", $row['eID']);
                    if($city == $location){
                        ObjectPool::getInstance()->getViewObject("electronics")->show($row['eID']);
                    }else{
                        $totalItems = $totalItems - 1;
                    }
                } else if ($row['hhID'] != 0) {
                    $location = $this -> searchFieldInTables("hhID", "household", $row['hhID']);
                    if($city == $location){
                        ObjectPool::getInstance()->getViewObject("household")->show($row['hhID']);
                    }else{
                        $totalItems = $totalItems - 1;
                    }
                } else if ($row['oID'] != 0) {
                    $location = $this -> searchFieldInTables("oID", "others", $row['oID']);
                    if($city == $location){
                        ObjectPool::getInstance()->getViewObject("others")->show($row['oID']);
                    }else{
                        $totalItems = $totalItems - 1;
                    }
                }
            }
            
            if ($totalItems == 0) {
                $this->itemNotFound($searchWordRaw, $city , $item);
            } else {
                $calculatePageArray = calculatePage($totalItems);
                $result->close();
                item_list_pagination($calculatePageArray[0], $calculatePageArray[1], $searchWordSanitized, $item,  $city);
            }
            
        } else {
                //To avoid a wildcard value for search word 
                if($searchWordSanitized == "" and ($city != "000" or $item != "000")){
                    $searchWordSanitized = "No searchword given";
                    $connector = "OR";
                } else {
                    $connector = "AND";
                }

                if($city == "All" or $city == "000"){
                    $location = "%";
                } else{
                    $location = $city;
                }
                
                if ($item == "All" or $item == "000" or (isset($_GET['item']) == false)) {
                    $allItem = DatabaseClass::getInstance()->getAllItem();
                } else {
                    $allItem = array(
                        'array' => array('table_name' => $item)
                    );
                }
                
                foreach ($allItem as $key => $value) { 
                    $tableName = DatabaseClass::getInstance()->getAllFields($value['table_name']);
                    $tmpStr = "";
                    for ($i = 0; $i < sizeof($tableName); $i++) {
                        if ($i == 0) {
                            $tmpStr .= "(SELECT COUNT(" . $tableName[$i] . ") FROM " . $value['table_name'] . " INNER JOIN ";
                            $tmpStr .= $value['table_name'] . "category ON ";
                            $tmpStr .= $value['table_name'] . "category.categoryID = ";
                            $tmpStr .= $value['table_name'] . "." . $value['table_name'] . "CategoryID WHERE ";
                            $tmpStr .= $itemToStatus[$value['table_name']] . " = 'active' AND (";
                            $tmpStr .= $locationPerTable[$value['table_name']] . " LIKE '%" . $location . "%'";
                            $tmpStr .= " " . $connector;
                            $tmpStr .= " categoryName LIKE '%" . $searchWordSanitized . "%') OR (";
                            
                        }
                        $tmpStr .= $tableName[$i] . " LIKE '%" . $searchWordSanitized . "%' OR ";
                    }
                    $tmpStrFinal = rtrim($tmpStr, '\' OR ');
                    $tmpStrFinal .=  "'))";
                    $bigQuery .= " + " . $tmpStrFinal;
                    //break;
                }
                $finalStr = rtrim($bigQuery, 'OR ');
                $finalStr2 = ltrim($finalStr, '+ ');
                $matchChecker = "SELECT (" . $finalStr2  . ") AS count_row";
                echo "<div id= \"mainColumn\">";
                $totalMatch = DatabaseClass::getInstance()->runQuery($matchChecker);
                while ($dmatchChecker = $totalMatch->fetch_assoc()) {
                    $numbreOfMatches = $dmatchChecker['count_row'];
                }
      
                if ($numbreOfMatches >= 1) {
                    $bigQuery ="";
                    foreach ($allItem as $key => $value) {
                        $tableName = DatabaseClass::getInstance()->getAllFields($value['table_name']);
                        $tmpStr = "";
                        for ($i = 0; $i < sizeof($tableName); $i++) {
                            if ($i == 0) {
                                $tmpStr .= "SELECT " . $tableName[$i] . ",UploadedDate,tableType FROM " . $value['table_name'] . " INNER JOIN ";
                                $tmpStr .= $value['table_name'] . "category ON ";
                                $tmpStr .= $value['table_name'] . "category.categoryID = ";
                                $tmpStr .= $value['table_name'] . "." . $value['table_name'] . "CategoryID WHERE ";
                                $tmpStr .= $itemToStatus[$value['table_name']] . " = 'active' AND (";
                                $tmpStr .= $locationPerTable[$value['table_name']] . " LIKE '%" . $location . "%'"; 
                                $tmpStr .= " " . $connector;
                                $tmpStr .= " categoryName LIKE '%" . $searchWordSanitized . "%' ) OR (";
                            }
                            $tmpStr .= $tableName[$i] . " LIKE '%" . $searchWordSanitized . "%' OR ";
                            //break;
                        }
                    $tmpStrFinal = rtrim($tmpStr, '\' OR ');
                    $tmpStrFinal .=  "'";
                    $finalStr = rtrim($tmpStrFinal, 'OR ');
                    $finalStr .= ") ORDER BY UploadedDate DESC LIMIT $itemstart,". HtGlobal::get('itemPerPage');
                    $querySearch =  $finalStr;
                    $displaySearchResult = DatabaseClass::getInstance()->runQuery($querySearch);
                    while ($ddisplaySearchResult = $displaySearchResult->fetch_assoc()) {
                        $tabletype = $ddisplaySearchResult['tableType'];
                        $name = DatabaseClass::getInstance()->getTableNameById($tabletype);
                        $tableId = DatabaseClass::getInstance()->getItemIdField($name);
                        $id = $ddisplaySearchResult[$tableId];            
                        ObjectPool::getInstance()->getViewObject($name)->show($id);
                    } }

                    $calculatePageArray = calculatePage($numbreOfMatches);
                    item_list_pagination($calculatePageArray[0], $calculatePageArray[1], $searchWordSanitized, $item,  $city);
   
                } else if ($numbreOfMatches < 1) {
                    $this->itemNotFound($searchWordRaw, $city , $item);
                }

                echo "</div>";
            }



            
  }

  public function itemQuery($id, $status=NULL)
    {
        if ($id == "*" and $status == NULL) {
            $sql = "SELECT * FROM item_car";
        } elseif($id == "*" and $status != NULL){
            $sql =  "SELECT * FROM item_car WHERE field_status='$status'";
        } elseif($id != "*" and $status == NULL){
            $sql =  "SELECT * FROM item_car WHERE id='$id'";
        } else { //id
            $sql =  "SELECT * FROM item_car WHERE id=$id AND field_status='$status'";
        }

        $this->resetLastSqlError();
        $result =  $this->query($sql);
        $this->resultSet = $result;
        $this->lastSql = $sql;
        return $result;
    }

    public function itemNotFound($searchWordSanitized, $city , $item) {
        global $lang;
        echo '<div id="mainColumnX" style="width:80%; margin-left:auto;margin-right:auto;float:none;">
            <p style="text-align:center;padding-top:10px;padding-bottom:10px;background-color:#378de5;color:white">'.$lang['search res'].'</p>';
            echo '<div id="spanMainColumnX" style="color: red">';
            if($searchWordSanitized == "" and $city == "000" and $item == "000"){
                echo $lang['failed search'].$lang['no match msg part3'];
            } elseif ($searchWordSanitized != ""){
               echo $lang['no match msg part1'].' "'. $searchWordSanitized.'" '. $lang['no match msg part2'].$lang['no match msg part3'];
            } else {
                echo $lang['full no match msg'];
            }
           
        echo '</div></div>';
    }
}

