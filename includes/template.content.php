<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/cmn.content.php';
global $lang;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $lang['My Items']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); accountLinks();?>
			<div id="main_section">
				<?php routerContent($_GET['type']);?>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>
