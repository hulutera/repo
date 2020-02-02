<?php
function accountLinks()
{
	$uId = getSessionId();
	// calculate Contact us messages
	$contactusMessage = queryContactUs();

	//calculate all items pending for moderator
	$pendingItems = queryStatus(0,"pending");

	//calculate all items pending for moderator
	$deletedItems = queryStatus(0,"modDelete");

	//calculate all items reported for moderator
	$reportedItems = queryReported();

	//calculate users active items
	$usersActiveItem = queryStatus($uId,"active");

	//calculate users pending items
	$usersPendingItem = queryStatus($uId,"pending");

	//calculate users unread messages
	$usersUnreadMessages = queryMsgs($uId,"unread");
	
	//calculate number of moderator	
	$result = queryUserWithTypeWithIDAndType($uId,"mod");
	$modTotal = mysqli_num_rows($result);

	//calculate number of admin
	$result = queryUserWithTypeWithIDAndType($uId,"admin");
	$adminTotal = mysqli_num_rows($result);
	
	$result = queryUserWithTypeWithIDAndType($uId,"webmaster");
	$webmasterTotal = mysqli_num_rows($result);
	
	echo "<div id=\"modnav\" ><div class=\"item-list-by-status\">";
	echo "<a ";
	if (activatetab() == 14)
	{
		echo "class=\"active\"";
	}
	echo "href=\"../includes/userActive.php\"> ";
	echo "<div class='item-list'>";
	echo "<span>Active(<span id=\"userActiveNumb\">$usersActiveItem</span>)</span></div></a>";
	echo "<a ";
	if (activatetab() == 15)
	{
		echo "class=\"active\"";
	}
	echo "href=\"../includes/userPending.php\" >";
	echo "<div class='item-list'>";
	echo "<span>Pending(<span id=\"userPendingNumb\">$usersPendingItem</span>)</span></div></a>";
	echo "<a ";
	if (activatetab() == 17)
	{
		echo "class=\"active\"";
	}
	echo "href=\"../includes/upload.php\" >";
	echo "<div class='item-list'>";
	echo "<span>Post Items</span></div></a>";
	echo "</div>";

	if ($modTotal == 1 || $adminTotal == 1 || $webmasterTotal == 1)
	{
		echo "<div class=\"item-list-by-status-admin\">";
		echo "<a ";
		if (activatetab() == 11)
		{
			echo "class=\"active\"";
		}
		echo "href=\"../includes/pendingItems.php\">";
		echo "<div class='item-list'>";
		echo "<span>All Pending(<span id=\"pendingNumb\">$pendingItems</span>)</span></div></a>";
		echo "<a ";
		if (activatetab() == 12)
		{
			echo "class=\"active\"";
		}
		echo "href=\"../includes/reportedItems.php\">";
		echo "<div class='item-list'>";
		echo "<span>Reported(<span id=\"reportedNumb\">$reportedItems</span>)</span></div></a>";
		if($modTotal == 1 || $adminTotal == 1 || $webmasterTotal == 1)
		{
			if($adminTotal == 1 || $webmasterTotal == 1) {
				echo "<a ";
				if (activatetab() == 16)
				{
					echo "class=\"active\"";
				}
				echo "href=\"../includes/deletedItems.php\">";
				echo "<div class='item-list'>";
				echo "<span>Deleted(<span id=\"deletedNumb\">$deletedItems</span>)</span></div></a>";
			}
			echo "<a ";
			if (activatetab() == 13)
			{
				echo "class=\"active\" ";
			}
			echo "href=\"../includes/userMessages.php\">";
			echo "<div class='item-list'>";
			echo "<span>Messages(<span id=\"msgNumb\">$contactusMessage</span>)</span></div></a>";
			
			echo "<a class='item-list-cp' href=\"../includes/controlPanel.php?err=0\">";
			echo "<div class='item-list-cp'>";
			echo "<span>CONTROL PANEL</span></div></a>";
			echo "</div>";
		}			
	}
	echo "</div>";
}
function queryStatus($uId, $status)
{
	$connect = DatabaseClass::getInstance()->getConnection();

	if($uId)
	{
		$value = "uID = ".$uId." AND";
	}
	else
	{
		$value = "";
	}
	$sum = 0;
	$itemsId = array("cID", "hID", "dID", "eID", "pID", "hhID", "oID");
	$tablesName = array("car", "house", "computer", "electronics", "phone", "household", "others");
	$itemStatus = array("cStatus", "hStatus", "dStatus", "eStatus", "pStatus", "hhStatus", "oStatus");
	
	for ($i=0; $i<=6; $i++){
		$qr = $connect->query("SELECT $itemsId[$i] FROM $tablesName[$i] WHERE $value $itemStatus[$i]  = '$status'");
		$sum_item = mysqli_num_rows($qr);
        $sum += $sum_item;		
	}
	return ($sum);
}
function queryContactUs()
{
	$connect = DatabaseClass::getInstance()->getConnection();
	$result = $connect->query("SELECT * FROM contactus");
	return mysqli_num_rows($result);
}
function queryReported()
{
	$connect = DatabaseClass::getInstance()->getConnection();
	$result  = $connect->query("SELECT abuseID FROM abuse ");
	return mysqli_num_rows($result);
}
function queryMsgs($uId,$msgTyp)
{
	$connect = DatabaseClass::getInstance()->getConnection();$result = $connect->query("SELECT uID FROM messages WHERE receiver = $uId AND status='$msgTyp' ");
	return mysqli_num_rows($result);
}
function queryUserWithTypeWithIDAndType($uId,$userTyp)
{
	$connect = DatabaseClass::getInstance()->getConnection();
	$result = $connect->query(" SELECT * FROM user WHERE uID = $uId AND uRole='$userTyp'");
	return $result;
}
function queryUsersExceptIdButType($uId,$userTyp)
{
	$connect = DatabaseClass::getInstance()->getConnection();
	$result = $connect->query(" SELECT * FROM user WHERE uID != '$uId' AND uRole='$userTyp'");
	return $result;
}
function queryUserWithType($userTyp)
{
	$connect = DatabaseClass::getInstance()->getConnection();
	$result = $connect->query(" SELECT * FROM user WHERE uRole='$userTyp'");
	return $result;
}
function queryUserWithId($uId)
{
	$connect = DatabaseClass::getInstance()->getConnection();
	$result = $connect->query(" SELECT * FROM user WHERE uID = '$uId'");
	return $result;
}
function queryUserWithNotIdButType($uId,$userTyp)
{
	$connect = DatabaseClass::getInstance()->getConnection();
	$result = $connect->query(" SELECT * FROM user WHERE uID != '$uId' AND uRole='$userTyp'");
	return $result;
}
function queryUser()
{
	$connect = DatabaseClass::getInstance()->getConnection();
	$result = $connect->query(" SELECT * FROM user");
	return $result;
}
function found($role)
{
	$roleList = array(4=>'webmaster',3=>'admin',2=>'mod',1=>'user');
	return array_search($role,$roleList);
}
function userAccount()
{
	echo '<p>';
	echo '<label for="username">User name</label> <input id="username"';
	echo 'name="username" />';
	echo '</p>';
	echo '<p>';
	echo '<label for="username">Full Name </label> <input id="username"';
	echo 'name="username" />';
	echo '</p>';
	echo '<p>';
	echo '<label for="email">Email</label> <input id="email" name="email"';
	echo 'placeholder="info@hulutera.com" type="email"';
	echo 'AUTOCOMPLETE=OFF />';
	echo '</p>';
	echo '<p>';
	echo '<label for="password">Password</label> <input id="password"';
	echo 'name="password" type="password" AUTOCOMPLETE=OFF />';
	echo '</p>';
	echo '<p>';
	echo '<label for="password">Repeat-Password</label> <input';
	echo 'id="passwordrepeat" name="passwordrepeat" type="password"';
	echo 'AUTOCOMPLETE=OFF />';
	echo '</p>';
	echo '<p>';
	echo '<label for="username">Telephone</label> <input id="username"';
	echo 'name="username" />';
	echo '</p>';
}
?>
