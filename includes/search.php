<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/common.inc.php';
global $lang;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> <?php echo $lang['hulutera']; ?></title>
	<?php commonHeader(); ?>
</head>

<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); ?>
			<div id="main_section">
				<?php (new HtCommonView("search"))->displayItem(); ?>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>

</html>