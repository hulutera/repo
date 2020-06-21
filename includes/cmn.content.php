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

function getItemWithStatusReported($item, $id = null)
{
	$record = new MySqlRecord();
	return $record->getItemWithStatusReported($item);
}

function getItemPerUser($item, $userId, $status = null)
{
	$record = new MySqlRecord();
	return $record->getItemPerUser($item, $userId, $status);
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

function allUsers()
{
	/// no session route to index.php
	if (!isset($_SESSION['uID'])) {
		header('Location: ../index.php');
	}

	___open_div_('container-fluid');
	___open_div_('row', '" style="width:80%;');
	___open_div_('col-md-12', '" ');
	echo '<p class="h2">User Management Table</p>';

	echo '<table id="dtBasicExample" class="horizontal-scroll-except-first-column table table-striped table-bordered table-sm" cellspacing="0" width="100%">';

	///use record to fetch the user_all table columns
	$record = new MySqlRecord();
	$recordResult = $record->query("SHOW columns FROM `user_all`");
	$header = "";
	$userColumnArray = [];
	while ($row = $recordResult->fetch_assoc()) {
		if ($row['Field'] != "id") {
			array_push($userColumnArray, $row['Field']);
		}
	}
	/*
	userColumnArray:
	0 => string 'field_user_name' (length=15)
	1 => string 'field_first_name' (length=16)
	2 => string 'field_last_name' (length=15)
	3 => string 'field_email' (length=11)
	4 => string 'field_phone_nr' (length=14)
	5 => string 'field_address' (length=13)
	6 => string 'field_password' (length=14)
	7 => string 'field_privilege' (length=15)
	8 => string 'field_contact_method' (length=20)
	9 => string 'field_term_and_condition' (length=24)
	10 => string 'field_register_date' (length=19)
	11 => string 'field_new_password' (length=18)
	12 => string 'field_activation' (length=16)
	*/

	///Array to hold hidden fields to from user_all userColumnArray 
	$hiddenFieldsArray = [];
	/// based on current login user privilege
	/// populate hiddenFieldsArray with id of fields
	/// webmaster: all
	$currentUser = new HtUserAll($_SESSION['uID']);
	$result = $currentUser->getResultSet();
	$result->data_seek(0);
	if ($currentUser->isWebMaster() || $currentUser->isAdmin()) {
		$hiddenFieldsArray = [];
	} else if ($currentUser->isModerator()) {
		$hiddenFieldsArray = [5, 6, 10, 11, 12];
	} else if ($currentUser->isUser()) {
		$hiddenFieldsArray = $userColumnArray;
	}

	///now remove those in hiddenFieldsArray from the userColumnArray	
	foreach ($hiddenFieldsArray as $key => $value) {
		unset($userColumnArray[$value]);
	}

	/// get all Users here
	$allUsers = new HtUserAll('*');
	$result = $allUsers->getResultSet();
	$result->data_seek(0);

	/// populate table header found in userColumnArray
	echo '<thead><tr>';
	echo '<th class="th-sm">User Action </th>';
	foreach ($userColumnArray as $key => $value) {
		echo '<th class="th-sm" title=""test"">' . strtoupper($value) . '</th>';
	}
	echo '</tr></thead>';
	/// populate table body found in userColumnArray
	echo '<tbody>';
	$cryto = new Cryptor();
	$loggedInUser = new HtUserAll($_SESSION['uID']);
	while ($row = $result->fetch_assoc()) {
		$localUser = new HtUserAll($row['id']);
		if ($localUser->isWebMaster() && !$loggedInUser->isWebMaster()) {
			continue;
		}
		echo '<tr>';
		$url = 'function=all-users&action=view&userId=' . $row['id'];
		$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);
		echo '<td><a href="./admin.php?allUserId=' . $urlEn . '">';
		echo '<button style="font-style: italic;" class="btn btn-rounded btn-sm btn-primary btn-block">View User#' . $row['id'] . '</button></a></td>';

		foreach ($row as $key => $value) {
			if (in_array($key, array_values($userColumnArray))) {
				echo '<td>' . $value . '</td>';
			}
		}
		echo '</tr>';
	}

	echo '</tbody>';
	___close_div_(2);
	___open_div_('row', '');
	___open_div_('col-md-12', '');
	if (isset($_GET['allUserId'])) {
		/// decode Url
		$allUserIdDecode = $cryto->urldecode_base64_decode_decryptor($_GET['allUserId']);
		/// extract content similar to $_GET action
		$allUserIdDecodeArr = explode("&", $allUserIdDecode);

		///prepare finalArray simlar to $_GET
		for ($i = 0; $i < count($allUserIdDecodeArr); ++$i) {
			$keyValue = explode("=", $allUserIdDecodeArr[$i]);
			$ACTIVITY_ARRAY[$keyValue[0]] = $keyValue[1];
		}
		if (HtGlobal::get('DEBUG')) {
			var_dump($allUserIdDecode);
			var_dump($allUserIdDecodeArr);
			var_dump($ACTIVITY_ARRAY);
			var_dump($_POST);
		}

		////		
		listUsers($ACTIVITY_ARRAY);
	}
	___close_div_(3);

	//if()
}
function listUsers(&$ACTIVITY_ARRAY)
{
	if (!isset($ACTIVITY_ARRAY['userId'])) {
		header('Location : ../index.php');
	}
	///
	$allItems = [
		'X' => ['X', 'X'],
		'car' => ['../images/uploads/icons/car_dark.svg', 'item_car'],
		'house' => ['../images/uploads/icons/house_dark.svg', 'item_house'],
		'computer' => ['../images/uploads/icons/computer_dark.svg', 'item_computer'],
		'electronic' => ['../images/uploads/icons/electronic_dark.svg', 'item_electronic'],
		'phone' => ['../images/uploads/icons/phone_dark.svg', 'item_phone'],
		'household' => ['../images/uploads/icons/household_dark.svg', 'item_household'],
		'other' => ['../images/uploads/icons/other_dark.svg', 'item_other'],
	];



	$userId = $ACTIVITY_ARRAY['userId'];
	/// get user information
	$user = new HtUserAll($userId);
	if (isset($ACTIVITY_ARRAY['function']) && $ACTIVITY_ARRAY['function'] == 'task' && isset($_POST) && $_POST['admin-task']) {
		$adminTask = $_POST['admin-task'];
		if ($adminTask != 'field_privilege-default') {
			if (strpos($adminTask, 'field_privilege-') !== false) {
				$privilege = str_replace('field_privilege-', '', $adminTask);
				$user->setFieldPrivilege($privilege);
				$user->updateCurrent();
				header("Refresh:0");
			}
		}
	}
	$result = $user->getResultSet();
	$result->data_seek(0);
	while ($row = $result->fetch_object()) {
		echo <<<EOD
	<div class="container-fluid" style="margin:20px; border-radius:5px; border:2px solid #1593c4; width:60%;padding:20px">
		<div class="row">
			<div class="col-md-12">
				<div class="row" style="text-align:left">
					<div class="col-md-6">
						<p>ACCOUNT INFORMATION </p>
						<p class="h4" style="border-bottom:1px solid #c7c7c7;">User id : <strong>$userId</strong></p>
						<p class="h4" style="border-bottom:1px solid #c7c7c7;">Username :<strong> $row->field_user_name</strong></p>
EOD;
		if (isset($privilege))
			$changed = '<span style="color:lightgreen;">(Updated)</span>';
		echo <<<EOD
						<p class="h4" style="border-bottom:1px solid #c7c7c7;">Privilege : <strong>$row->field_privilege</strong>$changed</p>
EOD;
		echo <<<EOD
						<p class="h4" style="border-bottom:1px solid #c7c7c7;">Real Name : <strong>$row->field_first_name $row->field_last_name</strong></p>
						<p class="h4" style="border-bottom:1px solid #c7c7c7;">Email : <strong>$row->field_email</strong></p>
						<p class="h4" style="border-bottom:1px solid #c7c7c7;">Phone : <strong>$row->field_phone_nr</strong></p>
						<p class="h4" style="border-bottom:1px solid #c7c7c7;">Member Since: <strong>$row->field_register_date</strong></p>
EOD;
		$status = [
			'active' => ['Active', " background-color:#c6e5ef;"],
			'pending' => ['Pending', " background-color:#f9daa0;"],
			'reported' => ['Reported', " background-color:#efb09c;"],
			'deleted' => ['Deleted', " background-color:#e6e6e6;"]
		];
		echo '<p class="h4" style="text-align:center;"><strong>User\'s Overview per Item </strong></p>';
		echo '<div class="grid-container" style="
			display: grid;
			grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
			grid-template-rows: 1fr 1fr 1fr 1fr 1fr;
			gap: 1px 1px;
			grid-template-areas: ". . . . . . . ." ". . . . . . . ." ". . . . . . . ." ". . . . . . . ." ". . . . . . . .";
		  ">
		  
		  ';
		foreach ($allItems as $key => $value) {
			if ($value[0] == 'X') {
				echo '<div style="padding:2px;text-align:center;"></div>';
			} else {
				echo '<div style="padding:2px;text-align:center;" data-toggle="tooltip" title="' . $key . '"><a href="../includes/template.item.php?type=' . $key . '"><img style="width:40px;" src="' . $value[0] . '"></a></div>';
			}
		}

		foreach ($status as $statusName => $statusArray) {
			echo '<div style="padding:5px;text-align:right;">' . $statusArray[0] . '</div>';
			foreach ($allItems as $itemName => $itemArray) {
				if ($itemArray[0] === 'X') {
					continue;
				}
				$totalNumber = getItemPerUser($itemArray[1], $userId, $statusName)[0];
				$totalNumber = ($totalNumber < 0) ? 0 : $totalNumber;
				if ($totalNumber == 0) {
					echo '<div style="padding:5px;text-align:center;">' . $totalNumber . '</div>';
				} else {
					$cryto = new Cryptor();
					$url = 'function=activity-table&type=' . $itemName . '&status=' . $statusName . '&allUserAdvancedUserId=' . $userId;
					$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);
					echo '<a href="../includes/admin.php?activityTableId=' . $urlEn . '"><div style="' . $statusArray[1] . ' padding:5px;border-radius:100px;text-align:center;data-toggle="tooltip" title="Total Number of item:' . $itemName . ' with status ' . $statusName . ' for user=' . $userId . '"><strong>' . $totalNumber . '</strong></div></a>';
				}
			}
			$totalNumber = 0;
		}
		$cryto = new Cryptor();
		$url = 'function=all-users&action=view&userId=' . $userId . '&function=task';
		$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);
		echo '</div>		
		</div>
		<div class="col-md-6" style=";padding:50px; border-left:1px solid #c7c7c7;">
		<form class="form-horizontal" action="../includes/admin.php?allUserId=' . $urlEn . '" method="post" enctype="multipart/form-data">
  		<div class="form-group row">
		<label for="select" class="col-4 col-form-label"></label> 
		<p class="h4" >Task</p>
		<p class="h5" >Choose here to trigger Adminstrative Task</p>
  		<div class="col-8">
		<select id="admin-task" name="admin-task" class="select form-control">';
		/// task to be performed on user
		$task = [
			0 => ["field_privilege-default" => "Choose task"],
			1 => ["field_privilege-webmaster" => "Update user privilege to Webmaster"],
			2 => ["field_privilege-administrator" => "Update user privilege to Administrator"],
			3 => ["field_privilege-moderator" => "Update user privilege to Moderator"],
			4 => ["field_privilege-user" => "Update user privilege to User"],
			5 => ["field_status-deactivate" => "Deactivate Account"],
			6 => ["field_status-erase" => "Close Account"],
		];
		///Array to hold hidden fields to from user_all userColumnArray 
		$hiddenFieldsArray = [];
		///Get current logged in User
		$loggedInUser = new HtUserAll($_SESSION['uID']);

		/*
		if ((int) $loggedInUser->getFieldRank() > (int) $user->getFieldRank()) {
			if ($loggedInUser->isWebMaster() || $loggedInUser->isAdmin()) {
				$hiddenFieldsArray = [];			
			} else if ($loggedInUser->isModerator()) {
				$hiddenFieldsArray = [1, 2, 3];
			} else if ($loggedInUser->isUser()) {
				$hiddenFieldsArray = $task;
			}
		} else if ((int) $loggedInUser->getFieldRank() == (int) $user->getFieldRank()) {
			$found = false;

			foreach ($task as $task_key => $task_value) {
				foreach ($task_value as $key => $value) {
					if (strpos($key, $user->getFieldPrivilege()) === false) {
						$found = true;
						$indexToRemove = $task_key + 1;
						break;
					}
				}
				if ($found) {
					break;
				}
			}
			$hiddenFieldsArray = [$indexToRemove];
		} else if ((int) $loggedInUser->getFieldRank() < (int) $user->getFieldRank()) {
			if ($loggedInUser->isWebMaster() || $loggedInUser->isAdmin()) {
				$hiddenFieldsArray = [];
			} else if ($loggedInUser->isModerator()) {
				$hiddenFieldsArray = [1, 2, 3];
			} else if ($loggedInUser->isUser()) {
				$hiddenFieldsArray = $task;
			}
		}*/

		///now remove those in hiddenFieldsArray from the userColumnArray	
		foreach ($hiddenFieldsArray as $key => $value) {
			unset($task[$value]);
		}

		foreach ($task as $task_key => $task_value) {
			foreach ($task_value as $key => $value) {
				echo '<option value="' . $key . '">' . $value . '</option>';
			}
		}
		echo '
  		</select>
  		</div>
  		</div> 
  		<div class="form-group row">
  		<div class="offset-4 col-8">
  		<button name="submit" type="submit" class="btn btn-primary">Submit</button>
  		</div>
  		</div>
		</form>
		</div>
		</div>
		</div>
		</div>
		</div>';
		//var_dump($loggedInUser->getFieldRank() . ' vs ' . $user->getFieldRank());
	}
}

function activityTable()
{
	global $lang_sw, $lang_url;
	///Get pointer to Cryptor class
	$cryto = new Cryptor();

	/// decode Url
	$actionIdDecode = $cryto->urldecode_base64_decode_decryptor($_GET['activityTableId']);
	/// extract content similar to $_GET action
	$actionIdDecodeArr = explode("&", $actionIdDecode);

	///prepare finalArray simlar to $_GET
	for ($i = 0; $i < count($actionIdDecodeArr); ++$i) {
		$keyValue = explode("=", $actionIdDecodeArr[$i]);
		$ACTIVITY_ARRAY[$keyValue[0]] = $keyValue[1];
	}
	if (HtGlobal::get('DEBUG')) {
		var_dump($actionIdDecode);
		var_dump($actionIdDecodeArr);
		var_dump($ACTIVITY_ARRAY);
	}

	___open_div_('container-fluid');
	if (!isset($ACTIVITY_ARRAY['allUserAdvancedUserId'])) {
		___open_div_('row', '" style="width:50%;');
		___open_div_('col-md-12', '" ');

		echo '<p class="h2">Item Management Table</p>';
		echo '<p class="h3">Click on number links to take adminstrative actions</p>';
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
			$totalReportedPerItem = getItemWithStatusReported($table_name)[0];
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
				foreach ($status2TotalArray as $status => $totalStatusSum) {
					$url = 'function=activity-table&type=' . $table_name_short . '&status=' . $status;
					$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);

					if ($totalStatusSum == 0) {
						echo '<td style="font-size:18px;">0</td>';
					} else {
						echo '<td style="font-size:18px;" ><a href="./admin.php?activityTableId=' . $urlEn . '">' . $totalStatusSum  . '</td>';
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
	}
	___open_div_('row', '" style="width:80%;');
	___open_div_('col-md-12');

	/**
	 * ACTION EXECUTIONS HERE
	 */
	if (isset($ACTIVITY_ARRAY['function']) && isset($ACTIVITY_ARRAY['type']) && isset($ACTIVITY_ARRAY['action'])) {
		$id = $ACTIVITY_ARRAY['id'];
		$item = $ACTIVITY_ARRAY['type'];
		$status = $ACTIVITY_ARRAY['status'];
		$action = $ACTIVITY_ARRAY['action'];
		$allUserAdvancedUserId = isset($ACTIVITY_ARRAY['allUserAdvancedUserId']) ? $ACTIVITY_ARRAY['allUserAdvancedUserId'] : 0;
		if ($action == 'reported') {
			/// take action on specific report type by removing from the list in field_report
			if ($allUserAdvancedUserId !== 0) {
			} else {
				$itemObject = ObjectPool::getInstance()->getObjectWithId($item, $id);
			}
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
			/// Update user status of item 
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
		header('Location: ./admin.php?activityTableId=' . $urlEn);
	}
	/**
	 * ACTION TRIGGERED HERE
	 */
	if (isset($ACTIVITY_ARRAY['function']) && isset($ACTIVITY_ARRAY['type']) && isset($ACTIVITY_ARRAY['status'])) {
		$item = $ACTIVITY_ARRAY['type'];
		$status = $ACTIVITY_ARRAY['status'];
		$allUserAdvancedUserId = isset($ACTIVITY_ARRAY['allUserAdvancedUserId']) ? (int) $ACTIVITY_ARRAY['allUserAdvancedUserId'] : 0;
		if ($allUserAdvancedUserId !== 0) {
			echo '<p class="h1">List of ' . $item . ' with status=' . $status . ' for UserId=' . $allUserAdvancedUserId . '</p>';
		} else {
			echo '<p class="h1">List of ' . $item . ' with status=' . $status . '</p>';
		}

		//main array to display for table below
		$itemRawDataToTable = [];
		// report is not a status hence speciall handling is required
		/// here search if an item have a field_report is set
		if ($status == 'reported') {
			if ($allUserAdvancedUserId !== 0) {
				$itemObject = ObjectPool::getInstance()->getObjectWithId($item);
				$itemObject->runQuery("WHERE field_report IS NOT NULL AND id_user = " . $allUserAdvancedUserId);
			} else {
				$itemObject = ObjectPool::getInstance()->getObjectWithId($item);
				$itemObject->runQuery("WHERE field_report IS NOT NULL");
			}
			$result = $itemObject->getResultSet();
			$result->data_seek(0);
			while ($row = $result->fetch_assoc()) {
				array_push($itemRawDataToTable, $row);
			}
		} else {
			if ($allUserAdvancedUserId !== 0) {
				$itemObject = ObjectPool::getInstance()->getObjectWithId($item);
				$itemObject->runQuery('WHERE id_user = ' . $allUserAdvancedUserId . ' AND field_status = "' . $status . '"');
			} else {
				$itemObject = ObjectPool::getInstance()->getObjectWithId($item, "*", $status);
			}
			//$itemObject = ObjectPool::getInstance()->getObjectWithId($item, "*", $status);
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
		echo '<thead><tr><th class="th-sm">	Action (Update user status)</th>';
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

						echo '<form style="display:inline-block;" id="myForm" action="./admin.php?activityTableId=' . $urlEn . '" method="post">';
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
					echo '<td><a href="./admin.php?activityTableId=' . $urlEn . '">';
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
								echo '<a href="./admin.php?activityTableId=' . $urlEn . '">Clear <strong>' . $allAbuse->getFieldName() . '</strong> Report</a><br>';
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
			echo '<p class="h1">SOMETHING IS BROKEN HERE DETAIL VIEW DOES NOT DISPLAY</p>';
			(new  HtMainView($item, $id, $status))->showOneItem();
		}
	}
}

function getSessionId()
{
	return $_SESSION['uID'];
}
