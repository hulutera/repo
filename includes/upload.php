<?php 
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
//redirect to template.item file
global $lang;

if(isset($_GET['lan'])){
	$lang_sw = "&lan=" . $_GET['lan'];
	$lang_url =  "?&lan=" . $_GET['lan'];
} else {
	$lang_sw = "";
	$str_url =  "";
}

if(!isset($_SESSION['uID']))
{
	header('Location:../index.php' . $lang_url);
}
?>
<html>
<head>
<title><?php echo $lang['upload']; ?></title>
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
							<?php echo $lang['choose item to upload'];?>	</div>
						<div id="box">
<?php                   echo '<a href="../includes/template.upload.php?type=car' .$lang_sw. '">
								        <div id="item_name">
									' .$lang['car']. '<img id="boxIcon" src="../images/uploads/carimages/car.png">
									
								</div>
							  </a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=computer' .$lang_sw. '">
								<div id="item_name">
								' .$lang['computer']. '<img id="boxIcon"
										src="../images/uploads/computerimages/computer.png">
								</div>
							</a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=electronics' .$lang_sw. '">
								<div id="item_name">
								' .$lang['electronics']. ' <img id="boxIcon"
										src="../images/uploads/electronicsimages/electronics.png">
								</div>
							</a>
						</div>
					</div>
					<div id="lyr2">
						<div id="box">
							<a href="../includes/template.upload.php?type=house' .$lang_sw. '">
								<div id="item_name">
								' .$lang['house']. '<img id="boxIcon" src="../images/uploads/houseimages/house.png">
								</div>
							</a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=household' .$lang_sw. '">
								<div id="item_name">
								' .$lang['household']. ' <img id="boxIcon" src="../images/uploads/householdimages/household.png">
								</div>
							</a>
						</div>
						<div id="box">
							<a href="../includes/template.upload.php?type=phone' .$lang_sw. '">
								<div id="item_name">
								' .$lang['phone']. ' <img id="boxIcon" src="../images/uploads/phoneimages/phone.png">
								</div>
							</a>
						</div>
					</div>
					<div id="lyr3">
						<div id="box">
							<a href="../includes/template.upload.php?type=others' .$lang_sw. '">
								<div id="item_name"> ' .$lang['others']. '<img id="boxIcon" src="../images/uploads/othersimages/others.png">
								</div>
							</a>
						</div>
						<div id="item_right_scroller"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>'; ?>
	<?php  footerCode(); ?>
</body>
</html>



