<?php
function pagination($item, $totpage, $page, $mailtype)
{

	echo "<div id=\"pagination\"><ul> ";
	//PAGE_RANGE is the offset pages on the left and right side of the current page
	$PAGE_RANGE = 4;
	$nextpage = $page + 1;
	$previouspage = $page - 1;

	//left-side
	if ($page > 1) {
		echo '<li><a href="?type=' . $item . '&page=1 & mail_type=' . $mailtype . ' "> First Page </a></li>';
		echo '<li><a href="?type=' . $item . '&page=' . $previouspage . ' & mail_type=' . $mailtype . ' "> Previous </a></li>';
	} else {
		echo '<li class="previous-off"> <b>First Page </b></li>';
		echo '<li class="previous-off"><b> previous</b></li>';
	}
	//The pagination will be visible from ($page-$PAGE_RANGE) to ($page + $PAGE_RANGE).
	//middle
	$START = $page - $PAGE_RANGE;
	$END   = $page + $PAGE_RANGE;

	for ($i = $START; $i <= $END; ++$i) {
		if ($i > 0 && $i <= $totpage) {
			echo ($i == $page) ?
				'<li><strong><a href="?type=' . $item . '&page=' . $i . ' & mail_type=' . $mailtype . ' ">' . $i . '</a></strong></li>' :
				'<li><a href="?type=' . $item . '&page=' . $i . ' & mail_type=' . $mailtype . '">' . $i . '</a></li>';
		}
	}
	//right-side
	if ($page < $totpage) {
		echo '<li><a href="?type=' . $item . '&page=' . $nextpage . ' & mail_type=' . $mailtype . '"> Next </a></li>';
		echo '<li><a href="?type=' . $item . '&page=' . $totpage . ' & mail_type=' . $mailtype . ' "> Last Page </a></li>';
	} else {
		echo '<li class="previous-off"> <b> Next </b></li>';
		echo '<li class="previous-off"> <b> Last Page</b></li>';
	}
	echo "</ul>";
	echo "</div>";
}
/* return:
 * array $page:page number
* $totpage:total pages
* * */
function calculatePage($count)
{
	
	$totpage = ceil($count / HtGlobal::get('itemPerPage'));
	$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

	if ($page > $totpage) {
		$page = $totpage;
	} elseif ($page < 1) {
		$page = 1;
	}
	return array($page, $totpage);
}
