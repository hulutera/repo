<?php
function phoneUpld()
{
	echo'<div id="phoneContent">';
	echo '<div id="stylized" class="myform">';
	echo '<form enctype="multipart/form-data" action="../../includes/validateAndUpload.php?type=phone" name="myform" id="myform" method="POST">';
	$e100 = isset($_GET['e100'])?$_GET['e100']:'';
	$e101 = isset($_GET['e101'])?$_GET['e101']:'';
	$e102 = isset($_GET['e102'])?$_GET['e102']:'';
	$e103 = isset($_GET['e103'])?$_GET['e103']:'';
	$e104 = isset($_GET['e104'])?$_GET['e104']:'';
	$e108 = isset($_GET['e108'])?$_GET['e108']:'';
	$e109 = isset($_GET['e109'])?$_GET['e109']:'';
	$e111 = isset($_GET['e111'])?$_GET['e111']:'';
	$e116 = isset($_GET['e116'])?$_GET['e116']:'';
	$e117 = isset($_GET['e117'])?$_GET['e117']:'';
	$e300 = isset($_GET['e300'])?$_GET['e300']:'';
	$e301 = isset($_GET['e301'])?$_GET['e301']:'';
	echo '<div style="font-size:24px; height:60px;" id="uploading">';
	echo 'Uploading Phone ...';
	echo '<div id="uploadAmharic">ስልክ የማስገባት ሂደት ...</div>';
	echo '</div>';
	location($e116); //from centerColumn
	currency($e117);
	priceCommon($e100);
	phoneMake($e101);
	phoneModel($e102);
	phoneCamera($e103);
	phoneOS($e104);
	title($e108);         //from centerColumm 108
	description($e109);   //from centerColumn 109
	contactMethod($e111); //from centerColumn 111
	$pArr = array("300"=>$e300,"301"=>$e301);
	centerPicture($pArr); //from centerColumn
	echo '<input id="submitBtn" type="submit" name= "Submit" ';
	echo 'value="Upload Now" class="smallbutton"/>';
	echo '</form>';
	echo'</div>';
	echo '</div>';
}
function phoneModel($hash)
{
	$phoneModel = isset($_GET['phoneModel'])?$_GET['phoneModel']:'';
	echo'<label>Model<div id="uploadAmharic">ሞዴል</div></label>';
	echo '<input name="phoneModel" style="width:160px;" type="text" placeholder="optional" value= "'.$phoneModel.'"/>';
}
function phoneMake($hash)
{
	$phoneMake = isset($_GET['phoneMake'])?$_GET['phoneMake']:'';
	
	echo '<div id="make">';
	echo '<label>Make<div id="uploadAmharic">አምራች ድርጅት</div></label>';
	echo '<select name="phoneMake">';
	echo '<option value="000">[Select Brand]</option>';
	echo '<option value="Alcatel" ';if($phoneMake=="Alcatel") echo " selected"; echo '>Alcatel</option>';
	echo '<option value="Blackberry" ';if($phoneMake=="Blackberry") echo " selected"; echo '>Blackberry</option>';
	echo '<option value="HTC" ';if($phoneMake=="HTC") echo " selected"; echo '>HTC</option>';
	echo '<option value="Huawei" ';if($phoneMake=="Huawei") echo " selected"; echo '>Huawei</option>';
	echo '<option value="iPhone" ';if($phoneMake=="iPhone") echo " selected"; echo '>iPhone</option>';
	echo '<option value="LG" ';if($phoneMake=="LG") echo " selected"; echo '>LG</option>';
	echo '<option value="Motorolla" ';if($phoneMake=="Motorolla") echo " selected"; echo '>Motorolla</option>';
	echo '<option value="Nokia" ';if($phoneMake=="Nokia") echo " selected"; echo '>Nokia</option>';
	echo '<option value="Samsung" ';if($phoneMake=="Samsung") echo " selected"; echo '>Samsung</option>';
	echo '<option value="Sanyo" ';if($phoneMake=="Sanyo") echo " selected"; echo '>Sanyo</option>';
	echo '<option value="Siemens" ';if($phoneMake=="Siemens") echo " selected"; echo '>Siemens</option>';
	echo '<option value="Sony" ';if($phoneMake=="Sony") echo " selected"; echo '>Sony</option>';
	echo '<option value="Sony Ericsson" ';if($phoneMake=="Sony Ericsson") echo " selected"; echo '>Sony Ericsson</option>';
	echo '<option value="T-Mobile" ';if($phoneMake=="T-Mobile") echo " selected"; echo '>T-Mobile</option>';
	echo '<option value="TANA" ';if($phoneMake=="TANA") echo " selected"; echo '>TANA</option>';
	echo '<option value="Vodaphone" ';if($phoneMake=="Vodaphone") echo " selected"; echo '>Vodaphone</option>';
	echo '<option value="ZTE" ';if($phoneMake=="ZTE") echo " selected"; echo '>ZTE</option>';
	echo '<option value="999" ';if($phoneMake=="999") echo " selected"; echo '>Other</option>';
	echo '</select>';
	if(crypt(101, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Make is required</div>';
	}
	echo '</div>';
}
function phoneCamera($hash)
{
	$phoneCamera = isset($_GET['phoneCamera'])?$_GET['phoneCamera']:'';
	echo '<div id="camera">';
	echo '<label>Camera Size<div id="uploadAmharic">የስልኩ ካሜራ መጠን</div></label>';
	echo '<select name="phoneCamera">';
	echo '<option value="000">[Select Camera Spec.]</option>';
	echo '<option value="1.0 - 1.9 megapixles" ';if($phoneCamera=="1.0 - 1.9 megapixles") echo " selected"; echo '>1.0 - 1.9 megapixels</option>';
	echo '<option value="2.0 - 2.9 megapixles" ';if($phoneCamera=="2.0 - 2.9 megapixles") echo " selected"; echo '>2.0 - 2.9 megapixels</option>';
	echo '<option value="3.0 - 3.9 megapixles" ';if($phoneCamera=="3.0 - 3.9 megapixles") echo " selected"; echo '>3.0 - 3.9 megapixels</option>';
	echo '<option value="4.0 - 4.9 megapixles" ';if($phoneCamera=="4.0 - 4.9 megapixles") echo " selected"; echo '>4.0 - 4.9 megapixels</option>';
	echo '<option value="5.0 - 5.9 megapixles" ';if($phoneCamera=="5.0 - 5.9 megapixles") echo " selected"; echo '>5.0 - 5.9 megapixels</option>';
	echo '<option value="6.0 - 6.9 megapixles" ';if($phoneCamera=="6.0 - 6.9 megapixles") echo " selected"; echo '>6.0 - 6.9 megapixels</option>';
	echo '<option value="7.0 - 7.9 megapixles" ';if($phoneCamera=="7.0 - 7.9 megapixles") echo " selected"; echo '>7.0 - 7.9 megapixels</option>';
	echo '<option value="8.0 - 8.9 megapixles" ';if($phoneCamera=="8.0 - 8.9 megapixles") echo " selected"; echo '>8.0 - 8.9 megapixels</option>';
	echo '<option value="9.0 - 9.9 megapixles" ';if($phoneCamera=="9.0 - 9.9 megapixles") echo " selected"; echo '>9.0 - 9.9 megapixels</option>';
	echo '<option value="10.0 - 10.9 megapixles" ';if($phoneCamera=="10.0 - 10.9 megapixles") echo " selected"; echo '>10.0 - 10.9 megapixels</option>';
	echo '<option value="11.0 - 15.9 megapixles" ';if($phoneCamera=="11.0 - 15.9 megapixles") echo " selected"; echo '>11.0 - 15.9 megapixels</option>';
	echo '<option value="more than 16 megapixles" ';if($phoneCamera=="more than 16 megapixles") echo " selected"; echo '>more</option>';
	echo '<option value="999" ';if($phoneCamera=="999") echo " selected"; echo '>Have no Camera</option>';
	echo '</select>';
	if(crypt(103, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Camera size is required</div>';
	}
	echo '</div>';

}
function phoneOS($hash)
{
	$phoneOS = isset($_GET['phoneOS'])?$_GET['phoneOS']:'';
	echo '<div id="OS">';
	echo '<label>Operating System<div id="uploadAmharic">ኦ.ኤስ</div></label>';
	echo '<select name="phoneOS">';
	echo '<option value="000">[Select phone OS]</option>';
	echo '<option value="iphone" ';if($phoneOS=="iphone") echo " selected"; echo '>iPhone OS</option>';
	echo '<option value="windows" ';if($phoneOS=="windows") echo " selected"; echo '>Windows OS</option>';
	echo '<option value="android" ';if($phoneOS=="android") echo " selected"; echo '>Android OS</option>';
	echo '<option value="symbian" ';if($phoneOS=="symbian") echo " selected"; echo '>Symbian OS</option>';
	echo '<option value="999" ';if($phoneOS=="999") echo " selected"; echo '>Other</option>';
	echo '</select>';
	echo '</div>';

}
?>