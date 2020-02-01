<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/common.inc.php';

$MAX = 30; //== The number of items that will be visible in one page ===//
$noItemToShow = "Sorry! There is no item to display.<div id=\"spanColumnXamharic\">ይቅርታ!የሚታይ ምንም ንብረት የለም</div>";

/**/
function deletedItems()
{
	global $noItemToShow,$MAX ;
	$modDelete    = 'modDelete';
	$querySum = DatabaseClass::getInstance()->queryUnionAllItemWithStatus($modDelete);
	$sum = mysqli_num_rows($querySum);


	if($sum >= 1){
		$totpage = ceil($sum/$MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if($page > $totpage )
			$page = $totpage;
		elseif($page < 1)
		$page = 1;

		$itemstart = $MAX * ($page -1);
        $query = DatabaseClass::getInstance()->queryForPagination($modDelete, $itemstart, $MAX);
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
	global $noItemToShow,$MAX;
    $itemStatus = "pending";
	$querySum = DatabaseClass::getInstance()->queryUnionAllItemWithStatus($itemStatus);
	$sum = mysqli_num_rows($querySum);


	if($sum >= 1){
		$totpage = ceil($sum/$MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if($page > $totpage )
			$page = $totpage;
		elseif($page < 1)
		$page = 1;

		$itemstart = $MAX * ($page -1);
        $query = DatabaseClass::getInstance()->queryForPagination($itemStatus, $itemstart, $MAX);
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
	global $noItemToShow;
	$arrayCid = Array();
	$arrayHid = Array();
	$arrayDid = Array();
	$arrayPid = Array();
	$arrayEid = Array();
	$arrayHHid = Array();
	$arrayOid = Array();
    $table = "abuse";
	$filterId = "*";
	$condition = "";
	$reported = DatabaseClass::getInstance()->findTotalItemNumb($filterId, $table, $condition);
	$sum = mysqli_num_rows($reported);

	if($sum >= 1){

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
	global $noItemToShow,$MAX;
	$user= $_SESSION['uID'];
	$activeItemStatus = "'active' AND uID = ".$user;
    $querySum = DatabaseClass::getInstance()->queryUnionAllItemWithStatus($activeItemStatus);
	$sum = mysqli_num_rows($querySum);

	if($sum >= 1){
		$totpage = ceil($sum/$MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if($page > $totpage )
			$page = $totpage;
		elseif($page < 1)
		$page = 1;

		$itemstart = $MAX * ($page -1);
        $query = DatabaseClass::getInstance()->queryForPagination($activeItemStatus, $itemstart, $MAX);
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
	global $noItemToShow,$MAX;
	$user= $_SESSION['uID'];
	$activeItemStatus = "'pending' AND uID = ".$user;
    $querySum = DatabaseClass::getInstance()->queryUnionAllItemWithStatus($activeItemStatus);
	$sum = mysqli_num_rows($querySum);

	if($sum >= 1){
		$totpage = ceil($sum/$MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if($page > $totpage )
			$page = $totpage;
		elseif($page < 1)
		$page = 1;

		$itemstart = $MAX * ($page -1);
        $query = DatabaseClass::getInstance()->queryForPagination($activeItemStatus, $itemstart, $MAX);
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
