<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/inc/common.inc.php';

$MAX = 30; //== The number of items that will be visible in one page ===//
$noItemToShow = "Sorry! There is no item to display.<div id=\"spanColumnXamharic\">ይቅርታ!የሚታይ ምንም ንብረት የለም</div>";

/**/
function deletedItems()
{
	global $connect,$noItemToShow,$MAX ;
	$modDelete    = 'modDelete';
	//$adminDeleted = 'modDelete';
	$querySum = $connect->query(
			"SELECT cID FROM car WHERE cStatus LIKE '$deletedStatus' 
			UNION ALL
			SELECT hID FROM house WHERE hStatus LIKE '$deletedStatus'
			UNION ALL
			SELECT dID FROM computer WHERE dStatus LIKE '$deletedStatus'
			UNION ALL
			SELECT eID FROM electronics WHERE eStatus LIKE '$deletedStatus'
			UNION ALL
			SELECT pID FROM phone WHERE pStatus LIKE '$deletedStatus'
			UNION ALL
			SELECT hhID FROM household WHERE hhStatus LIKE '$deletedStatus'
			UNION ALL
			SELECT oID FROM others WHERE oStatus LIKE '$deletedStatus'");
	$sum = mysqli_num_rows($querySum);


	if($sum >= 1){
		$totpage = ceil($sum/$MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if($page > $totpage )
			$page = $totpage;
		elseif($page < 1)
		$page = 1;

		$itemstart = $MAX * ($page -1);

		$query = $connect->query(
				"SELECT cID,tableType,UploadedDate FROM car WHERE cStatus LIKE '$deletedStatus'
				UNION ALL
				SELECT hID,tableType,UploadedDate FROM house WHERE hStatus LIKE '$deletedStatus'
				UNION ALL
				SELECT dID,tableType,UploadedDate FROM computer WHERE dStatus LIKE '$deletedStatus'
				UNION ALL
				SELECT eID,tableType,UploadedDate FROM electronics WHERE eStatus LIKE '$deletedStatus'
				UNION ALL
				SELECT pID,tableType,UploadedDate FROM phone WHERE pStatus LIKE '$deletedStatus'
				UNION ALL
				SELECT hhID,tableType,UploadedDate FROM household WHERE hhStatus LIKE '$deletedStatus'
				UNION ALL
				SELECT oID,tableType,UploadedDate FROM others WHERE oStatus LIKE '$deletedStatus'
				ORDER BY UploadedDate DESC LIMIT $itemstart,$MAX ");

		while($result=$query->fetch_assoc())
		{

			$itemtype = $result['tableType'];

			switch ($itemtype)
			{
				case 1:
					showCar($result['cID']);
					break;
				case 2:
					showHouse($result['cID']);
					break;
				case 3:
					showComputer($result['cID']);
					break;
				case 4:
					showPhone($result['cID']);
					break;
				case 5:
					showElectronics($result['cID']);
					break;
				case 6:
					showHousehold($result['cID']);
					break;
				case 7:
					showOthers($result['cID']);
					break;

			}

		}
		pagination($totpage,$page,0);
	}
	else if ($sum <= 0){

		echo "<div id=\"mainColumnX\">
		$noItemToShow
		</div>";
	}
	//==The following js will show the delete/Activate buttons on item listing
	echo'<script type="text/javascript">
			$(document).ready(function (){
			$(".moderatorDelete").show();
});
			</script>';

}
/**/
function pendingItems(){
	global $connect,$noItemToShow,$MAX;

	$querySum = $connect->query(
			"SELECT cID FROM car WHERE cStatus LIKE 'pending'
			UNION ALL
			SELECT hID FROM house WHERE hStatus LIKE 'pending'
			UNION ALL
			SELECT dID FROM computer WHERE dStatus LIKE 'pending'
			UNION ALL
			SELECT eID FROM electronics WHERE eStatus LIKE 'pending'
			UNION ALL
			SELECT pID FROM phone WHERE pStatus LIKE 'pending'
			UNION ALL
			SELECT hhID FROM household WHERE hhStatus LIKE 'pending'
			UNION ALL
			SELECT oID FROM others WHERE oStatus LIKE 'pending'");
	$sum = mysqli_num_rows($querySum);


	if($sum >= 1){
		$totpage = ceil($sum/$MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if($page > $totpage )
			$page = $totpage;
		elseif($page < 1)
		$page = 1;

		$itemstart = $MAX * ($page -1);

		$query = $connect->query(
				"SELECT cID,tableType,UploadedDate FROM car WHERE cStatus LIKE 'pending'
				UNION ALL
				SELECT hID,tableType,UploadedDate FROM house WHERE hStatus LIKE 'pending'
				UNION ALL
				SELECT dID,tableType,UploadedDate FROM computer WHERE dStatus LIKE 'pending'
				UNION ALL
				SELECT eID,tableType,UploadedDate FROM electronics WHERE eStatus LIKE 'pending'
				UNION ALL
				SELECT pID,tableType,UploadedDate FROM phone WHERE pStatus LIKE 'pending'
				UNION ALL
				SELECT hhID,tableType,UploadedDate FROM household WHERE hhStatus LIKE 'pending'
				UNION ALL
				SELECT oID,tableType,UploadedDate FROM others WHERE oStatus LIKE 'pending'
				ORDER BY UploadedDate DESC LIMIT $itemstart,$MAX ");

		while($result=$query->fetch_assoc())
		{

			$itemtype = $result['tableType'];

			switch ($itemtype)
			{
				case 1:
					showCar($result['cID']);
					break;
				case 2:
					showHouse($result['cID']);
					break;
				case 3:
					showComputer($result['cID']);
					break;
				case 4:
					showPhone($result['cID']);
					break;
				case 5:
					showElectronics($result['cID']);
					break;
				case 6:
					showHousehold($result['cID']);
					break;
				case 7:
					showOthers($result['cID']);
					break;

			}

		}
		pagination($totpage,$page,0);
	}
	else if ($sum <= 0){

		echo "<div id=\"mainColumnX\">
		$noItemToShow
		</div>";
	}

	//==The following js will show the delete/Activate buttons on item listing
	echo'<script type="text/javascript">
			$(document).ready(function (){


			$(".delete_activate").show();

});

			</script>';

}
/**/
function reportedItems(){
	global $connect,$noItemToShow;
	$arrayCid = Array();
	$arrayHid = Array();
	$arrayDid = Array();
	$arrayPid = Array();
	$arrayEid = Array();
	$arrayHHid = Array();
	$arrayOid = Array();

	$reported = $connect->query("SELECT * FROM abuse ") or
	die(mysqli_error());
	$sum = mysqli_num_rows($reported);


	if($sum >= 1){


		$reported = $connect->query("SELECT * FROM abuse ") or
		die(mysqli_error());

		while($dRditems = $reported -> fetch_assoc()){
			if($dRditems['carID'] != NULL && !in_array($dRditems['carID'],$arrayCid))
			{
				$arrayCid[$dRditems['carID']]= $dRditems['carID'] ;
				showCar($dRditems['carID']);
			}
			else if($dRditems['houseID'] != NULL && !in_array($dRditems['houseID'],$arrayHid))
			{
				$arrayHid[$dRditems['houseID']]= $dRditems['houseID'] ;
				showHouse($dRditems['houseID']);
			}
			else if($dRditems['computerID'] != NULL && !in_array($dRditems['computerID'],$arrayDid))
			{
				$arrayDid[$dRditems['computerID']]= $dRditems['computerID'];
				showComputer($dRditems['computerID']);
			}
			else if($dRditems['phoneID'] != NULL && !in_array($dRditems['phoneID'],$arrayPid))
			{
				$arrayPid[$dRditems['phoneID']]= $dRditems['phoneID'];
				showPhone($dRditems['phoneID']);
			}
			else if($dRditems['electronicsID'] != NULL && !in_array($dRditems['electronicsID'],$arrayEid))
			{
				$arrayEid[$dRditems['electronicsID']]= $dRditems['electronicsID'];
				showElectronics($dRditems['electronicsID']);
			}
			else if($dRditems['householdID'] != NULL && !in_array($dRditems['householdID'],$arrayHHid))
			{
				$arrayHHid[$dRditems['householdID']]= $dRditems['householdID'];
				showHousehold($dRditems['householdID']);
			}
			else if($dRditems['othersID'] != NULL && !in_array($dRditems['othersID'],$arrayOid))
			{
				$arrayOid[$dRditems['othersID']]= $dRditems['othersID'];
				showOthers($dRditems['othersID']);
			}
		}
	}
	else if ($sum <= 0){
		echo "<div id=\"mainColumnX\">
		$noItemToShow
		</div>";
	}

	//==The following js will show the delete/ignore buttons on item listing
	echo'<script type="text/javascript">
			$(document).ready(function (){
			$(".delete_ignore").show();

});

			</script>';
}
/**/
function userActive(){
	global $connect,$noItemToShow,$MAX;
	$user= $_SESSION['uID'];

	$querySum = $connect->query(
			"SELECT cID FROM car WHERE cStatus LIKE 'active' AND uID = '$user'
			UNION ALL
			SELECT hID FROM house WHERE hStatus LIKE 'active' AND uID = '$user'
			UNION ALL
			SELECT dID FROM computer WHERE dStatus LIKE 'active' AND uID = '$user'
			UNION ALL
			SELECT eID FROM electronics WHERE eStatus LIKE 'active' AND uID = '$user'
			UNION ALL
			SELECT pID FROM phone WHERE pStatus LIKE 'active' AND uID = '$user'
			UNION ALL
			SELECT hhID FROM household WHERE hhStatus LIKE 'active' AND uID = '$user'
			UNION ALL
			SELECT oID FROM others WHERE oStatus LIKE 'active' AND uID = '$user'");
	$sum = mysqli_num_rows($querySum);


	if($sum >= 1){
		$totpage = ceil($sum/$MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if($page > $totpage )
			$page = $totpage;
		elseif($page < 1)
		$page = 1;

		$itemstart = $MAX * ($page -1);

		$query = $connect->query(
				"SELECT cID,tableType,UploadedDate FROM car WHERE cStatus LIKE 'active' AND uID = '$user'
				UNION ALL
				SELECT hID,tableType,UploadedDate FROM house WHERE hStatus LIKE 'active' AND uID = '$user'
				UNION ALL
				SELECT dID,tableType,UploadedDate FROM computer WHERE dStatus LIKE 'active' AND uID = '$user'
				UNION ALL
				SELECT eID,tableType,UploadedDate FROM electronics WHERE eStatus LIKE 'active' AND uID = '$user'
				UNION ALL
				SELECT pID,tableType,UploadedDate FROM phone WHERE pStatus LIKE 'active' AND uID = '$user'
				UNION ALL
				SELECT hhID,tableType,UploadedDate FROM household WHERE hhStatus LIKE 'active' AND uID = '$user'
				UNION ALL
				SELECT oID,tableType,UploadedDate FROM others WHERE oStatus LIKE 'active' AND uID = '$user'
				ORDER BY UploadedDate DESC LIMIT $itemstart,$MAX ");

		while($result=$query->fetch_assoc())
		{

			$itemtype = $result['tableType'];

			switch ($itemtype)
			{
				case 1:
					showCar($result['cID']);
					break;
				case 2:
					showHouse($result['cID']);
					break;
				case 3:
					showComputer($result['cID']);
					break;
				case 4:
					showPhone($result['cID']);
					break;
				case 5:
					showElectronics($result['cID']);
					break;
				case 6:
					showHousehold($result['cID']);
					break;
				case 7:
					showOthers($result['cID']);
					break;

			}

		}
		pagination($totpage,$page,0);
	}
	else if ($sum <= 0){

		echo "<div id=\"mainColumnX\">
		$noItemToShow
		</div>";
	}
	//==The following js will show the delete button on item listing
	echo'<script type="text/javascript">
			$(document).ready(function (){
			$(".userActiveButton").show();
});
			</script>';

}
/**/
function userPending(){
	global $connect,$noItemToShow,$MAX;
	$user= $_SESSION['uID'];

	$querySum = $connect->query(
			"SELECT cID FROM car WHERE cStatus LIKE 'pending'  AND uID = '$user'
			UNION ALL
			SELECT hID FROM house WHERE hStatus LIKE 'pending'  AND uID = '$user'
			UNION ALL
			SELECT dID FROM computer WHERE dStatus LIKE 'pending'  AND uID = '$user'
			UNION ALL
			SELECT eID FROM electronics WHERE eStatus LIKE 'pending'  AND uID = '$user'
			UNION ALL
			SELECT pID FROM phone WHERE pStatus LIKE 'pending'  AND uID = '$user'
			UNION ALL
			SELECT hhID FROM household WHERE hhStatus LIKE 'pending'  AND uID = '$user'
			UNION ALL
			SELECT oID FROM others WHERE oStatus LIKE 'pending'  AND uID = '$user'");
	$sum = mysqli_num_rows($querySum);


	if($sum >= 1){
		$totpage = ceil($sum/$MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if($page > $totpage )
			$page = $totpage;
		elseif($page < 1)
		$page = 1;

		$itemstart = $MAX * ($page -1);

		$query = $connect->query(
				"SELECT cID,tableType,UploadedDate FROM car WHERE cStatus LIKE 'pending'  AND uID = '$user'
				UNION ALL
				SELECT hID,tableType,UploadedDate FROM house WHERE hStatus LIKE 'pending'  AND uID = '$user'
				UNION ALL
				SELECT dID,tableType,UploadedDate FROM computer WHERE dStatus LIKE 'pending'  AND uID = '$user'
				UNION ALL
				SELECT eID,tableType,UploadedDate FROM electronics WHERE eStatus LIKE 'pending'  AND uID = '$user'
				UNION ALL
				SELECT pID,tableType,UploadedDate FROM phone WHERE pStatus LIKE 'pending'  AND uID = '$user'
				UNION ALL
				SELECT hhID,tableType,UploadedDate FROM household WHERE hhStatus LIKE 'pending'  AND uID = '$user'
				UNION ALL
				SELECT oID,tableType,UploadedDate FROM others WHERE oStatus LIKE 'pending'  AND uID = '$user'
				ORDER BY UploadedDate DESC LIMIT $itemstart,$MAX ");

		while($result=$query->fetch_assoc())
		{

			$itemtype = $result['tableType'];

			switch ($itemtype)
			{
				case 1:
					showCar($result['cID']);
					break;
				case 2:
					showHouse($result['cID']);
					break;
				case 3:
					showComputer($result['cID']);
					break;
				case 4:
					showPhone($result['cID']);
					break;
				case 5:
					showElectronics($result['cID']);
					break;
				case 6:
					showHousehold($result['cID']);
					break;
				case 7:
					showOthers($result['cID']);
					break;

			}

		}
		pagination($totpage,$page,0);
	}
	else if ($sum <= 0){

		echo "<div id=\"mainColumnX\">

		$noItemToShow
		</div>";
	}
	//==The following js will show the delete button on item listing
	echo'<script type="text/javascript">
			$(document).ready(function (){


			$(".userPendingButton").show();

});

			</script>';

}
?>
