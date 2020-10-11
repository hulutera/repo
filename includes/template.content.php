<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/cmn.content.php';
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