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
				$message = $GLOBALS['lang']['account activated message'];
				break;

			case 1:
				$message =  $GLOBALS['lang']['registration succeded message'];
				break;

			case 2:
				$message = $GLOBALS['lang']['email adress or username has already used'];
				break;

			case 3:
				$message = 'You have successfully recovered your password. You can <a   href="../includes/login.php">Log In</a> now!';
				break;

			case 4:
				$message = $GLOBALS['lang']['pass-recovery success'];
				break;

			case 5:
				$message =  $GLOBALS['lang']['password change success'];
				break;

			case 6:
				$message = 'Your password has now been changed. You may now <a   href="../includes/login.php">Log In</a>';
				break;
			case 7:
				$message = $GLOBALS['lang']['contact-us succeed message'];
				break;
			case 8:
				$message = $GLOBALS['lang']['msg sent'];
				break;
			case 9:
				$message = $GLOBALS['lang']['prompt msg for a wrong access to upload'];
				break;
			case 10:
				$message = $GLOBALS['upload_specific_array']['common']['upload successful msg'];
				break;
			case 11:
				$message = $GLOBALS['lang']['activation key expired'];
				break;
			case 12:
				$message = 'This e-mail has already been taken before you activate your account.
						You may <a   href="../includes/register.php"> Register!</a> again!  ';
				break;

			case 13:
				$message = ' You need to login to upload an item.
						There is a user registered with this e-mail. If this is your account please
						<a   href="../includes/login.php">Log In!</a>
						Once you are logged in you can proceed to upload your item!';
				break;
			case 14:
				$message = 'Your password has already been activated. You can
						<a   href="../includes/login.php">Log In</a> now!';
				break;
			case 15:
				$message = 'Your account has already been activated. You can
						<a   href="../includes/login.php">Log In</a> now!';
				break;
			case 16:
				$message = $GLOBALS['lang']['account termination message'];
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
	<?php
	headerAndSearchCode(""); ?>
	<div id="outer">
		<div class="alert alert-success" id="inner">
			<strong><?php createMessage($type); ?></strong>
		</div>
		<div class="alert alert-info" id="inner">
			<strong><?php createMessage(23); ?></strong>
		</div>
	</div>
	<?php footerCode();
	?>
</body>

</html>