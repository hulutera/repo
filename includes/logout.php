<?php
ob_start();
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_SESSION['uID'])) {
    $documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
    require_once $documnetRootPath . '/db/database.class.php';
    $http_referer = $_SERVER['HTTP_REFERER'];
    session_destroy();
    session_unset();
    $_SESSION = array();
    if (isset($_GET['lan'])) {
        $lang_url = "?&lan=" . $_GET['lan'];
    } else {
        $lang_url = "";
    }
    var_dump($_SESSION);
    header("Location:../index.php$lang_url");
}
ob_end_flush();
