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
	
	echo "<div id=\"modnav\" ><ul class=\"menu\">";
	echo "<li><a ";
	if (activatetab() == 14)
	{
		echo "class=\"active\"";
	}
	echo "href=\"../content/userActive.php\"> ";
	echo "<span>Active(<span id=\"userActiveNumb\">$usersActiveItem</span>)</span></a></li>";
	echo "<li><a ";
	if (activatetab() == 15)
	{
		echo "class=\"active\"";
	}
	echo "href=\"../content/userPending.php\" >";
	echo "<span>Pending(<span id=\"userPendingNumb\">$usersPendingItem</span>)</span></a></li>";
	echo "<li><a ";
	if (activatetab() == 17)
	{
		echo "class=\"active\"";
	}
	echo "href=\"../main/upload.php\" ><span>Post Items</span></a></li>";
	if ($modTotal == 1 || $adminTotal == 1 || $webmasterTotal == 1)
	{
		echo "<li><a ";
		if (activatetab() == 11)
		{
			echo "class=\"active\"";
		}
		echo "href=\"../content/pendingItems.php\">";
		echo "<span>All Pending(<span id=\"pendingNumb\">$pendingItems</span>)</span></a></li>";
		echo "<li><a ";
		if (activatetab() == 12)
		{
			echo "class=\"active\"";
		}
		echo "href=\"../content/reportedItems.php\">";
		echo "<span>Reported(<span id=\"reportedNumb\">$reportedItems</span>)</span></a></li>";
		if($modTotal == 1 || $adminTotal == 1 || $webmasterTotal == 1)
		{
			echo "<li><a ";
			if (activatetab() == 16)
			{
				echo "class=\"active\"";
			}
			echo "href=\"../content/deletedItems.php\">";
			echo "<span>Deleted(<span id=\"deletedNumb\">$deletedItems</span>)</span></a></li>";
			echo "<li><a ";
			if (activatetab() == 13)
			{
				echo "class=\"active\" ";
			}
			echo "href=\"../content/userMessages.php\">";
			echo "<span>Messages(<span id=\"msgNumb\">$contactusMessage</span>)</span></a></li>";
			
			echo "<li><a href=\"../content/controlPanel.php?err=0\">";
			echo "<span>CONTROL PANEL</span></a></li>";
			echo "</li>";
		}			
	}
	echo "</ul></div>";
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
	$result = $connect->query("
			SELECT cID            FROM car	       WHERE $value cStatus  = '$status'
			UNION ALL SELECT hID  FROM house       WHERE $value hStatus  = '$status'
			UNION ALL SELECT dID  FROM computer    WHERE $value dStatus  = '$status'
			UNION ALL SELECT eID  FROM electronics WHERE $value eStatus  = '$status'
			UNION ALL SELECT pID  FROM phone       WHERE $value pStatus  = '$status'
			UNION ALL SELECT hhID FROM household   WHERE $value hhStatus = '$status'
			UNION ALL SELECT oID  FROM others      WHERE $value oStatus  = '$status'");

	return mysqli_num_rows($result);
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
