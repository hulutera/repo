<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
require_once $documnetRootPath . '/includes/validate.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Password Recovery | የይለፍ ቃል </title>
    <?php commonHeader(); ?>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/hulutera.unminified.css" rel="stylesheet">
</head>

<body>
    <?php headerAndSearchCode("");
    ?>
    <div class="row">
        <?php
        ///reset/cleanup session variables
        if (!isset($_GET['function']) or $_GET['function'] !== 'password-recovery' or $_SESSION['lan'] != isset($_GET['lan'])) {
            unset($_SESSION['POST']);
            unset($_SESSION['errorRaw']);
        }
        $sessionName = 'password-recovery';
        $_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
        $_SESSION['lan'] = isset($_GET['lan']) ? $_GET['lan'] : "en";

        if (!isset($_SESSION[$sessionName])) {
            $object = new HtUserAll("*");
            $object->passwordRecovery();
            $_SESSION[$sessionName] = base64_encode(serialize($object));
        } else {
            $object = unserialize(base64_decode($_SESSION[$sessionName]));
            $object->passwordRecovery();
        }
        ?>
    </div>
    <?php footerCode(); ?>
</body>

</html>