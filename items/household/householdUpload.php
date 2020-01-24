<?php
function householdUpld()
{
	echo'<div id="householdContent">';
	echo '<div id="stylized" class="myform">';
	echo '<form enctype="multipart/form-data" action="../../includes/validateAndUpload.php?type=household" name="myform" id="myform" method="POST">';
	$e100 = isset($_GET['e100'])?$_GET['e100']:'';
	$e101 = isset($_GET['e101'])?$_GET['e101']:'';
	$e108 = isset($_GET['e108'])?$_GET['e108']:'';
	$e109 = isset($_GET['e109'])?$_GET['e109']:'';
	$e111 = isset($_GET['e111'])?$_GET['e111']:'';
	$e116 = isset($_GET['e116'])?$_GET['e116']:'';
	$e117 = isset($_GET['e117'])?$_GET['e117']:'';
	$e300 = isset($_GET['e300'])?$_GET['e300']:'';
	$e301 = isset($_GET['e301'])?$_GET['e301']:'';
	echo '<div style="font-size:24px; height:60px;" id="uploading">';
	echo 'Uploading Household ...';
	echo '<div id="uploadAmharic">ቤት ዕቃዎች የማስገባት ሂደት ...</div>';
	echo '</div>';
	location($e116); //from centerColumn
	householdType($e101);
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
function householdType($hash)
{
	$category = isset($_GET['category'])?$_GET['category']:'';
	echo '<div id ="householdType">';
	echo '<label>House Hold<div id="uploadAmharic">የእቃው ዓይነት</div></label>';
	echo '<select name="householdType">';
	echo '<option value="000">[Choose household type]</option>';
	echo '<option value="1" ';if($category=="1") echo " selected"; echo '>Furniture/የእንጨት ውጤት</option>';
	echo '<option value="2" ';if($category=="2") echo " selected"; echo '>Kitchen Staff/የኩሽና መገልገያ</option>';
	echo '<option value="3" ';if($category=="3") echo " selected"; echo '>Shower Staff/የሻወር ቤት መገልገያ</option>';
	echo '<option value="4" ';if($category=="4") echo " selected"; echo '>Other/ሌላ</option>';
	echo '</select>';
	if(crypt(101, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Household type is required</div>';
	}
	echo '</div>';
}
?>
