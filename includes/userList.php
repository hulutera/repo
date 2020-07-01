<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/cmn.content.php';
require_once $documnetRootPath . '/db/database.class.php';
require_once $documnetRootPath . '/includes/pagination.php';
require_once $documnetRootPath . '/includes/userStatus.php';

if (!isset($_SESSION['uID'])) {
	header('Location:' . $documnetRootPath . 'index.php');
}

$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
$search = (isset($_POST['searhVal'])) ? $_POST['searhVal'] : '';
$role = 'user';

function query($role, $start)
{

	$itemPerPage =  HtGlobal::get('itemPerPage');
	$cond2 = "WHERE uRole='$role' LIMIT $start, $itemPerPage";
	$table = "user";
	$filter = "*";
	$users = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
	return $users;
}

function searchResult($search)
{
	global $role;
	$connect = DatabaseClass::getInstance()->getConnection();

	$terms = $search;
	$clean = trim(preg_replace('/[^a-z0-9.@]/i', '', $terms));

	if (!empty($clean)) {
		$clauses = "`uEmail` LIKE '%" . $clean . "%'" .
			" OR `userName`      LIKE '%" . $clean . "%'" .
			" OR `uID`           LIKE '%" . $clean . "%'";
	}

	if (!empty($clauses)) {
		$filter = $clauses;
		$cond3 = "WHERE $filter";
		$table = "user";
		$filter = "*";
		$users = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond3);
		return $users;
	}
}
function displayALL()
{
	global $page, $role, $lang;
	$allUser = queryUser();
	$sum = mysqli_num_rows($allUser);
	$totpage = ceil($sum / HtGlobal::get('itemPerPage'));


	if ($page > $totpage)
		$page = $totpage;
	elseif ($page < 1)
		$page = 1;

	$start = HtGlobal::get('itemPerPage') * ($page - 1);
	//
	$result = query($role, $start);

	echo '<div style="float:none;width:100%"><h3><br><br>' . $lang['user list'] . '</h3></div>';
	display($result);

	return $totpage;
}

function userSearch()
{
	global $lang, $lang_url, $str_url;
	logoImage();
	echo '<div class="userSearch">';
	echo '<h3>' . $lang['user page'] . '</h3><br><br>';
	echo '<form name="search-user-form" class="" action="../includes/userList.php' . $lang_url . '" method="POST">';
	echo $lang['search user'] . ': <input name="searhVal" style="width:40%" class="" type="text" placeholder="' . $lang['e.g ID username email'] . '"/>';
	echo '<input type="submit" value="' . $lang['search-button'] . '" />';
	echo '</form>';
	echo '</div>';
	echo '<br>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
	<?php commonHeader(); ?>
</head>

<body>
	<div id="whole">
		<div id="wrapper">
			<div id="main_section">

				<div id="userListCol">
					<?php
					userSearch();
					if ($search == '') {
						$totpage = displayALL();
						pagination("", $totpage, $page, 0);
					} else {
						if (isset($search)) {
							$search = $search;
							$result = searchResult($search);
						}
						if (mysqli_num_rows($result)) {
							display($result);
						} else {
							global $lang;
							echo $search . $lang['no users found'];
							$totpage = displayALL();
							pagination("", $totpage, $page, 0);
						}
					}
					?>

				</div>
			</div>
		</div>
		<div class="push"></div>
	</div>
</body>

</html>