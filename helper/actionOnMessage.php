<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/helper/mysqliConnect.php';
// email to send to
$Email_to = (isset($_GET['useremail'])) ? $_GET['useremail'] : '';
// the message id in an array
$idArray = (isset($_GET['idArray'])) ? $_GET['idArray'] : '';
// message to send
$msg = (isset($_GET['msg'])) ? $_GET['msg'] : '';
// the sender email
$youremail = (isset($_GET['youremail'])) ? $_GET['youremail'] : '';
//action to be taken
$action =(isset($_GET['action'])) ? $_GET['action'] : '';
global $connect;

// If the message id is one without comma then it treats it as anumeric number, if not it treats it as a string.
// Then we made an array out of it.


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
			$numeric=$idArray;
			$deletequery = $connect->query("DELETE FROM contactus WHERE kID = '$numeric' ") or die(mysqli_error());
		}
		else
		{
			$id= explode(",", $idArray);
			for($i=0; $i<count($id); $i++)
			{
				$deletequery = $connect->query("DELETE FROM contactus WHERE kID = '$id[$i]'") or die(mysqli_error());
			}

		}
		break;

	case 'follow':
        
        if(is_numeric($idArray)){
			$numeric=$idArray;
			$followUpquery = $connect->query("UPDATE contactus SET messageStatus = 'follow up'  WHERE kID = '$numeric'") or die(mysqli_error());
		}
		else
		{
			$id= explode(",", $idArray);
			for($i=0; $i<count($id); $i++)
			{
				$followUpquery = $connect->query("UPDATE contactus SET messageStatus = 'follow up' WHERE kID = '$id[$i]'") or die(mysqli_error());

			}
		}
		
		break;

	case 'unfollow':
		
		if(is_numeric($idArray))
		{
		    $numeric=$idArray;
			$unfollowquery = $connect->query("UPDATE contactus SET messageStatus = 'read'  WHERE kID = '$numeric'") or die(mysqli_error());
		}
		else
		{
			$id = explode(",", $idArray);
			for($i=0; $i<count($id); $i++)
			{
				$unfollowquery = $connect->query("UPDATE contactus SET messageStatus = 'read' WHERE kID = '$id[$i]'") or die(mysqli_error());
			}
		}
		break;
	
	case 'unread':
	 
	 if(is_numeric($idArray)){
	   $numeric=$idArray;
	   $unreadResult = $connect->query("UPDATE contactus SET messageStatus = 'read' WHERE kID = '$numeric' ") or die(mysqli_error());
	   }
	 else {
	        $id = explode(",", $idArray);
			for($i=0; $i<count($id); $i++)
			 {
			$unreadResult = $connect->query("UPDATE contactus SET messageStatus = 'read' WHERE kID = '$id' ") or die(mysqli_error());
	         }
	      }
	    break;
}

// we return the number of message found in the table
$contactusresult = $connect->query("SELECT kID FROM contactus");
$contactusMessage= mysqli_num_rows($contactusresult);
echo $contactusMessage;


?>
