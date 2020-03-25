<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/class.fileuploader.php';
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/validate.php';

$err = [];
$itemName = str_replace("item_", "", $_GET['table']);
$_SESSION['POST'] = [];
$validate = new ValidateForm($err);
//var_dump($_POST);
//var_dump($err);
$err2 = array();
foreach ($err as $x) {
	foreach ($x as $rowNumber => $pair) {		
		$err2[$rowNumber] = $pair;
	}	
}
//var_dump($err2);
//exit;
if (!empty($err)) {
	$_SESSION['POST'] = $_POST;
	$_SESSION['OPTIONS'] = $validate->getDefaultOptions();
	$input = implode('', array_map(
		function ($v) {
			return sprintf("-  %s", $v);
		},
		$err2,
		array_keys($err2)
	));


	$input = "Oh Snap! <br>" . $input;
	$crypto = new Cryptor();
	$_SESSION['error']  = $crypto->encryptor($input);
	$_SESSION['errorRaw']  = $err2;

	header('Location: ../../template.upload.php?type=' . $itemName);
} else {
	$err = [];
	$_SESSION['POST'] = [];
	$_SESSION['error']  = null;
	$_SESSION['errorRaw']  = null;

	$_item = $_GET['table'];
	//get item instance
	$_pItem = ObjectPool::getInstance()->getObjectWithId($_item, null);
	//insert item
	$_pItem->insert();
	//successfull
	header('Location: ../../prompt.php?type=10');
}
