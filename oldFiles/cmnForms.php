<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Katomer ካቶመር</title>
<script type='text/javascript'
	src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
<script type="text/javascript">
function swap(){
	$(document).ready(function (){
		$('#showRegister').click(function () {
			$('#register').show();
			$('#contact').hide();
			$('#login').hide();			
		});

		$('#showContact').click(function () {
			$('#register').hide();
			$('#contact').show();
			$('#login').hide();			
		});
		
		$('#showLogin').click(function () {
			$('#register').hide();
			$('#contact').hide();
			$('#login').show();			
		});
	}); 
}
</script>
<style>
h2 {
	color: white;
	background-color: #378de5;
}

#element_1,#password,select {
	height: 35px;
	font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic,
		"AppleGothic", sans-serif;
	font-size: 20px;
}

.lableTd {
	text-align: right;
}

.fieldbutton {
	margin-left: 40%;
}

#register,#contact,#login {
	-webkit-border-top-left-radius: 6px;
	-moz-border-radius-topleft: 6px;
	border-top-left-radius: 6px;
	-webkit-border-top-right-radius: 6px;
	-moz-border-radius-topright: 6px;
	border-top-right-radius: 6px;
	-webkit-border-bottom-right-radius: 6px;
	-moz-border-radius-bottomright: 6px;
	border-bottom-right-radius: 6px;
	-webkit-border-bottom-left-radius: 6px;
	-moz-border-radius-bottomleft: 6px;
	border-bottom-left-radius: 6px;
	font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic,
		"AppleGothic", sans-serif;
}

a {
	text-decoration: none;
	font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic,
		"AppleGothic", sans-serif;
}

.goButton {
	-moz-box-shadow: inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow: inset 0px 1px 0px 0px #bbdaf7;
	box-shadow: inset 0px 1px 0px 0px #bbdaf7;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #79bbff
		), color-stop(1, #378de5));
	background: -moz-linear-gradient(center top, #79bbff 5%, #378de5 100%);
	/* filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5'); */
	background-color: #79bbff;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	border-radius: 6px;
	border: 1px solid #84bbf3;
	display: inline-block;
	color: #ffffff;
	font-family: Arial, Helvetica, Geneva, sans-serif;
	font-size: 20px;
	padding: 4px 9px;
	text-decoration: none;
	text-shadow: 1px 1px 0px #528ecc;
	box-shadow: inset 0px 1px 0px 0px #bbdaf7;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #79bbff
		), color-stop(1, #378de5));
	background: -moz-linear-gradient(center top, #79bbff 5%, #378de5 100%);
	/* filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#79bbff', endColorstr='#378de5'); */
	background-color: #79bbff;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	border-radius: 6px;
	border: 1px solid #84bbf3;
	display: inline-block;
	color: #ffffff;
	font-family: Arial, Helvetica, Geneva, sans-serif;
	font-size: 20px;
	padding: 4px 9px;
	text-decoration: none;
}

.stopButton {
	-moz-box-shadow: inset 0px 1px 0px 0px #f29c93;
	-webkit-box-shadow: inset 0px 1px 0px 0px #f29c93;
	box-shadow: inset 0px 1px 0px 0px #f29c93;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #fe1a00
		), color-stop(1, #ce0100));
	background: -moz-linear-gradient(center top, #fe1a00 5%, #ce0100 100%);
	/* filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fe1a00', endColorstr='#ce0100'); */
	background-color: #fe1a00;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	border-radius: 6px;
	border: 1px solid #d83526;
	color: #ffffff;
	font-family: Arial, Helvetica, Geneva, sans-serif;
	font-size: 12px;
	font-weight: bold;
	padding: 4px 9px;
	width: 50px;
	float: left;
	margin-left: 5px;
	margin-right: 5px;
	text-decoration: none;
	text-shadow: 1px 1px 0px #b23e35;
}



#showRegister,#showContact,#showLogin {
	display: inline;
}
</style>
</head>
<body>
	<div id="whole">
		<div id="wrapper">

			<div style="background-color:;" id="main_section">
				<div
					style="background-color:; width: 80%; margin-left: 10%; margin-right: 10%;"
					id="mainColumn">
					<div id="topRightLinks">
						<div id="showLogin">
							<a href="javascript:void(0)" onclick="swap()"> Login 
						
						</div>
						<div id="showRegister">
							<a href="javascript:void(0)" onclick="swap()"> Register 
						
						</div>
						<div id="showContact">
							<a href="javascript:void(0)" onclick="swap()"> Contact 
						
						</div>
					</div>
					<form id="form" class="" method="post" action="../index.php">
						<div
							style="display: none; margin: 0 5% 0 5%; background-color: #dfefff;"
							id="register">
							<h2>
								Register<br>ይመዝገቡ
							</h2>
							<table>
								<tr>
									<td class="lableTd">Username<br>የመጠቀሚያ ስም
									</td>
									<td><input id="element_1" name="element_1"
										class="element text medium" type="text" maxlength="255"
										value="" /></td>
									<td>User name must be provided<br>የመጠቀሚያ ስም መሞላት አለበት
									</td>
								</tr>
								<tr>
									<td class="lableTd">First Name<br>ስም
									</td>
									<td><input id="element_1" name="element_1"
										class="element text medium" type="text" maxlength="255"
										value="" /></td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Last Name<br>የአባት ስም
									</td>
									<td><input id="element_1" name="element_1"
										class="element text medium" type="text" maxlength="255"
										value="" /></td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Email<br>ኢሜይል
									</td>
									<td><input id="element_1" name="element_1"
										class="element text medium" type="text" maxlength="255"
										value="" /></td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Phone<br>ስልክ
									</td>
									<td><input id="element_1" name="element_1"
										class="element text medium" type="text" maxlength="255"
										value="" /></td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Region/City<br>ክልል/ከተማ
									</td>
									<td><select name="Region" id="city">
											<option value="000" selected>[Choose region/city አድራሻ ይምረጡ]</option>
											<option value="Addis Ababa">Addis Ababa*/አዲስ አበባ</option>
											<option value="Dire Dawa">Dire Dawa*/ድሬ ዳዋ</option>
											<option value="Adama">Adama*/አዳማ</option>
											<option value="Bahir Dar">Bahir Dar*/ባሕር ዳር</option>
											<option value="Mekele">Mekele*/መቀሌ</option>
											<option value="Awassa">Awassa*/አዋሳ</option>
											<option value="Asaita">Afar-Asaita/አሳይታ</option>
											<option value="Debre Berhan">Amhara-Debre Brhane/ደብረ ብርሃን</option>
											<option value="Dessie">Amhara-Dessie/ደሴ</option>
											<option value="Gondar">Amhara-Gondar/ጎንደር</option>
											<option value="Gambela">Gambela-Gambela/ጋንቤላ</option>
											<option value="Harar">Harari-Harar/ሐረር</option>
											<option value="Asella">Oromia-Asella/አሰላ</option>
											<option value="Debre Zeit">Oromia-Debre Zeit/ደብረ ዘይት</option>
											<option value="Jimma">Oromia-Jimma/ጅማ</option>
											<option value="Nekemte">Oromia-Nekemte/ነቀምት</option>
											<option value="Shashemene">Oromia-Shashemene/ሻሸመኔ</option>
											<option value="Arba Minch">SNNP-Arba Minch/አርባ ምንጭ</option>
											<option value="Dila">SNNP-Dila/ዲላ</option>
											<option value="Hosaena">SNNP-Hosaena/ሆሳና</option>
											<option value="Sodo">SNNP-Sodo/ሶዶ</option>
											<option value="Somali-Jijiga">Somali-Jijiga/ጅጅጋ</option>
											<option value="Axum">Tigray-Axum/አክሱም</option>
											<option value="Other">Other/ሌሎች</option>
									</select></td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Password <br>የምስጢር ቃል
									</td>
									<td><input type="password" class="input" id="password"
										name="password" maxlength="20" /></td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Password Again<br>የምስጢር በድጋሚ
									</td>
									<td><input type="password" class="input" id="password"
										name="password2" maxlength="20" /></td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">I have read and agree to the<br>የሚቀጥለውን
										አንብቤ ተስማምቻለሁ
									</td>
									<td><input id="element_5_1" name="element_5_1"
										class="element checkbox" type="checkbox" value="1" />
									</td>
									<td>ERROR</td>
								</tr>
							</table>
							<div class="fieldbutton">
								<input type="submit" name="submit" id="submit" class="goButton"
									value="Register ይመዝገቡ" />
							</div>
						</div>
						<div
							style="display: none; margin: 0 5% 0 5%; background-color: #dfefff;"
							id="contact">
							<h2>
								Contact<br>ሊጠይቁን ይፈልጋሉ?
							</h2>
							<table>
								<tr>
									<td class="lableTd">Name<br>ስም
									</td>
									<td><input id="element_1" name="element_1"
										class="element text medium" type="text" maxlength="255"
										value="" /></td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Email<br>ኢሜይል
									</td>
									<td><input id="element_1" name="element_1"
										class="element text medium" type="text" maxlength="255"
										value="" /></td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Private<br>በግል
									</td>
									<td><input id="element_5_1" name="element_5_1"
										class="element checkbox" type="checkbox" value="1" />
									</td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Company<br>በድርጅት
									</td>
									<td><input id="element_5_1" name="element_5_1"
										class="element checkbox" type="checkbox" value="1" />
									</td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Contact Purpose<br>ሊያናግሩን የፈለጉበት ምክንያት
									</td>
									<td><select name="contactpurpose" id="contactpurpose">
											<option value="000">[choose your puropse/ሊያናግሩነ የፈለጉበት ምክንያት
												ይምረጡ]</ option>
											
											<option value="I can not find my ad">I can not find my Ad
												/ያስተዋወኩት ንብረት ላገኘው አልቻልኩም</ option>
											
											<option value="My ad is not approved">My Ad is not
												approved/ያስተዋወኩት ንብረት አልጸደቀም </ option>
											
											<option value="My ad is still pending">My Ad is still
												pending/ያስተዋወኩት ንብረት አክቲቭ አልሆነም</ option>
											
											<option value="Technical problems in ad">Technical problems
												in Ad/የቴክኒክ ችግር</ option>
											
											<option value="Problems with picture">Problems with
												picture/ምስል በደንብ አይታይም</ option>
											
											<option value="I want to report suspected fraud">I want to
												report suspected fraud/የማጭበርበር ድርጊት ሪፖርት ማረግ ፈልጋለው </
												option>
											
											<option value="Feedback and suggestions for katomer">
												Feedback and suggestions for katomer/ለካቶመር አስተያየት መስጠት
												ፈልጋለው</ option>
											
											<option value="General">General comment/አጠቃላይ አስተያየት</option>
									</select>
									</td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Message<br>መልዕክት
									</td>
									<td><textarea name="description" id="description" rows="8"
											value="Enter your message here..."></textarea>
									</td>
									<td>ERROR</td>
								</tr>

							</table>
							<div class="fieldbutton">
								<input type="submit" name="submit" id="submit" class="goButton"
									value="Send ይላኩ" />
							</div>
						</div>
						<div
							style="display: none; width: 50%; margin: 0 25% 0 25%; background-color: #dfefff;"
							id="login">
							<h2>
								Log In <br>ይግቡ
							</h2>
							<table>
								<tr>
									<td class="lableTd">Email<br>ኢሜይል
									</td>
									<td><input id="element_1" name="element_1"
										class="element text medium" type="text" maxlength="255"
										value="" /></td>
									<td>ERROR</td>
								</tr>
								<tr>
									<td class="lableTd">Password <br>የምስጢር ቃል
									</td>
									<td><input type="password" class="input" id="password"
										name="password" maxlength="20" /></td>
									<td>ERROR</td>
								</tr>
							</table>
							<div class="fieldbutton">
								<input type="submit" name="submit" id="submit" class="goButton"
									value="Log In ይግቡ" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>

</body>
</html>
