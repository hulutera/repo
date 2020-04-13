<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/cmn.upload.php';
require_once $documnetRootPath . '/includes/common.inc.php';
require_once $documnetRootPath . '/includes/validate.php';

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

	<!-- js -->
	<script src="../../includes/thumbnails/js/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
	<script src="../../includes/thumbnails/js/custom.js" type="text/javascript"></script>
	<script src="../../includes/dist/jquery.fileuploader.min.js" type="text/javascript"></script>

	<script>
		$(document).ready(function() {
			$('#rentOrSell').on('change', function() {
				var test = $(this).val();
				if(test == "rentOrSell"){
					$(".fieldPriceSell").hide();
					$(".fieldPriceRent").hide();
				} else if (test == "rent") {
					$(".fieldPriceSell").hide();
					$(".fieldPriceRent").show();
				} else if (test == "sell") {
					$(".fieldPriceSell").show();
					$(".fieldPriceRent").hide();
				} else {
					$(".fieldPriceSell").show();
					$(".fieldPriceRent").show();
				}
			});
			//location.reload();
		});
	</script>
	<style>
		body {
			font-family: 'Roboto', sans-serif;
			font-size: 14px;
			line-height: normal;
			background-color: #fff;

			margin: 0;
		}

		form {
			margin: 15px;
		}

		.fileuploader {
			max-width: 560px;
		}
	</style>
</head>
</head>

<body>
	<div id="whole">
		<div id="wrapper">
			<?php uploadHeaderAndSearchCode(""); ?>
			<div id="main_section">

				<?php
				$lang_url = isset($_GET['lan']) ? "?&lan=" . $_GET['lan'] : "";
				echo '<div class="col-md-12"><a href="upload.php' . $lang_url . '">' . $GLOBALS['lang']['Back to Post Item'] . '</a></div>';

				$sessionName = 'upload_' . $_GET['type'];
				if (!isset($_SESSION[$sessionName])) {
					$object = new HtMainView($_GET['type'], null);
					$object->upload();
					$_SESSION[$sessionName] = base64_encode(serialize($object));
				} else {
					$object = unserialize(base64_decode($_SESSION[$sessionName]));
					$object->upload();
				}
				//var_dump($_SESSION);

				?>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>

</html>