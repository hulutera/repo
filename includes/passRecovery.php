<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
require_once $documnetRootPath . '/includes/validate.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Password Recovery | የይለፍ ቃል </title>
	<?php commonHeader(); ?>
	<link href="../../css/hulutera.unminified.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div id="whole">
		<div id="wrapper">
			<?php //headerAndSearchCode(""); 
			?>
			<div id="main_section">
				<?php
				///reset/cleanup session variables
				if (!isset($_GET['function']) or $_GET['function'] !== 'passRecovery' or $_SESSION['lan'] != $_GET['lan']) {
					unset($_SESSION['POST']);
					unset($_SESSION['errorRaw']);
				}
				$sessionName = 'passRecovery';
				$_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
				$_SESSION['lan'] = $_GET['lan'];

				if (!isset($_SESSION[$sessionName])) {
					$object = new HtUserAll("*");
					$object->passRecovery();
					$_SESSION[$sessionName] = base64_encode(serialize($object));
				} else {
					$object = unserialize(base64_decode($_SESSION[$sessionName]));
					$object->passRecovery();
				}
				?>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php //footerCode(); 
	?>
</body>

</html>