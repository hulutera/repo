<?php
function accountLinks()
{
	global $lang, $lang_url, $str_url;
	$uId = getSessionId();
	// calculate Contact us messages
	$contactusMessage = queryContactUs();

	//calculate all items pending for moderator
	$pendingItems = countRow("pending", "*");

	//calculate all items pending for moderator
	$deletedItems = countRow("modDelete", "*");

	//calculate all items reported for moderator
	$reportedItems = queryReported();

	//calculate users active items
	$usersActiveItem = countRow("active", $uId);

	//calculate users pending items
	$usersPendingItem = countRow("pending", $uId);

	//calculate users unread messages
	$usersUnreadMessages = queryMsgs($uId, "unread");

	//calculate number of moderator
	$result = queryUserWithTypeWithIDAndType($uId, "mod");
	$modTotal = mysqli_num_rows($result);

	//calculate number of admin
	$result = queryUserWithTypeWithIDAndType($uId, "admin");
	$adminTotal = mysqli_num_rows($result);

	$result = queryUserWithTypeWithIDAndType($uId, "webmaster");
	$webmasterTotal = mysqli_num_rows($result);

	echo "<div id=\"modnav\" ><div class=\"item-list-by-status\">";
	echo "<a ";
	echo 'href="../includes/userActive.php' . $lang_url . '"> ';
	echo "<div class='item-list'>";
	echo "<span>" . $lang['active'] . "(<span id=\"userActiveNumb\">$usersActiveItem</span>)</span></div></a>";

	echo "<a ";
	echo 'href="../includes/userPending.php' . $lang_url . '" >';
	echo "<div class='item-list'>";
	echo "<span>" . $lang['pending'] . "(<span id=\"userPendingNumb\">$usersPendingItem</span>)</span></div></a>";
	echo "<a ";
	echo 'href="../includes/upload.php' . $lang_url . '" >';
	echo "<div class='item-list'>";
	echo "<span>" . $lang['Post Items'] . "</span></div></a>";
	echo "</div>";

	if ($modTotal == 1 || $adminTotal == 1 || $webmasterTotal == 1) {
		echo "<div class=\"item-list-by-status-admin\">";
		echo "<a ";
		if (activatetab() == 11) {
			echo "class=\"active\"";
		}
		echo 'href="../includes/pendingItems.php' . $lang_url . '">';
		echo "<div class='item-list'>";
		echo "<span>" . $lang['all pending'] . "(<span id=\"pendingNumb\">$pendingItems</span>)</span></div></a>";
		echo "<a ";
		if (activatetab() == 12) {
			echo "class=\"active\"";
		}
		echo 'href="../includes/reportedItems.php' . $lang_url . '">';
		echo "<div class='item-list'>";
		echo "<span>" . $lang['reported'] . "(<span id=\"reportedNumb\">$reportedItems</span>)</span></div></a>";
		if ($modTotal == 1 || $adminTotal == 1 || $webmasterTotal == 1) {
			if ($adminTotal == 1 || $webmasterTotal == 1) {
				echo "<a ";
				echo 'href="../includes/deletedItems.php' . $lang_url . '">';
				echo "<div class='item-list'>";
				echo "<span>" . $lang['deleted'] . "(<span id=\"deletedNumb\">$deletedItems</span>)</span></div></a>";
			}
			echo "<a ";
			echo 'href="../includes/userMessages.php' . $lang_url . '">';
			echo "<div class='item-list'>";
			echo "<span>" . $lang['messages'] . "(<span id=\"msgNumb\">$contactusMessage</span>)</span></div></a>";

			echo '<a class="item-list-cp" href="../includes/controlPanel.php">';
			echo "<div class='item-list-cp'>";
			echo "<span>" . $lang['admin-panel'] . "</span></div></a>";
			echo "</div>";
		}
	}
	echo "</div>";
}
function queryStatus($uId, $status)
{
	return countRow($status, $uId);
}
function queryContactUs()
{
	$cond2 = "";
	$table = "contactus";
	$filter = "*";
	$result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
	return mysqli_num_rows($result);
}
function queryReported()
{
	$cond2 = "";
	$table = "abuse";
	$filter = "abuseID";
	$result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
	return mysqli_num_rows($result);
}
function queryMsgs($uId, $msgTyp)
{
	$cond2 = "WHERE receiver = '$uId' AND status='$msgTyp'";
	$table = "messages";
	$filter = "uID";
	$result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
	return mysqli_num_rows($result);
}
function queryUserWithTypeWithIDAndType($uId, $userTyp)
{
	$cond2 = "WHERE uID = '$uId' AND uRole ='$userTyp'";
	$table = "user";
	$filter = "*";
	$result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
	return $result;
}
function queryUsersExceptIdButType($uId, $userTyp)
{
	$cond2 = "WHERE uID != '$uId' AND uRole='$userTyp'";
	$table = "user";
	$filter = "*";
	$result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
	return $result;
}
function queryUserWithType($userTyp)
{
	$cond2 = "WHERE uRole ='$userTyp'";
	$table = "user";
	$filter = "*";
	$result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
	return $result;
}
function queryUserWithId($uId)
{
	$cond2 = "WHERE uID = '$uId'";
	$table = "user";
	$filter = "*";
	$result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
	return $result;
}
function queryUserWithNotIdButType($uId, $userTyp)
{
	$cond2 = "WHERE uID != '$uId' AND uRole='$userTyp'";
	$table = "user";
	$filter = "*";
	$result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
	return $result;
}
function queryUser()
{
	$cond2 = "";
	$table = "user";
	$filter = "*";
	$result = DatabaseClass::getInstance()->findTotalItemNumb($filter, $table, $cond2);
	return $result;
}
function found($role)
{
	$roleList = array(4 => 'webmaster', 3 => 'admin', 2 => 'mod', 1 => 'user');
	return array_search($role, $roleList);
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
