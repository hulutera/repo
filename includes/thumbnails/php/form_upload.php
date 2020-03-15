<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/class.fileuploader.php';
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/validate.php';

$err = [];
$itemName = str_replace("item_", "", $_GET['table']);
$validate = new ValidateForm($_GET['table'], $err);

if (!empty($err)) {
	$_SESSION['POST'] = $_POST;
	$input = implode('', array_map(
		function ($v) {
			return sprintf("-  %s", $v);
		},
		$err,
		array_keys($err)
	));
	$input = "Oh Snap! <br>" . $input;
	$crypto = new Cryptor();
	$_SESSION['error']  = $crypto->encryptor($input);
	header('Location: ../../template.upload.php?type=' . $itemName);
} else {
	$err=[];
	$_SESSION['POST'] = [];
	$_SESSION['error']  = null;
	$_item = $_GET['table'];
	//get item instance
	$_pItem = ObjectPool::getInstance()->getObjectWithId($_item,null); 	
	//insert item
	$_pItem->insert();
	//successfull
	header('Location: ../../prompt.php?type=10');
}
