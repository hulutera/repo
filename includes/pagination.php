<?php
function pagination($item, $totpage, $page, $mailtype)
{

	global $lang;
    $PAGE_RANGE = 4;
	$nextpage = $page + 1;
	if (isset($_GET['lan'])) {
		$lang_url = "?&lan=" . $_GET['lan'];
		$str_url = "&lan=" . $_GET['lan'];
	}
	else { 
		$lang_url = "";
		$str_url = "";
	}

	$previouspage = $page - 1;
	echo "<div id=\"pagination\"><ul> ";
	//PAGE_RANGE is the offset pages on the left and right side of the current page
	//left-side
	if ($page > 1) {
		echo '<li><a href="?type=' . $item . '&page=1&mail_type='. $mailtype . $str_url.'">' .$lang['first page']. '</a></li>';
		echo '<li><a href="?type=' . $item . '&page=' . $previouspage . ' & mail_type=' . $mailtype . $str_url.' ">' .$lang['previous']. '</a></li>';
	} else {
		echo '<li class="previous-off"> <b>' .$lang['first page']. ' </b></li>';
		echo '<li class="previous-off"><b> ' .$lang['previous']. '</b></li>';
	}
	//The pagination will be visible from ($page-$PAGE_RANGE) to ($page + $PAGE_RANGE).
	//middle
	$START = $page - $PAGE_RANGE;
	$END   = $page + $PAGE_RANGE;

	for ($i = $START; $i <= $END; ++$i) {
		if ($i > 0 && $i <= $totpage) {
			echo ($i == $page) ?
				'<li><strong><a href="?type=' . $item . '&page=' . $i . ' & mail_type=' . $mailtype . $str_url. ' ">' . $i . '</a></strong></li>' :
				'<li><a href="?type=' . $item . '&page=' . $i . ' & mail_type=' . $mailtype . $str_url. '">' . $i . '</a></li>';
		}
	}
	//right-side
	if ($page < $totpage) {
		echo '<li><a href="?type=' . $item . '&page=' . $nextpage . ' & mail_type=' . $mailtype . $str_url. '"> ' .$lang['next']. ' </a></li>';
		echo '<li><a href="?type=' . $item . '&page=' . $totpage . ' & mail_type=' . $mailtype . $str_url. ' "> ' .$lang['last page']. ' </a></li>';
	} else {
		echo '<li class="previous-off"> <b> ' .$lang['next']. ' </b></li>';
		echo '<li class="previous-off"> <b> ' .$lang['last page']. '</b></li>';
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
	$globalVarObj = new HtGlobal();
	$totpage = ceil($count / $globalVarObj::get('itemPerPage'));
	$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

	if ($page > $totpage) {
		$page = $totpage;
	} elseif ($page < 1) {
		$page = 1;
	}
	return array($page, $totpage);
}


function search_pagination($page, $totpage, $searchWordSanitized, $item,  $location){
	global $lang, $lang_url, $str_url;
	echo "<div id=\"pagination\"><ul>";
                    /*====a variable which describes the page bar*/
                    $pagerange = 4;
                    $nextpage = $page + 1;
                    $previouspage = $page - 1;
                    if($searchWordSanitized == "No searchword given"){
                        $searchWordSanitized = "";
                    }

                    if ($page > 1) {
                        echo '<li><a href="?page=1 & search_text=' . $searchWordSanitized . '& cities=' . $location . '& item=' . $item . $str_url .'">' . $lang['first page']. '</a></li>';
                        echo '<li><a href="?page=' . $previouspage . '&search_text=' . $searchWordSanitized . '& cities=' . $location . '& item=' . $item . $str_url . '">' .$lang['previous']. '</a></li>';
                    } else {
                        echo '<li class = "previous-off"> <b>' .$lang['first page']. '</b></li>';
                        echo '<li class = "previous-off"><b>' .$lang['previous']. '</b></li>';
                    }

                    for ($i = ($page - $pagerange); $i <= ($page + $pagerange); $i++) {
                        if ($i > 0 && $i <= $totpage) {
                            echo ($i == $page) ? '<li><strong><a href="?page=' . $i . '&search_text=' . $searchWordSanitized . '& cities=' . $location . '& item=' . $item . $str_url .'">' . $i . '</a></strong></li>' :
                                '<li><a href="?page=' . $i . '&search_text=' . $searchWordSanitized . '& cities=' . $location . '& item=' . $item . $str_url . '">' . $i . '</a></li>';
                        }
                    }

                    if ($page < $totpage) {
                        echo '<li><a href="?page=' . $nextpage . '&search_text=' . $searchWordSanitized . '& cities=' . $location . '& item=' . $item . $str_url .'"> > </a></li>';
                        echo '<li><a href="?page=' . $totpage . '&search_text=' . $searchWordSanitized . '& cities=' . $location . '& item=' . $item . $str_url .'"> >> </a></li>';
                    } else {
                        echo '<li class = "previous-off"> <b>' .$lang['next']. '</b></li>';
                        echo '<li class = "previous-off"> <b>' .$lang['last page']. '</b></li>';
                    }
                    echo "</ul></div>";
}
