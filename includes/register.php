<?php
session_start();
ob_flush();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
require_once $documnetRootPath . '/includes/validate.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Register | ይመዝገቡ</title>
	<?php commonHeader(); ?>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/hulutera.unminified.css" rel="stylesheet">
	<link href="../../css/font-awesome.min.css" rel="stylesheet">
</head>

<style>
	.alert-custom {
		color: #a94442;
	}
</style>

<body>
	<?php
	headerAndSearchCode("");
	?>
	<div class="row" style="width:60%;margin:20px;margin-left:20%;margin-right:20%;">

		<?php
		if (!isset($_GET['function']) or $_GET['function'] !== 'register' or $_SESSION['lan'] != $_GET['lan']) {
			unset($_SESSION['POST']);
			unset($_SESSION['errorRaw']);
		}
		$sessionName = 'register';
		$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
		$_SESSION['lan'] = $_GET['lan'];
		if (!isset($_SESSION[$sessionName])) {
			$object = new HtUserAll("*");
			$object->register();
			$_SESSION[$sessionName] = base64_encode(serialize($object));
		} else {
			$object = unserialize(base64_decode($_SESSION[$sessionName]));
			$object->register();
		}
		?>
	</div>
	<?php footerCode(); ?>
	<script>
		function showPassword() {
			var fieldPassword = document.getElementById("fieldPassword");
			var fieldPasswordRepeat = document.getElementById("fieldPasswordRepeat");
			fieldPassword.type = (fieldPassword.type === "password") ? "text" : "password";
			fieldPasswordRepeat.type = (fieldPasswordRepeat.type === "password") ? "text" : "password";
		}
	</script>
</body>

</html>