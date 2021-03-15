<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/validate.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $GLOBALS['user_specific_array']['user']['passwordRecovery'][0]; ?></title>
    <?php commonHeader(); ?>
</head>

<body>
    <?php headerAndSearchCode("");
    ?>
    <div id="whole">
        <div id="wrapper">
            <div id="main_section">
                <div id="mainColumn">
                    <div class="widget-content properties-grid">


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
                </div>
            </div>
        </div>
    </div>
    <?php footerCode(); ?>
</body>

</html>