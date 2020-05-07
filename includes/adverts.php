<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/common.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hulutera | ሁሉተራ </title>
<?php commonHeader();?>
</head>
<body>
	<?php headerAndSearchCode("");
	(new  HtCommonView("search"))->displayItem();
	footerCode();?>
</body>
</html>

