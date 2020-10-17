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
    <div class="row" style="text-align:start;width:100%;margin:10px;">
        <?php yourPage();?>
    </div>
    <?php footerCode(); ?>
</body>

</html>