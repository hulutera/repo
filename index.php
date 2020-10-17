<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/objectPool.class.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $GLOBALS['lang']['hulutera']; ?></title>
	<?php
	global $lang_url, $str_url;
	commonHeader(); ?>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/font-awesome.min.css" rel="stylesheet">
	<link href="../../css/hulutera.unminified.css" rel="stylesheet">
</head>

<body>
	<?php
	headerAndSearchCode("index");
	?>
	<div id="whole" style="width:100%;margin-left:0px;margin-right:0px">
		<div id="wrapper" style="width:100%">
			<div class="leftNav-index col-xs-2 col-md-2">
				<!!----#leftNav start-------!!>
					<?php
					echo '<div class="row" style="background:rgb(240, 240, 240);border-radius:0 0 20px 20px;border:2px solid #333;">';
					echo '<div class="col-md-12" style=" background-color:#333; color: white;padding:5px;text-align:center;border:2px solid #333">';
					echo $GLOBALS['item_lang_arr']['All'];
					echo '</div>';
					echo '<div class="col-md-12" style="background:rgb(240, 240, 240);border-radius:0 0 20px 20px;padding:5px;">';
					echo "<ul>";

					foreach ($item_lang_arr as $key => $value) {

						if ($key != "000" && $key != "All") {
							$item_obj = ObjectPool::getInstance()->getObjectWithId($key);
							$condition = "WHERE field_status LIKE 'active'";
							$rows = $item_obj->runQuery($condition);
							echo '<a href="../../includes/template.item.php?type=' . $key . $str_url . '" style="color:black"><li>' . $value;
							echo ' (<span style="color:#F012BE;"><strong>' . $rows . '</strong></span>)';
							echo '</li></a>';
						}
					}
					echo "</ul></div></div>";
					?>
			</div>
			<!!----#leftNav end-------!!>

				<div class="col-xs-9 col-md-8 latest-button-mob">
					<?php

					?>

					<div class="mobile-main-view col-xs-12">
						<?php
						echo '<a href="../includes/adverts.php?item=All&search_text=&cities=All' . $str_url . '">';
						echo '<img src="../images/icons/item_latest.png"/>';
						echo '<p class="text-dark">' . $GLOBALS['lang']['latest items'] . '</p></a>';
						?>
					</div>

					<div id="mainColumn-index" class="col-xs-12 col-md-12" style="padding:0px">
						<!!----#mainColumn start-------!!>
							<?php showMap(); ?>

					</div>
				</div>
				<!!----#mainColumn end-------!!>

					<div class="rightNav-index col-xs-3 col-md-2">
						<!!----#rightNav starts-------!!>
							<?php
							echo '<div class="row" style="background:rgb(240, 240, 240);border-radius:0 0 20px 20px;border:2px solid #333;">';
							echo '<div class="col-md-12" style=" background-color:#333; color: white;padding:5px;text-align:center;">';
							echo $GLOBALS['city_lang_arr']['All'];
							echo '</div>';
							echo '<div class="col-md-12" style="background:rgb(240, 240, 240);border-radius:0 0 20px 20px;padding:5px;">';
							$item_obj = ObjectPool::getInstance()->getObjectSpecial("all");
							foreach ($city_lang_arr as $key => $value) {
								$totalItems = 0;
								if ($key != "000" && $key != "All") {
									foreach ($item_obj as $key2 => $value2) {
										$condition = "WHERE field_status LIKE 'active' AND field_location LIKE '$key'";
										$rows = $value2->runQuery($condition);
										$totalItems = $totalItems + $rows;
									}
									echo '<a href="../includes/adverts.php?item=All&cities=' . $key . $str_url . '&search_text=" style="color:black;"><div class="col-md-" style="padding:0px;;"><li>';

									echo '(<span style="color:#F012BE;"><strong>' . $totalItems . '</strong></span>) ';

									echo $value . '</li></div></a>';
								}
							}
							echo '</div>';
							echo '</div>';
							?>
					</div>
					<!!----#rightNav ends-------!!>
		</div>
	</div>
	<?php footerCode(); ?>
</body>



</html>

<?php

// show mapped page
function showMap()
{
	global $str_url;
	echo '<p class="index-txt">' . $GLOBALS["lang"]["select city from map"] . '</p>';
?>
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
			<?php
		}

		// show latest item
		function showLatestItem()
		{
			global $str_url;
			echo '<div class="col-xs-12 col-md-12 show-latest-mob-container" style="text-align:center;">';
			echo '<p class="index-txt">' . $GLOBALS["lang"]["latest items message"] . '</p>';
			echo '<div class="col-xs-12 col-md-12 show-latest-mob">';
			echo '<a   href="includes/adverts.php?item=All&search_text=&cities=All' . $str_url . '"><span class="glyphicon glyphicon-refresh" style="color:white;font-size:30px;"></span></br><span style="font-family:sans-serif, Arial, Helvetica;font-size:18px">' . $GLOBALS['lang']['latest items'] . '</span></a>';
			echo '</div>';
			echo '</div>';
		}
			?>