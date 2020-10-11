<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';

if (isset($_GET['lan'])) {
	$lang_url = "?&lan=" . $_GET['lan'];
} else {
	$lang_url = "";
}

function aboutUs()
{
	global $lang, $lang_url;
	if ($lang_url !== NULL) {
		$str_url = str_replace("?", "", $lang_url);
	} else {
		$str_url = "";
	}
	echo '<div class="row bg-info">';
	echo '<div class="col-md-12 col-sm-12 col-xs-12" style="width:80%;margin:2% 10% 0 10%;text-align:left">';
	$longKey0 = 'about us page paragraph1 text';
	$longKey1 = 'hulutera is designed to fit the needs of the society that we grow up with. It also considers website usability principles. It is SIMPLE to register, to Post Items and to control your posted items. Moreover, we provide you with a quick and easy-to-use help to guide you through. At the moment, we support two languages; English and Amharic, However our goal in the future is to continue to add more native languages in Ethiopia.';
	$longKey2 = 'You can post items from ANY REGIONS in Ethiopia. To contact owner of the item, you can use email or phone calls to make your own one-to-one deal directly without the involvement of us or other third party.';
	$longKey3 = 'We take our users very seriously and attend their concern with the highest priority, therefore on hulutera, we have created a communication channel between us and our users in order to handle any concerns in using the website. Here are some tips,';
	$longKey4 = 'For any compliant , improvements or other issues you can use';
	$longKey5 = 'For inappropriate items you can “Report” button';
	$longKey6 = 'If you need help, click';
	$longKey7 = 'Finally, we are happy and proud to present hulutera to all Ethiopians and it is up to you to use it as much as you want. hulutera is FREE!';
	echo '<p class="h3 text-info" style="text-align:center">' . $lang['About Us'] . '</p>';
	echo '<p class="h4">' . $lang[$longKey0] .'</p>' ;
	echo '	<a   href="../includes/template.item.php?type=car' . $str_url . '">' . $GLOBALS['item_lang_arr']['car'] . '</a>,
	<a   href="../includes/template.item.php?type=house' . $str_url . '">' . $GLOBALS['item_lang_arr']['house'] . '</a>,
	<a   href="../includes/template.item.php?type=phone' . $str_url . '">' . $GLOBALS['item_lang_arr']['phone'] . '</a>,
	<a   href="../includes/template.item.php?type=computer' . $str_url . '">' . $GLOBALS['item_lang_arr']['computer'] . '</a>,
	<a   href="../includes/template.item.php?type=electronics' . $str_url . '">' . $GLOBALS['item_lang_arr']['electronic'] . '</a>,
	<a   href="../includes/template.item.php?type=household' . $str_url . '">' . $GLOBALS['item_lang_arr']['household'] . '</a>,
	<a   href="../includes/template.item.php?type=others' . $str_url . '">' . $GLOBALS['item_lang_arr']['other'] . '</a>';
	echo '<p class="h4">'. $lang[$longKey1] .'</p>';
	echo '<p class="h4">'. $lang[$longKey2] .'</p>';
	echo '<p class="h4">'. $lang[$longKey3] .'</p>';
	echo '<p class="h4">'. $lang[$longKey4] .' <a href="../../includes/template.proxy.php?type=contact' . $str_url . '">' . $lang['Contact Us'] . '</a></p>';
	echo '<p class="h4">'. $lang[$longKey5] .'</p>';
	echo '<p class="h4">'. $lang[$longKey6] .' <a   href="../../includes/template.proxy.php?type=help' . $str_url . '"> ' . $lang['Help'] . '</a></p>';
	echo '<p class="h4">'. $lang[$longKey7] .'</p>';
	echo '</div></div>';
}

function termAndConditions()
{
	global $lang_url, $lang;
	echo '
			<div id="row">
			<div class="col-md-8 col-xs-12 termsandcond-container" style="background-color:#dfefff;text-align:left;padding:15px">
			<span style="text-align:center;padding-bottom:50px;font-weight:bold;font-size:18px">' . $lang['Terms and Conditions'] . ' </span></br></br>
    ' . $lang['terms and conditions text'] . '
	</div>
	</div>
';
}

function privacyPolicy()
{
	global $lang;
	echo '
			<div class="row">
			<div class="col-md-8 col-xs-12 privacypolicy-container" style="background-color: #dfefff;font-family: sans-serif, Arial, Helvetica; padding:15px; text-align:left">
			<p style="font-size:18px"><strong>'. $lang['Privacy Policy'].'</strong></p>
			<p>' . $lang['This privacy policy sets out how hulutera uses and protects any information that you give hulutera when you use this website.hulutera are committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement. hulutera may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes.'] . '	</p>
			<p style="font-size:16px"><strong>' . $lang['What we collect'] . '</strong>
			<li style="padding-left:20px">• ' . $lang['Your name'] . '</li>
			<li style="padding-left:20px">• ' . $lang['Contact Information including email address'] . '</li>
			</p>
			<p style="font-size:16px"><strong>' . $lang['What we do with the information we gather'] . '</strong>
			<li style="padding-left:20px">• ' . $lang['privacy policy paragraph1 text'] . '</li>
			<li style="padding-left:20px">• ' . $lang['We may use the information to improve our services.'] . '</li>
			<li style="padding-left:20px">• ' . $lang['We may periodically send promotional emails msg'] . '</li>
			<li style="padding-left:20px">• ' . $lang['From time to time send info msg'] . '</li>
			</p>
			<p style="font-size:16px"><strong>' . $lang['Links to other websites'] . '</p></strong>
			<p>
			' . $lang['Our website may contain links to other websites of interest. However, once you have used these links to leave our site, you should note that we do not have any control over that other website. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites are not governed by this privacy statement. You should exercise caution and look at the privacy statement applicable to the website in question.'] . '
			</p>
			<p>
			' . $lang['hulutera Admin'] . '
			</p>
			</div></div>
			';
}

function help()
{
	___open_div_('container-fluid', '" style="text-align:start"');
	___open_div_('col-md-8 col-xs-12 help-container', '');
	___open_div_('col-md-12 col-xs-12', '');
	//---------------------------
	___open_div_('page-header', '');
	echo '<h1>' . $GLOBALS['help'][0]['HuluteraFAQ'] . '<small></small></h1>';
	___close_div_(1);
	///
	___open_div_('row', '');
	foreach ($GLOBALS['help'][1] as $key => $value) {
		___open_div_('col-md-12 col-xs-12', '');
		echo "<a  href=\"javascript:void(0)\" onclick=\"toggleDivs('$key')\" style=\"color:black;text-decoration:none\">";
		      echo "<div class=\"help-tabs-" . $key ."\" style=\"font-size:25px;padding:5px;margin-bottom:10px;background-color:white\">" . $GLOBALS['help'][1][$key]['head'] ."<span class=\"glyphicon glyphicon-plus help-plus-".$key."\" style=\"font-size:20px;float:right\"></span><span class=\"glyphicon glyphicon-minus help-minus-".$key."\" style=\"font-size:20px;float:right;display:none\"></span></div></a>";
		___open_div_('col-md-12  col-xs-12 help-'.$key.'', '" id="help-'.$key.'" style="border-radius:4px; border:1px solid #c7c7c7; background-color:#f0f9ff; padding:20px;margin:5px;display:none');

		$body = $GLOBALS['help'][1][$key]['body'];
		echo '<ul style="text-align:start">';
		foreach ($body as $key2 => $value2) {
			echo '<p style="text-align:start">';

			echo '<li class="list-item"><strong>' . $key2 . '</strong>' . $body[$key2] . '</li>';

			echo '</p>';
		}
		echo '</ul>';
		___close_div_(2);
	}
	___close_div_(1);
	___close_div_(3);
}

function routerProxy($proxyType)
{
	switch ($proxyType) {
		case 'about':
			aboutUs();
			break;
		case 'terms':
			termAndConditions();
			break;
		case 'help':
			help();
			break;
		case 'privacy':
			privacyPolicy();
			break;
	}
}
