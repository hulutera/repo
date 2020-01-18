<?php
static $sentmsg  = "Your message has been sent. Please close to contuine ...";
static $abusemsg = "Thank you for your cooperation. We take missuse of our service seriously. Please close to contuine ... ";
static $emptymsg = "Sorry! There is no item to display.<div id=spanColumnXamharic>ይቅርታ!የሚታይ ምንም ንብረት የለም</div>";
static $MAX = 30;        //Maximum number of items per page
static $maxNumOfImg = 5; //Maximum number of images	per item
$documnetRootPath   = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/helper/pagination.php';
require_once $documnetRootPath.'/db/database.class.php';
/**/
function noItemToShow()
{
	global $emptymsg;
	echo "<div id=\"mainColumnX\">
	<div id=\"spanMainColumnX\">
	$emptymsg
	</div>
	</div>";
}
/* return:
 * array $page:page number
* $totpage:total pages
* * */
function calculatePage($count)
{
	global $MAX;
	$totpage = ceil($count/$MAX);
	$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;

	if($page > $totpage )
	{
		$page = $totpage;
	}
	elseif($page < 1)
	{
		$page = 1;
	}
	return array($page,$totpage);
}
/**/
function centerColumn()
{
	$connect = DatabaseClass::getInstance()->getConnection();
	global $emptymsg, $MAX;
	$countItems = $connect -> query("SELECT * FROM latestupdate") or die(mysqli_error());
	$totalItems = mysqli_num_rows($countItems);
	if($totalItems)
	{

		$featureditems = $connect->query("SELECT * FROM latestupdate ORDER BY LatestTime DESC LIMIT 0,".$MAX) or die(mysqli_error());

		while($dfeatureditems = $featureditems -> fetch_assoc())
		{
			if($dfeatureditems['cID'] != 0 && $dfeatureditems['status'] == 'active')
			{				
				showCar($dfeatureditems['cID'] );
			}
			else if($dfeatureditems['hID'] != 0 && $dfeatureditems['status'] == 'active')
			{
				showHouse($dfeatureditems['hID']);
			}
			else if($dfeatureditems['dID'] != 0 && $dfeatureditems['status'] == 'active')
			{
				showComputer($dfeatureditems['dID']);
			}
			else if($dfeatureditems['pID'] != 0 && $dfeatureditems['status'] == 'active')
			{
				showPhone($dfeatureditems['pID']);
			}
			else if($dfeatureditems['eID'] != 0 && $dfeatureditems['status'] == 'active')
			{
				showElectronics($dfeatureditems['eID']);
			}
			else if($dfeatureditems['hhID'] != 0 && $dfeatureditems['status'] == 'active')
			{
				showHousehold($dfeatureditems['hhID']);
			}
			else if($dfeatureditems['oID'] != 0 && $dfeatureditems['status'] == 'active')
			{
				showOthers($dfeatureditems['oID']);
			}
		}
		$calculatePageArray = calculatePage($totalItems);
		$featureditems->close();
		pagination('all',$calculatePageArray[1],$calculatePageArray[0],0);
	}
	else if($totalItems == 0)
	{
		noItemToShow();
	}
}
/* To print specific item based on it's name
 * */
function printItem($Id, $itemName)
{
	if($itemName      == "car")         showCar($Id);
	else if($itemName == "house")       showHouse($Id);
	else if($itemName == "computer")    showComputer($Id);
	else if($itemName == "electronics") showElectronics($Id);
	else if($itemName == "phone")       showPhone($Id);
	else if($itemName == "household")   showHousehold($Id);
	else if($itemName == "others")		showOthers($Id);
}
/* To identify calling url and populate array elements
 * */
function findUrl($item)
{
	$itemUrl = basename($_SERVER['SCRIPT_NAME']);
	switch($item)
	{
		case "car":
			$arr = array(1=>"car",2=>"cID");
			break;
		case "computer":
			$arr = array(1=>"computer",2=>"dID");
			break;
		case "house":
			$arr = array(1=>"house",2=>"hID");
			break;
		case "phone":
			$arr = array(1=>"phone",2=>"pID");
			break;
		case "electronics":
			$arr = array(1=>"electronics",2=>"eID");
			break;
		case "household":
			$arr = array(1=>"household",2=>"hhID");
			break;
		case "others":
			$arr = array(1=>"others",2=>"oID");
			break;
		default:
			break;
	}
	return $arr;
}
/* To print a single element
 * */
function oneItemColumn($item)
{
	$arr = findUrl($item);
	global $documnetRootPath,$connect;
	require_once $documnetRootPath.'/items/'.$arr[1].'/'.$arr[1].'Detailed.php';
	$Id = $_GET['Id'];
	if(is_numeric($Id))
	{
		$queryOneItem = $connect->query("SELECT 1 FROM $arr[1] WHERE $arr[2] = $Id LIMIT 1");
		if(mysqli_num_rows($queryOneItem) == 1)
		{
			printItem($Id,$arr[1]);
		}
		else
		{
			noItemToShow();
		}
	}
	else
	{
		noItemToShow();
	}
}
/**/
function allItemColumn($item)
{
	$arr = findUrl($item);
	global $documnetRootPath, $MAX;
	$countTotalCar = calculateTotalItem($arr[1]);
	if($countTotalCar)
	{
		require_once $documnetRootPath.'/items/'.$arr[1].'/'.$arr[1].'Detailed.php';
		$calculatePageArray = calculatePage($countTotalCar);
		$itemstart = $MAX * ($calculatePageArray[0] - 1);
		$query = queryItem($itemstart, $arr[1]);
		while($dquery = $query->fetch_assoc())
		{
			printItem($dquery[$arr[2]], $arr[1]);
		}
		$query->close();
		pagination($item,$calculatePageArray[1], $calculatePageArray[0], 0);
	}
	else
	{
		noItemToShow();
	}
}
/**/
function calculateTotalItem($itemName)
{
	$connect = DatabaseClass::getInstance()->getConnection();
	switch($itemName)
	{
		case "car":
			$total = $connect->query("SELECT cID FROM car LEFT JOIN carcategory ON
					car.carCategoryID = carcategory.categoryID
					WHERE cStatus LIKE 'active'")
					or
					die(mysqli_error());
					break;
		case "computer":
			$total =$connect->query("SELECT dID FROM computer LEFT JOIN computercategory ON
					computer.compCategoryID = computercategory.categoryID
					WHERE dStatus LIKE 'active' ")
					or
					die(mysqli_error());
					break;
		case "house":
			$total =$connect->query("SELECT hID FROM house LEFT JOIN housecategory ON
					house.houseCategoryID = housecategory.categoryID
					WHERE hStatus LIKE 'active'")
					or
					die(mysqli_error());
					break;
		case "phone":
			$total =$connect->query("SELECT pID FROM phone
					WHERE pStatus = 'active' ")
					or
					die(mysqli_error());
					break;
		case "electronics":
			$total = $connect->query("SELECT eID FROM electronics LEFT JOIN electronicscategory ON
					electronics.electronicsCategoryID = electronicscategory.categoryID
					WHERE eStatus LIKE 'active' ")
					or
					die(mysqli_error());
					break;
		case "household":
			$total = $connect->query("SELECT hhID FROM household LEFT JOIN householdcategory ON
					household.hhCategoryID = householdcategory.categoryID
					WHERE hhStatus LIKE 'active' ")
					or
					die(mysqli_error());
					break;
		case "others":
			$total = $connect->query("SELECT oID FROM others WHERE oStatus LIKE 'active' ")
			or
			die(mysqli_error());
			break;
		default:
			break;
	}
	return mysqli_num_rows($total) ;

}
/**/
function queryItem($itemstart, $itemName)
{
	global $connect, $MAX;
	switch($itemName)
	{
		case "car":
			$query = $connect->query("SELECT cID FROM car LEFT JOIN carcategory ON
			car.carCategoryID = carcategory.categoryID
			WHERE cStatus LIKE 'active' ORDER BY UploadedDate DESC LIMIT $itemstart, $MAX ") or
			die(mysqli_error());
			break;
		case "computer":
			$query=$connect->query("SELECT dID,UploadedDate FROM computer LEFT JOIN
			computercategory ON
			computer.compCategoryID = computercategory.categoryID
			WHERE dStatus LIKE 'active'
			ORDER BY UploadedDate DESC LIMIT $itemstart, $MAX ")
			or
			die(mysqli_error());
			break;
		case "house":
			$query=$connect ->query("SELECT hID,UploadedDate FROM house
			LEFT JOIN housecategory ON
			house.houseCategoryID = housecategory.categoryID
			WHERE hStatus LIKE 'active' ORDER BY UploadedDate DESC LIMIT $itemstart, $MAX")
			or
			die(mysqli_error());
			break;
		case "phone":
			$query=$connect->query("SELECT pID,UploadedDate FROM phone
			WHERE pStatus = 'active' ORDER BY UploadedDate DESC LIMIT $itemstart, $MAX")
			or
			die(mysqli_error());
			break;
		case "electronics":
			$query=$connect->query("SELECT eID FROM electronics LEFT JOIN electronicscategory ON
			electronics.electronicsCategoryID = electronicscategory.categoryID
			WHERE eStatus LIKE 'active'
			ORDER BY UploadedDate DESC LIMIT $itemstart, $MAX")
			or
			die(mysqli_error());
			break;
		case "household":
			$query=$connect->query("SELECT hhID,UploadedDate FROM household
			LEFT JOIN householdcategory ON
			household.hhCategoryID = householdcategory.categoryID
			WHERE hhStatus LIKE 'active'
			ORDER BY UploadedDate DESC LIMIT $itemstart, $MAX ")
			or
			die(mysqli_error());
			break;
		case "others":
			$query=$connect->query("SELECT oID,UploadedDate FROM others WHERE oStatus = 'active'
			ORDER BY UploadedDate DESC LIMIT $itemstart, $MAX ")
			or
			die(mysqli_error());
			break;
		default:
			break;
	}
	return $query;
}
/**/
function centerSearchColumn()
{
	global $MAX;
    $connect = DatabaseClass::getInstance()->getConnection();
	echo"<div id= \"mainColumn\">";

	$page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
	if( (isset($_GET['search_mini_form'])) || $page >> 0 )
	{
		$searchKeywordunedited = $_GET['search_text'];
		$searchKeyword= $connect->real_escape_string($searchKeywordunedited);

		if($searchKeyword != "" )
		{
			//count matching car
			$matchingNoOfCar = "(SELECT COUNT(cID) FROM car
					LEFT JOIN carcategory
					ON carcategory.categoryID = car.carCategoryID
					WHERE
					cStatus ='active' AND
					categoryName LIKE '".$searchKeyword."' OR
							cColor LIKE '".$searchKeyword."' OR
									cModel LIKE '".$searchKeyword."' OR
											cFuelType LIKE '".$searchKeyword."' OR
													cMake LIKE '".$searchKeyword."')";
			//count matching house
			$matchingNoOfHouse = "(SELECT COUNT(hID) FROM house
					LEFT JOIN housecategory ON
					housecategory.categoryID = house.houseCategoryID
					WHERE
					hStatus ='Active' AND
					categoryName LIKE '".$searchKeyword."')";
			//count matching computer
			$matchingNoOfComputer =" (SELECT COUNT(dID) FROM computer
					LEFT JOIN computercategory ON
					computercategory.categoryID = computer.compCategoryID
					WHERE
					dStatus ='Active' AND
					dMade LIKE '".$searchKeyword."' OR
							categoryName LIKE '".$searchKeyword."' OR
									dModel LIKE '".$searchKeyword."')";
			//count matching phone
			$matchingNoOfPhone = "(SELECT COUNT(pID) FROM phone
					WHERE
					pStatus = 'Active' AND
					pMake LIKE '".$searchKeyword."' OR
							pModel LIKE '".$searchKeyword."')";
			//count matching electronics
			$matchingNoOfElectronics = "(SELECT COUNT(eID) FROM electronics
					LEFT JOIN electronicscategory ON
					electronicscategory.categoryID = electronics.electronicsCategoryID
					WHERE
					eStatus ='Active' AND
					categoryName LIKE '".$searchKeyword."')";
			//count matching household
			$matchingNoOfHousehold = "(SELECT COUNT(hhID) FROM household
					INNER JOIN householdcategory
					ON householdcategory.categoryID = household.hhCategoryID
					WHERE
					hhStatus ='Active' AND
					categoryName LIKE '".$searchKeyword."')";

			//count matching item
			$matchChecker = "SELECT (".
					$matchingNoOfCar."+".
					$matchingNoOfHouse."+".
					$matchingNoOfComputer."+".
					$matchingNoOfPhone."+".
					$matchingNoOfElectronics."+".
					$matchingNoOfHousehold.
					") AS count_row";

			$totalMatch = $connect->query($matchChecker) or die(mysqli_error());
			while($dmatchChecker = $totalMatch->fetch_assoc())
			{
				$numbreOfMatches = $dmatchChecker['count_row'];
			}
			/*$MAX is the number of items displaying in one page =====*/
			if($numbreOfMatches >= 1)
			{
				$totpage = ceil($numbreOfMatches/$MAX);
				$itemstart = $MAX * ($page - 1);
				//searching car
				$searchCar =" SELECT cID,UploadedDate,tableType FROM car
						INNER JOIN carcategory
						ON carcategory.categoryID = car.carCategoryID
						WHERE
						cStatus ='Active' AND
						categoryName LIKE '".$searchKeyword."' OR
								cColor LIKE '".$searchKeyword."' OR
										cModel LIKE '".$searchKeyword."' OR
												cFuelType LIKE '".$searchKeyword."' OR
														cMake LIKE '".$searchKeyword."'";
				//searching house
				$searchHouse = " SELECT hID,UploadedDate,TableType FROM house
						INNER JOIN housecategory ON
						housecategory.categoryID = house.houseCategoryID
						WHERE
						hStatus ='Active' AND
						categoryName LIKE '".$searchKeyword."'";
				//searching computer
				$searchComputer = "	SELECT dID,UploadedDate,TableType FROM computer
						INNER JOIN computercategory ON
						computercategory.categoryID = computer.compCategoryID
						WHERE
						dStatus ='Active' AND
						dMade LIKE '".$searchKeyword."' OR
								categoryName LIKE '".$searchKeyword."' OR
										dModel LIKE '".$searchKeyword."'";
				//searching phone
				$searchPhone = " SELECT pID,UploadedDate,TableType FROM phone
						WHERE
						pStatus = 'Active' AND
						pMake LIKE '".$searchKeyword."' OR
								pModel LIKE '".$searchKeyword."'";
				//searching electronics
				$searchElectronics = " SELECT eID,UploadedDate,TableType FROM electronics
						LEFT JOIN electronicscategory ON
						electronicscategory.categoryID = electronics.electronicsCategoryID
						WHERE
						eStatus ='Active' AND
						categoryName LIKE '".$searchKeyword."'";
				//searching household
				$searchHouseHold = " SELECT hhID,UploadedDate,TableType FROM household
						INNER JOIN householdcategory
						ON householdcategory.categoryID = household.hhCategoryID
						WHERE
						hhStatus ='Active' AND
						categoryName LIKE '".$searchKeyword."'";

				//searching all item
				$querySearch =
				$searchCar." UNION ALL ".
				$searchHouse." UNION ALL ".
				$searchComputer." UNION ALL ".
				$searchPhone." UNION ALL ".
				$searchElectronics." UNION ALL ".
				$searchHouseHold." ORDER BY UploadedDate DESC LIMIT $itemstart,$MAX";

				$searchResult = $connect->query($querySearch);
				while($dsearchResult=$searchResult->fetch_assoc())
				{
					$searchKeyword_id= $dsearchResult['cID'];
					$searchKeyword_tabletype = $dsearchResult['tableType'];
					whichTable($searchKeyword_tabletype,$searchKeyword_id);
				}

				echo"<div id=\"pagination\"><ul>";
				/*====a variable which describes the page bar*/

				$pagerange = 4;
				$nextpage = $page + 1 ;
				$previouspage = $page -1;

				if($page > 1)
				{
					echo'<li><a href="?page=1 & search_text='.$searchKeyword.'"> First page</a></li>';
					echo '<li><a href="?page=' .$previouspage. '& search_text='.$searchKeyword. '"> Previous</a></li>';
				}
				else
				{
					echo'<li class = "previous-off"> <b>First Page </b></li>';
					echo '<li class = "previous-off"><b> previous</b></li>';
				}

				for($i= ($page-$pagerange); $i<=($page + $pagerange); $i++)
				{
					if($i > 0 && $i<=$totpage)
					{
						echo ($i == $page) ? '<li><strong><a href="?page='.$i.'& search_text='.$searchKeyword.'">'.$i.'</a></strong></li>' :
						'<li><a href="?page='.$i. '& search_text='.$searchKeyword. '">'.$i.'</a></li>';
					}
				}

				if($page < $totpage)
				{
					echo '<li><a href="?page=' .$nextpage. '& search_text='.$searchKeyword.'"> > </a></li>' ;
					echo'<li><a href="?page=' .$totpage. '& search_text='.$searchKeyword.'"> >> </a></li>';
				}
				else
				{
					echo'<li class = "previous-off"> <b> Next </b></li>';
					echo '<li class = "previous-off"> <b> Last Page</b></li>';
				}
				echo"</ul></div>";
			}
			else if($numbreOfMatches < 1)
			{
				echo'<div id="mainColumnX">
						<div id="spanMainColumnX">
						Sorry!There is no match found,try again.</br>
						<div style="font-size:14px">
						ይቅርታ እንዲፈለግልዎት የፈለጉት አልተገኘም።</br> ስለ አፈላለግ መረጃ ከፈለጉ <a  style="text-decoration:none; font-size:15px;" href="../proxy_help.php#search">Help</a>ውስጥ ያገኛሉ።
						</div>
						</div>
						</div>';

			}
		}
		else if($searchKeyword == "")
		{
			echo" <div id=\"mainColumnX\">
					<div id=\"spanMainColumnX\">
					Enter the search word.<div id=\"spanColumnXamharic\">
					እባክዎ እንዲፈለግልዎት የፈለጉትን ያስገቡ።
					</div>
					</div>
					</div>";
		}
	}
	echo "</div>";
}
/**/
function whichTable($searchKeyword_tabletype,$searchKeyword_id)
{
	switch($searchKeyword_tabletype)
	{
		case 1:
			showCar($searchKeyword_id);
			break;
		case 2:
			showHouse($searchKeyword_id);
			break;
		case 3:
			showComputer($searchKeyword_id);
			break;
		case 4:
			showPhone($searchKeyword_id);
			break;
		case 5:
			showElectronics($searchKeyword_id);
			break;
		case 6:
			showHousehold($searchKeyword_id);
			break;
		case 7:
			showOthers($searchKeyword_id);
			break;
		default:
			break;
	}
}
?>
