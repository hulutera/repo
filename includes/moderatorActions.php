<?php
$documnetRootPath = $_SERVER ['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/db/database.class.php';

$actiontype = isset($_GET ['actionType'])? $_GET ['actionType']:'';
$itemid     = isset($_GET ['itemid'])    ? $_GET ['itemid']    :'';
$itemtype   = isset($_GET ['itemtype'])  ? $_GET ['itemtype']  : '';
$time       = isset($_GET ['time'])      ? $_GET ['time']      : '';
$uid        = isset($_GET ['user'])      ? $_GET ['user']      : '';
$link       = isset($_GET ['link'])      ? $_GET ['link']      : '';

$connect = DatabaseClass::getInstance()->getConnection();

if ($actiontype == 'activate') {
	switch ($itemtype) {
		case 'Car' :
			$numb = func_activate ( 'car', $itemid, 'cID', $uid, 'cStatus', $link, $time );
			echo $numb;
			break;
		
		case 'House' :
			$numb = func_activate ( 'house', $itemid, 'hID', $uid, 'hStatus', $link, $time );
			echo $numb;
			break;
		
		case 'Computer' :
			$numb = func_activate ( 'computer', $itemid, 'dID', $uid, 'dStatus', $link, $time );
			echo $numb;
			break;
		
		case 'Phone' :
			$numb = func_activate ( 'phone', $itemid, 'pID', $uid, 'pStatus', $link, $time );
			echo $numb;
			break;
		
		case 'Electronics' :
			$numb = func_activate ( 'electronics', $itemid, 'eID', $uid, 'eStatus', $link, $time );
			echo $numb;
			break;
		
		case 'Household' :
			$numb = func_activate ( 'household', $itemid, 'hhID', $uid, 'hhStatus', $link, $time );
			echo $numb;
			break;
		
		case 'Others' :
			$numb = func_activate ( 'others', $itemid, 'oID', $uid, 'oStatus', $link, $time );
			echo $numb;
			break;
	}
} 

else if ($actiontype == 'ignore') {
	$table = "abuse";
	switch ($itemtype) {
		case 'Car' :
		    $cond1 = "WHERE carID = '$itemid'";
		    DatabaseClass::getInstance()->updateUser($table, $cond1);
			break;
		
		case 'House' :
		    $cond1 = "WHERE houseID = '$itemid'";
		    DatabaseClass::getInstance()->updateUser($table, $cond1);
			break;
					
		case 'Computer' :
			$cond1 = "WHERE computerID = '$itemid'";
		    DatabaseClass::getInstance()->updateUser($table, $cond1);
			break;
		
		case 'Phone' :
			$cond1 = "WHERE phoneID = '$itemid'";
		    DatabaseClass::getInstance()->updateUser($table, $cond1);
			break;
		
		case 'Electronics' :
			$cond1 = "WHERE electronicsID = '$itemid'";
		    DatabaseClass::getInstance()->updateUser($table, $cond1);
			break;
		
		case 'Household' :
		    $cond1 = "WHERE householdID = '$itemid'";
		    DatabaseClass::getInstance()->updateUser($table, $cond1);
			break;
		
		case 'Others' :
			$cond1 = "WHERE othersID = '$itemid'";
		    DatabaseClass::getInstance()->updateUser($table, $cond1);
			break;
	}
	
	$id = "abuseID";
    $table = "abuse";
    $condition = "";
    $resultReported =  DatabaseClass::getInstance()->findTotalItemNumb($id, $table, $condition);
		
	$numb = mysqli_num_rows ( $resultReported );
	
	echo $numb;
} 

else if ($actiontype == 'delete') {
	
	$status = '';
	$id = "uRole";
    $table = "user";
    $condition = "WHERE uID = '$uid'";
    $user =  DatabaseClass::getInstance()->findTotalItemNumb($id, $table, $condition);
	while ( $userQuery = $user->fetch_assoc () ) {
		$userType = $userQuery ['uRole'];
	}
	
	if ($userType == 'mod')
		$status = 'modDelete';
	else
		$status = 'deleted';
	
	switch ($itemtype) {
		case 'Car' :
			
			$numb = func_delete ( 'car', $itemid, 'cID', $uid, 'cStatus', $status, $link );
			echo $numb;
			break;
		
		case 'House' :
			$numb = func_delete ( 'house', $itemid, 'hID', $uid, 'hStatus', $status, $link );
			echo $numb;
			break;
		
		case 'Computer' :
			$numb = func_delete ( 'computer', $itemid, 'dID', $uid, 'dStatus', $status, $link );
			echo $numb;
			break;
		
		case 'Phone' :
			$numb = func_delete ( 'phone', $itemid, 'pID', $uid, 'pStatus', $status, $link );
			echo $numb;
			break;
		
		case 'Electronics' :
			$numb = func_delete ( 'electronics', $itemid, 'eID', $uid, 'eStatus', $status, $link );
			echo $numb;
			break;
		
		case 'Household' :
			$numb = func_delete ( 'household', $itemid, 'hhID', $uid, 'hhStatus', $status, $link );
			echo $numb;
			break;
		
		case 'Others' :
			$numb = func_delete ( 'others', $itemid, 'oID', $uid, 'oStatus', $status, $link );
			echo $numb;
			break;
	}
} 
else if ($actiontype == 'remove') {
	switch ($itemtype) {
		case 'Car' :
			$numb = func_remove ( 'car', $itemid, 'cID', $uid, $link );
			echo $numb;
			break;

		case 'House' :
			$numb = func_remove ( 'house', $itemid, 'hID', $uid,$link );
			echo $numb;
			break;

		case 'Computer' :
			$numb = func_remove ( 'computer', $itemid, 'dID', $uid, $link );
			echo $numb;
			break;

		case 'Phone' :
			$numb = func_remove ( 'phone', $itemid, 'pID', $uid, $link );
			echo $numb;
			break;

		case 'Electronics' :
			$numb = func_remove ( 'electronics', $itemid, 'eID', $uid,$link );
			echo $numb;
			break;

		case 'Household' :
			$numb = func_remove ( 'household', $itemid, 'hhID', $uid, $link );
			echo $numb;
			break;

		case 'Others' :
			$numb = func_remove ( 'others', $itemid, 'oID', $uid, $link );
			echo $numb;
			break;
	}
}
else if ($actiontype == 'show') {
	// To list the report
	
	switch ($itemtype) {
		
		case 'Car' :
			$item = 'carID';
			break;
		
		case 'House' :
			$item = 'houseID';
			break;
		
		case 'Computer' :
			$item = 'computerID';
			break;
		
		case 'Phone' :
			$item = 'phoneID';
			break;
		
		case 'Electronics' :
			$item = 'electronicsID';
			break;
		
		case 'Household' :
			$item = 'householdID';
			break;
		
		case 'Others' :
			$item = 'othersID';
			break;
	}
	$sql = "SELECT abuse.abuseCategoryID AS abuseCategoryID,name FROM `abuse`
			LEFT JOIN abusecategory ON
			abuse.abuseCategoryID = abusecategory.abuseCategoryID
			WHERE $item = $itemid ";
	$showreport = DatabaseClass::getInstance()->runQuery($sql);
	
	$arrayReport = array ();
	$arrayId = array ();
	$count = 0;
	while ( $report = $showreport->fetch_assoc () ) {
		$abuseCategoryID = $report ['abuseCategoryID'];
		$name = $report ['name'];
		
		if (! in_array ( $abuseCategoryID, $arrayId )) {
			$arrayId [$abuseCategoryID] = $abuseCategoryID;
			$sql1 = "SELECT COUNT(abuseCategoryID) AS abuseCategoryID FROM abuse
	  		WHERE $item = $itemid && abuseCategoryID = $abuseCategoryID";
			$numbAbuse = DatabaseClass::getInstance()->runQuery($sql1);
			
			while ( $numbAbuse = $countAbuse->fetch_assoc () ) {
				$count = $numbAbuse ['abuseCategoryID'];
			}
			echo $arrayReport [$abuseCategoryID] = $name . '(' . $count . ')';
		}
	}
	unset ( $arrayReport );
	unset ( $arrayId );
}
function func_activate($item, $itmeId, $itemIdName, $uid, $itemStatus, $link, $time) {
	$sql = "UPDATE $item SET $itemStatus = 'active' WHERE $itemIdName = $itmeId";
	DatabaseClass::getInstance()->runQuery($sql);
	$latest       = 'LatestTime';
	$latestStatus = 'active';
	$sql1 = "INSERT INTO latestupdate (`$itemIdName`, `$latest`,status) VALUES('$itmeId', '$time','$latestStatus')";
	DatabaseClass::getInstance()->runQuery($sql1);
	$result = groupQueryfunction ($link, $uid);
	return $result;
}
function func_delete($item, $itemId, $itemIdName, $uid, $statusName, $status, $link) {
	$sql = "UPDATE $item SET $statusName = '$status' WHERE $itemIdName = $itemId";
	DatabaseClass::getInstance()->runQuery($sql);
	$table = "latestupdate";
	$cond = "WHERE $itemIdName = '$itemId'";
	DatabaseClass::getInstance()->updateUser($table, $cond);
	$result = groupQueryfunction ( $link, $uid );
	$item = strtolower($item);
	$dir  = $documnetRootPath.'/uploads/'.$item.'/'.$itemId;
	rrmdir($dir);
	return $result;
}
function func_remove($item, $itemId, $itemIdName, $uid, $link){
	global $documnetRootPath;
	$table = "$item";
	$cond = "WHERE $itemIdName = '$itemId'";
	DatabaseClass::getInstance()->updateUser($table, $cond);
	$result = groupQueryfunction ($link, $uid);
	$item = strtolower($item);
	$dir  = $documnetRootPath.'/uploads/'.$item.'/'.$itemId;
	rrmdir($dir);
	return $result;
}
function rrmdir($dir) {
	
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
function groupQueryfunction($link, $uid) {
	global $connect;
	if ($link == 'userPendingNumb') {
		$count = groupItemCount ( 'pending', $uid );
	} else if ($link == 'userActiveNumb') {
		$count = groupItemCount ( 'active', $uid );
	} else if ($link == 'pendingNumb') {
		$count = groupItemCount ( 'pending', '%' );
	} else if ($link == 'deletedNumb') {
		$count = groupItemCount ( 'modDelete', '%' );
	} else if ($link == 'reportedNumb') {
		
		$filter = "*";
		$table = "abuse";
		$cond = "";
		$reported = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond);
		$count = mysqli_num_rows ( $reported );
	}
	return $count;
}
function groupItemCount($queryCondition, $uid) {
	$iteamsRes = DatabaseClass::getInstance()->findIteamWithUser($queryCondition, $uid);
	$numb = mysqli_num_rows ($iteamsRes);
	return $numb;
}
?>

