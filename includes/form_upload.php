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

	var_dump($err2);
	var_dump($_SESSION['POST']);

	if (isset($_GET['function']) && ($_GET['function'] == 'edit')) {
		$redirectLink = $_SERVER['HTTP_REFERER'];
	} else {
		$_SESSION['POST'] = $_POST;
		$lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
		$redirectLink = '../../template.upload.php?function=upload&type=' . $itemName . $lang_sw;
	}

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

    header('Location: ' . $redirectLink);
} else {
	// reset Error
	$err = [];
	/// get id if edit is running
	$id = isset($_SESSION['POST']['id']) ? (int)$_SESSION['POST']['id'] : null;

	//get item instance
	$_pItem = ObjectPool::getInstance()->getObjectWithId($_GET['table'], $id);
	if (isset($_GET['function']) && ($_GET['function'] == 'edit')) {
		//update item with new data
		$_pItem->uploadEdit();
		//exit;
	} else {
		//insert item
		$_pItem->insertPost();
	}

	//exit;
	$_SESSION['POST'] = [];
	$_SESSION['error']  = null;
	$_SESSION['errorRaw']  = null;

	//reset uploaded sessions per item
	$items = new HtItemAll("*");
	$result = $items->getResultSet();
	while ($row = $result->fetch_assoc()) {
		$itemName = $row['field_name'];
		$_SESSION['upload_' . $itemName] = null;
	}

	if (isset($_GET['lan'])) {
		$lang_url = "&lan=" . $_GET['lan'];
	} else {
		$lang_url = "";
	}

	//successfull
	$link = "../prompt.php?type=10" . $lang_url;
	header('Location: ' . $link);
}
