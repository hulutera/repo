<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/validate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $GLOBALS['lang']['Register']; ?></title>
	<?php commonHeader(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
	//style="width:60%;margin:20px;margin-left:20%;margin-right:20%;"
	?>
	<div class="row">

		<?php
		if (!isset($_GET['function']) or $_GET['function'] !== 'register' or $_SESSION['lan'] != $_GET['lan']) {
			unset($_SESSION['POST']);
			unset($_SESSION['errorRaw']);
		}
		$sessionName = 'register';
		$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
		$_SESSION['lan'] = isset($_GET['lan']) ? $_GET['lan'] : "en";
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