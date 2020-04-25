<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/validate.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';

$err = [];
$function = $_GET['function'];
if ($function == 'register') {
    $validate = new ValidateRegister($err);
} else if ($function == 'login') {
    $validate = new ValidateLogin($err);
}


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
    $_SESSION['errorRaw'] = $err2;
    $crypto = new Cryptor();
    $_SESSION['POST'] = $_POST;
    $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
    $redirectLink = './' . $function . '.php?function=' . $function . $lang_sw;
    header('Location: ' . $redirectLink);
} else {
    // reset Error
    //successfull
    if ($function == 'register') {
        $object = new HtUserTemp("*");
        $object->register();
    } else if ($function == 'login') {        
        $validate->postValidation($err);
    }

    unset($err);
    unset($_SESSION[$function]);
    unset($_SESSION['POST']);
    unset($_SESSION['errorRaw']);
}
