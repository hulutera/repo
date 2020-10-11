<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
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
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $GLOBALS['lang']['upload']; ?></title>
	<?php commonHeader(); ?>
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/hulutera.unminified.css" rel="stylesheet">
	<link href="../../css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
	<?php
	headerAndSearchCode("upload"); ?>
	<div id="whole" style="width:100%;margin-left:0px;margin-right:0px; min-height:400px">
		<?php uploadListMain($lang_sw); ?>
	</div>
	<?php footerCode(); ?>
</body>

</html>