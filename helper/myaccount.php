<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/inc/headerSearchAndFooter.php';
require_once $documnetRootPath.'/inc/userStatus.php';
if( !isset($_SESSION['uID']) ){
	header('Location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>My Account</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<link rel="stylesheet" href="http://static.katomer.com/css/main.css">
<link rel="stylesheet" href="http://static.katomer.com/css/detailedInfo.css">
<link rel="stylesheet" href="http://static.katomer.com/css/forms.css">
<link rel="stylesheet" href="http://static.katomer.com/css/account.css">

<script type="text/javascript" src="http://static.katomer.com/js/jquery1.4.2.js"></script>
<script type="text/javascript" src="http://static.katomer.com/js/login.js"></script>
<script type="text/javascript" src="http://static.katomer.com/js/swap.js"></script>
<script type="text/javascript" src="http://static.katomer.com/js/moderatorActions.js"></script>
<script type="text/javascript" src="http://static.katomer.com/js/user.js"></script>
<script type="text/javascript" src="http://static.katomer.com/js/message.js"></script>
<script type="text/javascript" src="http://static.katomer.com/js/imageSlider.js"></script>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); ?>
			<div id="main_section">
				<div id="mainColumn">
					<?php accountLinks(0);?>
				</div>
			</div>
			<div class="push"></div>
		</div>
    </div>
		<?php footerCode(); ?>
</body>
</html>
