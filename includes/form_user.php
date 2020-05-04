<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    ob_start();
}
header("Content-Type: text/html;charset=UTF-8");

$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/classes/objectPool.class.php';
require_once $documnetRootPath . '/includes/validate.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';

$validate = null;
$errPre = [];
$function = isset($_GET['function']) ? $_GET['function'] : '';
if ($function == 'register') {
    $validate = new ValidateRegister($errPre);
} else if ($function == 'login' || $function == 'passRecovery' || $function == 'editProfile') {
    $validate = new ValidateLogin($errPre);
}
var_dump($errPre);
var_dump($_POST);
// var_dump($_SERVER['HTTP_REFERER']);
//exit;
if (!empty($errPre)) {
    $_SESSION['errorRaw'] = getInnerArray($errPre);
    var_dump($errPre[0]);
    var_dump($_SESSION['errorRaw']);
    $_SESSION['POST'] = $_POST;

    $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
    $redirectLink = '';
    if ($function == 'editProfile') {
        $redirectLink = $_SERVER['HTTP_REFERER'];
    } else {
        $redirectLink = './' . $function . '.php?function=' . $function . $lang_sw;
    }
    var_dump($_SERVER['HTTP_REFERER']);
    var_dump($redirectLink);
    //exit;
    header('Location: ' . $redirectLink);
} else {
    //successfull
    $errPost = [];
    if ($function == 'register') {
        $object = new HtUserTemp("*");
        $object->register();
        clearSessionVariables($function); // reset Error
    } else if ($function == 'login' || $function == 'passRecovery' || $function == 'editProfile') {
        $validate->postValidation($errPost, $function);
        var_dump($errPost);
        //exit;
        if (!empty($errPost)) {
            $_SESSION['errorRaw'] = getInnerArray($errPost);
            $_SESSION['POST'] = $_POST;
            $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
            $redirectLink = './' . $function . '.php?function=' . $function . $lang_sw;
            header('Location: ' . $redirectLink);
        } else {
            clearSessionVariables($function);
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
