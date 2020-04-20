<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
//require_once $documnetRootPath . '/view/main.view.class.php';
require_once $documnetRootPath . '/includes/common.inc.php';


//get item name from URL
if (!isset($_GET['type']))
{	
	header('Location: ../../index.php');
}
$item = $_GET['type'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $item. " § " .$itemAmharic;?></title>
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode($item); ?>
			<div id="main_section">
				<div id="mainColumn">
					<?php (new  HtMainView($item))->show("active");?>
				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>
