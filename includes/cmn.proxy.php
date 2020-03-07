<?php

if(isset($_GET['lan'])) { 
	$lang_url = "?&lan=" . $_GET['lan'];		
} else{
	$lang_url = "";	
}

function contact()
{
	global $connect, $lang, $lang_url;
	$error_message="";	
	if(isset($_POST['submit']))
	{
		$error = array();
			
		/*check name*/
		if(empty($_POST['name'])){
			$error[] = $lang['Please enter your name'];
		}else if(ctype_alpha($_POST['name'])){
			$name = $_POST['name'];
		}else{
			$error[] = $lang['Enter only your first name'];
		}

		//email
		if(empty($_POST['email'])){
			$error[] = $lang['Please enter your email'];
		}else if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$email = $connect->real_escape_string($_POST['email']);
		}else{
			$error[] = $lang['Your e-mail address is invalid'];
		}

		/*check message*/
		if(!empty($_POST['description'])){
			$description = $connect->real_escape_string($_POST['description']);
		}
		/*check subject*/
		if(empty($_POST['subject'])){
			$error[] = $lang['Please enter a subject'];
		}else
		{
			$subject=$connect->real_escape_string($_POST['subject']);
		}
		/*check purpose*/
		if($_POST['contactpurpose']=="000"){
			$error[] = $lang['Please state choose your purpose'];
		}else{
			$contactpurpose=$connect->real_escape_string($_POST['contactpurpose']);
		}
		/*check company*/
		if(!empty($_POST['company'])){
			$company = $connect->real_escape_string($_POST['company']);
		}

		if(empty($error))
		{
			$result = $connect->query("INSERT INTO contactus (name, company, email, subject ,purpose, description, messageStatus)
					VALUES ('$name','$company','$email','$subject','$contactpurpose','$description','unread')")
					or die (mysqli_error());
			if(!$result)
			{
				die('Could not insert into database: '.mysqli_error());
			}
			else
			{
				$message= $lang ['This is a confirmation mail from www.hulutera.com. We appreciate you for taking time to contact us.\n\n Sincerely,hulutera Admin\n\n'];
				$isMailDelivered = mail($email, 'Contact confirmation', $message, 'From:noreply@hulutera.com');

				if(!$isMailDelivered)
				{
					die ("Sending Email Failed. Please Contact Site Admin!");
				}
				else
				{
					redirect("../includes/prompt.php?type=7");
				}
			}
		}
		else
		{
			$endl = '<br>';
			$error_message='<div class="error">';
			foreach($error as $key=>$values)
			{
				$error_message.="$values";
				$error_message.=$endl;
			}
			$error_message.="</div>";
		}
	}

	$nameValue = (isset($_POST['name'])) ? $_POST['name'] : '';
	$companyValue = (isset($_POST['company'])) ? $_POST['company'] : '';
	$emailValue = (isset($_POST['email'])) ? $_POST['email'] : '';
	$subjectValue = (isset($_POST['subject'])) ? $_POST['subject'] : '';
	$descriptionValue = (isset($_POST['description'])) ? $_POST['description'] : '';
	
	if($lang_url !== NULL) {
		$str_url = str_replace("?", "", $lang_url);
	}
	echo '<div id="mainColumn">';
	echo '<div id="contactUs">';
	echo '<form class="container" method="POST" action="../includes/template.proxy.php?type=contact' . $str_url . '">';
	echo '<br>';
	echo  $error_message;
	echo '<table>';
	echo '<tr>';
	echo '<td  style="padding-top: 10%;float: right;padding-right: 8%;"><div>'.$lang['Your name'].'</div></td>';
	echo '<td><input type="text" class="input" id="name" name="name" maxlength="80" value="'.$nameValue.'"/></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td  style="padding-top: 10%;float: right;padding-right: 8%;"><div>'.$lang['Email'].'</div></td>';
	echo '<td><input type="text" style="text-transform:lowercase"class="input" id="email" name="email" maxlength="80" value="'.$emailValue.'"/></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td style="padding-top: 10%;float: right;padding-right: 8%;"><div>'.$lang['Company'].'</div></td>';
	echo '<td><input type="text" class="input" id="company" name="company" maxlength="80" value="'.$companyValue.'"/></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td style="padding-top: 10%;float: right;padding-right: 8%;"><div>'.$lang['Subject'].'</div></td>';
	echo '<td><input type="text" class="input" id="subject" name="subject" maxlength="80" value="'.$subjectValue.'"/></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td style="padding-top: 10%;float: right;padding-right: 8%;"><div>'.$lang['Contact Purpose'].'</div></td>';
	echo '<td>';
	echo '<select name="contactpurpose" id="contactpurpose">';
	echo '<option value="000"> ' . $lang['choose your puropse'] . '</ option>';
	echo '<option value="I can not find my Ad">' . $lang['I can not find my Ad'] . '</ option>';
	echo '<option value="My Ad is not approved">' . $lang['My Ad is not approved'] . '</ option>';
	echo '<option value="My Ad is still pending">' . $lang['My Ad is still pending'] . ' </ option>';
	echo '<option value="Technical problems in Ad"> ' . $lang['Technical problems in Ad'] . '</ option>';
	echo '<option value="Problems with picture">'.$lang['Problems with picture'].'</ option>';
	echo '<option value="I want to report suspected fraud"> '.$lang['I want to report suspected fraud'].' </ option>';
	echo '<option value="Feedback and suggestions for hulutera"> '.$lang['Feedback and suggestions for hulutera'].'</ option>';
	echo '<option value="General">'.$lang['General comment'] .'</option>';
	echo '</select>';
	echo '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td style="padding-top: 10%;float: right;padding-right: 8%;"><div>'.$lang['Message'].'</div></td>';
	echo '<td><textarea name="description" id="description" rows="8" value="Enter your message here...">'.$descriptionValue.'</textarea></td>';
	echo '</tr>';
	echo '<tr><td colspan="2"><div id="buttonInput"><input type="submit" name="submit" id="submit" class="button" value="'.$lang['Send'].'"/></div></td>';
	echo '</tr>';
	echo '</table>';
	echo '</form>';
	echo '</div>';
	echo '</div>';
}

function aboutUs()
{
	global $lang, $lang_url;
	if($lang_url !== NULL) {
		$str_url = str_replace("?", "", $lang_url);
	}
	echo '
			<div id="aboutUs">
			<p class="aboutus" style="font-weight:bold">' . $lang['About Us'] . '</p>
			<p>
			<p class="aboutus">
			' . $lang['hulutera.com is a FREE online trading website where one can SELL, BUY or RENT both used and unused items. hulutera is designed and developed for Ethiopian market with prosperity of large expansion. On hulutera, You have a broad range of choices from a small personal item to a large property; currently you can trade the following items:'] . '
			<li class="aboutUsli"><a href="../includes/template.item.php?type=car'. $str_url .'">'.$lang['Car'].'</a></li>
			<li class="aboutUsli"><a href="../includes/template.item.php?type=house'. $str_url .'">'.$lang['House'].'</a></li>
			<li class="aboutUsli"><a href="../includes/template.item.php?type=phone'. $str_url .'">'.$lang['Phone'].'</a></li>
			<li class="aboutUsli"><a href="../includes/template.item.php?type=computer'. $str_url .'">'.$lang['Computer'].'</a></li>
			<li class="aboutUsli"><a href="../includes/template.item.php?type=electronics'. $str_url .'">'.$lang['Electronics'].'</a></li>
			<li class="aboutUsli"><a href="../includes/template.item.php?type=household'. $str_url .'">'.$lang['Household'].'</a></li>
			<li class="aboutUsli"><a href="../includes/template.item.php?type=others'. $str_url .'">'.$lang['Others'].'</a></li>
			</p>
			<br>
			<p class="aboutus">
			' . $lang['hulutera is designed to fit the needs of the society that we grow up with. It also considers website usability principles. It is SIMPLE to register, to Post Items and to control your posted items. Moreover, we provide you with a quick and easy-to-use help to guide you through. At the moment, we support two languages; English and Amharic, However our goal in the future is to continue to add more native languages in Ethiopia.'] . '
			</p>
			<br>
			<p class="aboutus">
			' . $lang['You can post items from ANY REGIONS in Ethiopia. To contact owner of the item, you can use email or phone calls to make your own one-to-one deal directly without the involvement of us or other third party.'] . '
			</p>
			<br>
			<p class="aboutus">' . $lang['We take our users very seriously and attend their concern with the highest priority, therefore on hulutera, we have created a communication channel between us and our users in order to handle any concerns in using the website. Here are some tips,'] . '
			<li class="aboutUsli">•' . $lang['For any compliant , improvements or other issues you can use'] . ' <a href="../../includes/template.proxy.php?type=contact'.$str_url.'">' . $lang['Contact Us'] . '</a></li>
			<li class="aboutUsli">•' . $lang['For inappropriate items you can “Report” button'] . '</li>
			<li class="aboutUsli">•' . $lang['If you need help, click'] . ' <a href="../../includes/template.proxy.php?type=help'.$str_url.'"> ' . $lang['Help'] . '</a> </li>
			</p>

			<br>
			<p class="aboutus">
			' . $lang['Finally, we are happy and proud to present hulutera to all Ethiopians and it is up to you to use it as much as you want. hulutera is FREE!'] . '
			</p>
			<p class="aboutus">' . $lang['hulutera Admin'] . '</p>
			</p>
			</div>
			';
}

function termAndConditions()
{
	global $lang_url, $lang;
	echo '
			<div id="termsAndCond">
			<div style="background-color:#dfefff;">
			<span style="padding-left:300px;padding-bottom:50px;font-weight:bold;font-size:14px">' .$lang['Terms and Conditions']. ' </span></br></br>
    ' . $lang[
	'Welcome to hulutera.com, this website is owned and operated by hulutera. By visiting our website and accessing the information, resources, services, products, and tools we provide, you understand and agree to accept and adhere to the following terms and conditions as stated in this policy (hereafter referred to as "User Agreement").<br /><br />
    This agreement is in effect as of May 01, 2020.
    <br/><br/>
	We reserve the right to change this User Agreement from time to time without notice. You acknowledge and agree that it is your responsibility to review this User Agreement periodically to familiarize yourself with any modifications. Your continued use of this site after such modifications will constitute acknowledgment and agreement of the modified terms and conditions.
    <br /><br /><span class="tosTitle" style="font-size:14pt;">Responsible Use and Conduct</span>
    <br /><br />
	By visiting our website and accessing the information, resources, services, products, and tools we provide for you, either directly or indirectly (hereafter referred to as "Resources"), you agree to use these Resources only for the purposes intended as permitted by the terms of this User Agreement and applicable laws, regulations and generally accepted online practices.
	<br /><br />
	Wherein, you understand that:
	<br /><br />
	a. In order to access our Resources, you may be required to provide certain information about yourself (such as identification, contact details,  etc.) as part of the registration  process, or as part of your ability to use the Resources. You agree that any information you provide will always be accurate, correct, and up to date.
	<br /><br />
	b. You are responsible for maintaining the confidentiality of any login information associated with any account you use to access our Resources.  Accordingly, you are responsible for all activities that occur under your account/s.
	<br /><br />
	c. Accessing (or attempting to access) any of our Resources by any means other than through the means we provide, is strictly prohibited. You specifically agree not to access (or attempt to access) any of our Resources through any automated, unethical or unconventional means.
	<br /><br />
	d. Engaging in any activity that disrupts or interferes with our Resources, including the servers and/or networks to which our Resources are located or connected, is strictly prohibited.
	<br /><br />
	e. Attempting to copy, duplicate, reproduce, sell, trade, or resell our Resources is strictly prohibited.
	<br /><br />
	f. You are solely responsible any consequences, losses, or damages that we may directly or indirectly incur or suffer due to any unauthorized activities conducted by you, as explained above, and may incur criminal or civil liability.
	<br /><br />
	g. We may provide various open communication tools on our website, such as blog comments, blog posts, public chat, forums, message boards, newsgroups, product ratings and reviews, various social media services, etc.  You understand that generally we do not pre-screen or monitor the content posted by users of these various communication tools, which means that if you choose to use these tools to submit any type of content to our website, then it is your personal responsibility to use these tools in a responsible and ethical manner.  By posting information or otherwise using any open communication tools as mentioned, you agree that you will not upload, post, share, or otherwise distribute any content that:
	<br /><br />
	i. Is illegal, threatening, defamatory, abusive, harassing, degrading, intimidating, fraudulent, deceptive, invasive, racist, or contains any type of suggestive, inappropriate, or explicit language;<br />
    ii. Infringes on any trademark, patent, trade secret, copyright, or other proprietary right of any party;<br />
    iii. Contains any type of unauthorized or unsolicited advertising;<br />
    iv. Impersonates any person or entity, including any hulutera employees or representatives.
    <br /><br />
    We have the right at our sole discretion to remove any content that, we feel in our judgment does not comply with this User Agreement, along with any content that we feel is otherwise offensive, harmful, objectionable, inaccurate, or violates any 3rd party copyrights or trademarks. We are not responsible for any delay or failure in removing such content. If you post content that we choose to remove, you hereby consent to such removal, and consent to waive any claim against us.
    <br /><br />
    h. We do not assume any liability for any content posted by you or any other 3rd party users of our website.  However, any content posted by you using any open communication tools on our website, provided that it doesn"t violate or infringe on any 3rd party copyrights or trademarks, becomes the property of hulutera, and as such, gives us a perpetual, irrevocable, worldwide, royalty-free, exclusive license to reproduce, modify, adapt, translate, publish, publicly display and/or distribute as we see fit.  This only refers and applies to content posted via open communication tools as described, and does not refer to information that is provided as part of the registration  process, necessary in order to use our Resources.
    <br /><br />
    You agree to indemnify and hold harmless hulutera and its parent company and affiliates, and their directors, officers, managers, employees, donors, agents, and licensors, from and against all losses, expenses, damages and costs, including reasonable attorneys" fees, resulting from any violation of this User Agreement or the failure to fulfill any obligations relating to your account incurred by you or any other person using your account. We reserve the right to take over the exclusive defense of any claim for which we are entitled to indemnification under this User Agreement. In such event, you shall provide us with such cooperation as is reasonably requested by us.
    <br /><br /><span class="tosTitle" style="font-size:14pt;">Limitation of Warranties</span>
    <br /><br />
    By using our website, you understand and agree that all Resources we provide are "as is" and "as available".  This means that we do not represent or warrant to you that:<br />
    i) the use of our Resources will meet your needs or requirements.<br />
    ii) the use of our Resources will be uninterrupted, timely and free from errors.<br />
    iii) the information obtained by using our Resources will be accurate or reliable, and
    <br /><br /><span class="tosTitle" style="font-size:14pt;">Limitation of Liability</span>
    <br /><br />
    hulutera will not be liable for any direct, indirect, incidental, consequential or exemplary loss or damages which may be incurred by you as a result of using our Resources, or as a result of any changes, data loss or corruption, cancellation, loss of access, or downtime to the full extent that applicable limitation of liability laws apply.
    <br /><br /><span class="tosTitle" style="font-size:14pt;">Copyrights/Trademarks</span>
    <br /><br />
    All content and materials available on hulutera, including but not limited to text, graphics, website name, code, images and logos are the intellectual property of hulutera, and are protected by applicable copyright and trademark law.  Any inappropriate use, including but not limited to the reproduction, distribution, display or transmission of any content on this site is strictly prohibited, unless specifically authorized by hulutera.
    <br /><br /><span class="tosTitle" style="font-size:14pt;">Termination of Use</span>
    <br /><br />
    You agree that we may, at our sole discretion, suspend or terminate your access to all or part of our website and Resources with or without notice and for any reason, including, without limitation, breach of this User Agreement. Any suspected illegal, fraudulent or abusive activity may be grounds for terminating your relationship and may be referred to appropriate law enforcement authorities.  Upon suspension or termination, your right to use the Resources we provide will immediately cease, and we reserve the right to remove or delete any information that you may have on file with us, including any account or login information.
    <br /><br />
    If you have any questions or comments about our "Terms and Conditions" as outlined above, you can send us your question at info@hulutera.com or you can send us a message using contact us'
				] . '
	</div>
	</div>
';
}

function privacyPolicy()
{
	global $lang;
	echo '
			<div id="aboutUs">
			<div id="privacyPolicyEnglish">
			<p class="aboutus">
			Privacy Policy
			</p>
			<p class="aboutus">' . $lang['This privacy policy sets out how hulutera uses and protects any information that you give hulutera when you use this website.hulutera are committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement. hulutera may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes.'] . '	</p>
			<p class="aboutus"> ' . $lang['What we collect'] . '
			<li class="aboutUsli">•' . $lang['Your name'] . '</li>
			<li class="aboutUsli">•' . $lang['Contact Information including email address'] . '</li>
			</p>
			<p class="aboutus">
			<big><strong>' . $lang['What we do with the information we gather:'] . '</strong></big>
			<li class="aboutUsli">•' . $lang['Your name'] . 'We will not sell, distribute or lease your personal information to third parties unless we have your permission or are required by law to do so. We may use your personal information to send you promotional information about third parties which we think you may find interesting if you tell us that you wish this to happen. </li>
			<li class="aboutUsli">•' . $lang['We may use the information to improve our services.'] . '</li>
			<li class="aboutUsli">•' . $lang['We may periodically send promotional emails about new products, special offers or other information which we think you may find interesting using the email address which you have provided.'] .'</li>
			<li class="aboutUsli">•' . $lang['From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone, fax or mail. We may use the information to customise the website according to your interests.'] . '</li>
			</p>
			<p class="aboutus">
			<big><strong>' . $lang['Links to other websites'] . '</strong></big>
			</p>
			<p class="aboutus">
			' . $lang['Our website may contain links to other websites of interest. However, once you have used these links to leave our site, you should note that we do not have any control over that other website. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites are not governed by this privacy statement. You should exercise caution and look at the privacy statement applicable to the website in question.'] . '
			</p>
			<p class="aboutus">
			' . $lang['hulutera Admin'] . '
			</p>
			</div>			
			';
}

function help()
{
	echo '
			<div id="helpin">
			<ul id="help">
			<li>

			<div id="howtoregister">
			<p></p>
			</div>
			</li>
			<li>
			<ul>
			<!--These two buttons used to choose between Amaharic and English language-->
			<!--The two languages are controlled by giving helpamharic and helpenglish class name for amharic and english -->

			Language:
			<input type="button" value="Amharic" onclick="amharicJs()" />
			<input type="button" value="English" onclick="englishJs()" />

			<li>
			<div id="howtoregister">
			<h3 class="helpEnglish">How to Register</h3>
			<h3 class="helpAmharic">መመዝገብ እንዴት እንደሚችሉ</h3>
			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 1: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong style="">ደረጃ 1: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			Click the link <strong style="color: blue;">Register</strong>
			on the top right of the website.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ከድህረ ገፃችን ከላይ በስተቀኝ በኩል ያለውን ይህንን ይጫኑ <strong
			style="color: blue;">ይመዝገቡ</strong>.
			</p>

			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 2: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 2: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">Fill the
			required part of the form with your personal infomation.You
			will get a suggesting hints for some field contents.</p>
			<p class="helpAmharic" style="margin-left: 30px;">በፎርሙላይ ስለ
			እርስዎ አስፈላጊ የሆኑትን መረጃዎች ይሙሉ.</p>

			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 3: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 3: </strong>
			</p>

			<p class="helpEnglish" style="margin-left: 30px;">
			Click <strong
			style="background-color: orange; border: 1px solid black;">REGISTER
			NOW </strong>button. You will get message that says <strong
			style="color: blue;">"Thank you for registering. A
			confirmation mail has been sent to your email. Please click
			on the activation link to activate your account."</strong>
			Continue to step 4 ...
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			<strong
			style="background-color: orange; border: 1px solid black;">REGISTER
			NOW </strong> የሚለውን ይጫኑ.ከዛም የሚከተለው መልእክት ይመጣል</br> <strong
			style="color: blue;">"Thank you for registering. A
			confirmation mail has been sent to your email. Please click
			on the activation link to activate your account."</strong></br>
			የሚቀጥለውን አስፈላጊ መረጃ ይመልከቱ ...
			</p>

			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 4: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 4: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			Open your email address (provided on the form) and click on
			the link sent from us.This will activate your account.You
			will see a message saying <strong style="color: blue;">Your
			acount is now active.You may now login </strong>.At this
			step your Regsitration is completed.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ኢሜሎትን ይክፈቱና ከኛ ከተላከው መልእክት ውስጥ ያለውን መሲብ (link) ይጫኑት. ከዛም
			የሚቀጥለውን መልእክት ይመጣል</br> <strong style="color: blue;">Your
			acount is now active.You may now login </strong> በዚህ ደረጃ
			ሙሉበሙሉ ተመዝግበዋል!
			</p>
			<p>
			<img style="margin-left:10%;border:2px solid orange;width:80%"
			src="http://static.hulutera.com/images/register.png">
			</p>

			</div>
			<div
			style="background-color: #f1f1f1; border-bottom: 1px solid #ccc; font-family: Georgia, Times New Roman, serif !important;"
			id="howtologin">
			<h3 class="helpEnglish">How to Log In</h3>
			<h3 class="helpAmharic">መግባት እንዴት እደሚችሉ</h3>
			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 1: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 1: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			Click the link <strong style="color: blue;">Log in</strong>
			on the top right of the website.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ከድህረ ገፃችን ከላይ በስተቀኝ በኩል ያለውን <strong style="color: blue;">ይግቡ</strong>
			የሚለውን ይጫኑ.
			</p>

			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 2: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 2: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			Provide your email and password.Click <strong
			style="background-color: orange; border: 1px solid black;">Log
			In</strong> button.If you have account with us, you will be
			directed to your account page.If you forgot your password go
			to Step 3 ...
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ኢሜሎትን እና የሚስጥር ቃሎትን ያስገቡ. ከዛም በመቀጠል <strong
			style="background-color: orange; border: 1px solid black;">ይግቡ
			</strong> የሚለውን ይጫኑ.ከዚህ በፊት ተመስግበው ከሆነና የምስጥር ቃሎት ከጠፋቦት
			ወደሚቀጥለው ይሂዱ ...
			</p>

			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 3: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 3: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			Click <strong class="helpEnglish" style="color: blue;">
			Forgot your password?</strong>. A page will appear. provide
			your <strong style="color: blue;">email</strong> or <strong
			class="helpEnglish" style="color: blue;">username</strong>
			and click <strong class="helpEnglish"
			style="background-color: orange; border: 1px solid black;">SUBMIT</strong>.You
			will see a message <strong class="helpEnglish"
			style="color: blue;">Password recovery information has now
			been sent to the e-mail associated with this user.Please
			follow instructions in the email.</strong>. To complete
			recovery proceed to Step 4 ...
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			የረሱትን የሚስጥር ቃል ለማግኘት <strong style="color: blue;">የሚስጥር ቃሎትን
			ረሱት?</strong> የሚለውን ይጫኑ. አዲስ የሚመጣው ገጽ ላይ <strong
			class="helpAmharic" style="color: blue;">email</strong> ወይም
			<strong class="helpAmharic" style="color: blue;">username</strong>
			ያስገቡ. ከዛም በመቀጠል<strong class="helpAmharic"
			style="background-color: orange; border: 1px solid black;">SUBMIT</strong>
			የሚለውን ይጫኑ.</br>ከዛም ቀጥሎ የሚቀጥለውን መልእክት ይመጣል <strong
			style="color: blue;">Password recovery information has now
			been sent to the e-mail associated with this user.Please
			follow the instructions in the email</strong>.</br>የሚቀጥለውን
			መረጃ ይመልከቱ ...
			</p>

			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 4: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 4: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			Open your email address (provided on the form) and click on
			the link sent from us.This will recover your password.You
			will see a message saying <strong style="color: blue;">Please
			remember once you recovered your account, you can change
			your password from your account page</strong>.After
			providing new password ,your password recovery is completed
			and now you can proceed to log in.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ኢሜሎትን ይክፈቱና ከኛ ከተላከው መልእክት ውስጥ ያለውን መሲብ (link) ይጫኑት. ከዛም
			በመቀጠል የሚክተለው መልእክት ይመጣል.</br> <strong style="color: blue;">Please
			remember once you recovered your account, you can change
			your password from your account page </strong>.</br> አዲስ
			የሚስጥር ቃል ያስገቡ. አሁን አዲሱን የሚስጥር ቃል በመጠቀም መግባት ይችላሉ.
			</p>

			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 5: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 5: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			If you don not have account with us. Click the link <strong
			style="color: blue;">Register</strong> and follow the steps
			in <strong>How to Register?</strong>.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ከዚህ በፊት እኛጋ ካልተመዘገቡ <strong style="color: blue;">መመዝገብ እንዴት
			እንደሚችሉ</strong> የሚለውን ይመልከቱ.
			</p>

			<p>
			<img style="margin-left:10%;border:2px solid orange;width:80%"
			src="http://static.hulutera.com/images/login.png">
			</p>
			</div>
			<div
			style="background-color: #f1f1f1; border-bottom: 1px solid #ccc; font-family: Georgia, Times New Roman, serif !important;"
			id="howtoupload">
			<h3 class="helpEnglish">How to upload</h3>
			<h3 class="helpAmharic">ንብረት ማስገባት እንዴት እንደሚችሉ</h3>
			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 1: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 1: </strong>
			</p>

			<p class="helpEnglish" style="margin-left: 30px;">
			Click the tab <strong
			style="background-color: orange; border: 1px solid black;">Post
			Your Item</strong> on the top left of the website.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ከድህረ ገፃችን ከላይ በስተግራ በኩል ያለውን <strong
			style="background-color: orange; border: 1px solid black;">ንብረቱን
			ያስገቡ</strong> የሚለውን ይጫኑ.
			</p>

			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 2: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 2: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">Choose the
			Item you want to advertise from the dropdown list</p>
			<p class="helpAmharic" style="margin-left: 30px;">ማስገባት የፈለጉትን
			ንብረት ዓይነት ይምረጡ</p>


			<p>
			<img style="margin-left:10%;width:80%;border:2px solid orange"
			src="http://static.hulutera.com/images/items.png">
			</p>

			<p class="helpEnglish" style="margin-left: 30px;">If you have
			already logged-in your personal details will be automatically
			filled. Each item have different fields. To increase your
			chance of advertismnet provide as much information as you as
			you can.</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ገብተው ከሆነ ስለርሶ የሚጠይቀው ቦታ አውቶማቲካሊ ይሞላል. </br>የቀሩትን ሲሞሉ በተቻሎት
			አቅም ሁሉንም ሊሞሉ ይሞክሩ ይህም ንብረቶትን ፈላጊ ከፍ ያደርግሎታል.
			</p>


			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 3: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 3: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			After you have filled your form, you can proceed to attach
			pictures.Click the <strong style="color: blue;"> Choose file</strong>
			button to select images.You can upload upto five pictures.
			You can use the button <img width="15px" height="15px"
			src="http://static.hulutera.com/images/removeImage.png"> to
			remove the picture you do not want. To complete proceed to
			step 4 ...


			<p>


			<p class="helpAmharic" style="margin-left: 30px;">
			ፎርሙን ከሞሉ በኃላ ፎቶዎችን ያስገቡ. 5 ፎቶዎች ድረስ ማስገባት ይችላሉ. </br>ለመቀየር
			ወይም ማጥፋት ከፈለጉ ይሄን <img width="15px" height="15px"
			src="http://static.hulutera.com/images/removeImage.png"> ይጫኑ.
			አስገብተው ለመጨረስ የሚቀጥለውን ይመልከቱ...


			<p>


			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 4: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 4: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			After required fields are filled and images are attached you
			can click the <strong
			style="background-color: orange; border: 1px solid black;">Upload
			Now</strong> button. You will see the message <strong
			style="color: blue;">Your item was successfuly uploaded.
			Thank you for using our service!</strong> at this steg your
			upload is completed. In order to see your uploaded items,we
			will require 24hr to activate your uploaded Items.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ፎርሙን ሞልተውና ፎቶዎችን ካስገቡ ብኃላ <strong
			style="background-color: orange; border: 1px solid black;">Upload
			Now</strong> የሚለውን ይጫኑ. ከዛም የሚቀጥለው መልእክት ይመጣል </br> <strong
			style="color: blue;">Your item was successfuly uploaded.
			Thank you for using our service!</strong></br> ይህም ማለት ሙሉበሙሉ
			ማስገባትችለዋል ማለት ነው. ከ 24 ሰዓታት በኃላ ያስገቡትን ንብረት በኛ ድህረ ገጽ ላይ
			ይታያል.
			</p>

			</div>
			<div
			style="background-color: #f1f1f1; border-bottom: 1px solid #ccc; font-family: Georgia, Times New Roman, serif !important;"
			id="howtocontactus">
			<h3 class="helpEnglish">How to Contact Us</h3>
			<h3 class="helpAmharic">እኛን እንዴት እንደሚያገኙን</h3>
			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 1: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 1: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			Click the link <strong style="color: blue;">Contact Us</strong>
			on the top right of the website.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ከድህረ ገፃችን ከላይ በስተቀኝ በኩል ያለውን ይህንን ይጫኑ <strong
			style="color: blue;">ሊጠይቁን ይፈልጋሉ</strong>.
			</p>

			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 2: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 2: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">If you have
			already logged-in your personal details will be automatically
			filled.Otherwise, fill your personal details and Choose the
			reason you want to contact us using dropdown list</p>
			<p class="helpAmharic" style="margin-left: 30px;">ገብተው ከሆነ
			ስለርሶ የሚጠይቀው ቦታ አውቶማቲካሊ ይሞላል. ካልሆነ ይሙሉና ለምን ሊጠይቁን እንደፈለጉ ይምረጡ.
			</p>

			<p>
			<img style="margin-left:10%;width:80%;border:2px solid orange"
			src="http://static.hulutera.com/images/contactus.png">
			</p>

			<p class="helpEnglish" style="margin-left: 30px;">
			Use <strong style="color: blue;">General</strong> reason if
			you don\'t find your reason. Write detail information why you
			want to contact us on the <strong style="color: blue;">Message</strong>
			field.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			የሚመርጡት ካላገኙ <strong style="color: blue;">General</strong>የሚለውን
			ይምረጡ. መልክቶትን <strong style="color: blue;">Message</strong>የሚለው
			ላይ ይጻፋ.
			</p>
			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 3: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 3: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			After filling the form click <strong
			style="background-color: orange; border: 1px solid black;">Send</strong>
			button to send your question. Then,you will see a message <strong
			style="color: blue;">We appreciate your taking the time to
			contact us"</strong>.You have completed.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ፎርሙን ከሞሉ በኃላ <strong
			style="background-color: orange; border: 1px solid black;">Send</strong>
			የሚለውን ይጫኑ. ከዛም የሚቀጥለው መልእክት ይመጣል</br> <strong
			style="color: blue;">We appreciate your taking the time to
			contact us"</strong>.</br>ይህማለት ጥያቄዎት ለኛ ተልኮዋል.
			</p>
			</div>
			<div
			style="background-color: #f1f1f1; font-family: Georgia, Times New Roman, serif !important;"
			id="howtocontactus" name="search">
			<h3 class="helpEnglish">How to Search</h3>
			<h3 class="helpAmharic">እንዴት መፈለግ እንደሚችሉ</h3>
			<p class="helpEnglish" style="margin-left: 30px;">The
			searchbox will help you find the item that you want based on
			the keyword that you are going to write on the text field.</p>
			<p class="helpAmharic" style="margin-left: 30px;">የፈለጉትን ንብረት
			በመፈለጊያው ሳጥን ውስጥ በመጻፍ ሊያገኙ ይችላሉ.</p>
			<p class="helpEnglish" style="margin-left: 30px;">Your
			keywords should be of the following types:</p>
			<p class="helpAmharic" style="margin-left: 30px;">የፈለጉትን ለማግኘት
			የሚጽፋት ቃል እንደሚቀጥለው መሆን አለብት:</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			<strong style="fount-size: 14px;">1)</strong> Manufacturer of
			car, phone, computer e.g. <strong>Toyota</strong> ,<strong>Apple</strong>,<strong>Acer</strong>
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			<strong style="fount-size: 14px;">1)</strong> የመኪና ወይም የስልክ
			ወይም የኮምፒዩተር አምራች ድርጅቶች ስም ለምሳሌ:- <strong>Toyota</strong> ,<strong>Apple</strong>,<strong>Acer</strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			<strong style="fount-size: 14px;">2)</strong> Color of a Car
			e.g. to search a red car, write only <strong>red</strong> but
			not red car,<strong>black</strong>.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			<strong style="fount-size: 14px;">2)</strong> የመኪና ከለር ለምሳሌ:-
			ቀይ መኪና ለመፈለግ <strong>red</strong> ብለው ብቻ ይጻፋ.
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			<strong style="fount-size: 14px;">3)</strong> Type of car,
			house, phone, computer, electronics, household. e.g. <strong>small
			car</strong> , <strong>condominium</strong>,<strong>TV</strong>,
			<strong>furniture</strong>, <strong>laptop</strong>
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			<strong style="fount-size: 14px;">3)</strong> የመኪና ወይም የቤት
			ወይም የኮምፒዩተር ወይም የኤሌክትሮኒክስ ወይም የቤት ዕቃዎች ዓይነት ለምሳሌ:- <strong>small
			car</strong> , <strong>condominium</strong>,<strong>TV</strong>,<strong>furniture</strong>,
			<strong>laptop</strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			<strong style="fount-size: 14px;">4)</strong> Model of
			car,phone, computer e.g. <strong>Carina</strong> ,<strong>iphone
			4</strong>, <strong>Samsung UN60ES7100F</strong>,<strong>MacBook
			Air MD232LL/A</strong>
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			<strong style="fount-size: 14px;">4)</strong> የመኪና ወይም የስልክ
			ወይም የኮምፒዩተር ሞዴል ለምሳሌ:- <strong>Carina</strong> ,<strong>iphone
			4</strong>,<strong>MacBook Air MD232LL/A</strong>
			</p>
			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 1: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 1: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">Find the
			search box on the top right part of the website.</p>
			</br>
			<p class="helpAmharic" style="margin-left: 30px;">ከድህረ ገፃችን
			ከላይ በስተቀኝ በኩል ያለውን መፈለጊያ ሳጥኑን ያገኛሉ</p>
			</br> <img style="margin-left:10%;width:80%;border:2px solid orange"
			src="http://static.hulutera.com/images/search_help_2.png">
			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 2: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 2: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">Write the
			keyword on the text field</p>
			<p class="helpAmharic" style="margin-left: 30px;">የሚፈልጉት ቃል
			በመጻፊያው ሳጥን ላይ ይጻፋ</p>
			<p class="helpEnglish" style="margin-left: 10px;">
			<strong>Step 3: </strong>
			</p>
			<p class="helpAmharic" style="margin-left: 10px;">
			<strong>ደረጃ 3: </strong>
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">
			Click the <strong
			style="background-color: orange; border: 1px solid black;">search</strong>
			button.
			</p>
			<p class="helpAmharic" style="margin-left: 30px;">
			ከጻፋ በኃላ <strong
			style="background-color: orange; border: 1px solid black;">search</strong>የሚለውን
			ይጫኑ .
			</p>
			<p class="helpEnglish" style="margin-left: 30px;">* If there
			is no items listed on the window it means there is no match
			found on our database to your keyword.</p>
			<p class="helpAmharic" style="margin-left: 30px;">* ምንም አይነት
			ንብረት ካልተዘረዘረ. እርሶ በፈለጉት ቃል ምንም የተመዘገበ ንብረት የለም ማለት ነው.</p>
			</div>

			</li>
			</ul>
			</li>
			</ul>
			</div>
			</div>
			';
}

function register()
{
	$http_referer= $_SERVER['HTTP_REFERER'];
	global $connect, $lang, $lang_url;
	$error_message="";
	if(isset($_POST['submit'])){
		$error = array();

		if(!isset($_POST['termandCond'])){
			$error[] = $lang['Please Agree to the Terms and Conditions'];
		}

		//username
		if(empty($_POST['username'])){
			$error[] = $lang['Please enter a username'];
		}else if( ctype_alnum($_POST['username']) ){
			$username = $_POST['username'];
		}else{
			$error[] = $lang['Username must consist of letters and numbers only'];
		}

		//email
		if(empty($_POST['email'])){
			$error[] = $lang['Please enter your email'];
		}else if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$email = $connect->real_escape_string($_POST['email']);
		}else{
			$error[] = $lang['Your e-mail address is invalid'];
		}

		//password
		if(empty($_POST['password'])||empty($_POST['password2'])){
			$error[] = $lang['Please enter a password'];
		}else if($_POST['password']==$_POST['password2']){
			$password = $connect->real_escape_string($_POST['password']);
		}else {
			$error[] = $lang['Passwords do not match'];
		}

		if(!empty($_POST['name'])){
			if(ctype_alnum($_POST['name']))
				$firstname = $_POST['name'];
			else{
				$error[] = $lang['Firstname must consist of letters and numbers only'];
			}
		}
		else{
			$error[] = $lang['Enter your Firstname'];
		}

		if(!empty($_POST['lastName'])){
			if(ctype_alnum($_POST['lastName']))
				$lastname = $_POST['lastName'];
			else{
				$error[] = $lang['Lastname must consist of letters and numbers only'];
			}
		}
		else{
			$error[] = $lang['Enter your Lastname'];
		}

		if(!empty($_POST['address'])){
			$address = $connect->real_escape_string($_POST['address']);
		}
		if(!empty($_POST['phone'])){
			if(ctype_digit($_POST['phone']))
				$phone= $_POST['phone'];
			else{
				$error[] = $lang['Phone must be a number'];
			}
		}
		if(empty ($error)){
			$filter = "*";
			$table1 = "user";
			$table2 = "tempuser";
			$cond1 = "WHERE uEmail = '$email'";
			$cond2 = "WHERE email = '$email'";
			$result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table1, $cond1);
			$result3 = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table2, $cond2);
			if (mysqli_num_rows($result)==0){
				if(mysqli_num_rows($result3)) {
					//user exist in tempUser table, delete & create again
					$resulst4= DatabaseClass::getInstance()->updateUser($table2, $cond2);
				}

				$activation=md5(uniqid(rand(),true));
				$hashed_password = crypt($password);
				$result2 = DatabaseClass::getInstance()->insertUser("tempuser", '$username','$email','$hashed_password','$firstname','$lastname','$address','$phone','$activation');
				if(!$result2){
					die('Could not insert into database: '.mysqli_error());
				}else{
					$message="To activate your account, please click on the link:\n\n";
					$message.="http://www.hulutera.com/includes/activate.php?key=".$activation;
					mail($email, 'Confirmation of registration of your account', $message, 'From:noreply@hulutera.com');
					redirect("../includes/prompt.php?type=1");
				}
			}else{
				redirect("../includes/prompt.php?type=2");
			}
		}else{
			$endl = '<br>';
			$error_message='<div class="error">';
			foreach($error as $key=>$values){
				$error_message.="$values";
				$error_message.=$endl;
			}
			$error_message.="</div>";
		}

		if ($http_referer=='http://www.hulutera.com/includes/prompt.php?type=9')
		{
			ob_start();
			header('Location: ../includes/upload.php');
			ob_end_flash();
		}
	}

	$usernameValue = (isset($_POST['username'])) ? $_POST['username'] : '';
	$lastNameValue = (isset($_POST['lastName'])) ? $_POST['lastName'] : '';
	$nameValue = (isset($_POST['name'])) ? $_POST['name'] : '';
	$addressValue = (isset($_POST['address'])) ? $_POST['address'] : '';
	$emailValue = (isset($_POST['email'])) ? $_POST['email'] : '';
	$phoneValue = (isset($_POST['phone'])) ? $_POST['phone'] : '';
    
    
	echo '<div id="mainColumn">';
	echo '<div id="registernow">';
	echo '<form class="container" method="post" action="../includes/register.php' . $lang_url . '">';
	echo '<br>'. $error_message;
	echo '<div class="registerInner">';
	echo '<div class="field">';
	echo '<table>';
	echo '<tr>';
	echo '<td><label for="username">' . $lang['Username'] . '</label></td>';
	echo '<td>';
	echo '<input type="text" class="input" id="username" name="username" maxlength="20" value="'.$usernameValue.'"/></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td><label for="name">' . $lang['First Name'] . '</label></td>';
	echo '<td>';
	echo '<input type="text" class="input" id="name" name="name" maxlength="80" value="'.$nameValue.'"/></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td><label for="lastName">' . $lang['Last Name'] . '</label></td>';
	echo '<td><input type="text" class="input" id="lastName" name="lastName" maxlength="80" value="'.$lastNameValue.'"/></td>';
	echo '</tr>';
	echo '</table>';
	echo '</div>';
	echo '<div class="field">';
	echo '<table>';
	echo '<tr>';
	echo '<td><label for="email">' . $lang['Email'] . '</label></td>';
	echo '<td><input style="text-transform:lowercase;" type="email" class="input" id="email" name="email" maxlength="80" value="'.$emailValue.'"/></td>';
	echo '</tr><tr>';
	echo '<td><label for="phone">' . $lang['Phone'] . '</label></td>';
	echo '<td><input type="tel" class="input" id="phone" name="phone" maxlength="20" value="'.$phoneValue.'"/></td>';
	echo '</tr><tr>';
	locationRegion();
	echo'</tr>';
	echo '</table>';
	echo '</div>';
	echo '<div class="field">';
	echo '<table>';
	echo '<tr>';
	echo '<td><label for="password">' . $lang['Password'] . '</label></td>';
	echo '<td><input type="password" class="input" id="password" name="password" maxlength="20"/></td>';
	echo '</tr><tr>';
	echo '<td><label for="password">' . $lang['Password Again'] . '</label></td>';
	echo '<td><input type="password" class="input" id="password" name="password2" maxlength="20"/></td>';
	echo '</tr>';
	echo '</table>';
	echo '</div>';
	echo '<div class="field">';
	echo '<table>';
	echo '<tr>';
	echo '<p class="termandCond"><input type="checkbox" class="termandCondbox" style="float:left;" name="termandCond">';
	echo $lang['I have read and agree to the terms and conditions'];
	echo '<a href="../includes/terms.php">' . $lang['click to see'] . '</a></p>';
	echo '</tr>';
	echo '</table>';
	echo '</div>';
	echo '<div class="fieldbutton">';
	echo '<input  type="submit" name="submit" id="submit" class="button" value="' . $lang['Register'] . '"/>';
	echo '</div>';
	echo '</div>';
	echo '</form>';
	echo '</div>';
	echo '
			</div>';
	echo '
			';
}

function registerX()
{
	global $lang;
	echo '<form action="" method="post">
			<fieldset>
			<legend>' . $lang['Join to hulutera'] . '</legend>
			<p></p>
			<ol>
			<li>
			<label>' . $lang['Username'] . '</label>
			<input type="text" class="input" id="username" name="username" maxlength="20" value="'.$usernameValue.'"/>

					</li>
					<li>
					<label for="email">' . $lang['Email'] . '</label>
					<input type="text" name="email" id="email">
					</li>
					</ol>
					<input type="submit" value="' . $lang['Submit'] . '">
					</fieldset>
					</form>';
}

function locationRegion()
{
	global $lang;
	echo '<td><label>' . $lang['City'] . '</label></td>
			<td><select name="Region" id="city">
			<option value="000" selected>[' . $lang['City'] . ' ' . $lang['Choose'] .']</option>
			<option value = "Addis Ababa">' . $lang['Addis Ababa'] . '</option>
			<option value = "Dire Dawa">' . $lang['Dire Dawa'] . '</option>
			<option value = "Adama">' . $lang['Adama'] . '</option>
			<option value = "Bahir Dar">' . $lang['Bahir Dar'] . '</option>
			<option value = "Mekele">' . $lang['Mekele'] . '</option>
			<option value = "Awassa">' . $lang['Awassa'] . '</option>
			<option value = "Asaita">' . $lang['Asaita'] . '</option>
			<option value = "Debre Birhan">' . $lang['Debre Birhan'] . '</option>
			<option value = "Dessie">' . $lang['Dessie'] . '</option>
			<option value = "Gondar">' . $lang['Gonder'] . '</option>
			<option value = "Gambela">' . $lang['Gambela'] . '</option>
			<option value = "Harar">' . $lang['Harar'] . '</option>
			<option value = "Asella">' . $lang['Asella'] . '</option>
			<option value = "Debre Zeit">' . $lang['Bishoftu'] . '</option>
			<option value = "Jimma">' . $lang['Jimma'] . '</option>
			<option value = "Nekemte">' . $lang['Nekemte'] . '</option>
			<option value = "Shashemene">' . $lang['Shashemene'] . '</option>
			<option value = "Arba Minch">' . $lang['Arba Minch'] . '</option>
			<option value = "Dila">' . $lang['Dila'] . '</option>
			<option value = "Hosaena">' . $lang['Hosaena'] . '</option>
			<option value = "Sodo">' . $lang['Sodo'] . '</option>
			<option value = "Jijiga">' . $lang['Jijiga'] . '</option>
			<option value = "Axum">' . $lang['Adigrat'] . '</option> 
			<option value = "Axum">' . $lang['Ambo'] . '</option>
			<option value = "Axum">' . $lang['Axum'] . '</option>
			<option value = "Axum">' . $lang['Debre Markos'] . '</option>
			<option value = "Other">' . $lang['Other'] . '</option>
			</select></td>';
}

function title($proxyType)
{
	switch($proxyType)
	{
		case 'about':   $isValidUrl = array(0=>"ስለ እኛ",1=>true);break;
		case 'terms':   $isValidUrl = array(0=>"የመተዳደርያ ደንብ",1=>true);break;
		case 'contact': $isValidUrl = array(0=>"ይጠይቁን",1=>true);break;
		case 'help':    $isValidUrl = array(0=>"መረጃ",1=>true);break;
		case 'privacy': $isValidUrl = array(0=>"ግላዊ መርህ",1=>true);break;
	}
	return $isValidUrl;
}

function routerProxy($proxyType)
{
	switch($proxyType)
	{
		case 'about':   aboutUs();$isValidUrl = array(0=>"ስለ እኛ",1=>true);break;
		case 'terms':   termAndConditions();$isValidUrl = array(0=>"የመተዳደርያ ደንብ",1=>true);break;
		case 'contact': contact();$isValidUrl = array(0=>"ይጠይቁን",1=>true);break;
		case 'help':    help();$isValidUrl = array(0=>"መረጃ",1=>true);break;
		case 'privacy': privacyPolicy();$isValidUrl = array(0=>"ግላዊ መርህ",1=>true);break;
	}
}

//workaround using js
function redirect($url)
{
	// If no headers are sent, send one
	if (!headers_sent())
	{
		header('Location: '.$url);
		exit;
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
		echo '<noscript>';
		echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
		echo '</noscript>';
		exit;
	}
}
?>