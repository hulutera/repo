<?php
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/userStatus.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/message.php';
require_once $documnetRootPath . '/includes/token.php';
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/view/main.view.class.php';
require_once $documnetRootPath . '/classes/reflection/HtItemAll.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
require_once $documnetRootPath . '/view/HtMainView.php';
require_once $documnetRootPath . '/classes/reflection/MySqlRecord.php';

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

function countRow($status, $id)
{
	$record = new MySqlRecord();
	return $record->countRow($status, $id);
}
function countRowOfItem($item, $status)
{
	$record = new MySqlRecord();
	return $record->countRowOfItem($item, $status);
}

function maxQuery($status, $id, $start)
{
	$record = new MySqlRecord();
	return $record->maxQuery($status, $id, $start);
}
function allItemOfStatus($item, $status)
{
	return countRowOfItem($item, $status);
}
function userActive()
{
	global $connect;
	$Id  = $_SESSION['uID'];
	$sum = countRow('active', $Id);
	return $sum;
	if ($sum >= 1) {
		$totpage = ceil($sum / HtGlobal::get('itemPerPage'));
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if ($page > $totpage)
			$page = $totpage;
		elseif ($page < 1)
			$page = 1;

		$itemstart = HtGlobal::get('itemPerPage') * ($page - 1);

		$result = maxQuery('active', $Id, $itemstart);

		echo  $result['field_table_type'];
		$tableType2item = [
			1 => 'car',
			2 => 'house',
			3 => 'computer',
			4 => 'phone',
			5 => 'electronic',
			6 => 'household',
			7 => 'other'
		];
		foreach ($result as $key => $value) {
			# code...
			$itemName = $tableType2item[$value['field_table_type']];
			$view = new HtMainView($itemName, $value['id']);
			$view->showItem('active');
		}
		echo '<pre>' . print_r($result) . '</pre>';
		//show($result);
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
		echo '<pre>';
		var_dump($result);
		echo '</pre>';
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

function activityTable()
{
	global $lang_sw, $lang_url;
	___open_div_('container-fluid');
	___open_div_('row', '" style="width:50%;');
	___open_div_('col-md-12', '" ');

	echo '<p class="h3">Click on the number links to start admistrative action</p>';
	echo '<input id="activity-search" class="form-control form-control-md" type="text" placeholder="Search.. for items car, house, computer, " style="width:50%;">';
	$allItems = [
		'car' => 'item_car',
		'house' => 'item_house',
		'computer' => 'item_computer',
		'electronic' => 'item_electronic',
		'phone' => 'item_phone',
		'household' => 'item_household',
		'other' => 'item_other',
		'total' => 'total'
	];
	$activities = [
		'Active' => [
			'item' => $allItems,
			'style' => ['text' => 'text-success bg-dark text-center', 'fas' => 'fas fa-check']
		],
		'Pending' => [
			'item' => $allItems,
			'style' => ['text' => 'text-warning bg-dark text-center', 'fas' => 'fas fa-pause']
		],
		'Reported' => [
			'item' => $allItems,
			'style' => ['text' => 'text-danger bg-dark text-center', 'fas' => 'fas fa-exclamation']
		],
		'Deleted' => [
			'item' => $allItems,
			'style' => ['text' => 'text-muted bg-dark text-center', 'fas' => 'fas fa-trash']
		],
		'total' => [
			'item' => $allItems,
			'style' => ['text' => 'text-muted bg-dark text-center', 'fas' => 'fas fa-plus']
		]
	];
	___close_div_(1);
	___close_div_(1);
	___open_div_('row', '" style="width:50%;');
	___open_div_('col-md-12');

	echo '<table class="table">
          <thead>
          <tr><th scope="col">Items</th>';
	foreach ($activities  as $key => $value) {
		echo '<th scope="col" class="' . $value['style']['text'] . '">' . strtoupper($key) . '</th>'; //<i class="' . $value['style']['fas'] . '"></i>
	}
	echo '</tr></thead><tbody id="activity-table">';

	$totalItem  = $totalActivePerItem = $totalPendingPerItem = $totalReportedPerItem = $totalDeletedPerItem = 0;
	$grandTotal = $totalActive  = $totalPending = $totalReported =	$totalDeleted = 0;

	foreach ($allItems  as $table_name_short => $table_name) {

		$totalActivePerItem   = allItemOfStatus($table_name, 'active');
		$totalPendingPerItem  = allItemOfStatus($table_name, 'pending');
		$totalReportedPerItem = allItemOfStatus($table_name, 'reported');
		$totalDeletedPerItem  = allItemOfStatus($table_name, 'deleted');

		$totalActive    +=  $totalActivePerItem;
		$totalPending   +=  $totalPendingPerItem;
		$totalReported  +=  $totalReportedPerItem;
		$totalDeleted   +=  $totalDeletedPerItem;

		$grandTotal   = $totalActive + $totalPending  + $totalReported + $totalDeleted;
		if ($table_name == "total") {
			$totalArray = [
				'totalActive' => $totalActive,
				'totalPending' => $totalPending,
				'totalReported' => $totalReported,
				'totalDeleted' => $totalDeleted,
				'grandTotal' => $grandTotal

			];
			echo '<tr>';
			echo '<th scope="col">' . $table_name . '</th>';
			foreach ($totalArray as $totalStatus => $totalStatusSum) {
				echo '<td style="font-size:20px;">' . $totalStatusSum . '</td>';
			}
			echo '</tr>';
		} else {
			echo '<tr>';
			echo '<th scope="col">' . $table_name . '</th>';
			$status2TotalArray = [
				'active' => $totalActivePerItem,
				'pending' => $totalPendingPerItem,
				'reported' => $totalReportedPerItem,
				'deleted' => $totalDeletedPerItem,
			];
			foreach ($status2TotalArray as $status => $totalStatusSum) {
				if ($totalStatusSum == 0) {
					echo '<td style="font-size:18px;">0</td>';
				} else {
					echo '<td style="font-size:18px;" ><a href="./admin.php?function=activity-table&type=' . $table_name_short . '&status=' . $status . '">' . $totalStatusSum  . '</td>';
				}
			}
			$totalItem = $totalActivePerItem  + $totalPendingPerItem + $totalReportedPerItem + $totalDeletedPerItem;
			echo '<td style="font-size:18px;" >' . $totalItem . '</td>';
			echo '</tr>';
		}
	}
	echo '</tbody></table>';
	___close_div_(1);
	___close_div_(1);
	___close_div_(1);
	___open_div_('row', '" style="width:80%;');
	___open_div_('col-md-12');

	if (isset($_GET['function']) && isset($_GET['type']) && isset($_GET['action'])) {
		$id = $_GET['id'];
		$item = $_GET['type'];
		$status = $_GET['status'];
		$action = $_GET['action'];
		$object = ObjectPool::getInstance()->getObjectWithId($item, $id);
		if ($action == 'distroy') {
			$object->delete($id);
		} else {
			$object->setFieldStatus($action);
			$object->updateCurrent();
		}
		header('Location: ./admin.php?function=activity-table&type=' . $item . '&status=' . $status);
	}
	if (isset($_GET['function']) && isset($_GET['type']) && isset($_GET['status'])) {
		$item = $_GET['type'];
		$status = $_GET['status'];
		echo '<p class="h1">List of ' . $item . ' with status=' . $status . '</p>';
		$view = new HtMainView($item);
		$dataOnly = $view->showRawData($status);
		$header = $dataOnly[0];
		___open_div_('col-md-12');
		echo '<table id="dtBasicExample" class="horizontal-scroll-except-first-column table table-striped table-bordered table-sm" cellspacing="0" width="100%">';
		echo '<thead><tr><th class="th-sm">
		Action (Change status)
		</th>';
		foreach ($header as $k1 => $v1) {
			$k11 = explode("_", $k1);
			$final = "";
			foreach ($k11 as $k111 => $v111) {
				$final .= $v111[0][0];
			}
			echo '<th class="th-sm" title="' . $k1 . '">' . strtoupper($k1) . '</th>';
		}
		$allActionButtons = [
			'active' => [  // change
				'activate', // button name
				'btn-success', // button style,
				' style="color:black;margin-left:5px;font-weight:bold" '
			],
			'pending' => [
				'pend', // button name
				'btn-warning',
				' style="color:black;margin-left:5px;font-weight:bold" '
			],
			'reported' => [
				'report', // button name
				'btn-mute',
				' style="color:black;margin-left:5px;font-weight:bold" '
			],
			'deleted' => [  // change
				'delete', // button name
				'btn-warning', // button style,
				' style="color:black;margin-left:5px;font-weight:bold" '
			],
			'distroy' => [  // change
				'erase', // button name
				'btn-danger', // button style
				' style="color:yellow;margin-left:5px;font-weight:bold;background-color:red;" '
			]
		];

		$edit = [
			'active'   => $allActionButtons,
			'pending'  => $allActionButtons,
			'reported' => $allActionButtons,
			'deleted'  => $allActionButtons,
			'distroy'  => $allActionButtons,
		];

		echo '</tr></thead>';

		echo '<tbody>';
		foreach ($dataOnly as $k1 => $v1) {
			echo '<tr>';
			$onlyOneTime = true;
			$i = 0;
			foreach ($v1 as $k2 => $v2) {

				if ($onlyOneTime) {
					echo '<td><span class="table-remove">';

					foreach ($edit[$status] as $key => $value) {
						$disabled = "";
						if ($key == $_GET['status']) {
							$disabled = ' disabled';
						}
						// TODO: Apply encryption
						// $cryto = new Cryptor();
						// $itemEn    = urlencode($cryto->encryptor(base64_encode($item)));
						// $idEn      = urlencode($cryto->encryptor(base64_encode($v2)));
						// $actionEn  = urlencode($cryto->encryptor(base64_encode($key)));
						// $statusEn  = urlencode($cryto->encryptor(base64_encode($status)));
						//urlencode(base64_encode($itemEn)).

						echo '<form style="display:inline-block;" id="myForm" action="./admin.php?function=activity-table&type=' . $item . '&id=' . $v2 . '&action=' . $key . '&status=' . $status . '" method="post">';
						echo '<button name="submit" type="submit" value="submit" ' . $value[2] . ' 
						class="btn btn-rounded btn-sm ' . $value[1] . '"' . $disabled .
							' id="' . $v2 . '_' . $key . '">' . $value[0] . '</button>';
						echo '</form>';
					}
					echo '</span></td>';
					$onlyOneTime = false;
				}
				//TODO: add image
				//<img style="width:100px; height:100px;" src="../../images/hulutera.PNG">
				if ($i == 0) {
					echo '<td><a href="./admin.php?function=activity-table&type=' .
						$item . '&id=' . $v2 . '&status=' . $status . '"><button style="font-style: italic;" class="btn btn-rounded btn-md btn-primary">View ' . ucwords($item)  . '#' . $v2 . '</button></a></td>';
					$i++;
				} else {
					echo '<td>' . $v2 . '</td>';
				}
			}
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
		___close_div_(1);
		___close_div_(1);
	}
	$function = isset($_GET['function']) ? $_GET['function'] : null;
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	$status = isset($_GET['status']) ? $_GET['status'] : null;

	if (isset($function) && isset($id) && isset($status)) {
		echo '<p class="h1">' . $item . '#' . $id . '</p>';
		(new  HtMainView($item, $id, $status))->showOneItem(); //   show($status);
	}
}

function listUsers()
{
	$roleList = ['webmaster', 'admin', 'user'];
	$sql =  array('sql' => "SELECT * FROM user_all ORDER BY field_privilege");
	$userAll = new HtUserAll($sql);
	$result = $userAll->getResultSet();
	global $lang_sw;
	echo '<div class="container-fluid" style="text-align:left;">';
	___open_div_("row");
	___open_div_("col-md-12");
	___open_div_("row");
	___open_div_("col-md-4");
	echo '
	<table class="table">
		<thead>
			<tr>
				<th>
					UserId
				</th>
				<th>
					Email
				</th>
				<th>
					Phone
				</th>
				<th>
				   Privilege
				</th>
			</tr>
		</thead>
		<tbody>';

	while ($row = $result->fetch_object()) {
		$style = "";
		if ($_GET["ID"] == $row->id) {
			$style = '"background-color:#00203FFF;color:#ADEFD1FF"';
		}
		echo <<< EOD
		<tr style={$style}>
			<td>
				{$row->id}
			</td>
			<td>
				{$row->field_email}
			</td>
			<td>
				{$row->field_phone_nr}
			</td>
			<td>
				<a href="../includes/template.content.php?type=controlPanel&ID={$row->id}{$lang_sw}">{$row->field_privilege}</a>
			</td>
		</tr>										
EOD;
	}
	$token = Token::generate();
	echo <<< EOD
  				</tbody>
				</table>
				</div>
				<div class="col-md-8">
				<input type="hidden" name="token"  value="{$token}">
				</div>
			</div>
		</div>
	</div>
</div>
EOD;
}
function getSessionId()
{
	return $_SESSION['uID'];
}
