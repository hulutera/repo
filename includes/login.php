<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
require_once $documnetRootPath . '/includes/validate.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log In | ይግቡ </title>
    <?php commonHeader(); ?>
    <link href="../../css/hulutera.unminified.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .alert-custom {
        color: #a94442;
    }
</style>

<body>
    <div id="whole">
        <div id="wrapper">
            <?php //headerAndSearchCode(""); 
            ?>
            <div id="main_section">

                <?php
                ///reset/cleanup session variables
                if (isset($_SESSION['POST'])) {
                    if (!isset($_GET['function']) or $_GET['function'] !== 'login' or $_SESSION['lan'] != $_GET['lan']) {
                        unset($_SESSION['POST']);
                        unset($_SESSION['errorRaw']);
                    }
                }
                $_SESSION['lan'] = isset($_GET['lan']) ? $_GET['lan'] : "en";
                $sessionName = 'login';
                $_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

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
        </div>
        <div class="push"></div>
    </div>
    <?php //footerCode(); ?>
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