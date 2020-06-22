<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/cmn.user.php';
require_once $documnetRootPath . '/classes/cmn.class.php';
require_once $documnetRootPath . '/db/database.class.php';


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
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/hulutera.unminified.css" rel="stylesheet">
    <link href="../../css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <?php headerAndSearchCode(""); ?>
    <div class="row" style="text-align:start;width:100%;margin:10px;">
        <?php yourPage(); ?>
    </div>
    <?php footerCode(); ?>
</body>

</html>