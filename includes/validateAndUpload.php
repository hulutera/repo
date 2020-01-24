<?php
session_start();

$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/db/database.class.php';
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
require_once $documnetRootPath.'/includes/centerColumns.php';
require_once $documnetRootPath.'/classes/cmn.class.php';
$connect = DatabaseClass::getInstance()->getConnection();

if(!isset($_SESSION['uID']) ){
	header('Location:'. $documnetRootPath.'index.php');
}

if(isset($_POST['Submit']))
{
	if(isset($_SESSION['uID']))
	{
		$item    = $_GET['type'];
		switch ($item)
		{
			case 'car':         carUploadfn();          break;
			case 'computer':    computerUploadfn();     break;
			case 'house':       houseUploadfn();        break;
			case 'household':   householdUploadfn();    break;
			case 'electronics': electronicsUploadfn();  break;
			case 'phone':       phoneUploadfn();        break;
			case 'others':      otherUploadfn();        break;
		}
	}
	else
	{
		header('Location: ../includes/prompt.php?type=9');
	}
}
/**/
function carUploadfn()
{
	$city=$subcity=$tempId='';
	$region=$nego=$title=$currency=$description=$contact='';
	$e100=$e101=$e102=$e103=$e104=$e105=$e106=$e107=$e108=$e109=$e110=$e111=$e112=$e113=$e114=$e115=$e116=$e117='';
	$sellVal=$rentVal=$rate='';
	$rent=$sell=$nego=$currency.='';
	$description=$contact='';	
	$type=$make=$model=$year=$fuel=$gear=$milage=$seat=$color='';
	
	
	//car info
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		global $connect;
		$userId      = $_SESSION['uID'];
		$status      = CommonClass::status;

		//price
		$isRent      = isset($_POST['c_isrent']) ? $rentVal = $_POST['rent_car_input'] : $rentVal = '';
		$issell      = isset($_POST['c_issell']) ? $sellVal = $_POST['sell_car_input'] : $sellVal = '';


		if($isRent && !$issell)	{
			$mrktCat = CommonClass::rent;
		}else if(!$isRent && $issell){
			$mrktCat = CommonClass::sell;    /*sell*/
		}else if($isRent && $issell)	{
			$mrktCat = CommonClass::rentOrSell;  /*sell or rent*/
		}else{
			$mrktCat = CommonClass::noAction;    /*no action*/
		}
		//location
		$city        = $_POST['region']!='000'?$_POST['region']:0;
		$subcity     = $_POST['subcity']!='Addis Ababa'?$_POST['subcity']:0;
		$region      = $subcity != 0? $subcity.','.$city: $city;
		$tempId      = rand(0,999).rand(0,50);

		$err = false;
		//
		if ($_POST["type"] == '000') {
			$e110 = crypt(110);
			$err = true;
		}else {
			$type = $_POST["type"];

		}
		//
		if ($_POST["make"] == '000') {
			$e100 = crypt(100);
			$err = true;
		}else {
			$make = $_POST["make"];

		}
		//
		if(empty($_POST['model'])){
			$e101 = crypt(101);
			$err = true;
		}else{
			$model = sanitize($_POST['model']);

		}
		//
		if($_POST['year'] =='000'){
			$e102 = crypt(102);
			$err = true;
		}else{
			$year = $_POST['year'];

		}
		//
		if($_POST['seat'] =='000'){
			$e103 = crypt(103);
			$err = true;
		}else{
			$seat = $_POST['seat'];

		}
		//
		if($_POST['fuel'] =='000'){
			$e104 = crypt(104);
			$err = true;
		}else{
			$fuel = $_POST['fuel'];

		}
		//
		if($_POST['color'] =='000'){
			$e105 = crypt(105);
			$err = true;
		}else{
			$color = $_POST['color'];

		}
		//
		if($_POST['gear'] =='000'){
			$e106 = crypt(106);
			$err = true;
		}else{
			$gear = $_POST['gear'];

		}
		//
		if($_POST['milage'] =='000'){
			$e107 = crypt(107);
			$err = true;
		}else{
			$milage = $_POST['milage'];

		}
		//
		if(empty($_POST['title'])){
			$e108 = crypt(108);
			$err = true;
		}else{
			$title = sanitize($_POST['title']);
		}
		//
		if(empty($_POST['description'])){
			$e109 = crypt(109);
			$description = "";
			$err = true;
		}else{
			$description = sanitize($_POST['description']);
		}
		//
		if($_POST['contactMethod'] =='000'){
			$e111 = crypt(111);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			$contact = $_POST['contactMethod'];
		}
		//
		if(isset($_POST['nego'])){
			$nego = 1;
			$rate = '';
		}else{
			$nego = 0;
			//$nego =  CommonClass::nego;
		}
		if(!isset($_POST['c_isrent']) && !isset($_POST['c_issell']) && !isset($_POST['nego'])){
			$e112 = crypt(112);
			$err = true;
		}
		if(isset($_POST['c_isrent'])){ //is checked
			if($rentVal == '' || !ctype_digit(sanitize($rentVal))){ //checked no values provided
				$e113 = crypt(113);
				$rentVal = '';
				$err = true;
			}
			if ($_POST['rent_rate_car_select'] == '000'){ //checked value provided, rate not
				$e114 = crypt(114);
				$err = true;
			}else{
				$rate = $_POST['rent_rate_car_select'];
			}
		}
		if(isset($_POST['c_issell'])){ //is checked
			if($sellVal == ''){ //checked no values provided
				$e115 = crypt(115);
				$err = true;
			}
		}
		$rent = isset($_POST['c_isrent'])?true:false;
		$sell = isset($_POST['c_issell'])?true:false;

		if($_POST['region'] =='000'){
			$e116 = crypt(116);
			$err = true;
		}else{
			$region = $_POST['region'];
		}
		if($_POST['currency'] =='000'){
			$e117 = crypt(117);
			$err = true;
		}else{
			$currency = $_POST['currency'];
		}
		if($err)
		{
			header('Location: ../../includes/template.upload.php?type=car'.
					'&e100='.$e100.
					'&e101='.$e101.
					'&e102='.$e102.
					'&e103='.$e103.
					'&e104='.$e104.
					'&e105='.$e105.
					'&e106='.$e106.
					'&e107='.$e107.
					'&e108='.$e108.
					'&e109='.$e109.
					'&e110='.$e110.
					'&e111='.$e111.
					'&e112='.$e112.
					'&e113='.$e113.
					'&e114='.$e114.
					'&e115='.$e115.
					'&e116='.$e116.
					'&e117='.$e117.
					'&region='.$region.
					'&sellVal='.$sellVal.
					'&rentVal='.$rentVal.
					'&rate='.$rate.
					'&cat='.$type.
					'&make='.$make.
					'&model='.$model.
					'&year='.$year.
					'&fuel='.$fuel.
					'&gear='.$gear.
					'&milage='.$milage.
					'&seat='.$seat.
					'&color='.$color.
					'&title='.$title.
					'&rent='.$rent.
					'&sell='.$sell.
					'&nego='.$nego.
					'&currency='.$currency.
					'&description='.$description.
					'&contact='.$contact);
			exit;
		}


		//these parameters should be used and the table should be updated
		$result= $connect->query("INSERT INTO car(
				uID,carCategoryID,contactMethodCategoryId,
				cPriceRent,cPricesell,cPriceNego,cPriceRate,
				currency,cMake,cModel,cYearOfMfg,
				cNrOfSeats,cFuelType,cColor,cGear,
				cMilage,cLocation,cExtraInfo,cTitle,
				cStatus,marketCategory,tempID)
				VALUES(
				'$userId','$type','$contact','$rentVal',
				'$sellVal','$nego','$rate','$currency','$make',
				'$model','$year','$seat','$fuel','$color',
				'$gear','$milage','$region','$description','$title',
				'$status','$mrktCat','$tempId')")
				or die(mysqli_error($connect));
		if($result)
		{
			$tblArray = array(1=>"cID", 2=>"car",3=>$tempId,4=>CommonClass::CImage);
			imageHandler($tblArray);
		}
	}
}
//$tempId,$userId,$region,$title,$isNego,$contact,$description,$status
function houseUploadfn()
{
	$city=$subcity=$tempId='';
	$region=$nego=$title=$currency=$description=$contact='';
	$e100=$e101=$e102=$e103=$e104=$e105=$e106=$e107=$e108=$e109=$e110=$e111=$e112=$e113=$e114=$e115=$e116=$e117='';
	$e208=$e209=$e210=$e211=$e212='';
	
	$sellVal=$rentVal=$rate='';
	$category=$kebele=$wereda='';
	$lotsize=$condeminiumFloor=$numberOfBedrooms=$numberOfToilet=$numberOfBathrooms='';
	$water=$electricity=$year='';
	$rent=$sell=$nego=$currency.='';
	$description=$contact='';
	
	global $connect;
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		global $connect;
		$userId      = $_SESSION['uID'];
		$status      = CommonClass::status;

		//price
		$isRent = isset($_POST['h_isrent']) ? $rentVal = $_POST['rent_amt_input'] :$rentVal = '';
		$issell = isset($_POST['h_issell']) ? $sellVal = $_POST['sell_amt_input'] :$sellVal = '';


		if($isRent && !$issell)	{
			$mrktCat = CommonClass::rent;
		}else if(!$isRent && $issell){
			$mrktCat = CommonClass::sell;    /*sell*/
		}else if($isRent && $issell)	{
			$mrktCat = CommonClass::rentOrSell;  /*sell or rent*/
		}else{
			$mrktCat = CommonClass::noAction;    /*no action*/
		}
		//location
		$city        = $_POST['region']!='000'?$_POST['region']:0;
		$subcity     = $_POST['subcity']!='Addis Ababa'?$_POST['subcity']:0;
		$region      = $subcity != 0? $subcity.','.$city: $city;
		$tempId      = rand(0,999).rand(0,50);

		$err = false;
		if($_POST['kebele']=='000'){
			$e101 = crypt(101);
			$err = true;
		}else{
			$kebele	= $_POST['kebele'];
		}
		if($_POST['wereda']=='000'){
			$e102 = crypt(102);
			$err = true;
		}else{
			$wereda	= $_POST['wereda'];
		}
		if($_POST['Water']=='000'){
			$e103 = crypt(103);
			$err = true;
		}else{
			$water	= $_POST['Water'];
		}

		if($_POST['Electricity']=='000'){
			$e105 = crypt(105);
			$err = true;
		}else{
			$electricity	= $_POST['Electricity'];
		}
		if($_POST['year']=='000'){
			$e106 = crypt(106);
			$err = true;
		}else{
			$year	= $_POST['year'];
		}
		if($_POST['numberOfToilet']=='000'){
			$e107 = crypt(107);
			$err = true;
		}else{
			$numberOfToilet	= $_POST['numberOfToilet'];
		}
		if($_POST['numberOfBedrooms']=='000'){
			$e208 = crypt(208);
			$err = true;
		}else{
			$numberOfBedrooms	= $_POST['numberOfBedrooms'];
		}
		if($_POST['numberOfBathrooms']=='000'){
			$e209 = crypt(209);
			$err = true;
		}else{
			$numberOfBathrooms	= $_POST['numberOfBathrooms'];
		}
		//
		if($_POST['hcategory']=='000'){
			$e104 = crypt(104);
			$err = true;
		}else{
			$category	= $_POST['hcategory'];
			if($category=="3" && $_POST['condeminiumFloor']=='000'){
				$e210 = crypt(210);
				$err = true;
			}else{
				$condeminiumFloor	= $_POST['condeminiumFloor'];
			}
			if($category=="4" && empty($_POST['lotsize'])){
				$e212 = crypt(212);
				$err = true;
			}else{
				$lotsize= sanitize($_POST['lotsize']);
			}
		}

		if($isRent && !$issell){
			$mrktCat = CommonClass::rent;
		}elseif(!$isRent && $issell){
			$mrktCat = CommonClass::sell;    /*sell*/
		}elseif($isRent && $issell){
			$mrktCat = CommonClass::rentOrSell;  /*sell or rent*/
		}else{
			$mrktCat = CommonClass::noAction;    /*no action*/
		}
		//
		if(empty($_POST['title'])){
			$e108 = crypt(108);
			$err = true;
		}else{
			$title = sanitize($_POST['title']);
		}
		//
		if(empty($_POST['description'])){
			$e109 = crypt(109);
			$description = "";
			$err = true;
		}else{
			$description = sanitize($_POST['description']);
		}
		//
		if($_POST['contactMethod'] =='000'){
			$e111 = crypt(111);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			$contact = $_POST['contactMethod'];
		}
		//
		if(isset($_POST['nego'])){
			$nego = 1;
			$rate = '';
		}else{
			$nego = 0;
			//$nego =  CommonClass::nego;
		}
		if(!isset($_POST['h_isrent']) && !isset($_POST['h_issell']) && !isset($_POST['nego'])){
			$e112 = crypt(112);
			$err = true;
		}
		if(isset($_POST['h_isrent'])){ //is checked
			if($rentVal == '' || !ctype_digit(sanitize($rentVal))){ //checked no values provided
				$e113 = crypt(113);
				$err = true;
				$rentVal = '';
			}
			if ($_POST['rent_rate_select'] == '000'){ //checked value provided, rate not
				$e114 = crypt(114);
				$err = true;
			}else{
				$rate = $_POST['rent_rate_select'];
			}

		}

		if(isset($_POST['h_issell'])){ //is checked
			if($sellVal == ''){ //checked no values provided
				$e115 = crypt(115);
				$err = true;
			}
		}
		//
		if($_POST['region'] =='000'){
			$e116 = crypt(116);
			$err = true;
		}else{
			$region = $_POST['region'];
		}
		if($_POST['currency'] =='000'){
			$e117 = crypt(117);
			$err = true;
		}else{
			$currency = $_POST['currency'];
		}
		$rent = isset($_POST['h_isrent'])?true:false;
		$sell = isset($_POST['h_issell'])?true:false;
		if($err)
		{
			header('Location: ../../includes/template.upload.php?type=house'.
					'&e101='.$e101.
					'&e102='.$e102.
					'&e103='.$e103.
					'&e104='.$e104.
					'&e105='.$e105.
					'&e106='.$e106.
					'&e107='.$e107.
					'&e108='.$e108.
					'&e109='.$e109.
					'&e110='.$e110.
					'&e111='.$e111.
					'&e112='.$e112.
					'&e113='.$e113.
					'&e114='.$e114.
					'&e115='.$e115.
					'&e116='.$e116.
					'&e117='.$e117.
					'&e208='.$e208.
					'&e209='.$e209.
					'&e210='.$e210.
					'&e211='.$e211.
					'&e212='.$e212.
					'&region='.$region.
					'&sellVal='.$sellVal.
					'&rentVal='.$rentVal.
					'&rate='.$rate.
					'&category='.$category.
					'&kebele='.$kebele.
					'&wereda='.$wereda.
					'&lotsize='.$lotsize.
					'&condeminiumFloor='.$condeminiumFloor.
					'&numberOfBedrooms='.$numberOfBedrooms.
					'&numberOfToilet='.$numberOfToilet.
					'&numberOfBathrooms='.$numberOfBathrooms.
					'&water='.$water.
					'&electricity='.$electricity.
					'&year='.$year.
					'&title='.$title.
					'&rent='.$rent.
					'&sell='.$sell.
					'&nego='.$nego.
					'&currency='.$currency.
					'&description='.$description.
					'&contact='.$contact);
			exit;
		}
		$result= $connect->query("INSERT INTO house (
				uID,houseCategoryID,contactMethodCategoryId,hPriceRent,
				hPricesell,hPriceNego,hPriceRate,currency,hLocation,
				hKebele,hWereda,hLotSize,hBedrooms,hCondeminiumFloor,hToilet,hBathroom,
				hYearOfBuilt,hWater,hElectricity,hExtraInfo,hTitle,
				hStatus,marketCategory,tempID)
				VALUES(
				'$userId','$category','$contact','$rentVal',
				'$sellVal','$nego','$rate','$currency',
				'$region','$kebele','$wereda','$lotsize','$numberOfBedrooms','$condeminiumFloor',
				'$numberOfToilet','$numberOfBathrooms','$year','$water',
				'$electricity','$description','$title','$status','$mrktCat',
				'$tempId')")
				or die(mysqli_error());
		if($result)
		{
			$tblArray = array(1=>"hID", 2=>"house",3=>$tempId,4=>CommonClass::HImage);
			imageHandler($tblArray);
		}
	}
}
function computerUploadfn()
{
	$city=$subcity=$tempId='';
	$region=$price=$nego=$title=$currency=$description=$contact='';
	$e100=$e101=$e102=$e103=$e104=$e105=$e106=$e107=$e108=$e109=$e110=$e111=$e113=$e114=$e115=$e116=$e117='';
	$computerType=$brand=$os=$processor=$ram=$hardDisk='';
	
	//computer info
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		global $connect;
		$userId      = $_SESSION['uID'];
		$status  = CommonClass::status;
		$mrktCat = CommonClass::sell;
		//location
		$city        = $_POST['region']!='000'?$_POST['region']:0;
		$subcity     = $_POST['subcity']!='Addis Ababa'?$_POST['subcity']:0;
		$region      = $subcity != 0? $subcity.','.$city: $city;
		$tempId      = rand(0,999).rand(0,50);
		$err = false;

		if(empty($_POST['priceCommon'])){
			$e100 = crypt(100);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			if(ctype_digit(sanitize($_POST['priceCommon'])))
			{
				$price = sanitize($_POST['priceCommon']);
			}
			else {
				$e100 = crypt(100);
				$err = true;
			}
		}
		if($_POST['contactMethod'] =='000'){
			$e111 = crypt(111);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			$contact = $_POST['contactMethod'];
		}
		if(isset($_POST['nego'])){
			$nego = 1;
		}else{
			$nego = 0;
			//$nego =  CommonClass::nego;
		}
		if(empty($_POST['title'])){
			$e108 = crypt(108);
			$err = true;
		}else{
			$title = sanitize($_POST['title']);
		}
		if(empty($_POST['description'])){
			$e109 = crypt(109);
			$description = "";
			$err = true;
		}else{
			$description = sanitize($_POST['description']);
		}
		if($_POST['computer'] =='000'){
			$e102 = crypt(102);
			$err = true;
		}else{
			$computerType = $_POST['computer'];
		}
		if($_POST['computerHD'] =='000'){
			$e103 = crypt(103);
			$err = true;
		}else{
			$hardDisk = $_POST['computerHD'];
		}
		if($_POST['computerOS'] =='000'){
			$e104 = crypt(104);
			$err = true;
		}else{
			$os = $_POST['computerOS'];
		}
		if($_POST['computerRAM'] =='000'){
			$e110 = crypt(110);
			$err = true;
		}else{
			$ram = $_POST['computerRAM'];
		}
		if($_POST['computerBrand'] =='000'){
			$e106 = crypt(106);
			$err = true;
		}else{
			$brand = $_POST['computerBrand'];
		}
		if($_POST['computerProcessor'] =='000'){
			$e107 = crypt(107);
			$err = true;
		}else{
			$processor = $_POST['computerProcessor'];
		}

		if($_POST['region'] =='000'){
			$e116 = crypt(116);
			$err = true;
		}else{
			$region = $_POST['region'];
		}
		if($_POST['currency'] =='000'){
			$e117 = crypt(117);
			$err = true;
		}else{
			$currency = $_POST['currency'];
		}
		if($err)
		{
			header('Location: ../../includes/template.upload.php?type=computer'.
					'&e100='.$e100.
					'&e101='.$e101.
					'&e102='.$e102.
					'&e103='.$e103.
					'&e104='.$e104.
					'&e105='.$e105.
					'&e106='.$e106.
					'&e107='.$e107.
					'&e108='.$e108.
					'&e109='.$e109.
					'&e110='.$e110.
					'&e111='.$e111.
					'&e113='.$e113.
					'&e114='.$e114.
					'&e115='.$e115.
					'&e116='.$e116.
					'&e117='.$e117.
					'&region='.$region.
					'&price='.$price.
					'&nego='.$nego.
					'&computerType='.$computerType.
					'&brand='.$brand.
					'&os='.$os.
					'&processor='.$processor.
					'&ram='.$ram.
					'&hardDisk='.$hardDisk.
					'&title='.$title.
					'&currency='.$currency.
					'&description='.$description.
					'&contact='.$contact);
			exit;
		}
		//the fields should be taken care of accordingly
		$result= $connect->query("INSERT INTO computer (
				uID,compCategoryID,	contactMethodCategoryId,dPricesell,
				dPriceNego,	currency,dMade,dOS,dProcessor,dRAM,dHardDrive,
				dLocation,dExtraInfo,dTitle,dStatus,marketCategory,tempID)
				VALUES(
				'$userId','$computerType','$contact','$price',
				'$nego','$currency','$brand','$os','$processor',
				'$ram',	'$hardDisk','$region','$description','$title',
				'$status','$mrktCat','$tempId')")
				or die(mysqli_error());
		if($result)
		{
			$tblArray = array(1=>"dID", 2=>"computer",3=>$tempId,4=>CommonClass::DImage);
			imageHandler($tblArray);
		}
	}
}
//otherUploadfn($tempId,$userId,$region,$pricesell,$isNego,$contact,$title,$description,$mrktCat,$currency,$status)
function otherUploadfn()
{
	$city=$subcity=$tempId='';
	$region=$price=$nego=$title=$currency=$description=$contact='';
	$e100=$e108=$e109=$e111=$e116=$e117='';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		global $connect;
		$userId  = $_SESSION['uID'];
		$status  = CommonClass::status;
		$mrktCat = CommonClass::sell;
		//location
		$city        = $_POST['region']!='000'?$_POST['region']:0;
		$subcity     = $_POST['subcity']!='Addis Ababa'?$_POST['subcity']:0;
		$region      = $subcity != 0? $subcity.','.$city: $city;
		$tempId      = rand(0,999).rand(0,50);
		$err = false;
		if(empty($_POST['priceCommon'])){
			$e100 = crypt(100);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			if(ctype_digit(sanitize($_POST['priceCommon'])))
			{
				$price = sanitize($_POST['priceCommon']);
			}
			else {
				$e100 = crypt(100);
				$err = true;
			}
		}
		if(isset($_POST['nego'])){
			$nego = 1;
		}else{
			$nego = 0;
			//$nego =  CommonClass::nego;
		}
		if(empty($_POST['title'])){
			$e108 = crypt(108);
			$err = true;
		}else{
			$title = sanitize($_POST['title']);
		}
		if(empty($_POST['description'])){
			$e109 = crypt(109);
			$description = "";
			$err = true;
		}else{
			$description = sanitize($_POST['description']);
		}
		if($_POST['currency'] =='000'){
			$e117 = crypt(117);
			$err = true;
		}else{
			$currency = $_POST['currency'];
		}
		if($_POST['region'] =='000'){
			$e116 = crypt(116);
			$err = true;
		}else{
			$region = $_POST['region'];
		}
		if($_POST['contactMethod'] =='000'){
			$e111 = crypt(111);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			$contact = $_POST['contactMethod'];
		}
		if($err)
		{
			header('Location: ../../includes/template.upload.php?type=others'.
					'&e100='.$e100.
					'&e108='.$e108.
					'&e109='.$e109.
					'&e111='.$e111.
					'&e116='.$e116.
					'&e117='.$e117.
					'&region='.$region.
					'&price='.$price.
					'&nego='.$nego.
					'&title='.$title.
					'&currency='.$currency.
					'&description='.$description.
					'&contact='.$contact);
			exit;
		}
		global $connect;
		//the fields should be taken care of accordingly
		$result= $connect->query("INSERT INTO others (
				uID,oPricesell,oPriceNego,currency,
				contactMethodCategoryId,oLocation,oExtraInfo,
				oTitle,oTotalView,oStatus,marketCategory,
				tempID)
				VALUES(
				'$userId','$price','$nego','$currency',
				'$contact','$region','$description','$title',
				0,'$status','$mrktCat',
				'$tempId')")
				or die(mysqli_error($connect));
		if($result)
		{
			$tblArray = array(1=>"oID", 2=>"others",3=>$tempId,4=>CommonClass::OImage);
			imageHandler($tblArray);
		}
	}
}
//phoneUploadfn($tempId,$userId,$region,$pricesell,$isNego,$contact,$title,$description,$mrktCat,$currency,$status)
function phoneUploadfn()
{
	$city=$subcity=$tempId='';
	$region=$price=$nego=$phoneOS=$phoneMake=$phoneModel=$phoneCamera=$title=$currency=$description=$isNego=$contact='';
	$e100=$e101=$e102=$e103=$e104=$e108=$e109=$e111=$e116=$e117='';
	
	//phone details
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		global $connect;
		$userId      = $_SESSION['uID'];
		$status      = CommonClass::status;
		$mrktCat = CommonClass::sell;
		//location
		$city        = $_POST['region']!='000'?$_POST['region']:0;
		$subcity     = $_POST['subcity']!='Addis Ababa'?$_POST['subcity']:0;
		$region      = $subcity != 0? $subcity.','.$city: $city;
		$tempId      = rand(0,999).rand(0,50);
		$err = false;
		if(empty($_POST['priceCommon'])){
			$e100 = crypt(100);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			if(ctype_digit(sanitize($_POST['priceCommon'])))
			{
				$price = sanitize($_POST['priceCommon']);
			}
			else {
				$e100 = crypt(100);
				$err = true;
			}
		}
		if(isset($_POST['nego'])){
			$nego = 1;
		}else{
			$nego = 0;
			//$nego =  CommonClass::nego;
		}
		if(empty($_POST['title'])){
			$e108 = crypt(108);
			$err = true;
		}else{
			$title = sanitize($_POST['title']);
		}
		if(empty($_POST['description'])){
			$e109 = crypt(109);
			$description = "";
			$err = true;
		}else{
			$description = sanitize($_POST['description']);
		}
		if($_POST['currency'] =='000'){
			$e117 = crypt(117);
			$err = true;
		}else{
			$currency = $_POST['currency'];
		}
		if($_POST['region'] =='000'){
			$e116 = crypt(116);
			$err = true;
		}else{
			$region = $_POST['region'];
		}
		if($_POST['contactMethod'] =='000'){
			$e111 = crypt(111);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			$contact = $_POST['contactMethod'];
		}

		if ($_POST["phoneMake"] == '000') {
			$e101 = crypt(101);
			$err = true;
		}else {
			$phoneMake = $_POST["phoneMake"];

		}
		//
		if(empty($_POST['phoneModel'])){
			$e102 = crypt(102);
			$err = true;
		}else{
			$phoneModel = sanitize($_POST['phoneModel']);

		}
		//
		if($_POST['phoneCamera']  == '000'){
			$e103 = crypt(103);
			$err = true;
		}else{
			$phoneCamera = $_POST['phoneCamera'];
		}
		//
		if($_POST['phoneOS'] == '000'){
			$e104 = crypt(104);
			$err = true;
		}else{
			$phoneOS = $_POST['phoneOS'];
		}
		if($err)
		{
			header('Location: ../../includes/template.upload.php?type=phone'.
					'&e100='.$e100.
					'&e101='.$e101.
					'&e102='.$e102.
					'&e103='.$e103.
					'&e104='.$e104.
					'&e108='.$e108.
					'&e109='.$e109.
					'&e111='.$e111.
					'&e116='.$e116.
					'&e117='.$e117.
					'&region='.$region.
					'&price='.$price.
					'&nego='.$nego.
					'&phoneOS='.$phoneOS.
					'&phoneMake='.$phoneMake.
					'&phoneModel='.$phoneModel.
					'&phoneCamera='.$phoneCamera.
					'&title='.$title.
					'&currency='.$currency.
					'&description='.$description.
					'&contact='.$contact);
			exit;
		}
		// pupulating phone with data
		$result= $connect->query("INSERT INTO phone (
				uID,pCamera,pMake,pModel,pOS,pPricesell,pPriceNego,
				currency,pLocation,	pExtraInfo,pTitle,pStatus,marketCategory,
				tempID,	contactMethodCategoryId)
				VALUES(
				'$userId','$phoneCamera','$phoneMake','$phoneModel',
				'$phoneOS','$price','$isNego','$currency','$region',
				'$description','$title','$status','$mrktCat','$tempId',
				'$contact')")
				or die(mysqli_error($connect));
		if($result)
		{
			$tblArray = array(1=>"pID", 2=>"phone",3=>$tempId,4=>CommonClass::PImage);
			imageHandler($tblArray);
		}
	}
}
//householdUploadfn($tempId,$userId,$pricesell,$isNego,$region,$contact,$title,$description,$mrktCat,$currency,$status)
function householdUploadfn()
{
	$city=$subcity=$tempId='';
	$region=$title=$currency=$description=$contact='';
	$e100=$e108=$e109=$e111=$e116=$e117='';	
	$price=$nego=$currency.='';
	$description=$contact=$category='';
	
	
	//household info
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		global $connect;
		$userId  = $_SESSION['uID'];
		$status  = CommonClass::status;
		$mrktCat = CommonClass::sell;
		//location
		$city        = $_POST['region']!='000'?$_POST['region']:0;
		$subcity     = $_POST['subcity']!='Addis Ababa'?$_POST['subcity']:0;
		$region      = $subcity != 0? $subcity.','.$city: $city;
		$tempId      = rand(0,999).rand(0,50);
		$err = false;

		if(empty($_POST['priceCommon'])){
			$e100 = crypt(100);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			if(ctype_digit(sanitize($_POST['priceCommon'])))
			{
				$price = sanitize($_POST['priceCommon']);
			}
			else {
				$e100 = crypt(100);
				$err = true;
			}
		}
		if(isset($_POST['nego'])){
			$nego = 1;
		}else{
			$nego = 0;
			//$nego =  CommonClass::nego;
		}
		if(empty($_POST['title'])){
			$e108 = crypt(108);
			$err = true;
		}else{
			$title = sanitize($_POST['title']);
		}
		if(empty($_POST['description'])){
			$e109 = crypt(109);
			$description = "";
			$err = true;
		}else{
			$description = sanitize($_POST['description']);
		}
		if($_POST['currency'] =='000'){
			$e117 = crypt(117);
			$err = true;
		}else{
			$currency = $_POST['currency'];
		}
		if($_POST['region'] =='000'){
			$e116 = crypt(116);
			$err = true;
		}else{
			$region = $_POST['region'];
		}
		if($_POST['contactMethod'] =='000'){
			$e111 = crypt(111);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			$contact = $_POST['contactMethod'];
		}
		if($_POST['householdType']=='000'){
			$e101 = crypt(101);
			$err = true;
		}else{
			$category = $_POST['householdType'];
		}
		if($err)
		{
			header('Location: ../../includes/template.upload.php?type=household'.
					'&e100='.$e100.
					'&e101='.$e101.
					'&e108='.$e108.
					'&e109='.$e109.
					'&e111='.$e111.
					'&e116='.$e116.
					'&e117='.$e117.
					'&region='.$region.
					'&category='.$category.
					'&price='.$price.
					'&nego='.$nego.
					'&title='.$title.
					'&currency='.$currency.
					'&description='.$description.
					'&contact='.$contact);
			exit;
		}

		//There is a bug here, when uploading
		$result= $connect->query("INSERT INTO household (
				uID,hhCategoryID,contactMethodCategoryId,
				hhPricesell,hhPriceNego,currency,hhLocation,
				hhExtraInfo,hhTitle,hhTotalView,hhStatus,
				marketCategory,tempID)
				VALUES(
				'$userId','$category','$contact',
				'$price','$nego','$currency','$region',
				'$description',	'$title','','$status','$mrktCat',
				'$tempId')")
				or die(mysqli_error($connect));
		if($result)
		{
			$tblArray = array(1=>"hhID", 2=>"household",3=>$tempId,4=>CommonClass::HHImage);
			imageHandler($tblArray);
		}
	}

}
function electronicsUploadfn()
{
	$city=$subcity=$tempId='';
	$region=$title=$currency=$description=$contact='';
	$e100=$e108=$e109=$e111=$e116=$e117='';
	$price=$nego=$currency.='';
	$description=$contact=$category='';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		global $connect;
		$userId  = $_SESSION['uID'];
		$status  = CommonClass::status;
		$mrktCat = CommonClass::sell;
		//location
		$city        = $_POST['region']!='000'?$_POST['region']:0;
		$subcity     = $_POST['subcity']!='Addis Ababa'?$_POST['subcity']:0;
		$region      = $subcity != 0? $subcity.','.$city: $city;
		$tempId      = rand(0,999).rand(0,50);
		$err = false;

		if(empty($_POST['priceCommon'])){
			$e100 = crypt(100);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			if(ctype_digit(sanitize($_POST['priceCommon'])))
			{
				$price = sanitize($_POST['priceCommon']);
			}
			else {
				$e100 = crypt(100);
				$err = true;
			}
		}
		if(isset($_POST['nego'])){
			$nego = 1;
		}else{
			$nego = 0;
			//$nego =  CommonClass::nego;
		}
		if(empty($_POST['title'])){
			$e108 = crypt(108);
			$err = true;
		}else{
			$title = sanitize($_POST['title']);
		}
		if(empty($_POST['description'])){
			$e109 = crypt(109);
			$description = "";
			$err = true;
		}else{
			$description = sanitize($_POST['description']);
		}
		if($_POST['currency'] =='000'){
			$e117 = crypt(117);
			$err = true;
		}else{
			$currency = $_POST['currency'];
		}
		if($_POST['region'] =='000'){
			$e116 = crypt(116);
			$err = true;
		}else{
			$region = $_POST['region'];
		}
		if($_POST['contactMethod'] =='000'){
			$e111 = crypt(111);
			$err = true;
			//			$contact = CommonClass::emailAndPhone;
		}else{
			$contact = $_POST['contactMethod'];
		}
		if($_POST['electronicsType']=='000'){
			$e101 = crypt(101);
			$err = true;
		}else{
			$category = $_POST['electronicsType'];
		}
		if($err)
		{
			header('Location: ../../includes/template.upload.php?type=electronics'.
					'&e100='.$e100.
					'&e101='.$e101.
					'&e108='.$e108.
					'&e109='.$e109.
					'&e111='.$e111.
					'&e116='.$e116.
					'&e117='.$e117.
					'&region='.$region.
					'&category='.$category.
					'&price='.$price.
					'&nego='.$nego.
					'&title='.$title.
					'&currency='.$currency.
					'&description='.$description.
					'&contact='.$contact);
			exit;
		}
		//the fields should be taken care of accordingly
		$result= $connect->query("INSERT INTO electronics (
				uID,electronicsCategoryID,contactMethodCategoryId,
				ePricesell,ePriceNego,currency,eLocation,eExtraInfo,
				eTitle,eStatus,marketCategory,tempID)
				VALUES(
				'$userId','$category','$contact',
				'$price','$nego','$currency','$region',
				'$description','$title','$status','$mrktCat',
				'$tempId')")
				or die(mysqli_error($connect));
		if($result)
		{
			$tblArray = array(1=>"eID", 2=>"electronics",3=>$tempId,4=>CommonClass::EImage);
			imageHandler($tblArray);
		}
	}
}
/**/
function imageHandler($tblArry)
{
	global $connect;
	// select cID , tempID from car where tempID = 47821
	$getID = $connect->query("SELECT `$tblArry[1]`, `tempID`  FROM `$tblArry[2]` WHERE `tempID` = '$tblArry[3]'");
	$row   = $getID->fetch_array();
	//This was a bug
	$itemID = $row[$tblArry[1]];

	$m = uploadImage($tblArry,$itemID);
	
	header('Location: ../includes/prompt.php?type=10');
	$result   = $connect->query("SELECT * FROM `$tblArry[4]` WHERE `ItemID` = $itemID") or die(mysqli_error($connect)) ;
	$rows = mysqli_num_rows($result);
	$images = $result->fetch_assoc();		
	for($i=1;$i<=$m;$i++)
	{
		$originalImageName = $images['picture_'.$i];
		if($originalImageName)
		{
			//create thumbnail in local upload
			$imagePathToUpload = "../uploads/".$tblArry[4]."/".$itemID."/thumbnail/";
			mkdir($imagePathToUpload);
			$originalImagePath = "../uploads/".$tblArry[4]."/".$itemID."/original/";
			$x = createThumbNail($imagePathToUpload,$originalImagePath, $originalImageName);

			//create thumbnail in  static
			$imagePathToStatic = "../static/uploads/".$tblArry[4]."/".$itemID."/thumbnail/";
			mkdir($imagePathToStatic);
			$originalImagePath = "../static/uploads/".$tblArry[4]."/".$itemID."/original/";
			createThumbNail($imagePathToStatic,$originalImagePath,$originalImageName);
		}
	}
}
/**/
function uploadImage($itemArr, $item_ID)
{
	//name of item
	$itemName = $itemArr[2];
	//direcory of image
	$itemType = $itemArr[4];
	global $connect;
	$e300=$e301='';
	$target_dir = '../uploads/'.$itemType.'/'.$item_ID;
	$static_dir = '../static/uploads/'.$itemType.'/'.$item_ID;
	mkdir($target_dir);
	mkdir($static_dir);
	
	$target_dir = '../uploads/'.$itemType.'/'.$item_ID.'/original';
	$static_dir = '../static/uploads/'.$itemType.'/'.$item_ID.'/original';
	
	mkdir($target_dir);
	mkdir($static_dir);
	
	$err = false;
	$randNr = rand(0,999);
	
	$m = 0;
	
	for($q=1;$q<=5;$q++)
	{
		if($_FILES['picture_'.$q]['name'] != '')
		{
			$m++;
			$filename           = $_FILES['picture_'.$q]['name'];
			$filename_tmpName   = $_FILES['picture_'.$q]['tmp_name'];
			$filename_with_rand = $randNr.basename($_FILES['picture_'.$q]['name']);
			$target_file_path = $target_dir.'/'.$filename_with_rand;			
			if ($_FILES['picture_'.$q]['size'] > 5000000) {
				$e300 = crypt(300);
				$err = true;
			}

			$type = $_FILES['picture_'.$q]['type'];
			$type = substr($type ,strpos($type,'/')+1,strlen($type));

			if(!isImage($type))
			{
				$e301 = crypt(301);
				$err = true;
			}
			if($err)
			{
				header('Location: ../../includes/template.upload.php?type='.$itemName.
				'&image='.$_FILES['picture_'.$q]['name'].
				'&e300='.$e300.
				'&e301='.$e301);
				rrmdir($target_dir);
				$connect->query("DELETE FROM {$itemName} WHERE `oID` = {$item_ID} AND `uID` = {$_SESSION['uID']} limit 1 ") or die (mysqli_error());
				exit;
			}

			if (move_uploaded_file($filename_tmpName, $target_file_path)) {
				if($m == 1)
				{
					$connect->query("INSERT INTO `$itemType` (`itemID`, `picture_".$m."`) VALUES ('$item_ID','$filename_with_rand')");
				}
				else
				{
					$connect->query("UPDATE `$itemType` SET `picture_".$m."`= '$filename_with_rand', WHERE `itemID` = '$item_ID'");
				}
				//compress($target_file,$target_file);

				$static_file_path = $static_dir.'/'.$filename_with_rand;
				//move_uploaded_file($filename_tmpName, $static_file_path);
				copy($target_file_path,$static_file_path);

			} else {
				header('Location: ../includes/prompt.php?type=20');
			}
		}
	}
	return $m;
}

function rrmdir($dir) 
{
	if (is_dir($dir)) {
		$objects = scandir($dir);
		foreach ($objects as $object) {
			if ($object != "." && $object != "..") {
				if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
			}
		}
		reset($objects);
		rmdir($dir);
	}
}

function isImage($imageName)
{
	$imgReturnType = array('GIF','JPEG','PNG','SWF','
			PSD','BMP','TIFF_II','TIFF_MM','
			JPC','JP2','JPX','JB2','SWC','
			IFF','WBMP','XBM','ICO');

	$imageName = strtoupper($imageName);
	return array_search($imageName,$imgReturnType);
}

function compress($src,$des)
{
	$src = substr($src ,strpos($src,'/')+1,strlen($src));
	$ext = isImage($src);
	if($ext == 1)
	{
		$image = imagecreatefromgif($src);
	}
	elseif($ext == 2 )
	{
		$image = imagecreatefromjpeg($src);
			
	}elseif($ext == 3){
		$image = imagecreatefrompng($src);
	}

	imagejpeg($image,$des,10);

	return $des;
}

function createThumbNail($imgPath,$orignalImgPath,$imgName)
{
	$originalImg       = $orignalImgPath . $imgName;
	$originalImgSize   = getimagesize($originalImg);
	$originalImgWidth  = $originalImgSize[0];
	$originalImgHeight = $originalImgSize[1];
	$type              = $originalImgSize['mime'];

	$scale  =  ($originalImgWidth + $originalImgHeight)/($originalImgWidth * ($originalImgHeight/CommonClass::SCALE));
	
	$newImgWidth  = $scale * $originalImgWidth;
	$newImgHeight = $scale * $originalImgHeight;
	
	$newImg = imagecreatetruecolor($newImgWidth,$newImgHeight);

	if($type == 'image/gif'){
		$oldImg = imagecreatefromgif($originalImg);
	}elseif($type == 'image/jpeg'){
		$oldImg = imagecreatefromjpeg($originalImg);			
	}elseif($type == 'image/png'){
		$oldImg = imagecreatefrompng($originalImg);
	}elseif($type == 'image/bmp'){
		$oldImg = imagecreatefrombmp($originalImg);
	}
	imagecopyresized($newImg, $oldImg, 0, 0, 0, 0, $newImgWidth, $newImgHeight, $originalImgWidth, $originalImgHeight);
	$thumbNailImg = $imgPath.CommonClass::THUMBNAIL.$imgName;
	imagejpeg($newImg, $thumbNailImg);

	return $thumbNailImg;
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data,ENT_QUOTES);
	return $data;
}
?>