<?php
ob_start();
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
$http_referer= $_SERVER['HTTP_REFERER'];
session_destroy();
if (isset($_GET['lan'])) {
	$lang_url = "?&lan=" . $_GET['lan'];
}
else
{ 
    $lang_url = "";
}

header("Location:../index.php$lang_url");
ob_end_flush();
?>
