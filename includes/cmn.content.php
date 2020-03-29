<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/userStatus.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/message.php';
require_once $documnetRootPath . '/includes/token.php';
require_once $documnetRootPath.'/db/database.class.php';
require_once $documnetRootPath.'/view/main.view.class.php';
$connect = DatabaseClass::getInstance()->getConnection();

function show($query)
{
	while ($result = $query->fetch_assoc()) {
		$itemtype = $result['tableType'];
		switch ($itemtype) {
			case 1:
				ObjectPool::getInstance()->getViewObject("car")->show($result['cID']);
				break;
			case 2:
				ObjectPool::getInstance()->getViewObject("house")->show($result['cID']);
				break;
			case 3:
				ObjectPool::getInstance()->getViewObject("computer")->show($result['cID']);
				break;
			case 4:
				ObjectPool::getInstance()->getViewObject("phone")->show($result['cID']);
				break;
			case 5:
				ObjectPool::getInstance()->getViewObject("electronics")->show($result['cID']);
				break;
			case 6:
				ObjectPool::getInstance()->getViewObject("household")->show($result['cID']);
				break;
			case 7:
				ObjectPool::getInstance()->getViewObject("others")->show($result['cID']);
				break;
		}
	}
}
function reportedItems()
{
	
	$arrayCid  = array();
	$arrayHid  = array();
	$arrayDid  = array();
	$arrayPid  = array();
	$arrayEid  = array();
	$arrayHHid = array();
	$arrayOid  = array();
	global $connect;
	$filter = "*";
	$table = "abuse";
	$condition = "";
	$reported = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $condition);
	$sum = mysqli_num_rows($reported);

	if ($sum >= 1) {


		while ($dRditems = $reported->fetch_assoc()) {
			if ($dRditems['carID'] != NULL && !in_array($dRditems['carID'], $arrayCid)) {
				ObjectPool::getInstance()->getViewObject("car")->show($dRditems['carID']);
			} else if ($dRditems['houseID'] != NULL && !in_array($dRditems['houseID'], $arrayHid)) {
				ObjectPool::getInstance()->getViewObject("house")->show($dRditems['houseID']);
			} else if ($dRditems['computerID'] != NULL && !in_array($dRditems['computerID'], $arrayDid)) {
				ObjectPool::getInstance()->getViewObject("computer")->show($dRditems['computerID']);
			} else if ($dRditems['phoneID'] != NULL && !in_array($dRditems['phoneID'], $arrayPid)) {
				ObjectPool::getInstance()->getViewObject("phone")->show($dRditems['phoneID']);
			} else if ($dRditems['electronicsID'] != NULL && !in_array($dRditems['electronicsID'], $arrayEid)) {
				ObjectPool::getInstance()->getViewObject("electronics")->show($dRditems['electronicsID']);
			} else if ($dRditems['householdID'] != NULL && !in_array($dRditems['householdID'], $arrayHHid)) {
				ObjectPool::getInstance()->getViewObject("household")->show($dRditems['householdID']);
			} else if ($dRditems['othersID'] != NULL && !in_array($dRditems['othersID'], $arrayOid)) {
				ObjectPool::getInstance()->getViewObject("others")->show($dRditems['othersID']);
			}
		}
	} else if ($sum <= 0) {
		echo "<div id=\"mainColumnX\">" . HtGlobal::get('noItemToShow') . "</div>";
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".delete_ignore").show();});</script>';
}
function countRow($status, $Id)
{
	if ($Id != '')
		$specific = "'$status'" . " AND uID = $Id";
	else
		$specific = "'$status'";

	$result = DatabaseClass::getInstance()->queryUnionAllItemWithStatus($specific);
	if ($result) {
		return  mysqli_num_rows($result);
	}

	return 0;
}
function maxQuery($status, $Id, $start)
{
	if ($Id != '')
		$specific = "'$status' AND uID = '$Id'";
	else
		$specific = "'$status'";
    $itemPerPage = HtGlobal::get('itemPerPage');
	$sql = "SELECT cID,tableType, UploadedDate FROM car         WHERE cStatus LIKE  $specific
			UNION ALL
			SELECT hID, tableType, UploadedDate FROM house       WHERE hStatus LIKE  $specific
			UNION ALL
			SELECT dID, tableType, UploadedDate FROM computer    WHERE dStatus LIKE  $specific
			UNION ALL
			SELECT eID, tableType, UploadedDate FROM electronics WHERE eStatus LIKE  $specific
			UNION ALL
			SELECT pID, tableType, UploadedDate FROM phone       WHERE pStatus LIKE  $specific
			UNION ALL
			SELECT hhID,tableType, UploadedDate FROM household   WHERE hhStatus LIKE $specific
			UNION ALL
			SELECT oID, tableType, UploadedDate FROM others      WHERE oStatus LIKE  $specific
			ORDER BY UploadedDate DESC LIMIT $start, $itemPerPage";
    $result = DatabaseClass::getInstance()->runQuery($sql);
	return $result;
}
function userActive()
{
	global $connect;
	$Id  = $_SESSION['uID'];
	$sum = countRow('active', $Id);

	if ($sum >= 1) {
		$totpage = ceil($sum / HtGlobal::get('itemPerPage'));
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if ($page > $totpage)
			$page = $totpage;
		elseif ($page < 1)
			$page = 1;

		$itemstart = HtGlobal::get('itemPerPage') * ($page - 1);

		$result = maxQuery('active', $Id, $itemstart);
		show($result);
		pagination('userActive', $totpage, $page, 0);
	} elseif ($sum <= 0) {

		echo "<div id=\"mainColumnX\">" . HtGlobal::get('noItemToShow') . "</div>";
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".userActiveButton").show();});</script>';
}
function userPending()
{
	global $connect;
	$Id  = $_SESSION['uID'];
	$sum = countRow('pending', $Id);

	if ($sum >= 1) {
		$totpage = ceil($sum / HtGlobal::get('itemPerPage'));
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if ($page > $totpage)
			$page = $totpage;
		elseif ($page < 1)
			$page = 1;

		$itemstart = HtGlobal::get('itemPerPage') * ($page - 1);

		$result = maxQuery('pending', $Id, $itemstart);
		show($result);
		pagination('userPending', $totpage, $page, 0);
	} elseif ($sum <= 0) {

		echo "<div id=\"mainColumnX\">" . HtGlobal::get('noItemToShow') . "</div>";
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".userPendingButton").show();});</script>';
}
function deletedItems()
{	
	$deletedStatus = 'modDelete';
	$sum = countRow($deletedStatus, '');

	if ($sum >= 1) {
		$totpage = ceil($sum / HtGlobal::get('itemPerPage'));
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if ($page > $totpage)
			$page = $totpage;
		elseif ($page < 1)
			$page = 1;

		$itemstart = HtGlobal::get('itemPerPage') * ($page - 1);

		$result = maxQuery($deletedStatus, '', $itemstart);
		show($result);
		pagination('deletedItems', $totpage, $page, 0);
	} elseif ($sum <= 0) {

		echo "<div id=\"mainColumnX\">" . HtGlobal::get('noItemToShow') . "</div>";
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".moderatorDelete").show();});</script>';
}

function pendingItems()
{	
	$sum = countRow('pending', '');
	if ($sum >= 1) {
		$totpage = ceil($sum / HtGlobal::get('itemPerPage'));
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if ($page > $totpage)
			$page = $totpage;
		elseif ($page < 1)
			$page = 1;

		$itemstart = HtGlobal::get('itemPerPage') * ($page - 1);

		$result = maxQuery('pending', '', $itemstart);
		show($result);
		pagination('pendingItems', $totpage, $page, 0);
	} elseif ($sum <= 0) {

		echo "<div id=\"mainColumnX\">" . HtGlobal::get('noItemToShow') . "</div>";
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".delete_activate").show();});</script>';
}
function display($query)
{
	global $lang, $lang_url, $str_url;

	echo '<table style="font-family: Arial, Helvetica, sans-serif">';
	echo '<tr class="cpheader">';
	echo '<th>';
	echo $lang['id'];
	echo '</th>';
	echo '<th>';
	echo $lang['Email'];
	echo '</th>';
	echo '<th>';
	echo $lang['Phone'];
	echo '</th>';
	echo '</tr>';

	$i = 1;
	while ($result = $query->fetch_assoc()) {
		echo '<tr>';

		echo '<td style="width:10%;">';
		echo '<a href="../includes/template.content.php?type=controlPanel&ID=' . $result['uID'] . $lang_url .'">' . $result['uID'] . '</a>';
		echo '</td>';

		echo '<td style="width:35%;">';
		echo '<a href="../includes/template.content.php?type=controlPanel&ID=' . $result['uID'] . $lang_url .'">' . $result['uEmail'] . '</a>';
		echo '</td>';

		echo '<td style="width:35%;">';
		echo '<a href="../includes/template.content.php?type=controlPanel&ID=' . $result['uID'] . $lang_url .'">' . $result['uPhone'] . '</a>';
		echo '</td>';
		echo '<td><input type="hidden" name="token"  value="' . Token::generate();
		echo '"></td></tr>';
		$i++;
	}
	echo '</table>';
}
function controlPanel()
{
	global $connect, $lang, $lang_url, $str_url;
	echo '<div class="controlPanel">';
	echo '<div class="controlPanelLeft">';

	$myId    = $_SESSION['uID'];
	$result  = queryUserWithId($myId);
	$val     = $result->fetch_assoc();
	$myRole  = $val['uRole'];

	$roleList = array(4 => 'webmaster', 3 => 'admin', 2 => 'mod', 1 => 'user');
	foreach ($roleList as $val) {
		$result = queryUserWithTypeWithIDAndType($_SESSION['uID'], $val);
		$noOfResults = mysqli_num_rows($result);
		if ($noOfResults != 0) {
			echo '<strong>' . $lang['your role'] . strtoupper($val) . '</strong>';
			display($result);
		}
	}
	foreach ($roleList as $val) {
		if (found($myRole) >= found($val)) {
			if (found($val) > 2) {
				$result = queryUserWithNotIdButType($_SESSION['uID'], $val);

				$noOfResults = mysqli_num_rows($result);
				if ($noOfResults != 0) {
					echo '<strong>' . $lang['Other'] .' '. strtoupper($val) . 'S</strong>';
					display($result);
				}
			} 
		}
	}
	if($myRole == "webmaster" or $myRole == "admin") { echo '<table><tr><td><strong><a target="_blank" href="../includes/userList.php' .$lang_url. '" >' .$lang['all users']. '</a></strong></td></tr></table>';}
	echo '</div>';

	echo '<div class="controlPanelRight">';
	if (isset($_GET['ID'])) {
		$result = queryUserWithId($_GET['ID']);
		$rows = mysqli_num_rows($result);
		if ($rows == 0) {
			header('Location: ../index.php' .$lang_url. '');
		}

		$val = $result->fetch_assoc();
		$active  = countRow('active', $_GET['ID']);
		$pending = countRow('pending', $_GET['ID']);
		$delete  = countRow('modDelete', $_GET['ID']);
		echo '<div>';
		echo '<table>';
		echo '<tr><td>' .$lang['Email']. '&nbsp&nbsp</td><td>' . $val['uEmail'] . '</td></tr>' .
			'<tr><td>' .$lang['Phone']. '&nbsp&nbsp</td><td>' . $val['uPhone'] . '</td></tr>' .
			'<tr><td>' .$lang['role']. '&nbsp&nbsp</td><td>' . $val['uRole'] . '</td></tr>' .
			'<tr><td>' .$lang['active items']. '</td><td><a href="../includes/template.content.php?type=userActive' .$str_url. '">'. $lang['active'] .'(' . $active . ')</a></td></tr>' .
			'<tr><td>' .$lang['pending items']. '</td><td><a href="../includes/template.content.php?type=userPending' .$str_url. '">'. $lang['pending'] .'(' . $pending . ')</a></td></tr>' .
			'<tr><td>' .$lang['deleted items']. '</td><td><a href="../includes/template.content.php?type=deletedItems' .$str_url. '">'. $lang['deleted'] .'(' . $delete . ')</a></td></tr>';
	
		echo '</table>';
		echo '</div>';
		//For future
		//$delComm = 1.50;
		//$actComm = 3.00;
		//$penComm = 2.50;
		//$curr = 'Birr';
		//$commission = $delete * $delComm + $pending * $penComm + $active * $actComm;

		//echo 'COMMSISSION FORMULA:=> delete x ' . $delComm . $curr . '+' . 'pending x ' . $penComm . $curr . '+' . 'active x ' . $actComm . $curr . '<br>';
		//echo 'TOTAL COMMISSION=' . $commission . $curr . '<br>';

		echo '<form enctype="multipart/form-data" action="../includes/privilege.php' .$lang_url. '" name="myform" id="myform" method="POST">';
		echo $lang['change role'];
		echo '<select id="privilege" name="privilege">';
		echo '<option value="000">[' . $lang['Choose']. ']</option>';
		echo '<option value="user">' . $lang['user']. '</option>';
		if (found($myRole) >= found('mod'))
			echo '<option value="mod">' . $lang['mod']. '</option>';
		if (found($myRole) >= found('admin'))
			echo '<option value="admin">' . $lang['admin']. '</option>';
		if (found($myRole) >= found('webmaster'))
			echo '<option value="webmaster">' . $lang['webmaster']. '</option>';
		echo '</select>';
		echo '<input type="submit" name="Save" value="' . $lang['Submit']. '">';
		echo '<input name="modId" style="display:none;" type="text" value="' . $_GET['ID'] . '">';
		echo '<input name="modtype" style="display:none;" type="text" value="' . $val['uRole'] . '">';
		echo '</form>';
	} else {

		echo '<div id="myform_errorloc" class="error_strings">' .$lang['cp home txt1'] . $myRole . '!';
		echo $lang['cp home txt2'] . '</div>';
				
		
	}
	echo '</div>';
	echo '</div>';
}

function routerContent($contentType)
{
	global $documnetRootPath;
	$isValidUrl = false;
	switch ($contentType) {
		case 'deletedItems':
			$isValidUrl = true;
			deletedItems();
			break;
		case 'pendingItems':
			$isValidUrl = true;
			pendingItems();
			break;
		case 'reportedItems':
			$isValidUrl = true;
			reportedItems();
			break;
		case 'userActive':
			$isValidUrl = true;
			userActive();
			break;
		case 'userPending':
			$isValidUrl = true;
			userPending();
			break;
		case 'userMessages':
			$isValidUrl = true;
			break;
		case 'controlPanel':
			$isValidUrl = true;
			controlPanel();
			break;
	}

	if (!isset($_SESSION['uID']) || !$isValidUrl) {
		header('Location:../index.php' .$lang_url. '');
	}

}

function getSessionId()
{
	return $_SESSION['uID'];
}


