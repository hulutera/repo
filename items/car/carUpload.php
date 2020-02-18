<?php
require_once $documnetRootPath . '/classes/page.printout.php';
require_once $documnetRootPath . '/includes/centerColumns.php';

function carUpld()
{
	//_START_CAR
	echo '<div id="carContent">';
	echo '<div id="stylized" class="myform">';
	echo '<form enctype="multipart/form-data" action="../../includes/validateAndUpload.php?type=car" name="myform" id="myform" method="POST">';
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
	$e300 = isset($_GET['e300'])?$_GET['e300']:'';
	$e301 = isset($_GET['e301'])?$_GET['e301']:'';
	echo '<div style="font-size:24px; height:60px;" id="uploading">';
	echo 'Uploading Car ...';
	echo '<div id="uploadAmharic">መኪና የማስገባት ሂደት ...</div>';
	echo '</div>';
	location($e116); //from centerColumn
	currency($e117);
	$pArr = array("112"=>$e112,"113"=>$e113,"114"=>$e114,"115"=>$e115);
	pricecar($pArr);
	carType($e110); //110
	carMake($e100); //100
	carModel($e101); //101
	year(2014,$e102); //102
	gearType($e106);	//106
 	fueltype($e104); //104
 	milage(100,$e107);	//107
 	seat(15,$e103); 	//103
 	carColor($e105);	//105
	title($e108);       //from centerColumm 108
	description($e109);   //from centerColumn 109
	contactMethod($e111); //from centerColumn 111
	$pArr = array("300"=>$e300,"301"=>$e301);
	centerPicture($pArr); //from centerColumn
	echo '<input id="submitBtn" type="submit" name= "Submit" ';
	echo 'value="Upload Now" class="smallbutton"/>';
	echo '</form>';
	echo '</div>'; //end_carcontent
}
function carModel($hash)
{
	$model = isset($_GET['model'])?$_GET['model']:'';
	echo '<div id="carmodel">';
	echo '<label><div>Model</div><div id="uploadAmharic">ሞዴል</div></label>';
	echo '<input type="text" name="model" value="'.$model.'">';
	if(crypt(101, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Car model is required</div>';
	}
	echo '</div>';
}
function carMake($hash)
{
	$make = isset($_GET['make'])?$_GET['make']:'';
	echo '<div id="c_make">';
	echo '<label>Make<div id="uploadAmharic">አምራች ድርጅት</div></label>';
	echo '<select class="make" name="make"  id="make">';
	echo '<option value="000">[Select Brand]</option>';
	echo '<option value="acura" ';if($make=="acura") echo " selected"; echo ' >Acura</option>';
	echo '<option value="aston-martin" ';if($make=="aston-martin") echo " selected"; echo ' >Aston Martin</option>';
	echo '<option value="audi" ';if($make=="audi") echo " selected"; echo ' >Audi</option>';
	echo '<option value="bentley" ';if($make=="bentley") echo " selected"; echo ' >Bentley</option>';
	echo '<option value="bmw" ';if($make=="bmw") echo " selected"; echo ' >BMW</option>';
	echo '<option value="buick" ';if($make=="buick") echo " selected"; echo ' >Buick</option>';
	echo '<option value="cadillac" ';if($make=="cadillac") echo " selected"; echo ' >Cadillac</option>';
	echo '<option value="chevrolet" ';if($make=="chevrolet") echo " selected"; echo ' >Chevrolet</option>';
	echo '<option value="chevrolet-truck" ';if($make=="chevrolet-truck") echo " selected"; echo ' >Chevrolet Truck</option>';
	echo '<option value="chrysler" ';if($make=="chrysler") echo " selected"; echo ' >Chrysler</option>';
	echo '<option value="dodge" ';if($make=="dodge") echo " selected"; echo ' >Dodge</option>';
	echo '<option value="ferrari" ';if($make=="ferrari") echo " selected"; echo ' >Ferrari</option>';
	echo '<option value="fiat" ';if($make=="fiat") echo " selected"; echo ' >Fiat</option>';
	echo '<option value="fisker" ';if($make=="fisker") echo " selected"; echo ' >Fisker</option>';
	echo '<option value="ford" ';if($make=="ford") echo " selected"; echo ' >Ford</option>';
	echo '<option value="ford-truck" ';if($make=="ford-truck") echo " selected"; echo ' >Ford Truck</option>';
	echo '<option value="freightliner" ';if($make=="freightliner") echo " selected"; echo ' >Freightliner</option>';
	echo '<option value="gmc" ';if($make=="gmc") echo " selected"; echo ' >GMC</option>';
	echo '<option value="gmc-truck" ';if($make=="gmc-truck") echo " selected"; echo ' >GMC Truck</option>';
	echo '<option value="honda" ';if($make=="honda") echo " selected"; echo ' >Honda</option>';
	echo '<option value="hyundai" ';if($make=="hyundai") echo " selected"; echo ' >Hyundai</option>';
	echo '<option value="infiniti" ';if($make=="infiniti") echo " selected"; echo ' >Infiniti</option>';
	echo '<option value="jaguar" ';if($make=="jaguar") echo " selected"; echo ' >Jaguar</option>';
	echo '<option value="jeep" ';if($make=="jeep") echo " selected"; echo ' >Jeep</option>';
	echo '<option value="kia" ';if($make=="kia") echo " selected"; echo ' >Kia</option>';
	echo '<option value="lamborghini" ';if($make=="lamborghini") echo " selected"; echo ' >Lamborghini</option>';
	echo '<option value="land-rover" ';if($make=="land-rover") echo " selected"; echo ' >Land Rover</option>';
	echo '<option value="lexus" ';if($make=="lexus") echo " selected"; echo ' >Lexus</option>';
	echo '<option value="lincoln" ';if($make=="lincoln") echo " selected"; echo ' >Lincoln</option>';
	echo '<option value="lotus" ';if($make=="lotus") echo " selected"; echo ' >Lotus</option>';
	echo '<option value="maserati" ';if($make=="maserati") echo " selected"; echo ' >Maserati</option>';
	echo '<option value="maybach" ';if($make=="maybach") echo " selected"; echo ' >Maybach</option>';
	echo '<option value="mazda" ';if($make=="mazda") echo " selected"; echo ' >Mazda</option>';
	echo '<option value="mercedes-benz" ';if($make=="mercedes-benz") echo " selected"; echo ' >Mercedes-Benz</option>';
	echo '<option value="mini" ';if($make=="mini") echo " selected"; echo ' >MINI</option>';
	echo '<option value="mitsubishi" ';if($make=="mitsubishi") echo " selected"; echo ' >Mitsubishi</option>';
	echo '<option value="nissan" ';if($make=="nissan") echo " selected"; echo ' >Nissan</option>';
	echo '<option value="nissan-truck" ';if($make=="nissan-truck") echo " selected"; echo ' >Nissan Truck</option>';
	echo '<option value="porsche" ';if($make=="porsche") echo " selected"; echo ' >Porsche</option>';
	echo '<option value="ram" ';if($make=="ram") echo " selected"; echo ' >Ram</option>';
	echo '<option value="rolls-royce" ';if($make=="rolls-royce") echo " selected"; echo ' >Rolls-Royce</option>';
	echo '<option value="saab" ';if($make=="saab") echo " selected"; echo ' >Saab</option>';
	echo '<option value="scion" ';if($make=="scion") echo " selected"; echo ' >Scion</option>';
	echo '<option value="smart" ';if($make=="smart") echo " selected"; echo ' >smart</option>';
	echo '<option value="subaru" ';if($make=="subaru") echo " selected"; echo ' >Subaru</option>';
	echo '<option value="suzuki" ';if($make=="suzuki") echo " selected"; echo ' >Suzuki</option>';
	echo '<option value="tesla" ';if($make=="tesla") echo " selected"; echo ' >Tesla</option>';
	echo '<option value="toyota" ';if($make=="toyota") echo " selected"; echo ' >Toyota</option>';
	echo '<option value="toyota-truck" ';if($make=="toyota-truck") echo " selected"; echo ' >Toyota Truck</option>';
	echo '<option value="volkswagen" ';if($make=="volkswagen") echo " selected"; echo ' >Volkswagen</option>';
	echo '<option value="volvo" ';if($make=="volvo") echo " selected"; echo ' >Volvo</option>';	
	echo '</select>';
	if(crypt(100, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Car Make is required</div>';
	}
	echo '</div>';
}
function carAdvancedContent()
{
	echo '<div class="carAdvancedContentChk">';
	echo '<label>More Detailed Info<div id="uploadAmharic">የበለጠ ዝርዝር  ለማስገባት </div></label>';
	echo '<input class="radio" type="checkbox" name="c_isAdvanced" id="c_isAdvanced">';
	echo '</div>';

}
function carColor($hash)
{
	$color = isset($_GET['color'])?$_GET['color']:'';
	echo '<div id="carcolor">';
	echo '<label><div>color</div><div id="uploadAmharic">ከለር</div></label>';
	echo '<select name="color" id="color" class="smallselect">';
	echo '<option value="000" style="background-color:white;">[Color]</option>';
	echo '<option value = "red"';if($color=="red") echo " selected"; echo 'style="background:red">Red/ቀይ</option>';
	echo '<option value = "green"';if($color=="green") echo " selected"; echo 'style="background:green">Green/አረጓዴ</option>';
	echo '<option value = "blue"';if($color=="blue") echo " selected"; echo 'style="background:blue">Blue/ሰማያዊ</option>';
	echo '<option value = "yellow"';if($color=="yellow") echo " selected"; echo 'style="background:yellow">Yellow/ቢጫ</option>';
	echo '<option value = "black"';if($color=="black") echo " selected"; echo 'style="background:black">Black/ጥቁር</option>';
	echo '<option value = "white"';if($color=="white") echo " selected"; echo 'style="background:white">White/ነጭ</option>';
	echo '<option value = "gray"';if($color=="gray") echo " selected"; echo 'style="background:gray">Gray/ግራጫ</option>';
	echo '<option value = "silver"';if($color=="silver") echo " selected"; echo 'style="background:silver">Silver/ሲልቨር</option>';
	echo '<option value = "liver"';if($color=="liver") echo " selected"; echo ' style="background:#674C47">Liver/ጉበትማ</option>';
	echo '<option value = "999"';if($color=="999") echo " selected"; echo '>Other/ሌላ</option>';
	echo '</select>';
	if(crypt(105, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Color is required</div>';
	}
	echo '</div>';
}

function pricecar($hash)
{
	$sellVal = isset($_GET['sellVal'])?$_GET['sellVal']:'';
	$rentVal = isset($_GET['rentVal'])?$_GET['rentVal']:'';
	$rate    = isset($_GET['rate'])?$_GET['rate']:'';
	$rent    = isset($_GET['rent'])?$_GET['rent']:'';
	$sell    = isset($_GET['sell'])?$_GET['sell']:'';
	$nego    = isset($_GET['nego'])?$_GET['nego']:'';
		
	echo '<div class="rent_sell_nego">';
	echo '<div class="rent_div">';
	echo '<div><label>Rent/ኪራይ</label></div>';
	echo '<input class="radio" type="checkbox" name="c_isrent" id="c_isrent"';
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
	echo '<div style="'.$show.'" class="c_isrent">';
	echo '<input type="text" name="rent_car_input" class="amt_input" style="width:25%;" placeholder="amount" value="';
	echo $rentVal;
	echo '">';
	echo '<select name="rent_rate_car_select" class="rate_select">';
	echo '<option value = "000">[Rate]</option>';
	echo '<option value = "hour"';if($rate=="hour") echo " selected"; echo '>per hour/በሰዓት</option>';
	echo '<option value = "day"';if($rate=="day") echo " selected"; echo '>per day/በቀን</option>';
	echo '<option value = "month"';if($rate=="month") echo " selected"; echo '>per month/በወር</option>';
	echo '</select>';
	echo '</div>';
	echo '</div>';
	echo '<div class="sell_div">';
	echo '<label>sell/ሽያጭ</label>';
	echo '<input class="radio" type="checkbox" name="c_issell" id="c_issell"';
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
	echo '<div style="'.$show.'" class="c_issell">';
	echo '<input type="text" name="sell_car_input" class="amt_input" style="width:25%;" placeholder="amount" value="';
	echo $sellVal;
	echo '">';
	echo '</div>';
	echo '</div>';
	echo '<div class ="nego_div">';
	echo '<label>&nbsp;negotiable price/እንስማማለን</label>';
	echo '<input class="radio" type="checkbox" name="nego" id="c_isnego"';
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
	echo '<div id="myform_errorloc" style="margin-left:160px;" class="error_strings">'.$error.'</div>';
}
function carType($hash)
{
	
	
	$type = isset($_GET['cat'])?$_GET['cat']:'';
	echo '<div id="c_type">';
	echo '<label>Car Type<div id="uploadAmharic">የመኪናው አይነት</div></label>';
	echo '<select name="type">';
	echo '<option value="000">[Choose type]</option>';	
	echo '<option value = "1"';if($type=="1") echo " selected"; echo '>Buses</option>';
	echo '<option value = "2"';if($type=="2") echo " selected"; echo '>Compact Car</option>';
	echo '<option value = "3"';if($type=="3") echo " selected"; echo '>Converitble</option>';
	echo '<option value = "4"';if($type=="4") echo " selected"; echo '>Full Size Van </option>';
	echo '<option value = "5"';if($type=="5") echo " selected"; echo '>Hunch Back</option>';
	echo '<option value = "6"';if($type=="6") echo " selected"; echo '>Heavy Machinery</option>';
	echo '<option value = "7"';if($type=="7") echo " selected"; echo '>Lift Back</option>';
	echo '<option value = "8"';if($type=="8") echo " selected"; echo '>Luxury Car</option>';
	echo '<option value = "9"';if($type=="9") echo " selected"; echo '>Mini-bus</option>';
	echo '<option value = "10"';if($type=="10") echo " selected"; echo '>Pick up</option>';
	echo '<option value = "11"';if($type=="11") echo " selected"; echo '>Small Car</option>';
	echo '<option value = "12"';if($type=="12") echo " selected"; echo '>Sport Car</option>';
	echo '<option value = "13"';if($type=="13") echo " selected"; echo '>Station Wagon</option>';
	echo '<option value = "14"';if($type=="14") echo " selected"; echo '>SUV</option>';
	echo '<option value = "15"';if($type=="15") echo " selected"; echo '>Taxi</option>';
	echo '<option value = "16"';if($type=="16") echo " selected"; echo '>Truck</option>';
	echo '<option value = "999"';if($type=="999") echo " selected"; echo '>Other</option>';
	echo '</select>';
	if(crypt(110, $hash) == $hash)
	{
		
		echo '<div id="myform_errorloc" class="error_strings">Car type is required</div>';
	}
	echo '</div>';
}
function gearType($hash)
{
	$gear = isset($_GET['gear'])?$_GET['gear']:'';
	echo '<div id="gear">';
	echo '<label><div>gear Type</div><div id="uploadAmharic">የሞተሩ ዓይነት</div></label>';
	echo '<select name = "gear" class="smallselect">';
	echo '<option value="000">[gear Type]</option>';
	echo '<option value = "Manual"';if($gear=="Manual") echo " selected"; echo '>Manual</option>';
	echo '<option value = "Automatic"';if($gear=="Automatic") echo " selected"; echo '>Automatic</option>';
	echo '<option value = "semiAuto"';if($gear=="semiAuto") echo " selected"; echo '>Semi-Automatic</option>';
	echo '</select>';
	if(crypt(106, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">gear Type is required</div>';
	}
	echo '</div>';
}
function seat($max,$hash)
{
	echo '<div id="seat">';
	echo '<label><div>No.Of seat</div><div id="uploadAmharic">የወንበር ብዛት</div></label>';
	echo '<select name="seat" class="smallselect">';
	echo '<option value="000">seat</option>';
	seatList(1,$max);
	echo '</div>';
}

/**/
function fueltype($hash)
{
	$fuel  = isset($_GET['fuel'])?$_GET['fuel']:'';
	echo '<div id="fuel">';
	echo '<label><div>fuel type</div><div id="uploadAmharic">ነዳጅ</div></label>';
	echo '<select name ="fuel"class="smallselect">';
	echo '<option value="000">[fuel Type]</option>';
	echo '<option value = "Besine"';if($fuel=="Besine") echo " selected"; echo '>Bensine/ቤንዚን</option>';
	echo '<option value = "Diesel"';if($fuel=="Diesel") echo " selected"; echo '>Diesel/ናፍጣ</option>';
	echo '<option value = "Bio"';if($fuel=="Bio") echo " selected"; echo '>Bio-Gas/ባዮ</option>';
	echo '</select>';
	if(crypt(104, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">fuel type is required</div>';
	}
	echo '</div>';
}
/**/
function year($maxYear,$hash)
{
	$year  = isset($_GET['year'])?$_GET['year']:'';
	echo '<div id="year">';
	echo '<label><div>Year Of Made</div><div id="uploadAmharic">የተፈበረከበት ዓመት</div></label>';
	echo '<select name= "year" class="smallselect">';
	echo '<option value="000">[Year]</option>';
	echo '<option value = "1940"';if($year=="1940") echo " selected"; echo '>Before 50s</option>';
	echo '<option value = "1950""';if($year=="1950") echo " selected"; echo '>Cars in 50s</option>';
	echo '<option value = "1960""';if($year=="1960") echo " selected"; echo '>Cars in 60s</option>';
	echo '<option value = "1970""';if($year=="1970") echo " selected"; echo '>Cars in 70s</option>';
	for($i = 1980; $i <= $maxYear; $i++)
	{
		echo '<option value = "'.$i.'"'; if($year==$i) echo " selected"; echo '>'.$i.'</option>';		
	}
	echo '</select>';
	if(crypt(102, $hash) == $hash)
	{
		echo '<div id="myform_errorloc" class="error_strings">Year of Manufacturing is required</div>';
	}
	echo '</div>';
}
/**/
function milage($max,$hash)
{
	$milage = isset($_GET['milage'])?$_GET['milage']:'';
	echo '<div id="milage">';
	echo '<label><div>milage</div><div id="uploadAmharic">የተጓዘው መጠን</div></label>';
	echo '<select name = "milage">';
	echo '<option value="000">[Km]</option>';
	for($i = 1; $i <= $max; $i++)
	{
		$range = 500;
		$x = $i*$range;
		$y = ($i+1)*$range-1;
		echo '<option value = "'.$i.'"'; if($milage==$i) echo " selected"; echo '>'.$x.' - '.$y.'</option>';
	}
	echo '</select>';
	echo '</div>';
}
/**/
function seatList($start, $end)
{
	$seat = isset($_GET['seat'])?$_GET['seat']:'';
	for($i = $start; $i <= $end; $i++)
	{
		echo '<option value = "'.$i.'"'; if($seat==$i) echo " selected"; echo '>'.$i.'</option>';
	}
	echo'</select>';
}
?>