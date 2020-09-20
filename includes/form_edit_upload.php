<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/class.fileuploader.php';
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/validate.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';

//// validation of inputs
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
	$_SESSION['POST'] = $_POST;
	$_SESSION['OPTIONS'] = $validate->getDefaultOptions();
	$input = implode('', array_map(
		function ($v) {
			return sprintf("-  %s", $v);
		},
		$err2,
		array_keys($err2)
	));

	$crypto = new Cryptor();
	$_SESSION['error']  = $crypto->encryptor($input);
	$_SESSION['errorRaw']  = $err2;
	$lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";

	header('Location: ../../template.upload.php?function=upload&type=' . $itemName . $lang_sw);
}

// /// here get file from post fileuploader-list-files and creat
// /// a new element ['POST']['files']
// /// update session['POST'] new values from the validations
// $_SESSION['POST']['files'] = $_POST['fileuploader-list-files'];
// foreach ($_POST as $key => $value) {
// 	if (array_key_exists($key, $_SESSION['POST'])) {
// 		$_SESSION['POST'][$key] = $value;
// 	}
// }
// /// make equal session POST and POST
// $_POST = $_SESSION['POST'];

// //var_dump($_POST);
// // define uploads path
// $uploadDir = '..' . $_SESSION['POST']['uploadDirRel'];
// $FileUploader = new FileUploader('files', array(
// 	'limit' => null,
// 	'maxSize' => null,
// 	'fileMaxSize' => null,
// 	'extensions' => null,
// 	'required' => false,
// 	'uploadDir' => $uploadDir,
// 	'title' => 'name',
// 	'replace' => false,
// 	'editor' => array(
// 		'maxWidth' => 640,
// 		'maxHeight' => 480,
// 		'quality' => 90
// 	),
// 	'listInput' => true,
// 	'files' => null
// ));

// //// find file sin session from perloaded files
// $sessionPostFiles = array_column(json_decode($_SESSION['POST']['preloadedFiles']), 'name');

// /// find files in post file
// $postFiles  = array_column(json_decode($_POST['files']), 'file');

// /// remove the directory name from the postFiles
// foreach ($postFiles as &$value) {
// 	$value = str_replace("../".$_POST['uploadDir'],"", $value);
// }
// /// get the difference betrween array, to get the removed files
// $postRemovedFiles = array_diff($sessionPostFiles,$postFiles);

// // remove the filed from the directory
// foreach($postRemovedFiles as $key=>$value) {
// 	unlink($_POST['uploadDir'] . $value);
// }

// // call to upload the files
// $data = $FileUploader->upload();

// // if uploaded and success
// if($data['isSuccess'] && count($data['files']) > 0) {
// 	// get uploaded files
// 	$uploadedFiles = $data['files'];
// }
// // if warnings
// if($data['hasWarnings']) {
// 	$warnings = $data['warnings'];

// 	   echo '<pre>';
// 	print_r($warnings);
// 	echo '</pre>';
// }