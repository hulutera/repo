<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
$type = isset($_GET['type']) ? $_GET['type'] : 100;
$msg = isset($_GET['msg']) ? $_GET['msg'] : "";

function createMessage($type, $msg = null)
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
			case 26:
				$message = $lang['my page'];
				break;
			case 404:
				$message = "Oops! Bad Operation."; ///
				break;
			case 503:
				$message = "Oops! Error found." . $msg; ///
				break;
			case 504:
				$message = "Oops! Error have been found. <a href=\"./contact-us.php\">" . $GLOBALS['lang']['database error on upload'] . "</a>"; ///
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
	<title> <?php echo $GLOBALS['lang']['prompt']; ?> </title>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<?php commonHeader(); ?>
</head>

<body>
	<?php
	headerAndSearchCode(""); ?>
	<div id="outer">
		<div class="row">
			<div class="col-md-12">

				<?php

				$alert = ' alert-success';
				$thumb = ' fa-thumbs-o-up';
				$style = ' font-size:17px;width:35%';
				$errorTypes = [503, 504];
				if (in_array($type, $errorTypes)) {
					$alert = ' alert-danger';
					$thumb = ' fa-thumbs-o-down';
					$style = ' font-size:17px;width:100%';
				}

				echo '<div class="alert ' . $alert . '" id="inner" style="'.$style.'">
						<p class="h2">';
				echo '<i class="fa ' . $thumb . '"></i> ';
				createMessage($type, $msg);
				echo '</p>
						</div>';
				?>


			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info" id="inner" style="font-size:17px;width:35%">

					<?php
					echo '<a class="h3" href="../index.php' . $lang_url . '"><i class="fa fa-home"></i> ';
					createMessage(23);
					echo '</a>'
					?>
				</div>
			</div>
		</div>
		<?php if (isset($_SESSION['uID'])) { ?>
			<div class="row">
				<div class="col-md-12">
					<div class="alert alert-info" id="inner" style="font-size:17px;width:35%">

						<?php
						echo '<a class="h3" href="mypage.php' . $lang_url . '"><i class="fa fa-user"></i> ';
						createMessage(26);
						echo '</a>' ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<div style="position:relative;bottom:0px;height:50%;width:100%"></div>
	<?php footerCode();
	?>
</body>

</html>