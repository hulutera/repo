<?php
global $str_url;


if (isset($_GET['itemid']) && isset($_GET['name']) && isset($_GET['email']) && isset($_GET['msg']) && isset($_GET['uemail']) && isset($_GET['itemtype'])) {
	$subject = "Message from " . $_GET['name'];
	$header = "From :" . $_GET['uemail'];
	$item_link = "https://www.hulutera.com/includes/template.item.php?type=" . $_GET['itemtype'] . "&status=active&id=" . $_GET['itemid'] . "&function=single-item";
	$msg = $_GET['msg'] . "\n";
	$msg .= $item_link;

	send_mail($_GET['email'], $subject, $msg, $header);
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