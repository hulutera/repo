<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/common.inc.php';


//get item name from URL
if (!isset($_GET['type'])) {
	header('Location: ../../index.php');
}
$item = $_GET['type'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $GLOBALS['item_lang_arr'][$item]; ?></title>
	<?php commonHeader(); ?>
</head>

<body>
	<?php headerAndSearchCode($item); ?>
	<div id="whole">
		<div id="wrapper">
			<div id="main_section">
				<div id="mainColumn">
					<div class="row items-board">
					<?php
					$function = isset($_GET['function']) ? $_GET['function'] : null;
					if (isset($function)) {
						$id = $_GET['id'];
						$status = $_GET['status'];
						(new  HtMainView($item, $id, $status))->showOneItem(); //   show($status);
					} else {
						(new  HtMainView($item))->show("active");
					} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php footerCode(); ?>

	<body>
	</body>
</body>

</html>