<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/cmn.class.php';
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/test/backtracer.php';

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
        $pImage = new ImgHandler;
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
        $this->displayTitle($title, $itemName);
        echo "</a>";
        $this->_pItem->displayItemSpecific();
        $this->displayLocation($location);
        $this->displayUpldTime($datetime);
        $this->displayPrice($this->_pItem);
        $this->displayMarketType($mkTyp);
        $this->displayAction($this->_pItem, $pUser);
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
        $this->displayGallery($pImage, $image, $this->_pItem, $id);
        echo "<div class=\"showbutton_hide\">
		<input class=\"hide\" type=\"button\"  onclick=\"swapback($id,'$itemName')\"
		value=\"Hide Detail ዝርዝር ደብቅ\"/></div>";
        echo "<div id=\"featured_right_side\">";                         //start_featured_right_side
        $this->displayTitle($title, $itemName);
        $this->displaySpecifics($this->_pItem);
        $this->displayPrice($this->_pItem);
        $this->displayContactMethod($pImage, $uniqueId, $contactType, $id, $itemName, $pUser);
        $this->displayMailCfrm($uniqueId, $id, $itemName);
        $this->displayReportReq($uniqueId, $id, $itemName);
        $this->displayMailForm($uniqueId, $id, $itemName, $pUser);
        $this->displayReportCfrm($uniqueId, $id, $itemName);
        echo "</div>"; //end_featured_right_side
        echo "</div>"; //end_featured_detailed
        echo "</div>"; //end_divDetail_*
        echo "</div>"; //end_divClassified
        unset($pUser);
        unset($pCommon);
        unset($pImage);
        backTrace($row);
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
        $userId    = $pUser->getUserId();
        $userRole  = $pUser->getUserRole();

        echo "<div  class=\"delete_activate\">
		<input class=\"modActionDelete\" type=\"button\" value=\"Delete\" id=\"delete_button\"  onclick=\"func_moderatorActions('delete','$name',$itemId,'1','%','pendingNumb') \" />
		<input class=\"modActionActive\" type=\"button\" value=\"Activate\" id=\"activate_button\" onclick=\"func_moderatorActions('activate','$name',$itemId,$time,'%','pendingNumb')\" />
		</div>"; //end_delete_activate
        echo "<div  class=\"moderatorDelete\">
		<input class=\"modActionDelete\" type=\"button\" value=\"Delete\" id=\"delete_button\"  onclick=\"func_moderatorActions('delete','$name',$itemId,'1','%','deletedNumb') \" />
		<input class=\"modActionActive\" type=\"button\" value=\"Activate\" id=\"activate_button\" onclick=\"func_moderatorActions('activate','$name',$itemId,$time,'%','deletedNumb')\" />
		</div>"; //end_moderatorDelete
        echo "<div  class=\"delete_ignore\">
		<input class=\"modActionDelete\" type=\"button\" value=\"Delete\" onclick=\"func_moderatorActions('remove','$name',$itemId,'1','%','reportedNumb') \" />
		<input class=\"modActionActive\" type=\"button\" value=\"Ignore\" id=\"activate_button\" onclick=\"func_moderatorActions('ignore','$name',$itemId,'1','%','reportedNumb')\" />
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
    private function displayUpldTime($datetime)
    {
        $datetimestr = strtotime($datetime);
        $today       = strtotime("today");
        $yesterday   = strtotime("yesterday");
        $tomorrow    = strtotime("tomorrow");
        if ($datetimestr >= $today) {
            echo "<div class=\"date\"> Today </div></br>";
        } else if ($datetimestr >= $yesterday) {
            echo "<div class=\"date\">Yesterday</div></br>";
        } else {
            echo '<div class="date">' . $datetime . '</div></br>';
        }
    }
    /*@ function to display titile of the item
	 * if found else item category is displayed
	* input: title, itemName
	* */
    private function displayTitle($title, $itemName)
    {
        echo "<div class=\"header\">";
        echo $title != null ? $title : $itemName;
        echo "</div>";
    }
    /*@function to display location of item
	 * input : location /loc
	* */
    private function displayLocation($loc)
    {
        if ($loc != "") {
            echo "<div class=\"location\">" . $loc . "</div>";
        }
    }
    /*@function to display market type /SELL/RENT
	 * input: mkTyp
	* */
    private function displayMarketType($mkTyp)
    {
        if ($mkTyp != "No Action") {
            echo "<div id=\"text_sellRent\">" . strtoupper($mkTyp) . "</div></br>";
        }
    }

    /*@ function to display a dialog to submit abuses
	 * input:  $uniqueId,$itemId,$itemName
	* */
    private function displayReportReq($uniqueId, $itemId, $itemName)
    {
        echo "<div class = \"reportabuse\">";
        echo "<div style=\"display:none;\" class=\"errorabuse_$uniqueId\"></div>";
        echo "<div id=\"reportbox\" class=\"reportbox_$uniqueId\">";
        echo "<select id=\"selectabuse_$uniqueId\">";
        echo "<option value=\"000\">Choose/ይምረጡ</option>";
        echo "<option value=\"Bullying\">Bullying/ማንቋሸሽ</option>";
        echo "<option value=\"Copyright\">Copyright/የቅጅ መብት  ስርቆት</option>";
        echo "<option value=\"Discrimination\">Discrimination/መድልኦ</option>";
        echo "<option value=\"Spam\">Spam/ግሳንግስ </option>";
        echo "<option value=\"Identity theft\">Identity theft/የማንነት ስርቆት</option>";
        echo "<option value=\"Political violence\">Political violence/የፖለቲካ ሁከት</option>";
        echo "<option value=\"Race violence\">Race violence/ዘረኝነት</option>";
        echo "<option value=\"Sex abuse\">Sex abuse/የጾታ በደለ</option>";
        echo "<option value=\"Sexual content\">Sexual Content/ሴሰኛ ይዞታ</option>";
        echo "<option value=\"Age abuse\">Age abuse/የዕድሜ በደለ</option>";
        echo "<option value=\"Religious violence\">Religious violence/የሃይማኖት ሁከት</option>";
        echo "<option value=\"Other\">Other/ከዚህ ዝርዝር ውጪ</option>";
        echo "</select>";
        echo "<br>";
        echo "<input class=\"report\" type=\"button\" onclick=\"swapabuseback($itemId,'$itemName')\" value=\"Report\" />";
        echo "<input class=\"closereport\" type=\"button\" onclick=\"closeAbusebox($itemId,'$itemName')\" value=\"Close\" />";
        echo "</div>"; //end_reportbox_*
        echo "</div>"; //end_reportabuse
    }
    /*@ function to display confirmation for mail sent to contact owner
	 * input: $uniqueId,$itemId,$itemName
	* */
    private function displayMailCfrm($uniqueId, $itemId, $itemName)
    {
        global $sentmsg;
        echo "<div class=\"msgcompleted\">";
        echo "<div style=\"width:100%; paddding: 5px; height:100px; display:none;\" class=\"sent_$uniqueId\">";
        echo "<p>$sentmsg</p> ";
        echo "<input  class=\"closeInner\" type=\"button\" onclick=\"swapmailclose($itemId,'$itemName')\" value=\"Close\" />";
        echo "</div>"; //end_msgcompleted
        echo "</div>"; //end_sent_*
    }
    /*@ function to display confirmation for report sent to contact owner
	 * input: $uniqueId,$itemId,$itemName
	* */
    private function displayReportCfrm($uniqueId, $itemId, $itemName)
    {
        global $abusemsg;
        echo "<div class=\"reportmsgcompleted\">";
        echo "<div style=\"width:100%; height:100px;display:none;\" class=\"reportcfrm_$uniqueId\">";
        echo "<p>$abusemsg</p>";
        echo "<input  class=\"closeReportInner\" type=\"button\" onclick=\"swapabuseclose($itemId,'$itemName')\" value=\"Close\" />";
        echo "</div>"; //end_reportcfrm_*
        echo "</div>"; //end_reportmsgcompleted
    }
    /*@ function to display mail dialog sent to contact owner
	 * input: $uniqueId,$itemId,$itemName,$userEmail
	* */
    private function displayMailForm($uniqueId, $itemId, $itemName, $user)
    {
        echo "<div style=\"display:none;\" class=\"message_$uniqueId\">";
        echo "<form class=\"msgcontainer\" method=\"post\">";
        echo "<div style=\"display:none;\" class=\"error_1$uniqueId\"></div>";
        echo "<div style=\"display:none;\" class=\"error_2$uniqueId\"></div>";
        echo "<div class =\"msgform\">";
        echo "<div class=\"field\">";
        echo "<label for=\"name\">Name</label>";
        echo '<input type="text" class="input" id="name_' . $uniqueId . '" name="name"  maxlength="80"  />';
        echo "</div>"; //end_field
        echo "<div class=\"field\">";
        echo "<label for=\"email\">Email</label>";
        echo '<input style="text-transform:lowercase;" type="text" class="input" id="email_' . $uniqueId . '" name="email" maxlength="80" />';
        echo "</div>"; //end_field
        echo "<div class=\"field\">";
        echo "<label for=\"description\">Message</label>";
        echo '<textarea name="description" id="description_' . $uniqueId . '"width="309px" rows="4" placeholder="Enter your message here..." ></textarea>';
        echo "</div>"; //end_field
        echo "<div class=\"messageRouter\">";
        echo "<input class=\"close\" type=\"button\" onclick=\"closeMsgbox($itemId,'$itemName')\" value=\"Close\" />";
        echo "<input class=\"send\" type=\"button\" onclick=\"swapmailback($itemId, '$user->getEmail()','$itemName')\" value=\"Send\" />";
        echo "</div>";
        echo "</div>"; //end_msgform
        echo "<div class=\"clear\"></div>";
        echo "</form>"; //end_form
        echo "</div>"; //end_msgcontainer
    }
    /*@ function to display contact method /mail/phone/
	 * input: $objDir,$uniqueId,$contactType,$itemId,$itemName,$userName,$userPhone
	* */
    private function displayContactMethod($objImg, $uniqueId, $contactType, $itemId, $itemName, $user)
    {
        echo "<div id=\"mail_report\" class=\"contact_$uniqueId\">";
        echo "</br>";
        echo "<div class=\"header\"><label>Contact</label></div>";
        if ($contactType == "Email" or $contactType == "Both")
            echo "<div class=\"email\">
			<img src =\"$objImg->PATH_MAIL_ICON\"><a onclick=\"swapmail($itemId,'$itemName')\">Send a message/መልእክት ለባለንብረቱ ይላኩ</a></div>";
        if ($contactType == "Phone" or $contactType == "Both")
            echo "<div class=\"phone\">
			<img src =\"$objImg->PATH_PHN_ICON\"><label>" . $user->getUserName() . ":" . $user->getPhone() . "</label></div>";
        echo "<div class=\"abuse\" style=\"color:#0d6aac\"><img src =\"$objImg->PATH_RPT_ICON\"><a onclick=\"swapabuse($itemId,'$itemName')\">Report Abuse/ያልተገባ መረጃ ከሆነ ጥቆማ ያድርጉ</a></div>";
        echo "</div>";
    }
    /*@ function to display image gallery
	 * input: $objImg, $objDir, $image, $objItem, $itemId
	* */
    private function displayGallery($objImg, $image, $objItem, $itemId)
    {
        global $documnetRootPath;

        $dir1 = 'original/';
        $file = $dir1 . $image[1];
        $numimage = $objImg->getNumOfImg();
        $itemName = $objItem->getItemName();
        echo "<div class=\"featured_left_side\">";
        if ($numimage == 1) {
            $file_path = '../images/hulutera.png';
            echo '<div id="featured_left_side_bigImageOnly"><img id="largeImg" src="' . $file_path . '" ></div>';
        }
        if ($numimage > 1) {
            echo "<div id=\"featured_left_side_bigImage\"><img class=\"largeImg\" id=\"largeImg$itemName$itemId\" src=\"" . $file . "\"></div>";
            echo "<div id=\"featured_buttom\">";
            echo "<div class=\"imagesGallery\">";
            for ($i = 1; $i < $numimage; $i++) {
                $divName = 'bottomimg' . $itemName . $itemId . $i;
                echo "
				<a href=\"javascript:void(0)\" onclick=\"imgnumber('$dir1','$image[$i]',$itemId, '$itemName')\"\">
				<img class=\"featured_buttom_img\"  id=\"$divName\" src=\" \" />
				</a>
				";
            }
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    }
    /*@ function to display item specific contents
	 * input: $obj
	* */
    private function displaySpecifics($obj)
    {
        switch (get_class($obj)) {
            case "CarClass":
                echo $obj->getMake()     ? "<p><strong>Make:&nbsp</strong>" . $obj->getMake() . "</p>" : "";
                echo $obj->getCategory() ? "<p><strong>Type:&nbsp</strong>" . $obj->getCategory() . "</p>" : "";
                echo $obj->getMfg() != "0000"       ? "<p><strong>Year of Make:&nbsp</strong>" . $obj->getMfg() . "</p>" : "";
                echo $obj->getFuel()      ? "<p><strong>Fuel:&nbsp</strong>" . $obj->getFuel() . "</p>" : "";
                echo $obj->getSeat()      ? "<p><strong>Nr of Seats:&nbsp</strong>" . $obj->getSeat() . "</p>" : "";
                echo $obj->getColor() != "999"     ? "<p><strong>Color:&nbsp</strong>" . $obj->getColor() . "</p>" : "";
                echo $obj->getGear()      ? "<p><strong>Gear:&nbsp</strong>" . $obj->getGear() . "</p>" : "";
                echo $obj->getInfo()      ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">" . $obj->getInfo() . "</p>" : "";
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
    private function displayPrice($obj)
    {
        echo "<div class=\"price\">";
        switch (get_class($obj)) {
            case "CarClass":
            case "HouseClass":
                $rentValue = $obj->getRent();
                $sellValue = $obj->getSell();
                $negoValue = $obj->getNego();
                $negoDisplay = ($negoValue == 1) ? "Negotiable" : "";
                $curr  = $obj->getCurr();
                $rate  = $obj->getRate();

                //ctrl var
                $rentsellwnego =   $rentValue &&  $sellValue &&  $negoValue;
                $rentsell      =   $rentValue &&  $sellValue && !$negoValue;
                $rentnego      =   $rentValue && !$sellValue &&  $negoValue;
                $rent          =   $rentValue && !$sellValue && !$negoValue;
                $sellnego      =  !$rentValue &&  $sellValue &&  $negoValue;
                $sell          =  !$rentValue &&  $sellValue && !$negoValue;
                $noprice       =  !$rentValue && !$sellValue && !$negoValue;
                $nego          =  !$rentValue && !$sellValue &&  $negoValue;

                //display var
                $rent_var = "<p style=\"text-indent: 10px;\"><strong>Rent:&nbsp</strong>" . $rentValue . " " . $curr . "/" . $rate . "</p>";
                $sell_var = "<p style=\"text-indent: 10px;\"><strong>Sell:&nbsp</strong>" . $sellValue . " " . $curr . "</p>";
                $nego_var = "<p style=\"text-indent: 10px;\">" . $negoDisplay . "/መደራደር ይቻላል/</p>";
                echo "<p><strong>Price:</strong></p>";

                if ($rentsellwnego) {
                    echo $rent_var . $sell_var . $nego_var;
                } else if ($sellnego) {
                    echo $sell_var . $nego_var;
                } else if ($rentnego) {
                    echo $rent_var . $nego_var;
                } else if ($rentsell) {
                    echo $rent_var . $sell_var;
                } else if ($nego) {
                    echo $nego_var;
                } else if ($rent) {
                    echo $rent_var;
                } else if ($sell) {
                    echo $sell_var;
                } else if ($noprice) {
                    echo "<p style=\"text-indent: 10px;\">No price information Available</p>";
                }
                break;
            case "CompClass":
            case "ElecClass":
            case "HouseHoldClass":
            case "PhoneClass":
            case "OtherClass":
                //ctrl var
                $sellValue = $obj->getSell();
                $negoValue = $obj->getNego();
                $negoDisplay = ($negoValue == 1) ? "Negotiable" : "";
                $sellnego  =  $sellValue  &&  $negoValue;
                $sell      =  $sellValue  && !$negoValue;
                $noprice   =  !$sellValue && !$negoValue;
                $nego      =  !$sellValue &&  $negoValue;
                $curr  = $obj->getCurr();

                //display var
                $sell_var = "<p style=\"text-indent: 10px;\"><strong>Sell:&nbsp</strong>" . $sellValue . " " . $curr . "</p>";
                $nego_var = "<p style=\"text-indent: 10px;\">" . $negoDisplay . "/መደራደር ይቻላል/</p>";
                echo "<p><strong>Price:</strong></p>";
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
}
