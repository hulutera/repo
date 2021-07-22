<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/pagination.php';
require_once $documnetRootPath . '/test/backtracer.php';

class HtCommonView extends MySqlRecord
{

    private $_itemName;

    function __construct($itemName = NULL)
    {
        $this->_itemName = $itemName;
    }

    /**
     * Get the image directory
     * */
    public function getImageDir($itemObj)
    {
        $itemCat = "item_" . $this->_itemName;
        $userCat = "/user_id_" . $itemObj->getIdUser();
        $itemTmpIdCat = "/item_temp_id_" . $itemObj->getIdTemp() . "/";
        $imageDir = "../upload/" . $itemCat . $userCat .  $itemTmpIdCat;
        return $imageDir;
    }


    /*@ function to display action to take by admin/moderator/user/
	 * input: objects $pItem,$pUser
	* */
    public function displayAction($pItem, $user)
    {
        $itemId = $pItem->getId();
        $name   = $pItem->getTableName();
        $time   = $pItem->getFieldUploadDate();
        $time   = strtotime($time);
        $userId    =  $user->getId();
        $userRole  = $user->getFieldPrivilege();

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
            echo '<p>' . $GLOBALS['lang']["today"] . '</p>';
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
        return $itemObj->getFieldTitle();
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
        $array = ["car", "phone", "computer"];
        if (in_array($this->_itemName, $array)) {
            echo "<div class=\"location\">";
            echo $itemObj->getFieldMake();
            echo "</div>";
        }
    }

    public function displayLocation($itemObj)
    {
        $loc =  $itemObj->getFieldLocation();
        if ($loc != "") {
            echo '<p>' . $GLOBALS['city_lang_arr']["$loc"] . '</p>';
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

    /*@function to display market type /SELL/RENT
	 * input: mkTyp
	* */
    public function displayMarketTypeNoCss($itemObj)
    {
        $mrkTyp = $itemObj->getFieldMarketCategory();

        if ($mrkTyp != "No Action") {
            return $GLOBALS["upload_specific_array"]["common"]["marketType"][$mrkTyp];
        } else {
            return $GLOBALS["upload_specific_array"]["common"]["marketType"]["sell"];
        }
    }

    /*@ function to display a dialog to submit abuses
	 * input:  $uniqueId,$itemId,$itemName
	* */
    public function displayReportReq($uniqueId, $itemId, $itemName)
    {
        echo "<div class = \"reportabuse\">";
        echo "<div style=\"display:none;\" class=\"errorabuse_$uniqueId\">";
        echo "<p style=\"background-color: #FFBABA; color: #D8000C;\">" . $GLOBALS["abuse_type_lang_arr"][1]['You forgort to choose the Report type'] . "</p></div>";
        echo "<div id=\"reportbox\" class=\"reportbox_$uniqueId\">";
        echo "<p>" . $GLOBALS['lang']['Report Abuse'] . "</p>";
        echo "<select id=\"selectabuse_$uniqueId\" name=\"select_abuse\">";
        foreach ($GLOBALS["abuse_type_lang_arr"][0] as $key => $value) {
            echo "<option value=\"$key\">" . $value . "</option>";
        }
        echo "</select>";
        echo "<br>";
        echo "<input class=\"report\" type=\"button\" onclick=\"swapabuseback($itemId,'$itemName')\" value=\"" . $GLOBALS['lang']['report'] . "\" />";
        echo "<input class=\"closereport\" type=\"button\" onclick=\"closeAbusebox($itemId,'$itemName')\" value=\"" . $GLOBALS['lang']['close'] . "\" />";
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
        echo "<p class=\"bg-success\">" . $GLOBALS['lang']['msg sent'] . "</p> ";
        echo "<input  class=\"closeInnerRemove btn btn-danger btn-sm\" type=\"button\" onclick=\"swapmailclose($itemId,'$itemName')\" value=\"" . $GLOBALS['lang']['close'] . "\" />";
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
        echo '<p style="background-color:#BDE0C8">' . $GLOBALS["abuse_type_lang_arr"][1]["You successfully reported the item!"] . '</p>';
        echo "<input  class=\"closeReportInnerRemove btn btn-danger btn-sm\" type=\"button\" onclick=\"swapabuseclose($itemId,'$itemName')\" value=\"" . $GLOBALS['lang']['close'] . "\" />";
        echo "</div>"; //end_reportcfrm_*
        echo "</div>"; //end_reportmsgcompleted
    }
    /*@ function to display mail dialog sent to contact owner
	 * input: $uniqueId,$itemId,$itemName,$userEmail
	* */
    public function displayMailForm($uniqueId, $itemId, $itemName, $userId)
    {
        $userObj = new HtUserAll($userId);
        $email = $userObj->getFieldEmail();
        $language = isset($_GET['lan']) ? $_GET['lan'] : 'en';
        echo "<div style=\"display:none;\" class=\"message_$uniqueId col-xs-12 col-md-12\" style=\"margin:0;padding:0px;\">";
        echo "<form class=\"msgcontainerRemove thumbnail-message\" method=\"post\" >";
        echo "<div style=\"display:none;\" class=\"error_1$uniqueId form-group\">
             <p class=\"bg-danger\">" . $GLOBALS['lang']['You forgot to enter your name, email address and Message'] . "
             </div>";
        echo "<div style=\"display:none;\" class=\"error_2$uniqueId form-group\">
             <p class=\"bg-danger\">" . $GLOBALS['lang']['Your e-mail address is invalid'] . "
             </div>";
        echo "<div class =\"msgformRemove\">";
        echo '<p>' . $GLOBALS["lang"]["contact owner"] . '</p>';
        echo "<div class=\"fieldRemove form-group\">";
        echo "<label for=\"name\">" . $GLOBALS['lang']['Your name'] . "</label></br>";
        echo '<input type="text" id="name_' . $uniqueId . '" name="name" class="thumbnail-message-text"/>';
        echo "</div>"; //end_field
        echo "<div class=\"fieldRemove form-group\">";
        echo "<label for=\"email\">" . $GLOBALS['lang']['Email'] . "</label></br>";
        echo '<input class="thumbnail-message-email" type="email"  id="email_' . $uniqueId . '" name="email"/>';
        echo "</div>"; //end_field
        echo "<div class=\"fieldRemove form-group\">";
        echo "<label for=\"description\">" . $GLOBALS['lang']['Message'] . "</label>";
        echo '<textarea class="thumbnail-message-textarea" name="description" id="description_' . $uniqueId . '"  placeholder="' . $GLOBALS['lang']['Enter your message'] . '"></textarea>';
        echo "</div>"; //end_field
        echo "<div class=\"messageRouter1 form-group\">";
        echo "<input class=\"sendRemove btn btn-primary btn-sm\" type=\"button\" style=\"margin: 0px 10px\" onclick=\"swapmailback($itemId, '$email','$itemName', '$language')\" value=\"" . $GLOBALS['lang']['Send'] . "\" />";
        echo "<input class=\"closeRemove btn btn-danger btn-sm\" type=\"button\" style=\"margin: 0px 10px\" onclick=\"closeMsgbox($itemId,'$itemName')\" value=\"" . $GLOBALS['lang']['close'] . "\" />";
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
        $contactType = $itemObj->getFieldContactMethod();
        $itemId = $itemObj->getId();
        $userId = $itemObj->getIdUser();
        $userObj = new HtUserAll($userId);
        $phone = $userObj->getFieldPhoneNr();
        $email = $userObj->getFieldEmail();
        $userName = $userObj->getFieldFirstName();

        echo "<div id=\"mail_reportRemove\" style=\"margin-top:20px\" class=\"contact_$uniqueId \">";
        echo '<div class="headerRemove h2 fdl_title"><p>' . $GLOBALS["lang"]["Contact method"] . '</p></div>';
        if ($contactType == "phone" or $contactType == "both") {
            if ($phone != "" or $phone != NULL) {
                echo "<div class=\"phone fdl_contact\">
                <p><i class=\"glyphicon glyphicon-phone-alt\"></i>&nbsp" . $userName . ": " . $phone . "</p></div>";
            }
        }
        if ($contactType == "email" or $contactType == "both") {
            if ($email != "" or $email != NULL) {
                echo "<div class=\"email fdl_contact\">
                <p><i class=\"glyphicon glyphicon-envelope\"></i>&nbsp<a href=\"javascript:void(0)\" onclick=\"swapmail($itemId,'$itemName')\">" . $GLOBALS['lang']['Send a message'] . "</a></p></div>";
            }
        }

        echo "<div class=\"abuse fdl_contact\" style=\"color:#0d6aac\"><i class=\"glyphicon glyphicon-alert\" style=\"color:red\"></i>&nbsp<a href=\"javascript:void(0)\" onclick=\"swapabuse($itemId,'$itemName')\">" . $GLOBALS['lang']['Report Abuse'] . "</a></div>";
        echo "</div>";
    }

    public function displayGallery($imageNameArray, $thumbImgArray)
    {
        $image_count = 0;
        $button_html = '';
        $slider_html = '';
        $thumb_html = '';
        $filterArr = array('"', '[', ']');
        $bigImageFile = $imageNameArray[0];
        for ($i = 0; $i < sizeof($thumbImgArray); $i++) {
            $imageFileName = $thumbImgArray[$i];
            $fileName = str_replace($filterArr, '', $imageFileName);
            $thumb_image = $fileName;

            // Thumbnail html
            $thumb_html .= "<li><img style=\"max-height:100px\" src='" . $thumb_image . "'></li>";

        }

        for ($i = 0; $i < sizeof($imageNameArray); $i++){
            $active_class = "";
            if (!$image_count) {
                $active_class = 'active';
                $image_count = 1;
            }
            $image_count++;
            $imageFileName = $imageNameArray[$i];
            $fileName = str_replace($filterArr, '', $imageFileName);
            $bigImage =  $fileName;

            // slider image html
            $slider_html .= "<div class='item " . $active_class . "'>";
            $slider_html .= "<img src='" . $bigImage . "' class='img-responsive' style='margin:auto; max-height:400px;'>";
            $slider_html .= "<div class='carousel-caption'></div></div>";

            // Button html
            $button_html .= "<li data-target='#detailed-carousel' data-slide-to='" . $image_count . "' class='" . $active_class . "'></li>";

        }
        echo '
	<div id="detailed-carousel"  class="carousel slide detailed-carousel" data-ride="carousel" data-interval="false">

		<div class="carousel-inner" style="margin:0;">' . $slider_html . '</div>
		<a class="left carousel-control" href="#detailed-carousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" style="color:black"></span>
		</a>
		<a class="right carousel-control" href="#detailed-carousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" style="color:black"></span>
		</a>

	</div>
    <ul class="thumbnails-carousel clearfix">' . $thumb_html . '</ul>
        ';
    }

    public function displayPrice($itemObj)
    {
        echo '<div class="fdl_title col-xs-12 col-md-12"><p>' . $GLOBALS["upload_specific_array"]["common"]["rentOrSell"][3] . '</p></div>';
        echo "<div class=\"fdl_price_value\">";
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
                if ($rate != NULL) $rent_var = '<p>' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceRent"][0] . ':&nbsp' . $rentValue . ' ' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceCurrency"][2][$curr] . ' ' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceRate"][2][$rate] . '</p>';
                $sell_var = '<p>' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceSell"][0] . ':&nbsp' . $sellValue . ' ' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceCurrency"][2][$curr] . '</p>';
                $nego_var = '<p>' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceNego"][2][$itemObj->getFieldPriceNego()] . '</p>';
                //$not_for_sell =
                $not_for_rent = '<p>' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceRent"][0] . ':&nbsp' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceRent"][2] . '</p>';
                $not_for_sell = '<p>' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceSell"][0] . ':&nbsp' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceSell"][2] . '</p>';

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
                    echo "<p>No price information Available</p>";
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
                $sell_var = '<p>' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceSell"][0] . ':&nbsp' . $sellValue . ' ' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceCurrency"][2][$curr] . '</p>';
                $nego_var = '<p>' . $GLOBALS["upload_specific_array"]["common"]["fieldPriceNego"][2][$itemObj->getFieldPriceNego()] . '</p>';

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

    public function itemNotFound($searchWordSanitized, $city, $item)
    {
        global $lang;
        echo '<div id="mainColumnX" style="width:80%; margin-left:auto;margin-right:auto;float:none;">
            <p style="text-align:center;padding-top:10px;padding-bottom:10px;background-color:#378de5;color:white">' . $lang['search res'] . '</p>';
        echo '<div id="spanMainColumnX" style="color: red">';
        if ($searchWordSanitized == "" and $city == "000" and $item == "000") {
            echo $lang['failed search'] . $lang['no match msg part3'];
        } elseif ($searchWordSanitized != "") {
            echo $lang['no match msg part1'] . ' "' . $searchWordSanitized . '" ' . $lang['no match msg part2'] . $lang['no match msg part3'];
        } else {
            echo $lang['full no match msg'];
        }

        echo '</div></div>';
    }
}
