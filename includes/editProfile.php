<?php

session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
//require_once $documnetRootPath . '/includes/form_user.php';
require_once $documnetRootPath . '/includes/validate.php';
global $lang, $lang_url, $str_url;

if (!isset($_SESSION['uID'])) {
	ob_start();
	header('Location:../index.php' . $lang_url);
	ob_end_flush();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $lang['profile edit']; ?></title>
	<?php commonHeader(); ?>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/hulutera.unminified.css" rel="stylesheet">
	<link href="../../css/font-awesome.min.css" rel="stylesheet">
	
</head>

<body>
	<?php
	headerAndSearchCode("");
	?>
	<div class="row" style="width:60%;margin:20px;margin-left:20%;margin-right:20%;">
		<?php
		if (!isset($_GET['function']) or $_GET['function'] !== 'editProfile' or $_SESSION['lan'] != $_GET['lan']) {
			unset($_SESSION['POST']);
			unset($_SESSION['errorRaw']);
		}
		$sessionName = 'editProfile';
		$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
		$_SESSION['lan'] = $_GET['lan'];
		if (!isset($_SESSION[$sessionName])) {
			$object = new HtUserAll($_SESSION['uID']);
			$object->updateProfile();
			$_SESSION[$sessionName] = base64_encode(serialize($object));
		} else {
			$object = unserialize(base64_decode($_SESSION[$sessionName]));
			//$object->updateProfile();
			if (isset($_GET['function'])) {
				$function = $_GET['function'];
				if (isset($_GET['update'])) {
					$update = $_GET['update'];
					if (isset($_GET['order'])) {
						$order = $_GET['order'];
						if ($order == 'open') {
							$object->editProfile($update);
						} elseif ($order == 'cancel') {
							$object->updateProfile();
						}
					}
				} else {
					$object->updateProfile();
				}
			} else {
				$object->updateProfile();
			}
		}
		// var_dump($_SESSION);
		?>
	</div>
	<?php footerCode(); ?>
	<script>
		function showPassword() {
			var fieldPassword = document.getElementById("fieldPassword");
			var fieldPasswordRepeat = document.getElementById("fieldPasswordRepeat");
			var fieldPasswordRepeat2 = document.getElementById("fieldPasswordRepeat2");
			fieldPassword.type = (fieldPassword.type === "password") ? "text" : "password";
			fieldPasswordRepeat.type = (fieldPasswordRepeat.type === "password") ? "text" : "password";
			fieldPasswordRepeat2.type = (fieldPasswordRepeat2.type === "password") ? "text" : "password";
		}
	</script>
</body>

</html>