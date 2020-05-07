<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/cmn.content.php';
global $lang;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $lang['My Items']; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
	<?php commonHeader(); ?>
</head>

<body>
	<?php
	headerAndSearchCode("");
	accountLinks();
	routerContent($_GET['type']);
	footerCode();
	?>
</body>
</body>

</html>