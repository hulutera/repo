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

$function = isset($_GET['function']) ? $_GET['function'] : '';
$validFunctions = ['register', 'login', 'password-recovery', 'edit-profile', 'contact-us'];

if (!in_array($function, $validFunctions)) {
    header('Location: ../../index.php');
} else {
    foreach ($validFunctions as $key => $value) {
        if ($function != $value) {
            unset($_SESSION[$value]);
        }
    }
}

//exit;
$validate = null;
$errPre = [];
$validate = new ValidateUser($errPre);

//exit;
if (!empty($errPre)) {
    $_SESSION['errorRaw'] = getInnerArray($errPre);
    $_SESSION['POST'] = $_POST;

    $lang_sw = isset($_GET['lan']) ? "&lan=" . $_GET['lan'] : "";
    $redirectLink = '';
    if ($function == 'edit-profile') {
        $redirectLink = $_SERVER['HTTP_REFERER'];
    } else if ($function == 'login') {
        $redirectLink = './' . $function . '.php?function=' . $function . '&release=beta' . $lang_sw;
    } else {
        $redirectLink = './' . $function . '.php?function=' . $function . $lang_sw;
    }
    //exit;
    header('Location: ' . $redirectLink);
} else {
    //successfull
    $errPost = [];
    if ($function == 'register') {
        $object = new HtUserTemp("*");
        $object->register();
        clearSessionVariables($function); // reset Error
    } else {
        $validFunctions = ['login', 'password-recovery', 'edit-profile', 'contact-us'];
        if (in_array($function, $validFunctions)) {
            $validate->postValidation($errPost, $function);

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
