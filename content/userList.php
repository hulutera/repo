<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/cmn/cmn.content.php';
require_once $documnetRootPath.'/db/database.class.php';
require_once $documnetRootPath.'/helper/pagination.php';
require_once $documnetRootPath.'/inc/userStatus.php';

if(!isset($_SESSION['uID']) ){
	header('Location:'. $documnetRootPath.'index.php');
}

$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
$search = (isset($_GET['searhVal'])) ? $_GET['searhVal'] : '';
$role = 'user';

function query($role,$start)
{
	global $connect,$MAX;
	$MAXUsers = $connect->query("SELECT * FROM user WHERE uRole='$role' LIMIT $start,$MAX ");
	return $MAXUsers;
}

function searchResult($search)
{
	global $role,$connect,$MAX;
	$terms=explode(',',$search);
	$clauses=array();
	foreach($terms as $term)
	{
		$clean=trim(preg_replace('/[^a-z0-9]/i', '', $term));
		if (!empty($clean))
		{
			$clauses[]="`uEmail` like '%".$clean."%'".
			" OR `userName`      like '%".$clean."%'".
			" OR `uFirstName`    like '%".$clean."%'".
			" OR `uLastName`     like '%".$clean."%'".
			" OR `uAddress`      like '%".$clean."%'".
			" OR `uDate`         like '%".$clean."%'".
			" OR `uID`           like '%".$clean."%'";
		}
	}
	
	if (!empty($clauses))
	{
		$filter='('.implode(' AND ', $clauses).')';

		$MAXUsers = $connect->query("SELECT * FROM `user` WHERE `uRole`='$role' AND $filter");
			
		return $MAXUsers;
	}	
}
function displayALL()
{
	global $MAX,$page,$role;
	$allUser = queryUser();
	$sum = mysqli_num_rows($allUser);
	$totpage = ceil($sum/$MAX);


	if($page > $totpage )
		$page = $totpage;
	elseif($page < 1)
	$page = 1;

	$start = $MAX * ($page -1);
	//
	$result = query($role,$start,$MAX);

	display($result);

	return $totpage;
}

function userSearch()
{
	echo '<h3>USERS LIST | የደንበኞች ዝርዝር</h3><br>';
	echo'<div class="userSearch">';
	echo'<form class="" action="../content/userList.php" method="GET">';
	echo'<input name="searhVal" class="" type="text" placeholder="e.g. ID, username, email"/>';
	echo'<input type="submit" value="Search ፈልግ" />';
	echo '<a href="../content/controlPanel.php">&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCONTROL PANEL</a>';
	echo'</form>';
	echo'</div>';
	echo '<br>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">
<?php commonHeader();?>
</head>
<body>
	<div id="whole">
		<div id="wrapper">
			<div id="main_section">

				<div id="userListCol">
					<?php 
					userSearch();
					if($search == '')
					{
						$totpage = displayALL();
						pagination($totpage,$page,0);
}
else {
if(isset($search))
	$search = $search;
$result = searchResult($search);
if(mysqli_num_rows($result))
{
display($result);
}
else {

echo $search.'<br>No user found with this information!<br>በገባው መረጃ  ደንበኛ አልተገኘም።';
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
