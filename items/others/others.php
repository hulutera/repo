<?php
//start session
session_start();
//get the root directory path
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
//get name of the calling script
$file = basename($_SERVER['SCRIPT_NAME']);
//remove php extention
$file = str_replace(".php","",$file);
//if session variable is set , unset it
if(isset($_SESSION['item']))
{
	unset($_SESSION['item']);
}
//set session variable item
$_SESSION['item'] = $file;
//redirect to template.item file
header('Location: ../../includes/template.item.php?type='.$file);
?>