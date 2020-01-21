<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/inc/userStatus.php';
require_once $documnetRootPath . '/inc/headerSearchAndFooter.php';
require_once $documnetRootPath . '/helper/message.php';
require_once $documnetRootPath . '/helper/token.php';
require_once $documnetRootPath . '/inc/common.inc.php';

$MAX = 30; //== The number of items that will be visible in one page ===//
$noItemToShow = "Sorry! There is no item to display.<div id=\"spanColumnXamharic\">ይቅርታ!የሚታይ ምንም ንብረት የለም</div>";
function show($query)
{
	while ($result = $query->fetch_assoc()) {
		$itemtype = $result['tableType'];
		switch ($itemtype) {
			case 1:
				ObjectPool::getInstance()->getViewObject("car")->show($result['cID']);
				break;
			case 2:
				ObjectPool::getInstance()->getViewObject("house")->show($result['hID']);
				break;
			case 3:
				ObjectPool::getInstance()->getViewObject("computer")->show($result['dID']);
				break;
			case 4:
				ObjectPool::getInstance()->getViewObject("phone")->show($result['pID']);
				break;
			case 5:
				ObjectPool::getInstance()->getViewObject("electronics")->show($result['eID']);
				break;
			case 6:
				ObjectPool::getInstance()->getViewObject("household")->show($result['hhID']);
				break;
			case 7:
				ObjectPool::getInstance()->getViewObject("others")->show($result['oID']);
				break;
		}
	}
}
function reportedItems()
{
	global $noItemToShow;
	$arrayCid  = array();
	$arrayHid  = array();
	$arrayDid  = array();
	$arrayPid  = array();
	$arrayEid  = array();
	$arrayHHid = array();
	$arrayOid  = array();
	$connect = DatabaseClass::getInstance()->getConnection();
	$reported = $connect->query("SELECT * FROM abuse ");
	$sum = mysqli_num_rows($reported);

	if ($sum >= 1) {


		$reported = $connect->query("SELECT * FROM abuse ") or
			die(mysqli_error());

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
		echo "<div id=\"mainColumnX\">
		$noItemToShow
		</div>";
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".delete_ignore").show();});</script>';
}
function countRow($status, $Id)
{
	if ($Id != '')
		$specific = $status . " AND uID = $Id'";
	else
		$specific = "'$status'";

	$result = DatabaseClass::getInstance()->queryUnionAllItemWithStatus($specific);
	if ($result) {
		return  mysqli_num_rows($result);
	}

	return 0;
}
function maxQuery($status, $Id, $start, $MAX)
{
	$connect = DatabaseClass::getInstance()->getConnection();
	if ($Id != '')
		$specific = "'$status' AND uID = '$Id'";
	else
		$specific = "'$status'";

	$result = $connect->query(
		"SELECT cID,tableType, UploadedDate FROM car         WHERE cStatus LIKE  $specific
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
			ORDER BY UploadedDate DESC LIMIT $start,$MAX "
	);

	return $result;
}
function userActive()
{
	global $connect, $noItemToShow, $MAX;
	$Id  = $_SESSION['uID'];
	$sum = countRow('active', $Id);

	if ($sum >= 1) {
		$totpage = ceil($sum / $MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if ($page > $totpage)
			$page = $totpage;
		elseif ($page < 1)
			$page = 1;

		$itemstart = $MAX * ($page - 1);

		$result = maxQuery('active', $Id, $itemstart, $MAX);
		show($result);
		pagination('userActive', $totpage, $page, 0);
	} elseif ($sum <= 0) {

		echo "<div id=\"mainColumnX\">
		$noItemToShow
		</div>";
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".userActiveButton").show();});</script>';
}
function userPending()
{
	global $connect, $noItemToShow, $MAX;
	$Id  = $_SESSION['uID'];
	$sum = countRow('pending', $Id);

	if ($sum >= 1) {
		$totpage = ceil($sum / $MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if ($page > $totpage)
			$page = $totpage;
		elseif ($page < 1)
			$page = 1;

		$itemstart = $MAX * ($page - 1);

		$result = maxQuery('pending', $Id, $itemstart, $MAX);
		show($result);
		pagination('userPending', $totpage, $page, 0);
	} elseif ($sum <= 0) {

		echo "<div id=\"mainColumnX\">
		$noItemToShow
		</div>";
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".userPendingButton").show();});</script>';
}
function deletedItems()
{
	global $noItemToShow, $MAX;
	$deletedStatus = 'modDelete';
	$sum = countRow($deletedStatus, '');

	if ($sum >= 1) {
		$totpage = ceil($sum / $MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if ($page > $totpage)
			$page = $totpage;
		elseif ($page < 1)
			$page = 1;

		$itemstart = $MAX * ($page - 1);

		$result = maxQuery($deletedStatus, '', $itemstart, $MAX);
		show($result);
		pagination('deletedItems', $totpage, $page, 0);
	} elseif ($sum <= 0) {

		echo "<div id=\"mainColumnX\">
		$noItemToShow
		</div>";
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".moderatorDelete").show();});</script>';
}
function pendingItems()
{
	global $noItemToShow, $MAX;
	$sum = countRow('pending', '');

	if ($sum >= 1) {
		$totpage = ceil($sum / $MAX);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if ($page > $totpage)
			$page = $totpage;
		elseif ($page < 1)
			$page = 1;

		$itemstart = $MAX * ($page - 1);

		$result = maxQuery('pending', '', $itemstart, $MAX);
		show($result);
		pagination('pendingItems', $totpage, $page, 0);
	} elseif ($sum <= 0) {

		echo "<div id=\"mainColumnX\">
		$noItemToShow
		</div>";
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".delete_activate").show();});</script>';
}
function display($query)
{
	echo '<table style="width: 70%;font-size: 16px;text-align: left; font-family: Arial, Helvetica, sans-serif; ">';
	echo '<tr class="cpheader">';
	echo '<th>';
	echo 'ID';
	echo '</th>';
	echo '<th>';
	echo 'email';
	echo '</th>';
	echo '<th>';
	echo 'phone';
	echo '</th>';
	echo '</tr>';

	$i = 1;
	while ($result = $query->fetch_assoc()) {
		echo '<tr>';

		echo '<td style="width:10%;">';
		echo '<a href="../content/controlPanel.php?err=0&ID=' . $result['uID'] . '&nbsp&nbsp">' . $result['uID'] . '</a>';
		echo '</td>';

		echo '<td style="width:35%;">';
		echo '<a href="../content/controlPanel.php?err=0&ID=' . $result['uID'] . '&nbsp&nbsp">' . $result['uEmail'] . '</a>';
		echo '</td>';

		echo '<td style="width:35%;">';
		echo '<a href="../content/controlPanel.php?err=0&ID=' . $result['uID'] . '&nbsp&nbsp">' . $result['uPhone'] . '</a>';
		echo '</td>';
		echo '<td><input type="hidden" name="token"  value="' . Token::generate();
		echo '"></td></tr>';
		$i++;
	}
	echo '</table>';
}
function controlPanel($hash)
{
	$connect = DatabaseClass::getInstance()->getConnection();
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
			echo '<strong>YOU ' . strtoupper($val) . '</strong>';
			display($result);
		}
	}
	foreach ($roleList as $val) {
		if (found($myRole) >= found($val)) {
			if (found($val) != 1) {
				$result = queryUserWithNotIdButType($_SESSION['uID'], $val);

				$noOfResults = mysqli_num_rows($result);
				if ($noOfResults != 0) {
					echo '<strong>' . strtoupper($val) . '</strong>';
					display($result);
				}
			} else {

				echo '<table><tr><td><strong><a target="_blank" href="../content/userList.php">ALL USERS</a></strong></td></tr></table>';
			}
		}
	}
	echo '</div>';

	echo '<div class="controlPanelRight">';
	if (isset($_GET['ID']) && $hash == 0) {
		$result = queryUserWithId($_GET['ID']);
		$rows = mysqli_num_rows($result);
		if ($rows == 0) {
			header('Location: ../index.php');
		}

		$val = $result->fetch_assoc();
		echo '<div class="clientHeader">';
		echo '<table>';
		echo '<tr><td>Email&nbsp&nbsp</td><td>' . $val['uEmail'] . '</td></tr>' .
			'<tr><td>phone&nbsp&nbsp</td><td>' . $val['uPhone'] . '</td></tr>' .
			'<tr><td>Role&nbsp&nbsp</td><td>' . $val['uRole'] . '</td></tr>';
		echo '</table>';
		echo '</div>';
		$active  = countRow('active', $_GET['ID']);
		$pending = countRow('pending', $_GET['ID']);
		$delete  = countRow('modDelete', $_GET['ID']);

		if ($active) {
			echo '<a href="../content/userActive.php?ID=' . $_GET['ID'] . '" target="_blank">ACTIVE(' . $active . ')</a><br>';
		} else {
			echo 'ACTIVE(' . $active . ')<br>';
		}
		if ($pending) {
			echo '<a href="../content/pendingItems.php?ID=' . $_GET['ID'] . '" target="_blank">PENDING(' . $pending . ')</a><br>';
		} else {
			echo 'PENDING(' . $pending . ')<br>';
		}
		if ($delete) {
			echo '<a href="../content/deletedItems.php?ID=' . $_GET['ID'] . '" target="_blank">DELETED(' . $delete . ')</a><br>';
		} else {
			echo 'DELETED(' . $delete . ')<br>';
		}
		$delComm = 1.50;
		$actComm = 3.00;
		$penComm = 2.50;

		$curr = 'Birr';
		$commission = $delete * $delComm + $pending * $penComm + $active * $actComm;

		echo 'COMMSISSION FORMULA:=> delete x ' . $delComm . $curr . '+' . 'pending x ' . $penComm . $curr . '+' . 'active x ' . $actComm . $curr . '<br>';
		echo 'TOTAL COMMISSION=' . $commission . $curr . '<br>';

		echo '<form enctype="multipart/form-data" action="../helper/privilege.php" name="myform" id="myform" method="POST">';
		echo 'Change access to ';
		echo '<select id="privilege" name="privilege">';
		echo '<option value="000">[privilege]</option>';
		echo '<option value="user">USER</option>';
		if (found($myRole) >= found('mod'))
			echo '<option value="mod">MODERATOR</option>';
		if (found($myRole) >= found('admin'))
			echo '<option value="admin">ADMINISTRATOR</option>';
		if (found($myRole) >= found('webmaster'))
			echo '<option value="webmaster">WEBMASTER</option>';
		echo '</select>';
		echo '<input type="submit" name="Save">';
		echo '<input name="modId" style="display:none;" type="text" value="' . $_GET['ID'] . '">';
		echo '<input name="modtype" style="display:none;" type="text" value="' . $val['uRole'] . '">';
		echo '</form>';
	} else {

		//if(crypt(100, $hash) == $hash)
		{
			echo '<div id="myform_errorloc" class="error_strings">You are logged as an Andminstrator!';
			echo ' <br><br>This operation require extra privileges, <br><br>Please contact your Webmaster. </div>';
		}
		//else 
		{
			// 			if($noOfUser==0)
			// 			{
			// 				if($noOfMod==0)
			// 				{
			// 					if($noOfAdmin==0)
			// 					{
			// 						if($noOfMaster==0)
			// 						{

			// 							echo 'No users for operation. Redirecting in 5 seconds!<br> <img id="progress" src="../img/redirect.gif">';
			// 							header( "refresh:5; url=../index.php" );
			// 						}
			// 						else
			// 						{
			// 							echo 'Choose Adminstrator, Moderator or user <br> on the left side, for more options control.';
			// 						}
			// 					}
			// 					else
			// 					{
			// 						echo 'Choose Adminstrator, Moderator or user <br> on the left side, for more options control.';
			// 					}

			// 				}
			// 				else
			// 				{
			// 					echo 'Choose Adminstrator, Moderator or user <br> on the left side, for more options control.';
			// 				}
			// 			}
			//else
			{
				echo 'Choose Adminstrator, Moderator or user <br> on the left side, for more options control.';
			}
		}
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
			break;
		case 'pendingItems':
			$isValidUrl = true;
			break;
		case 'reportedItems':
			$isValidUrl = true;
			break;
		case 'userActive':
			$isValidUrl = true;
			break;
		case 'userPending':
			$isValidUrl = true;
			break;
		case 'userMessages':
			$isValidUrl = true;
			break;
	}

	if (!isset($_SESSION['uID']) || !$isValidUrl) {
		header('Location:../index.php');
	}

	switch ($contentType) {
		case 'deletedItems':
			deletedItems();
			break;
		case 'pendingItems':
			pendingItems();
			break;
		case 'reportedItems':
			reportedItems();
			break;
		case 'userActive':
			userActive();
			break;
		case 'userPending':
			userPending();
			break;
	}
}
function routeControlPanel($contentType, $err)
{
	$isValidUrl = false;
	if ($contentType == 'controlPanel')
		$isValidUrl = true;

	if (!isset($_SESSION['uID']) || !$isValidUrl) {
		header('Location:../index.php');
	} else {
		controlPanel($err);
	}
}
function getSessionId()
{
	return $_SESSION['uID'];
}
