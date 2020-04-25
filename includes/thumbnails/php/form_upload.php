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
$validate = new ValidateUpload($err);
$err2 = array();
foreach ($err as $x) {
	foreach ($x as $rowNumber => $pair) {
		$err2[$rowNumber] = $pair;
	}
}

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

	$input = "Oh Snap! <br>" . $input;
	$crypto = new Cryptor();
	$_SESSION['error']  = $crypto->encryptor($input);
	$_SESSION['errorRaw']  = $err2;
	$lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";

	header('Location: ../../template.upload.php?function=upload&type=' . $itemName . $lang_sw);
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

	//successfull
	header('Location: ../../prompt.php?type=10');
}
