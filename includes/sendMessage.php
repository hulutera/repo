<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/locale/locale.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';


$str_url = isset($_GET['lan']) ? $_GET['lan'] : 'en';

if (isset($_GET['itemid']) && isset($_GET['name']) && isset($_GET['email']) && isset($_GET['msg']) && isset($_GET['uemail']) && isset($_GET['itemtype'])) {
	$subject = $GLOBALS['lang']['msg from'] . " " . $_GET['name'];
	$header = "From: nonreply@hulutera.com";
	$item_link = "https://www.hulutera.com/includes/template.item.php?type=" . $_GET['itemtype'] . "&status=active&id=" . $_GET['itemid'] . "&function=single-item&lan=" . $str_url;
	$msg = $_GET['msg'] . "\n";
	$msg .= $GLOBALS['lang']['Full Name'] . ": " . $_GET['name'] . "\n";
	$msg .= $GLOBALS['lang']['Email'] . ": " . $_GET['email'] . "\n";
	$msg .= $GLOBALS['lang']['item link'] . ": " . $item_link;

	send_mail($_GET['uemail'], $subject, $msg, $header);
}

function send_mail($to, $subject, $message, $header, $redirect_link = null) {

	// send email to the customer
	$msg = $message;
	$msg = wordwrap($message, 70, "\n");

	// mail("To:email", "Subject", "Message", "Header:From")
	$send = mail($to, $subject, $msg, $header);

	if(!$send) {
		die("Sending Email Failed. Please Contact Site Admin!");
	} else {
		header('Location: ' . $redirect_link);
	}

}

?>