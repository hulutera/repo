<?php
//get name of the calling script
$file = basename($_SERVER['SCRIPT_NAME']);
//remove php extention
$file = str_replace(".php", "", $file);
if (isset($_GET['ID']))
	$id = '&ID=' . $_GET['ID'];
else
	$id = '';
if (isset($_GET['err']))
	$err = '&err=' . $_GET['err'];
else
	$err = '';
//redirect to itemTemplate file
header('Location: template.admin.php?type=' . $file . $id . $err);
