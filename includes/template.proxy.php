<?php
/*Unset the session value*/
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/cmn.proxy.php';
//get item name from URL
$proxyType = $_GET['type'];
//get array containing itemAmharic and if type variable is valid
$status = title($proxyType);
//save Amharic name
$itemAmharic = $status[0];
//save URL validity
$isValidUrl  = $status[1];
//redirect if url is invalid
if (!$isValidUrl)
	header('Location: ../../index.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $proxyType . " § " . $itemAmharic; ?></title>
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