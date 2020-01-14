<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/inc/headerSearchAndFooter.php';
require_once $documnetRootPath.'/cmn/cmn.proxy.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Register | ይመዝገቡ</title>
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); ?>
			<div id="main_section">
				<?php register(); ?>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>

