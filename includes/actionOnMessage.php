<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
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
$connect = DatabaseClass::getInstance()->getConnection();

// If the message id is one without comma then it treats it as anumeric number, if not it treats it as a string.
// Then we made an array out of it.

$tableName = "contactus";
$idType = "kID";
$updateAction = "UPDATE $tableName SET messageStatus =";
$deleteAction = "DELETE FROM $tableName";

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
			$numeric = $idArray;
			DatabaseClass::getInstance()->actionOnTables($deleteAction, $idType, $numeric);
		}
		else
		{
			$id= explode(",", $idArray);
			for($i=0; $i<count($id); $i++)
			{
				if($id[$i] != "") {
				   DatabaseClass::getInstance()->actionOnTables($deleteAction, $idType, $id[$i]);
                }
				
			}

		}
		break;

	case 'follow':
        if(is_numeric($idArray)){
			$numeric=$idArray;
			DatabaseClass::getInstance()->actionOnTables($updateAction . "'follow up'", $idType, $numeric);
		}
		else
		{
			$id= explode(",", $idArray);
			for($i=0; $i<count($id); $i++)
			{
				if($id[$i] != "") {
				echo $action;
				DatabaseClass::getInstance()->actionOnTables($updateAction . "'follow up'", $idType, $id[$i]);
                }
			}
		}
		
		break;

	case 'unfollow':
		if(is_numeric($idArray))
		{
		    $numeric=$idArray;
			DatabaseClass::getInstance()->actionOnTables($updateAction. "'read'", $idType, $numeric);
		}
		else
		{
			$id = explode(",", $idArray);
			for($i=0; $i<count($id); $i++)
			{
				if($id[$i] != "") {
				   DatabaseClass::getInstance()->actionOnTables($updateAction. "'read'", $idType, $id[$i]);
                }
			}
		}
		break;
	
	case 'unread':
	    if(is_numeric($idArray)){
	        $numeric=$idArray;
	        DatabaseClass::getInstance()->actionOnTables($updateAction. "'unread'", $idType, $numeric);
	    }
	    else {
	        $id = explode(",", $idArray);
			for($i=0; $i<count($id); $i++)
			 {
			    if($id[$i] != "") {
				   DatabaseClass::getInstance()->actionOnTables($updateAction. "'unread'", $idType, $id[$i]);
                }
	         }
	    }
	    break;
}

// we return the number of message found in the table
$contactusresult = $connect->query("SELECT kID FROM contactus");
$contactusMessage= mysqli_num_rows($contactusresult);
echo $contactusMessage;


?>
