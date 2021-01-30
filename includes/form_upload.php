<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/validate.php';

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
		$redirectLink = './template.upload.php?function=upload&type=' . $itemName . $lang_sw;
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

	var_dump($_SESSION['POST']);
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

	// exit;
	$_SESSION['POST'] = [];
	$_SESSION['error']  = null;
	$_SESSION['errorRaw']  = null;
	unset($_SESSION['POST']);
	unset($_SESSION['error']);
	unset($_SESSION['errorRaw']);

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


	if ($_pItem->lastSqlError() !== null) {
		$user = new HtUserAll((int)$_SESSION['uID']);
		var_dump($_SESSION['uID']);
		var_dump($user->isWebMaster());
		var_dump($user->isAdmin());
		var_dump($_pItem->lastSql());
		$data = trim(preg_replace('/\s\s+/', ' ', (string)$_pItem->lastSql()));
		var_dump($data);
		if ($user->isWebMaster() || $user->isAdmin()) {
			header('Location: ./prompt.php?type=503&msg=' . $_pItem->lastSqlError() . ", SQL=" . $data);
		} else {
			header('Location: ./prompt.php?type=504');
		}
	} else //successfull
	{
		$link = "./prompt.php?type=10" . $lang_url;
		header('Location: ' . $link);
	}
}
