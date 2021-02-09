<?php
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/sendMessage.php';
require_once $documnetRootPath . '/classes/objectPool.php';
require_once $documnetRootPath . '/view/HtCommonView.php';

if (isset($_GET['id']) && isset($_GET['type']) && isset($_GET['action']) && isset($_GET['action_on_item'])) {
	$ACTIVITY_ARRAY = [];
	$ACTIVITY_ARRAY = array(
		"id" => $_GET['id'],
		"type" => $_GET['type'],
		"action" => $_GET['action'],
		"url" => $_GET['url']
	);
	action_on_item($ACTIVITY_ARRAY);
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

function accountLinks()
{
	global $lang, $lang_url, $str_url;
	$uId = getSessionId();

	//calculate users active items
	$usersActiveItem = countRow("active", $uId);

	//calculate users pending items
	$usersPendingItem = countRow("pending", $uId);

	$url = '../includes/template.content.php' . $lang_url . '&status';
	if (isset($_SESSION['uID'])) {
		$id = $_SESSION['uID'];
		echo "<div id=\"modnav\" ><div class=\"item-list-by-status\">";
		echo "<a   ";
		echo 'href="' . $url . '=active&id=' . $id . '"> ';
		echo "<div class='item-list'>";
		echo "<span>" . $lang['active'] . "(<span id=\"userActiveNumb\">$usersActiveItem</span>)</span></div></a>";

		echo "<a   ";
		echo 'href="' . $url . '=pending&id=' . $id . '"> ';
		echo "<div class='item-list'>";
		echo "<span>" . $lang['pending'] . "(<span id=\"userPendingNumb\">$usersPendingItem</span>)</span></div></a>";
		echo "<a   ";
		echo 'href="../includes/upload.php' . $lang_url . '" >';
		echo "<div class='item-list'>";
		echo "<span>" . $lang['Post Items'] . "</span></div></a>";
		echo "</div>";
	}
	echo "</div>";
}

function userContent()
{
	if (!isset($_GET['status']) || !isset($_GET['id'])) {
		header('Location: ../index.php');
	}

	accountLinks();
	$status = $_GET['status'];
	$id = $_GET['id'];
	$id  = (isset($id)) ? $id : '';
	$sum = countRow($status, $id);
	if ($sum >= 1) {
		$itemPerPage = $GLOBALS['general']['itemPerPage'];
		$totpage = ceil($sum / $itemPerPage);
		$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
		if ($page > $totpage)
			$page = $totpage;
		elseif ($page < 1)
			$page = 1;

		$itemstart = $GLOBALS['general']['itemPerPage'] * ($page - 1);

		$result = maxQuery($status, $id, $itemstart);

		$tableType2item = [
			1 => 'car',
			2 => 'house',
			3 => 'computer',
			4 => 'phone',
			5 => 'electronic',
			6 => 'household',
			7 => 'other'
		];
		//echo '<div class="row items-board">';
		/*START @ widget */
		echo '<div class="widget-content properties-grid">';
		/*START @ row*/
		echo '<div class="row items-board" >';
		$item_order = 0;
		foreach ($result as $key => $value) {
			# code...
			$item_order++;
			$id = (int)$value['id'];
			$itemName = $tableType2item[(int)$value['field_table_type']];
			$view = (new HtMainView($itemName, $id, $status));
			$view->showOneItem($item_order);
		}
		echo '</div>';
		echo '</div>';

		pagination('userActive', $totpage, $page);
	} elseif ($sum <= 0) {
		echo '<div id="spanMainColumnXRemove" class="jumbotron divItemNotFind">';
		echo '<div id="spanMainColumnXRemove" style="color: red">';
		echo $GLOBALS['general']['noItemToShow'];
		echo '</div></div>';
	}
	echo '<script type="text/javascript">$(document).ready(function (){$(".userActiveButton").show();});</script>';
}

function allUsers()
{
	/// no session route to index.php
	if (!isset($_SESSION['uID'])) {
		header('Location: ../index.php');
	}

	___open_div_('container-fluid');
	___open_div_('row col-xs-12 col-md-12', '');
	___open_div_('col-xs-12 col-md-12', '" ');
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

	/// get all Users here
	$allUsers = new HtUserAll('*');
	$result = $allUsers->getResultSet();
	$result->data_seek(0);
	$loggedInUser = new HtUserAll($_SESSION['uID']);
	while ($row = $result->fetch_assoc()) {
		$localUser = new HtUserAll($row['id']);
		if ($localUser->isWebMaster() && !$loggedInUser->isWebMaster()) {
			continue;
		}

		echo '<tr style="background-color: #5be61c36;">';
		$url = 'function=all-users&action=view&userId=' . $row['id'];
		$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);
		echo '<td><a   href="./admin.php?allUserId=' . $urlEn . '">';
		echo '<button style="font-style: italic;" class="btn btn-rounded btn-sm btn-primary btn-block">View User#' . $row['id'] . '</button></a></td>';

		foreach ($row as $key => $value) {
			if (in_array($key, array_values($userColumnArray))) {
				echo '<td>' . $value . '</td>';
			}
		}
		echo '</tr>';
	}

	/// fetch temp users
	$allUsers = new HtUserTemp('*');
	$result = $allUsers->getResultSet();
	$result->data_seek(0);
	while ($row = $result->fetch_assoc()) {
		echo '<tr style="background-color: #ffa50075;">';
		$url = 'function=all-users&action=view&table=user_temp&userId=' . $row['id'];
		$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);
		echo '<td><a   href="./admin.php?allUserId=' . $urlEn . '">';
		echo '<button style="font-style: italic;" class="btn btn-rounded btn-sm btn-primary btn-block">View User#' . $row['id'] . '</button></a></td>';

		foreach ($row as $key => $value) {
			if (in_array($key, array_values($userColumnArray))) {
				echo '<td>' . $value . '</td>';
			}
		}
		echo '<td></td>';
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

		listUsers($ACTIVITY_ARRAY);
	}
	___close_div_(3);
}
function listUsers(&$ACTIVITY_ARRAY)
{
	if (!isset($ACTIVITY_ARRAY['userId'])) {
		header('Location : ../index.php');
	}
	///
	$allItems = [
		'X' => ['X', 'X'],
		'car' => ['../images/icons/items/car_dark.svg', 'item_car'],
		'house' => ['../images/icons/items/house_dark.svg', 'item_house'],
		'computer' => ['../images/icons/items/computer_dark.svg', 'item_computer'],
		'electronic' => ['../images/icons/items/electronic_dark.svg', 'item_electronic'],
		'phone' => ['../images/icons/items/phone_dark.svg', 'item_phone'],
		'household' => ['../images/icons/items/household_dark.svg', 'item_household'],
		'other' => ['../images/icons/items/other_dark.svg', 'item_other'],
	];

	$userId = $ACTIVITY_ARRAY['userId'];
	if (isset($ACTIVITY_ARRAY['table']) && ($ACTIVITY_ARRAY['table'] == 'user_temp')) {
		$user = new HtUserTemp($userId);
	} else {
		$user = new HtUserAll($userId);
	}
	if (isset($ACTIVITY_ARRAY['function']) && $ACTIVITY_ARRAY['function'] == 'task' && isset($_POST) && $_POST['admin-task']) {
		$adminTask = $_POST['admin-task'];
		if ($adminTask != 'field_privilege-default') {
			///Part 1. Change user privilege
			if (strpos($adminTask, 'field_privilege-') !== false) {
				$privilege = str_replace('field_privilege-', '', $adminTask);
				$user->setFieldPrivilege($privilege);
				$user->updateCurrent();
				header("Refresh:0");
			}
			/// Part 2: deactivate or activate user
			if (strpos($adminTask, 'field_status-') !== false) {
				$accountStatus = str_replace('field_status-', '', $adminTask);
				if ($accountStatus != 'erase') {
					if ($accountStatus == 'activate') {
						$changeStatusOfUser = 'active';
						$changeStatusOfItem = 'active';
					} else if ($accountStatus == 'deactivate') {
						$changeStatusOfUser = 'inactive';
						$changeStatusOfItem = 'pending';
					}

					/// step 1: fetch the user from user_all::field_account_status and change account status
					if (isset($ACTIVITY_ARRAY['table']) && ($ACTIVITY_ARRAY['table'] == 'user_temp')) {
						/// we are copying from user_temp to user_all
						$userTemp = new HtUserTemp((int) $userId);
						$userAll = new HtUserAll();
						$userAll->setFieldValues($userTemp);
						$userAll->setFieldAccountStatus($changeStatusOfUser);
						$userAll->insert();
						$ACTIVITY_ARRAY['table'] = '';
						header('Location: ' . $_SERVER['REQUEST_URI']);
					} else {
						$user = new HtUserAll($userId);
						$user->setFieldAccountStatus($changeStatusOfUser);
						$user->updateCurrent();
					}

					/// step 2: fetch items with userId and set item tables field_status pending
					$userId = (int) $ACTIVITY_ARRAY['userId'];
					foreach ($allItems as $itemName => $value) {
						if ($itemName !== 'X') {
							//fetch that specific user and get all element
							$itemObject = ObjectPool::getInstance()->getObjectWithId($itemName);
							$itemObject->runQuery("WHERE id_user = " . $userId);
							$result = $itemObject->getResultSet();
							$result->data_seek(0);
							while ($row = $result->fetch_object()) {
								///get the specific item and setFieldStatus to pending
								$localObject = ObjectPool::getInstance()->getObjectWithId($itemName, $row->id);
								$localObject->setFieldStatus($changeStatusOfItem);
								$localObject->updateCurrent();
							}
						}
					}
					/// step 3: send notification to user
					if (DBHOST == 'localhost') {
						///send mail to user
						$subject = $GLOBALS['user_specific_array']['message']['account-deactivation']['subject'];
						$body = $GLOBALS['user_specific_array']['message']['account-deactivation']['body'][0] . "<br><br>";

						send_mail($user->getFieldEmail(), $subject, $body, 'From:admin@hulutera.com');
					}
					header("Refresh:0");
				} else if ($accountStatus == 'erase') { //close account
					/// step 1: remove account and all connected links to this user
					$user = new HtUserAll($userId);
					$user->delete($userId);

					/// step 2: fetch the user's uploaded folders per item and remove the folder(and contents)
					foreach ($allItems as $itemName => $value) {
						if ($itemName !== 'X') {
							global $documnetRootPath;
							$folderName = $documnetRootPath . '/upload/item_' . $itemName . '/user_id_' . $userId;
							if (is_dir($folderName)) {
								rmdir($folderName);
							}
						}
					}

					/// step 3: send a notification to user
					if (DBHOST == 'localhost') {
						///send mail to user
						$subject = $GLOBALS['user_specific_array']['message']['account-closed']['subject'];
						$body = $GLOBALS['user_specific_array']['message']['account-closed']['body'][0] . "<br><br>";

						/// temporary disable for message sending
						send_mail($user->getFieldEmail(), $subject, $body, 'From:admin@hulutera.com');
					}
					header("Refresh:0");
				}
			}
		}
		header("Refresh:0");
	}
	$result = $user->getResultSet();
	$result->data_seek(0);
	while ($row = $result->fetch_object()) {
		echo '<div class="container-fluid" style="margin:20px; border-radius:5px; border:2px solid #1593c4; width:60%;padding:20px">
        <div class="row">
            <div class="col-md-12">
                <div class="row" style="text-align:left">
                    <div class="col-md-6">
                        <p>ACCOUNT INFORMATION </p>
                        <p class="h4" style="border-bottom:1px solid #c7c7c7;">User id :     <strong>' . $userId . '</strong></p>
                        <p class="h4" style="border-bottom:1px solid #c7c7c7;">Username :    <strong>' . $row->field_user_name . '</strong></p>
';
		$changed = "";
		if (isset($privilege))
			$changed = '<span style="color:lightgreen;">(Updated)</span>';
		echo '<p class="h4" style="border-bottom:1px solid #c7c7c7;">Privilege :     <strong>' . $row->field_privilege . '</strong>' . $changed . '</p>';
		echo '<p class="h4" style="border-bottom:1px solid #c7c7c7;">Real Name :     <strong>' . $row->field_first_name . ' ' . $row->field_last_name . '</strong></p>
              <p class="h4" style="border-bottom:1px solid #c7c7c7;">Email :     <strong>' . $row->field_email . '</strong></p>
              <p class="h4" style="border-bottom:1px solid #c7c7c7;">Phone :     <strong>' . $row->field_phone_nr . '</strong></p>
              <p class="h4" style="border-bottom:1px solid #c7c7c7;">Member Since:     <strong>' . $row->field_register_date . '</strong></p>';
		if ($row->field_account_status === 'active') {
			$style = ' style = "color:green;"';
		} else if ($row->field_account_status === 'inactive') {
			$style = ' style = "color:#c7c7c7;"';
		}
		echo '<p class="h4" style="border-bottom:1px solid #c7c7c7;">Account Status: <strong ' . $style . '>' . $row->field_account_status . '</strong></p>';
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
				echo '<div style="padding:2px;text-align:center;" data-toggle="tooltip" title="' . $key . '"><a   href="../includes/template.item.php?type=' . $key . '"><img style="width:40px;" src="' . $value[0] . '"></a></div>';
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
					echo '<a   href="../includes/admin.php?activityTableId=' . $urlEn . '"><div style="' . $statusArray[1] . ' padding:5px;border-radius:100px;text-align:center;data-toggle="tooltip" title="Total Number of item:' . $itemName . ' with status ' . $statusName . ' for user=' . $userId . '"><strong>' . $totalNumber . '</strong></div></a>';
				}
			}
			$totalNumber = 0;
		}
		$tableUserTemp = "";
		if (isset($ACTIVITY_ARRAY['table']) && ($ACTIVITY_ARRAY['table'] == 'user_temp')) {
			$tableUserTemp = '&table=user_temp';
		}
		$cryto = new Cryptor();
		$url = 'function=all-users&action=view&userId=' . $userId . '&function=task' . $tableUserTemp;
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
			5 => ["field_status-activate" => "Activate user account"],
			6 => ["field_status-deactivate" => "Deactivate user account"],
			7 => ["field_status-erase" => "Close user account and delete data"],
		];
		///Array to hold hidden fields to from user_all userColumnArray
		$hiddenFieldsArray = [];

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
          <button name="submit" type="submit" onclick="return ask()" class="btn btn-primary">Submit</button>
          </div>
          </div>
		</form>
        </div>
        </div>
        </div>
        </div>
        </div>';
	}
}

function adminWelcomePage()
{
	$sId = getSessionId();
	$currentUser = new HtUserAll($sId);
	$result = $currentUser->getResultSet();
	$result->data_seek(0);
	if ($currentUser->isUser()) {
		header('Location: ../includes/mypage.php?lan=en');
	} else {
		echo '<p class="h1">Welcome! Please take action on the left, (under construction)</p>';
	}
}

function activityTable()
{
	global $lang_sw, $lang_url;
	///Get pointer to Cryptor class
	$cryto = new Cryptor();

	/// decode Url
	$actionId = isset($_GET['activityTableId']) ? $_GET['activityTableId'] : "";
	if ($actionId != "") {
		$actionIdDecode = $cryto->urldecode_base64_decode_decryptor($actionId);
		/// extract content similar to $_GET action
		$actionIdDecodeArr = explode("&", $actionIdDecode);
	} else {
		$actionIdDecodeArr = [];
	}

	///prepare finalArray simlar to $_GET
	for ($i = 0; $i < count($actionIdDecodeArr); ++$i) {
		$keyValue = explode("=", $actionIdDecodeArr[$i]);
		$ACTIVITY_ARRAY[$keyValue[0]] = $keyValue[1];
	}

	___open_div_('container-fluid');
	if (!isset($ACTIVITY_ARRAY['allUserAdvancedUserId'])) {
		___open_div_('row col-xs-12 col-md-12', '');
		___open_div_('col-xs-12 col-md-12', '');

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
		___open_div_('row col-md-12', '');
		___open_div_('col-xs-12 col-md-12');

		echo '<table class="table">
          <thead>
          <tr><th scope="col">Items</th>';
		foreach ($activities  as $key => $value) {
			echo '<th scope="col" class="' . $value['style']['text'] . '">' . strtoupper($key) . '</th>'; //<i class="' . $value['style']['fas fa-exclamation'] . '"></i>
		}
		echo '</tr></thead><tbody id="activity-table">';

		$totalItem  = $totalActivePerItem = $totalPendingPerItem = $totalReportedPerItem = $totalDeletedPerItem = 0;
		$grandTotal = $totalActive  = $totalPending = $totalReported =    $totalDeleted = 0;


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
						echo '<td style="font-size:18px;" ><a   href="./admin.php?activityTableId=' . $urlEn . '">' . $totalStatusSum  . '</td>';
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
	___open_div_('row', '');
	___open_div_('col-xs-12 col-md-12');


	if (isset($ACTIVITY_ARRAY['function']) && isset($ACTIVITY_ARRAY['type']) && isset($ACTIVITY_ARRAY['action'])) {

		action_on_item($ACTIVITY_ARRAY);

		/// To activity table
		$item = $ACTIVITY_ARRAY['type'];
		$status = $ACTIVITY_ARRAY['status'];

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
			$result = $itemObject->getResultSet();
			$result->data_seek(0);
			while ($row = $result->fetch_assoc()) {
				array_push($itemRawDataToTable, $row);
			}
		}

		/// use the first row for the table header
		/// $itemRawDataToTable[0];

		/// start : table header
		___open_div_('col-md-12');
		echo '<table id="dtBasicExample" class="horizontal-scroll-except-first-column table table-striped table-bordered table-sm" cellspacing="0" width="100%">';
		echo '<thead><tr><th class="th-sm">    Action (Update user status)</th>';
		if (sizeof($itemRawDataToTable) > 0) {
			foreach ($itemRawDataToTable[0] as $k1 => $v1) {
				$k11 = explode("_", $k1);
				$final = "";
				foreach ($k11 as $k111 => $v111) {
					$final .= $v111[0][0];
				}
				echo '<th class="th-sm" title="' . $k1 . '">' . strtoupper($k1) . '</th>';
			}
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
			'destroy' => [ // action to be taken
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
			'destroy'  => $allActionButtons,
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
							. '"' . $disabled .    ' id="' . $v2 . '_' . $k1 . '">' . $value[0] . '</button>';
						echo '</form>';
					}
					echo '</span></td>';
					$displayActionButtonOnce = false;
				}

				if ($j == 0) {
					/// To display Item on Id
					$url = 'function=activity-table&type=' . $item . '&id=' . $itemId . '&status=' . $status;
					$urlEn  = $cryto->urlencode_base64_encode_encryptor($url);
					echo '<td><a   href="./admin.php?activityTableId=' . $urlEn . '">';
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
								echo '<a   href="./admin.php?activityTableId=' . $urlEn . '">Clear <strong>' . $allAbuse->getFieldName() . '</strong> Report</a><br>';
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
	echo '<div class="row items-board">';
	if (isset($function) && isset($id) && isset($status)) {
		echo '<p class="h1">' . $item . '#' . $id . '</p>';
		if ($status == 'reported') {
			(new  HtMainView($item, $id, null))->showOneItem();
		} else {
			(new  HtMainView($item, $id, $status))->showOneItem();
		}
	}
	echo '</div>';
}

function getSessionId()
{
	if (isset($_SESSION['uID'])) {
		return $_SESSION['uID'];
	}
}

/**
 * ACTION EXECUTIONS HERE
 */
function action_on_item($ACTIVITY_ARRAY)
{
	if (isset($ACTIVITY_ARRAY['id']) && isset($ACTIVITY_ARRAY['type']) && isset($ACTIVITY_ARRAY['action'])) {
		$id = $ACTIVITY_ARRAY['id'];
		$item = $ACTIVITY_ARRAY['type'];
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
			$object2 = ObjectPool::getInstance()->getObjectWithId("latest");
			$object2->setFieldValues($id, $item);
			if ($action == 'destroy') {
				///here permanent damage, data unrecoverable!!
				$object->delete($id);
				$object2->delete();
				$commonViewObj = new HtCommonView($item);
				$imageDir = $commonViewObj->getImageDir($object);
				removeImageDir($imageDir);
				$url = $ACTIVITY_ARRAY['url'];
				header('Location:' . $url);
			} else {
				///set new status and update table
				$object->setFieldStatus("$action");
				$object->updateCurrent();
				if ($action == "active") {
					$object2->insert();
				} else if ($action == "pending" or $action == "deleted") {
					$object2->delete();
					$url = $ACTIVITY_ARRAY['url'];
					header('Location:' . $url);
				}
			}
		}
	}
}

function removeImageDir($str)
{
	if (is_file($str)) {
		return @unlink($str);
	} elseif (is_dir($str)) {
		$scan = glob(rtrim($str, '/') . '/*');
		foreach ($scan as $index => $path) {
			removeImageDir($path);
		}
		return @rmdir($str);
	}
}
