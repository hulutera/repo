<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/class.fileuploader.php';
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/validate.php';

$err = [];
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

	$itemName = str_replace("item_", "", $_GET['table']);
	header('Location: ../../template.upload.php?type=' . $itemName);
} else {
	$err=[];
	$_SESSION['POST'] = [];
	$_SESSION['error']  = null;

	// initialize FileUploader
	$FileUploader = new FileUploader('files', array(
		'limit' => null,
		'maxSize' => null,
		'fileMaxSize' => null,
		'extensions' => null,
		'required' => false,
		'uploadDir' => $documnetRootPath . '/upload/',
		'title' => 'name',
		'replace' => false,
		'editor' => array(
			'maxWidth' => 640,
			'maxHeight' => 480,
			'quality' => 90
		),
		'listInput' => true,
		'files' => null
	));

	// unlink the files
	// !important only for preloaded files
	// you will need to give the array with appendend files in 'files' option of the fileUploader
	foreach ($FileUploader->getRemovedFiles('file') as $key => $value) {
		unlink('../uploads/' . $value['name']);
	}


	// call to upload the files
	$data = $FileUploader->upload();

	// if uploaded and success
	if ($data['isSuccess'] && count($data['files']) > 0) {
		// get uploaded files
		$uploadedFiles = $data['files'];
	}
	// if warnings
	if ($data['hasWarnings']) {
		$warnings = $data['warnings'];

		echo '<pre>';
		print_r($warnings);
		echo '</pre>';
	}

	// get the fileList
	$fileList = $FileUploader->getFileList();

	// show
	echo '<pre>';
	print_r($fileList);
	echo '</pre>';
}
