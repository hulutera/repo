<?php
function electronicsUpld()
{
	echo'<div id="electronicContent">';
	echo '<div id="stylized" class="myform">';
	echo '<form enctype="multipart/form-data" action="../../includes/validateAndUpload.php?type=electronics" name="myform" id="myform" method="POST">';
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
	echo 'Uploading Electronics ...';
	echo '<div id="uploadAmharic">ኤሌክትሮኒክስ የማስገባት ሂደት ...</div>';
	echo '</div>';
	location($e116); //from centerColumn
	eletronicsType($e101);
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
	echo '</div>';	
}
function eletronicsType($hash)
{
	$category = isset($_GET['category'])?$_GET['category']:'';
	echo '<div id ="electonicType">';
	echo '<label>Electronics<div id="uploadAmharic">የእቃው ዓይነት</div></label>';
	echo '<select ="electronic" name="electronicsType">';
	echo '<option value="000">[choose Item]</option>';
	echo '<option value="1" ';if($category=="1") echo " selected"; echo '>TV/ቲቪ</option>';
	echo '<option value="2" ';if($category=="2") echo " selected"; echo '>Camera/ካሜራ</option>';
	echo '<option value="3" ';if($category=="3") echo " selected"; echo '>Fridge/ፍሪጅ</option>';
	echo '<option value="4" ';if($category=="4") echo " selected"; echo '>Watch/ሰአት</option>';
	echo '<option value="5" ';if($category=="5") echo " selected"; echo '>Tape/ቴፕ</option>';
	echo '<option value="6" ';if($category=="6") echo " selected"; echo '>Head phone/ሄድ ፎን</option>';
	echo '<option value="7" ';if($category=="7") echo " selected"; echo '>Game/ጌም</option>';
	echo '<option value="8" ';if($category=="8") echo " selected"; echo '>Other/ሌላ</option>';
	echo '<option value="9" ';if($category=="9") echo " selected"; echo '>Keyboards</option>';
	echo '<option value="10" ';if($category=="10") echo " selected"; echo '>LCD Monitors</option>';
	echo '<option value="11" ';if($category=="11") echo " selected"; echo '>Mice</option>';
	echo '<option value="12" ';if($category=="12") echo " selected"; echo '>Networking</option>';
	echo '<option value="13" ';if($category=="13") echo " selected"; echo '>PC Gaming Hardware</option>';
	echo '<option value="14" ';if($category=="14") echo " selected"; echo '>PC Memory</option>';
	echo '<option value="15" ';if($category=="15") echo " selected"; echo '>Printers</option>';
	
	echo '</select>';
	if(crypt(101, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Electronics type is required</div>';
	}
	echo '</div>';
}
?>