<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/redirect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/validate.php';

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
    <?php
    if (!isset($_GET['release'])) {
        headerAndSearchCode("");
    }
    ?>
    <div id="whole">
        <div id="wrapper">
            <div id="main_section">
                <div id="mainColumn">
                    <div class="widget-content properties-grid">

                        <?php
                        ///reset/cleanup session variables
                        $email = loginWithGoogle();
                        if (isset($email)) {

                            $sql =  array('sql' => "SELECT * FROM user_all WHERE field_email = \"$email\" ");

                            $userAll = new HtUserAll($sql);
                            $result = $userAll->getResultSet();
                            if ($result->num_rows !== 0) {
                                if (session_status() !== PHP_SESSION_ACTIVE) {
                                    session_start();
                                } else {
                                    $_SESSION['uID'] = $userAll->getId();
                                    $_SESSION['time'] = time();
                                }

                                if ($userAll->canUpdate())
                                    header("Location: ../../index.php" . $lang_url);
                                else
                                    header("Location: ../../includes/mypage.php" . $lang_url);
                            }
                            else{
                                header('Location: ../../includes/register.php?email='.$email. $str_url);
                            }
                        }

                        if (!isset($_GET['function']) or $_GET['function'] !== 'login' or $_SESSION['lan'] != $_GET['lan']) {
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
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!isset($_GET['release'])) {
        footerCode();
    }
    ?>
    <script>
        function showPassword() {
            var x1 = document.getElementById("fieldPassword");
            var x2 = document.getElementById("fieldPasswordRepeat");
            x1.type = (x1.type === "password") ? "text" : "password";
            x2.type = (x2.type === "password") ? "text" : "password";
        }
    </script>
</body>

</html>