<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/common.inc.php';
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
	<div id="whole">
		<div id="wrapper">
			<div id="main_section">
				<div id="mainColumn">
					<div class="widget-content properties-grid">
						<?php
						userContent();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php footerCode(); ?>
</body>
</html>