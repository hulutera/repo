<?php

session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
global $lang, $lang_url, $str_url;

if(!isset($_SESSION['uID']))
{
	ob_start();
	header('Location:../index.php' . $$lang_url);
	ob_end_flash();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $lang['profile edit']; ?></title>
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
									onclick="showSection(999)"> <?php echo $lang['profile'] ?>
								</a></li>
								<li><a id="EditProf" href="#" onclick="showSection(100)"> 
								      <?php echo $lang['Email']; ?>
								</a></li>
								<li><a id="EditProf" href="#" onclick="showSection(200);"> 
								      <?php echo $lang['password']; ?>
								</a>
								</li>
								<li><a id="EditProf" href="#" onclick="showSection(300)">
								      <?php echo $lang['personal info']; ?>
								</a></li>
								<li><a id="EditProf" href="#" onclick="showSection(400)">
									  <?php echo $lang['contact method'];?>
								</a></li>
								<li><a id="EditProf" href="#" onclick="showSection(500)">
								 	  <?php echo $lang['close account'];?>  
								</a></li>
								</li>
							</ul>
						</div>
					</div>
					<div class="module">
						<div class="overview">
							<div class="headerEn"><?php echo $lang['acc summary'];?></div>
							<div id="errorPasschan">
							<?php
							if(isset($_GET['error']))
							{
								$error_message = $_GET['error'];

								if($error_message=="")
								{
									echo "style=\"color:#4F8A10;background-color:#DFF2BF;\">";
									echo $lang['profile change succ'];
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
											<div class="userNameEn"><?php echo $lang['Username'];?></div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['userName'];
										}?></td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn"><?php echo $lang['Full Name'];?></div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['uFirstName']." ";echo $row['uLastName'];
										}?></td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn"><?php echo $lang['Email'];?></div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['uEmail'];
										}?></td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn"><?php echo $lang['Phone'];?></div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['uPhone'];
										}?></td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn"><?php echo $lang['address'];?></div>
										</td>
										<td class="moduleInput"><?php if(isset($_SESSION['uID'])){
											echo $row['uAddress'];
										}?></td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn"><?php echo $lang['contact method'];?></div>
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
							<div class="headerEn"><?php echo $lang['change your email'];?></div>
							<form id="generalform" class="container" method="post"
								action="<?php echo '../includes/updateProfile.php' . $lang_url;?>">
								<table>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn"><?php echo $lang['Email'];?></div>
										</td>
										<td class="moduleInput"><input class="userInfo" id="email"
											disabled="disabled" name="email"
											value="<?php if(isset($_SESSION['uID'])){echo $row['uEmail'];}?>"
											type="text">
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn"><?php echo $lang['new e-mail'];?></div>
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
													class="saveSubmit" value="<?php echo $lang['save'];?>" /> <input type="submit"
													name="submit" id="closeSubmit" class="closeSubmit"
													value="<?php echo $lang['close'];?>" />
											</div>
										</td>
									</tr>
								</table>
							</form>
						</div>
						<div style="display: none;" class="ePass" id="EditPass">
							<div class="headerEn"><?php echo $lang['change password'];?></div>
							<div id="errorPasschan" style="color: red; padding-bottom: 10px;"></div>
							<form id="generalform" class="container" method="post"
								action="<?php echo '../includes/updateProfile.php' . $lang_url;?>">
								<table>
									<tr>
										<td class="moduleLabel">
											<div class="oldPwrdEn"><?php echo $lang['current password'];?></div>
										</td>
										<td class="moduleInput"><input type="password"
											class="userInfo" id="username" name="oldpassword"
											maxlength="80" />
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="newPwrdEn"><?php echo $lang['new password'];?></div>
										</td>
										<td class="moduleInput"><input type="password"
											class="userInfo" id="username" name="newpassword"
											maxlength="80" />
										</td>
									</tr>
									<tr>
										<td class="moduleLabel"> 
											<div class="repeatPwrdEn"><?php echo $lang['repeat new password'];?></div>
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
													class="saveSubmit" value="<?php echo $lang['save'];?>" /> <input type="submit"
													name="submit" id="closeSubmit" class="closeSubmit"
													value="<?php echo $lang['close'];?>" />
											</div>
											</div                                                                                                                                                                 >
										</td>
									</tr>
								</table>
							</form>
						</div>
						<div style="display: none;" class="ePInfo" id="EditPerInfo">
							<div class="headerEn"><?php echo $lang['personal info'];?></div>
							<div id="errorPasschan" style="color: red; padding-bottom: 10px;"></div>
							<form id="generalform" class="container" method="post"
								action="<?php echo '../includes/updateProfile.php' . $lang_url;?>">
								<table>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn"><?php echo $lang['Full Name'];?></div>
										</td>
										<td class="moduleInput"><input class="userInfo" id="Name"
											name="name"
											value="<?php if(isset($_SESSION['uID'])){echo $row['uFirstName']." ";echo $row['uLastName'];}?>">
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn"><?php echo $lang['userName'];?></div>
										</td>
										<td class="moduleInput"><input class="userInfo" id="userName"
											name="userName"
											value="<?php if(isset($_SESSION['uID'])){echo $row['userName'];}?>">
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn"><?php echo $lang['Phone'];?></div>
										</td>
										<td class="moduleInput"><input class="userInfo" id="phone"
											name="phone"
											value="<?php if(isset($_SESSION['uID'])){echo $row['uPhone'];}?>">
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="userNameEn"><?php echo $lang['address'];?></div>
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
													class="saveSubmit" value="<?php echo $lang['save'];?>" /> <input type="submit"
													name="submit" id="closeSubmit" class="closeSubmit"
													value="<?php echo $lang['close'];?>" />
											</div>
											</div>
										</td>
									</tr>

								</table>
							</form>
						</div>
						<div style="display: none;" class="eCMthd" id="EditContMthd"> 
							<div class="headerEn"><?php echo $lang['change contact method'];?></div>
							<div id="errorPasschan" style="color: red; padding-bottom: 10px;"></div>
							<form id="generalform" class="container" method="post"
								action="<?php echo '../includes/updateProfile.php' . $lang_url;?>">
								<table>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn"><?php echo $lang['Email'];?></div>
										</td>
										<td class="moduleInput"><input id="Name" name="contactemail"
											type="checkbox" value="<?php echo $lang['yes'];?>"
											<?php if(isset($_SESSION['uID'])){echo ((strtolower($row['uContactMethod'])=="email" || $row['uContactMethod']=="Phone and Email")? 'checked' : '');}?>>
										</td>
									</tr>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn"><?php echo $lang['Phone'];?></div>
										</td>
										<td class="moduleInput"><input id="phone" name="contactphone"
											type="checkbox" value="<?php echo $lang['yes'];?>"
											<?php if(isset($_SESSION['uID'])){echo ((strtolower($row['uContactMethod'])=="phone" || $row['uContactMethod']=="Phone and Email") ? 'checked' : '');}?>>
										</td>
									</tr>
									<tr>
										<td></td>
										<td class="moduleInputButtons">
											<div class="inputButton">
												<input type="submit" name="submit4" id="saveSubmit"
													class="saveSubmit" value="<?php echo $lang['save'];?>" /> <input type="submit"
													name="submit" id="closeSubmit" class="closeSubmit"
													value="<?php echo $lang['close'];?>" />
											</div>
											</div>
										</td>
									</tr>

								</table>
							</form>
						</div>
						<div style="display: none;" class="eCloseAcc" id="CloseAcc">
							<div class="headerEn1"> <?php echo $lang['close acc msg part1'];?>
								<br> <strong
									style="font-weight: bold;"><?php echo $lang['close acc msg part2'];?></strong>
							</div>
							<div id="errorPasschan" style="color: red; padding-bottom: 10px;"></div>
							<form id="generalform" class="container" method="post"
								action="<?php echo '../includes/updateProfile.php' . $lang_url;?>">

								<table>
									<tr>
										<td class="moduleLabel">
											<div class="NameEn"><?php echo $lang['yes'];?></div>
										</td>
										<td class="moduleInput"><input id="Name" name="closeAcc"
											value="" type="checkbox">
										</td>
									
									
									<tr>
										<td></td>
										<td class="moduleInputButtons">
											<div class="inputButton">
												<input type="submit" name="submit5" id="saveSubmit"
													class="saveSubmit" value="<?php echo $lang['save'];?>" /> <input type="submit"
													name="submit" id="closeSubmit" class="closeSubmit"
													value="<?php echo $lang['close'];?>" />
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


