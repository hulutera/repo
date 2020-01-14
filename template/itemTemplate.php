<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/inc/item.inc.php';
//get item name from URL
$item = $_GET['type'];
//get array containing itemAmharic and if type variable is valid
$status      = includeClass($item);
//save Amharic name
$itemAmharic = $status[0];
//save URL validity
$isValidUrl  = $status[1];
//redirect if url is invalid
if(!$isValidUrl)
	header('Location: ../../index.php');
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
					<?php isset($_GET['Id']) ? oneItemColumn($item) : allItemColumn($item);?>
				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>
