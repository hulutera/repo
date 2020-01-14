<?php
function compUpld()
{
	echo'<div id="compContent">';
	echo '<div id="stylized" class="myform">';
	echo '<form enctype="multipart/form-data" action="../../main/validateAndUpload.php?type=computer" name="myform" id="myform" method="POST">';
	$e100 = isset($_GET['e100'])?$_GET['e100']:'';
	$e101 = isset($_GET['e101'])?$_GET['e101']:'';
	$e102 = isset($_GET['e102'])?$_GET['e102']:'';
	$e103 = isset($_GET['e103'])?$_GET['e103']:'';
	$e104 = isset($_GET['e104'])?$_GET['e104']:'';
	$e105 = isset($_GET['e105'])?$_GET['e105']:'';
	$e106 = isset($_GET['e106'])?$_GET['e106']:'';
	$e107 = isset($_GET['e107'])?$_GET['e107']:'';
	$e108 = isset($_GET['e108'])?$_GET['e108']:'';
	$e109 = isset($_GET['e109'])?$_GET['e109']:'';
	$e108 = isset($_GET['e108'])?$_GET['e108']:'';
	$e109 = isset($_GET['e109'])?$_GET['e109']:'';
	$e110 = isset($_GET['e110'])?$_GET['e110']:'';
	$e111 = isset($_GET['e111'])?$_GET['e111']:'';
	$e116 = isset($_GET['e116'])?$_GET['e116']:'';
	$e117 = isset($_GET['e117'])?$_GET['e117']:'';
	$e300 = isset($_GET['e300'])?$_GET['e300']:'';
	$e301 = isset($_GET['e301'])?$_GET['e301']:'';
	echo '<div style="font-size:24px; height:60px;" id="uploading">';
	echo 'Uploading Computer ...';
	echo '<div id="uploadAmharic">ኮምፕዩተር የማስገባት ሂደት ...</div>';
	echo '</div>';
	location($e116); //from centerColumn
	currency($e117);
	priceCommon($e100);	
	computerType($e102);
	computerBrand($e106);
	computerOS($e104);
	computerProcessor($e107);
	computerRAM($e110);
	computerHD($e103);
	title($e108);         //from centerColumm 108
	description($e109);   //from centerColumn 109
	contactMethod($e111); //from centerColumn 111
	$pArr = array("300"=>$e300,"301"=>$e301);
	centerPicture($pArr); //from centerColumn		
	echo '<input id="submitBtn" type="submit" name= "Submit" ';
	echo 'value="Upload Now" class="smallbutton"/>';
	
	echo '</form>';
	echo '</div>'; //end_computercontent
}
/*computer Contents*/
function computerHD($hash)
{
	$hardDisk = isset($_GET['hardDisk'])?$_GET['hardDisk']:'';
	echo '<div id="harddisk">';
	echo '<label>HardDisk<div id="uploadAmharic">&#4608;&#4653;&#4853;&nbsp;&#4850;&#4661;&#4781;</div></label>';
	echo '<select name="computerHD">';
	echo '<option value="000">[Select HardDisk Size]</option>';
	echo '<option value="Under 200GB" ';if($hardDisk=="Under 200GB") echo " selected"; echo '>Under 200GB Drive</option>';
	echo '<option value="200 - 299GB" ';if($hardDisk=="200 - 299GB") echo " selected"; echo '>200 - 299GB Drive</option>';
	echo '<option value="300 - 499GB" ';if($hardDisk=="300 - 499GB") echo " selected"; echo '>300 - 499GB Drive</option>';
	echo '<option value="Over 500GB" ';if($hardDisk=="Over 500GB") echo " selected"; echo '>Over 500GB Drive</option>';
	echo '<option value="999" ';if($hardDisk=="999") echo " selected"; echo '>Not known</option>';
	echo '</select>';
	if(crypt(103, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">HardDisk is required</div>';
	}
	echo '</div>';
}
function computerRAM($hash)
{
	$ram = isset($_GET['ram'])?$_GET['ram']:'';
	echo '<div id="ram">';
	echo '<label>RAM<div id="uploadAmharic">ራም</div></label>';
	echo '<select name="computerRAM">';
	echo '<option value="000">[Select RAM size]</option>';
	echo '<option value="Under 1GB" ';if($ram=="Under 1GB") echo " selected"; echo '>Under 1GB Memory</option>';
	echo '<option value="1.0 - 1.9GB" ';if($ram=="1.0 - 1.9GB") echo " selected"; echo '>1.0 - 1.9GB Memory</option>';
	echo '<option value="2.0 - 2.9GB" ';if($ram=="2.0 - 2.9GB") echo " selected"; echo '>2.0 - 2.9GB Memory</option>';
	echo '<option value="3.0 - 3.9GB" ';if($ram=="3.0 - 3.9GB") echo " selected"; echo '>3.0 - 3.9GB Memory</option>';
	echo '<option value="Over 4.0GB" ';if($ram=="Over 4.0GB") echo " selected"; echo '>Over 4.0GB Memory</option>';
	echo '<option value="999" ';if($ram=="999") echo " selected"; echo '>Not known</option>';
	echo '</select>';
	if(crypt(110, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">RAM is required</div>';
	}
	echo '</div>';
}
function computerProcessor($hash)
{
	$processor = isset($_GET['processor'])?$_GET['processor']:'';
	echo '<div id="processor">';
	echo '<label>Processor Speed<div id="uploadAmharic">ፕሮሰሰር</div></label>';
	echo '<select name="computerProcessor">';
	echo '<option value="000">[Select speed]</option>';
	echo '<option value="Under 1 GHz" ';if($processor=="Under 1 GHz") echo " selected"; echo '>Under 1 GHz</option>';
	echo '<option value="1.0 - 1.49GHz" ';if($processor=="1.0 - 1.49GHz") echo " selected"; echo '>1.0 - 1.49GHz</option>';
	echo '<option value="1.5 - 1.99GHz" ';if($processor=="1.5 - 1.99GHz") echo " selected"; echo '>1.5 - 1.99GHz</option>';
	echo '<option value="2.0 - 2.49GHz" ';if($processor=="2.0 - 2.49GHz") echo " selected"; echo '>2.0 - 2.49GHz</option>';
	echo '<option value="2.5 - 2.99GHz" ';if($processor=="2.5 - 2.99GHz") echo " selected"; echo '>2.5 - 2.99GHz</option>';
	echo '<option value="Over 3.0GHz" ';if($processor=="Over 3.0GHz") echo " selected"; echo '>Over 3.0GHz</option>';
	echo '<option value="999" ';if($processor=="999") echo " selected"; echo '>Not known</option>';	
	echo '</select>';
	if(crypt(107, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Processor is required</div>';
	}
	echo '</div>';

}
function computerOS($hash)
{
	$os = isset($_GET['os'])?$_GET['os']:'';
	echo '<div id="OS">';
	echo '<label>Operating System <div id="uploadAmharic">ኦ.ኤስ</div></label>';
	echo '<select name="computerOS">';
	echo '<option value="000">[Select OS]</option>';
	echo '<option value="windows"';if($os=="windows") echo " selected"; echo '>Windows</option>';
	echo '<option value="linux"';if($os=="linux") echo " selected"; echo '>Linux</option>';
	echo '<option value="unix"';if($os=="unix") echo " selected"; echo '>Unix</option>';
	echo '<option value="unix"';if($os=="unix") echo " selected"; echo '>Mac</option>';
	echo '<option value="999"';if($os=="999") echo " selected"; echo '>Other</option>';
	echo '</select>';
	if(crypt(104, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Os is required</div>';
	}
	echo '</div>';

}
function computerType($hash)
{
	$computerType = isset($_GET['computerType'])?$_GET['computerType']:'';
	
	echo '<div id="compType">';
	echo '<label for="comp">Computer type<div id="uploadAmharic">የኮምፕዩተሩ ዓይነት</div></label>';
	echo '<select name="computer" id="computer">';
	echo '<option value="000">[choose item]</option>';
	echo '<option value = "1"';if($computerType=="1") echo " selected"; echo '>Stationary Computer</option>';
	echo '<option value = "2"';if($computerType=="2") echo " selected"; echo '>Laptop</option>';
	echo '<option value = "3"';if($computerType=="3") echo " selected"; echo '>Notebooks</option>';
	//echo '<option value = "4"';if($computerType=="4") echo " selected"; echo '>Computer accessories</option>';
	echo '</select>';
	if(crypt(102, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Computer type is required</div>';
	}
	echo '</div>';
}
function computerBrand($hash)
{
	$brand        = isset($_GET['brand'])?$_GET['brand']:'';
	echo '<div id="computerBrand">';
	echo '<label>Brand</label>';
	echo '<select name="computerBrand">';
	echo '<option value="000">[Brand]</option>';
	echo '<option value = "acer" ';if($brand=="acer") echo " selected"; echo '>Acer</option>';
	echo '<option value = "alienware" ';if($brand=="alienware") echo " selected"; echo '>Alienware</option>';
	echo '<option value = "apple" ';if($brand=="apple") echo " selected"; echo '>Apple</option>';
	echo '<option value = "asus" ';if($brand=="asus") echo " selected"; echo '>ASUS</option>';
	echo '<option value = "cybertonpc" ';if($brand=="cybertonpc") echo " selected"; echo '>CybertronPC</option>';
	echo '<option value = "cyberpower" ';if($brand=="cyberpower") echo " selected"; echo '>Cyberpower</option>';
	echo '<option value = "dell" ';if($brand=="dell") echo " selected"; echo '>Dell</option>';
	echo '<option value = "gateway" ';if($brand=="gateway") echo " selected"; echo '>Gateway</option>';
	echo '<option value = "hp" ';if($brand=="hp") echo " selected"; echo '>HP</option>';
	echo '<option value = "ibuypower" ';if($brand=="ibuypower") echo " selected"; echo '>iBUYPOWER</option>';
	echo '<option value = "lenovo" ';if($brand=="lenovo") echo " selected"; echo '>Lenovo</option>';
	echo '<option value = "sony" ';if($brand=="sony") echo " selected"; echo '>Sony</option>';
	echo '<option value = "toshiba" ';if($brand=="toshiba") echo " selected"; echo '>Toshiba</option>';
	echo '<option value = "other" ';if($brand=="other") echo " selected"; echo '>Other</option>';

	echo '</select>';
	if(crypt(106, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Computer brand is required</div>';
	}
	echo '</div>';
}
?>