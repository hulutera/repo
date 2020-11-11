<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/cmn.proxy.php';

//get item name from URL
$proxyType = $_GET['type'];
$type_array = array('about', 'terms', 'contact-us', 'help', 'privacy');

if (!in_array($proxyType, $type_array)) {
	header('Location: ../../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $GLOBALS['lang']['hulutera']; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
	<?php commonHeader(); ?>
	<style>
		p.content,li.content,a.links{
			font-family: "Helvetica Neue", "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
			font-size: 16px;
			margin-bottom: 2px;
			padding:10px;
			color: black;
		}

		a.links{
			font-weight: bold;
		}
		p.headline,a.headline {
			font-family: "Helvetica Neue", "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
			color: #4E443C;
			font-size: 16px;
			font-variant: small-caps;
			text-transform: none;
			font-weight: bold;
			margin-bottom: 0;
		}

		p.headline-start {
			font-family: Georgia, serif;
			font-size: 20px;
			font-weight: bold;
			text-transform: uppercase;
			letter-spacing: 2px;
		}
	</style>
</head>

<body>
	<?php headerAndSearchCode(""); ?>
	<div class="row">
		<?php routerProxy($proxyType); ?>
	</div>
	<?php footerCode(); ?>
</body>

</html>