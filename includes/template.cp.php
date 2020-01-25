<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/cmn.content.php';
$err  = isset($_GET['err'])?$_GET['err']:'';
$type = isset($_GET['type'])?$_GET['type']:'';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>My Items § የኔ ንብረቶች</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); accountLinks();?>
			<div id="main_section">
				<?php routeControlPanel($type,$err);?>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>
