<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
require_once $documnetRootPath.'/classes/cmn.class.php';
global $connect;
if( !isset($_SESSION['uID']) ){
	header('Location:../index.php');
}else{
	$user_id = $_SESSION['uID'];
	$error_message="";
	if(isset($_POST['submit'])){
		$error = array();
		if((empty($_POST['oldpassword']))){
			$error[] = 'Please fill all the blanks/እባክዎ ሁሉንም ይሙሉ.';
		}
		else if((empty($_POST['newpassword']))){
			$error[] = 'Please fill all the blanks/እባክዎ ሁሉንም ይሙሉ. ';
		}else if((empty($_POST['repeatpassword']))){
			$error[] = 'Please fill all the blanks/እባክዎ ሁሉንም ይሙሉ. ';
		}else
		{
			$oldpassword = $connect->real_escape_string($_POST['oldpassword']);
			$newpassword = $connect->real_escape_string($_POST['newpassword']);
            $hashed_newpassword = crypt($newpassword);
			$repeatpassword = $connect->real_escape_string($_POST['repeatpassword']);           
            
			$result=$connect->query("SELECT * FROM user WHERE uID = '$user_id' ") or die (mysqli_error());
			$row=mysqli_fetch_array($result);
			$original_password = $row['uPassword'];
                                 
            if (crypt($oldpassword, $original_password) != $original_password) {
				$error[] = 'The Old Password you entered is incorrect/የድሮው ምስጢር ቃል የተሳሳተ ነው. ';
			}
			if ($newpassword != $repeatpassword){
				$error[] = 'The New Passwords you entered do not match/ድጋሚ ያስገቡት ና አዲሱ ምስጢር ቃል ተመሳሳይ አይደለም. ';
			}
		}
		if(empty($error)){
			$query = "UPDATE user SET uPassword= '$hashed_newpassword' WHERE uID = '$user_id' ";
			$result2=$connect->query($query) or die(mysqli_error());
			if($result2){
				header('Location: ../main/prompt.php?type=5');
			}
		}
		else{
			foreach($error as $key=>$values){
				$error_message.="$values";
				$error_message.="<br/>";
			}
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Password Change | የይለፍ ቃል </title>
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">

			<?php headerAndSearchCode(""); ?>
			<div id="main_section">
				<div id="passChangecontainer">
					<div class="headerEn">Change your password</div>
					<div class="headerAm">የምስጢር ቃል ለመቀየር</div>
					<div id="errorPasschan" style="color: red; padding-bottom: 10px;">
						<?php echo $error_message; ?>
					</div>
					<form id="generalform" class="container" method="post"
						action="main/passChange.php">
						<table>
							<tr>
								<div class="field">
									<td><div class="oldPwrdEn">Old Password:</div>
										<div class="oldPwrdAm">የቀድሞ የሚስጥር ቃል</div>
									</td>
									<td><input type="password" class="input" id="username"
										name="oldpassword" maxlength="80" />
									</td>
								</div>
							</tr>
							<tr>
								<td></td>
								<td>
								<p class="hint">
									20 characters maximum<br>(letters and numbers only)
								</p>
								</td>
							</tr>
							<tr>
								<div class="field">
									<td>
										<div class="newPwrdEn">New Password:</div>
										<div class="newPwrdAm">አዲስ የሚስጥር ቃል</div>
									</td>
								
								
								<td><input type="password" class="input" id="username"
									name="newpassword" maxlength="80" />
								</td>
								</div>
							</tr>
							<tr>
								<td></td>
								<td colspan="2">
									<p class="hint">
										20 characters maximum<br>(letters and numbers only)
									</p>
								</td>
							</tr>
							<tr>
								<div class="field">

									<td>
										<div class="repeatPwrdEn">Repeat Password:</div>
										<div class="repeatPwrdAm">አዲሱን የሚስጥር ቃል በድጋሚ</div>
									</td>
									<td><input type="password" class="input" id="email"
										name="repeatpassword" maxlength="80" /></td>
								</div>
							</tr>
							
							<tr>
								<div class="field">
										<td></td>
										<td><input type="submit" name="submit" id="submit" class="button"
											value="Submit" /></td>
										
									</div>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>