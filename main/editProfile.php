<?php

session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/inc/headerSearchAndFooter.php';
require_once $documnetRootPath.'/inc/item.inc.php';

if(!isset($_SESSION['uID']))
{
	ob_start();
	header('Location:../index.php');
	ob_end_flash();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile | የግል ገጽ</title>
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); ?>
			<div id="main_section">
				<div id="mainColumn">
					<div class="LeftNav" id="leftnav">
						<div id="c_ln" class="c_ln t_lnkpi">
							<ul class="c_n t_hovl ">
								<li class="active"><a class="selected" id="Overview" href="#"
									onclick="showSection(999)">Overview
										<div id="tabsAmharic">አጠቃላይ ኢንፎርሜሽን</div>
								</a></li>
								<li><a id="EditProf" href="#" onclick="showSection(100)"> Edit e-mail
										<div id="tabsAmharic">ኢሜይል ለመቀየር</div>
								</a></li>
								<li><a id="EditProf" href="#" onclick="showSection(200);"> Edit
										Password
										<div id="tabsAmharic">የሚስጥር ቃል ለመቀየር</div>
								</a>
								</li>
								<li><a id="EditProf" href="#" onclick="showSection(300)">Edit
										Personal info
										<div id="tabsAmharic">የግል መረጃ ለመቀየር</div>
								</a></li>
								<li><a id="EditProf" href="#" onclick="showSection(400)">Edit
										Contact method
										<div id="tabsAmharic">የመገኛ መንገድ ለመቀየር</div>
								</a></li>
								<li><a id="EditProf" href="#" onclick="showSection(500)">Close
										account
										<div id="tabsAmharic">የካቶመር አካውንት ለመዝጋት</div>
								</a></li>
								</li>
							</ul>
						</div>
					</div>
					<div class="module">
						<div class="overview">
							<div class="headerEn">Account Summary</div>
							<div class="headerAm">የካቶመር መረጃዎ በጥቅሉ</div>
							<div id="errorPasschan">
							<?php
							if(isset($_GET['error']))
							{
								$error_message = $_GET['error'];

								if($error_message=="")
								{
									echo "style=\"color:#4F8A10;background-color:#DFF2BF;\">";
									echo "Setting sucessfully updated/የካቶመር መረጃዎ በትክክል ተቀይሯል";
								}
								else
								{
									echo "style=\"color:#D8000C; background-color:#FFBABA;\">";
									echo $error_message;
								}
							}							
							if(isset($_SESSION['uID']))
							{
								$id = $_SESSION['uID'];
								$connect = DatabaseClass::getInstance()->getConnection();
								$result = $connect->query("SELECT * FROM user WHERE uId = $id Limit 1");
								$row = $result->fetch_array();
							}
							?></div>
							<div class="desc" id="idOverview">
								<table>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn">userName</div>
											<div class="userNameAm">መጠቀምያ ስም</div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['userName'];
										}?></td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn">Name</div>
											<div class="NameAm">ስም</div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['uFirstName']." ";echo $row['uLastName'];
										}?></td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn">e-mail</div>
											<div class="NameAm">ኢሜይል</div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['uEmail'];
										}?></td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn">Phone</div>
											<div class="userNameAm">ስልክ</div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['uPhone'];
										}?></td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn">Address</div>
											<div class="userNameAm">አድራሻ</div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['uAddress'];
										}?></td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn">Contact Method</div>
											<div class="userNameAm">የመገኛ መንገድ</div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['uContactMethod'];
										}?>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div style="display: none;" class="eName" id="EditEmail">
							<div class="headerEn">Change your email</div>
							<div class="headerAm">የኢሜይል አድራሻ ለመቀየር</div>
							<form id="generalform" class="container" method="post"
								action="../helper/updateProfile.php">
								<table>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn">e-mail</div>
											<div class="NameAm">የሚጠቀሙበት ኢሜይል አድራሻ</div>
										</td>
										<td class="moduleInput"><input class="userInfo" id="email"
											disabled="disabled" name="email"
											value="<?php if(isset($_SESSION['uID'])){echo $row['uEmail'];}?>"
											type="text">
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn">New e-mail</div>
											<div class="NameAm">አዲሱ ኢሜይል አድራሻ</div>
										</td>
										<td class="moduleInput"><input class="userInfo" id="newemail"
											name="newemail"
											value="<?php if(isset($_SESSION['uID'])){echo $row['uEmail'];}?>"
											type="text">
										</td>
									</tr>
									<tr>
										<td></td>
										<td class="moduleInputButtons">
											<div class="inputButton">
												<input type="submit" name="submit1" id="saveSubmit"
													class="saveSubmit" value="Save" /> <input type="submit"
													name="submit" id="closeSubmit" class="closeSubmit"
													value="Close" />
											</div>
										</td>
									</tr>
								</table>
							</form>
						</div>
						<div style="display: none;" class="ePass" id="EditPass">
							<div class="headerEn">Change your password</div>
							<div class="headerAm">የምስጢር ቃል ለመቀየር</div>
							<div id="errorPasschan" style="color: red; padding-bottom: 10px;"></div>
							<form id="generalform" class="container" method="post"
								action="../helper/updateProfile.php">
								<table>
									<tr>
										<td class="moduleLabel">
											<div class="oldPwrdEn">Current Password</div>
											<div class="oldPwrdAm">የሚጠቀሙበት የሚስጥር ቃል</div>
										</td>
										<td class="moduleInput"><input type="password"
											class="userInfo" id="username" name="oldpassword"
											maxlength="80" />
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="newPwrdEn">New Password</div>
											<div class="newPwrdAm">አዲሱ የሚስጥር ቃል</div>
										</td>
										<td class="moduleInput"><input type="password"
											class="userInfo" id="username" name="newpassword"
											maxlength="80" />
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="repeatPwrdEn">Repeat Password</div>
											<div class="repeatPwrdAm">አዲሱ የሚስጥር ቃል በድጋሚ</div>
										</td>
										<td class="moduleInput"><input type="password"
											class="userInfo" id="email" name="repeatpassword"
											maxlength="80" /></td>
									</tr>
									<tr>
										<td></td>
										<td class="moduleInputButtons">
											<div class="inputButton">
												<input type="submit" name="submit2" id="saveSubmit"
													class="saveSubmit" value="Save" /> <input type="submit"
													name="submit" id="closeSubmit" class="closeSubmit"
													value="Close" />
											</div>
											</div>
										</td>
									</tr>
								</table>
							</form>
						</div>
						<div style="display: none;" class="ePInfo" id="EditPerInfo">
							<div class="headerEn">Change Personal Information</div>
							<div class="headerAm">የግል መረጃ ለመቀየር</div>
							<div id="errorPasschan" style="color: red; padding-bottom: 10px;"></div>
							<form id="generalform" class="container" method="post"
								action="../helper/updateProfile.php">
								<table>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn">Name</div>
											<div class="NameAm">ስም</div>
										</td>
										<td class="moduleInput"><input class="userInfo" id="Name"
											name="name"
											value="<?php if(isset($_SESSION['uID'])){echo $row['uFirstName']." ";echo $row['uLastName'];}?>">
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn">userName</div>
											<div class="userNameAm">መጠቀምያ ስም</div>
										</td>
										<td class="moduleInput"><input class="userInfo" id="userName"
											name="userName"
											value="<?php if(isset($_SESSION['uID'])){echo $row['userName'];}?>">
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn">Phone</div>
											<div class="userNameAm">ስልክ</div>
										</td>
										<td class="moduleInput"><input class="userInfo" id="phone"
											name="phone"
											value="<?php if(isset($_SESSION['uID'])){echo $row['uPhone'];}?>">
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn">Address</div>
											<div class="userNameAm">አድራሻ</div>
										</td>
										<td class="moduleInput"><input class="userInfo" id="address"
											name="address"
											value="<?php if(isset($_SESSION['uID'])){echo $row['uAddress'];}?>">
										</td>
									</tr>

									<tr>
										<td></td>
										<td class="moduleInputButtons">
											<div class="inputButton">
												<input type="submit" name="submit3" id="saveSubmit"
													class="saveSubmit" value="Save" /> <input type="submit"
													name="submit" id="closeSubmit" class="closeSubmit"
													value="Close" />
											</div>
											</div>
										</td>
									</tr>

								</table>
							</form>
						</div>
						<div style="display: none;" class="eCMthd" id="EditContMthd">
							<div class="headerEn">Change contact method</div>
							<div class="headerAm">የመገኛ መንገድ ለመቀየር</div>
							<div id="errorPasschan" style="color: red; padding-bottom: 10px;"></div>
							<form id="generalform" class="container" method="post"
								action="../helper/updateProfile.php">
								<table>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn">email</div>
											<div class="NameAm">በኢሜይል</div>
										</td>
										<td class="moduleInput"><input id="Name" name="contactemail"
											type="checkbox" value="yes"
											<?php if(isset($_SESSION['uID'])){echo ((strtolower($row['uContactMethod'])=="email" || $row['uContactMethod']=="Phone and Email")? 'checked' : '');}?>>
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn">Phone</div>
											<div class="NameAm">በስልክ</div>
										</td>
										<td class="moduleInput"><input id="phone" name="contactphone"
											type="checkbox" value="yes"
											<?php if(isset($_SESSION['uID'])){echo ((strtolower($row['uContactMethod'])=="phone" || $row['uContactMethod']=="Phone and Email") ? 'checked' : '');}?>>
										</td>
									</tr>
									<tr>
										<td></td>
										<td class="moduleInputButtons">
											<div class="inputButton">
												<input type="submit" name="submit4" id="saveSubmit"
													class="saveSubmit" value="Save" /> <input type="submit"
													name="submit" id="closeSubmit" class="closeSubmit"
													value="Close" />
											</div>
											</div>
										</td>
									</tr>

								</table>
							</form>
						</div>
						<div style="display: none;" class="eCloseAcc" id="CloseAcc">
							<div class="headerEn1">
								We are sorry to see you go. By closing you account you will be
								automatically signed out and all your previous post will be
								removed from our database. <br> <strong
									style="font-weight: bold;">Are you sure you want to close your
									account?</strong>
							</div>
							<br>
							<div class="headerAm1">
								ከእኛ ጋር ባለመቆየትዎ እናዝናለን። ሆኖም ግን ይህንን ሲያደርጉ ወደ ካቶመር ፣ በአዲስ አካውንት
								በስተቀር መግባት አይችሉም።በተጨማሪም በስምዎ ያስገቧቸው ንብረቶችም ከእኛ መዝገብ/ዳታቤዝ
								/ይደመሰሳሉ። <br> <strong style="font-weight: bold;">በርግጥ የካቶመር
									አካውንትዎን መዝጋት ይፈልጋሉ?</strong>
							</div>
							<div id="errorPasschan" style="color: red; padding-bottom: 10px;"></div>
							<form id="generalform" class="container" method="post"
								action="../helper/updateProfile.php">

								<table>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn">Yes</div>
											<div class="NameAm">አዎ ፈልጋለው</div>
										</td>
										<td class="moduleInput"><input id="Name" name="closeAcc"
											value="" type="checkbox">
										</td>
									
									
									<tr>
										<td></td>
										<td class="moduleInputButtons">
											<div class="inputButton">
												<input type="submit" name="submit5" id="saveSubmit"
													class="saveSubmit" value="Save" /> <input type="submit"
													name="submit" id="closeSubmit" class="closeSubmit"
													value="Close" />
											</div>
											</div>
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="push"></div>
		</div>
		</div>
		<?php footerCode(); ?>

</body>
</html>


