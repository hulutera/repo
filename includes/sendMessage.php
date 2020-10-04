<?php
global $str_url;

function send_mail($to, $subject, $message, $header, $redirect_link = null) {

	// send email to the customer
	$msg = $message;
	$msg = wordwrap($message, 70, "\n");
	$headers = $header;

	// mail("To:email", "Subject", "Message", "Header:From")
	$send = mail($to, $subject, $msg, $headers);

	if(!$send) {
		die("Sending Email Failed. Please Contact Site Admin!");
	} else {
		header('Location: ' . $redirect_link);
	}

}

?>