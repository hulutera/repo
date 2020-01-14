<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/cmn/cmn.content.php';
//identify if 'userMessages' is present on the url on the location atleast after 8 characters 
if(!isset($_SESSION['uID']))
{
	header('Location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>My Items | የኔ ንብረቶች</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php headerAndSearchCode(""); accountLinks();?>
			<div id="main_section">
				<?php message();?>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>