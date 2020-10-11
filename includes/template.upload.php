<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/validate.php';
if (isset($_GET['lan'])) {
	$lang_sw = "&lan=" . $_GET['lan'];
	$lang_url =  "?&lan=" . $_GET['lan'];
} else {
	$lang_sw = "&lan=en";
	$str_url =  "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $GLOBALS['lang']['upload']; ?></title>
	<?php commonHeader(); ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
	<link href="../css/font/font-fileuploader.css" rel="stylesheet">
	<!-- styles -->
	<link href="../css/jquery.fileuploader.min.css" media="all" rel="stylesheet">
	<link href="../css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">
	<link href="../css/custom.css" rel="stylesheet">
	<style>
		.fileuploader {
			max-width: 560px;
		}
	</style>
</head>

<body>
	<?php headerAndSearchCode("upload");
	uploadListNav($lang_sw); ?>
	<div id="whole">
		<div id="wrapper">
			<div id="main_section">

				<?php
				///reset/cleanup _SESSION variables
				if (!isset($_GET['type']) or $_GET['function'] !== 'upload' or $_GET['function'] !== 'edit' or $_SESSION['lan'] != $_GET['lan']) {
					unset($_SESSION['POST']);
					unset($_SESSION['errorRaw']);
				}

				if (!isset($_SESSION['uID'])) {
					header('Location:../index.php' . $lang_url);
				}
				$_SESSION['lan'] = isset($_GET['lan']) ? $_GET['lan'] : "en";
				$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);



				//define unique session
				$sessionName = 'upload_' . $_GET['type'];

				if (!isset($_SESSION[$sessionName])) {
					$object = new HtMainView($_GET['type'], null);
					$_SESSION[$sessionName] = base64_encode(serialize($object));
				} else {
					$object = unserialize(base64_decode($_SESSION[$sessionName]));
				}

				///route to edit or upload
				$data = isset($_GET['action']) &&
					($_GET['action'] == "edit") &&
					isset($_GET['data']) ? $_GET['data'] : "";
				if ($data == "") {
					$object->upload($data);
				} else {
					$object->edit($data);
				}

				?>
			</div>
		</div>
	</div>
	<?php footerCode(); ?>
	<script async src="../js/custom.js" type="text/javascript"></script>
	<script async src="../js/jquery.fileuploader.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			$('#rentOrSell').on('change', function() {
				var test = $(this).val();
				if (test == "fieldPriceRent") {
					$(".fieldPriceSell").hide();
					$(".fieldPriceRent").show();
				} else if (test == "fieldPriceSell") {
					$(".fieldPriceSell").show();
					$(".fieldPriceRent").hide();
				} else if (test == "both") {
					$(".fieldPriceSell").show();
					$(".fieldPriceRent").show();
				} else {
					$(".fieldPriceSell").hide();
					$(".fieldPriceRent").hide();
				}
			});

			$('#fieldColor').on('change', function() {
				var backgroundColor = $('option:selected', this).css('background-color');
				var color = $('option:selected', this).css('color');
				$(this).css('background-color', backgroundColor);
				$(this).css('color', color);
			});

			$('#idCategory').on('change', function() {
				var test = $(this).val();
				if (test == "Land") {
					$(".lotsize").show();
					$(".land").hide();
				} else {
					$(".land").show();
				}
			});

			$('#fieldColor').trigger('change');
			$('#rentOrSell').trigger('change');

			// // enable fileuploader plugin
			// $('input[name="files"]').fileuploader({
			// 	addMore: true
			// });
		});
	</script>
</body>

</html>