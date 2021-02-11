<?php
require_once $_SERVER['DOCUMENT_ROOT']. '/includes/headerSearchAndFooter.php';

global $connect, $lang, $str_url, $lang_url;
if (!isset($_SESSION['uID'])) {
    header('Location: ../../index.php' . $lang_url);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $lang['my page']; ?></title>
    <?php commonHeader(); ?>
</head>

<body>
    <?php headerAndSearchCode(""); ?>
    <?php yourPage();?>
    <?php footerCode(); ?>
</body>

</html>