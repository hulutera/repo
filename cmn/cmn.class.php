<?php
/* Class for common methods used for all items
 * */
class DirectoryClass
{
	public $host;
	public $IMG_NOT_AVAIL        = "http://static.katomer.com/img/mk.png";
	public $IMG_NOT_AVAIL_THMBNL = "http://static.katomer.com/img/mkThumbnail.png";
	public $PATH_MAIL_ICON       = "http://static.katomer.com/img/mail.ico";
	public $PATH_PHN_ICON 		 = "http://static.katomer.com/img/phone.ico";
	public $PATH_RPT_ICON 		 = "http://static.katomer.com/img/report.ico";
	public $PATH_ITEM_CAR 		 = "http://static.katomer.com/uploads/carimages/";
	public $PATH_ITEM_CMP        = "http://static.katomer.com/uploads/computerimages/";
	public $PATH_ITEM_ELR        = "http://static.katomer.com/uploads/electronicsimages/";
	public $PATH_ITEM_HUS        = "http://static.katomer.com/uploads/houseimages/";
	public $PATH_ITEM_HLD        = "http://static.katomer.com/uploads/householdimages/";
	public $PATH_ITEM_PHN        = "http://static.katomer.com/uploads/phoneimages/";
	public $PATH_ITEM_THR        = "http://static.katomer.com/uploads/othersimages/";
	public $dir ="";

	public function getDirectory()
	{
		return $this->dir;	
	}
	public function setDirectory($type,$itemId)
	{
		$this->host = substr($_SERVER['HTTP_HOST'],0,5);
		if(in_array($this->host, array('local','127.0','192.1')))
		{
			$this->dir = "../../uploads/".$type."/".$itemId."/";
		}
		else
		{
			$this->dir = "http://static.katomer.com/uploads/".$type."/".$itemId."/";
		}
	}
}
class ImgHandler
{
	public  $nbrOfImgs = 0;
	private $ctr = 1;
	private $maxNumOfImg = 5;
	public  $image = array();
	
	public function initImage($itemRow)
	{
		$k = 1;
		$i = 1;
		while($k <= 5)
		{
			if($itemRow['picture_'.$k] != NULL)
			{
				$this->image[$i] = $itemRow['picture_'.$k];
				$i++;
			}
			$k++;
		}
		$this->nbrOfImgs = $i;
		return $this->image;
	}
	public function getNumOfImg()
	{
		return $this->nbrOfImgs;
	}
}
class UserClass
{
	public $id,$email,$phone,$name,$role;
	public function setUserElements($itemrow)
	{
		$this->id    = $itemrow['uID'];
		$this->role  = $itemrow['uRole'];
		$this->name  = $itemrow['uFirstName'];
		$this->email = $itemrow['uEmail'];
		$this->phone = $itemrow['uPhone'];
	}
	public function getUserId()
	{
		return $this->id;
	}
	public function getUserRole()
	{
		return $this->role;
	}
	public function getUserName()
	{
		return $this->name;
	}
	public function getUserEmail()
	{
		return $this->email;
	}
	public function getUserPhone()
	{
		return $this->phone;
	}
}
//class for common components
class CommonClass
{
	/*@ function to display action to take by admin/moderator/user/
	 * input: objects $objCar,$objUser
	* */
	public function printAction($objCar,$objUser)
	{
		$itemId = $objCar->getId();
		$name   = $objCar->getItemName();
		$time   = $objCar->getUpldTime();
		$time   = strtotime($time);
		$userId    = $objUser->getUserId();
		$userRole  = $objUser->getUserRole();

		echo"<div  class=\"delete_activate\">
		<input class=\"modActionDelete\" type=\"button\" value=\"Delete\" id=\"delete_button\"  onclick=\"func_moderatorActions('delete','$name',$itemId,'1','%','pendingNumb') \" />
		<input class=\"modActionActive\" type=\"button\" value=\"Activate\" id=\"activate_button\" onclick=\"func_moderatorActions('activate','$name',$itemId,$time,'%','pendingNumb')\" />
		</div>"; //end_delete_activate
		echo"<div  class=\"moderatorDelete\">
		<input class=\"modActionDelete\" type=\"button\" value=\"Delete\" id=\"delete_button\"  onclick=\"func_moderatorActions('delete','$name',$itemId,'1','%','deletedNumb') \" />
		<input class=\"modActionActive\" type=\"button\" value=\"Activate\" id=\"activate_button\" onclick=\"func_moderatorActions('activate','$name',$itemId,$time,'%','deletedNumb')\" />
		</div>";//end_moderatorDelete
		echo "<div  class=\"delete_ignore\">
		<input class=\"modActionDelete\" type=\"button\" value=\"Delete\" onclick=\"func_moderatorActions('remove','$name',$itemId,'1','%','reportedNumb') \" />
		<input class=\"modActionActive\" type=\"button\" value=\"Ignore\" id=\"activate_button\" onclick=\"func_moderatorActions('ignore','$name',$itemId,'1','%','reportedNumb')\" />
		<input class=\"modActionActive\" type=\"button\" value=\"show Report\" onclick=\"func_moderatorShow('show','$name',$itemId) \" />
		</div>";//end_delete_ignore
		echo "<div class=\"userActiveButton\">";
		echo "<input  class=\"modActionDelete\"  type=\"button\" value=\"Delete\"   onclick=\"func_moderatorActions('delete','$name',$itemId,'1',$userId,'userActiveNumb') \" />";
		echo "</div>";//end_userActiveButton
		echo "<div  class=\"userPendingButton\">";
		echo "<input class=\"modActionDelete\" type=\"button\" value=\"Delete\"   onclick=\"func_moderatorActions('delete','$name',$itemId,'1',$userId,'userPendingNumb') \" />";
		if($userRole =='admin' || $userRole =='mod')
		{
			echo "<input class=\"modActionActive\" type=\"button\" value=\"Activate\" id=\"activate_button\" onclick=\"func_moderatorActions('activate','$name',$itemId,$time,'%','pendingNumb')\" />";
		}
		echo "</div>";//end_userPendingButton
	}
	/*@ function to display uploaded date
	 * input:$datetime
	* */
	public function printUpldTime($datetime)
	{
		$datetimestr = strtotime($datetime);
		$today       = strtotime("today");
		$yesterday   = strtotime("yesterday");
		$tomorrow    = strtotime("tomorrow");
		if( $datetimestr >= $today)
		{
			echo "<div class=\"date\"> Today </div></br>";
		}
		else if($datetimestr >= $yesterday)
		{
			echo "<div class=\"date\">Yesterday</div></br>";
		}
		else
		{
			echo '<div class="date">'.$datetime.'</div></br>';
		}
	}
	/*@ function to display titile of the item
	 * if found else item category is displayed
	* input: title, itemName
	* */
	public function printTitle($title,$itemName)
	{
		echo "<div class=\"header\">";
		echo $title!=null?$title:$itemName;
		echo "</div>";
	}
	/*@function to display location of item
	 * input : location /loc
	* */
	public function printLocation($loc)
	{
		if($loc!="")
		{
			echo "<div class=\"location\">".$loc."</div>";
		}
	}
	/*@function to display market type /SELL/RENT
	 * input: mkTyp
	* */
	public function printMarketType($mkTyp)
	{
		if($mkTyp != "No Action")
		{
			echo "<div id=\"text_sellRent\">".strtoupper($mkTyp)."</div></br>";
		}
	}
		
	/*@ function to display a dialog to submit abuses
	 * input:  $uniqueId,$itemId,$itemName
	* */
	public function printReportReq($uniqueId,$itemId,$itemName)
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
	public function printMailCfrm($uniqueId,$itemId,$itemName)
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
	public function printReportCfrm($uniqueId,$itemId,$itemName)
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
	public function printMailForm($uniqueId,$itemId,$itemName,$userEmail)
	{
		echo "<div style=\"display:none;\" class=\"message_$uniqueId\">";
		echo "<form class=\"msgcontainer\" method=\"post\">";
		echo "<div style=\"display:none;\" class=\"error_1$uniqueId\"></div>";
		echo "<div style=\"display:none;\" class=\"error_2$uniqueId\"></div>";
		echo "<div class =\"msgform\">";
		echo "<div class=\"field\">";
		echo "<label for=\"name\">Name</label>";
		echo '<input type="text" class="input" id="name_'.$uniqueId.'" name="name"  maxlength="80"  />';
		echo "</div>";//end_field
		echo "<div class=\"field\">";
		echo "<label for=\"email\">Email</label>";
		echo '<input style="text-transform:lowercase;" type="text" class="input" id="email_'.$uniqueId.'" name="email" maxlength="80" />';
		echo "</div>";//end_field
		echo "<div class=\"field\">";
		echo "<label for=\"description\">Message</label>";
		echo '<textarea name="description" id="description_'.$uniqueId.'"width="309px" rows="4" placeholder="Enter your message here..." ></textarea>';
		echo "</div>";//end_field
		echo "<div class=\"messageRouter\">";
		echo "<input class=\"close\" type=\"button\" onclick=\"closeMsgbox($itemId,'$itemName')\" value=\"Close\" />";
		echo "<input class=\"send\" type=\"button\" onclick=\"swapmailback($itemId, '$userEmail','$itemName')\" value=\"Send\" />";
		echo "</div>";
		echo "</div>"; //end_msgform
		echo "<div class=\"clear\"></div>";
		echo "</form>";//end_form
		echo "</div>"; //end_msgcontainer
	}
	/*@ function to display contact method /mail/phone/
	 * input: $objDir,$uniqueId,$contactType,$itemId,$itemName,$userName,$userPhone
	* */
	public function printContactMethod($objDir,$uniqueId,$contactType,$itemId,$itemName,$userName,$userPhone)
	{
		echo "<div id=\"mail_report\" class=\"contact_$uniqueId\">";
		echo "</br>";
		echo "<div class=\"header\"><label>Contact</label></div>";
		if($contactType == "Email" OR $contactType == "Both")
			echo "<div class=\"email\">
			<img src =\"$objDir->PATH_MAIL_ICON\"><a onclick=\"swapmail($itemId,'$itemName')\">Send a message/መልእክት ለባለንብረቱ ይላኩ</a></div>";
		if($contactType == "Phone" OR $contactType == "Both")
			echo "<div class=\"phone\">
			<img src =\"$objDir->PATH_PHN_ICON\"><label>".$userName.":".$userPhone."</label></div>";
		echo "<div class=\"abuse\" style=\"color:#0d6aac\"><img src =\"$objDir->PATH_RPT_ICON\"><a onclick=\"swapabuse($itemId,'$itemName')\">Report Abuse/ያልተገባ መረጃ ከሆነ ጥቆማ ያድርጉ</a></div>";
		echo "</div>";
	}
	/*@ function to display image gallery
	 * input: $objImg, $objDir, $image, $objItem, $itemId
	* */
	public function printGallery($objImg, $objDir, $image, $objItem, $itemId)
	{
		$dir = $objDir->getDirectory();
		$numimage = $objImg->getNumOfImg();
		$itemName = $objItem->getItemName();
		echo "<div class=\"featured_left_side\">";
		if($numimage == 0)
		{
			echo "<div id=\"featured_left_side_bigImageOnly\"><img id=\"largeImg\" src=\"$objDir->IMG_NOT_AVAIL\"></div>";
		}
		if($numimage == 1)
		{
			$image[1] = str_replace('thumbnail','',$image[1]);
			$dir1 = $dir.'original/';
			$file = $dir1.$image[1];
			echo "<div id=\"featured_left_side_bigImageOnly\"><img id=\"largeImg\" src=\".$file"."\"></div>";
		}
		if($numimage >= 2)
		{
			$image[1] = str_replace('thumbnail','',$image[1]);
			$dir1 = $dir.'original/';
			$file = $dir1.$image[1];
			echo "<div id=\"featured_left_side_bigImage\"><img class=\"largeImg\" id=\"largeImg$itemName$itemId\" src=\"".$file."\"></div>";
			echo "<div id=\"featured_buttom\">";
			echo "<div class=\"imagesGallery\">";
			for($i = 1; $i < $numimage; $i++)
			{
				$image[$i] = str_replace('thumbnail','',$image[$i]);
				$dir1 = $dir.'original/';
				$file = $dir1.$image[1];
				$divName = 'bottomimg'.$itemName.$itemId.$i;
				echo "
				<a href=\"javascript:void(0)\" onclick=\"imgnumber('$dir1','$image[$i]',$itemId, '$itemName')\"   
				onMouseOver=\"mouseOver('$dir1','$image[$i]',$itemId, '$itemName','$divName')\">
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
	public function printSpecifics($obj)
	{
		switch (get_class($obj))
		{
			case "CarClass":
				echo $obj->getMake()     ? "<p><strong>Make:&nbsp</strong>".$obj->getMake()."</p>":"";
				echo $obj->getCategory() ? "<p><strong>Type:&nbsp</strong>".$obj->getCategory()."</p>":"";
				echo $obj->getMfg() != "0000"  	 ? "<p><strong>Year of Make:&nbsp</strong>".$obj->getMfg()."</p>":"";
				echo $obj->getFuel() 	 ? "<p><strong>Fuel:&nbsp</strong>".$obj->getFuel()."</p>":"";
				echo $obj->getSeat() 	 ? "<p><strong>Nr of Seats:&nbsp</strong>".$obj->getSeat()."</p>":"";
				echo $obj->getColor() != "999"	 ? "<p><strong>Color:&nbsp</strong>".$obj->getColor()."</p>":"";
				echo $obj->getGear() 	 ? "<p><strong>Gear:&nbsp</strong>".$obj->getGear()."</p>":"";
				echo $obj->getInfo() 	 ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">".$obj->getInfo()."</p>":"";
				break;
			case "CompClass":
				echo $obj->getMake()      ? "<p><strong>Make:&nbsp</strong>".$obj->getMake()."</p>":"";
				echo $obj->getCategory()  ? "<p><strong>Type:&nbsp</strong>".$obj->getCategory()."</p>":"";
				echo $obj->getOS() 		  ? "<p><strong>OS:&nbsp</strong>".$obj->getOS()."</p>":"";
				echo $obj->getProcessor() ? "<p><strong>Processor:&nbsp</strong>".$obj->getProcessor()."</p>":"";
				echo $obj->getRAM() 	  ? "<p><strong>RAM:&nbsp</strong>".$obj->getRAM()."</p>":"";
				echo $obj->getHardDisk() ? "<p><strong>Hard Drive:&nbsp</strong>".$obj->getHardDisk()."</p>":"";
				//echo $obj->getColor() 	  ? "<p><strong>Color:&nbsp</strong>".$obj->getColor()."</p>":"";
				echo $obj->getInfo() 	  ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">".$obj->getInfo()."</p>":"";
				break;
			case "ElecClass":
				echo $obj->getCategory() ? "<p><strong>Type:&nbsp</strong>".$obj->getCategory()."</p>":"";
				echo $obj->getInfo()     ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">".$obj->getInfo()."</p>":"";
				break;
			case "HouseClass":
				echo $obj->getCategory() ? "<p><strong>Type:&nbsp</strong>".$obj->getCategory()."</p>":"";
				echo $obj->getWereda()   ? "<p><strong>Wereda:&nbsp</strong>".$obj->getWereda()."</p>":"";
				echo $obj->getLotSize()  ? "<p><strong>Lot Size:&nbsp</strong>".$obj->getLotSize()."</p>":"";
				echo $obj->getBedrooms() ? "<p><strong>Bed Rooms:&nbsp</strong>".$obj->getBedrooms()."</p>":"";
				echo $obj->getToilet()   ? "<p><strong>Toilet:&nbsp</strong>".$obj->getToilet()."</p>":"";
				echo $obj->getBathrooms()? "<p><strong>Bath Rooms:&nbsp</strong>".$obj->getBathrooms()."</p>":"";
				echo $obj->getYrOfBlt()  ? "<p><strong>Built Year:&nbsp</strong>".$obj->getYrOfBlt()."</p>":"";
				if($obj->getWater()){
					if($obj->getWater() == 1)
						echo "<p><strong>Water:&nbsp</strong>Yes</p>";
					else
						echo "<p><strong>Water:&nbsp</strong>No</p>";
				}
				if($obj->getElec()){
					if($obj->getElec() == 1)
					echo "<p><strong>Electricity:&nbsp</strong>Yes</p>";
					else 	
						echo "<p><strong>Electricity:&nbsp</strong>No</p>";
				}
				
				echo $obj->getInfo()     ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">".$obj->getInfo()."</p>":"";
				break;
			case "HouseHoldClass":break;
			case "PhoneClass":
				echo ($obj->getMake()!="000"   && $obj->getMake())   ? "<p><strong>Make:&nbsp</strong>".$obj->getMake()."</p>":"";
				echo ($obj->getModel()!="000"  && $obj->getModel())  ? "<p><strong>Model:&nbsp</strong>".$obj->getModel()."</p>":"";
				echo ($obj->getOS()!="000"     && $obj->getOS())     ? "<p><strong>OS:&nbsp</strong>".$obj->getOS()."</p>":"";
				echo $obj->getInfo()    ? "<p><p><strong>Extra Info:</strong></p><p style=\"border:1px solid darkkhaki;overflow:scroll;height:70px; width:100%;\">".$obj->getInfo()."</p>":"";
				break;
			case "OtherClass":break;
		}
	}
	const rent       = "rent";
	const sell       = "sell";
	const rentOrSell = "sell or Rent";
	const noAction   = "No Action";
	//
	const email = 1;
	const phone = 2;
	const emailAndPhone = 3;
	//
	const birr    = "Birr";
	const dollar  = "USD";
	//
	const nego    = "Negotiable";
	const status  = "pending";
	//
	const CImage  = "carimages";
	const DImage  = "computerimages";
	const HImage  = "houseimages";
	const PImage  = "phoneimages";
	const EImage  = "electronicsimages";
	const HHImage = "householdimages";
	const OImage  = "othersimages";

	const THUMBNAIL = "thumbnail";
	const SCALE     = 45;
}
class DatabaseClass
{
	private $carQuery,$houseQuery,$computerQuery,$householdQuery,$otherQuery,$phoneQuery;
	public function setQuery($obj,$itemId)
	{
		switch (get_class($obj))
		{
			case "CarClass":
				$this->carQuery = "SELECT * FROM car
				LEFT JOIN carimages
				ON	car.cID = carimages.ItemID
				LEFT JOIN user
				ON	car.uID = user.uID
				LEFT JOIN carcategory ON
				car.carCategoryID = carcategory.categoryID
				LEFT JOIN contactmethodcategory ON
				car.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				car.cID=$itemId
				";
				break;
			case "CompClass":
				$this->computerQuery = "SELECT * FROM computer
				LEFT JOIN computerimages
				ON	computer.dID = computerimages.ItemID
				LEFT JOIN user
				ON	computer.uID = user.uID
				LEFT JOIN
				computercategory ON
				computer.compCategoryID = computercategory.categoryID
				LEFT JOIN contactmethodcategory ON
				computer.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				computer.dID=$itemId ";break;
			case "ElecClass":
				$this->electronicsQuery = "SELECT * FROM electronics
				LEFT JOIN electronicsimages
				ON	electronics.eID = electronicsimages.ItemID
				LEFT JOIN user
				ON	electronics.uID = user.uID
				LEFT JOIN electronicscategory ON
				electronics.electronicsCategoryID = electronicscategory.categoryID
				LEFT JOIN contactmethodcategory ON
				electronics.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				electronics.eID=$itemId ";
				break;
			case "HouseClass":
				$this->houseQuery = "SELECT * FROM house
				LEFT JOIN houseimages
				ON	house.hID = houseimages.ItemID
				LEFT JOIN user
				ON	house.uID = user.uID
				LEFT JOIN housecategory ON
				house.houseCategoryID = housecategory.categoryID
				LEFT JOIN contactmethodcategory ON
				house.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				house.hID=$itemId ";
				break;
			case "HouseHoldClass":
				$this->householdQuery = "SELECT * FROM household
				LEFT JOIN householdimages
				ON	household.hhID = householdimages.ItemID
				LEFT JOIN user
				ON	household.uID = user.uID
				LEFT JOIN householdcategory ON
				household.hhCategoryID = householdcategory.categoryID
				LEFT JOIN contactmethodcategory ON
				household.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				household.hhID=$itemId ";
				break;
			case "PhoneClass":
				$this->phoneQuery = "SELECT * FROM phone
				LEFT JOIN phoneimages
				ON	phone.pId = phoneimages.ItemId
				LEFT JOIN user
				ON	phone.uId = user.uId
				LEFT JOIN contactmethodcategory ON
				phone.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				phone.pID=$itemId";
				break;
			case "OtherClass":
				$this->otherQuery = "SELECT * FROM others
				LEFT JOIN othersimages
				ON	others.oID = othersimages.ItemID
				LEFT JOIN user
				ON	others.uID = user.uID
				LEFT JOIN contactmethodcategory ON
				others.contactMethodCategoryId = contactmethodcategory.Id
				WHERE
				others.oID=$itemId ";
				break;
			default:break;
		}
	}
	public function getQuery($obj)
	{
		switch (get_class($obj))
		{
			case "CarClass"			:return $this->carQuery;break;
			case "CompClass"		:return $this->computerQuery;break;
			case "ElecClass"		:return $this->electronicsQuery;break;
			case "HouseClass"		:return $this->houseQuery;break;
			case "HouseHoldClass"	:return $this->householdQuery;break;
			case "PhoneClass"		:return $this->phoneQuery;break;
			case "OtherClass"		:return $this->otherQuery;break;
			default:break;
		}

	}
}
class PriceClass
{
	public function printPrice($obj)
	{
		echo "<div class=\"price\">";
		switch (get_class($obj))
		{
			case "CarClass":
			case "HouseClass":
				$rentValue = $obj->getRent();
				$sellValue = $obj->getSell();
				$negoValue = $obj->getNego();
				$negoDisplay= ($negoValue == 1)?"Negotiable":""; 
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
				$rent_var = "<p style=\"text-indent: 10px;\"><strong>Rent:&nbsp</strong>".$rentValue." ".$curr."/".$rate."</p>";
				$sell_var = "<p style=\"text-indent: 10px;\"><strong>Sell:&nbsp</strong>".$sellValue." ".$curr."</p>";
				$nego_var = "<p style=\"text-indent: 10px;\">".$negoDisplay."/መደራደር ይቻላል/</p>";
				echo "<p><strong>Price:</strong></p>";

				if($rentsellwnego)
				{
					echo $rent_var.$sell_var.$nego_var;
				}
				else if($sellnego)
				{
					echo $sell_var.$nego_var;
				}
				else if($rentnego)
				{
					echo $rent_var.$nego_var;
				}
				else if($rentsell)
				{
					echo $rent_var.$sell_var;
				}
				else if($nego)
				{
					echo $nego_var;
				}
				else if($rent)
				{
					echo $rent_var;
				}
				else if($sell)
				{
					echo $sell_var;
				}
				else if($noprice)
				{
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
				$negoDisplay= ($negoValue == 1)?"Negotiable":"";
				$sellnego  =  $sellValue  &&  $negoValue;
				$sell      =  $sellValue  && !$negoValue;
				$noprice   =  !$sellValue && !$negoValue;
				$nego      =  !$sellValue &&  $negoValue;
				$curr  = $obj->getCurr();

				//display var
				$sell_var = "<p style=\"text-indent: 10px;\"><strong>Sell:&nbsp</strong>".$sellValue." ".$curr."</p>";
				$nego_var = "<p style=\"text-indent: 10px;\">".$negoDisplay."/መደራደር ይቻላል/</p>";
				echo "<p><strong>Price:</strong></p>";
				if($sellnego){
					echo $sell_var.$nego_var;
				}else if($nego){
					echo $nego_var;
				}else if($sell){
					echo $sell_var;
				}else if($noprice){
					echo "<p style=\"text-indent: 10px;\">No price information Available</p>";
				}
				break;
			default:break;

		}
		echo "</div>"; //end_Price
	}
}
?>
