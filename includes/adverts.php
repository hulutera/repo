<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/common.inc.php';


//get item name from URL
if (!isset($_GET['search_text']) or !isset($_GET['lan']) or !isset($_GET['cities']) or !isset($_GET['item']) ) {
	header('Location: ../../index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $GLOBALS['lang']['search']; ?></title>
	<?php commonHeader(); ?>
</head>

<body>
	<?php headerAndSearchCode(""); ?>
	<div id="whole">
		<div id="wrapper">
			<div id="main_section">
				<div id="mainColumn">
					<?php (new  HtMainView("search"))->show(); ?>
				</div>
			</div>
		</div>
	</div>
	<?php footerCode(); ?>

	<body>
	</body>
</body>

</html>

