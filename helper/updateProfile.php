<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
global $connect;
if(!isset($_SESSION['uID']))
{
	header('Location:../index.php');
}
else
{
	//to handle form for email
	if($_POST['submit1'])
	{
		$subject = "New email";
		$message = "your mail have been updated";
		$current_email 		= $_POST["email"];
		$new_email 		    = $_POST["newemail"];
		$user_id 		    = $_SESSION['uID'];
		if(empty($_POST['newemail']))
		{
			$error[] = 'Please enter your e-mail/እባክዎ የኢሜይል አድራሻ ያስገቡ።';
		}
		else if(!filter_var($_POST['newemail'], FILTER_VALIDATE_EMAIL))
		{
			$error[]  = 'Your e-mail is invalid./ያስገቡት ኢሜይል ትክክል አይደለም።';
		}
		else if(mysqli_num_rows($connect->query("SELECT uEmail FROM user WHERE uEmail = '$new_email'"))!=0)
		{
			$error[]  = 'e-mail already exists./በዚህ የኢሜይል አድራሻ የተመዘገበ ደንበኛ አለ።';
		}
		
		if(empty($error))
		{
			$result = $connect->query("UPDATE user SET uEmail = '$new_email' WHERE uID  = '$user_id'");
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
			header('Location: ../includes/editProfile.php?error=');
			ob_end_flush();
		}
		else
		{
			foreach($error as $key=>$values){
				$error_message.="$values";
			}
				
			ob_start();
			header('Location: ../includes/editProfile.php?error='.$error_message);
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
			$error[] = 'Please fill all the blanks/እባክዎ ሁሉንም ይሙሉ.';
		}
		else if((empty($_POST['newpassword'])))
		{
			$error[] = 'Please fill all the blanks/እባክዎ ሁሉንም ይሙሉ. ';
		}
		else if((empty($_POST['repeatpassword'])))
		{
			$error[] = 'Please fill all the blanks/እባክዎ ሁሉንም ይሙሉ. ';
		}
		else
		{
			$oldpassword = $connect->real_escape_string($_POST['oldpassword']);
			$newpassword = $connect->real_escape_string($_POST['newpassword']);
			$hashed_newpassword = crypt($newpassword);
			$repeatpassword = $connect->real_escape_string($_POST['repeatpassword']);

			$result=$connect->query("SELECT * FROM user WHERE uID = '$user_id' ") or die (mysqli_error());
			$row=mysqli_fetch_array($result);
			$original_password = $row['uPassword'];

			if (crypt($oldpassword, $original_password) != $original_password)
			{
				$error[] = 'The Old Password you entered is incorrect/የድሮው ምስጢር ቃል የተሳሳተ ነው. ';
			}
			if ($newpassword != $repeatpassword)
			{
				$error[] = 'The New Passwords you entered do not match/ድጋሚ ያስገቡት ና አዲሱ ምስጢር ቃል ተመሳሳይ አይደለም. ';
			}
		}
		if(empty($error))
		{
			$query = "UPDATE user SET uPassword= '$hashed_newpassword' WHERE uID = '$user_id' ";
			$result2=$connect->query($query) or die(mysqli_error());
			if($result2)
			{
				ob_start();
				header('Location: ../includes/editProfile.php?error=');
				ob_end_flush();
			}
		}
		else
		{
			foreach($error as $key=>$values){
				$error_message.="$values";
			}
				
			ob_start();
			header('Location: ../includes/editProfile.php?error='.$error_message);
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
		header('Location: ../includes/editProfile.php?error=');
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
		$result = $connect->query("UPDATE user SET	uContactMethod = '$contact'	WHERE uID  = '$user_id'");
		ob_start();
		header('Location: ../includes/editProfile.php?error=');
		ob_end_flush();
		header('Location: ../includes/editProfile.php');
	}
	elseif($_POST['submit5'])//to handle form for terminating account
	{
		$error_message="";
		$error = array();
		$user_id = $_SESSION['uID'];
		$close_account 	= isset($_POST["closeAcc"]);
		if(!$close_account)
		{
			$error[] = 'Please correct your answer/እባክዎ መልስዎን ያስተካክሉ.';
		}
		if(empty($error))
		{
			$result = $connect->query("SELECT uEmail FROM user WHERE uID = '$user_id' ") or die (mysqli_error());
			$row = mysqli_fetch_array($result);
			$email = $row['uEmail'];
			$subject = "Account Termination/የካቶመር አካውንት ስለመዝጋት";
			
			$de_key=md5(uniqid(rand(),true));
			
			$removeLink = "http://hulutera.com/helper/remove.php?userId=".$user_id."&de_key=".$de_key;
			
			$messageEn ="We are sorry to see you go. By closing your account you will be automatically \n";
			$messageEn .="signed out and all your previous posts will be removed from our database.";
			$messageEn .= " \n".$removeLink."\n\n";
			$messageEn .= "According to your request,please follow the link to terminate your account. \n";
			$messageEn.= "This email was automatically generated. If you did not request account termination\n";
			$messageEn.= "please contact the administrator using\nemail: admin@hulutera.com \n";
			$messageEn.= "\nSincerely,\nThe hulutera Team\n";
			$gap = "-----------------------------------------------------------------------------\n";
			$messageAmh ="ከእኛ ጋር ባለመቆየትዎ እናዝናለን። ሆኖም ግን ይህንን ሲያደርጉ ወደ ካቶመር ፣ በአዲስ አካውንት በስተቀር መግባት አይችሉም።\n";
			$messageAmh .="በተጨማሪም በስምዎ ያስገቧቸው ንብረቶችም ከእኛ መዝገብ/ዳታቤዝ /ይደመሰሳሉ። ";
			$messageAmh .= " \n".$removeLink."\n\n";
			$messageAmh .= "የካቶመር አባልነትዎን ለመዝጋት በጠየቁን መሰረት ይህንን የማቆምያ መሲብ በመጫን ሂደቱን ይጨርሱ \n ";
			$messageAmh.= "ይህ መልዕክት የተላከው ራስሰር(አውቶማቲክ) በሆነ የመልዕክት መላከያ መንገድ ስለሆነ የካቶመር አባልነትዎን ለመዝጋት የጠየቁ እርስዎ ካልሆኑ ";
			$messageAmh.= "በዚህ የኢሜይል አድራሻ ይላኩልን  admin@hulutera.com\n";
			$messageAmh.= "\nከሰላምታ ጋር \nየካቶመር አስተዳደር\n";
				
			$message = $messageEn.$gap.$messageAmh;
				
			$result = $connect->query("UPDATE user SET deactivation = '$de_key' WHERE uID  = '$user_id'");
				
			$isMailDelivered = mail($email, $subject, $message, 'From:admin@hulutera.com');
			//Check if mail Delivered or die
			if(!$isMailDelivered)
			{
				die ("Sending Email Failed. Please Contact Site Admin!");
				ob_start();
				header('Location: ../index.php');
				ob_end_flush();
			}
			else 
			{
				ob_start();
				session_destroy();
				header('Location: ../includes/prompt.php?type=16');
				ob_end_flush();
			}
		}
		else
		{
			foreach($error as $key=>$values){
				$error_message.="$values";
			}
				
			ob_start();
			header('Location: ../includes/editProfile.php?error='.$error_message);
			ob_end_flush();
		}
	}
	elseif($_POST['submit']) //to handle form for all close submits
	{
		ob_start();
		header('Location: ../index.php');
		ob_end_flush();
	}

}
?>