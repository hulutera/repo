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
require_once $documnetRootPath . '/classes/reflection/HtCategoryAbuse.php';
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
	$result = countRowOfItem($item, $status);
	return $result >= 0 ? $result : 0;
}

function allReportedItem($item, $id = null)
{
	$record = new MySqlRecord();
	return $record->countReportedOfItem($item);

	// $reportedItemArray = [
	// 	'car' => ['id_car', 'WHERE id_car IS NOT NULL'],
	// 	'house' => ['id_house', 'WHERE id_house IS NOT NULL'],
	// 	'computer' => ['id_computer', 'WHERE id_computer IS NOT NULL'],
	// 	'electronic' => ['id_electronic', 'WHERE id_electronic IS NOT NULL'],
	// 	'phone' => ['id_phone', 'WHERE id_phone IS NOT NULL'],
	// 	'household' => ['id_household', 'WHERE id_household IS NOT NULL'],
	// 	'other' => ['id_other', 'WHERE id_other IS NOT NULL']
	// ];

	// $found = false;
	// foreach ($reportedItemArray as $key => $value) {
	// 	if ($item == $key) {
	// 		$found = true;
	// 		break;
	// 	}
	// }

	// if (!$found) {
	// 	header('Location: ../index.php');
	// }

	// $field = $reportedItemArray[$item][0];
	// $caluse = $reportedItemArray[$item][1];

	// if (isset($id)) {
	// 	if ($id == '*') {
	// 		$field .= ', id_category';
	// 	} else {
	// 		$field = $reportedItemArray[$item][0];
	// 		$caluse = 'WHERE ' . $field . '=' . $id;
	// 		$field = 'id';
	// 	}
	// }

	// return (new HtUtilAbuse('*', $field, $caluse));
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
		echo '<th scope="col" class="' . $value['style']['text'] . '">' . strtoupper($key) . '</th>'; //<i class="' . $value['style']['fas fa-exclamation'] . '"></i>
	}
	echo '</tr></thead><tbody id="activity-table">';

	$totalItem  = $totalActivePerItem = $totalPendingPerItem = $totalReportedPerItem = $totalDeletedPerItem = 0;
	$grandTotal = $totalActive  = $totalPending = $totalReported =	$totalDeleted = 0;


	// displays main activity table with some statistics
	// sum across item over status and report type is presented
	// at the same time sum of status across item is shown
	// grand total sum should be equal.
	foreach ($allItems  as $table_name_short => $table_name) {

		$totalActivePerItem   = allItemOfStatus($table_name, 'active');
		$totalPendingPerItem  = allItemOfStatus($table_name, 'pending');
		$totalReportedPerItem = allReportedItem($table_name)[0];
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

			$cryto = new Cryptor();
			$itemEn    = urlencode($cryto->encryptor(base64_encode($table_name_short)));

			foreach ($status2TotalArray as $status => $totalStatusSum) {
				$url = 'function=activity-table&type=' . $table_name_short . '&status=' . $status;
				$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);

				if ($totalStatusSum == 0) {
					echo '<td style="font-size:18px;">0</td>';
				} else {
					echo '<td style="font-size:18px;" ><a href="./admin.php?actionId=' . $urlEn . '">' . $totalStatusSum  . '</td>';
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

	///Get pointer to Cryptor class
	$cryto = new Cryptor();

	/// decode Url
	$actionIdDecode = $cryto->urldecode_base64_decode_decryptor($_GET['actionId']);
	/// extract content similar to $_GET action
	$actionIdDecodeArr = explode("&", $actionIdDecode);

	///prepare finalArray simlat to $_GET
	for ($i = 0; $i < count($actionIdDecodeArr); ++$i) {
		$keyValue = explode("=", $actionIdDecodeArr[$i]);
		$ACTIVITY_ARRAY[$keyValue[0]] = $keyValue[1];
	}
	if (HtGlobal::get('DEBUG')) {
		var_dump($actionIdDecode);
		var_dump($actionIdDecodeArr);
		var_dump($ACTIVITY_ARRAY);
	}

	/**
	 * ACTION EXECUTIONS HERE
	 */
	if (isset($ACTIVITY_ARRAY['function']) && isset($ACTIVITY_ARRAY['type']) && isset($ACTIVITY_ARRAY['action'])) {
		$id = $ACTIVITY_ARRAY['id'];
		$item = $ACTIVITY_ARRAY['type'];
		$status = $ACTIVITY_ARRAY['status'];
		$action = $ACTIVITY_ARRAY['action'];
		if ($action == 'reported') {
			/// take action on specific report type by removing from the list in field_report
			$itemObject = ObjectPool::getInstance()->getObjectWithId($item, $id);
			if (isset($ACTIVITY_ARRAY['unreport'])) {
				$clearSpecificReport = $ACTIVITY_ARRAY['unreport'];
				$reportsArray = explode(',', $itemObject->getFieldReport());
				foreach ($reportsArray as $key => $value) {
					if ($value == $clearSpecificReport) {
						unset($reportsArray[$key]); //remove the matching abuse type
					}
				}
				/// rebuild the array and save to field_report , commad delimited
				$newReportsArray = implode(',', $reportsArray);				
				$itemObject->setFieldReport($newReportsArray);
			} else {
				//clears all report types
				$itemObject->setFieldReport(NULL);
			}
			/// finally update table with new data
			$itemObject->updateCurrent();
		} else {
			/// Change status of item 
			$object = ObjectPool::getInstance()->getObjectWithId($item, $id);
			if ($action == 'distroy') {
				///here permanent damage, data unrecoverable!!
				$object->delete($id);
			} else {
				///set new status and update table
				$object->setFieldStatus($action);
				$object->updateCurrent();
			}
		}
		/// To activity table 
		$url = 'function=activity-table&type=' . $item . '&status=' . $status;
		$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);
		header('Location: ./admin.php?actionId=' . $urlEn);
	}
	/**
	 * ACTION TRIGGERED HERE
	 */
	if (isset($ACTIVITY_ARRAY['function']) && isset($ACTIVITY_ARRAY['type']) && isset($ACTIVITY_ARRAY['status'])) {
		$item = $ACTIVITY_ARRAY['type'];
		$status = $ACTIVITY_ARRAY['status'];
		echo '<p class="h1">List of ' . $item . ' with status=' . $status . '</p>';

		//main array to display for table below
		$itemRawDataToTable = [];
		// report is not a status hence speciall handling is required
		/// here search if an item have a field_report is set
		if ($status == 'reported') {
			$itemObject = ObjectPool::getInstance()->getObjectWithId($item);
			$itemObject->runQuery("WHERE field_report IS NOT NULL");
			$result = $itemObject->getResultSet();
			$result->data_seek(0);
			while ($row = $result->fetch_assoc()) {
				array_push($itemRawDataToTable, $row);
			}
		} else {
			$itemObject = ObjectPool::getInstance()->getObjectWithId($item, "*", $status);
			$result = $itemObject->getResultSet();
			$result->data_seek(0);
			while ($row = $result->fetch_assoc()) {
				array_push($itemRawDataToTable, $row);
			}
		}

		//var_dump($itemRawDataToTable);
		/// use the first row for the table header
		$header = $itemRawDataToTable[0];
		/// start : table header
		___open_div_('col-md-12');
		echo '<table id="dtBasicExample" class="horizontal-scroll-except-first-column table table-striped table-bordered table-sm" cellspacing="0" width="100%">';
		echo '<thead><tr><th class="th-sm">	Action (Change status)</th>';
		// echo '<th class="th-sm">	Reported For</th>';

		foreach ($header as $k1 => $v1) {
			$k11 = explode("_", $k1);
			$final = "";
			foreach ($k11 as $k111 => $v111) {
				$final .= $v111[0][0];
			}
			echo '<th class="th-sm" title="' . $k1 . '">' . strtoupper($k1) . '</th>';
		}
		echo '</tr></thead>';
		/// end : table header

		//// array for action to be take, 
		$allActionButtons = [
			'active' => [ // action to be taken
				'activate', // action button name
				'btn-success', // button style bts,
				' style="color:black;margin-left:5px;font-weight:bold" ' // more style
			],
			'pending' => [ // action to be taken
				'pend', // action button name
				'btn-warning', // button style bts,
				' style="color:black;margin-left:5px;font-weight:bold" ' // more style
			],
			'reported' => [ // action to be taken
				'clear report', // action button name
				'btn-mute', // button style bts,
				' style="color:black;margin-left:5px;font-weight:bold;border:1px dashed;" ' // more style
			],
			'deleted' => [ // action to be taken
				'delete', // action button name
				'btn-warning', // button style bts,
				' style="color:black;margin-left:5px;font-weight:bold" ' // more style
			],
			'distroy' => [ // action to be taken
				'erase', // action button name
				'btn-danger', // button style bts,
				' style="color:yellow;margin-left:5px;font-weight:bold;background-color:red;" ' // more style
			]
		];

		/// Actions possible to take within a status
		$edit = [
			'active'   => $allActionButtons,
			'pending'  => $allActionButtons,
			'reported' => $allActionButtons,
			'deleted'  => $allActionButtons,
			'distroy'  => $allActionButtons,
		];


		echo '<tbody>';
		$itemId = 0;
		foreach ($itemRawDataToTable as $k1 => $v1) {
			echo '<tr>';
			$displayActionButtonOnce = true;
			$j = 0;
			foreach ($v1 as $k2 => $v2) {
				///Make action forms per item once 
				if ($displayActionButtonOnce) {
					echo '<td><span class="table-remove">';
					foreach ($edit[$status] as $action => $value) {
						$disabled = "";
						if ($action == $ACTIVITY_ARRAY['status'] && $ACTIVITY_ARRAY['status'] !== 'reported') {
							$disabled = ' disabled';
						}
						// FIRST CELL OF ROW IS THE ITEM ID SAVE FOR LATER USE 
						////////////////////////////////
						$itemId = $v2;  ////////////////
						////////////////////////////////
						$url = 'function=activity-table&type=' . $item . '&id=' . $itemId . '&action=' . $action . '&status=' . $status;
						$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);

						echo '<form style="display:inline-block;" id="myForm" action="./admin.php?actionId=' . $urlEn . '" method="post">';
						echo '<button name="submit" type="submit" value="submit" ' . $value[2] . ' class="btn btn-rounded btn-sm ' . $value[1]
							. '"' . $disabled .	' id="' . $v2 . '_' . $key . '">' . $value[0] . '</button>';
						echo '</form>';
					}
					echo '</span></td>';
					$displayActionButtonOnce = false;
				}

				if ($j == 0) {
					/// To display Item on Id
					$url = 'function=activity-table&type=' . $item . '&id=' . $itemId . '&status=' . $status;
					$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);
					echo '<td><a href="./admin.php?actionId=' . $urlEn . '">';
					echo '<button style="font-style: italic;" class="btn btn-rounded btn-md btn-primary">View ' . ucwords($item)  . '#' . $v2 . '</button></a></td>';
					$j++;
				} else {
					/// TO clear a specific abuse reports
					if ($k2 == 'field_report') {
						if (isset($v2)) {
							$abuse = explode(',', $v2);
							echo '<td>';
							foreach ($abuse as $key => $value) {
								$allAbuse = new HtCategoryAbuse((int) $value);
								$url = 'function=activity-table&type=' . $item . '&id=' . $itemId . '&action=reported&unreport=' . $value . '&status=' . $status;
								$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);
								echo '<a href="./admin.php?actionId=' . $urlEn . '">Clear <strong>' . $allAbuse->getFieldName() . '</strong> Report</a><br>';
							}
							echo '</td>';
						} else {
							echo '<td></td>';
						}
					} else {
						///display remaining table content
						echo '<td>' . $v2 . '</td>';
					}
				}
			}
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
		___close_div_(1);
		___close_div_(1);
	}

	////SHOW ITEM below table here before action be taken
	$function = isset($ACTIVITY_ARRAY['function']) ? $ACTIVITY_ARRAY['function'] : null;
	$id = isset($ACTIVITY_ARRAY['id']) ? $ACTIVITY_ARRAY['id'] : null;
	$status = isset($ACTIVITY_ARRAY['status']) ? $ACTIVITY_ARRAY['status'] : null;

	if (isset($function) && isset($id) && isset($status)) {
		echo '<p class="h1">' . $item . '#' . $id . '</p>';
		if ($status == 'reported') {
			(new  HtMainView($item, $id, null))->showOneItem();
		} else {
			(new  HtMainView($item, $id, $status))->showOneItem();
		}
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
