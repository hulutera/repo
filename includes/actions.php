<?php

$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';

$name = isset($_GET['name']) ? $_GET['name'] : '';
$id = (int)(isset($_GET['id']) ? $_GET['id'] : '');

var_dump($name);
if (isset($_SESSION['uID'])) {
    $userId = $_SESSION['uID'];
    $user = new HtUserAll($userId);

    $feature = [
        "favorite" =>
        [
            "name" => $name,
            "id" => $id
        ]
    ];
    $featureJson = json_encode($feature);
    $user->setFieldFeature($featureJson);
    $user->updateCurrent();
}

/*
function func_activate($item, $itmeId, $itemIdName, $uid, $itemStatus, $link, $time)
{
    global $connect;
    $connect->query("UPDATE $item SET $itemStatus = 'active' WHERE $itemIdName = $itmeId");
    $latest       = 'LatestTime';
    $latestStatus = 'active';
    $connect->query("INSERT INTO latestupdate (`$itemIdName`, `$latest`,status) VALUES('$itmeId', '$time','$latestStatus')");
    $result = groupQueryfunction($link, $uid);
    return $result;
}






$actiontype = isset($_GET['actionType']) ? $_GET['actionType'] : '';
$itemid     = isset($_GET['itemid'])    ? $_GET['itemid']    : '';
$itemtype   = isset($_GET['itemtype'])  ? $_GET['itemtype']  : '';
$time       = isset($_GET['time'])      ? $_GET['time']      : '';
$uid        = isset($_GET['user'])      ? $_GET['user']      : '';
$link       = isset($_GET['link'])      ? $_GET['link']      : '';
if ($actiontype == 'activate') {
    switch ($itemtype) {
        case 'Car':
            $numb = func_activate('car', $itemid, 'cID', $uid, 'cStatus', $link, $time);
            echo $numb;
            break;

        case 'House':
            $numb = func_activate('house', $itemid, 'hID', $uid, 'hStatus', $link, $time);
            echo $numb;
            break;

        case 'Computer':
            $numb = func_activate('computer', $itemid, 'dID', $uid, 'dStatus', $link, $time);
            echo $numb;
            break;

        case 'Phone':
            $numb = func_activate('phone', $itemid, 'pID', $uid, 'pStatus', $link, $time);
            echo $numb;
            break;

        case 'Electronics':
            $numb = func_activate('electronics', $itemid, 'eID', $uid, 'eStatus', $link, $time);
            echo $numb;
            break;

        case 'Household':
            $numb = func_activate('household', $itemid, 'hhID', $uid, 'hhStatus', $link, $time);
            echo $numb;
            break;

        case 'Others':
            $numb = func_activate('others', $itemid, 'oID', $uid, 'oStatus', $link, $time);
            echo $numb;
            break;
    }
} else if ($actiontype == 'ignore') {

    switch ($itemtype) {
        case 'Car':
            $connect->query("DELETE FROM abuse WHERE carID = '$itemid' ");
            break;

        case 'House':
            $connect->query("DELETE FROM abuse WHERE houseID = '$itemid' ");
            break;

        case 'Computer':
            $connect->query("DELETE FROM abuse WHERE computerID = '$itemid' ");
            break;

        case 'Phone':
            $connect->query("DELETE FROM abuse WHERE phoneID = '$itemid' ");
            break;

        case 'Electronics':
            $connect->query("DELETE FROM abuse WHERE electronicsID = '$itemid' ");
            break;

        case 'Household':
            $connect->query("DELETE FROM abuse WHERE householdID = '$itemid' ");
            break;

        case 'Others':
            $connect->query("DELETE FROM abuse WHERE `othersID` = '$itemid' ");
            break;
    }

    $resultReported = $connect->query("SELECT abuseID FROM abuse ");

    $numb = mysqli_num_rows($resultReported);

    echo $numb;
} else if ($actiontype == 'delete') {

    $status = '';
    $user = $connect->query("SELECT uRole FROM user WHERE uID = '$uid'");
    while ($userQuery = $user->fetch_assoc()) {
        $userType = $userQuery['uRole'];
    }

    if ($userType == 'mod')
        $status = 'modDelete';
    else
        $status = 'Deleted';

    switch ($itemtype) {
        case 'Car':

            $numb = func_delete('car', $itemid, 'cID', $uid, 'cStatus', $status, $link);
            echo $numb;
            break;

        case 'House':
            $numb = func_delete('house', $itemid, 'hID', $uid, 'hStatus', $status, $link);
            echo $numb;
            break;

        case 'Computer':
            $numb = func_delete('computer', $itemid, 'dID', $uid, 'dStatus', $status, $link);
            echo $numb;
            break;

        case 'Phone':
            $numb = func_delete('phone', $itemid, 'pID', $uid, 'pStatus', $status, $link);
            echo $numb;
            break;

        case 'Electronics':
            $numb = func_delete('electronics', $itemid, 'eID', $uid, 'eStatus', $status, $link);
            echo $numb;
            break;

        case 'Household':
            $numb = func_delete('household', $itemid, 'hhID', $uid, 'hhStatus', $status, $link);
            echo $numb;
            break;

        case 'Others':
            $numb = func_delete('others', $itemid, 'oID', $uid, 'oStatus', $status, $link);
            echo $numb;
            break;
    }
} else if ($actiontype == 'remove') {
    switch ($itemtype) {
        case 'Car':
            $numb = func_remove('car', $itemid, 'cID', $uid, $link);
            echo $numb;
            break;

        case 'House':
            $numb = func_remove('house', $itemid, 'hID', $uid, $link);
            echo $numb;
            break;

        case 'Computer':
            $numb = func_remove('computer', $itemid, 'dID', $uid, $link);
            echo $numb;
            break;

        case 'Phone':
            $numb = func_remove('phone', $itemid, 'pID', $uid, $link);
            echo $numb;
            break;

        case 'Electronics':
            $numb = func_remove('electronics', $itemid, 'eID', $uid, $link);
            echo $numb;
            break;

        case 'Household':
            $numb = func_remove('household', $itemid, 'hhID', $uid, $link);
            echo $numb;
            break;

        case 'Others':
            $numb = func_remove('others', $itemid, 'oID', $uid, $link);
            echo $numb;
            break;
    }
} else if ($actiontype == 'show') {
    // To list the report

    switch ($itemtype) {

        case 'Car':
            $item = 'carID';
            break;

        case 'House':
            $item = 'houseID';
            break;

        case 'Computer':
            $item = 'computerID';
            break;

        case 'Phone':
            $item = 'phoneID';
            break;

        case 'Electronics':
            $item = 'electronicsID';
            break;

        case 'Household':
            $item = 'householdID';
            break;

        case 'Others':
            $item = 'othersID';
            break;
    }
    $showreport = $connect->query("SELECT abuse.abuseCategoryID AS abuseCategoryID,name FROM `abuse`
			LEFT JOIN abusecategory ON
			abuse.abuseCategoryID = abusecategory.abuseCategoryID
			WHERE $item = $itemid ");
    $arrayReport = array();
    $arrayId = array();
    $count = 0;
    while ($report = $showreport->fetch_assoc()) {
        $abuseCategoryID = $report['abuseCategoryID'];
        $name = $report['name'];

        if (!in_array($abuseCategoryID, $arrayId)) {
            $arrayId[$abuseCategoryID] = $abuseCategoryID;
            $countAbuse = $connect->query("SELECT COUNT(abuseCategoryID) AS abuseCategoryID FROM abuse
	  		WHERE $item = $itemid && abuseCategoryID = $abuseCategoryID");
            while ($numbAbuse = $countAbuse->fetch_assoc()) {
                $count = $numbAbuse['abuseCategoryID'];
            }
            echo $arrayReport[$abuseCategoryID] = $name . '(' . $count . ')';
        }
    }
    unset($arrayReport);
    unset($arrayId);
}
function func_activate($item, $itmeId, $itemIdName, $uid, $itemStatus, $link, $time)
{
    global $connect;
    $connect->query("UPDATE $item SET $itemStatus = 'active' WHERE $itemIdName = $itmeId");
    $latest       = 'LatestTime';
    $latestStatus = 'active';
    $connect->query("INSERT INTO latestupdate (`$itemIdName`, `$latest`,status) VALUES('$itmeId', '$time','$latestStatus')");
    $result = groupQueryfunction($link, $uid);
    return $result;
}
function func_delete($item, $itemId, $itemIdName, $uid, $statusName, $status, $link)
{
    global $connect;
    $connect->query("UPDATE $item SET $statusName = '$status' WHERE $itemIdName = $itemId");
    $connect->query("DELETE FROM latestupdate WHERE $itemIdName = $itemId");
    $result = groupQueryfunction($link, $uid);
    $item = strtolower($item);
    $dir  = $documnetRootPath . '/uploads/' . $item . 'images/' . $itemId;
    rrmdir($dir);
    return $result;
}
function func_remove($item, $itemId, $itemIdName, $uid, $link)
{
    global $connect;
    global $documnetRootPath;
    $connect->query("DELETE FROM $item WHERE $itemIdName = $itemId");
    $result = groupQueryfunction($link, $uid);
    $item = strtolower($item);
    $dir  = $documnetRootPath . '/uploads/' . $item . 'images/' . $itemId;
    rrmdir($dir);
    return $result;
}
function rrmdir($dir)
{

    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir") rrmdir($dir . "/" . $object);
                else unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}
function groupQueryfunction($link, $uid)
{
    global $connect;
    if ($link == 'userPendingNumb') {
        $count = groupItemCount('pending', $uid);
    } else if ($link == 'userActiveNumb') {
        $count = groupItemCount('active', $uid);
    } else if ($link == 'pendingNumb') {
        $count = groupItemCount('pending', '%');
    } else if ($link == 'deletedNumb') {
        $count = groupItemCount('modDelete', '%');
    } else if ($link == 'reportedNumb') {

        $reported = $connect->query("SELECT * FROM abuse ");
        $count = mysqli_num_rows($reported);
    }
    return $count;
}
function groupItemCount($queryCondition, $uid)
{
    global $connect;
    $resultDeleted = $connect->query("
			SELECT cID FROM car WHERE cStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
			SELECT hID FROM house WHERE hStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
			SELECT dID FROM computer WHERE dStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
			SELECT eID FROM electronics WHERE eStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
			SELECT pID FROM phone WHERE pStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
			SELECT hhID FROM household WHERE hhStatus LIKE '$queryCondition' AND uID LIKE '$uid' UNION ALL
			SELECT oID FROM others WHERE oStatus LIKE '$queryCondition' AND uID LIKE '$uid' ");
    $numb = mysqli_num_rows($resultDeleted);
    return $numb;
}
*/