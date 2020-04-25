<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/validate.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';

$err = [];
$validate = new ValidateRegister($err);

$err2 = array();
foreach ($err as $x) {
    foreach ($x as $rowNumber => $pair) {
        $err2[$rowNumber] = $pair;
    }
}

if (!empty($err2)) {

    $input = implode('', array_map(
        function ($v) {
            return sprintf("-  %s", $v);
        },
        $err2,
        array_keys($err2)
    ));
    $_SESSION['errorRaw']  = $err2;    
    $crypto = new Cryptor();
    $_SESSION['POST'] = $_POST;
    $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
    header('Location: ./register.php?function=register' . $lang_sw);
} else {
    // reset Error
    unset($err);    
    unset($_SESSION['register']);
    unset($_SESSION['POST']);
    unset($_SESSION['errorRaw']);
    
    //successfull
    $object = new HtUserTemp("*");
    $object->register();
}
