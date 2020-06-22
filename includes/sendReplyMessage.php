<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/db/database.class.php';

$Email_to = (isset($_GET['useremail'])) ? $_GET['useremail'] : '0';
$idArray = (isset($_GET['idArray'])) ? $_GET['idArray'] : '0';
$msg = (isset($_GET['msg'])) ? $_GET['msg'] : '0';
$youremail = (isset($_GET['youremail'])) ? $_GET['youremail'] : '0';
$action = $_GET['action'];
$table = "contactus";
switch ($action) {
	case 'reply':

		$subject = "You have a message.";
		$replay_msg = wordwrap($msg, 70, "\r\n");
		$header = "From: <" . $youremail . ">\r\n";
		mail($Email_to, $subject, $replay_msg, $header);
		break;

	case 'delete':
		if (is_numeric($idArray)) {
			$id = $idArray;
			$cond1 = "WHERE kID = '$id'";
			DatabaseClass::getInstance()->updateUser($table, $cond1);
		} else {
			$id = explode(',', $idArray);
			for ($i = 0; $i < count($id); $i++) {
				$cond1 = "WHERE kID = '$id[$i]'";
				DatabaseClass::getInstance()->updateUser($table, $cond1);
			}
		}
		break;

	case 'follow':

		if (is_numeric($idArray)) {
			$cond1 = "messageStatus = 'follow up'  WHERE kID = '$idArray'";
			DatabaseClass::getInstance()->updateTable($table, $cond1);
		} else {
			$id = explode(',', $idArray);
			for ($i = 0; $i < count($id); $i++) {
				$cond1 = "messageStatus = 'follow up' WHERE kID = '$id[$i]'";
				DatabaseClass::getInstance()->updateTable($table, $cond1);
			}
		}
		break;

	case 'unfollow':
		if (is_numeric($idArray)) {
			$cond1 = "messageStatus = 'read'  WHERE kID = '$idArray'";
			DatabaseClass::getInstance()->updateTable($table, $cond1);
		} else {
			$id = explode(',', $idArray);
			for ($i = 0; $i < count($id); $i++) {
				$cond1 = "messageStatus = 'read' WHERE kID = '$id[$i]'";
				DatabaseClass::getInstance()->updateTable($table, $cond1);
			}
		}
		break;
}
