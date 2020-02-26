<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/cmn.upload.php';
require_once $documnetRootPath . '/includes/common.inc.php';
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

				<form class="form-horizontal" action="../../includes/thumbnails/php/form_upload.php" method="post" enctype="multipart/form-data">
					<h1>IN PROGRESS</h1>
					<?php				
					    (new HtMainView($_GET['type'], null))->upload();
					?>
					<div class="form-group row">
						<div class="col-xs-offset-4 col-xs-8">
							<button name="submit" type="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>

</html>