<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/helper/mysqliConnect.php';

global $connect;
        $itemid =$_GET['itemid'];
	$name = $_GET['name'];
	$email = $_GET['email'];
	$msg= $_GET['msg'];
	$subject = "You have a message";
        $itemtype= $_GET['itemtype'];
    $uemail = $_GET['uemail'];
    

    $yourname ="";
    $youremail="";
    $yourmsg ="";

 		//username
		if($name == ""){
			echo"* Please enter your name.<br/>";
		               }
		else if(ctype_alnum($name)){
			$yourname = $name;
			
			
		}else{
			echo"* Name must consist of letters and numbers only.<br/>";
		}
	
		//email
		if($email == ""){
			echo"* Please enter your email.</br>";
		}//else if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
			else if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			//$youremail = $connect->real_escape_string($email);
			$youremail = $email;
			
		}else{
			echo"* Your e-mail address is invalid.<br/> ";
		}
		
		
		
		//message
		if($msg == ""){
			 echo"* Please enter your message.<br/>";}
		else {
			$yourmsg = $connect->real_escape_string($msg);
			$flag_msg=1;
			}
		
		
		
		
	  // To send HTML mail, the Content-type header must be set
           $headers  = 'MIME-Version: 1.0' . "\r\n";
           $headers .= 'Content-Type: text/html; charset=utf-8\r\n' . "\r\n";	
		
	  $iteName=strtolower($itemtype);	
	  $yourmsg = wordwrap($yourmsg, 70, "\r\n");
	  $header = "From: ". $yourname . " <" . $youremail . ">\r\n";
	  $yourmsg .= "To see the item click the link/ንብረቱን ለማየት ይህንን ይጫኑ: www.katomer.com/template/itemTemplate.php?type=$iteName&Id=$itemid";
      mail($uemail, $subject, $yourmsg, $header);










		
?>
