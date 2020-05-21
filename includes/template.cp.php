<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/cmn.content.php';
$err  = isset($_GET['err']) ? $_GET['err'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>My Items § የኔ ንብረቶች</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
	<?php commonHeader(); ?>
</head>

<body>
	<?php
	headerAndSearchCode("");
	accountLinks();
	?>
	<div class="row" style="width:60%;margin:20px;margin-left:20%;margin-right:20%;">
		<?php
		controlPanel($type, $err); ?>
	</div>
	<?php
	footerCode();
	?>
</body>

</html>