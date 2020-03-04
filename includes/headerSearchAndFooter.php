<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/includes/locale/locale.php';
if (isset($_GET['lan'])) {
	$lan = $_GET['lan'];
	//var_dump($_GET);
	require_once $documnetRootPath . '/includes/locale/' . $lan . '.php';	
}
else
{
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
	echo '<script type="text/javascript" src="' . $add . '/js/hulutera.unminified.js"></script>'; ?>
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
	tabMenu();
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
	tabMenu();
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
	// echo '<div class ="logo"><a href="../../index.php"><span style="color:orange">HULU</span><span style="color:#050598a6">TERA</span><br></a></div>';
	echo '<div class ="logo"><a href="../../index.php"><img src="../../images/icons/ht_logo_2.png"></a></div>';
	//../../images/hulutera.png
	// <span style="color:orange">ሁሉ</span><span style="color:#050598a6">ተራ</span>
}

/*Top Right Links*/
function topRightLinks()
{
	$current_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	if (!isset($_SESSION['uID'])) {
		echo '<div class ="toprightlink">';
		locale($current_link);
		echo '<a href="../../includes/login.php" >';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish">Log In</div>';
		echo '<div id="topRightAmharic">ይግቡ</div>';
		echo '</div>';
		echo '</a>';
		echo '<a href="../../includes/register.php">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish">Register</div>';
		echo '<div id="topRightAmharic">ይመዝገቡ</div>';
		echo '</div>';
		echo '</a>';
		echo '<a href="../../includes/contact.php">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish">Contact Us</div>';
		echo '<div id="topRightAmharic">ሊጠይቁን ይፈልጋሉ</div>';
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
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish">' . $name . '</div>';
		echo '<div id="topRightAmharic" style="color:#0d6aac">&nbsp</div></div>';
		echo '<a href="../../includes/logout.php">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish">log out</div>';
		echo '<div id="topRightAmharic">መዉጣት</div>';
		echo '</div>';
		echo '</a>';
		echo '<a href="../../includes/userActive.php">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish">my items</div>';
		echo '<div id="topRightAmharic">የኔ ንብረቶች</div>';
		echo '</div>';
		echo '</a>';
		echo '<a href="../../includes/editProfile.php">';
		echo '<div id="toplinktexts">';
		echo '<div id="topRightEnglish">Edit Profile</div>';
		echo '<div id="topRightAmharic">መረጃ ለማስተካከል</div>';
		echo '</div>';
		echo '</a>';
		echo '</div>';
	}
}

/*search*/
function miniSearch()
{
	echo '<div class="miniSearch">';
	echo '<form class="searchform" action="../../includes/search.php" method ="GET">';
	echo '<input name="search_text" class="searchfield" type="text"  placeholder="e.g RAV 4, Toyota, Villa"/>';
	echo '<input name="search_mini_form" class="searchbutton" type="submit" value="Search ፈልግ" />';
	echo '</form>';
	echo '</div>';
}
/*tabmenu home/PostyourItem/Help*/
function tabMenu()
{
	//require_once $documnetRootPath . '/includes/locale/tg.php';
	global $lang;

	echo '<div class="tabsAndSearch"><div class="tabs">
			<li  class="activeFirst"><a ';
	if (activatetab() == 1) {
		echo "class=\"active\"";
	}
	echo ' href="../../index.php"> ';
	echo '<div id="tabsAmharic">' . $lang['All Items'] . '</div></a></li>';

	if (isset($_SESSION['uID'])) {
		//ask login prompt before post

		echo '<li class="activeSecond"><a ';
		if (activatetab() == 2) {
			echo "class=\"active\"";
		}
		echo 'href="../../includes/upload.php">' . $lang['Post Items'] .'</a></li>';
	} else {
		//go to upload
		echo '<li class="activeSecond"><a ';
		if (activatetab() == 18) {
			echo "class=\"active\"";
		}
		echo 'href="../../includes/prompt.php?type=9">' . $lang['Post Items'] .'</a></li>';
	}
	echo '<li class="activeThird"><a ';
	if (activatetab() == 3) {
		echo "class=\"active\"";
	}
	echo 'href="../../includes/help.php" >' . $lang['Help'] .'</a></li>';
	echo '</div>';
	miniSearch();
	echo '</div>';	
}
/*sidelist*/
function sidelist($item)
{
	$arr = (DatabaseClass::getInstance()->getAllItem());
	echo '<div id="sidelist">
	<div id="menu_mobile"><span style="float:left;padding:0px;line-height:30px;vertical-align:middle">MENU</span><span style="float:right;padding:0px;line-height:30px;"><a href="javascript:void(0)" onClick="mobSidelist()"><img  src="../../images/menu.jpg" width="20px" height="20px" style="line-height:30px;vertical-align:middle" /></a></span></div>
	<ul>';
	foreach ($arr as $key => $value) {
		echo '<li><a ';
		if ($value['table_name'] == $item) {
			echo "class=\"active\"";
		}
		$itemName = $value['table_name'];
		echo 'href="../../includes/template.item.php?type='.$value['table_name'].'">';
		echo '<img src="../images/uploads/'.$itemName.'images/'.$itemName.'.png" style="width:50px; height:50px" /><br/>'. $itemName;
		echo '</a></li>';
	}
	echo '</ul>	</div>';
}
/*footer*/
function footerCode()
{
	echo '<div id="footer">';
	echo '<div id="footerLinks">';
	echo '<div id="aboutUs_fo" >
		 <p style="font-weight:bold">ABOUT US</p>
		<a href="../../index.php"><img src="../../images/icons/ht_logo_2.png" height="60px" width="Auto" style="float:left;border-radius:50%"></a>
		<p style="text-align:left;font-size:14px">hulutera.com is a FREE online trading website where one can sell, buy or rent both used and unused items.
			hulutera is designed and developed for Ethiopian market with prosperity of large expansion. Click <a href="../../includes/about.php" style="color:#97caf0;font-weight:bold">here</a> to know more about hulutera.com.
			</p>

		   </div>';
	echo '<div id="information_fo">
		  <p style="font-weight:bold">INFORMATION</p>
		<p ><a href="../../includes/contact.php">Contact us</a></p>
		<p><a href="../../includes/help.php" target="_blank">Help</a></p>
		<p ><a href="../../includes/terms.php">Term and Conditions</a></p>
		<p><a href="../../includes/privacy.php">Privacy Policy</a></p>
		   </div>';
	echo '<div id="followUs_fo" >
		  <p style="font-weight:bold">FOLLOW US</p>
		       <ul>
				<a class="fb" href="https://www.facebook.com/pages/huluteracom/1564644313772355" target="_blank"><li class ="fb_icon_class"><img src="../../images/fb.png" width="20px" height="20px" /></li></a>
				<a class="tw" href="https://twitter.com/huluteracom" target="_blank"><li class ="tw_icon_class"><img src="../../images/tw.png" width="17px" height="17px" /></li></a>
				<a class="pInt" href="http://www.pinterest.com/hulutera/" target="_blank"><li class ="pint_icon_class"><img src="../../images/pin.png" width="20px" height="20px" /></li></a>
				<a class="youtube" href="http://youtu.be/xSI3C52mqdU" target="_blank"><li class ="youtube_icon_class"><img src="../../images/yt.png" width="20px" height="20px" /></li></a>
			   </ul>
		   </div>';
	echo '<div id="utility">';
	echo '<p class="copyright">&copy; 2020 hulutera. All Rights Reserved.</p>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	
}
?>