<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/common.inc.php';
require_once $documnetRootPath . '/includes/validate.php';
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
	<title>Upload | ንብረቱን ያስገቡ</title>
	<?php commonHeader(); ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">

	<!-- fonts -->

	<link href="../../includes/dist/font/font-fileuploader.css" rel="stylesheet">

	<!-- styles -->
	<link href="../../includes/dist/jquery.fileuploader.min.css" media="all" rel="stylesheet">
	<link href="../../includes/thumbnails/css/jquery.fileuploader-theme-thumbnails.css" media="all" rel="stylesheet">

	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/hulutera.unminified.css" rel="stylesheet">

	<link href="../../css/custom.css" rel="stylesheet">

	<!-- js -->
	<script src="../../includes/thumbnails/js/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
	<script src="../../includes/thumbnails/js/custom.js" type="text/javascript"></script>
	<script src="../../includes/dist/jquery.fileuploader.min.js" type="text/javascript"></script>

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

		});
	</script>
	<style>
		.fileuploader {
			max-width: 560px;
		}
	</style>
</head>
</head>

<body>
	<?php headerAndSearchCode("upload");
	uploadListNav($lang_sw); ?>
	<div id="whole">
		<div id="wrapper">
			<div id="main_section">

				<?php

				///reset/cleanup _SESSION variables
				if (!isset($_GET['type']) or $_GET['function'] !== 'upload' or $_SESSION['lan'] != $_GET['lan']) {
					unset($_SESSION['POST']);
					unset($_SESSION['errorRaw']);
				}

				$_SESSION['lan'] = isset($_GET['lan']) ? $_GET['lan'] : "en";
				$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

				//define unique session
				$sessionName = 'upload_' . $_GET['type'];
				if(isset($_SESSION['uID'])) {
					if (!isset($_SESSION[$sessionName])) {
						$object = new HtMainView($_GET['type'], null);
						$object->upload();
						$_SESSION[$sessionName] = base64_encode(serialize($object));
					} else {
						$object = unserialize(base64_decode($_SESSION[$sessionName]));
						$object->upload();
					}
				} else {
					header('Location:../index.php' . $lang_url);
				}
				var_dump($_SESSION['POST']);

				?>
			</div>
		</div>
	</div>
	<?php footerCode(); ?>
</body>

</html>