<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';

if (isset($_GET['itemid']) && isset($_GET['name']) && isset($_GET['email']) && isset($_GET['msg']) && isset($_GET['uemail']) && isset($_GET['itemtype']) && isset($_GET['lan'])) {
	$subject = $GLOBALS['lang']['msg from'] . " " . $_GET['name'];
	$header = "From: nonreply@hulutera.com";
	$item_link = "https://www.hulutera.com/includes/template.item.php?type=" . $_GET['itemtype'] . "&status=active&id=" . $_GET['itemid'] . "&function=single-item&lan=" . $_GET['lan'];
	$msg = $GLOBALS['lang']['mail introduction'] . "\n\n";
	$msg .= "Hulutera.com" . "\n\n";
	$msg .= $GLOBALS['lang']['Full Name'] . ": " . $_GET['name'] . "\n";
	$msg .= $GLOBALS['lang']['Email'] . ": " . $_GET['email'] . "\n";
	$msg .= $_GET['msg'] . "\n";
	$msg .= $GLOBALS['lang']['item link'] . ": " . $item_link;

	send_mail($_GET['uemail'], $subject, $msg, $header);
}

function send_mail($to, $subject, $message, $header, $redirect_link = null, $activation_link=null)
{
	$html = '<html style="font-family:arial;"><body>';
	$html .= $message;
	$html .= '<div style="width:15%"><img style="width:15%" src="https://hulutera.com/images/icons/log-test-1.png" alt="Hulutera" /></div>';
	$html .= '</body></html>';

	if (isset($GLOBALS['status'])) {
		if ($GLOBALS['status'] = "deploy-release") {
			// send email to the customer

			$message = wordwrap($html, 70, "\n");
			$header .= "\r\n";
			$header .= "MIME-Version: 1.0\r\n";
			$header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			// mail("To:email", "Subject", "Message", "Header:From")
			$send = mail($to, $subject, $html, $header);

			if (!$send) {
				die("Sending Email Failed. Please Contact Site Admin!");
			} else {
				header('Location: ' . $redirect_link);
			}
		}
	}
	else{
		echo $html;
        echo '<br><a target="blank" href="' . $activation_link . '">' . $activation_link . '</a><br>';
	}
}
