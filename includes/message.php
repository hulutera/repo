<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
require_once $documnetRootPath.'/includes/pagination.php';

$connect = DatabaseClass::getInstance()->getConnection();

$mailtype = (isset($_GET['mail_type'])) ? $_GET['mail_type'] : '%' ;
$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

/* This is true if mail type is chosen and page is not
 in other words, when follow or read or unread buttons clicked*/
if(isset($_GET['mail_type']) and !isset($_GET['page']) )
{
	message();
}
/*To lists unread and follow up mail*/
function boxes($msgid,$userEmail)
{
	global $connect;

	///$youremail The email address of the person who is logged in to see the account
	///$userEmail is the email address of the person who sent the message
	$uid = $_SESSION['uID'];
	$userQuery = $connect->query("SELECT uEmail FROM user WHERE uID = '$uid' ");

	while($user= $userQuery->fetch_assoc())
	{
		$youremail =$user['uEmail'];
	}

	echo'<div id="innerreplybox'.$msgid.'" class="replybox">';
	echo'<span class="msgspan">e-mail:</span></br><input type="text" value="'.$youremail.'" readonly/></br>';
	echo'<span class="msgspan">Message:</span></br>';
	echo'<textarea  id="replyMsg'.$msgid.'" value ="bjhbj"></textarea><br/>';
	echo'<div id="divmsgSendClose" class="divmsgSendClose">';
	echo"<input type=\"button\"  class =\"sendReply\" onclick= \"sendReplyMsg('$userEmail','$youremail','$msgid')\" value =\"Send\">";
	echo'<a  href="javascript:void(0)" onclick="closeReplyBox('.$msgid.')" >';
	echo'<img class="msgclose" style="padding-top:8px;" src="http://static.hulutera.com/img/del.jpg" /></a>';
	echo'</div>';
	echo'<div id="emptydiv_for_divAds"></div>';
	echo'</div>';
	echo'</div>';
}
//To list message
function messageList($NumOfmsg,$mailtype)
{
	global $connect;
	$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
	$MAX = 30;
	$itemstart = $MAX * ($page -1);
	$message = $connect->query("SELECT * FROM contactus WHERE messageStatus LIKE '$mailtype'
			ORDER BY timeReceived DESC LIMIT $itemstart,$MAX ") or die(mysqli_error());

	while($dmessage= $message->fetch_assoc())
	{
		$msgid =$dmessage['kID'];
		$status = $dmessage['messageStatus'];
		$userEmail= $dmessage['email'];
			
		switch($status)
		{
			case 'read':
				echo'<div id="divListbox'.$msgid.'" class="listbox" >';
				echo'<input id="ceckbox_msg'.$msgid.'" class="cbox_msg" type="checkbox" value="'.$msgid.'" />';
				echo'<a   style="text-decoration:none; " class="readanchor" href="javascript:void(0)" onclick="showMsgBox('.$msgid.' ,\'read\')">';
				echo'<div id="followSign'.$msgid.'" style="float:left; color:red;" class="followSign">!&nbsp;</div>';
				echo'<div class="nameColumn">'.$dmessage['name'].'</div>';
				echo'<div class="subjectColumn">'.$dmessage['subject'].'</div>';
				echo'<div class="dateColumn">'.$dmessage['timeReceived'].'</div>';
				echo'</a>';
				break;
					
			case 'unread':
				echo'<div id="divListbox'.$msgid.'" class="listbox" >';
				echo'<input id="ceckbox_msg'.$msgid.'" class="cbox_msg" type="checkbox" value="'.$msgid.'" />';
				echo'<a   style="text-decoration:none; " class="readanchor" href="javascript:void(0)" onclick="showMsgBox('.$msgid.' , \'unread\')">';
				echo'<div id="followSign'.$msgid.'" style="float:left; color:red;" class="followSign" >!&nbsp;</div>';
				echo'<div id="nameColumn'.$msgid.'" class="nameColumn" style="font-weight:bold">'.$dmessage['name'].'</div>';
				echo'<div id ="subjectColumn'.$msgid.'" class="subjectColumn" style="font-weight:bold">'.$dmessage['subject'].'</div>';
				echo'<div class="dateColumn">'.$dmessage['timeReceived'].'</div>';
				echo'</a>';
				break;
					
			case 'follow up':
				echo'<div id="divListbox'.$msgid.'" class="listbox" >';
				echo'<input id="ceckbox_msg'.$msgid.'" class="cbox_msg" type="checkbox" value="'.$msgid.'" />';
				echo'<a style="text-decoration:none; " class="readanchor" href="javascript:void(0)" onclick="showMsgBox('.$msgid.' , \'followup\')">';
				echo'<div id="followSign'.$msgid.'" style="float:left; color:red; disply:show">!&nbsp;</div>';
				echo'<div class="nameColumn">'.$dmessage['name'].'</div>';
				echo'<div class="subjectColumn">'.$dmessage['subject'].'</div>';
				echo'<div class="dateColumn">'.$dmessage['timeReceived'].'</div>';
				echo'</a>';
				break;
		}

		echo'<div id="emptydiv_for_divAds"></div>';
		echo'</div>';
		echo'<div id="msgbox'.$msgid.'" class="msgbox">';
		echo'<div id="innermsgbox'.$msgid.'" class="innermsgbox">';
		echo'From: '.$dmessage['name'].'</br>';
		echo'Subject:'.$dmessage['subject'].'</br>';
		echo'email:'.$dmessage['email'].'</br>';
		echo'Company(if any): '.$dmessage['company'].'</br>';
		echo'Purpose: '.$dmessage['purpose'].'</br>';
		echo'Description: '.$dmessage['description'].'</br>';
		echo'Date:'.$dmessage['timeReceived'].'</br>';
		echo'<div id="txtMsgSent'.$msgid.'" class="txtMsgSent"> <span>The Message has been sent.</span></div>';
		echo'<div id="msgReplyClose'.$msgid.'" class="msgReplyClose">';
		echo'<a class="msgReply"  href="javascript:void(0)" onclick="showReplyBox('.$msgid.')">Reply</a>';
		echo'<a  href="javascript:void(0)" onclick="closeMsgBox('.$msgid.')"><img class="msgClose" src="http://static.hulutera.com/img/del.jpg"/></a>';
		echo'</div>';
		echo'<div id="emptydiv_for_divAds"></div>';
		echo'</div>';
		boxes($msgid,$userEmail);
	}
}
//
function message()
{
	$MAX = 30;
	$mailtype = (isset($_GET['mail_type'])) ? $_GET['mail_type'] : '%' ;
	$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
	$connect = DatabaseClass::getInstance()->getConnection();

	echo'<div id= "mainColumn">';
	$messagemsg = $connect->query("SELECT * FROM contactus WHERE messageStatus LIKE '$mailtype'");
	$NumOfmsg =  mysqli_num_rows($messagemsg);

	if($NumOfmsg >= 1){
		$totpage = ceil($NumOfmsg/$MAX);

		if($page > $totpage )
			$page = $totpage;
		elseif($page < 1)
		$page = 1;

		echo'<div class="div_sel_action">';
		echo'<div id="topButtons">';
		echo'<input class="topbutton" type="button" value="Delete" onclick="msgActions(\'delete\')"/>';
		echo'<input class="topbutton" type="button" value="Follow" onClick="msgActions(\'follow\')"/>';
		echo'<input class="topbutton" type="button" value="Unfollow" onclick="msgActions(\'unfollow\')"/>';
		echo'</div>';
		echo'<div id ="nextopButtons">';
		echo'<input type="button" class="mail_button"  onclick="messagetype(\'%\')"  value="All" />';
		echo'<input type="button" class="mail_button" onclick="messagetype(\'read\')"  value="Read" />';
		echo'<input type="button" class="mail_button" onclick="messagetype(\'unread\')"  value="Unread" />';
		echo'<input type="button" class="mail_button" onclick="messagetype(\'follow up\')"  value="Follow up" />';
		echo'</div>';
		echo'</br>';
		echo'<div class="msgsHeader">';
		echo'<span class="firstcolHead">From</span>';
		echo'<span class="secondcolHead">Subject</span>';
		echo'<span class="thirdcolHead">Date</span>';
		echo'</div>';
		echo'</div>';
		messageList($NumOfmsg,$mailtype);
		pagination('messages',$totpage,$page,$mailtype);
			
		//Script to hide/show topbuttons (message types and actions)
		echo'<script type="text/javascript">';
		echo'var checkboxArray= new Array();';
		echo'$(document).ready(function (){';
		echo'$("input:checkbox").change(function (){';
		echo'checkboxArray.length = 0;';
		echo'var stringCheckboxarray = "";';
		echo'$("input:checkbox").each(function (index) {';
		echo'if($(this).is(":checked") == true){';
		echo'checkboxArray[index] = $(this).val();}';
		echo'stringCheckboxarray = checkboxArray.join("");';
		echo'});';
		echo'if(stringCheckboxarray == "")';
		echo'{';
		echo'$("#topButtons").hide();';
		echo'$("#nextopButtons").show();';
		echo'}';
		echo'else if(stringCheckboxarray !== "")';
		echo'{';
		echo'$("#topButtons").show();';
		echo'$("#nextopButtons").hide();';
		echo'}';
		echo'});';
		echo'})';
		echo'</script>';
	}
	else if($NumOfmsg == 0)
	{
		echo"There is no message";
	}
	echo'</div>';
}
?>