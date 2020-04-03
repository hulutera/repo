<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/common.inc.php';
require_once $documnetRootPath . '/db/database.class.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Hulutera | ሁሉተራ </title>
<?php 
global $lang_url, $str_url;
commonHeader();?>
</head>
<body>
	<div id="whole" style="width:100%;margin-left:0px;margin-right:0px">
		<div id="wrapper" style="width:100%">
			<?php 
				echo '<div id= "head">';
				echo '<div class="header" style="padding-left:15%;padding-right:15%;display:block;margin-bottom:20px">';
				logo();
				topRightLinks();
				echo '</div>';
				echo '</div></div>';		
			?>
			<div id="main_section">
			
					<div class="leftNav-index">
					<?php
						foreach($item_lang_arr as $key=>$value){
							
							switch ($key) {
								case 'car':
									$status = "cStatus";
									break;
								case 'house':
									$status = "hStatus";
									break;
								case 'computer':
									$status = "dStatus";
									break;
								case 'electronics':
									$status = "eStatus";
									break;
								case 'household':
									$status = "hhStatus";
									break;
								case 'phone':
									$status = "pStatus";
									break;
								case 'other':
									$status = "oStatus";
									break;
							}
			
					        if($key == "All") echo '<li style="background-color:#378de5; color: #fff"> ' . $value . '</li>';
							elseif($key != "000") {
								$countItems = DatabaseClass::getInstance()->findTotalItemNumb("*", $key, "WHERE $status LIKE 'active'");
								$totalItems = mysqli_num_rows($countItems);
								echo '<a href="../../includes/template.item.php?type='. $key . $str_url . '" style="color:black"><li>' .$value. ' ('.$totalItems.')</li></a>';
							}
						}
					?>
					</div> 
				<div id="mainColumn-index">    <!!----#mainColumn start-------!!>
				<p class="index-txt"> <?php echo $lang['select city from map'];?></p>

			<!!----SVG for bigger screens----!!>
			    <svg class="svg-big-sc" width="798.71997" height="620.46997" viewbox="0 0 900 800" fill="#378de5">
					<?php svgMapElement(); ?>
			    </svg>

			<!!----SVG for mid screens----!!>
			    <svg class="svg-mid-sc" width="798.71997" height="620.46997" viewbox="0 0 1000 900" fill="#378de5">
					<?php svgMapElement(); ?>
			    </svg>

			<!!----SVG for small screens----!!>
			    <svg class="svg-small-sc" width="798.71997" height="620.46997" viewbox="0 0 1600 1400" fill="#378de5">
					<?php svgMapElement(); ?>
			    </svg>

			</div> <!!----#mainColumn end-------!!>
			<div class="rightNav-index">
			<?php
						foreach($city_lang_arr as $key=>$value){
							$totalItems = 0;				
					        if($key == "All") echo '<li style="background-color:#378de5; color: #fff;text-align:center"> ' . $value . '</li>';
							elseif($key != "000") {
								$itemToStatus = array(
									"car" => "cStatus",
									"house" => "hStatus",
									"computer" => "dStatus",
									"electronics" => "eStatus",
									"phone" => "pStatus",
									"household" => "hhStatus",
									"others" => "oStatus"
								);

								$locationPerTable = array(
									"car" => "cLocation",
									"house" => "hLocation",
									"computer" => "dLocation",
									"electronics" => "eLocation",
									"phone" => "pLocation",
									"household" => "hhLocation",
									"others" => "oLocation"
								);

								$allItem = DatabaseClass::getInstance()->getAllItem();
								foreach ($allItem as $key2 => $value2) { 
									$stat = $itemToStatus[$value2['table_name']];
									$loc =  $locationPerTable[$value2['table_name']];
									$countItems = DatabaseClass::getInstance()->findTotalItemNumb("*",  $value2['table_name'], "WHERE $stat LIKE 'active' AND $loc LIKE '%$key%'");
									$items = mysqli_num_rows($countItems);
									$totalItems = $totalItems + $items;
								}
							    echo '<a href="../includes/adverts.php?&item=All&cities='.$key .$str_url. '" style="color:black"><li>('.$totalItems.') ' .$value. '</li></a>';
						    }
						}
			?>
		    </div>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<?php footerCode();?>
</body>
</html>

