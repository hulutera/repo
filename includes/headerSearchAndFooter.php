<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/includes/locale/locale.php';
if (isset($_GET['lan'])) {
	global $language;
	$language = $_GET['lan'];
	// url exetention for language on hyperlinks without "?"
	$lang_url = "?&lan=" . $language;

	// url exetention for language on hyperlinks with "?"
	$str_url = str_replace("?", "", $lang_url);
	if($language != "") require_once $documnetRootPath . '/includes/locale/' . $_GET['lan'] . '.php';
	else require_once $documnetRootPath . '/includes/locale/en.php';
} else {
	$language = "";
	$lang_url = "";
	$str_url = "";
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
		$add = "http://static.hulutera.com";
	}

	fileRouter($add);
}
function fileRouter($add)
{
	//css
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
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	    <script type="text/javascript" src="' . $add . '/js/hulutera.unminified.js"></script>'; ?>
	<!--[if lt IE 9]>
	<script type="text/javascript" src="https://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
<?php echo '<script type="text/javascript" src="' . $add . '/js/respond.js"> </script>';
	//img
	echo '<link rel="shortcut icon" href="' . $add . '/images/icons/ht.ico" />';
}
/*Code for Header and Search Bar*/
function headerAndSearchCode($item)
{
	$defaultText = "";
	echo '<div id= "head">';
	echo '<div class="header">';
	logo();
	topRightLinks();
	echo '</div>';
	echo '</div></div>';
	//tabMenu();
	miniSearch();
	sidelist($item);
}
/*Code for Header and Search Bar*/
function uploadHeaderAndSearchCode($item)
{
	$defaultText = "";
	echo '<div id= "head"><div class="header">';
	logo();
	topRightLinks();
	echo '</div></div></div>';
	miniSearch();
	//tabMenu();
}

function uploadResetErrors()
{
	$_SESSION['POST'] = [];
	$_SESSION['error']  = null;
	$_SESSION['errorRaw']  = null;
}
function uploadList($lang, $lang_sw)
{
	uploadResetErrors();
	echo '<a href="../includes/template.upload.php?type=car' . $lang_sw . '">
								        <div id="item_name">
									' . $lang['car'] . '<img id="boxIcon" src="../images/uploads/carimages/car.png">
									
								</div>
							  </a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=computer' . $lang_sw . '">
								<div id="item_name">
								' . $lang['computer'] . '<img id="boxIcon"
										src="../images/uploads/computerimages/computer.png">
								</div>
							</a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=electronic' . $lang_sw . '">
								<div id="item_name">
								' . $lang['electronic'] . ' <img id="boxIcon"
										src="../images/uploads/electronicsimages/electronics.png">
								</div>
							</a>
						</div>
					</div>
					<div id="lyr2">
						<div id="box">
							<a href="../includes/template.upload.php?type=house' . $lang_sw . '">
								<div id="item_name">
								' . $lang['house'] . '<img id="boxIcon" src="../images/uploads/houseimages/house.png">
								</div>
							</a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=household' . $lang_sw . '">
								<div id="item_name">
								' . $lang['household'] . ' <img id="boxIcon" src="../images/uploads/householdimages/household.png">
								</div>
							</a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=phone' . $lang_sw . '">
								<div id="item_name">
								' . $lang['phone'] . ' <img id="boxIcon" src="../images/uploads/phoneimages/phone.png">
								</div>
							</a>
						</div>
					</div>
					<div id="lyr3">
						<div id="box">
							<a href="../includes/template.upload.php?type=other' . $lang_sw . '">
								<div id="item_name"> ' . $lang['other'] . '<img id="boxIcon" src="../images/uploads/othersimages/others.png">
								</div>
							</a>
						</div>
						<div id="item_right_scroller"></div>
					</div>
			
		
	</div>';
}

/*Fetch the active URL*/
function activatetab()
{
	$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
	if ($curPageName == "index.php") {
		$tabactive = 1;
	} else if ($curPageName == "includes/upload.php") {
		$tabactive = 2;
	} else if ($curPageName == "includes/help.php") {
		$tabactive = 3;
	} else if ($curPageName == "includes/pendingItems.php") {
		$tabactive = 11;
	} else if ($curPageName == "includes/reportedItems.php") {
		$tabactive = 12;
	} else if ($curPageName == "includes/userMessages.php") {
		$tabactive = 13;
	} else if ($curPageName == "includes/userActive.php") {
		$tabactive = 14;
	} else if ($curPageName == "includes/userPending.php") {
		$tabactive = 15;
	} else if ($curPageName == "includes/deletedItems.php") {
		$tabactive = 16;
	} else if ($curPageName == "includes/prompt.php") {
		$tabactive = 18;
	} else {
		$tabactive = 0;
	}

	return $tabactive;
}
/*logo*/
function logo()
{
	global $lang_url, $str_url;

	// echo '<div class ="logo"><a href="../../index.php"><span style="color:orange">HULU</span><span style="color:#050598a6">TERA</span><br></a></div>';
	echo '<div class ="logo"><a href="../../index.php' . $lang_url . '"><img src="../../images/icons/ht_logo_2.png"></a></div>';
	//../../images/hulutera.png
	// <span style="color:orange">ሁሉ</span><span style="color:#050598a6">ተራ</span>
}

/*Top Right Links*/
function topRightLinks()
{
	global $lang_url, $str_url, $lang;

	$current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if (!isset($_SESSION['uID'])) {
		echo '<div class ="toprightlink">';
		locale($current_link);
		echo '<a href="../../includes/register.php' . $lang_url . '">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish"><i class="fas fa-user-plus" style="font-size:20px"></i><br/>' . $lang['Register'] . '</div>';
		echo '</div>';
		echo '</a>';
		echo '<a href="../../includes/login.php' . $lang_url . '" >';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish"><i class="fas fa-door-open" style="font-size:20px"></i><br/>' . $lang['login'] . '</div>';
		echo '</div>';
		echo '</a>';
		echo '<a href="../../includes/upload.php' . $lang_url . '">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish"><i class="fas fa-upload" style="font-size:20px"></i><br/>' . $lang['Post Items'] . '</div>';
		echo '</div>';
		echo '</a>';
		echo '<a href="../../includes/template.proxy.php?type=help' . $str_url . '">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish"><i class="fas fa-hands-helping" style="font-size:20px"></i><br/>' . $lang['Help'] . '</div>';
		echo '</div>';
		echo '</a>';
		echo '</div>';
	} else {
		$userId = $_SESSION['uID'];
		$connect = DatabaseClass::getInstance()->getConnection();
		$result0 = $connect->query("SELECT userName FROM user WHERE uID=$userId");
		while ($theName = $result0->fetch_assoc()) {
			$name = $theName['userName'];
		}
		$result0->close();
		echo '<div class ="toprightlink">';
		locale($current_link);
		echo '<br /><br />';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish">' . $name . '</div></div>';
		echo '<a href="../../includes/upload.php' . $lang_url . '">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish"><i class="fas fa-upload" style="font-size:20px"></i><br/>' . $lang['Post Items'] . '</div>';
		echo '</div>';
		echo '</a>';
		echo '<a href="../../includes/mypage.php' . $lang_url . '">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish"><i class="fas fa-home" style="font-size:20px"></i><br/>' . $lang['my page'] . '</div>';
		echo '</div>';
		echo '</a>';
		echo '<a href="../../includes/logout.php' . $lang_url . '">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish"><i class="fas fa-power-off" style="font-size:20px"></i><br/>' . $lang['Logout'] . '</div>';
		echo '</div>';
		echo '</a>';
		echo '<i class="fas fa-user" style="font-size:20px"></i>';
		echo '</div>';
	}
}

/*search*/
function miniSearch()
{
	global $lang, $lang_url, $str_url, $city_lang_arr, $language;
	global $item_lang_arr;
	echo '<div style="width:100%">';
	echo '<form class="searchform" action="../../includes/search.php" method ="GET">';
	echo '<input name="search_text" class="searchfield" type="text" placeholder="' . $lang['e.g'] . ' RAV4, Toyota, Villa"/>';
	echo ' <select id="city" name="cities">';
	foreach ($city_lang_arr as $key => $value) {
		echo '<option value = "' . $key . '">' . $value . '</option>';
	}
	echo '</select>';
	echo '<select id="item" name="item">';
	foreach ($item_lang_arr as $key => $value) {
		echo '<option value = "' . $key . '">' . $value . '</option>';
	}
	echo '</select>';
	echo '<input name="lan" type="text" style="display:none" value="' . $language . '" >';
	echo '<button class="searchbutton"><i class="fa fa-search"></i>' . $lang['Search'] . '</button>';
	echo '</form>';
	echo '</div>';
}
/*tabmenu home/PostyourItem/Help*/
function tabMenu()
{
	global $lang, $lang_url, $str_url;

	//require_once $documnetRootPath . '/includes/locale/tg.php';


	echo '<div class="tabsAndSearch"><div class="tabs">
			<li  class="activeFirst"><a ';
	if (activatetab() == 1) {
		echo "class=\"active\"";
	}
	echo ' href="../../index.php' . $lang_url . '">' . $lang['All Items'] . '</a></li>';

	if (isset($_SESSION['uID'])) {
		//ask login prompt before post

		echo '<li class="activeSecond"><a ';
		if (activatetab() == 2) {
			echo "class=\"active\"";
		}
		echo 'href="../../includes/upload.php' . $lang_url . '">' . $lang['Post Items'] . '</a></li>';
	} else {
		//go to upload
		echo '<li class="activeSecond"><a ';
		if (activatetab() == 18) {
			echo "class=\"active\"";
		}
		// Remove '?' from language url
		echo 'href="../../includes/prompt.php?type=9' . $str_url . '">' . $lang['Post Items'] . '</a></li>';
	}
	echo '<li class="activeThird"><a ';
	if (activatetab() == 3) {
		echo "class=\"active\"";
	}
	echo 'href="../../includes/help.php' . $lang_url . '" >' . $lang['Help'] . '</a></li>';
	echo '</div>';
	miniSearch();
	echo '</div>';
}
/*sidelist*/
function sidelist($item)
{
	global $lang, $lang_url, $str_url;

	$arr = (DatabaseClass::getInstance()->getAllItem());
	echo '<div id="sidelist">
	<div id="menu_mobile"><span style="float:left;padding:0px;line-height:30px;vertical-align:middle">' . $lang['MENU'] . '</span><span style="float:right;padding:0px;line-height:30px;"><a href="javascript:void(0)" onClick="mobSidelist()"><img  src="../../images/menu.jpg" width="20px" height="20px" style="line-height:30px;vertical-align:middle" /></a></span></div>
	<ul>';
	foreach ($arr as $key => $value) {
		echo '<li><a ';
		if ($value['table_name'] == $item) {
			echo "class=\"active\"";
		}
		$itemName = $value['table_name'];
		echo 'href="../../includes/template.item.php?type=' . $value['table_name'] . $str_url . '">';
		echo '<img src="../images/uploads/' . $itemName . 'images/' . $itemName . '.png" style="width:50px; height:50px" /><br/>' . $lang[$itemName];
		echo '</a></li>';
	}
	echo '</ul>	</div>';
}
/*footer*/
function footerCode()
{
	global $lang, $lang_url, $str_url;

	echo '<div id="footer">';
	echo '<div id="footerLinks">';
	echo '<div id="aboutUs_fo" >
		 <p style="font-weight:bold;margin-bottom:10px">'  . $lang['ABOUT US'] . '</p>
		<a href="../../index.php' . $lang_url . '"><img src="../../images/icons/ht_logo_2.png" height="60px" width="Auto" style="float:left;border-radius:50%"></a>
		<p style="text-align:left;font-size:14px">' . $lang['about us on footer text'] . ' <a href="../../includes/template.proxy.php?type=about' . $str_url . '" style="color:#97caf0;font-weight:bold">' . $lang['here'] . '</a>' . $lang['to know more about hulutera.com'] . ' 
		</p>
        </div>';
	echo '<div id="information_fo">
		<p style="font-weight:bold;margin-bottom:10px">' . $lang['INFORMATION'] . '</p>
		<p style="margin-bottom:5px"><a href="../../includes/template.proxy.php?type=terms' . $str_url . '">' . $lang['Terms and Conditions'] . '</a></p>
		<p style="margin-bottom:5px"><a href="../../includes/template.proxy.php?type=privacy' . $str_url . '">' . $lang['Privacy Policy'] . '</a></p>
		<p style="margin-bottom:5px"><a href="../../includes/template.proxy.php?type=contact' . $str_url . '">' . $lang['Contact Us'] . '</a></p>
		<p style="margin-bottom:5px"><a href="../../includes/template.proxy.php?type=help' . $str_url . '" target="_blank">' . $lang['Help'] . '</a></p>
		</div>';
	echo '<div id="followUs_fo" >
		  <p style="font-weight:bold;margin-bottom:10px">' . $lang['FOLLOW US'] . '</p>
		       <ul>
				<a class="fb" href="https://www.facebook.com/pages/huluteracom/1564644313772355" target="_blank"><li class ="fb_icon_class" style="width:100%"><img src="../../images/fb.png" width="20px" height="20px" />' . $lang['facebook'] . '</li></a>
				<a class="tw" href="https://twitter.com/huluteracom" target="_blank"><li class ="tw_icon_class" style="width:100%"><img src="../../images/tw.png" width="17px" height="17px" />' . $lang['twitter'] . '</li></a>
				<a class="pInt" href="http://www.pinterest.com/hulutera/" target="_blank"><li class ="pint_icon_class" style="width:100%"><img src="../../images/pin.png" width="20px" height="20px" />' . $lang['pintrest'] . '</li></a>
				<a class="youtube" href="http://youtu.be/xSI3C52mqdU" target="_blank"><li class ="youtube_icon_class" style="width:100%"><img src="../../images/yt.png" width="20px" height="20px" />' . $lang['youtube'] . '</li></a>
			   </ul>
		   </div>';
	echo '<div id="utility">';
	echo '<p class="copyright">&copy; ' . $lang['2020 hulutera. All Rights Reserved.'] . ' </p>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
?>