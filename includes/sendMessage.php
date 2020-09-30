<?php
global $str_url;

function send_mail($to, $subject, $message, $header, $prompt_id) {

	// send email to the customer
	$msg = $message;
	$msg = wordwrap($message, 70, "\n");
	$headers  = 'MIME-Version: 1.0' . "\n";
	$headers .= 'Content-Type: text/html; charset=utf-8\n' . "\n";
	$headers .= $header;

	// mail("To:email", "Subject", "Message", "Header:From")
	$send = mail($to, $subject, $msg, $headers);

	if(!$send) {
		die("Sending Email Failed. Please Contact Site Admin!");
	} else {
		header('Location: ../includes/prompt.php?type=' . $prompt_id . $str_url);
	}

}

?>