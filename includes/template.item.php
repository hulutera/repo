<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/common.inc.php';
error_reporting(0);
ini_set('display_errors', 0);

// error_reporting(E_ALL);
// ini_set('display_errors', 1);

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
					<div class="widget-content properties-grid">

						<?php
						$function = isset($_GET['function']) ? $_GET['function'] : null;
						if (isset($function)) {
							$id = $_GET['id'];
							$status = $_GET['status'];
							(new  HtMainView($item, $id, $status))->showOneItem(); //   show($status);
						} else {
							echo $item;
							$testObj = (new  HtMainView($item));
							echo gettype($testObj);
							$testObj->show("active");
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