<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/item.inc.php';

global $connect;
$error_message="";
 if(isset($_POST['submit'])){
	$error = array();
	if((empty($_POST['email']))&&(empty($_POST['username']))){
		$error[] = 'Please enter your e-mail or username. ';
	}
	else if(!(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) && !(ctype_alnum($_POST['username']) )){
		$error[] = 'Your e-mail address or username is invalid. ';
	}else
	{
		$connect = DatabaseClass::getInstance()->getConnection();
		
		if($_POST['username'] !== '')		
		{
			var_dump($_POST);	
			$username = $connect->real_escape_string($_POST['username']);
			$result=$connect->query("SELECT * FROM user WHERE userName = '$username' ");
		}
		else if($_POST['email'] !== '')		
		{
			$email = $connect->real_escape_string($_POST['email']);
			$result=$connect->query("SELECT * FROM user WHERE uEmail = '$email' ");
		}
		print($result);
		if (mysqli_num_rows($result)==0){
			$error[] = 'There is no user registered with this e-mail or username. ';
		}
	}
	if(empty ($error)){
		$row=mysqli_fetch_array($result);
		$email=$row['uEmail'];
        $user_id= $row['uID'];
			
		//Generate a RANDOM MD5 Hash for a password
		$random_password=md5(uniqid(rand()));
                
        //Take the first 8 digits and use them as the password we intend to email the user
		$newpassword1=substr($random_password, 0, 8);
        $hashed_newpassword1 = crypt($newpassword1);
        $activation=md5(uniqid(rand(),true));
        $result=$connect->query("UPDATE user SET uNewPassword = '$hashed_newpassword1', activation = '$activation' WHERE uID = '$user_id'") or die (mysqli_error());
		
		//Email out the information
		$recoveryLink= "http://hulutera.com/includes/activate.php?key=".$activation."&newPass=yes";
		$subject = "Your New Password"." (አዲሱ የሚስጥር ቃል)";
		$messageEn.= "Dear Customer\n";
		$messageEn.= "A password recovery was requested for your account. Please click on the following link to recover your password.";
		$messageEn.= " \n".$recoveryLink."\n\n";
		$messageEn.= "New-password: ".$newpassword1."\n\n";
		$messageEn.= "Please remember that after you have logged in with this new password you can always change it using Change Password link.\n\n";
		$messageEn.= "This email was automatically generated. If you did not request a password recovery please contact the administrator ";
		$messageEn.= "using email admin@hulutera.com \n";
		$messageEn.= "\nSincerely,\nThe hulutera Team\n";
		$gap = "-----------------------------------------------------------------------------\n";
		$messageAmh= "ውድ ደንበኛ\n";
		$messageAmh.= "አዲሲ የሚስጥር ቃል ለመቀየር ጠይቀውን ነበር በዚህ መሰረት የሚከተለውን መሲብ ይጫኑ \n";
		$messageAmh.= " \n".$recoveryLink."\n\n";
		$messageAmh.= "አዲሱ የሚስጥር ቃል: ".$newpassword1."\n\n";
		$messageAmh.= "ማስታወሻ በአዲሱ የሚስጥር ቃል ተጠቅመው ከገቡ በኃላ የሚስጥር ቃል ለመቀየር የሚለውን መሲብ በመጠቀም መቀየር ይችላሉ\n";
		$messageAmh.= "ይህ መልዕክት የተላከው ራስሰር(አውቶማቲክ) በሆነ የመልዕክት መላከያ መንገድ ስለሆነ የሚስጥር ቃሉን ለመቀየር የጠየቁ እርስዎ ካልሆኑ ";
		$messageAmh.= "በዚህ የኢሜይል አድራሻ ይላኩልን  admin@hulutera.com\n";
		$messageAmh.= "\nከሰላምታ ጋር \nየካቶመር አስተዳደር\n";

		//combine Amharic and English message
		$message = $messageEn.$gap.$messageAmh;

		// Send mail 
		$isMailDelivered = mail($email, $subject, $message, 'From:admin@hulutera.com');

		//Check if mail Delivered or die
		if(!$isMailDelivered)
		{
			die ("Sending Email Failed. Please Contact Site Admin!");
		}
		else
		{
			header('Location: ../includes/prompt.php?type=4');
		}
	}
	else{
		$error_message='<span class="error">';
		foreach($error as $key=>$values){
			$error_message.="$values";
                        $error_message.="<br/>";
		}
		$error_message.="</span><br/><br/>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Password Recovery | የይለፍ ቃል </title>
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); ?>
			<div id="main_section">
				<div id="mainColumn">
					<form id="passrecovery" class="container" method="post" action="../includes/passRecovery.php">
						<div id="passR_title">
						<div class="passR_title_Eng"><p>To reset your password, please provide username or email.</p></div>
						<div class="passR_title_Amh"><p>የምስጢር ቃልዎን ለማግኘት የመጠቀምያ ስምዎን ወይም ኢሜይልዎን ያስገቡ</p></div>	
						</div>
						<p class="errorPassRe" style="color:red;">
						<?php echo $error_message; ?> </p>
						<div id="usernameField">
							<div class="usernameText"><p>Username/የመጠቀምያ ስም</p></div>
							<div class="usernameInput"><input type="text" class="input" id="username" name="username" maxlength="20" /></div>
						</div>
						<div class="orField">
							<p>OR</p> 
						</div>
						<div id="emailField">
							<div class="emailText"><p>Email/ ኢሜይል</p></div> 
							<div class="emailInput" ><input style="text-transform: lowercase;" type="text" class="input"
								id="email" name="email" maxlength="80" /></div>
						</div>
						<div id="PassRsubmit"><input type="submit" name="submit" id="submit"
							class="button" value="Submit" /> 
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>