<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
//redirect to template.item file
global $lang;

if (isset($_GET['lan'])) {
	$lang_sw = "&lan=" . $_GET['lan'];
	$lang_url =  "?&lan=" . $_GET['lan'];
} else {
	$lang_sw = "&lan=en";
	$str_url =  "";
}

if (!isset($_SESSION['uID'])) {
	header('Location:../includes/prompt.php?type=9' . $lang_sw);
}
?>
<html>

<head>
	<title><?php echo $lang['upload']; ?></title>
	<?php commonHeader(); ?>
	<style>
		a {
			text-decoration: none;
			color: #0072C6;
		}

		a:hover {
			color: black;
		}

		.image-container {
			position: relative;
			display: inline-block;
		}

		.image-container .hover-text {
			position: absolute;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			background-color: rgba(0, 0, 255, 0.5);
			opacity: 0;
			transition: opacity;
		}

		.hover-text a {
			display: table;
			height: 100%;
			width: 100%;
			text-decoration: none;
		}

		.hover-text a div {
			display: table-cell;
			vertical-align: middle;
			text-align: center;
			font-size: larger;
			color: white;
		}

		.image-container img {
			vertical-align: top;
			/* fixes white space due to baseline alignment */
		}

		.image-container:hover {
			background-color: lightskyblue;
		}
	</style>
	<script type="text/javascript" src="../../js/jquery1.11.1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('div #box').hover(
				function() {
					$(this).css({
						"background-color": "#87CEFA"
					});
				},
				function() {
					$(this).css({
						"background-color": "#FFFFFF"
					});
				}
			);
		});
	</script>
</head>

<body>
	<?php
	headerAndSearchCode("upload");
	uploadList($lang_sw);
	footerCode(); ?>
</body>

</html>