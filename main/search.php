<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/item.inc.php';
require_once $documnetRootPath.'/includes/common.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Search | ፈልግ</title>
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); ?>
			<div id="main_section">
				<?php centerSearchColumn(); ?>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>
