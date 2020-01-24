<?php 
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
//redirect to template.item file
if(!isset($_SESSION['uID']))
{
	header('Location:../index.php');
}
?>
<html>
<head>
<title>Upload | ንብረት ያስገቡ</title>
<?php commonHeader();?>
<style>
a {
	text-decoration: none;
	color: #0072C6;
}

a:hover {
	color: black;
}
</style>
<script type="text/javascript" src="../../js/jquery1.11.1.min.js"></script>
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('div #box').hover(
      function () {
        $(this).css({"background-color":"#87CEFA"});
      }, 
      function () {
        $(this).css({"background-color":"#FFFFFF"});
      }
  );
});
</script>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<?php uploadHeaderAndSearchCode("");?>
			<div id="main_section">
				<div id="item_collections">
					<div id="lyr1">
						<div id="boxHead">
							Choose Item to upload ...<br>ለማስገባት የሚፈልጉትን ንብረት ይምረጡ ...
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=car">
								<div id="item_name">
									Car<br>መኪና <img id="boxIcon" src="../img/car_t1.png">
									
								</div>
							</a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=computer">
								<div id="item_name">
									Computer<br>ኮምፒውተር <img id="boxIcon"
										src="../img/computer_t1.png">
								</div>
							</a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=electronics">
								<div id="item_name">
									Electronics<br>ኤሌክትሮኒክስ <img id="boxIcon"
										src="../img/ele_t1.png">
								</div>
							</a>
						</div>
					</div>
					<div id="lyr2">
						<div id="box">
							<a href="../includes/template.upload.php?type=house">
								<div id="item_name">
									House<br>ቤት<img id="boxIcon" src="../img/house_t1.png">
								</div>
							</a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=household">
								<div id="item_name">
									Households<br>ቤት ዕቃዎች <img id="boxIcon" src="../img/hh_t1.png">
								</div>
							</a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=phone">
								<div id="item_name">
									Phone<br>ስልክ <img id="boxIcon" src="../img/phone_t1.png">
								</div>
							</a>
						</div>
					</div>
					<div id="lyr3">
						<div id="box">
							<a href="../includes/template.upload.php?type=others">
								<div id="item_name">
									Others<br>ሌሎች<img id="boxIcon" src="../img/other_t1.png">
								</div>
							</a>
						</div>
						<div id="item_right_scroller"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode(); ?>
</body>
</html>

