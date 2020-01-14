<?php
function othersUpld()
{
	echo'<div id="othersContent">';
	echo '<div id="stylized" class="myform">';
	echo '<form enctype="multipart/form-data" action="../../main/validateAndUpload.php?type=others" name="myform" id="myform" method="POST">';
	$e100 = isset($_GET['e100'])?$_GET['e100']:'';
	$e108 = isset($_GET['e108'])?$_GET['e108']:'';
	$e109 = isset($_GET['e109'])?$_GET['e109']:'';
	$e111 = isset($_GET['e111'])?$_GET['e111']:'';
	$e116 = isset($_GET['e116'])?$_GET['e116']:'';
	$e117 = isset($_GET['e117'])?$_GET['e117']:'';
	$e300 = isset($_GET['e300'])?$_GET['e300']:'';
	$e301 = isset($_GET['e301'])?$_GET['e301']:'';
	echo '<div style="font-size:24px; height:60px;" id="uploading">';
	echo 'Uploading Others ...';
	echo '<div id="uploadAmharic">ሌሎች የማስገባት ሂደት ...</div>';
	echo '</div>';
	location($e116); //from centerColumn
	currency($e117);
	priceCommon($e100);
	title($e108);       //from centerColumm 108
	description($e109);   //from centerColumn 109
	contactMethod($e111); //from centerColumn 111
	$pArr = array("300"=>$e300,"301"=>$e301);
	centerPicture($pArr); //from centerColumn
	echo '<input id="submitBtn" type="submit" name= "Submit" ';
	echo 'value="Upload Now" class="smallbutton"/>';
	echo '</form>';
	echo'</div>';
}
/*Other Contents*/
function othersType(){
	echo'
			<div id ="othersType">
			<input placeholder="test" type="text" name="othersType"/>
			</div>
			';
}
?>