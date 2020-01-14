<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/helper/mysqliConnect.php';

$Email_to = (isset($_GET['useremail'])) ? $_GET['useremail'] : '0' ;
$idArray = (isset($_GET['idArray'])) ? $_GET['idArray'] : '0' ;
$msg = (isset($_GET['msg'])) ? $_GET['msg'] : '0' ;
$youremail = (isset($_GET['youremail'])) ? $_GET['youremail'] : '0' ;
$action =$_GET['action'];
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
			$deletequery = $connect->query("DELETE FROM contactus WHERE kID = '$id' ") or die(mysqli_error());
		}
		else
		{
			$id= explode(',', $idArray);
			for($i=0; $i<count($id); $i++)
			{
				$deletequery = $connect->query("DELETE FROM contactus WHERE kID = '$id[$i]'") or die(mysqli_error());
			}
		}
		break;

	case 'follow':

		if(is_numeric($idArray))
		{
			$followUpquery = $connect->query("UPDATE contactus SET messageStatus = 'follow up'  WHERE kID = '$idArray'") or die(mysqli_error());
		}
		else
		{
			$id= explode(',', $idArray);
			for($i=0; $i<count($id); $i++)
			{
				$followUpquery = $connect->query("UPDATE contactus SET messageStatus = 'follow up' WHERE kID = '$id[$i]'") or die(mysqli_error());

			}
		}
		break;

	case 'unfollow':
		if(is_numeric($idArray))
		{
			$unfollowquery = $connect->query("UPDATE contactus SET messageStatus = 'read'  WHERE kID = '$idArray'") or die(mysqli_error());
		}
		else
		{
			$id = explode(',', $idArray);
			for($i=0; $i<count($id); $i++)
			{
				$unfollowquery = $connect->query("UPDATE contactus SET messageStatus = 'read' WHERE kID = '$id[$i]'") or die(mysqli_error());
			}
		}
		break;
}
?>
