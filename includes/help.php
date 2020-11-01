<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/cmn.proxy.php';

global $lang, $lang_url, $str_url;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $lang['help']; ?></title>
	<?php commonHeader(); ?>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="../../css/font-awesome.min.css" rel="stylesheet">
	<style>
		.collapsible {
			background-color: white;
			color: #444;
			cursor: pointer;
			padding: 18px;
			width: 100%;
			border: none;
			text-align: left;
			outline: none;
			font-size: 15px;
		}

		/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
		.active {
			background-color: lightskyblue;
		}

		.collapsible:hover {
			background-color: #ccc;
		}

		/* Style the collapsible content. Note: hidden by default */
		.collapsible:after {
			content: '\002B';
			color: black;
			font-weight: bold;
			float: right;
		}

		.active:after {
			content: "\2212";
		}

		.content {
			padding: 0 18px;
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.2s ease-out;
			background-color: #f1f1f1;
		}
	</style>
</head>

<body>
	<?php
	headerAndSearchCode("");
	?>
	<div class="row">

		<?php help(); ?>

	</div>
	<?php footerCode(); ?>
	<script>
		var coll = document.getElementsByClassName("collapsible");
		var i;

		for (i = 0; i < coll.length; i++) {
			coll[i].addEventListener("click", function() {
				this.classList.toggle("active");
				var content = this.nextElementSibling;
				if (content.style.display === "block") {
					content.style.display = "none";
				} else {
					content.style.display = "block";
				}
			});
		}
	</script>

</body>

</html>