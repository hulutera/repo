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
	?>
	<div class="row" style="width:60%;margin:20px;margin-left:20%;margin-right:20%;">

		<?php
		accountLinks();
		routerContent($_GET['type']);
		?>
	</div>
	<?php footerCode(); ?>
</body>
</body>

</html>