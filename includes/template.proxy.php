<?php
/*Unset the session value*/
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/cmn.proxy.php';

//get item name from URL
$proxyType = $_GET['type'];
$type_array = array('about', 'terms', 'contact-us', 'help', 'privacy');

if (!in_array($proxyType, $type_array)) {
	header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $GLOBALS['lang']['hulutera']; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
	<?php commonHeader(); ?>
</head>
<body>
	<?php headerAndSearchCode(""); ?>
	<div class="row">
		<?php routerProxy($proxyType); ?>
	</div>
	<?php footerCode(); ?>
</body>

</html>