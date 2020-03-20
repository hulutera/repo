<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
global $connect, $lang_url, $str_url, $lang;
if(!isset($_SESSION['uID']))
{
	header('Location:../index.php' . $lang_url);
}
else
{
	//to handle form for email
	if($_POST['submit1'])
	{
		$subject = $lang['new e-mail'];
		$message = $lang['email update succ'];
		$current_email 		= $_POST["email"];
		$new_email 		    = $_POST["newemail"];
		$user_id 		    = $_SESSION['uID'];

		$filter = "uEmail";
		$table = "user";
		$cond2 = "WHERE uEmail = '$new_email'";
		$res = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
		if(empty($_POST['newemail']))
		{
			$error[] = $lang['Please enter your email'];
		}
		else if(!filter_var($_POST['newemail'], FILTER_VALIDATE_EMAIL))
		{
			$error[]  = $lang['Your e-mail address is invalid'];
		}
		else if(mysqli_num_rows($connect->query($res))!=0) 
		{
			$error[]  = $lang['email already exists msg'];
		}
		
		if(empty($error))
		{
			$cond1 = " uEmail = '$new_email' WHERE uID  = '$user_id'";
			$table = "user";
	        $result = DatabaseClass::getInstance()->updateTable($table, $cond1);
			//send mail to current email
			$isMailDelivered = mail($current_email, $subject, $message, 'From:admin@hulutera.com');
			//send mail to new email
			$isMailDelivered = mail($new_email, $subject, $message, 'From:admin@hulutera.com');
			//Check if mail Delivered or die
			if(!$isMailDelivered)
			{
				die ("Sending Email Failed. Please Contact Site Admin!");
			}
			ob_start();
			header('Location: ../includes/editProfile.php?error='.$error_message.$str_url);
			ob_end_flush();
		}
		else
		{
			foreach($error as $key=>$values){
				$error_message.="$values";
			}
				
			ob_start();
			header('Location: ../includes/editProfile.php?error='.$error_message.$str_url);
			ob_end_flush();
		}

	}
	elseif($_POST['submit2'])  //to handle form for password change
	{
		$error_message="";
		$error = array();
		$user_id = $_SESSION['uID'];
		if((empty($_POST['oldpassword'])))
		{
			$error[] = $lang['Please enter a password'];
		}
		else if((empty($_POST['newpassword'])))
		{
			$error[] = $lang['enter the new password'];
		}
		else if((empty($_POST['repeatpassword'])))
		{
			$error[] = $lang['enter repeated new password'];
		}
		else
		{
			$oldpassword = $connect->real_escape_string($_POST['oldpassword']);
			$newpassword = $connect->real_escape_string($_POST['newpassword']);
			$hashed_newpassword = crypt($newpassword);
			$repeatpassword = $connect->real_escape_string($_POST['repeatpassword']);

			$cond1 = "WHERE uID = '$user_id'";
			$table = "user";
			$filter = "*";
	        $result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond1);
			$row=mysqli_fetch_array($result);
			$original_password = $row['uPassword'];

			if (crypt($oldpassword, $original_password) != $original_password)
			{
				$error[] = $lang['missing password msg'];
			}
			if ($newpassword != $repeatpassword)
			{
				$error[] = $lang['Passwords do not match'];
			}
		}
		if(empty($error))
		{
			$condition = "uPassword = '$hashed_newpassword' WHERE uID = '$user_id'";
			$table = "user";
	        $result2 = DatabaseClass::getInstance()->updateTable($table, $condition);
			if($result2)
			{
				ob_start();
				header('Location: ../includes/editProfile.php?error='.$error_message.$str_url);
				ob_end_flush();
			}
		}
		else
		{
			foreach($error as $key=>$values){
				$error_message.="$values";
			}
				
			ob_start();
			header('Location: ../includes/editProfile.php?error='.$error_message.$str_url);
			ob_end_flush();
		}
	}
	elseif($_POST['submit3']) //to handle form for personal info changes
	{
		$new_name 		= explode(" ", $_POST["name"]);
		$new_userName 	= $_POST["userName"];
		$new_phone 		= $_POST["phone"];
		$new_address	= $_POST["address"];
		$user_id 		= $_SESSION['uID'];
		$result = $connect->query("UPDATE user SET
				uFirstName = '$new_name[0]',
				uLastName  = '$new_name[1]',
				userName   = '$new_userName',
				uPhone     = '$new_phone',
				uAddress   = '$new_address'
				WHERE uID  = '$user_id'");
		ob_start();
		header('Location: ../includes/editProfile.php?error='.$error_message.$str_url);
		ob_end_flush();
	}
	elseif($_POST['submit4']) //to handle form for contact method changes
	{
		$contact_phone 	= $_POST["contactphone"];
		$contact_email 	= $_POST["contactemail"];
		$contact = "";
		if($contact_phone && $contact_email)
		{
			$contact = "Phone and Email";
		}
		elseif($contact_phone && !$contact_email)
		{
			$contact = "Phone";
		}
		elseif(!$contact_phone && $contact_email)
		{
			$contact = "Email";
		}
		elseif(!$contact_phone && !$contact_email)
		{
			$contact = "Not mentioned";
		}
		$user_id = $_SESSION['uID'];
        $condition = "uContactMethod = '$contact'	WHERE uID  = '$user_id'";
		$table = "user";
	    $result = DatabaseClass::getInstance()->updateTable($table, $condition);
		ob_start();
		header('Location: ../includes/editProfile.php?error='.$error_message.$str_url);
		ob_end_flush();
		header('Location: ../includes/editProfile.php'.$lang_url);
	}
	elseif($_POST['submit5'])//to handle form for terminating account
	{
		$error_message="";
		$error = array();
		$user_id = $_SESSION['uID'];
		$close_account 	= isset($_POST["closeAcc"]);
		if(!$close_account) 
		{
			$error[] = $lang['correct answer msg'];
		}
		if(empty($error))
		{
			$cond2 = "WHERE uID = '$user_id'";
			$table = "user";
			$filter = "uEmail";
	        $result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
			$row = mysqli_fetch_array($result);
			$email = $row['uEmail'];
			$subject = $lang['close account'];
			
			$de_key=md5(uniqid(rand(),true));
			
			$removeLink = "http://hulutera.com/includes/remove.php?userId=".$user_id."&de_key=".$de_key;
			
			$messageEn = $lang['close acc msg part1'];
			$messageEn .= " \n".$removeLink."\n\n";
			$messageEn .= "Please follow the link to terminate your account. If you did not request account termination then please contact us at admin@hulutera.com \n";
			$messageEn .= "\n\nSincerely,\nThe hulutera Team\n";
							
			$message = $messageEn.$gap.$messageAmh;
			
			$condition3 = "deactivation = '$de_key' WHERE uID  = '$user_id'";
		    $table = "user";
	        $result = DatabaseClass::getInstance()->updateTable($table, $condition3);
							
			$isMailDelivered = mail($email, $subject, $message, 'From:admin@hulutera.com');
			//Check if mail Delivered or die
			if(!$isMailDelivered)
			{
				die ("Sending Email Failed. Please Contact Site Admin!");
				ob_start();
				header('Location: ../index.php'.$lang_url);
				ob_end_flush();
			}
			else 
			{
				ob_start();
				session_destroy();
				header('Location: ../includes/prompt.php?type=16'.$str_url);
				ob_end_flush();
			}
		}
		else
		{
			foreach($error as $key=>$values){
				$error_message.="$values";
			}
				
			ob_start();
			header('Location: ../includes/editProfile.php?error='.$error_message.$str_url);
			ob_end_flush();
		}
	}
	elseif($_POST['submit']) //to handle form for all close submits
	{
		ob_start();
		header('Location: ../includes/editProfile.php' . $lang_url);
		ob_end_flush();
	}

}
?>