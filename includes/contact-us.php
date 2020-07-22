<?php
session_start();
ob_flush();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/classes/reflection/HtUtilContactUs.php';
require_once $documnetRootPath . '/includes/validate.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $GLOBALS['lang']['Contact Us']; ?></title>
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
	<div class="row">
		<?php
		if (!isset($_GET['function']) or $_GET['function'] !== 'contact-us' or (isset($_GET['lan']) && $_SESSION['lan'] != $_GET['lan'])) {
			unset($_SESSION['POST']);
			unset($_SESSION['errorRaw']);
		}
		$sessionName = 'contact-us';
		$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
		$_SESSION['lan'] = isset($_GET['lan']) ? $_GET['lan'] : "en";
		if (!isset($_SESSION[$sessionName])) {
			$object = new HtUtilContactUs();
			$object->contactUs();
			$_SESSION[$sessionName] = base64_encode(serialize($object));
		} else {
			$object = unserialize(base64_decode($_SESSION[$sessionName]));
			$object->contactUs();
		}
		?>
	</div>
	<?php footerCode(); ?>
</body>

</html>