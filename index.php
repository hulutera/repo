<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/common.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hulutera | ሁሉተራ </title>
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode("");?>
			<div id="main_section">
				<div id="mainColumn">
					<?php (new MainView("all"))->displayItem();?>
				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode();?>
</body>
</html>

