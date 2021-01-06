<?php
function pagination($item, $totpage, $page)
{

	global $lang;
	$PAGE_RANGE = 4;
	$nextpage = $page + 1;
	$previouspage = $page - 1;
	if (isset($_GET['lan'])) {
		$lang_url = "?&lan=" . $_GET['lan'];
		$str_url = "&lan=" . $_GET['lan'];
	} else {
		$lang_url = "";
		$str_url = "";
	}

	echo "<div id=\"pagination\"><div class=\"middle-pg\" style=\"text-align:center\"><ul> ";
	//PAGE_RANGE is the offset pages on the left and right side of the current page
	if ( $totpage > 1) {
		//left-side
		if ($page > 1) {
			echo '<li><a href="?type=' . $item . '&page=1&' . $str_url . '">' . $lang['first page'] . '</a></li>';
			echo '<li><a href="?type=' . $item . '&page=' . $previouspage . ' &' . $str_url . ' ">' . $lang['previous'] . '</a></li>';
		}
		//The pagination will be visible from ($page-$PAGE_RANGE) to ($page + $PAGE_RANGE).
		//middle
		$START = $page - $PAGE_RANGE;
		$END   = $page + $PAGE_RANGE;
		for ($i = $START; $i <= $END; ++$i) {
			if ($i > 0 && $i <= $totpage) {
				echo ($i == $page) ?
					'<li><strong><a href="?type=' . $item . '&page=' . $i . ' & ' . $str_url . ' ">' . $i . '</a></strong></li>' :
					'<li><a href="?type=' . $item . '&page=' . $i . ' & ' . $str_url . '">' . $i . '</a></li>';
			}
		}
		//right-side
		if ($page < $totpage) {
			echo '<li><a href="?type=' . $item . '&page=' . $nextpage . ' & ' . $str_url . '"> ' . $lang['next'] . ' </a></li>';
			echo '<li><a href="?type=' . $item . '&page=' . $totpage . ' & ' . $str_url . ' "> ' . $lang['last page'] . ' </a></li>';
		}
	} else {
		echo '<li><strong><a href="?type=' . $item . '&page=1&' . $str_url . '"> 1 </a></strong></li>';
	}
	echo "</ul>";
	echo "</div></div>";
}
/* return:
 * array $page:page number
* $totpage:total pages
* * */
function calculatePage($count)
{
	$totpage = ceil($count / $GLOBALS['general']['itemPerPage']);
	$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

	if ($page > $totpage) {
		$page = $totpage;
	} elseif ($page < 1) {
		$page = 1;
	}
	return array($page, $totpage);
}

function search_item_pagination($page, $totpage, $get_array)
{
	global $lang, $lang_url, $str_url;
	echo "<div id=\"pagination\"><div class=\"middle-pg\" style=\"text-align:center\"><ul>";
	/*====a variable which describes the page bar*/
	$pagerange = 4;
	$nextpage = $page + 1;
	$previouspage = $page - 1;
	if( $totpage > 1) {
		// Left side
		if ($page > 1) {
			echo '<li><a   href="?page=1';
			foreach ($get_array as $key => $value) {
				echo '&' . $key . '=' . $value;
			}
			echo '">' . $lang["first page"] . '</a></li>';
			echo '<li><a   href="?page=' . $previouspage;
			foreach ($get_array as $key => $value) {
				echo '&' . $key . '=' . $value;
			}
			echo '">' . $lang["previous"] . '</a></li>';
		}
        // Center side
		for ($i = ($page - $pagerange); $i <= ($page + $pagerange); $i++) {
			if ($i > 0 && $i <= $totpage) {
				if ($i == $page) {
					echo '<li><strong><a   href="?page=' . $i;
					foreach ($get_array as $key => $value) {
						echo '&' . $key . '=' . $value;
					}
					echo '">' . $i . '</a></strong></li>';
				} else {
					echo '<li><a   href="?page=' . $i;
					foreach ($get_array as $key => $value) {
						echo '&' . $key . '=' . $value;
					}
					echo '">' . $i . '</a></li>';
				}
			}
		}
		// Right side
		if ($page < $totpage) {
			echo '<li><a   href="?page=' . $nextpage;
			foreach ($get_array as $key => $value) {
				echo '&' . $key . '=' . $value;
			}
			echo '"> > </a></li>';
			echo '<li><a   href="?page=' . $totpage;
			foreach ($get_array as $key => $value) {
				echo '&' . $key . '=' . $value;
			}
			echo '"> >> </a></li>';
		}
    } else {
		echo '<li><strong><a href="?page=1';
		foreach ($get_array as $key => $value) {
			echo '&' . $key . '=' . $value;
		}
		echo '"> 1 </a></strong></li>';
	}
	echo "</ul></div></div>";
}
