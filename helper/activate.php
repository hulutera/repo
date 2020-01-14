<?php
global $connect;
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/helper/mysqliConnect.php';
$key = $connect->real_escape_string($_GET['key']);
$passRecovery = $_GET['newPass'];

if(!empty($passRecovery) && !empty($key)){
    $result=$connect->query("SELECT uNewPassword FROM user WHERE activation='$key' LIMIT 1") or die(mysqli_error());
    if (mysqli_num_rows($result)==0) {
        header('Location: ../main/prompt.php?type=14');
    }
    else {
        $row=mysqli_fetch_array($result);
        $newPassword=$row['uNewPassword'];
        $result2=$connect->query("UPDATE user SET upassword = '$newPassword', activation= NULL WHERE activation='$key'") or die (mysqli_error());
        header('Location: ../main/prompt.php?type=3');   
    }
}
else if(!empty($key)){        
	$result=$connect->query("SELECT * FROM tempuser WHERE activation='$key' LIMIT 1") or die(mysqli_error());
	if (mysqli_num_rows($result)==0) {
		header('Location: ../main/prompt.php?type=15');
	}
	else if (mysqli_num_rows($result)==1)  {
		while ($row= $result->fetch_assoc()){
			$user_id= $row['tuID'];
			$username= $row['username'];
			$email= $row['email'];
			$password= $row['password'];
			$firstname= $row['firstname'];
			$lastname= $row['lastname'];
			$address= $row['address'];
			$phone= $row['phone'];
            $regDate= $row['regDate'];
		}
        // Calculate the activation key expiration date
        // 2,592,000 is number of seconds per month that the activation key will be active. After a month the user will be removed from tempuser table
        $today = strtotime("tomorrow");		
        $regDateSrting =strtotime($regDate);
        $endDate = 2592000 ;
        if ($today - $regDateSrting >= $endDate ){
			$resulst2= $connect->query("DELETE FROM tempuser WHERE tuID='$user_id'")or die(mysql_error());
			header ('Location: ../main/prompt.php?type=11');
        }
		else{
            $result1=$connect->query("INSERT INTO user (userName, uEmail, uPassword, uFirstName, uLastName, uPhone, uAddress, uRole) VALUES ('$username', '$email', '$password','$firstname','$lastname','$phone','$address', 'user')")or die(mysql_error());
			if(!$result1){
				echo "Sorry! Your account could not be activated, please contact the administrator.";
			}
			else{
                $resulst2=$connect->query("DELETE FROM tempuser WHERE tuID='$user_id'")or die(mysql_error());
				header('Location: ../main/prompt.php?type=0');
            }
	    }
    }
}
?>