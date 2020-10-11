<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/validate.php';

global $lang, $lang_url, $str_url;
if (!isset($_SESSION['uID'])) {
	ob_start();
	header('Location:../index.php' . $lang_url);
	ob_end_flush();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $lang['profile edit']; ?></title>
	<?php commonHeader(); ?>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/hulutera.unminified.css" rel="stylesheet">
	<link href="../../css/font-awesome.min.css" rel="stylesheet">

</head>

<body>
	<?php
	headerAndSearchCode("");
	?>
	<div class="row">
		<?php
		editProfile();
		?>
	</div>
	<?php footerCode(); ?>
	<script>
		function showPassword() {
			var fieldPassword = document.getElementById("fieldPassword");
			var fieldPasswordRepeat = document.getElementById("fieldPasswordRepeat");
			var fieldPasswordRepeat2 = document.getElementById("fieldPasswordRepeat2");
			fieldPassword.type = (fieldPassword.type === "password") ? "text" : "password";
			fieldPasswordRepeat.type = (fieldPasswordRepeat.type === "password") ? "text" : "password";
			fieldPasswordRepeat2.type = (fieldPasswordRepeat2.type === "password") ? "text" : "password";
		}
	</script>
</body>

</html>