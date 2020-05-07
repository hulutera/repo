<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/common.inc.php';
if ($_GET['lan'] != "") {
	global $language;
	$language = $_GET['lan'];

	// url exetention for language on hyperlinks without "?"
	$lang_url = "?&lan=" . $language;

	// url exetention for language on hyperlinks with "?"
	$str_url = str_replace("?", "", $lang_url);
	require_once $documnetRootPath . '/includes/locale/' . $_GET['lan'] . '.php';
} else {
	$language = "";
	$lang_url = "";
	$str_url = "";
	require_once $documnetRootPath . '/includes/locale/en.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> <?php echo $lang['hulutera']; ?></title>
	<?php commonHeader(); ?>
</head>

<body>
	<?php
	headerAndSearchCode("");
	(new HtCommonView("search"))->displayItem();
	footerCode();
	?>
</body>

</html>