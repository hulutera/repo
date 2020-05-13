<?php

session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
//require_once $documnetRootPath . '/includes/form_user.php';
require_once $documnetRootPath . '/includes/validate.php';
global $lang, $lang_url, $str_url;

if (!isset($_SESSION['uID'])) {
	ob_start();
	header('Location:../index.php' . $lang_url);
	ob_end_flush();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $lang['help']; ?></title>
	<?php commonHeader(); ?>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/hulutera.unminified.css" rel="stylesheet">
	<link href="../../css/font-awesome.min.css" rel="stylesheet">
	
</head>

<body>
	<?php
	headerAndSearchCode("");
	?>
	<div class="row" style="width:60%;margin:20px;margin-left:20%;margin-right:20%;">
        
    <? help();?>
		
	</div>
	<?php footerCode(); ?>
	<script>
		
	</script>
</body>

</html>