<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/includes/locale/locale.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';


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

function commonHeader()
{
	echo '<meta name="viewport" content="width=device-width">';
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">';
	$host = substr($_SERVER['HTTP_HOST'], 0, 5);
	if (in_array($host, array('local', '127.0', '192.1')) || ($_SERVER['HTTP_HOST'] == 'hulutera')) {
		$add = "../..";
	} else {
		//$add = "http://static.hulutera.com";
		$add = "../..";
	}
	echo '<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,700;0,900;1,700;1,900&display=swap" rel="stylesheet">';
	fileRouter($add);
}

function fileRouter($add)
{
	//css
	echo '<link href="../css/bootstrap.min.css" rel="stylesheet">';
	echo '<link rel="stylesheet" href="' . $add . '/css/hulutera.unminified.css">';
	echo '<link href="http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext" rel="stylesheet" type="text/css">';
	//js
	if ($add != "../..") {
		//use google apis for production
		echo '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>';
	} else {
		//use local minfied jquery lib
		echo '<script type="text/javascript" src="' . $add . '/js/jquery1.11.1.min.js"></script>';
	}
	echo '

        <script type="text/javascript" src="' . $add . '/js/hulutera.unminified.js"></script>'; ?>
	<!--[if lt IE 9]>
    <script type="text/javascript" src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
	<?php echo '<script type="text/javascript" src="' . $add . '/js/respond.js"> </script>';
	//img
	echo '<link rel="shortcut icon" href="' . $add . '/images/icons/ht.ico" />';

	global $str_url;

	if ($_SERVER['SERVER_NAME'] == 'hulutera.com' && (basename($_SERVER['PHP_SELF'])) !== 'login.php') {
		if (!isset($_SESSION['uID'])) {
			header('Location: ../includes/login.php?release=beta' . $str_url);
		}
	}
}


function headerAndSearchCode2($item)
{
	global $lang_url, $str_url, $lang;

	echo '<header class="header-section">';
	___open_div_('header-top row', '');

	___open_div_('ht-left col-md-2', '');
	___open_div_('logox', ' style="padding:20px');
	logoText();
	___close_div_(2);
	___open_div_('ht-center col-md-5', '');
	miniSearch();
	___close_div_(1);
	___open_div_('ht-right col-md-4', '');
	$current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	locale($current_link);
	topRightLinks();
	___close_div_(3);

	___open_div_('nav-item', '" style="margin-bottom: 5px;');
	___open_div_('container', '');
	sidelist($item);
	___close_div_(2);


	echo '</header>';
}

function headerAndSearchCode($item)
{
	headerAndSearchCode2($item);
	return;
	global $lang_url, $str_url, $lang;

	echo '<header class="header-section">';
	___open_div_('header-top', '');
	___open_div_('container', '');
	___open_div_('ht-left', '');
	___open_div_('mail-service', '');
	echo '<a   href="../../includes/contact-us.php?function=contact-us' . $str_url . '" style="color:black"><i class="glyphicon glyphicon-envelope"></i>' . $GLOBALS['lang']['Contact Us'] . '<br>info@hulutera.com</a>';
	___close_div_(1);
	___open_div_('phone-service', '');
	echo '<i class="glyphicon glyphicon-phone"></i>+251 123 456 7890';
	___close_div_(1);
	___close_div_(1);
	___open_div_('ht-right', '');
	$current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	locale($current_link);
	topRightLinks();
	___close_div_(3);
	___open_div_('container', '');
	___open_div_('inner-header', '');
	___open_div_('row', '');

	___open_div_('col-xs-6 col-md-4', '');
	___open_div_('logox', '');
	logoText();
	___close_div_(2);
	___open_div_('col-xs-12 col-md-8', '');
	miniSearch();
	___close_div_(1);
	___close_div_(3);

	___open_div_('nav-item', '" style="margin-bottom: 5px;');
	___open_div_('container', '');
	sidelist($item);
	___close_div_(2);

	___close_div_(1);
	echo '</header>';
}

function uploadResetErrors()
{
	unset($err);
	unset($_SESSION['register']);
	unset($_SESSION['POST']);
	unset($_SESSION['errorRaw']);
	unset($_SESSION['previous']);
}

function uploadListMain($lang_sw)
{
	uploadResetErrors();
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
        <img id="" src="../images/uploads/icons/{$value}_dark.svg" class="img-responsive" style="text-align:center" >{$itemName}</a><div></li>

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
        <img id="" src="../images/uploads/icons/{$value}_dark.svg" class="img-responsive" style="text-align:center" >{$itemName}</a><div></li>

EOD;
	}
	echo '</ul>';
	___close_div_(4);
}

function logoImage()
{
	global $lang_url;
	echo '<div class ="logo"><a   href="../../index.php' . $lang_url . '"><img src="../../images/icons/ht_logo_2.png"></a></div>';
}
function logoText()
{
	global $lang_url;
	echo '<a   href="../../index.php' . $lang_url . '">';
	echo '<div class ="logo" style="font-size:50px;font-family: \'Roboto\', sans-serif;">';
	echo '<span style="color:orange">HULU</span><span style="color:#050598a6">TERA</span>';
	echo '</div></a>';
}

/*Top Right Links*/
function topRightLinks($style = null)
{
	global $lang_url, $str_url, $lang;
	___open_div_('top-links', $style);
	if (!isset($_SESSION['uID'])) {

		echo '<a   href="../../includes/register.php' . $lang_url . '">';
		echo '<div id=""><span class="glyphicon glyphicon-plus" style="font-size:20px"></span><br/>' . $lang['Register'] . '</div>';
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
			echo '<div id=""><span class="glyphicon glyphicon-home" style="font-size:20px"></span><br/>' . $lang['admin panel'] . '</div>';
			echo '</a>';
		} else {
			echo '<a   href="../../includes/mypage.php' . $lang_url . '">';
			echo '<div id=""><span class="glyphicon glyphicon-home" style="font-size:20px"></span><br/>' . $lang['my page'] . '</div>';
			echo '</a>';
		}
		echo '<a   href="../../includes/logout.php' . $lang_url . '">';
		echo '<div id=""><span class="glyphicon glyphicon-log-out" style="font-size:20px"></span><br/>' . $lang['Logout'] . '</div>';
		echo '</a>';
		echo '<a   href="../../includes/mypage.php' . $lang_url . '"><div id=""><span class="glyphicon glyphicon-user" style="font-size:20px"></span></br>' . $user->getFieldUserName() . '<br>' . $user->getFieldPrivilege() . '</div></div></a>';
	}
	___close_div_(1);
}

function topRightHelpLink()
{
	global $str_url, $lang_url;
	echo '<a   href="../../includes/help.php' . $lang_url . '" target="_blank">';
	echo '<div id="toplinktexts">';
	echo '<div id="topRightEnglish"><span class="glyphicon glyphicon-info-sign" style="font-size:20px"></span><br/>' . $GLOBALS['lang']['Help'] . '</div>';
	echo '</div>';
	echo '</a>';
}

/*search*/
function miniSearch()
{
	global $str_url;
	echo '<div class="miniSearch">';
	echo '<form class="" action="../../includes/adverts.php" method="get">';
	echo '<div  class="form-group row"><input name="search_text" class="searchfield form-control" style="display:inline" type="text" placeholder="' . $GLOBALS['lang']['e.g'] . ' RAV4, Toyota, Villa">';
	item();
	city();
	echo '<button type="submit button" class="search-btn btn btn-warning"  onclick="itemSelect()"><i class="search">' . $GLOBALS['lang']['search-button'] . '</i></button>';
	echo '</div>';
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

function carSearch()
{
	echo '<div class ="row car_search_cl se-el hide">';
	// Choose max price
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_max_price">';
	echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][5] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][5][$key] . '</option>';
	}
	echo '</select></div>';

	// Car make
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['car']['fieldMake'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_make">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['car']['fieldMake'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['car']['fieldMake'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['car']['fieldMake'][2][$key] . '</option>';
	}
	echo '</select></div>';

	// Car type
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['car']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_type">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['car']['idCategory'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['car']['idCategory'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['car']['idCategory'][2][$key] . '</option>';
	}
	echo '</select></div>';

	// Car color
	$colors = [
		"black"    => ["#000000", "#000000"],
		"green"    => ["#009f6b", "#FFFFFF"],
		"red"      => ["#C40233", "#FFFFFF"],
		"yellow"   => ["#FFD300", "#000000"],
		"blue"     => ["#0087BD", "#FFFFFF"],
		"white"    => ["#ffffff", "#000000"],
		"brown"    => ["#a52a2a", "#FFFFFF"],
		"silver"   => ["#c0c0c0", "#FFFFFF"],
		"liver"    => ["#534b4f", "#FFFFFF"]
	];
	$selectable = [];
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldColor'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_color">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['common']['fieldColor'][1] . '</option>';
	foreach ($colors as $key => $value) {
		echo '<option  style="background-color:' . $value[0] . ';color:' . $value[1] . ';width:90%">' . $GLOBALS['upload_specific_array']['common']['fieldColor'][2][$key] . '</option>';
	}
	echo '</select></div>';


	// Car Year of made
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['car']['fieldModelYear'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_model_year">';
	echo '<option value="000">' . $GLOBALS['upload_specific_array']['car']['fieldModelYear'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['car']['fieldModelYear'][3] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['car']['fieldModelYear'][3][$key] . '</option>';
	}
	echo '</select></div>';


	// Car gear type
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['car']['fieldGearType'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_gear_type">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['car']['fieldGearType'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['car']['fieldGearType'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['car']['fieldGearType'][2][$key] . '</option>';
	}
	echo '</select></div>';


	// Car fuel type
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['car']['fieldFuelType'][0] . '</p>
            <select  class="col-xs-12 col-md-8 car-select form-control" name="car_fuel_type">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['car']['fieldFuelType'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['car']['fieldFuelType'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['car']['fieldFuelType'][2][$key] . '</option>';
	}
	echo '</select></div>';
	echo '</div>';
}

// House search elements
function houseSearch()
{
	echo '<div class ="row house_search_cl se-el hide">';
	// Choose max price
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 house_select form-control" name="house_max_price">';
	echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][6] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][6][$key] . '</option>';
	}
	echo '</select></div>';

	// House type
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['house']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 house_select form-control" name="house_type">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['house']['idCategory'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['house']['idCategory'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['house']['idCategory'][2][$key] . '</option>';
	}
	echo '</select></div>';

	// House bedroom
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['house']['fieldNrBedroom'][3] . '</p>
            <select  class="col-xs-12 col-md-8 house_select form-control" name="house_bedroom">';
	echo '<option value="0">' . $GLOBALS['upload_specific_array']['house']['fieldNrBedroom'][1] . '</option>';
	for ($i = 1; $i <= 100; $i++) {
		echo '<option value="' . $i . '">' . $i . '</option>';
	}
	echo '<option value="101">' . $GLOBALS['upload_specific_array']['house']['fieldNrBedroom'][2] . '</option>';
	echo '</select></div>';

	// House toilet number
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['house']['fieldToilet'][3] . '</p>
            <select  class="col-xs-12 col-md-8 house_select form-control" name="house_toilet">';
	echo '<option value="0">' . $GLOBALS['upload_specific_array']['house']['fieldToilet'][1] . '</option>';
	for ($i = 1; $i <= 100; $i++) {
		echo '<option value="' . $i . '">' . $i . '</option>';
	}
	echo '<option value="101">' . $GLOBALS['upload_specific_array']['house']['fieldToilet'][2] . '</option>';

	echo '</select></div>';

	// House built year
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['house']['fieldBuildYear'][0] . '</p>
            <select  class="col-xs-12 col-md-8 house_select form-control" name="house_built_year">';
	echo '<option value="0">' . $GLOBALS['upload_specific_array']['house']['fieldBuildYear'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['house']['fieldBuildYear'][3] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['house']['fieldBuildYear'][3][$key] . '</option>';
	}
	echo '</select></div>';
	echo '</div>';
}


// Computer search elements
function computerSearch()
{
	echo '<div class ="row computer_search_cl se-el hide">';
	// Choose max price
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_max_price">';
	echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][7] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][7][$key] . '</option>';
	}
	echo '</select></div>';

	// Computer type
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['computer']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_type">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['computer']['idCategory'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['computer']['idCategory'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['computer']['idCategory'][2][$key] . '</option>';
	}
	echo '</select></div>';

	// Computer make
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['computer']['fieldMake'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_make">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['computer']['fieldMake'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['computer']['fieldMake'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['computer']['fieldMake'][2][$key] . '</option>';
	}
	echo '</select></div>';

	// Computer OS
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['computer']['fieldOs'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_os">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['computer']['fieldOs'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['computer']['fieldOs'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['computer']['fieldOs'][2][$key] . '</option>';
	}
	echo '</select></div>';

	// Computer processor
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['computer']['fieldProcessor'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_proc">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['computer']['fieldProcessor'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['computer']['fieldProcessor'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['computer']['fieldProcessor'][2][$key] . '</option>';
	}
	echo '</select></div>';

	// Computer harddrive
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['computer']['fieldHardDrive'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_hd">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['computer']['fieldHardDrive'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['computer']['fieldHardDrive'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['computer']['fieldHardDrive'][2][$key] . '</option>';
	}
	echo '</select></div>';


	// Computer color
	$colors = [
		"black"    => ["#000000", "#ffffff"],
		"white"    => ["#ffffff", "#000000"],
		"silver"   => ["#c0c0c0", "#FFFFFF"],

	];
	$selectable = [];
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldColor'][0] . '</p>
            <select  class="col-xs-12 col-md-8 computer_select form-control" name="computer_color">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['common']['fieldColor'][1] . '</option>';
	foreach ($colors as $key => $value) {
		echo '<option  style="background-color:' . $value[0] . ';color:' . $value[1] . ';width:90%">' . $GLOBALS['upload_specific_array']['common']['fieldColor'][2][$key] . '</option>';
	}
	echo '</select></div>';
	echo '</div>';
}


// Computer search elements
function phoneSearch()
{
	echo '<div class ="row phone_search_cl se-el hide">';
	// Choose max price
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 phone_select form-control" name="phone_max_price">';
	echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8][$key] . '</option>';
	}
	echo '</select></div>';

	// Phone type
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['phone']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 phone_select form-control" name="phone_type">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['phone']['idCategory'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['phone']['idCategory'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['phone']['idCategory'][2][$key] . '</option>';
	}
	echo '</select></div>';

	// Phone make
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['phone']['fieldMake'][0] . '</p>
            <select  class="col-xs-12 col-md-8 phone_select form-control" name="phone_make">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['phone']['fieldMake'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['phone']['fieldMake'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['phone']['fieldMake'][2][$key] . '</option>';
	}
	echo '</select></div>';

	// Phone OS
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['phone']['fieldOs'][0] . '</p>
            <select  class="col-xs-12 col-md-8 phone_select form-control" name="phone_os">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['phone']['fieldOs'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['phone']['fieldOs'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['phone']['fieldOs'][2][$key] . '</option>';
	}
	echo '</select></div>';

	// Phone camera
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['phone']['fieldCamera'][0] . '</p>
            <select  class="col-xs-12 col-md-8 phone_select form-control" name="phone_camera">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['phone']['fieldCamera'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['phone']['fieldCamera'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['phone']['fieldCamera'][2][$key] . '</option>';
	}
	echo '</select></div>';
	echo '</div>';
}

// Electronic search
function electronicSearch()
{
	echo '<div class ="row electronic_search_cl se-el hide">';
	// Choose max price
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 electronic_select form-control" name="electronic_max_price">';
	echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8][$key] . '</option>';
	}
	echo '</select></div>';

	// Electronic type
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['electronic']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 electronic_select form-control" name="electronic_type">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['electronic']['idCategory'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['electronic']['idCategory'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['electronic']['idCategory'][2][$key] . '</option>';
	}
	echo '</select></div>';
	echo '</div>';
}

// Household Search elements
function householdSearch()
{
	echo '<div class ="row household_search_cl se-el hide">';
	// Choose max price
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 household_select form-control" name="household_max_price">';
	echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8][$key] . '</option>';
	}
	echo '</select></div>';

	// Electronic type
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['household']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 household_select form-control" name="household_type">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['electronic']['idCategory'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['household']['idCategory'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['household']['idCategory'][2][$key] . '</option>';
	}
	echo '</select></div>';
	echo '</div>';
}

// Other Search elements
function otherSearch()
{
	echo '<div class ="row other_search_cl se-el hide">';

	// Choose max price
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][4] . '</p>
            <select  class="col-xs-12 col-md-8 other_select form-control" name="other_max_price">';
	echo '<option value="000">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][3] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['common']['fieldPriceSell'][8][$key] . '</option>';
	}
	echo '</select></div>';

	// Other type
	echo '<div class="col-xs-6 col-md-4">
            <p > ' . $GLOBALS['upload_specific_array']['other']['idCategory'][0] . '</p>
            <select  class="col-xs-12 col-md-8 other_select form-control" name="other_type">';
	echo '<option value="none">' . $GLOBALS['upload_specific_array']['other']['idCategory'][1] . '</option>';
	foreach ($GLOBALS['upload_specific_array']['other']['idCategory'][2] as $key => $value) {
		echo '<option value="' . $key . '">' . $GLOBALS['upload_specific_array']['other']['idCategory'][2][$key] . '</option>';
	}
	echo '</select></div>';
	echo '</div>';
}

function svgMapElement()
{
	global $str_url;
	$base_link = '<a   href="../includes/adverts.php?item=All&search_text=&';

	?>
	<?php echo $base_link . 'cities=Harar' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Harar'] . '</title><path class="ET-HA" title="Harari" stroke="black" d="M494.01,310.19L494.92,309.65L495.36,308.61L495.05,307.64L494.49,306.68L494.16,305.68L494.29,305L494.92,303.85L495.03,303.22L495.05,302.64L495.25,301.25L495.24,300.78L494.43,299.6L493.29,299.71L492.04,300.33L490.86,300.73L489.46,300.36L488.5,299.73L487.61,299.66L486.43,300.97L484.82,303.72L484.29,305.17L484.01,306.79L484.15,307.97L484.96,308.14L486.06,307.91L487.09,307.86L487.56,308.12L488.36,308.89L488.79,309.12L489.52,309.03L490.26,308.69L490.98,308.43L491.69,308.6L493.19,309.93L494.01,310.19z"/></a>'; ?>

	<?php echo $base_link . 'cities=Dire Dawa' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Dire Dawa'] . '</title><path class="ET-DD" title="Dire Dawa" stroke="black" d="M498.93,281.47L496.88,279.19L494.31,278.22L491.58,278.55L489.08,280.19L482.91,286.41L481.92,286.61L480.52,286.08L476.43,283.84L475,283.44L473.64,283.76L471.08,285.41L470.01,285.38L468.12,285.81L466.93,288.79L466.46,292.42L466.74,294.8L468.4,294.04L469.92,294.14L471.45,294.38L473.11,294.04L473.79,293.97L475.28,294.51L475.99,294.67L476.62,294.61L477.2,294.45L480.23,293.1L481.67,293.14L484.84,294.74L485.76,293.55L487.29,292.35L488.61,291.11L488.84,289.83L487.83,288.18L487.61,287.51L487.88,287.04L488.62,286.53L490.2,285.65L491.5,285.17L494.21,284.94L495.11,284.51L495.92,283.68L497.92,282.04L498.93,281.47z"/></a>'; ?>

	<path class="ET-SO" title="Somali" stroke="black" d="M347.78,620.47L349.48,620.38L350.37,618.98L351.54,615.42L352.91,613.77L356.41,610.57L360.6,606.74L361.62,605.39L362.5,603.75L363.99,599.81L365.03,597.02L366.11,595.7L370.67,593.49L375.26,591.28L380.43,588.78L382.84,587.57L383.08,587.26L383.04,586.93L383.09,586.72L383.61,586.77L383.76,586.86L383.92,586.9L384.07,586.89L389.47,585.01L393.67,583.54L393.96,583.27L394.27,582.41L394.58,582.13L401.46,579.47L407.09,577.31L411.52,575.6L414.88,573.39L416.05,574.94L419.26,577.13L420.57,578.62L421.47,580.27L422.02,580.82L422.99,581.31L425.53,582.18L426.39,582.69L427.78,583.98L431.2,588.78L433.57,590.62L436.15,591.67L438.94,592L444.38,591.69L450.36,591.34L453.03,590.59L454.44,590.51L458.71,589.46L459.56,589.52L460.97,590.1L461.73,590.24L462.5,590.07L464.76,588.78L467.29,589.6L469.64,590.85L472.01,591.31L474.63,589.83L475.34,588.78L476.08,588.18L476.36,587.52L476.31,585.88L476.68,584.84L477.62,584.01L481.39,581.69L484.4,579.29L486.24,578.36L487.97,577.92L492.58,577.88L496.6,577.83L502.87,576.77L511.04,575.37L519.05,574L522.84,573.35L525.07,572.46L527.06,571.15L527.12,571.08L528.69,569.32L529.5,567.6L530.44,563.86L531.16,562.06L531.51,561.49L531.93,560.97L535.93,557.68L540.39,554L546.44,551.12L552.53,548.23L558.52,545.38L562.2,543.63L568.17,542.25L572.22,541.32L577.48,540.11L579.07,539.74L583.72,538.09L585.67,537.62L588.88,537.81L591.64,537.97L594.4,538.13L597.17,538.29L599.92,538.45L602.69,538.61L605.45,538.77L608.21,538.93L610.97,539.09L613.73,539.25L616.5,539.41L619.13,539.57L619.25,539.57L622.02,539.73L624.78,539.89L627.54,540.05L630.3,540.21L633.06,540.37L635.95,540.54L637.49,539.89L641.71,535.33L641.72,535.33L644.75,532L650.47,525.73L656.19,519.46L661.9,513.18L667.62,506.91L668.24,506.23L673.34,500.64L679.05,494.36L684.77,488.08L690.48,481.81L693.73,478.46L696.98,475.11L700.23,471.76L703.48,468.41L706.74,465.05L709.99,461.7L713.23,458.35L716.48,455L718.78,452.77L719.9,451.68L720.99,450.63L723.37,448.31L725.76,445.99L726.85,444.94L729.44,442.43L732.03,439.91L734.61,437.4L737.2,434.89L739.8,432.37L742.38,429.85L744.97,427.34L747.56,424.82L750.14,422.3L752.74,419.78L755.33,417.27L757.91,414.75L760.51,412.23L763.1,409.72L765.69,407.2L768.28,404.68L770.87,402.16L773.46,399.64L775.55,397.6L776.04,397.12L778.63,394.6L781.23,392.08L783.82,389.56L786.4,387.04L788.99,384.52L791.58,382L794.17,379.48L796.77,376.96L799.36,374.44L791.76,374.44L782.03,374.44L775.08,374.44L766.69,374.44L758.4,374.44L750.81,374.44L746.07,374.44L742.95,372.87L739.58,371.74L735.12,370.22L730.64,368.71L726.17,367.19L721.69,365.68L717.22,364.17L712.75,362.65L708.27,361.14L703.8,359.63L699.33,358.12L694.86,356.6L690.39,355.09L685.91,353.57L681.45,352.06L676.97,350.55L672.5,349.03L668.02,347.52L668.02,347.52L663.32,345.96L658.63,344.4L653.93,342.84L649.23,341.29L644.53,339.72L639.84,338.17L635.14,336.61L630.45,335.05L625.75,333.49L621.06,331.93L616.35,330.37L611.66,328.81L606.96,327.25L602.27,325.69L597.57,324.13L592.87,322.57L588.6,321.15L586.51,319.92L582.79,316.52L576.01,310.3L571.26,305.95L567.16,302.19L566.4,301.77L565.54,301.83L564.24,302.33L563.25,302.23L559.15,299.75L556.37,298.08L555.69,297.23L555.46,296.22L555.32,294.41L555,293.44L553.79,290.99L553.3,290.51L552.23,289.79L551.72,289.32L551.36,288.74L550.86,287.56L550.34,287.03L549.9,286.81L548.46,286.44L547.3,285.15L546.58,283.02L545.03,274.4L544.02,272.66L542.02,271.76L539.6,271.33L537.65,270.54L536.17,269.05L535.15,266.54L534.71,264.76L534.03,262.99L533.08,261.39L531.81,260.09L526.7,256.76L525.32,255.08L523.82,251.78L522.82,248.3L522.14,243.36L521.56,241.88L520.74,240.81L517.8,237.93L516.38,235.68L515.31,233.25L515.24,232.1L515.94,231.59L517,231.27L518.04,230.68L518.67,229.78L519.07,228.71L519.58,226.5L520.08,225.19L520.71,224.32L522.62,222.77L523.45,221.88L523.79,221.05L524,220.15L524.42,219.07L525.24,218.21L527.47,217.27L528.37,216.51L528.77,215.59L529.31,213.38L529.98,212.22L529.14,211.93L528.61,212.39L528.08,213.04L527.29,213.33L526.59,213.22L525.27,212.83L523.07,212.61L521.88,212.35L520.98,211.58L519.63,208.62L518.61,208.24L517.34,208.19L513.56,207.29L513.16,207.32L511.11,207.48L506.32,208.94L502.78,211.29L501.63,211.83L500.83,211.79L500,211.51L498.79,211.31L497.05,211.9L496.6,211.95L495.64,211.91L495.19,211.96L493.29,212.82L492.56,213L491.56,212.99L488.82,212.36L485.88,212.68L484.45,213.16L482.8,214.84L481.33,215.21L478.31,215.34L477.95,215.49L477.71,215.76L477.43,215.96L476.96,215.89L476.64,215.63L476.51,215.3L476.32,215.03L470.03,213.74L468.7,213.24L468.31,212.72L468.3,212.73L467.74,212.98L466.84,213.54L465.83,213.94L464.3,214.09L443.04,213.94L441.88,214.32L440.81,215.42L440.38,216.8L440.18,218.28L439.86,219.67L438.35,222.16L434.23,226.22L432.39,228.47L431.91,229.55L431.8,230.58L432.11,232.83L432.08,234.33L424.44,263.8L424.45,265.15L424.91,266.52L425.79,267.3L428.14,268.25L428.63,268.99L427.85,270.19L421.12,276.05L418.2,279.34L413.46,286.7L412.67,288.72L411.7,292.63L411.22,296.38L411.51,296.23L411.72,296.16L411.96,296.16L412.31,296.23L415.28,296.24L417.9,295.72L420.38,295.7L422.92,297.2L423.42,298.3L422.7,299L421.37,299.37L420.04,299.45L417.65,298.93L416.69,299.07L416.49,300.15L416.81,301.51L417.3,302.63L418.09,303.42L419.29,303.8L420.41,303.75L421.73,303.47L424.07,302.64L425.75,301.54L426.31,301.25L426.88,301.13L427.48,301.12L428.06,301.04L428.56,300.76L429.53,299.91L430.57,299.2L431.68,298.61L434.24,297.67L435.47,297.09L436.62,296.37L437.77,295.47L439.19,293.94L439.77,293.56L441.85,293.06L444.13,293.16L448.53,294.03L452.6,295.48L453.75,295.56L454.71,295.06L456.58,293.44L457.65,292.88L458.88,292.58L460.25,292.43L461.44,292.62L462.14,293.36L462.88,294.44L464.04,295L465.39,295.1L466.74,294.8L466.46,292.42L466.93,288.79L468.12,285.81L470.01,285.38L471.08,285.41L473.64,283.76L475,283.44L476.43,283.84L480.52,286.08L481.92,286.61L482.91,286.41L489.08,280.19L491.58,278.55L494.31,278.22L496.88,279.19L498.93,281.47L501.05,282.12L501.72,284.43L501.38,289.72L503.07,290.05L505,292.02L506.72,294.5L510.16,301.4L510.3,301.86L510.39,303.09L510.53,303.93L512.31,309.03L512.91,310.1L513.89,311.08L514.1,311.51L513.99,312.95L514.1,313.91L515.07,316.05L518.34,321.28L522.04,325.36L523.11,326.33L525.45,328.04L526.42,328.98L526.87,331.14L525.16,336.16L525.73,338.58L528.44,341.41L529.03,342.49L529.33,343.81L529.47,345.27L529.42,346.74L528.95,349.36L528.87,350.8L528.55,352.05L527.64,352.77L522.93,353.99L521.81,354.58L520.39,356.63L518.26,364.46L516.37,366.68L514.57,366.31L512.96,364.36L511.68,361.83L510.73,359.01L509.17,350L507.59,347.73L504.55,346.46L498.17,345.24L497.45,344.56L495.36,340.71L491.79,341.68L486.76,345.97L484.55,348.26L482.48,350.9L482.09,352.19L482.4,355.33L482.32,356.75L481.67,358.2L478.69,362.41L477.61,365.03L477.1,368.03L476.37,381.05L476.53,382.41L477.03,383.69L477.98,385.27L478.27,387.62L477.37,390.64L474.93,396.12L474.18,398.32L474.03,399.35L474.1,400.56L474.58,403.42L475,405.02L475.5,405.85L491.81,412.26L492.18,412.68L492.86,416.04L492.61,418.59L491.86,421.02L490.8,422.68L490.59,423.11L490.54,423.72L490.6,424.9L490.5,425.6L490.24,426.19L489.51,427.3L488.87,428.98L488.75,428.95L488.56,429.23L488.2,429.51L487.93,429.92L488.05,430.6L486.27,431.56L485.71,432.34L485.51,433.73L485.39,434.03L484.9,434.98L484.78,435.56L484.98,436.75L484.9,437.29L484.42,437.96L484.97,438.96L484.45,440.2L482.96,442.39L482.05,446.13L481.51,447.15L480.81,448.2L480.65,448.63L480.39,449.12L480,449.69L478.62,451.11L478.24,451.39L477.11,452.01L475.89,452.5L474.64,452.79L473.36,452.83L472.54,451.07L470.46,451.29L468.16,452.61L466.68,454.2L464.87,457.79L464.05,458.77L462.04,460.14L461.21,460.9L460.61,462.12L451.94,453.25L450.86,452.43L449.64,451.78L448.34,451.35L445.66,450.92L439.04,447.41L436.52,445.68L433.97,444.49L431.39,444.62L430.1,445.38L428.98,446.44L426.34,449.99L423.23,453.02L422.38,454.17L420.29,457.93L419.93,459.12L420.37,461.7L420.21,463.92L420.51,465.15L420.94,466.38L421.21,467.5L421.27,468.87L421.21,470.25L421.02,471.62L420.69,472.95L420.31,475.71L421.04,485.91L420.95,490.17L421.08,491.72L421.46,493.16L423.34,497.72L419.46,500.59L411.71,504.9L403.32,512.5L402.36,512.93L400.97,513.18L400.59,513.42L400.13,513.62L397.65,513.62L393.69,514.53L391.48,514.73L389.83,515.09L388.46,515.04L388.01,515.09L385.31,516.05L384.17,516.19L380.33,515.43L378.42,514.64L376.91,513.77L376.1,513.81L374.96,514.66L369.89,521.97L366.63,530.41L364.62,534.35L363.52,538.72L361.95,543.1L360.94,548.94L360.77,552.08L360.44,553.5L352.08,572.91L350.1,575.38L349.75,576.08L348.63,580.78L346.93,585.31L346.68,586.42L346.79,587.48L347.47,589.7L345.93,593.02L338.64,605.49L336.92,607.7L334.84,609.05L330.32,611L325.97,613.37L326.34,613.78L325.72,614.33L330.52,616.54L332.59,616.98L334.62,616.93L336.69,615.74L337.03,615.54L337.73,615.58L337.98,616.14L337.49,617.12L344.14,617.32L345.78,617.87L346.24,618.47L346.53,619.19L346.93,619.91L347.78,620.47z" />
	<?php echo $base_link . 'cities=Jijiga' . $str_url . '"><circle class="so-jij" cx="524" cy="278" r="10" fill="greenyellow"></circle><title>' . $GLOBALS['city_lang_arr']['Jijiga'] . '</title></a>'; ?>
	<text x="524" y="300" class="so big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Jijiga']; ?></text>
	<text x="480" y="275" class="dd big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Dire Dawa']; ?></text>

	<path class="ET-BE" title="Benshangul" stroke="black" d="M176.79,323.88L177.41,323.69L178.02,323.41L178.54,323.02L178.92,322.51L178.11,322.09L177.12,320.92L176.49,320.53L174.17,321.78L173.84,322.1L173.7,322.42L173.8,322.74L174.14,323.06L174.9,323.47L175.34,323.84L175.83,324.02L176.79,323.88zM166.72,319.06L164.47,318.47L163.65,318.52L163.27,319.08L163.19,319.98L163.2,320.96L163.11,321.77L162.79,322.31L161.87,323.38L161.54,324.06L161.51,324.7L161.77,326.03L161.73,326.68L161.68,326.81L161.62,326.9L161.45,327.11L161.69,327.68L162.06,328.11L162.55,328.41L163.13,328.62L163.24,328.34L163.55,328.24L164.55,328.26L164.81,328.23L165.39,328.1L165.62,328.1L165.87,328.23L166.2,328.71L166.37,328.83L167.53,328.8L168.29,328.34L169.62,326.95L170.11,327.74L171.44,328.79L171.97,329.46L172.06,329.91L171.97,330.31L171.97,330.75L172.3,331.3L172.67,331.56L173.14,331.73L174.13,331.86L174.01,331.25L173.77,330.7L173.15,329.75L173.9,329.39L173.91,328.67L173.42,327.96L172.64,327.64L172.5,326.49L172.58,324.83L172.85,323.22L173.25,322.2L172.63,322.44L171.93,322.43L171.24,322.14L170.63,321.53L170.22,320.89L170.22,320.63L170.52,320.39L171.02,319.82L170.82,319.74L170.68,319.64L170.51,319.49L169.69,319.29L168.94,319.04L168.25,318.94L167.64,319.21L166.72,319.06zM184.62,298.4L184.45,297.22L185,296.17L187.14,295.23L187.55,294.8L187.56,294.16L187.29,293.72L185.53,292.42L184.59,292.18L183.63,292.4L182.58,293.1L181.92,293.87L181.62,294.68L181.06,296.75L182.31,301.02L182.95,302.06L182.98,302.06L183.14,302.03L183.36,300.89L184.03,300.57L185.81,300.91L184.62,298.4zM148.55,155.71L148.21,155.96L146.75,159.51L145.91,160.7L139.17,166.03L137.87,167.38L136.76,168.29L135.66,168.45L134.18,168.32L132.65,168.57L129.67,169.54L128.52,169.54L127.28,168.9L125.92,167.74L124.44,166.15L122.4,161.28L120.99,160.07L120.96,161.06L120.85,161.6L119.24,163.41L115.67,164.79L114.51,165.24L112.45,166.59L111.63,167.64L110.91,168.89L110.33,170.22L109.95,171.52L109.92,172.62L110.32,174.68L110.22,176.9L110.61,178.02L111.72,180.24L111.85,181.25L111.65,182.33L104.94,197.23L104.79,198.4L105.3,199.87L106.24,200.92L106.91,202.03L106.71,203.72L103.19,214.11L103.15,214.71L103.66,215.41L105.24,216.58L105.54,217.39L105.13,219.25L104.23,220.55L101.35,222.76L100.38,223.68L100.16,224.33L100.16,224.98L99.84,225.95L99.15,226.85L98.57,226.92L97.92,226.73L97.02,226.82L96.37,227.4L95.66,229.07L95.23,229.5L94.67,229.29L94.59,228.5L94.81,226.87L94.47,226.05L93.77,225.43L92.2,224.41L85.75,218.7L85.1,218.44L84.2,218.79L77.77,223.24L76.85,224.05L76.01,225.18L73.95,229.2L69.37,235.72L68.95,237.64L69.19,239.88L71.78,251.8L71.84,254.25L71.39,256.54L71.22,256.85L70.7,257.38L70.55,257.67L70.54,258.28L70.73,259.6L70.64,260.2L69.44,262.01L66.3,264.94L59.71,283.67L58.04,291.7L58.24,295.83L58.9,309.3L61.37,309.34L71.35,310.21L72.82,310.04L73.85,309.38L74.61,308.38L75.19,307.46L75.65,306.47L76.06,305.22L78.13,295.83L79.2,285.86L80.54,285.08L81.71,285.05L83.69,284.7L84.64,284.89L85.91,285.74L88.34,287.9L89.73,288.66L91.39,288.44L97.37,281.95L99.43,278.14L102.53,268.35L102.09,267.51L101.35,266.7L100.81,265.43L101.1,264.96L107.89,265.46L108.79,265.74L109.08,266.32L108.97,267.67L109.06,268.99L109.64,269.87L111.04,269.91L115.19,269.33L116.94,269.4L119.44,269.76L120.44,269.79L121.5,269.97L122.64,270.55L124.62,272.09L135.36,282.84L142.61,291.72L145.25,294.38L147.48,294.03L148.19,294.05L148.94,295.05L149.98,297.36L150.12,298.03L150.06,301.02L150.61,301.69L151.27,302.02L151.92,302.12L153.47,302.02L155.55,302.15L156.59,302.09L157.14,302.31L157.54,303.02L157.95,304.06L159.88,307.44L160.42,308.11L161.02,308.19L162.72,308L163.55,309.02L164.32,312.39L165.52,312.89L173.29,302.69L174.77,298.34L175.43,294.46L175.09,291.5L173.53,289.89L172.62,289.32L169.01,285.08L167.35,283.64L167.43,283.36L168.45,282.56L168.92,281.67L168.86,280.6L168.29,279.27L167.98,278.17L168.31,273.08L167.87,263.56L168.48,263.54L169.44,264.23L170.48,264.2L171.52,263.77L173.65,262.59L178.39,259.16L180.13,257.14L182.99,252.53L183.78,251.53L185.74,249.44L186.75,248.65L187.81,248.19L191.14,247.83L191.44,248.05L189.63,253.32L189.47,253.96L189.72,254.25L190.7,254.56L191.58,254.97L192.5,255.22L193.63,255.02L194.8,252.57L195.5,252L200.2,249.66L201.13,249.69L203.44,251.12L206.33,252.32L207.47,253.21L213,254.9L213.98,255.01L214.67,254.66L215.2,253.91L215.73,252.91L216.11,251.82L216.79,249.96L209.12,248.48L206.94,247.7L205.86,247.46L203.37,247.31L202.81,247.16L202.31,246.9L201.97,246.56L201.69,246.21L201.37,245.96L200.9,245.93L199.61,246.31L199.11,246.34L193.03,245.78L190.58,245.81L189.52,245.41L188.8,244.37L188.72,243.42L188.88,242.45L188.87,241.54L188.31,240.75L187.7,240.51L187.12,240.61L184.49,241.87L183.22,241.77L181.93,240.94L180.76,239.59L179.7,237.84L178.9,235.54L178.51,232.54L181.98,224.58L181.26,223.66L180.06,223.64L179.05,224.01L178.28,224.75L177.81,225.85L177.65,225.91L177.54,224.94L177.53,223.4L177.67,221.77L178.99,218.72L178.97,218L179.12,217.14L179.8,216.02L180.7,214.89L181.55,214.01L184.29,211.88L185.78,210.3L187.09,207.93L185.5,204.5L185.7,203.83L186.13,202.87L186.03,201.75L185.74,200.62L185.62,199.65L186.13,198.42L187.1,197.13L187.94,195.52L188.07,193.37L184.83,190.05L183.93,189.49L182.67,188.4L183.11,187.27L184.18,186.21L184.81,185.31L184.71,184.89L181.62,180.11L179.82,178.28L179.2,177.26L178.96,172.42L179.22,168.8L178.84,168.21L177.61,168.64L175.55,170.13L173.43,171.96L171.19,174.37L170.19,174.99L169.12,175.14L168.05,174.63L167.27,172.18L166.88,169.43L166.33,168.13L165.01,166.59L163.17,163.49L162.93,163.16L160.67,161.28L160.02,160.54L159.33,159.09L158.87,158.46L157.55,157.7L157.31,157.45L156.44,157.22L154.96,157.21L153.59,157.03L153.07,156.28L152.91,155.99L152.39,155.91L150.77,155.91L148.55,155.71z" />
	<?php echo $base_link . 'cities=Asossa' . $str_url . '"><circle class="bn-aso" cx="105" cy="244" r="10" fill="greenyellow"></circle><title>' . $GLOBALS['city_lang_arr']['Asossa'] . '</title></a>'; ?>
	<text x="105" y="264" class="bn big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Asossa']; ?></text>

	<path class="ET-AA" title="Oromiya" stroke="black" d="M305.11,263.48L307.15,263.01L310.66,261.11L311.36,260.33L313.63,249.46L313.7,247.49L312.76,246.71L306.59,245.65L294.15,246.26L293.62,246.69L293.35,247.2L291.93,253.04L291.6,253.66L291.12,254.06L290.63,254.25L290.34,254.56L290.39,255.33L290.73,256.45L290.8,257.01L290.69,257.61L289.93,258.66L288.74,259.25L287.38,259.48L286.11,259.45L284.75,259.09L284.22,259.08L283.69,259.19L282.25,259.73L280.74,260.04L280.28,260.33L280.11,260.56L279.72,261.58L279.62,261.74L278.28,263.07L277.86,263.35L277.36,263.59L274.17,264.42L266.62,267.99L264.14,269.76L263.64,269.96L262.67,270.02L262.16,270.11L261.77,270.32L261.47,270.64L260.98,271.36L260.53,271.84L256.75,273.96L256.25,274.09L255.82,274.03L255.41,273.91L254.94,273.83L254.14,274.01L252.63,274.81L251.78,274.85L246.8,271.12L245.99,270.17L245.73,269.5L244.46,268.06L243.39,266.56L242.64,265.99L237.55,263.73L235.76,263.18L233.92,262.97L233.13,263.26L232.87,263.94L232.68,264.73L232.1,265.35L231.54,265.42L231.09,265.17L230.74,264.72L230.48,264.22L230.29,263.61L230.27,262.42L230.18,261.78L229.74,261.23L228.92,260.83L228.02,260.61L227.31,260.58L226.67,260.72L226.36,260.75L226.02,260.67L225.52,260.39L224.24,259.07L223.54,257.24L224.17,255.59L224.97,254.06L224.79,252.58L223.97,252.19L220.39,252.18L219.35,251.81L218.35,251.23L216.79,249.96L216.11,251.82L215.73,252.91L215.2,253.91L214.67,254.66L213.98,255.01L213,254.9L207.47,253.21L206.33,252.32L203.44,251.12L201.13,249.69L200.2,249.66L195.5,252L194.8,252.57L193.63,255.02L192.5,255.22L191.58,254.97L190.7,254.56L189.72,254.25L189.47,253.96L189.63,253.32L191.44,248.05L191.14,247.83L187.81,248.19L186.75,248.65L185.74,249.44L183.78,251.53L182.99,252.53L180.13,257.14L178.39,259.16L173.65,262.59L171.52,263.77L170.48,264.2L169.44,264.23L168.48,263.54L167.87,263.56L168.31,273.08L167.98,278.17L168.29,279.27L168.86,280.6L168.92,281.67L168.45,282.56L167.43,283.36L167.35,283.64L169.01,285.08L172.62,289.32L173.53,289.89L175.09,291.5L175.43,294.46L174.77,298.34L173.29,302.69L165.52,312.89L164.32,312.39L163.55,309.02L162.72,308L161.02,308.19L160.42,308.11L159.88,307.44L157.95,304.06L157.54,303.02L157.14,302.31L156.59,302.09L155.55,302.15L153.47,302.02L151.92,302.12L151.27,302.02L150.61,301.69L150.06,301.02L150.12,298.03L149.98,297.36L148.94,295.05L148.19,294.05L147.48,294.03L145.25,294.38L142.61,291.72L135.36,282.84L124.62,272.09L122.64,270.55L121.5,269.97L120.44,269.79L119.44,269.76L116.94,269.4L115.19,269.33L111.04,269.91L109.64,269.87L109.06,268.99L108.97,267.67L109.08,266.32L108.79,265.74L107.89,265.46L101.1,264.96L100.81,265.43L101.35,266.7L102.09,267.51L102.53,268.35L99.43,278.14L97.37,281.95L91.39,288.44L89.73,288.66L88.34,287.9L85.91,285.74L84.64,284.89L83.69,284.7L81.71,285.05L80.54,285.08L79.2,285.86L78.13,295.83L76.06,305.22L75.65,306.47L75.19,307.46L74.61,308.38L73.85,309.38L72.82,310.04L71.35,310.21L61.37,309.34L58.9,309.3L59.67,324.91L60.43,340.51L60.19,341.86L61.47,342.54L62.45,343.51L63.07,343.97L63.73,343.82L66.24,341.96L67.53,341.53L68.9,341.66L70.54,342.36L73.24,344.22L77.91,348.73L80.51,350.78L85.87,353.48L87.42,354.79L89.33,357.59L90.41,358.73L92.03,359.44L95.18,360.09L96.17,360.85L97.06,362.52L98.08,363.92L99.5,364.5L101.16,364.52L105.04,363.92L108.08,363.78L110.95,364.15L112.57,365.34L112.17,366.11L110.81,366.75L108.12,367.65L104.89,369.46L102.51,370.5L102.03,371.15L102.49,371.75L105.12,372.57L105.4,373.14L105.12,373.84L101.75,378.63L100.86,380.85L100.9,383.38L102.01,385.69L103.7,387.35L105.62,388.82L107.41,390.57L107.93,391.73L108.27,394.28L108.72,395.37L109.52,396.01L114.89,397.92L115.59,398.58L115.15,399.47L114.42,400.14L113.58,401.13L113.3,402.04L114.27,402.45L115.87,402.5L116.62,402.65L117.9,403.2L118.24,403.1L118.57,402.81L119.09,402.47L120.15,401.9L121.22,401.13L121.9,400.16L121.8,399.01L120.79,394.24L120.68,391.64L121.44,390.14L122.34,389.41L123.72,387.51L125.91,386.1L126.12,385.07L126.17,383.91L126.77,382.76L127.07,382.62L128.02,382.64L128.63,382.5L129.92,381.65L130.19,381.41L131.1,380.79L131.89,380.76L132.75,380.83L133.88,380.49L136.17,380.56L136.77,381.78L137.06,382.85L137.62,383.72L139.05,384.33L140.22,384.29L141.37,383.79L143.44,382.44L144.14,382.09L145.2,381.7L146.92,381.41L147.31,381.27L148.14,380.7L149.22,379.72L150.16,378.62L150.54,377.69L150.17,376.88L149.34,376.09L147.52,374.83L146.57,373.78L146.6,372.79L147.8,370.9L148.61,370.07L149.73,369.7L150.99,369.65L152.23,369.78L153.42,370.08L154.12,370.61L154.54,371.45L156,376.5L156.03,377.79L155.65,378.99L155,380.01L153.48,381.94L153.53,382.93L154.52,383.92L157.8,385.95L159.59,386.76L160.38,387.26L161.04,388.01L162.28,390.66L163.5,392.58L163.57,393.4L163.31,394.86L163.18,396.3L163.55,397.33L164.49,397.93L168.64,398.54L170.7,399.8L172.67,401.32L174.99,402.52L178.21,403.71L179.42,403.9L179.84,404.03L180.8,404.67L181.51,405.02L183.47,405.61L183.95,405.65L186.26,405.62L187.28,405.78L188.47,406.15L192.63,407.94L193.66,407.94L202.81,414.05L205.12,415.05L207.56,415.69L209.99,415.96L211.95,415.81L215.8,415.1L220.04,415.37L221.75,415.08L223.31,414.21L226.8,411.49L232.11,409.05L233.86,407.97L234.52,408.19L234.67,407.95L235.37,406.29L235.61,403.83L235.9,402.76L236.19,402.38L237.63,396.74L237.59,396.07L236.32,391.92L235.9,389.86L235.94,384.39L236.07,383.36L236.4,382.38L237.37,380.49L237.64,379.55L237.27,378.04L235.35,375.92L235.35,374.43L238.61,373.52L240.3,373.29L241.67,373.91L242.75,376.1L243.54,376.67L244.63,376.83L245.72,376.59L247.19,376.16L247.34,375.57L247.32,374.74L247.01,373.77L246.09,372.09L245.88,371.04L245.95,367.18L246.56,362.53L246.54,361.89L246.05,361.6L242.07,360.59L241.22,360.24L240.37,359.63L239.95,359.22L239.78,358.94L239.52,358L239.22,357.51L239.45,355.97L240.39,353.62L241.02,352.62L241.89,351.71L242.96,351.14L244.21,351.19L245.22,352.14L245.91,353.55L246.65,354.65L247.82,354.62L251.36,355.07L252.4,355.67L253.16,355.64L253.97,355.4L255.16,355.34L258.75,356.12L260.13,356.08L270.16,353.58L277.43,352.66L280.39,351.94L281.46,352.18L282.37,352.79L283.17,353.6L283.39,353.92L283.57,354.32L283.9,355.48L284.13,357.71L284.92,359.72L286.87,360.06L289.09,359.3L290.7,357.99L291.14,357.07L291.8,353.61L291.93,353.2L292.16,352.76L292.97,351.66L294.14,350.38L294.48,350.2L295.5,349.88L296.69,349.63L297.83,349.74L298.71,350.5L302.05,352.16L302.72,353.17L303.17,354.36L303.34,355.61L302.77,358.23L302.96,359.16L303.68,359.9L304.9,360.75L304.01,364.37L304,365.61L304.16,366.89L304.15,368.12L303.64,369.23L302.29,367.74L301.69,366.92L301.27,366.05L300.26,361.69L299.79,360.63L296.66,361.66L297.04,362.81L298.66,365.11L299.09,366.43L299.23,367.2L299.81,369.08L300.57,373.16L300.42,373.75L299.96,374.73L299.2,376.92L297.49,379.82L295.12,382.71L293.96,384.86L292.05,386.77L291.55,387.75L291.2,388.83L290.31,390.85L290.12,391.76L289.97,394.33L290.5,398.37L290.52,399.68L290.02,400.42L289.12,400.85L287.95,401.23L286.59,401.82L285.87,402.47L285.47,403.34L285.07,404.57L284.45,405.68L282.98,407.38L282.5,408.48L282,410.7L281.45,411.43L274.15,416.05L272.66,417.32L271.86,418.95L271.5,420.83L271.32,422.84L271.59,423.87L272.5,424.81L273.95,425.57L275.81,426.04L280.69,424.96L281.56,424.3L283.7,421.78L284.16,420.94L285.26,419.33L286.62,419.75L288.31,420.84L290.35,421.23L291.85,421.65L293.58,422.74L295.4,423.43L297.16,422.66L298.56,422.41L300.24,423.79L301.87,426.3L303.08,429.43L301.56,437.52L301.72,439.4L302.14,440L302.97,440.7L303.98,441.3L305.77,441.88L312.74,445.45L313.63,445.63L316.19,445.83L317.56,446.19L318.38,446.86L318.96,447.6L321.04,448.97L324.99,452.61L325.85,453.57L326.17,454.58L326.47,456.98L327.76,461.8L327.75,464.22L327.2,465.41L326.4,466.43L325.83,467.46L325.94,468.68L326.82,471L327.33,472.04L328.09,472.97L322.86,473.69L320.55,473.49L317.98,471.26L317.98,470.91L317.62,469.67L316.62,468.06L315.06,465.29L313.82,463.78L313.54,463.26L309.52,461.39L309.06,460.9L308.5,459.91L308.37,459.55L306.45,459.79L304.97,459.75L304.63,459.69L300.57,458.49L298.45,458.11L296.29,458.02L293.62,458.46L291.75,459.53L290.66,461.35L290.33,464.02L290.99,468.58L290.87,470.15L290.26,470.92L289.29,471.48L288.1,472.39L287.46,473.35L286.8,475.54L285.03,478.8L284.34,479.78L283.42,480.6L283.26,481L283.58,481.59L284.99,483.01L288.13,484.77L288.69,485.38L288.51,486.01L284.64,488.56L283.54,488.74L282.42,488.8L281.28,489.06L280.1,488.87L279.06,487.5L272.52,475.99L272.28,474.9L272.34,473.39L272.76,472.24L273.58,472.2L274.71,472.82L275.91,472.99L277.02,472.56L277.9,471.36L278.03,470.05L277.04,468.03L277.16,466.9L277.99,464.9L278.62,464.11L282.06,462.83L283.41,460.87L283.3,458.64L281.36,456.89L280.42,456.66L279.38,456.7L278.29,456.91L277.18,457.23L276.54,457.11L275.19,455.55L274.16,454.61L271.94,453.27L271.37,453.06L270.38,452.47L269.6,451.57L268.76,450.83L267.6,450.68L266.29,451.13L265.61,451.23L263.91,451.15L263.59,450.96L262.41,449.95L261.46,449.99L260.56,450.83L258.07,454.35L257.09,456.62L257.19,458.86L258.96,460.97L260.01,462.97L259.79,465.77L258.88,468.56L257.86,470.59L256.39,472.67L255.89,473.79L255.78,475.1L256.38,479.04L256.29,480.42L256.65,481.16L257.87,481.53L259.6,481.88L264.96,484.11L266.1,484.73L266.58,485.62L266.87,486.92L267.92,489.21L268.46,491.72L269.01,492.87L269.89,493.73L271.14,494.15L272.13,494.78L272.5,496.05L272.28,497.39L271.5,498.25L268.12,499.98L265.51,500.45L264.63,501.09L264.28,502.06L265.1,505.76L265.08,508.54L264.55,511.28L263.59,513.59L262.89,514.86L262.53,515.88L262.46,516.97L262.75,519.55L262.68,520.76L262.31,521.82L261.52,522.52L260.26,522.58L259.17,521.94L258.17,521.07L257.19,520.45L254.64,519.75L252.08,518.71L250.87,518.42L249.77,518.66L248.87,519.34L248.23,520.31L247.51,521.01L246.27,521.6L243.88,522.45L238.62,525.24L235.83,526.32L233.02,526.49L231.75,526.05L229.55,524.76L228.17,524.39L226.53,524.22L225.72,524.25L220.64,524.99L219.35,524.99L215.32,524.37L214.03,524.5L212.81,525.2L211.23,527.12L210.11,529.39L207.63,537.35L207.6,538.55L207.96,539.92L209.13,542.51L209.48,543.92L209.14,547.02L207.75,549.81L203.89,554.72L201.37,558.66L200.38,560.8L199.62,562.99L199.44,563.33L199.13,563.64L198.1,564.32L196.25,564.98L195.62,565.57L195.75,565.6L206.02,565.52L209.2,566.4L212.99,568.31L215.16,568.81L215.68,569.2L216.52,570.62L216.91,570.88L217.98,570.8L218.37,570.92L218.73,571.4L218.93,571.92L219.21,573.1L219.38,573.39L219.66,573.45L219.98,573.45L220.29,573.53L223.18,575.39L228.37,578.73L233.56,582.08L239.64,585.99L243.96,588.78L248.84,591.93L254.35,595.47L259.42,598.74L264.73,602.16L266.37,603.22L267.36,604.21L268.72,606.39L269.54,607.36L270.22,607.74L271.81,608.23L273.04,609.3L273.69,609.41L275.37,608.99L277.04,608.86L282.7,609.5L288.39,610.14L291.38,609.88L294.09,608.69L294.16,608.39L294.11,607.91L294.22,607.47L294.74,607.26L295.02,607.38L296.02,608.22L296.45,608.73L296.56,609.15L296.77,609.46L297.51,609.65L298.21,609.73L298.5,609.69L299.25,609.39L299.35,609.57L299.41,609.86L299.69,610.04L302.8,610.27L302.79,609.9L302.86,609.15L302.84,608.8L304.28,610.7L305.11,611.55L306.09,612.09L311.35,613.51L315.32,614.59L316.7,614.56L318.94,614.13L319.83,614.25L320.63,614.55L321.46,614.54L324.52,613.89L325.03,614.02L325.72,614.33L326.34,613.78L325.97,613.37L330.32,611L334.84,609.05L336.92,607.7L338.64,605.49L345.93,593.02L347.47,589.7L346.79,587.48L346.68,586.42L346.93,585.31L348.63,580.78L349.75,576.08L350.1,575.38L352.08,572.91L360.44,553.5L360.77,552.08L360.94,548.94L361.95,543.1L363.52,538.72L364.62,534.35L366.63,530.41L369.89,521.97L374.96,514.66L376.1,513.81L376.91,513.77L378.42,514.64L380.33,515.43L384.17,516.19L385.31,516.05L388.01,515.09L388.46,515.04L389.83,515.09L391.48,514.73L393.69,514.53L397.65,513.62L400.13,513.62L400.59,513.42L400.97,513.18L402.36,512.93L403.32,512.5L411.71,504.9L419.46,500.59L423.34,497.72L421.46,493.16L421.08,491.72L420.95,490.17L421.04,485.91L420.31,475.71L420.69,472.95L421.02,471.62L421.21,470.25L421.27,468.87L421.21,467.5L420.94,466.38L420.51,465.15L420.21,463.92L420.37,461.7L419.93,459.12L420.29,457.93L422.38,454.17L423.23,453.02L426.34,449.99L428.98,446.44L430.1,445.38L431.39,444.62L433.97,444.49L436.52,445.68L439.04,447.41L445.66,450.92L448.34,451.35L449.64,451.78L450.86,452.43L451.94,453.25L460.61,462.12L461.21,460.9L462.04,460.14L464.05,458.77L464.87,457.79L466.68,454.2L468.16,452.61L470.46,451.29L472.54,451.07L473.36,452.83L474.64,452.79L475.89,452.5L477.11,452.01L478.24,451.39L478.62,451.11L480,449.69L480.39,449.12L480.65,448.63L480.81,448.2L481.51,447.15L482.05,446.13L482.96,442.39L484.45,440.2L484.97,438.96L484.42,437.96L484.9,437.29L484.98,436.75L484.78,435.56L484.9,434.98L485.39,434.03L485.51,433.73L485.71,432.34L486.27,431.56L488.05,430.6L487.93,429.92L488.2,429.51L488.56,429.23L488.75,428.95L488.87,428.98L489.51,427.3L490.24,426.19L490.5,425.6L490.6,424.9L490.54,423.72L490.59,423.11L490.8,422.68L491.86,421.02L492.61,418.59L492.86,416.04L492.18,412.68L491.81,412.26L475.5,405.85L475,405.02L474.58,403.42L474.1,400.56L474.03,399.35L474.18,398.32L474.93,396.12L477.37,390.64L478.27,387.62L477.98,385.27L477.03,383.69L476.53,382.41L476.37,381.05L477.1,368.03L477.61,365.03L478.69,362.41L481.67,358.2L482.32,356.75L482.4,355.33L482.09,352.19L482.48,350.9L484.55,348.26L486.76,345.97L491.79,341.68L495.36,340.71L497.45,344.56L498.17,345.24L504.55,346.46L507.59,347.73L509.17,350L510.73,359.01L511.68,361.83L512.96,364.36L514.57,366.31L516.37,366.68L518.26,364.46L520.39,356.63L521.81,354.58L522.93,353.99L527.64,352.77L528.55,352.05L528.87,350.8L528.95,349.36L529.42,346.74L529.47,345.27L529.33,343.81L529.03,342.49L528.44,341.41L525.73,338.58L525.16,336.16L526.87,331.14L526.42,328.98L525.45,328.04L523.11,326.33L522.04,325.36L518.34,321.28L515.07,316.05L514.1,313.91L513.99,312.95L514.1,311.51L513.89,311.08L512.91,310.1L512.31,309.03L510.53,303.93L510.39,303.09L510.3,301.86L510.16,301.4L506.72,294.5L505,292.02L503.07,290.05L501.38,289.72L501.72,284.43L501.05,282.12L498.93,281.47L497.92,282.04L495.92,283.68L495.11,284.51L494.21,284.94L491.5,285.17L490.2,285.65L488.62,286.53L487.88,287.04L487.61,287.51L487.83,288.18L488.84,289.83L488.61,291.11L487.29,292.35L485.76,293.55L484.84,294.74L481.67,293.14L480.23,293.1L477.2,294.45L476.62,294.61L475.99,294.67L475.28,294.51L473.79,293.97L473.11,294.04L471.45,294.38L469.92,294.14L468.4,294.04L466.74,294.8L465.39,295.1L464.04,295L462.88,294.44L462.14,293.36L461.44,292.62L460.25,292.43L458.88,292.58L457.65,292.88L456.58,293.44L454.71,295.06L453.75,295.56L452.6,295.48L448.53,294.03L444.13,293.16L441.85,293.06L439.77,293.56L439.19,293.94L437.77,295.47L436.62,296.37L435.47,297.09L434.24,297.67L431.68,298.61L430.57,299.2L429.53,299.91L428.56,300.76L428.06,301.04L427.48,301.12L426.88,301.13L426.31,301.25L425.75,301.54L424.07,302.64L421.73,303.47L420.41,303.75L419.29,303.8L418.09,303.42L417.3,302.63L416.81,301.51L416.49,300.15L416.69,299.07L417.65,298.93L420.04,299.45L421.37,299.37L422.7,299L423.42,298.3L422.92,297.2L420.38,295.7L417.9,295.72L415.28,296.24L412.31,296.23L411.96,296.16L411.72,296.16L411.51,296.23L411.22,296.38L409.84,297.81L408.38,298.64L406.71,299.07L402.31,299.73L400.48,300.58L398.89,301.87L397.19,303.61L395.78,305.39L392.16,311.29L391.44,312.2L388.08,315.53L387.68,316.28L387.52,317.14L387.42,318.34L386.8,320.03L385.63,321.1L384.2,321.98L382.44,322.12L380.58,325.53L379.52,326.59L376.26,328.85L375.59,328.65L375.28,327.45L376.56,323.88L376.54,321.53L375.56,320.45L373.82,320.13L371.52,320.06L371.7,319.05L371.43,318.44L370.96,317.96L370.49,317.33L370.22,316.35L369.84,313.98L369.46,313.14L368.36,312.55L366.93,312.53L364.1,312.87L361.73,314.79L361.87,325.76L361.33,327.31L359.68,328.37L354.21,330.34L352.36,331.42L349.82,333.26L348.7,333.53L347.35,332.77L345.44,329.84L343.82,329.27L343.02,329.56L340.26,332.28L339.12,332.39L338.17,332.15L337.48,331.67L337.11,331.07L335.76,328.15L335.68,327.25L335.78,326.23L335.62,323.14L340.23,315.66L340.85,313.89L340.7,312.29L339.6,311.47L336.75,310.9L335.68,309.97L334.91,308.2L334.45,306.22L334.3,304.69L334.64,304.23L335.52,304.16L336.77,304.24L341.37,303.9L342.04,303.61L344.66,301.69L346.03,301.45L347.9,302.12L347.99,302.08L344.84,298.83L344.5,298.35L344.71,297.04L343.58,296.4L342.01,296.1L340.78,296.17L338.82,295.78L337.11,293.49L335.21,290.08L332.64,286.3L326.46,283.59L316.73,281.61L313.33,279.92L311.59,277.77L310.65,275.32L310.25,272.68L310.17,269.97L310.07,269.59L309.05,268.19L308.47,267.62L307.96,267.21L307.52,266.92L304.13,265.65L303.08,264.65L302.96,263.03L305.11,263.48zM182.98,302.06L182.95,302.06L182.31,301.02L181.06,296.75L181.62,294.68L181.92,293.87L182.58,293.1L183.63,292.4L184.59,292.18L185.53,292.42L187.29,293.72L187.56,294.16L187.55,294.8L187.14,295.23L185,296.17L184.45,297.22L184.62,298.4L185.81,300.91L184.03,300.57L183.36,300.89L183.14,302.03L182.98,302.06zM309.81,316.35L310.09,316.2L311.22,315.15L311.41,315.91L311.84,316.12L313.18,316.06L314.32,316.18L315.65,319.2L315.93,320.15L315.99,321.21L315.82,321.94L315.57,322.53L315.42,323.09L315.56,323.74L314.98,323.74L314.43,323.65L313.33,323.32L313.49,324.27L314.29,326.28L314.22,327.09L313.56,327.5L312.78,327.39L312.08,327.5L311.69,328.59L311.13,329.4L310.06,329.26L308.98,328.69L308.37,328.2L307.35,326.91L306.87,326.4L306.27,325.93L305.82,325.73L305.48,325.69L305.12,325.55L304.58,325.04L304.2,324.51L304.03,324.1L303.72,322.94L303.44,322.45L303.1,322.03L302.89,321.64L303,321.24L302.62,320.74L302.52,320.56L302.9,319.43L303.68,318.01L304.62,316.71L305.45,315.97L306.16,315.74L308.27,315.26L308.92,315.21L309.19,315.43L309.53,316.18L309.81,316.35zM173.25,322.2L172.85,323.22L172.58,324.83L172.5,326.49L172.64,327.64L173.42,327.96L173.91,328.67L173.9,329.39L173.15,329.75L173.77,330.7L174.01,331.25L174.13,331.86L173.14,331.73L172.67,331.56L172.3,331.3L171.97,330.75L171.97,330.31L172.06,329.91L171.97,329.46L171.44,328.79L170.11,327.74L169.62,326.95L168.29,328.34L167.53,328.8L166.37,328.83L166.2,328.71L165.87,328.23L165.62,328.1L165.39,328.1L164.81,328.23L164.55,328.26L163.55,328.24L163.24,328.34L163.13,328.62L162.55,328.41L162.06,328.11L161.69,327.68L161.45,327.11L161.62,326.9L161.68,326.81L161.73,326.68L161.77,326.03L161.51,324.7L161.54,324.06L161.87,323.38L162.79,322.31L163.11,321.77L163.2,320.96L163.19,319.98L163.27,319.08L163.65,318.52L164.47,318.47L166.72,319.06L167.64,319.21L168.25,318.94L168.94,319.04L169.69,319.29L170.51,319.49L170.68,319.64L170.82,319.74L171.02,319.82L170.52,320.39L170.22,320.63L170.22,320.89L170.63,321.53L171.24,322.14L171.93,322.43L172.63,322.44L173.25,322.2zM175.83,324.02L175.34,323.84L174.9,323.47L174.14,323.06L173.8,322.74L173.7,322.42L173.84,322.1L174.17,321.78L176.49,320.53L177.12,320.92L178.11,322.09L178.92,322.51L178.54,323.02L178.02,323.41L177.41,323.69L176.79,323.88L175.83,324.02zM494.43,299.6L495.24,300.78L495.25,301.25L495.05,302.64L495.03,303.22L494.92,303.85L494.29,305L494.16,305.68L494.49,306.68L495.05,307.64L495.36,308.61L494.92,309.65L494.01,310.19L493.19,309.93L491.69,308.6L490.98,308.43L490.26,308.69L489.52,309.03L488.79,309.12L488.36,308.89L487.56,308.12L487.09,307.86L486.06,307.91L484.96,308.14L484.15,307.97L484.01,306.79L484.29,305.17L484.82,303.72L486.43,300.97L487.61,299.66L488.5,299.73L489.46,300.36L490.86,300.73L492.04,300.33L493.29,299.71L494.43,299.6z" />
	<?php echo $base_link . 'cities=Addis Ababa' . $str_url . '"><circle class="or-add" cx="310" cy="321" r="12" fill="greenyellow"></circle><title>' . $GLOBALS['city_lang_arr']['Addis Ababa'] . '</title></a>'; ?>
	<text x="310" y="340" class="or big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Addis Ababa']; ?></text>
	<?php echo $base_link . 'cities=Adama' . $str_url . '"><circle class="or-adm" cx="354" cy="376" r="10" fill="greenyellow"></circle><title>' . $GLOBALS['city_lang_arr']['Adama'] . '</title></a>'; ?>
	<text x="354" y="393" class="or big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Adama']; ?></text>
	<?php echo $base_link . 'cities=Bishoftu' . $str_url . '"><circle class="or-bish" cx="334" cy="351" r="7" fill="greenyellow"></circle><title>' . $GLOBALS['city_lang_arr']['Bishoftu'] . '</title></a>'; ?>
	<text x="334" y="365" class="or mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Bishoftu']; ?></text>
	<text x="490" y="320" class="dd mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Harar']; ?></text>
	<?php echo $base_link . 'cities=Asella' . $str_url . '"><circle class="or-ase" cx="374" cy="416" r="7" fill="greenyellow"></circle><title>' . $GLOBALS['city_lang_arr']['Asella'] . '</title></a>'; ?>
	<text x="374" y="435" class="or mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Asella']; ?></text>
	<?php echo $base_link . 'cities=Jimma' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Jimma'] . '</title><circle class="or-jim" cx="200" cy="380" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="200" y="396" class="sn mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Jimma']; ?></text>
	<?php echo $base_link . 'cities=Nekemte' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Nekemte'] . '</title><circle class="or-nek" cx="197" cy="315" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="197" y="331" class="sn mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Nekemte']; ?></text>
	<?php echo $base_link . 'cities=Ambo' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Ambo'] . '</title><circle class="or-amb" cx="240" cy="320" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="240" y="310" class="sn mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Ambo']; ?></text>
	<?php echo $base_link . 'cities=Shashemene' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Shashemene'] . '</title><circle class="or-sha" cx="300" cy="410" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="325" y="405" class="sn mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Shashemene']; ?></text>

	<path class="ET-GA" title="Gambela" stroke="black" d="M101.16,364.52L99.5,364.5L98.08,363.92L97.06,362.52L96.17,360.85L95.18,360.09L92.03,359.44L90.41,358.73L89.33,357.59L87.42,354.79L85.87,353.48L80.51,350.78L77.91,348.73L73.24,344.22L70.54,342.36L68.9,341.66L67.53,341.53L66.24,341.96L63.73,343.82L63.07,343.97L62.45,343.51L61.47,342.54L60.19,341.86L59.97,343.06L59.28,344.29L58.18,345.52L52.92,350.27L51.82,350.93L50.83,351.2L47.82,351.21L45.99,351.43L45.1,351.67L44.25,352.04L43.69,352.41L41.48,354.33L41.25,354.4L40.67,354.49L38.25,354.18L36.96,352.7L35.91,350.86L34.25,349.45L33.16,349.27L32.38,349.59L31.62,350.02L30.61,350.19L29.8,349.85L29,349.2L28.1,348.68L27.02,348.73L27.31,349.13L27.29,349.33L26.79,349.61L23.2,350.04L22.51,349.88L22.08,349.92L21.68,350.13L20.95,350.7L20.44,350.87L14.65,349.58L13.72,349.72L12.19,351.07L12.24,351.28L12.4,351.6L12,351.96L11.2,352.12L10.46,352.48L10.22,352.86L10.13,353.27L10.14,354.18L10.08,354.43L9.81,354.79L9.77,355.08L9.89,355.25L10.37,355.6L10.46,355.78L10.34,356.44L9.88,357.45L9.77,357.86L9.95,358.49L10.32,359.01L10.69,359.41L11.09,360.01L11.57,360.3L12.29,360.6L12.21,361.29L11.84,361.57L11.34,361.74L10.86,362.1L10.46,362.7L10.24,363.19L10.15,363.73L10.14,364.49L10.3,364.78L11.03,365.3L11.2,365.59L11.05,366.66L10.63,367.41L9.97,367.95L9.05,368.38L7.45,368.65L7.23,368.92L7.12,369.37L6.87,369.92L6.55,370.43L3.52,373.53L2.85,374.45L2.58,374.99L2.34,376.12L2.08,376.49L1.83,376.76L1.59,377.26L1.55,377.35L0.84,378.12L0.64,378.7L1.99,382.29L2.44,383.12L3.36,383.67L3.57,384.13L3.73,384.62L3.92,384.95L4.29,385.12L5.74,385.28L6.92,385.81L7.63,385.91L7.95,385.46L8.23,385.34L9.95,384.95L10.4,385.03L11.92,385.65L13.65,385.91L14.1,386.05L14.92,386.76L15.76,387.74L16.72,388.61L19.68,389.37L20.36,389.35L21.67,388.48L22.14,388.25L24.45,387.78L25.82,387.73L26.74,388.07L27.22,388.44L28.19,388.72L28.72,388.99L29.24,389.47L29.98,390.45L30.54,390.86L31.68,391.18L35.14,390.86L35.7,391L37.16,391.96L38.84,392.44L39.34,392.69L40.06,393.5L41.74,395.86L44.43,397.86L44.96,398L46.06,398.13L46.61,398.26L48.21,399.2L54.82,405.98L55.73,407.46L56.1,409.27L56.13,414.28L56.26,414.56L56.6,414.72L59.05,416.64L60.5,418.46L61.53,419.22L62.53,419L63.41,418.58L64.14,419.02L64.65,419.97L64.9,421.07L64.9,422.75L66.09,422.25L67.66,423.14L69.22,424.49L70.44,425.37L71.82,425.5L73.18,425.16L75.76,424.1L77.72,423.69L79.82,423.67L81.81,424.15L83.43,425.21L84.82,426.34L86.37,427.04L88.03,427.35L89.76,427.32L91.47,427.01L92.71,426.49L93.82,425.67L95.14,424.47L96.65,423.33L98.17,422.65L99.81,422.33L101.71,422.24L104.93,422.39L106.33,421.98L107.01,420.69L108.05,421.05L109.31,420.78L110.47,420.09L111.22,419.18L112.17,420.07L113.48,420.86L114.89,421.46L116.13,421.8L117.46,421.73L119.71,420.69L120.99,420.44L124.08,421.05L125.33,420.88L125.74,419.61L125.6,419.18L125.08,418.15L124.95,417.61L124.98,417.04L125.18,415.93L125.2,415.38L125.32,414.63L125.94,413.23L126.01,412.51L125.97,411.77L126.06,411.05L127.11,407.36L127.24,406.22L126.85,405.12L125.96,404.26L122.28,402.29L121.77,401.59L122.31,400.02L121.8,399.01L121.9,400.16L121.22,401.13L120.15,401.9L119.09,402.47L118.57,402.81L118.24,403.1L117.9,403.2L116.62,402.65L115.87,402.5L114.27,402.45L113.3,402.04L113.58,401.13L114.42,400.14L115.15,399.47L115.59,398.58L114.89,397.92L109.52,396.01L108.72,395.37L108.27,394.28L107.93,391.73L107.41,390.57L105.62,388.82L103.7,387.35L102.01,385.69L100.9,383.38L100.86,380.85L101.75,378.63L105.12,373.84L105.4,373.14L105.12,372.57L102.49,371.75L102.03,371.15L102.51,370.5L104.89,369.46L108.12,367.65L110.81,366.75L112.17,366.11L112.57,365.34L110.95,364.15L108.08,363.78L105.04,363.92L101.16,364.52z" />
	<?php echo $base_link . 'cities=Gambela' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Gambela'] . '</title><circle class="gm-gm" cx="77" cy="370" r="10" fill="greenyellow"></circle></a>'; ?>
	<text x="77" y="390" class="gm big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Gambela']; ?></text>

	<path class="ET-SN" title="SNNP" stroke="black" d="M303.64,369.23L304.15,368.12L304.16,366.89L304,365.61L304.01,364.37L304.9,360.75L303.68,359.9L302.96,359.16L302.77,358.23L303.34,355.61L303.17,354.36L302.72,353.17L302.05,352.16L298.71,350.5L297.83,349.74L296.69,349.63L295.5,349.88L294.48,350.2L294.14,350.38L292.97,351.66L292.16,352.76L291.93,353.2L291.8,353.61L291.14,357.07L290.7,357.99L289.09,359.3L286.87,360.06L284.92,359.72L284.13,357.71L283.9,355.48L283.57,354.32L283.39,353.92L283.17,353.6L282.37,352.79L281.46,352.18L280.39,351.94L277.43,352.66L270.16,353.58L260.13,356.08L258.75,356.12L255.16,355.34L253.97,355.4L253.16,355.64L252.4,355.67L251.36,355.07L247.82,354.62L246.65,354.65L245.91,353.55L245.22,352.14L244.21,351.19L242.96,351.14L241.89,351.71L241.02,352.62L240.39,353.62L239.45,355.97L239.22,357.51L239.52,358L239.78,358.94L239.95,359.22L240.37,359.63L241.22,360.24L242.07,360.59L246.05,361.6L246.54,361.89L246.56,362.53L245.95,367.18L245.88,371.04L246.09,372.09L247.01,373.77L247.32,374.74L247.34,375.57L247.19,376.16L245.72,376.59L244.63,376.83L243.54,376.67L242.75,376.1L241.67,373.91L240.3,373.29L238.61,373.52L235.35,374.43L235.35,375.92L237.27,378.04L237.64,379.55L237.37,380.49L236.4,382.38L236.07,383.36L235.94,384.39L235.9,389.86L236.32,391.92L237.59,396.07L237.63,396.74L236.19,402.38L235.9,402.76L235.61,403.83L235.37,406.29L234.67,407.95L234.52,408.19L233.86,407.97L232.11,409.05L226.8,411.49L223.31,414.21L221.75,415.08L220.04,415.37L215.8,415.1L211.95,415.81L209.99,415.96L207.56,415.69L205.12,415.05L202.81,414.05L193.66,407.94L192.63,407.94L188.47,406.15L187.28,405.78L186.26,405.62L183.95,405.65L183.47,405.61L181.51,405.02L180.8,404.67L179.84,404.03L179.42,403.9L178.21,403.71L174.99,402.52L172.67,401.32L170.7,399.8L168.64,398.54L164.49,397.93L163.55,397.33L163.18,396.3L163.31,394.86L163.57,393.4L163.5,392.58L162.28,390.66L161.04,388.01L160.38,387.26L159.59,386.76L157.8,385.95L154.52,383.92L153.53,382.93L153.48,381.94L155,380.01L155.65,378.99L156.03,377.79L156,376.5L154.54,371.45L154.12,370.61L153.42,370.08L152.23,369.78L150.99,369.65L149.73,369.7L148.61,370.07L147.8,370.9L146.6,372.79L146.57,373.78L147.52,374.83L149.34,376.09L150.17,376.88L150.54,377.69L150.16,378.62L149.22,379.72L148.14,380.7L147.31,381.27L146.92,381.41L145.2,381.7L144.14,382.09L143.44,382.44L141.37,383.79L140.22,384.29L139.05,384.33L137.62,383.72L137.06,382.85L136.77,381.78L136.17,380.56L133.88,380.49L132.75,380.83L131.89,380.76L131.1,380.79L130.19,381.41L129.92,381.65L128.63,382.5L128.02,382.64L127.07,382.62L126.77,382.76L126.17,383.91L126.12,385.07L125.91,386.1L123.72,387.51L122.34,389.41L121.44,390.14L120.68,391.64L120.79,394.24L121.8,399.01L122.31,400.02L121.77,401.59L122.28,402.29L125.96,404.26L126.85,405.12L127.24,406.22L127.11,407.36L126.06,411.05L125.97,411.77L126.01,412.51L125.94,413.23L125.32,414.63L125.2,415.38L125.18,415.93L124.98,417.04L124.95,417.61L125.08,418.15L125.6,419.18L125.74,419.61L125.33,420.88L124.08,421.05L120.99,420.44L119.71,420.69L117.46,421.73L116.13,421.8L114.89,421.46L113.48,420.86L112.17,420.07L111.22,419.18L110.47,420.09L109.31,420.78L108.05,421.05L107.01,420.69L106.33,421.98L104.93,422.39L101.71,422.24L99.81,422.33L98.17,422.65L96.65,423.33L95.14,424.47L93.82,425.67L92.71,426.49L91.47,427.01L89.76,427.32L88.03,427.35L86.37,427.04L84.82,426.34L83.43,425.21L81.81,424.15L79.82,423.67L77.72,423.69L75.76,424.1L73.18,425.16L71.82,425.5L70.44,425.37L69.22,424.49L67.66,423.14L66.09,422.25L64.9,422.75L64.9,423.33L65.04,424.54L65.45,425.07L65.86,425.21L66.19,425.52L66.72,426.21L68.9,427.81L69.16,428.14L69.43,429.07L69.8,429.32L70.16,429.49L70.33,429.68L77.87,431.49L81.31,433.9L81.77,434.61L82.13,435.42L82.36,436.36L82.43,437.41L82.32,437.56L81.82,437.91L81.71,437.96L81.76,438.29L82,438.84L82.07,439.06L82.43,441.26L83.05,441.79L83.99,441.99L86.27,441.99L87.43,442.14L88.34,442.5L91.96,444.91L92.29,445.49L92.54,446.48L93.19,447.21L93.56,447.44L94.09,449.63L94.64,451.8L95.83,454.86L96.26,457.95L96.71,459.03L98.84,462.68L99.18,464.07L99.22,467.23L99.48,468.3L101.36,471.57L102.37,474.2L103.26,475.21L104.26,476.14L105.17,477.28L105.6,478.32L106.05,481.19L106.15,481.81L105.59,482.94L105.4,483.55L105.38,484.17L105.65,484.75L106.52,485.7L106.69,486.3L106.57,487.06L106.4,487.67L106.3,488.26L106.4,488.96L106.92,490.14L111.24,496.28L112,497.71L112.46,500.82L113.02,501.85L115.39,503.61L119.66,506.1L121.72,507.77L122.11,508.84L122.34,509.48L122.02,510.09L121.56,510.65L121.18,511.22L121.12,511.88L121.33,512.37L123.08,515.14L123.87,516.04L124.85,516.5L126.14,516.31L127.34,515.47L129.51,513.09L130.68,512.3L131.64,512.11L132.76,512.11L133.88,512.26L134.83,512.5L136.04,513.22L138.34,515.08L139.63,515.43L140.9,515.16L141.85,514.72L142.84,514.48L144.19,514.85L147.69,517.01L150.61,518.15L150.87,518.62L149.43,520.72L149.07,521.97L149.24,523.01L150.29,525.03L150.77,526.32L150.78,527.42L150.34,528.49L148.31,531.08L148.04,531.77L147.81,542.95L148.26,545.55L149.56,547.77L156.82,555.52L156.93,556.44L157.63,557.7L157.69,558.73L157.53,559.8L157.51,560.71L157.87,561.46L158.82,562.06L160.89,563.87L162.02,564.61L163.25,564.9L163.46,564.9L171.24,564.84L173.07,564.59L173.63,564.59L174.16,564.73L175.13,565.2L175.81,565.29L185.72,565.09L194.05,564.92L194.52,565.02L195.3,565.5L195.62,565.57L196.25,564.98L198.1,564.32L199.13,563.64L199.44,563.33L199.62,562.99L200.38,560.8L201.37,558.66L203.89,554.72L207.75,549.81L209.14,547.02L209.48,543.92L209.13,542.51L207.96,539.92L207.6,538.55L207.63,537.35L210.11,529.39L211.23,527.12L212.81,525.2L214.03,524.5L215.32,524.37L219.35,524.99L220.64,524.99L225.72,524.25L226.53,524.22L228.17,524.39L229.55,524.76L231.75,526.05L233.02,526.49L235.83,526.32L238.62,525.24L243.88,522.45L246.27,521.6L247.51,521.01L248.23,520.31L248.87,519.34L249.77,518.66L250.87,518.42L252.08,518.71L254.64,519.75L257.19,520.45L258.17,521.07L259.17,521.94L260.26,522.58L261.52,522.52L262.31,521.82L262.68,520.76L262.75,519.55L262.46,516.97L262.53,515.88L262.89,514.86L263.59,513.59L264.55,511.28L265.08,508.54L265.1,505.76L264.28,502.06L264.63,501.09L265.51,500.45L268.12,499.98L271.5,498.25L272.28,497.39L272.5,496.05L272.13,494.78L271.14,494.15L269.89,493.73L269.01,492.87L268.46,491.72L267.92,489.21L266.87,486.92L266.58,485.62L266.1,484.73L264.96,484.11L259.6,481.88L257.87,481.53L256.65,481.16L256.29,480.42L256.38,479.04L255.78,475.1L255.89,473.79L256.39,472.67L257.86,470.59L258.88,468.56L259.79,465.77L260.01,462.97L258.96,460.97L257.19,458.86L257.09,456.62L258.07,454.35L260.56,450.83L262.4,449.9L275.81,426.04L273.95,425.57L272.5,424.81L271.59,423.87L271.32,422.84L271.5,420.83L271.86,418.95L272.66,417.32L274.15,416.05L281.45,411.43L282,410.7L282.5,408.48L282.98,407.38L284.45,405.68L285.07,404.57L285.47,403.34L285.87,402.47L286.59,401.82L287.95,401.23L289.12,400.85L290.02,400.42L290.52,399.68L290.5,398.37L289.97,394.33L290.12,391.76L290.31,390.85L291.2,388.83L291.55,387.75L292.05,386.77L293.96,384.86L295.12,382.71L297.49,379.82L299.2,376.92L299.96,374.73L300.42,373.75L300.57,373.16L299.81,369.08L299.23,367.2L299.09,366.43L298.66,365.11L297.04,362.81L296.66,361.66L299.79,360.63L300.26,361.69L301.27,366.05L301.69,366.92L302.29,367.74L303.64,369.23zM280.4,456.7L280.42,456.66L281.36,456.89L283.3,458.64L283.41,460.87L282.06,462.83L278.62,464.11L277.99,464.9L277.16,466.9L277.04,468.03L278.03,470.05L277.9,471.36L277.02,472.56L275.91,472.99L274.71,472.82L273.58,472.2L272.76,472.24L272.34,473.39L272.28,474.9L272.52,475.99L279.06,487.5L280.1,488.87L281.28,489.06L282.42,488.8L283.54,488.74L284.64,488.56L288.51,486.01L288.69,485.38L288.13,484.77L284.99,483.01L283.58,481.59L283.26,481L283.42,480.6L284.34,479.78L285.03,478.8L286.8,475.54L287.46,473.35L288.1,472.39L289.29,471.48L290.26,470.92L290.87,470.15L290.99,468.58L290.33,464.02L290.66,461.35L291.75,459.53L293.62,458.46L296.29,458.02L298.45,456.7L280.4,456.7z" />
	<?php echo $base_link . 'cities=Arba Minch' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Arba Minch'] . '</title><circle class="sn-arb" cx="230" cy="500" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="230" y="516" class="sn big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Arba Minch']; ?></text>
	<?php echo $base_link . 'cities=Sodo' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Sodo'] . '</title><circle class="sn-sod" cx="245" cy="440" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="245" y="455" class="sn mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Sodo']; ?></text>
	<?php echo $base_link . 'cities=Dila' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Dila'] . '</title><circle class="sn-dil" cx="284" cy="468" r="5" fill="greenyellow"></circle></a>'; ?>
	<text x="284" y="485" class="sn mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Dila']; ?></text>
	<?php echo $base_link . 'cities=Hosaena' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Hosaena'] . '</title><circle class="sn-hos" cx="242" cy="415" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="245" y="429" class="sn mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Hosaena']; ?></text>

	<path class="ET-SN" title="SID" stroke="black" d="M262.41,449.99L263.59,450.96L263.91,451.15L265.61,451.23L266.29,451.13L267.6,450.68L268.76,450.83L269.6,451.57L270.38,452.47L271.37,453.06L271.94,453.27L274.16,454.61L275.19,455.55L276.54,457.11L277.18,457.23L278.29,456.91L279.38,458.11L300.57,458.49L304.63,459.69L304.97,459.75L306.45,459.79L308.37,459.55L308.5,459.91L309.06,460.9L309.52,461.39L313.54,463.26L313.82,463.78L315.06,465.29L316.62,468.06L317.62,469.67L317.98,470.91L317.98,471.26L320.55,473.49L322.86,473.69L328.09,472.97L327.33,472.04L326.82,471L325.94,468.68L325.83,467.46L326.4,466.43L327.2,465.41L327.75,464.22L327.76,461.8L326.47,456.98L326.17,454.58L325.85,453.57L324.99,452.61L321.04,448.97L318.96,447.6L318.38,446.86L317.56,446.19L316.19,445.83L313.63,445.63L312.74,445.45L305.77,441.88L303.98,441.3L302.97,440.7L302.14,440L301.72,439.4L301.56,437.52L303.08,429.43L301.87,426.3L300.24,423.79L298.56,422.41L297.16,422.66L295.4,423.43L293.58,422.74L291.85,421.65L290.35,421.23L288.31,420.84L286.62,419.75L285.26,419.33L284.16,420.94L283.7,421.78L281.56,424.3L280.69,424.96L275.81,426.04L273.95,425.57L272.5,424.81L271.59,423.87L271.32,422.84L271.5,420.83L262.41,449.99z" />
	<?php echo $base_link . 'cities=Hawassa' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Hawassa'] . '</title><circle class="sn-awa" cx="288" cy="440" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="288" y="455" class="sn big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Hawassa']; ?></text>


	<path class="ET-AF" title="Afar" stroke="black" d="M393.03,29.97L388.95,26.16L386.85,24.9L384.54,23.95L379.76,22.78L378.81,22.79L376.18,23.57L375.42,23.59L374.18,23.37L373.76,23.56L373.25,23.92L373.37,24.38L373.42,25.12L373.33,26.53L373.29,26.71L372.95,27.45L372.58,27.93L372.41,28.07L372.24,28.15L370.82,28.33L366.79,27.86L364.64,27.23L363.76,27.14L360.05,27.86L358.35,28.85L356.9,30.05L356.5,30.56L356.53,31.03L357.77,31.69L361.02,31.4L361.84,32.16L361.69,32.89L359.27,35.49L357.92,38.34L357.69,39.33L358.08,39.68L358.86,39.65L359.76,39.71L360.68,39.93L361.47,40.41L359.71,42.37L359.46,42.83L359.86,43.84L360.62,43.88L361.45,43.54L362.07,43.4L362.72,43.99L363.11,44.99L363.3,46.1L363.34,47.05L363.11,49.06L363.11,49.84L363.44,50.47L364.22,51.09L364.42,51.53L364.53,51.9L364.57,52.23L364.64,55.42L363.63,60.54L363.4,62.93L363.82,64.9L364.53,66.86L365.02,69.54L364.75,71.9L363.21,72.87L361.19,71.91L360.75,72.62L359.48,76.84L359.52,78.2L360.4,80.42L360.55,81.81L360.41,83.13L359.32,88.67L359.43,89.37L359.81,90.26L359.96,90.49L360.76,91.37L361.08,91.59L361.6,91.84L361.77,91.98L362.09,92.59L362.92,96.78L363.24,97.34L363.87,98.07L363.94,98.4L363.64,99.33L363.06,100.29L362.37,100.98L361.68,101.09L361.92,103.66L361.88,104.74L361.63,106.28L361.65,107.47L361.48,108.09L361.1,108.98L361.2,109.24L362.82,110.59L363.6,110.98L364.78,111.12L365.88,111.46L366.74,112.3L368.07,114.46L368.42,116.26L368.18,118.83L367.55,121.33L366.71,122.9L364.9,124.88L363.76,126.9L363.13,129.17L362.9,131.9L363.06,132.81L363.83,134.49L363.98,135.62L363.96,136.88L363.83,138.13L363.39,139.23L362.45,140.06L361.58,142.63L361.47,143.19L361.46,143.78L361.51,144.52L361.9,146.12L363.24,148.94L363.67,150.42L363.66,151.2L363.55,151.88L363.62,152.56L364.6,154L364.94,154.75L365.14,155.56L365.24,156.39L365.21,157.98L365.27,158.74L365.56,159.52L365.93,160.22L366.21,160.65L366.61,161.14L367.88,161.9L367.98,162.17L367.56,167.44L367.62,168.92L367.96,170.02L369.85,173.44L370.8,174.58L371.91,175.52L373.07,176.07L373.35,176.26L373.53,176.63L373.84,177.81L374.19,180.6L374.68,181.82L376.98,185.56L377.45,186.85L377.88,189.84L377.89,191.43L377.77,193.02L379.41,194.8L380.43,195.71L381.22,196.79L383.35,200.72L383.9,202.11L384.23,203.58L384.38,206.16L384.66,208.04L384.65,209.05L384.43,210L384.03,210.79L381.04,215.36L382.4,216.81L382.98,218.29L382.86,219.75L382.29,221.18L380.75,223.9L380.31,225.07L380.32,226.28L380.94,227.72L382.6,229.77L382.92,230.46L382.93,231.63L382.38,234.29L382.38,235.61L383.62,239.52L383.67,239.86L383.66,240.24L383.46,241.29L382.83,242.46L382.53,243.53L382,250.39L381.81,251.37L380.83,253.89L380.63,255.36L380.8,256.78L381.11,258.2L381.3,259.64L381.2,260.72L380.8,261.07L380.02,260.96L378.79,260.65L377.68,260.47L376.35,260.45L375.1,260.72L374.22,261.43L373.66,262.79L373.76,263.91L374.42,264.87L375.57,265.76L377.21,266.72L378.29,267.51L378.79,268.67L378.73,270.71L378.3,271.88L376.8,274.01L376.33,275.07L374.87,276.94L374.87,277.66L375.16,278.28L375.52,278.88L375.74,279.55L375,281.05L372.94,281.04L368.47,279.78L366.32,280.35L366.48,282.52L368.44,287.61L368.58,290.41L368.23,293.13L367.2,295.56L365.28,297.5L364.15,298.32L363.39,299.17L363.25,300.03L364.01,300.91L364.56,301.14L366.01,301.52L366.71,301.87L368.6,303.35L368.55,305.9L367.12,308.4L365.32,310.76L364.1,312.87L366.93,312.53L368.36,312.55L369.46,313.14L369.84,313.98L370.22,316.35L370.49,317.33L370.96,317.96L371.43,318.44L371.7,319.05L371.52,320.06L373.82,320.13L375.56,320.45L376.54,321.53L376.56,323.88L375.28,327.45L375.59,328.65L376.26,328.85L379.52,326.59L380.58,325.53L382.44,322.12L384.2,321.98L385.63,321.1L386.8,320.03L387.42,318.34L387.52,317.14L387.68,316.28L388.08,315.53L391.44,312.2L392.16,311.29L395.78,305.39L397.19,303.61L398.89,301.87L400.48,300.58L402.31,299.73L406.71,299.07L408.38,298.64L409.84,297.81L411.22,296.38L411.7,292.63L412.67,288.72L413.46,286.7L418.2,279.34L421.12,276.05L427.85,270.19L428.63,268.99L428.14,268.25L425.79,267.3L424.91,266.52L424.45,265.15L424.44,263.8L432.08,234.33L432.11,232.83L431.8,230.58L431.91,229.55L432.39,228.47L434.23,226.22L438.35,222.16L439.86,219.67L440.18,218.28L440.38,216.8L440.81,215.42L441.88,214.32L443.04,213.94L464.3,214.09L465.83,213.94L466.84,213.54L467.74,212.98L468.3,212.73L468.31,212.72L468.04,212.36L468.99,210.81L469.33,208.49L469.46,198.05L468.8,192.14L467.42,185.89L467.39,182.92L468.96,177.99L469.69,173.87L470.54,172.14L471.32,171.6L473.42,170.68L473.94,169.98L474.24,169.2L474.69,168.88L475.29,168.7L476.04,168.34L476.78,167.77L477.36,167.17L479.41,164.26L483.81,157.98L485.96,153.95L486.55,153.3L487.81,152.68L488.23,152.01L489.04,150.02L496.14,140.28L497.76,136.71L500.97,132.37L498.43,129.67L494.08,123.74L490.61,117.79L488.07,115.59L485.11,113.91L482.07,112.65L477.91,109.97L475.12,106.04L470.98,97.03L469.29,94.19L467.47,91.8L465.4,89.63L461.33,86.27L455.75,81.64L446.5,75.7L439.31,71.08L437.7,69.47L433.94,62.77L429.79,55.4L424.15,48.95L418.58,42.58L415.34,40.25L411.72,38.88L406.91,38.19L405.4,37.7L399.75,34.97L396.65,33.35L393.03,29.97z" />
	<?php echo $base_link . 'cities=Asaita' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Asaita'] . '</title><circle class="af-asa" cx="445" cy="179" r="10" fill="greenyellow"></circle></a>'; ?>
	<text x="445" y="200" class="af big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Asaita']; ?></text>

	<path class="ET-TI" title="Tigray" stroke="black" d="M261.83,0L259.65,5.27L256.19,13.63L252.76,21.91L249.42,29.98L246.36,37.36L244.43,41.99L243.83,42.6L242.87,41.98L242.32,41.32L242.07,40.41L242.01,39L241.85,38.48L241.44,38.06L240.89,37.79L240.34,37.69L239.66,37.43L239.34,36.81L239.07,35.44L238.68,34.41L238.45,34.08L236.29,32.26L235.52,31.81L235.37,31.23L235.4,29.98L235.32,29.16L235.12,28.71L234.31,27.89L232.29,24.96L231.28,24.37L229.98,23.25L229.25,23.36L228.09,23.76L224.14,23.68L222.31,24.1L220.78,25.26L219.97,26.45L219.54,27.54L219.36,28.66L219.33,29.98L219.18,31.13L218.78,32.03L218.2,32.72L217.54,33.18L217.12,33.27L216.15,33.15L215.72,33.18L214.94,33.83L214.63,33.94L214.08,33.88L213.62,33.73L213.2,33.5L212.78,33.18L211.81,31.86L211.5,31.65L209.73,31.41L206.26,30.38L204.54,30.15L200.9,30.15L200.39,30.27L199.52,30.81L199.07,30.93L196.67,30.93L195.6,31.11L193.95,31.89L193.22,32.06L192.08,32.09L191.18,32.3L190.51,32.86L190.12,33.94L189.09,33.92L184.31,48.88L184.07,50.05L184.09,51.44L184.38,52.79L185.31,55.53L185.46,58.27L184.49,60.68L185.22,61.23L189,69.54L189.74,70.39L190.62,70.4L197.64,72.23L198.67,72.65L204.55,78.17L207.52,79.95L208.8,81.49L209.79,81.89L216.03,82.76L217.16,82.79L217.88,82.31L218.5,81.66L221.39,80.08L221.79,79.95L222.93,79.71L224.62,79.56L225.96,79.84L227.53,80.52L228.94,81.46L229.81,82.52L230.26,82.95L231.04,83.1L240.25,83.4L241.82,83.09L249.19,79.57L250.04,78.89L250.81,78.03L251.32,77.02L252.62,73.19L253.88,72.23L255.95,72.24L261.84,73.66L268.95,77.22L270.73,77.53L271.41,77.3L272.5,76.73L273.54,76.02L274.04,75.36L274.89,74.46L276.82,74.59L279.5,75.04L282.59,75.13L287.86,74.41L288.95,73.89L289.77,73.01L290.29,72.1L290.83,71.33L291.73,70.89L292.33,71.05L292.87,71.65L293.27,72.6L293.47,73.79L291.86,77.59L292.16,77.83L296.64,76.64L297.9,76.16L298.73,75.97L299.8,75.89L303.59,76.28L303.7,76.67L304.43,78.32L304.81,80.67L305.18,81.65L306.05,82.06L307.37,82.68L319.28,94.53L320.67,96.24L320.97,97.98L320.91,99L321.02,100.32L321.29,101.57L321.67,102.38L322.36,102.82L323.31,103.01L326.02,102.98L331.85,101.91L332.85,102.33L333.32,103.39L333.52,105.09L333.92,106.85L334.56,108.82L335.05,111.21L334.95,114.25L331.04,121.45L330.74,123.28L331.14,125.2L333.31,130.71L333.87,136.72L334.11,137.93L334.66,139.41L335.43,140.74L336.35,141.52L336.83,141.63L340.76,141.47L340.83,141.27L341.01,140.05L342.64,139.66L349.34,139.91L349.82,140.76L349.98,141.92L349.87,143.07L349.56,143.92L349.63,144.09L354.44,141.22L355.01,141.07L358.83,140.83L360.68,140.55L362.45,140.06L363.39,139.23L363.83,138.13L363.96,136.88L363.98,135.62L363.83,134.49L363.06,132.81L362.9,131.9L363.13,129.17L363.76,126.9L364.9,124.88L366.71,122.9L367.55,121.33L368.18,118.83L368.42,116.26L368.07,114.46L366.74,112.3L365.88,111.46L364.78,111.12L363.6,110.98L362.82,110.59L361.2,109.24L361.1,108.98L361.48,108.09L361.65,107.47L361.63,106.28L361.88,104.74L361.92,103.66L361.68,101.09L362.37,100.98L363.06,100.29L363.64,99.33L363.94,98.4L363.87,98.07L363.24,97.34L362.92,96.78L362.09,92.59L361.77,91.98L361.6,91.84L361.08,91.59L360.76,91.37L359.96,90.49L359.81,90.26L359.43,89.37L359.32,88.67L360.41,83.13L360.55,81.81L360.4,80.42L359.52,78.2L359.48,76.84L360.75,72.62L361.19,71.91L363.21,72.87L364.75,71.9L365.02,69.54L364.53,66.86L363.82,64.9L363.4,62.93L363.63,60.54L364.64,55.42L364.57,52.23L364.53,51.9L364.42,51.53L364.22,51.09L363.44,50.47L363.11,49.84L363.11,49.06L363.34,47.05L363.3,46.1L363.11,44.99L362.72,43.99L362.07,43.4L361.45,43.54L360.62,43.88L359.86,43.84L359.46,42.83L359.71,42.37L361.47,40.41L360.68,39.93L359.76,39.71L358.86,39.65L358.08,39.68L357.69,39.33L357.92,38.34L359.27,35.49L361.69,32.89L361.84,32.16L361.02,31.4L357.77,31.69L356.53,31.03L356.5,30.56L356.9,30.05L358.35,28.85L360.05,27.86L363.76,27.14L364.64,27.23L366.79,27.86L370.82,28.33L372.24,28.15L372.41,28.07L372.58,27.93L372.95,27.45L373.29,26.71L373.33,26.53L373.42,25.12L373.37,24.38L373.25,23.92L373.76,23.56L374.18,23.37L373.11,23.18L372.13,23.43L370.49,24.83L369.45,25.12L368.44,24.95L367.63,24.56L364.83,22.11L363.36,21.18L361.76,20.64L360.07,20.7L359.42,20.81L357.01,21.22L355.58,21.09L352.84,20.27L352.54,20.11L352.21,19.79L351.13,18.47L350.32,17.79L349.26,17.19L348.34,17.17L347.92,18.27L346.98,19.56L344.8,20.63L340.43,21.85L339.42,21.91L336.54,21.44L335.21,21.65L334.49,22.31L333.32,24.18L331.99,24.2L330.89,22.16L329.34,17.6L328.61,16.42L327.69,15.28L326.62,14.29L325.45,13.56L324.92,13.34L323.4,12.99L321.5,12.77L321.42,12.58L320.73,13.26L320.65,14.18L320.73,15.2L320.57,16.22L319.82,17.21L318.72,17.9L316.51,18.94L314.75,20.56L313.76,21.26L311.39,21.49L308.21,22.81L307.2,23.05L306.21,23.14L305.24,23.04L304.27,22.72L303.23,22.68L299.93,24.4L297.95,24.93L293.88,25.4L291.26,25.38L290.8,25.51L290.36,25.46L289.7,24.96L289.41,24.47L289.05,23.28L288.62,22.87L285.76,21.31L284.93,20.65L284.31,19.84L283.88,18.87L283.37,16.79L283.03,16.08L282.47,15.65L281.85,15.3L281.34,14.83L281.08,14.29L280.82,12.77L280.71,12.51L280.38,11.68L279.83,11.01L279.01,10.67L277.75,10.59L274.72,11.12L273.75,10.94L267.97,8.55L267.53,8.19L267.23,7.65L267.19,7.17L267.07,6.74L266.55,6.34L265.95,6.24L265.72,5.97L265.6,5.6L265.4,5.21L265.37,5.03L265.38,4.45L265.35,4.23L265.17,4.04L264.65,3.98L264.42,3.78L263.4,1.76L262.76,0.82L261.83,0z" />
	<?php echo $base_link . 'cities=Axum' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Axum'] . '</title><circle class="ti-aux" cx="302" cy="40" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="302" y="54" class="ti mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Axum']; ?></text>
	<?php echo $base_link . 'cities=Mekele' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Mekele'] . '</title><circle class="ti-mek" cx="326" cy="62" r="10" fill="greenyellow"></circle></a>'; ?>
	<text x="336" y="82" class="ti big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Mekele']; ?></text>
	<?php echo $base_link . 'cities=Adigrat' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Adigrat'] . '</title><circle class="ti-adg" cx="348" cy="27" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="348" y="44" class="ti mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Adigrat']; ?></text>

	<path class="ET-AM" title="Amhara" stroke="black" d="M217.16,82.79L216.03,82.76L209.79,81.89L208.8,81.49L207.52,79.95L204.55,78.17L198.67,72.65L197.64,72.23L190.62,70.4L189.74,70.39L189,69.54L185.22,61.23L184.49,60.68L182.27,66.17L182.08,67.28L181.89,70.38L181.4,71.93L173.49,83.4L168.34,101.42L168.42,102.47L168.84,103.34L169.01,103.81L169.03,104.28L168.55,105.08L167.76,105.88L167.14,106.81L167.19,108.02L168.43,110.2L168.67,111.02L168.68,112.35L167.63,118.42L167.17,119.49L166.34,119.83L164.89,119.43L164.4,119.16L164.09,118.93L163.74,118.75L163.09,118.64L162.64,118.65L146.57,120.99L145.2,121.45L145.13,121.48L144.4,121.82L144.21,121.99L144.22,122.28L143.86,123.68L143.78,124.26L143.59,124.82L143.06,125.4L142.59,125.6L141.56,125.68L141.11,125.87L140.63,126.41L130.6,143.23L130.04,144.75L129.89,146.27L129.74,146.95L129.25,147.69L128.69,148.14L127.53,148.76L127.01,149.2L126.61,149.82L125.66,152.2L125.13,155.19L124.67,156.48L123.63,157.69L121.63,158.84L121.15,159.32L121,159.82L120.99,160.07L122.4,161.28L124.44,166.15L125.92,167.74L127.28,168.9L128.52,169.54L129.67,169.54L132.65,168.57L134.18,168.32L135.66,168.45L136.76,168.29L137.87,167.38L139.17,166.03L145.91,160.7L146.75,159.51L148.21,155.96L148.55,155.71L150.77,155.91L152.39,155.91L152.91,155.99L153.07,156.28L153.59,157.03L154.96,157.21L156.44,157.22L157.31,157.45L157.55,157.7L158.87,158.46L159.33,159.09L160.02,160.54L160.67,161.28L162.93,163.16L163.17,163.49L165.01,166.59L166.33,168.13L166.88,169.43L167.27,172.18L168.05,174.63L169.12,175.14L170.19,174.99L171.19,174.37L173.43,171.96L175.55,170.13L177.61,168.64L178.84,168.21L179.22,168.8L178.96,172.42L179.2,177.26L179.82,178.28L181.62,180.11L184.71,184.89L184.81,185.31L184.18,186.21L183.11,187.27L182.67,188.4L183.93,189.49L184.83,190.05L188.07,193.37L187.94,195.52L187.1,197.13L186.13,198.42L185.62,199.65L185.74,200.62L186.03,201.75L186.13,202.87L185.7,203.83L185.5,204.5L187.09,207.93L185.78,210.3L184.29,211.88L181.55,214.01L180.7,214.89L179.8,216.02L179.12,217.14L178.97,218L178.99,218.72L177.67,221.77L177.53,223.4L177.54,224.94L177.65,225.91L177.81,225.85L178.28,224.75L179.05,224.01L180.06,223.64L181.26,223.66L181.98,224.58L178.51,232.54L178.9,235.54L179.7,237.84L180.76,239.59L181.93,240.94L183.22,241.77L184.49,241.87L187.12,240.61L187.7,240.51L188.31,240.75L188.87,241.54L188.88,242.45L188.72,243.42L188.8,244.37L189.52,245.41L190.58,245.81L193.03,245.78L199.11,246.34L199.61,246.31L200.9,245.93L201.37,245.96L201.69,246.21L201.97,246.56L202.31,246.9L202.81,247.16L203.37,247.31L205.86,247.46L206.94,247.7L209.12,248.48L216.79,249.96L218.35,251.23L219.35,251.81L220.39,252.18L223.97,252.19L224.79,252.58L224.97,254.06L224.17,255.59L223.54,257.24L224.24,259.07L225.52,260.39L226.02,260.67L226.36,260.75L226.67,260.72L227.31,260.58L228.02,260.61L228.92,260.83L229.74,261.23L230.18,261.78L230.27,262.42L230.29,263.61L230.48,264.22L230.74,264.72L231.09,265.17L231.54,265.42L232.1,265.35L232.68,264.73L232.87,263.94L233.13,263.26L233.92,262.97L235.76,263.18L237.55,263.73L242.64,265.99L243.39,266.56L244.46,268.06L245.73,269.5L245.99,270.17L246.8,271.12L251.78,274.85L252.63,274.81L254.14,274.01L254.94,273.83L255.41,273.91L255.82,274.03L256.25,274.09L256.75,273.96L260.53,271.84L260.98,271.36L261.47,270.64L261.77,270.32L262.16,270.11L262.67,270.02L263.64,269.96L264.14,269.76L266.62,267.99L274.17,264.42L277.36,263.59L277.86,263.35L278.28,263.07L279.62,261.74L279.72,261.58L280.11,260.56L280.28,260.33L280.74,260.04L282.25,259.73L283.69,259.19L284.22,259.08L284.75,259.09L286.11,259.45L287.38,259.48L288.74,259.25L289.93,258.66L290.69,257.61L290.8,257.01L290.73,256.45L290.39,255.33L290.34,254.56L290.63,254.25L291.12,254.06L291.6,253.66L291.93,253.04L293.35,247.2L293.62,246.69L294.15,246.26L306.59,245.65L312.76,246.71L313.7,247.49L313.63,249.46L311.36,260.33L310.66,261.11L307.15,263.01L305.11,263.48L302.96,263.03L303.08,264.65L304.13,265.65L307.52,266.92L307.96,267.21L308.47,267.62L309.05,268.19L310.07,269.59L310.17,269.97L310.25,272.68L310.65,275.32L311.59,277.77L313.33,279.92L316.73,281.61L326.46,283.59L332.64,286.3L335.21,290.08L337.11,293.49L338.82,295.78L340.78,296.17L342.01,296.1L343.58,296.4L344.71,297.04L344.5,298.35L344.84,298.83L347.99,302.08L347.9,302.12L346.03,301.45L344.66,301.69L342.04,303.61L341.37,303.9L336.77,304.24L335.52,304.16L334.64,304.23L334.3,304.69L334.45,306.22L334.91,308.2L335.68,309.97L336.75,310.9L339.6,311.47L340.7,312.29L340.85,313.89L340.23,315.66L335.62,323.14L335.78,326.23L335.68,327.25L335.76,328.15L337.11,331.07L337.48,331.67L338.17,332.15L339.12,332.39L340.26,332.28L343.02,329.56L343.82,329.27L345.44,329.84L347.35,332.77L348.7,333.53L349.82,333.26L352.36,331.42L354.21,330.34L359.68,328.37L361.33,327.31L361.87,325.76L361.73,314.79L364.1,312.87L365.32,310.76L367.12,308.4L368.55,305.9L368.6,303.35L366.71,301.87L366.01,301.52L364.56,301.14L364.01,300.91L363.25,300.03L363.39,299.17L364.15,298.32L365.28,297.5L367.2,295.56L368.23,293.13L368.58,290.41L368.44,287.61L366.48,282.52L366.32,280.35L368.47,279.78L372.94,281.04L375,281.05L375.74,279.55L375.52,278.88L375.16,278.28L374.87,277.66L374.87,276.94L376.33,275.07L376.8,274.01L378.3,271.88L378.73,270.71L378.79,268.67L378.29,267.51L377.21,266.72L375.57,265.76L374.42,264.87L373.76,263.91L373.66,262.79L374.22,261.43L375.1,260.72L376.35,260.45L377.68,260.47L378.79,260.65L380.02,260.96L380.8,261.07L381.2,260.72L381.3,259.64L381.11,258.2L380.8,256.78L380.63,255.36L380.83,253.89L381.81,251.37L382,250.39L382.53,243.53L382.83,242.46L383.46,241.29L383.66,240.24L383.67,239.86L383.62,239.52L382.38,235.61L382.38,234.29L382.93,231.63L382.92,230.46L382.6,229.77L380.94,227.72L380.32,226.28L380.31,225.07L380.75,223.9L382.29,221.18L382.86,219.75L382.98,218.29L382.4,216.81L381.04,215.36L384.03,210.79L384.43,210L384.65,209.05L384.66,208.04L384.38,206.16L384.23,203.58L383.9,202.11L383.35,200.72L381.22,196.79L380.43,195.71L379.41,194.8L377.77,193.02L377.89,191.43L377.88,189.84L377.45,186.85L376.98,185.56L374.68,181.82L374.19,180.6L373.84,177.81L373.53,176.63L373.35,176.26L373.07,176.07L371.91,175.52L370.8,174.58L369.85,173.44L367.96,170.02L367.62,168.92L367.56,167.44L367.98,162.17L367.88,161.9L366.61,161.14L366.21,160.65L365.93,160.22L365.56,159.52L365.27,158.74L365.21,157.98L365.24,156.39L365.14,155.56L364.94,154.75L364.6,154L363.62,152.56L363.55,151.88L363.66,151.2L363.67,150.42L363.24,148.94L361.9,146.12L361.51,144.52L361.46,143.78L361.47,143.19L361.58,142.63L362.45,140.06L360.68,140.55L358.83,140.83L355.01,141.07L354.44,141.22L349.63,144.09L349.56,143.92L349.87,143.07L349.98,141.92L349.82,140.76L349.34,139.91L342.64,139.66L341.01,140.05L340.83,141.27L340.76,141.47L336.83,141.63L336.35,141.52L335.43,140.74L334.66,139.41L334.11,137.93L333.87,136.72L333.31,130.71L331.14,125.2L330.74,123.28L331.04,121.45L334.95,114.25L335.05,111.21L334.56,108.82L333.92,106.85L333.52,105.09L333.32,103.39L332.85,102.33L331.85,101.91L326.02,102.98L323.31,103.01L322.36,102.82L321.67,102.38L321.29,101.57L321.02,100.32L320.91,99L320.97,97.98L320.67,96.24L319.28,94.53L307.37,82.68L306.05,82.06L305.18,81.65L304.81,80.67L304.43,78.32L303.7,76.67L303.59,76.28L299.8,75.89L298.73,75.97L297.9,76.16L296.64,76.64L292.16,77.83L291.86,77.59L293.47,73.79L293.27,72.6L292.87,71.65L292.33,71.05L291.73,70.89L290.83,71.33L290.29,72.1L289.77,73.01L288.95,73.89L287.86,74.41L282.59,75.13L279.5,75.04L276.82,74.59L274.89,74.46L274.04,75.36L273.54,76.02L272.5,76.73L271.41,77.3L270.73,77.53L268.95,77.22L261.84,73.66L255.95,72.24L253.88,72.23L252.62,73.19L251.32,77.02L250.81,78.03L250.04,78.89L249.19,79.57L241.82,83.09L240.25,83.4L231.04,83.1L230.26,82.95L229.81,82.52L228.94,81.46L227.53,80.52L225.96,79.84L224.62,79.56L222.93,79.71L221.79,79.95L221.39,80.08L218.5,81.66L217.88,82.31L217.16,82.79z" />
	<?php echo $base_link . 'cities=Gonder' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Gonder'] . '</title><circle class="am-gnd" cx="240" cy="133" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="240" y="148" class="am mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Gonder']; ?></text>
	<?php echo $base_link . 'cities=Bahir Dar' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Bahir Dar'] . '</title><circle class="am-bah" cx="228" cy="178" r="10" fill="greenyellow"></circle></a>'; ?>
	<text x="228" y="198" class="am big-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Bahir Dar']; ?></text>
	<?php echo $base_link . 'cities=Dessie' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Dessie'] . '</title><circle class="am-des" cx="345" cy="202" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="345" y="218" class="am mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Dessie']; ?></text>
	<?php echo $base_link . 'cities=Debre Markos' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Debre Markos'] . '</title><circle class="am-debm" cx="266" cy="240" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="266" y="256" class="am mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Debre Markos']; ?></text>
	<?php echo $base_link . 'cities=Debre Birhan' . $str_url . '"><title>' . $GLOBALS['city_lang_arr']['Debre Birhan'] . '</title><circle class="am-debb" cx="359" cy="289" r="7" fill="greenyellow"></circle></a>'; ?>
	<text x="359" y="304" class="am mid-city" text-anchor="middle" stroke="white" stroke-width="1px"><?php echo $GLOBALS['city_lang_arr']['Debre Birhan']; ?></text>

<?php
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
			echo '<p class="h2" style="text-align:center;">' . $GLOBALS['upload_specific_array'][$type]['Uploading'] . '</p>';
		}
		___close_div_(1);
		return;
	} elseif ($item == "index") {
		//echo '<p class="h2" style="text-align:center;">' . $GLOBALS['lang']['select city from map']. '</p>';
		//return;
	}
	global $lang, $lang_url, $str_url;


	$itemList = [
		['car', "https://img.icons8.com/color/48/000000/suv.png"],
		['computer', "https://img.icons8.com/fluent/48/000000/computer.png"],
		['electronic', "https://img.icons8.com/fluent/48/000000/radio.png"],
		['house',"https://img.icons8.com/color/48/000000/home.png"],
		['household',"https://img.icons8.com/color/48/000000/armchair.png"],
		['phone',"https://img.icons8.com/color/48/000000/android.png"],
		['other',"https://img.icons8.com/color/48/000000/categorize.png"]
	];
	echo '<div id="sidelist" class="col-xs-12 col-md-12">
    <div id="menu_mobile" class="col-xs-12"><span class="mob-menu-txt">' . $lang['MENU'] .
		'</span><span class="mob-menu-img"><a   href="javascript:void(0)" onClick="mobSidelist()">
        <i class="glyphicon glyphicon-menu-hamburger" style="color:white"></i></a></span>
	</div><ul>';
	echo '<li>';
	echo '<a href="../includes/adverts.php?item=All&search_text=&cities=All'. $str_url. '">';
	echo '<img src="https://img.icons8.com/color/48/000000/synchronize--v1.png"/>';
	echo '<p class="text-dark">' . $GLOBALS['lang']['latest items'] . '</p>';
	echo '</a></li>';

	foreach ($itemList as $key => $value) {
		echo '<li><a   ';
		if ($value[0] == $item) {
			echo "class=\"active\"";
		}
		echo 'href="../../includes/template.item.php?type=' . $value[0] . $str_url . '" style="text-align:center">';
		//echo '<img src="../images/uploads/icons/' . $value . '.svg" style="width:50%;"/><br/>' . $GLOBALS['item_lang_arr'][$value];
		echo '<img src="'.$value[1].'"/>';
		echo '<p class="text-dark">' . $GLOBALS['item_lang_arr'][$value[0]] . '</p>';
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
	___open_div_('col-md-3', '');
	global $lang_url;
	echo '<a   href="../../index.php' . $lang_url . '"><div class ="logo" style="font-size:30px;">' . $GLOBALS['lang']['HULUTERA_TEXT_LOGO2'] . '</div></a>';
	___close_div_(2);

	echo '
        <p style="font-size:16px;text-align:start">' . $lang['about us on footer text'] . '</p>
        </div>';
	echo '<div id="information_fo">
        <p class="h4">' . $lang['INFORMATION'] . '</p>
        <p style="margin-bottom:5px"><a   href="../../includes/template.proxy.php?type=terms' . $str_url . '">' . $lang['Terms and Conditions'] . '</a></p>
        <p style="margin-bottom:5px"><a   href="../../includes/template.proxy.php?type=privacy' . $str_url . '">' . $lang['Privacy Policy'] . '</a></p>
        <p style="margin-bottom:5px"><a   href="../../includes/contact-us.php?function=contact-us' . $str_url . '">' . $lang['Contact Us'] . '</a></p>
        <p style="margin-bottom:5px"><a   href="../../includes/help.php' . $lang_url . '" target="_blank">' . $lang['Help'] . '</a></p>
        </div>';
	echo '<div id="followUs_fo" >
          <p class="h4">' . $lang['FOLLOW US'] . '</p>
               <ul>
                <a   class="fb" href="https://www.facebook.com/Hulutera-123294222578640" target="_blank"><li class ="fb_icon_class" style="width:100%"><img src="../../images/fb.png" width="20px" height="20px" />' . $lang['facebook'] . '</li></a>
                <a   class="tw" href="https://twitter.com/hulutera" target="_blank"><li class ="tw_icon_class" style="width:100%"><img src="../../images/tw.png" width="17px" height="17px" />' . $lang['twitter'] . '</li></a>
                <a   class="pInt" href="https://www.pinterest.se/hulutera/" target="_blank"><li class ="pint_icon_class" style="width:100%"><img src="../../images/pin.png" width="20px" height="20px" />' . $lang['pintrest'] . '</li></a>
                <a   class="youtube" href="https://www.youtube.com/channel/UCJMGzyuRvzg9molYtggzuDA" target="_blank"><li class ="youtube_icon_class" style="width:100%"><img src="../../images/yt.png" width="20px" height="20px" />' . $lang['youtube'] . '</li></a>
               </ul>
           </div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';


	echo '<div class="copyright-reserved">
    <div class="container">
    <div class="row">
    <div class="col-lg-12">
    <div class="copyright-text">
    Copyright ©' . $lang['2020 hulutera. All Rights Reserved.'] . '

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
                                    <a   href="../..//includes/template.content.php?type=userActive{$str_url}" type="button" class="btn btn-primary btn-lg active"
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
                                        <img src="../images/allitems.svg" style="width:100%;" />
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
	if (!isset($_SESSION[$sessionName])) {
		$object = new HtUserAll($_SESSION['uID']);
		$object->updateProfile();
		$_SESSION[$sessionName] = base64_encode(serialize($object));
	} else {
		$object = unserialize(base64_decode($_SESSION[$sessionName]));
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

?>