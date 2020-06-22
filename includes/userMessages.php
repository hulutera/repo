<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/cmn.content.php';
//identify if 'userMessages' is present on the url on the location atleast after 8 characters
global $lang;
if (isset($_GET['lan'])) {
	$lang_url = '?&lan=' . $_GET['lan'];
	$str_url = '&lan=' . $_GET['lan'];
} else {
	$lang_url = "";
	$str_url = "";
}
if (!isset($_SESSION['uID'])) {
	header('Location:../index.php' . $lang_url);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $lang['My Items']; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
	<?php commonHeader(); ?>
</head>

<body>
	<?php
	headerAndSearchCode("");
	accountLinks();
	message();
	footerCode();
	?>
</body>

</html>