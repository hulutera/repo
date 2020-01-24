<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/inc/headerSearchAndFooter.php';
require_once $documnetRootPath.'/classes/cmn.class.php';
$type=$_GET['type'];

function createMessage($type){
	if(is_numeric($type)){
		switch($type){
			case 0:
				$message='Your account is now active.You may now <a href="../main/login.php">Log In</a></br>
						  In your account page, you can update your account informations, post Items and manage the items you posted.';
				$message.='አካውንትዎ ገቢራዊ ስለሆነ <a href="../main/login.php">መግባት</a> ይችላሉ።</br>
						  የአካውንቶ ገጽ ውስጥ የአካውንት መረጃ መቀየር፣ ንብረት ማስገባት እና ያስገቡትን ንብረት መቆጣጠር ይችላሉ።';
				break;
					
			case 1:
				$message="Thank you for registering. A confirmation mail has been sent to your email.
						Please click on the activation link to activate your account. </br>";
				$message.='ስለተመዘገቡ እናመሰግናለን። መመዝገብዎን የሚያመለክት ኢሜይል ልከንልዎታል።
						እባክዎን የላክንልዎት ኢሜይል ላይ ያለውን ሊንክ ተጭነው አካውንትዎን ገቢራዊ ያድርጉ።';
				break;
					
			case 2:
				$message='The Email address or the Username has already been used.
						Try <a href="../main/register.php"> to Register!</a> or Try to </br>
						<a href="../main/passRecovery.php">Recover your account</a> again!';
				break;
					
			case 3:
				$message='You have successfully recovered your password. You can
						<a href="../main/login.php">Log In</a> now!';
				break;
					
			case 4:
				$message="Password recovery information has now been sent to
						the e-mail associated with this user.\n Please follow instructions in the email.</br> ";
				$message.='አዲስ የምስጢር ቃል በኢሜይሎት ልከንልዎታል።
						እባክዎን ኢሜይሉ ላይ ያለውን መመሪያ ይከተሉ። አዲሱን የምስጢር ቃል አካውንቶ ውስጥ በመግባት መቀየር ይችላሉ።';
				break;
					
			case 5:
				$message='Your Password has been changed successfully.</br>';
				$message.="የምስጢር ቃልዎ በጥሩ ሁኔታ ተቀይሯል።";
				break;
					
			case 6:
				$message='Your password has now been changed.
						You may now <a href="../main/login.php">Log In</a>';
				break;
			case 7:
				$message="<strong>We appreciate your taking the time to contact us.</strong>";
				$endl = "<br><br>";
				$message.=$endl;
				$message.="If your message require a response, we will get back to you as soon as we can.
						We do our best to answer e-mails within 1-2 business days (Monday-Friday).";
				$message.=$endl;
				$message.="እኛን ለማግኝት ጥረት ስላደረጉ እናመሰግናለን። መልክትዎ ምላሽ ካስፈለገው በተቻለን መጠን ከ 1 /2 የስራ ቀናት ውስጥ
						መልስ እንሰጣለን።";
				break;
			case 8:
				$message="Your message has been sent! </br>";
				$message.='መልእክቶ ተልኳል';
				break;
			case 9:
				$message=' You need to <a href="../main/login.php"> login </a> in order to upload an item.</br>';
				$message.='ንብረት ለማስገባት በቅድምያ <a href="../main/login.php">መግባት</a> ይኖርቦታል';
				break;
			case 10:
				$message="Your item was successfuly uploaded. Thank you for using our service! </br>";
				$message.='ንብረትዎ በጥሩ ሁኔታ ገብቷል። አገልግሎታችንን ስለተጠቀሙ እናመሰግናለን።';
				break;
			case 11:
				$message='Your activation key has expired.
						You can no longer use this registration.
						You may <a href="../main/register.php"> Register!</a> again!</br>';
				$message.='አካውንቶን ተግባራዊ ሳያደርጉ በመቆየትዎ ምዝገባው ጊዜ አልፎበታል። ስለዚህ በድጋሚ ይመዝገቡ።';
				break;
			case 12:
				$message='This e-mail has already been taken before you activate your account.
						You may <a href="../main/register.php"> Register!</a> again!  ';
				break;

			case 13:
				$message=' You need to login to upload an item.
						There is a user registered with this e-mail. If this is your account please
						<a href="../main/login.php">Log In!</a>
						Once you are logged in you can proceed to upload your item!';
				break;
			case 14:
				$message='Your password has already been activated. You can
						<a href="../main/login.php">Log In</a> now!';
				break;
			case 15:
				$message='Your account has already been activated. You can
						<a href="../main/login.php">Log In</a> now!';
				break;
			case 16:
				$message="Information regarding Account Termination has now been sent to
						the e-mail associated with this user.\n Please follow instructions in the email.</br> ";
				$message.='የካቶመር አካውንትስለመዝጋት በተመለከተ በኢሜይሎት መረጃ ልከንልዎታል።
						እባክዎን ኢሜይሉ ላይ ያለውን መመሪያ ይከተሉ።';
				break;

				// case 20, 21,... will be removed later just for testing
			case 20:
				$message= "The file was not moved.";
				break;
			case 21:
				$message= "The file was not uploaded.";
				break;
			case 22:
				$message= "The file is not ready for upload.";
				break;
			case 404:
				$message= "Oops! Bad Operation.";
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
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); ?>
			<div id="outer">
				<div id="inner">
					<div id="prompt">
						<?php createMessage($type);?>
					</div>
				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>
