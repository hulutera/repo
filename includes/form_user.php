<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/validate.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';

$errPre = [];
$function = $_GET['function'];
if ($function == 'register') {
    $validate = new ValidateRegister($errPre);
} else if ($function == 'login' || $function == 'passRecovery') {
    $validate = new ValidateLogin($errPre);
}
var_dump($errPre);
//exit;
if (!empty($errPre)) {
    $_SESSION['errorRaw'] = getInnerArray($errPre);
    var_dump($errPre[0]);
    var_dump($_SESSION['errorRaw']);
    $_SESSION['POST'] = $_POST;
    $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
    $redirectLink = './' . $function . '.php?function=' . $function . $lang_sw;
    var_dump($errPre);
    header('Location: ' . $redirectLink);
} else {
    //successfull
    $errPost = [];
    if ($function == 'register') {
        $object = new HtUserTemp("*");
        $object->register();
        clearSessionVariables($function); // reset Error
    } else if ($function == 'login' || $function == 'passRecovery') {
        $validate->postValidation($errPost, $function);
        var_dump($errPost);
        if (!empty($errPost)) {
            $_SESSION['errorRaw'] = getInnerArray($errPost);
            $_SESSION['POST'] = $_POST;
            $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
            $redirectLink = './' . $function . '.php?function=' . $function . $lang_sw;
            header('Location: ' . $redirectLink);
        } else {
            clearSessionVariables($function); // reset Error
        }
    }
}

/**
 * Clear session variables created during validation
 */
function clearSessionVariables($function)
{
    unset($_SESSION[$function]);
    unset($_SESSION['POST']);
    unset($_SESSION['errorRaw']);
}

/**
 * iterrate through nested array and extract Errors
 */
function getInnerArray($errInput)
{
    $errLocal = array();
    foreach ($errInput as $row) {
        foreach ($row as $key => $value) {
            $errLocal[$key] = $value;
        }
    }
    return $errLocal;
}