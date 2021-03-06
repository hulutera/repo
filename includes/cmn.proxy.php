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
	echo '<div class="row">';
	echo '<div class="col-md-6 col-xs-12 termsandcond-container" style="text-align:justify;line-height: 1.6;background-color:#f6f4df;border-radius:5px;">';
	$longKey0 = 'about us page paragraph1 text';
	$longKey1 = 'aboutus page paragraph2 text';
	$longKey2 = 'aboutus page paragraph3 text';
	$longKey3 = 'aboutus page paragraph4 text';
	$longKey4 = 'For any compliant , improvements or other issues you can use';
	$longKey5 = 'For inappropriate items you can Report';
	$longKey6 = 'If you need help, click';
	$longKey7 = 'Finally, we are happy and proud to present hulutera to all Ethiopians and it is up to you to use it as much as you want. hulutera is FREE!';
	echo '<p class="headline-start"><strong>' . $lang['About Us'] . '</strong></p>';
	echo '<p class="content">' . $lang[$longKey0] .'</p>' ;
	echo '
	<a class="links" href="../includes/template.item.php?type=car' . $str_url . '">' . $GLOBALS['item_lang_arr']['car'] . '</a>,
	<a class="links" href="../includes/template.item.php?type=house' . $str_url . '">' . $GLOBALS['item_lang_arr']['house'] . '</a>,
	<a class="links" href="../includes/template.item.php?type=phone' . $str_url . '">' . $GLOBALS['item_lang_arr']['phone'] . '</a>,
	<a class="links" href="../includes/template.item.php?type=computer' . $str_url . '">' . $GLOBALS['item_lang_arr']['computer'] . '</a>,
	<a class="links" href="../includes/template.item.php?type=electronics' . $str_url . '">' . $GLOBALS['item_lang_arr']['electronic'] . '</a>,
	<a class="links" href="../includes/template.item.php?type=household' . $str_url . '">' . $GLOBALS['item_lang_arr']['household'] . '</a>,
	<a class="links" href="../includes/template.item.php?type=others' . $str_url . '">' . $GLOBALS['item_lang_arr']['other'] . '</a>';
	echo '<p class="content">'. $lang[$longKey1] .'</p>';
	echo '<p class="content">'. $lang[$longKey2] .'</p>';
	echo '<p class="content">'. $lang[$longKey3] .'</p>';
	echo '<p class="content">'. $lang[$longKey4] .' <a href="../../includes/contact-us.php?function=contact-us' . $str_url . '">' . $lang['Contact Us'] . '</a></p>';
	echo '<p class="content">'. $lang[$longKey5] .'</p>';
	echo '<p class="content">'. $lang[$longKey6] .' <a   href="../../includes/template.proxy.php?type=help' . $str_url . '"> ' . $lang['Help'] . '</a></p>';
	echo '<p class="content">'. $lang[$longKey7] .'</p>';
	echo '</div></div>';
}

function termAndConditions()
{
	global $lang_url, $lang;
	echo '
			<div id="row">
			<div class="col-md-6 col-xs-12 termsandcond-container" style="text-align:justify;line-height: 1.6;background-color:#f6f4df;border-radius:5px;">
			<p class="headline-start"><strong>'. $lang['Terms and Conditions'].'</strong></p>
			<p class="content">' . $lang['terms and conditions text'] . '	</p>
	</div>
	</div>
';
}

function privacyPolicy()
{
	global $lang;
	echo '
			<div class="row">
			<div class="col-md-6 col-xs-12 privacypolicy-container" style="text-align:justify;line-height: 1.6;background-color:#f6f4df;border-radius:5px;">
			<p class="headline-start"><strong>'. $lang['Privacy Policy'].'</strong></p>
			<p class="content">' . $lang['privacy policy paragraph1 text'] . '	</p>
			<p class="content">' . $lang['privacy policy paragraph2 text'] . '	</p>
			<p class="headline"><strong>' . $lang['What we collect'] . '</strong></p>
			<li class="content" ><i class="fa fa-caret-right"></i> ' . $lang['Your name'] . '</li>
			<li class="content" ><i class="fa fa-caret-right"></i> ' . $lang['Contact Information including email address'] . '</li>
			<p class="headline"><strong>' . $lang['What we do with the information we gather'] . '</strong>
			<li class="content" ><i class="fa fa-caret-right"></i> ' . $lang['privacy policy paragraph1 text'] . '</li>
			<li class="content" ><i class="fa fa-caret-right"></i> ' . $lang['We may use the information to improve our services.'] . '</li>
			<li class="content" ><i class="fa fa-caret-right"></i> ' . $lang['We may periodically send promotional emails msg'] . '</li>
			<li class="content" ><i class="fa fa-caret-right"></i> ' . $lang['From time to time send info msg'] . '</li>
			</p>
			<p class="headline"><strong>' . $lang['Links to other websites'] . '</p></strong>
			<p>
			' . $lang['Our website may contain links to other websites of interest. However, once you have used these links to leave our site, you should note that we do not have any control over that other website. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites are not governed by this privacy statement. You should exercise caution and look at the privacy statement applicable to the website in question.'] . '
			</p>
			<p class="headline">
			' . $lang['Hulutera Admin'] . '
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
