<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/class.fileuploader.php';
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/validate.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';

$err = [];
$itemName = str_replace("item_", "", $_GET['table']);
//$_SESSION['POST'] = [];
$validate = new ValidateForm($err);
// var_dump($_GET);
//exit;
$err2 = array();
//$GLOBALS['item_specific_array']['car']['validate'];
foreach ($err as $x) {
	foreach ($x as $rowNumber => $pair) {
		$err2[$rowNumber] = $pair;
	}
}
//var_dump($err2);
//var_dump($_POST);
//exit;
if (!empty($err2)) {
	$_SESSION['POST'] = $_POST;
	$_SESSION['OPTIONS'] = $validate->getDefaultOptions();
	$input = implode('', array_map(
		function ($v) {
			return sprintf("-  %s", $v);
		},
		$err2,
		array_keys($err2)
	));

	var_dump($_SESSION['POST']['fieldPriceRent']);
	$input = "Oh Snap! <br>" . $input;
	$crypto = new Cryptor();
	$_SESSION['error']  = $crypto->encryptor($input);
	$_SESSION['errorRaw']  = $err2;
	$lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
	//exit;
	header('Location: ../../template.upload.php?type=' . $itemName . $lang_sw);
} else {
	// reset Error
	$err = [];
	$_SESSION['POST'] = [];
	$_SESSION['error']  = null;
	$_SESSION['errorRaw']  = null;

	//get item instance
	$_pItem = ObjectPool::getInstance()->getObjectWithId($_GET['table'], null);
	//insert item
	$_pItem->insert();
	
	//reset uploaded sessions per item
	$items = new HtItemAll("*");
	$result = $items->getResultSet();
	while ($row = $result->fetch_assoc()) {
		$itemName = $row['field_name'];
		$_SESSION['upload_' . $itemName] = null;
	}
	//exit
	//successfull
	header('Location: ../../prompt.php?type=10');
}
