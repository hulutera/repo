<?php
session_start();
ob_flush();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
require_once $documnetRootPath . '/includes/validate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $GLOBALS['user_specific_array']['user']['login']; ?></title>
    <?php commonHeader(); ?>
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/hulutera.unminified.css" rel="stylesheet">
    <link href="../../css/font-awesome.min.css" rel="stylesheet">

</head>
<style>
    .alert-custom {
        color: #a94442;
    }
</style>

<body>
    <?php headerAndSearchCode("");
    ?>
    <div class="row">

        <?php
        ///reset/cleanup session variables
        if (!isset($_GET['function']) or $_GET['function'] !== 'login' or isset($_SESSION['lan'])) {
            unset($_SESSION['POST']);
            unset($_SESSION['errorRaw']);
        }
        $sessionName = 'login';
        $_SESSION['previous'] = basename($_SERVER['PHP_SELF']);
        $_SESSION['lan'] = isset($_GET['lan']) ? $_GET['lan'] : "en";

        if (!isset($_SESSION[$sessionName])) {
            $object = new HtUserAll("*");
            $object->login();
            $_SESSION[$sessionName] = base64_encode(serialize($object));
        } else {
            $object = unserialize(base64_decode($_SESSION[$sessionName]));
            $object->login();
        }
        ?>
    </div>
    <?php footerCode(); ?>
    <script>
        function myFunction() {
            var x1 = document.getElementById("fieldPassword");
            var x2 = document.getElementById("fieldPasswordRepeat");
            x1.type = (x1.type === "password") ? "text" : "password";
            x2.type = (x2.type === "password") ? "text" : "password";
        }
    </script>
</body>

</html>