<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/common.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hulutera | ሁሉተራ </title>
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode("");?>
			<div id="main_section">
				<div id="mainColumn">
					<?php (new HtMainView("all",null))->showAll(); // select * from all items * ?>
					<?php //(new MainView2("car",null))->show(); // select * car?>
					<?php //(new MainView2("car",13))->show();   // select * car where id=13?>
					<?php //(new MainView2("latest",null))->show(); //select * latestupdate ?>
					<?php //(new MainView2("all",13))->show();?>

				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode();?>
</body>
</html>
