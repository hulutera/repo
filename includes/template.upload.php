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
			$("input[name$='rent-or-sell']").click(function() {
				var test = $(this).val();
				if (test == "rent") {
					$(".fieldPriceSell").hide();
					$(".fieldPriceRent").show();
				}
				else if(test == "sell") {
					$(".fieldPriceSell").show();
					$(".fieldPriceRent").hide();
				} else {
					$(".fieldPriceSell").show();
					$(".fieldPriceRent").show();
				}
			});
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
				// if (isset($_SESSION['error']) && isset($_SESSION['errorRaw'])) {
				// 	$crptor = new Cryptor();
				// 	$out = $crptor->decryptor($_SESSION['error']);
				// 	var_dump($_SESSION['errorRaw']);
				// 	echo '<div class="alert-danger">
				// 	<strong>' . $out . '</strong>					
				// </div>';
				// }
				// var_dump($_SESSION['OPTIONS']);
				// var_dump($_SESSION['POST']);
				(new HtMainView($_GET['type'], null))->upload();
				//$_SESSION['POST'] = [];

				?>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>

</html>