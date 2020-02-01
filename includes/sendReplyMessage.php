<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';

$Email_to = (isset($_GET['useremail'])) ? $_GET['useremail'] : '0' ;
$idArray = (isset($_GET['idArray'])) ? $_GET['idArray'] : '0' ;
$msg = (isset($_GET['msg'])) ? $_GET['msg'] : '0' ;
$youremail = (isset($_GET['youremail'])) ? $_GET['youremail'] : '0' ;
$action =$_GET['action'];
$table1 = "contactus";
$table2 = "";
switch($action)
{
	case 'reply':

		$subject= "You have a message.";
		$replay_msg = wordwrap($msg, 70, "\r\n");
		$header = "From: <" . $youremail . ">\r\n";
		mail($Email_to, $subject, $replay_msg, $header);
		break;

	case 'delete':
		if(is_numeric($idArray))
		{
			$id=$idArray;
			$condition1 = "WHERE kID = '$id'";
			DatabaseClass::getInstance()->deleteUser($table1, $condition2);
		}
		else
		{
			$id= explode(',', $idArray);
			for($i=0; $i<count($id); $i++)
			{
				$cond2 = "WHERE kID = '$id[$i]'";
				DatabaseClass::getInstance()->deleteUser($table1, $cond2);
			}
		}
		break;

	case 'follow':

		if(is_numeric($idArray))
		{
			$sql = "UPDATE contactus SET messageStatus = 'follow up'  WHERE kID = '$idArray'";
			DatabaseClass::getInstance()->runQuery($sql);
		}
		else
		{
			$id= explode(',', $idArray);
			for($i=0; $i<count($id); $i++)
			{
				$sql = "UPDATE contactus SET messageStatus = 'follow up' WHERE kID = '$id[$i]'";
				DatabaseClass::getInstance()->runQuery($sql);
			}
		}
		break;

	case 'unfollow':
		if(is_numeric($idArray))
		{
			$sql = "UPDATE contactus SET messageStatus = 'read'  WHERE kID = '$idArray'";
			DatabaseClass::getInstance()->runQuery($sql);
		}
		else
		{
			$id = explode(',', $idArray);
			for($i=0; $i<count($id); $i++)
			{
				$sql = "UPDATE contactus SET messageStatus = 'read' WHERE kID = '$id[$i]'";
				DatabaseClass::getInstance()->runQuery($sql);
			}
		}
		break;
}
?>
