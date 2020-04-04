<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/classes/cmn.class.php';
$type = $_GET['type'];

function createMessage($type)
{
	global $lang;
	if (is_numeric($type)) {
		switch ($type) {
			case 0:
				$message = 'Your account is now active.You may now <a href="../includes/login.php">Log In</a></br>
						  In your account page, you can update your account informations, post Items and manage the items you posted.';
				$message .= 'አካውንትዎ ገቢራዊ ስለሆነ <a href="../includes/login.php">መግባት</a> ይችላሉ።</br>
						  የአካውንቶ ገጽ ውስጥ የአካውንት መረጃ መቀየር፣ ንብረት ማስገባት እና ያስገቡትን ንብረት መቆጣጠር ይችላሉ።';
				break;

			case 1:
				$message = "Thank you for registering. A confirmation mail has been sent to your email.
						Please click on the activation link to activate your account. </br>";
				$message .= 'ስለተመዘገቡ እናመሰግናለን። መመዝገብዎን የሚያመለክት ኢሜይል ልከንልዎታል።
						እባክዎን የላክንልዎት ኢሜይል ላይ ያለውን ሊንክ ተጭነው አካውንትዎን ገቢራዊ ያድርጉ።';
				break;

			case 2:
				$message = 'The Email address or the Username has already been used.
						Try <a href="../includes/register.php"> to Register!</a> or Try to </br>
						<a href="../includes/passRecovery.php">Recover your account</a> again!';
				break;

			case 3:
				$message = 'You have successfully recovered your password. You can
						<a href="../includes/login.php">Log In</a> now!';
				break;

			case 4:
				$message = "Password recovery information has now been sent to
						the e-mail associated with this user.\n Please follow instructions in the email.</br> ";
				$message .= 'አዲስ የምስጢር ቃል በኢሜይሎት ልከንልዎታል።
						እባክዎን ኢሜይሉ ላይ ያለውን መመሪያ ይከተሉ። አዲሱን የምስጢር ቃል አካውንቶ ውስጥ በመግባት መቀየር ይችላሉ።';
				break;

			case 5:
				$message = 'Your Password has been changed successfully.</br>';
				$message .= "የምስጢር ቃልዎ በጥሩ ሁኔታ ተቀይሯል።";
				break;

			case 6:
				$message = 'Your password has now been changed.
						You may now <a href="../includes/login.php">Log In</a>';
				break;
			case 7:
				$message = "<strong>We appreciate your taking the time to contact us.</strong>";
				$endl = "<br><br>";
				$message .= $endl;
				$message .= "If your message require a response, we will get back to you as soon as we can.
						We do our best to answer e-mails within 1-2 business days (Monday-Friday).";
				$message .= $endl;
				$message .= "እኛን ለማግኝት ጥረት ስላደረጉ እናመሰግናለን። መልክትዎ ምላሽ ካስፈለገው በተቻለን መጠን ከ 1 /2 የስራ ቀናት ውስጥ
						መልስ እንሰጣለን።";
				break;
			case 8:
				$message = "Your message has been sent! </br>";
				$message .= 'መልእክቶ ተልኳል';
				break;
			case 9:
				$message = $lang['prompt msg for a wrong access to upload'];
				break;
			case 10:
				$message = "Thank you for using our service! 
							Your item was successfuly uploaded. 
							Please follow instructions in the email we sent you to follow status of your item! 
				</br>";
				$message .= 'አገልግሎታችንን ስለተጠቀሙ እናመሰግናለን። ንብረትዎ በጥሩ ሁኔታ ገብቷል። ስለንብረቶ ተጨማሪ መረጃ በኢሜይሎት መረጃ ልከንልዎታል ';
				break;
			case 11:
				$message = 'Your activation key has expired.
						You can no longer use this registration.
						You may <a href="../includes/register.php"> Register!</a> again!</br>';
				$message .= 'አካውንቶን ተግባራዊ ሳያደርጉ በመቆየትዎ ምዝገባው ጊዜ አልፎበታል። ስለዚህ በድጋሚ ይመዝገቡ።';
				break;
			case 12:
				$message = 'This e-mail has already been taken before you activate your account.
						You may <a href="../includes/register.php"> Register!</a> again!  ';
				break;

			case 13:
				$message = ' You need to login to upload an item.
						There is a user registered with this e-mail. If this is your account please
						<a href="../includes/login.php">Log In!</a>
						Once you are logged in you can proceed to upload your item!';
				break;
			case 14:
				$message = 'Your password has already been activated. You can
						<a href="../includes/login.php">Log In</a> now!';
				break;
			case 15:
				$message = 'Your account has already been activated. You can
						<a href="../includes/login.php">Log In</a> now!';
				break;
			case 16:
				$message = "Information regarding Account Termination has now been sent to
						the e-mail associated with this user.\n Please follow instructions in the email.</br> ";
				$message .= 'የካቶመር አካውንትስለመዝጋት በተመለከተ በኢሜይሎት መረጃ ልከንልዎታል።
						እባክዎን ኢሜይሉ ላይ ያለውን መመሪያ ይከተሉ።';
				break;

				// case 20, 21,... will be removed later just for testing
			case 20:
				$message = "The file was not moved.";
				break;
			case 21:
				$message = "The file was not uploaded.";
				break;
			case 22:
				$message = "The file is not ready for upload.";
				break;
			case 23:
				$message = $lang['to main page prompt msg'];
				
				break;
			case 24:
				$message = $lang['promp msg for uploading more items'];
				break;
			case 25:
				$message = $lang['prompt code 25'];
				break;						
			case 404:
				$message = "Oops! Bad Operation.";
				break;
			default:
				$message = "Thank You. There is no message to display.";
		}
		echo $message;
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Prompt | መልዕክት</title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<?php commonHeader(); ?>
</head>

<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); ?>
			<div id="outer">
				
					<div class="alert alert-success" id="inner">
						<strong><?php createMessage($type); ?></strong>
					</div>
					<div class="alert alert-info" id="inner">
						<strong><?php createMessage(23); ?></strong>
					</div>			
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>

</html>