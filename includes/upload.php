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
	$lang_sw = "";
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
	<div id="whole">
		<div id="wrapper">
			<?php uploadHeaderAndSearchCode(""); ?>
			<div id="main_section">
				<div id="item_collections">
					<div id="lyr1">
						<div id="boxHead">
							<?php echo $lang['choose item to upload']; ?> </div>
						<div id="box">
							<?php uploadList($lang, $lang_sw) ?>
						</div>
					</div>
				</div>
			</div>
			<div class="push"></div>
			<?php footerCode(); ?>
</body>

</html>