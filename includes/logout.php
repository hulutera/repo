<?php
ob_start();
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
if (isset($_GET['lan'])) {
    $lang_url = "?&lan=" . $_GET['lan'];
} else {
    $lang_url = "?&lan=en";
}

if (isset($_SESSION['uID'])) {
    ///
    session_destroy();
    ///
    session_unset();
    ///
    $_SESSION = array();
    ///
    header("Location:../index.php$lang_url");
}

/// logout.php accessed directly will be routed to index.php
if(!isset($_SERVER['HTTP_REFERER']))
{
    header("Location:../index.php$lang_url");
}
ob_end_flush();
