<?php
ob_start();
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
$http_referer= $_SERVER['HTTP_REFERER'];
session_destroy();
header('Location:../index.php');
ob_end_flush();
?>
