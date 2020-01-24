<?php
/**/
function houseUpld()
{
	echo '<div id="houseContent">';
	echo '<div id="stylized" class="myform">';
	echo '<form enctype="multipart/form-data" action="../../includes/validateAndUpload.php?type=house" name="myform" id="myform" method="POST">';
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
	$e110 = isset($_GET['e110'])?$_GET['e110']:'';
	$e111 = isset($_GET['e111'])?$_GET['e111']:'';
	
	$e112 = isset($_GET['e112'])?$_GET['e112']:'';
	$e113 = isset($_GET['e113'])?$_GET['e113']:'';
	$e114 = isset($_GET['e114'])?$_GET['e114']:'';
	$e115 = isset($_GET['e115'])?$_GET['e115']:'';
	
	$e116 = isset($_GET['e116'])?$_GET['e116']:'';
	$e117 = isset($_GET['e117'])?$_GET['e117']:'';
	
	$e208 = isset($_GET['e208'])?$_GET['e208']:'';
	$e209 = isset($_GET['e209'])?$_GET['e209']:'';
	$e210 = isset($_GET['e210'])?$_GET['e210']:'';
	$e211 = isset($_GET['e211'])?$_GET['e211']:'';
	$e212 = isset($_GET['e212'])?$_GET['e212']:'';
	$e300 = isset($_GET['e300'])?$_GET['e300']:'';
	$e301 = isset($_GET['e301'])?$_GET['e301']:'';
	echo '<div style="font-size:24px; height:60px;" id="uploading">';
	echo 'Uploading House ...';
	echo '<div id="uploadAmharic">ቤት የማስገባት ሂደት ...</div>';
	echo '</div>';
	location($e116); //from centerColumn
	currency($e117);
	$tmpArr = array("112"=>$e112,"113"=>$e113,"114"=>$e114,"115"=>$e115);
	pricehouse($tmpArr);
	$tmpArr = array("104"=>$e104,"210"=>$e210,"212"=>$e212);
	houseCategory($tmpArr);
	kebele($e101);
	wereda($e102);
	yearOfBuilt($e106);
	numberOfBedrooms($e208);
	numberOfBathrooms($e209);
	numberOfToilet($e107);
	water($e103);
	electricity($e105);
	title($e108);       //from centerColumm 108
	description($e109);   //from centerColumn 109
	contactMethod($e111); //from centerColumn 111
	$pArr = array("300"=>$e300,"301"=>$e301);
	centerPicture($pArr); //from centerColumn
	echo '<input id="submitBtn" type="submit" name= "Submit" ';
	echo 'value="Upload Now" class="smallbutton"/>';
	echo '</form>';
	echo'</div>';
	echo'</div>';
}
/**/
function pricehouse($hash)
{
	$sellVal = isset($_GET['sellVal'])?$_GET['sellVal']:'';
	$rentVal = isset($_GET['rentVal'])?$_GET['rentVal']:'';
	$rate    = isset($_GET['rate'])?$_GET['rate']:'';
	$rent    = isset($_GET['rent'])?$_GET['rent']:'';
	$sell    = isset($_GET['sell'])?$_GET['sell']:'';
	$nego    = isset($_GET['nego'])?$_GET['nego']:'';
	
	echo '<div class="rent_sell_nego">';
	echo '<div class="rent_div">';
	echo '<label>Rent/ኪራይ</label>';
	echo '<input class="radio" type="checkbox" name="h_isrent" id="h_isrent"';
	if($rent)
	{
		echo ' checked';
		$show="display:;";
	}
	else
	{
		$show="display:none;";
	}
	echo '>';
	echo '<div style="'.$show.'" class="h_isrent">';
	echo '<input type="text" name="rent_amt_input" class="amt_input" style="width:25%;" placeholder="amount"value="';
	echo $rentVal;
	echo '">';
	echo '<select name="rent_rate_select" class="rate_select">';
	echo '<option value="000">[Rate]</option>';
	echo '<option value = "1month"';if($rate=="1month") echo " selected"; echo '>per month/በወር</option>';
	echo '<option value = "6month"';if($rate=="6month") echo " selected"; echo '>per half-year/በ6 ወር</option>';
	echo '<option value = "12month"';if($rate=="12month") echo " selected"; echo '>per year/በዓመት</option>';
	echo '</select>';
	echo '</div>';
	echo '</div>';
	echo '';
	echo '<div class="sell_div">';
	echo '<label>sell/&#4669;&#4843;&#4909;</label>';
	echo '<input class="radio" type="checkbox" name="h_issell" id="h_issell"';
	if($sell)
	{
		echo ' checked';
		$show="display:;";
	}
	else
	{
		$show="display:none;";
	}
	echo '>';
	echo '<div style="'.$show.'" class="h_issell">';
	echo '<input type="text" name="sell_amt_input" class="amt_input"  style="width:25%;"  placeholder="amount"value="';
	echo $sellVal;
	echo '">';
	echo '</div>';
	echo '</div>';
	echo '<div class ="nego_div">';
	echo '<label>&nbsp;negotiable price/እንስማማለን</label>';
	echo '<input class="radio" type="checkbox" name="nego" id="h_isnego"';
	if($nego)
	{
		echo ' checked';
	}
	echo '>';	
	echo '</div>';
	echo '</div>';
	$error='';
	if(crypt(112, $hash["112"]) == $hash["112"])
	{
		$error.='Choose rent, sell or negotiable price.</br>';
	}
	if(crypt(113, $hash["113"]) == $hash["113"])
	{
		$error.='Rent price is required.</br>';
	}
	if(crypt(114, $hash["114"]) == $hash["114"])
	{
		$error.='Rate is required.</br>';
	}
	if(crypt(115, $hash["115"]) == $hash["115"])
	{
		$error.='Sell price is required.</br>';
	}
	echo '<div id="myform_errorloc" style="margin-left:160px;"class="error_strings">'.$error.'</div>';
}
/**/
function houseCategory($hash)
{
	$lotsize    = isset($_GET['lotsize'])?$_GET['lotsize']:'';
	$category    = isset($_GET['category'])?$_GET['category']:'';
	$condeminiumFloor = isset($_GET['condeminiumFloor'])?$_GET['condeminiumFloor']:'';
	
	echo '<div id = "h_category">';
	echo '<label>House Type<div id="uploadAmharic">የቤቱ ዓይነት</div></label>';
	echo '<select name="hcategory" id="hcategory">';
	echo '<option value = "0" ';if($category=="0") echo " selected"; echo '>choose house type</option>';
	echo '<option value = "1" ';if($category=="1") echo " selected"; echo '>Residential/መኖርያ</option>';
	echo '<option value = "2" ';if($category=="2") echo " selected"; echo '>Commercial/የንግድ</option>';
	echo '<option value = "3" ';if($category=="3") echo " selected"; echo '>Condeminium/ኮንዶሚንየም</option>';
	echo '<option value = "4" ';if($category=="4") echo " selected"; echo '>Empty Land/ባዶ መሬት</option>';
	echo '</select>';
	if($category == "4"){
		$show = 'style="display:"';
	}
	else {
		$show = 'style="display:none"';
	}
	echo '<input '.$show.' text-align:right;" id="lotsize" placeholder="lot size (m2) ካሬ ሜትር" type="text" name="lotsize" class="lotsize" value="'.$lotsize.'"/>';
	if($category == "3"){
		$show = 'style="display:"';
	}
	else {
		$show = 'style="display:none"';
	}
	echo '<select '.$show.' name= "condeminiumFloor" class="smallselect" id="condeminiumFloor">';
	echo '<option value="000">[Floor]</option>';	
	echo '<option value="ground"'; if($condeminiumFloor=="ground") echo " selected"; echo '>Ground</option>';
	hLister(1, 10, $condeminiumFloor);
	echo '</div>';
	
	if(crypt(104, $hash["104"]) == $hash["104"])
	{
		$error ='Choose house type.</br>';
		echo '<div id="myform_errorloc" style="margin-left:160px;"class="error_strings">'.$error.'</div>';
	}
	if(crypt(212, $hash["212"]) == $hash["212"] && $category == "4")
	{
		$error ='Lotsize is required.</br>';
		echo '<div id="myform_errorloc" style="margin-left:160px;"class="error_strings">'.$error.'</div>';
	}
	if(crypt(210, $hash["210"]) == $hash["210"] && $category == "3")
	{
		$error ='Floor is required.</br>';
		echo '<div id="myform_errorloc" style="margin-left:160px;"class="error_strings">'.$error.'</div>';
	}
	
}
/**/
function kebele($hash)
{
	$kebele    = isset($_GET['kebele'])?$_GET['kebele']:'';	
	echo'<div id = "kebele">';
	echo'<label>Kebele<div id="uploadAmharic">ቀበሌ</div></label>';
	echo'<select class="smallselect" name="kebele">';
	echo'<option value="000">[Choose]</option>';
	hLister(1, 10,$kebele);
	if(crypt(101, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Kebele is required</div>';
	}
	echo '</div>';
}
/**/
function wereda($hash){
	$wereda    = isset($_GET['wereda'])?$_GET['wereda']:'';
	echo '<div id = "wereda">';
	echo '<label>Wereda<div id="uploadAmharic">ወረዳ</div></label>';
	echo '<select name="wereda" class="smallselect">';
	echo '<option value="000">[Choose]</option>';
	hLister(1, 10, $wereda);
	if(crypt(102, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Wereda is required</div>';
	}
	echo '</div>';
}
/**/
function yearOfBuilt($hash)
{
	$year    = isset($_GET['year'])?$_GET['year']:'';
	
	echo '<div id = "year">';
	echo '<label>Year Of Built<div id="uploadAmharic">የተሰራበት ዓመት</div></label>';
	echo '<select name= "year" class="smallselect">';
	echo '<option value="000">Year</option>';
	echo '<option value = "Before 1920s" ';if($year=="Before 1920s") echo " selected"; echo '>Before 1920s</option>';
	echo '<option value = "1920" ';if($year=="1920") echo " selected"; echo '>In 20s</option>';
	echo '<option value = "1930" ';if($year=="1930") echo " selected"; echo '>In 30s</option>';
	echo '<option value = "1940" ';if($year=="1940") echo " selected"; echo '>In 40s</option>';
	echo '<option value = "1950" ';if($year=="1950") echo " selected"; echo '>In 50s</option>';
	echo '<option value = "1960" ';if($year=="1960") echo " selected"; echo '>In 60s</option>';
	echo '<option value = "1970" ';if($year=="1970") echo " selected"; echo '>In 70s</option>';
	hLister(1980, 2014,$year);
	if(crypt(106, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Year of Built is required</div>';
	}
	echo '</div>';
}
/**/
function water($hash)
{
	$water    = isset($_GET['water'])?$_GET['water']:'';
	echo '<div id = "water">';
	echo '<label>Water<div id="uploadAmharic">ውሀ</div></label>';
	echo '<select name ="Water" class="smallselect">';
	echo '<option value="000">[Choose]</option>';
	echo '<option value = "1"';if($water=="1") echo " selected"; echo '>YES/አለው</option>';
	echo '<option value = "2"';if($water=="2") echo " selected"; echo '>NO/የለውም</option>';
	echo '</select>';
	if(crypt(103, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Water is required</div>';
	}
	echo '</div>';
}
/**/
function electricity($hash)
{
	$electricity    = isset($_GET['electricity'])?$_GET['electricity']:'';
	echo '<div id = "Electricity">';
	echo '<label>Electricity<div id="uploadAmharic"> መብራት</div></label>';
	echo '<select name ="Electricity" class="smallselect">';
	echo '<option value="000">[Choose]</option>';
	echo '<option value = "1"';if($electricity=="1") echo " selected"; echo '>YES/አለው</option>';
	echo '<option value = "2"';if($electricity=="2") echo " selected"; echo '>NO/የለውም</option>';
	echo '</select>';
	if(crypt(105, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Electricity is required</div>';
	}
	echo '</div>';
}
/**/
function numberOfBedrooms($hash)
{
	$numberOfBedrooms = isset($_GET['numberOfBedrooms'])?$_GET['numberOfBedrooms']:'';
	echo '<div id = "numberOfBedrooms">';
	echo '<label>Bedrooms<div id="uploadAmharic">የክፍሎች ብዛት</div></label>';
	echo '<select name= "numberOfBedrooms" class="smallselect">';
	echo '<option value="000">[Choose]</option>';
	hLister(1, 10,$numberOfBedrooms);
	if(crypt(208, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Number of bedrooms is required</div>';
	}
	echo '</div>';
}
/**/
function numberOfBathrooms($hash)
{
	$numberOfBathrooms = isset($_GET['numberOfBathrooms'])?$_GET['numberOfBathrooms']:'';
	echo '<div id = "numberOfBathrooms">';
	echo '<label>Bathrooms<div id="uploadAmharic">የባኞ ቤት ብዛት</div></label>';
	echo '<select name= "numberOfBathrooms" class="smallselect">';
	echo '<option value="000">[Choose]</option>';
	hLister(1, 12,$numberOfBathrooms);
	if(crypt(209, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Number of Bathroom is required</div>';
	}
	echo '</div>';
}
/**/
function numberOfToilet($hash)
{
	$numberOfToilet = isset($_GET['numberOfToilet'])?$_GET['numberOfToilet']:'';
	echo '<div id = "numberOfToilet">';
	echo '<label>Toilets<div id="uploadAmharic">የመጸዳጃ ቤት ብዛት</div></label>';
	echo '<select name= "numberOfToilet" class="smallselect">';
	echo '<option value="000">[Choose]</option>';
	hLister(1, 6, $numberOfToilet);
	if(crypt(107, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Number of toilet is required</div>';
	}
	echo '</div>';
}
/**/
function hLister($start,$end, $val)
{

	for($i = $start; $i <= $end; $i++)
	{
		echo '<option value = "'.$i.'"'; if($val==$i) echo " selected"; echo '>'.$i.'</option>';
	}
	echo'</select>';
}
?>