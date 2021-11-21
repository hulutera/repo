<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
	ob_start();
}

$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/reflection/class.config.php';


if (isset($_GET['lan'])) {
	global $language;
	$language = $_GET['lan'];
	// url extention for language on hyperlinks without "?"
	$lang_url = "?lan=" . $language;

	// url exetention for language on hyperlinks with "?"
	$str_url = str_replace("?", "&", $lang_url);
	if ($language != "") require_once $documnetRootPath . '/includes/locale/' . $_GET['lan'] . '.php';
	else require_once $documnetRootPath . '/includes/locale/en.php';
} else {
	$language = "en";
	$lang_url = "?lan=en";
	$str_url = "&lan=en";
	require_once $documnetRootPath . '/includes/locale/en.php';
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/locale/locale.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/global.variable.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/sendMessage.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/map.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/search.php';

function commonHeaderCssMeta()
{
	echo '<meta name="viewport" content="width=device-width, initial-scale=1">';
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">';
	if (isset($GLOBALS['status']) && $GLOBALS['status'] == 'deploy-release') {
		echo '<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,700;1,900&display=swap" rel="stylesheet">';
		echo '<link href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext" rel="stylesheet" type="text/css">';
		//use google apis for production
		echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">';
		echo '<link rel="stylesheet" href="../../css/hulutera.unminified.css">';
		echo '<meta name="google-signin-client_id" content="900551381277-vo2uu5g24qlirghhqoafnmud9visbep4.apps.googleusercontent.com">';
	} else {
		//use local
		echo '<link href="../../css/bootstrap.min.css" rel="stylesheet">';
		echo '<link rel="stylesheet" href="../../css/hulutera.unminified.css">';
		echo '<meta name="google-signin-client_id" content="900551381277-vo2uu5g24qlirghhqoafnmud9visbep4.apps.googleusercontent.com">';
	}
	echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
}
function commonHeaderJs()
{
	if (isset($GLOBALS['status']) && $GLOBALS['status'] == 'deploy-release') {
		//use google apis for production
		echo '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
		echo '<script type="text/javascript" src="../../js/hulutera.unminified.js"></script>';
		echo '<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>';
		echo '<script type="text/javascript" src="../../js/carousel-slider.js"></script>';
		echo '<script src="https://apis.google.com/js/platform.js" ></script>';

	} else {
		//use local

		echo '<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
		echo "<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>";
		echo '<script type="text/javascript" src="../../js/carousel-slider.js"></script>';
		echo '<script type="text/javascript" src="../../js/hulutera.unminified.js"></script>';
		echo '<script src="https://apis.google.com/js/platform.js" ></script>';

	}
}
function commonHeader()
{
	commonHeaderCssMeta();
	commonHeaderJs();
	echo '<link rel="shortcut icon" type="image/x-icon"giy href="../images/icons/ht_icon.ico"/>';

}

function blockLogin()
{
?>
	<!--[if lt IE 9]>
    <script type="text/javascript" src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
<?php

	global $str_url;
	if ((isset($GLOBALS['status']) && $GLOBALS['status'] == 'deploy-release') && (basename($_SERVER['PHP_SELF'])) !== 'login.php') {
		if (!isset($_SESSION['uID'])) {
			// temporary workaround for page load test with google page load tester
			if ($_GET['release'] != "ht_test") {
				header('Location: ../includes/login.php?release=beta' . $str_url);
			}
		}
	}
}


function headerAndSearchCode($item)
{
	global $lang_url, $str_url, $lang;

	echo '<header class="header-section">';
	___open_div_('header-top', '');
	___open_div_('container', '');
	___open_div_('row', '');
	___open_div_('col-xs-12 col-md-12', '" style="margin-left:0px;margin-right:0px;padding-left:0px;padding-right:0px');
	___open_div_('language-header-container col-xs-12 col-md-6', '" style="margin-left:0px;margin-right:0px;padding-left:0px;padding-right:0px;padding-top:10px');
	___open_div_('language_header col-xs-12 col-md-12', '" style="margin-left:0px;margin-right:0px;padding-left:0px;padding-right:0px;');
	locale("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
	___close_div_(2);
	___open_div_('top-rirgt-container col-xs-12 col-md-6', '" style="margin-left:0px;margin-right:0px;padding-left:0px;padding-right:0px');
	___open_div_('top-right-links', '');
	topRightLinks();
	___close_div_(6);
	___open_div_('col-xs-12 col-md-12', '');
	___open_div_('header-middle col-xs-12 col-md-10', '" style="margin-bottom:1px');
	___open_div_('logo-header col-xs-3 col-md-2', '" style="padding-right:0px');
	logoImage();
	___close_div_(1);
	___open_div_('search-header col-xs-9 col-md-10', '" style="margin-left:0px;margin-right:0px;padding-left:0px;padding-right:0px');
	miniSearch();
	___close_div_(1);
	___open_div_('nav-item col-xs-12 col-md-12', '" style="border-bottom:2px black solid');
	___open_div_('sidelist-container col-xs-12 col-md-10', '" style="margin-right: auto;margin-left: auto;');
	sidelist($item);
	___close_div_(4);
	echo '</header>';
	echo '<div style="clear:both"></div>';
}

function unsetSessionData()
{
	unset($err);
	unset($_SESSION['register']);
	unset($_SESSION['POST']);
	unset($_SESSION['errorRaw']);
	unset($_SESSION['previous']);
}

function uploadListMain($lang_sw)
{
	unsetSessionData();
	___open_div_('container-fluid', '');
	___open_div_('row vertical-align', '" style="margin-top:79px');
	___open_div_('col-md-12 mb-4', '');
	___open_div_('list-group', '" style="text-align:center');
	echo '<ul class="list-group">';
	$itemList = [
		'car', 'computer', 'electronic', 'house', 'household', 'phone', 'other'
	];
	foreach ($itemList as $key => $value) {
		$itemName = $GLOBALS['item_lang_arr'][$value];
		echo <<< EOD
        <li class="list-group-item image-container" style="border-radius:4px; width:160px;height:160px;text-align:center"><div class="md-v-line ">
        <a   href="../includes/template.upload.php?function=upload&type={$value}{$lang_sw}" style="font-size: 18px;color: #000000;">
        <img id="" src="../images/icons/items/{$value}_dark.svg" class="img-responsive" style="text-align:center" >{$itemName}</a><div></li>

EOD;
	}
	echo '</ul>';
	___close_div_(4);
}

function uploadListNav($lang_sw)
{
	___open_div_('container-fluid', '" style="margin-right:2%');
	___open_div_('row vertical-align', '');
	___open_div_('col-md-12 mb-4', '');
	___open_div_('list-group', '" style="text-align:center');
	echo '<ul class="list-group">';
	$itemList = [
		'car', 'computer', 'electronic', 'house', 'household', 'phone', 'other'
	];
	foreach ($itemList as $key => $value) {
		$style = "";
		if ($_GET['type'] == $value) {
			$style = 'background-color: #e4e427; border-radius:4px; width:140px;height:140px;text-align:center';
		} else {
			$style = 'background-color: #c7c7c7; border-radius:4px; width:120px;height:120px;text-align:center';
		}
		$itemName = $GLOBALS['item_lang_arr'][$value];
		echo <<< EOD
        <li class="list-group-item image-container" style="{$style}" ><div class="md-v-line ">
        <a   href="../includes/template.upload.php?function=upload&type={$value}{$lang_sw}" style="font-size: 16px;color: #000000;">
        <img id="" src="../images/icons/items/{$value}_dark.svg" class="img-responsive" style="text-align:center" >{$itemName}</a><div></li>

EOD;
	}
	echo '</ul>';
	___close_div_(4);
}

function logoImage()
{
	global $lang_url;
	echo '<div class ="logo"><a href="../../index.php' . $lang_url . '"><img style="display:none" src="../../images/icons/ht-logo-1.png"><img class="logo_img" src="../../images/icons/ht-logo-v2.png"></a></div>';
}
function logoText()
{
	global $lang_url;
	echo '<a   href="../../index.php' . $lang_url . '">';
	echo '<div class ="logo">';
	echo '<span>Hulutera</span>';
	echo '</div></a>';
}

/*Top Right Links*/
function topRightLinks($style = null)
{
	global $lang_url, $str_url, $lang;

	___open_div_('top-links', $style);
	if (!isset($_SESSION['uID'])) {

		echo '<a href="../../includes/register.php' . $lang_url . '">';
		echo '<div><span class="glyphicon glyphicon-plus register-link-txt" style="font-size:20px;"></span><br/>' . $lang['Register'] . '</div>';
		echo '</a>';

		echo '<a   href="../../includes/login.php' . $lang_url . '" >';
		echo '<div id=""><span class="glyphicon glyphicon-log-in" style="font-size:20px"></span><br/>' . $lang['Login'] . '</div>';
		echo '</a>';

		echo '<a   href="../../includes/upload.php' . $lang_url . '">';
		echo '<div id=""><span class="glyphicon glyphicon-upload" style="font-size:20px"></span><br/>' . $lang['Post Items'] . '</div>';
		echo '</a>';
		topRightHelpLink();
	} else {
		$userId = $_SESSION['uID'];
		$user = new HtUserAll($userId);
		echo '<a   href="../../includes/upload.php' . $lang_url . '">';
		echo '<div id=""><span class="glyphicon glyphicon-upload" style="font-size:20px"></span><br/>' . $lang['Post Items'] . '</div>';
		echo '</a>';
		if ($user->canUpdate()) {
			echo '<a   href="../../includes/admin.php' . $lang_url . '">';
			echo '<div id=""><span class="glyphicon glyphicon-home" style="font-size:20px;"></span><br/>' . $lang['admin panel'] . '</div>';
			echo '</a>';
		} else {
			echo '<a   href="../../includes/mypage.php' . $lang_url . '">';
			echo '<div id=""><span class="glyphicon glyphicon-home" style="font-size:20px"></span><br/>' . $lang['my page'] . '</div>';
			echo '</a>';
		}
		echo '<a   href="../../includes/logout.php' . $lang_url . '">';
		echo '<div id=""><span class="glyphicon glyphicon-log-out" style="font-size:20px"></span><br/>' . $lang['Logout'] . '</div>';
		echo '</a>';

		echo '<a href="../../includes/mypage.php' . $lang_url . '">
		<div id=""><span class="glyphicon glyphicon-user" style="font-size:20px"></span><span><br>' . $user->getFieldFirstName() . '</span></div></a>';
	}
	___close_div_(1);
}

function topRightHelpLink()
{
	global $str_url, $lang_url;
	echo '<a href="../../includes/help.php' . $lang_url . '" target="_blank">';
	echo '<div id="toplinktexts">';
	echo '<div id="topRightEnglishx"><span class="glyphicon glyphicon-info-sign" style="font-size:20px;"></span><br/>' . $GLOBALS['lang']['Help'] . '</div>';
	echo '</div>';
	echo '</a>';
}

/*search*/
function miniSearch()
{
	global $str_url;
	echo '<div class="miniSearch">';
	echo '<form class="" action="../../includes/adverts.php" method="get">';
	echo '<div  class="form-group row" style="margin-bottom:0px"><input name="search_text" class="searchfield" style="display:inline" type="text" placeholder="' . $GLOBALS['lang']['e.g'] . ' RAV4, Toyota, Villa">';
	item();
	city();
	echo '<button type="submit button" class="search-btn btn btn-warning"  onclick="itemSelect()"><i class="search">' . $GLOBALS['lang']['search-button'] . '</i></button>';
	echo '<div id="suggesstion-box"></div></div>';
	carSearch();
	houseSearch();
	computerSearch();
	phoneSearch();
	electronicSearch();
	householdSearch();
	otherSearch();
	lang_sw();
	echo '</form></div>';
}


function item()
{
	global $item_lang_arr;
	echo '<select id="item" name="item"  onchange="itemSelect()" class="form-control" style="display:inline">';
	foreach ($item_lang_arr as $key => $value) {
		echo '<option value = "' . $key . '">' . $value . '</option>';
	}
	echo '</select>';
}

function city()
{
	// Choose city
	echo '
        <select id="city" name="cities" onchange="itemSelect()" class="form-control" style="display:inline">';
	foreach ($GLOBALS['city_lang_arr'] as $key => $value) {
		echo '<option value = "' . $key . '">' . $value . '</option>';
	}
	echo '</select>';
}

function lang_sw()
{
	global $language;

	echo '<input class="hide" type="text" name="lan" value="' . $language . '">';
}

/*sidelist*/
function sidelist($item)
{
	if ($item == "upload") {
		$type = isset($_GET['type']) ? $_GET['type'] : "";
		echo '<div id="sidelist">';
		if ($type == "") {
			echo '<p class="h2" style="text-align:center;">' . $GLOBALS['lang']['choose item to upload'] . '</p>';
		} else {
			echo '<div class="h2" style="text-align:center;"><span ><img src="../images/icons/items/' . $type . '_dark.svg" width="50px" border="2px grey solid"/></span><span >' . $GLOBALS['upload_specific_array'][$type]['Uploading'] . '</span></div>';
		}
		___close_div_(1);
		return;
	}
	global $lang, $lang_url, $str_url;

	$itemList = [
		'car',
		'computer',
		'electronic',
		'house',
		'household',
		'phone',
		'other'
	];
	//// TODO:use language to add new classes and use media-query
	echo '<div id="sidelist" class="col-xs-12 col-md-12 ">
			<div id="menu_mobile" class="col-xs-12"><div class="mobile_inner_div" style="float:right"><a   href="javascript:void(0)" onClick="mobSidelist()"><span class="mob-menu-txt">' . $lang['MENU'] .
		'</span><span class="mob-menu-img"><i class="fa fa-bars" style="text-align:middle; color:rgb(64,65,66);margin-top:5px;font-size:20px"></i></a></span>
			</div></div><ul>';
	echo '<li>';
	echo '<a href="../includes/adverts.php?item=All&search_text=&cities=All' . $str_url . '">';
	echo '<img class="latest-img" src="../images/icons/items/latest.png"/>';
	echo '<p class="text-dark">' . $GLOBALS['lang']['latest items'] . '</p>';
	echo '</a></li>';

	foreach ($itemList as $key => $value) {
		echo '<li><a   ';
		if ($value == $item) {
			echo "class=\"active\"";
		}
		echo 'href="../../includes/template.item.php?type=' . $value . $str_url . '" style="text-align:center">';
		echo '<img src="../images/icons/items/' . $value . '.png" class="sidelist-' . $value . '"/>';
		echo '<p class="text-dark">' . $GLOBALS['item_lang_arr'][$value] . '</p>';
		echo '</a></li>';
	}
	echo '</ul>    </div>';
}

/*footer*/
function footerCode()
{
	echo '<footer class="footer-section">';
	global $lang, $lang_url, $str_url;
	echo '<div class="container">';
	echo '<div id="footer">';
	echo '<div id="footerLinks">';
	echo '<div id="aboutUs_fo" >';

	___open_div_('row', '');
	___open_div_('col-md-12', '');
	echo '<div class ="logo"><p class="h4">' . $GLOBALS['lang']['about hulutera'] . '</p></div>';
	___close_div_(2);

	echo '
        <p style="text-align:start">' . $lang['about us on footer text'] . '</p>
        </div>';
	echo '<div id="information_fo">
        <p class="h4">' . $lang['INFORMATION'] . '</p>
        <p style="margin-bottom:5px"><a   href="../../includes/template.proxy.php?type=terms' . $str_url . '">' . $lang['Terms and Conditions'] . '</a></p>
        <p style="margin-bottom:5px"><a   href="../../includes/template.proxy.php?type=privacy' . $str_url . '">' . $lang['Privacy Policy'] . '</a></p>
        <p style="margin-bottom:5px"><a   href="../../includes/contact-us.php?function=contact-us' . $str_url . '">' . $lang['Contact Us'] . '</a></p>
		<p style="margin-bottom:5px"><a   href="../includes/template.proxy.php?type=help' . $str_url . '" target="_blank">' . $lang['Help'] . '</a></p>
		<p style="margin-bottom:5px"><a   href="../includes/template.proxy.php?type=about' . $str_url . '" target="_blank">' . $lang['About Us'] . '</a></p>
        <p style="margin-top:1px">' . $lang['Phone'] . ': +251969127299</p>
		</div>';
	echo '<div id="followUs_fo" >
		  		<p class="h4">' . $lang['FOLLOW US'] . '</p>
		        <ul>
					<li style="width:50%;text-align:right"><a href="https://www.facebook.com/Hulutera-123294222578640" rel="noreferrer" target="_blank"><span class="fa fa-facebook-square fb_icon_class" style="font-size:25px"></span></a></li>
					<li style="width:50%;text-align:left"><a href="https://twitter.com/hulutera" rel="noreferrer" target="_blank"><span class="fa fa-twitter-square tw_icon_class" style="font-size:25px"></span></a></li>
					<li style="width:50%;text-align:right"><a href="" rel="noreferrer" target="_blank"><span class="fa fa-whatsapp whatsapp_icon_class" style="font-size:25px"></span></a></li>
				    <li style="width:50%;text-align:left"><a href="" rel="noreferrer" target="_blank"><span class="fa fa-telegram telegram_icon_class" style="font-size:25px"></span></a></li>
					<li style="width:50%;text-align:right"><a href="https://www.pinterest.se/hulutera/" rel="noreferrer" target="_blank"><span class="fa fa-pinterest-square pint_icon_class" style="font-size:25px"></span></a></li>
					<li style="width:50%;text-align:left"><a href="https://www.youtube.com/channel/UCJMGzyuRvzg9molYtggzuDA" rel="noreferrer" target="_blank"><span class="fa fa-youtube-square youtube_icon_class" style="font-size:25px"></span></a></li>

				</ul>
           </div>';
	echo '</div>';
	echo '<div id="app_logos"><a href="https://play.google.com/store/apps/details?id=appPackage.hulutera&pcampaignid=pcampaignidMKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1"><img class="play_store_logo" alt="Get it on Google Play" src="https://play.google.com/intl/en_us/badges/static/images/badges/en_badge_web_generic.png"/></a></div>';

	echo '</div>';
	echo '</div>';

	echo '<div class="copyright-reserved">
    <div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="copyright-text">
    Copyright ©' . $lang["2021 hulutera. All Rights Reserved."] . '
    </div>
    </div>
    </div>
    </div>
    </div>';

	echo '</footer>';
}
function ___open_div_($class = null, $options = null)
{
	echo '<div class="' . $class . ' ' . $options . '">';
}
function ___close_div_($number)
{
	$div = "";
	for ($i = 0; $i < $number; $i++) {
		$div .= "</div>";
	}
	echo $div;
}

function yourPage()
{
	unsetSessionData();
	global $str_url, $lang_url;
	$id = $_SESSION['uID'];
	$myPageHeaderTitle = $GLOBALS['lang']['my page header'];
	$myPageHeaderMessage = $GLOBALS['lang']['my-page msg'];
	$myItemsTitle = $GLOBALS['lang']['My Items'];
	$myItemMessage = $GLOBALS['lang']['my-page msg2'];
	$toMyItemsButton = $GLOBALS['lang']['to my items'];
	$myProfileTitle = $GLOBALS['lang']['my profile'];
	$myProfileMessage = $GLOBALS['lang']['my-page msg3'];
	$toMyProfileButton = $GLOBALS['lang']['to my profile'];

	echo <<< EOD
    <div class="container-fluid alert alert-info" role="alert" style="color:black; width:70%;text-align: initial;">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <p class="h1 font-weight-bold" style="text-align: center;">
                        {$myPageHeaderTitle}
                    </p>
                    <p class="h3">
                        {$myPageHeaderMessage}
                    </p>
                </div>
            </div>
			<div class="row">
			    <div class="col-xs-12 mobile-profile-btn">
                            <a   href="../../includes/edit-profile.php{$lang_url}&order=open" type="button" class="btn btn-primary btn-lg active"
                                        >{$toMyProfileButton}</a>
				</div>
				<div class="col-xs-12 mobile-item-btn">
                                    <a   href="../../includes/template.content.php?status=active&id={$id}{$str_url}" type="button" class="btn btn-primary btn-lg active"
									>{$toMyItemsButton}</a>
                </div>
				<div class="col-md-12 your-page-inner">
				<div class="col-md-5" style="margin:20px; padding:20px; border-radius:15px;border:1px solid #c7c7c7;background-color:whitesmoke">
				<div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 col-xs-5">
                                <img src="../images/profile.svg" style="width:100%;" />
                            </div>
                            <div class="col-md-8 col-xs-7">
                                <div class="row">
                                    <p class="h2 font-weight-bold">
                                        {$myProfileTitle}
                                    </p>
                                </div>
                                <div class="row">
                                    <p>
                                        {$myProfileMessage}
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                            <a   href="../../includes/edit-profile.php{$lang_url}&order=open" type="button" class="btn btn-primary btn-lg active"
                                        style="float:right;">{$toMyProfileButton}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>;
            <div class="col-md-5" style="margin:20px; padding:20px; border-radius:15px;border:1px solid #c7c7c7;background-color:whitesmoke">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4 col-xs-5">
                                        <img src="../images/allItems.svg" style="width:100%;" />
                                    </div>
                                    <div class="col-md-8 col-xs-7">
                                        <div class="row">
                                            <p class="h2 font-weight-bold">
                                                {$myItemsTitle}
                                            </p>
                                        </div>
                                    <div class="row">
										<p>
											{$myItemMessage}
										</p>
                                    </div>
                                        <div class="row">

											<div class="col-md-12 btn2">
                                    <a   href="../../includes/template.content.php?status=active&id={$id}{$str_url}" type="button" class="btn btn-primary btn-lg active"
                                                style="float:right;">{$toMyItemsButton}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
EOD;
}


function editProfile()
{
	if (!isset($_GET['function']) or $_GET['function'] !== 'edit-profile' or $_SESSION['lan'] != $_GET['lan']) {
		unset($_SESSION['POST']);
		unset($_SESSION['errorRaw']);
	}
	$sessionName = 'edit-profile';
	$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
	$_SESSION['lan'] = $_GET['lan'];
	$object = new HtUserAll($_SESSION['uID']);
	if (!isset($_SESSION[$sessionName])) {
		$object->updateProfile();
		$_SESSION[$sessionName] = base64_encode(serialize($object));
	} else {
		//$_SESSION[$sessionName] = base64_decode($_SESSION[$sessionName]);
		//$object->updateProfile();
		if (isset($_GET['function'])) {
			$function = $_GET['function'];
			if (isset($_GET['update'])) {
				$update = $_GET['update'];
				if (isset($_GET['order'])) {
					$order = $_GET['order'];
					if ($order == 'open') {
						$object->editProfile($update);
					} elseif ($order == 'cancel') {
						$object->updateProfile();
					}
				}
			} else {
				$object->updateProfile();
			}
		} else {
			$object->updateProfile();
		}
	}
}


function Redirect($url, $permanent = false)
{
	if (headers_sent() === false) {
		header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
	}

	exit();
}

?>



