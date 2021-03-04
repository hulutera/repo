<?php
session_start();
ob_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
require_once $documnetRootPath . '/includes/validate.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $GLOBALS['user_specific_array']['user']['activate']; ?></title>
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

    headerAndSearchCode("");

    ?>
    <div id="whole">
        <div id="wrapper" style="text-align:justify;">

            <div class="row">
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <?php
                    if (isset($_GET['lan'])) {
                        $lang_url = "&lan=" . $_GET['lan'];
                    } else {
                        $lang_url = "";
                    }
                    $_SESSION['lan'] = isset($_GET['lan']) ? $_GET['lan'] : "en";

                    if (!isset($_GET['function']) or ($_GET['function'] !== "register") or !isset($_GET['key'])) {
                        header('Location : ../index.php' . $lang_url);
                    }

                    if (isset($_GET['function']) && isset($_GET['id']) && $_GET['function'] == "register") {
                        $id = $_GET['id'];
                        $activation = $_GET['key'];
                        $userTemp = new HtUserTemp((int)$id);
                        if ($userTemp->getFieldActivation() == $activation) {
                            $userAll = new HtUserAll();
                            $userAll->setFieldValues($userTemp);
                            $userAll->setFieldAccountStatus("active");
                            $userAll->insert();
                        }
                        //remove from temp table
                        $userTemp->delete((int)$id);
                        //unset($userTemp);
                        echo '<p class="h4 text-success">' . $GLOBALS['lang']['account activated message'] . '</p>';
                    } else { // for password recovery case

                        ///decrypt informations
                        $crypto = new Cryptor();
                        $result = $crypto->urldecode_base64_decode_decryptor($_GET['key']);
                        $resultFinal = explode("&", $result);
                        //get key
                        $_SESSION['activationKey'] = $_GET['key'];
                        /// extract information
                        $userId = 0;
                        $activation = $newPass = $tempPassword = "";
                        foreach ($resultFinal as $key => $value) {
                            list($k, $v) = explode("=", $value);
                            switch ($k) {
                                case 'activation':
                                    $activation = (string)$v;
                                    break;
                                case 'id':
                                    $id = (int)$v;
                                    break;
                                case 'newPass':
                                    $newPass = (string)$v;
                                    break;
                                case 'tempPassword':
                                    $tempPassword = (string)$v;
                                    break;
                                case 'useTempPassword':
                                    $tempPassword = (string)$v;
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                        }
                        /// get user with Id
                        $user = new HtUserAll($id);

                        /// check if user activation in database is same as the activation link
                        if ($user->getFieldActivation() == $activation) {
                            //login user with the temporary password
                            echo '<p class="h1 text-success">Your account is activated</p>';
                            $string = str_replace(' ', '', $_GET['key']);
                            $email = $user->getFieldEmail();
                            $data = "fieldPassword=" . $tempPassword . "&fieldEmail=" . $email;
                            $result = $crypto->encryptor(base64_encode($data));
                            $user->setFieldNewPassword($crypto->encryptor(base64_encode($tempPassword)));
                            $user->setFieldPassword($crypto->encryptor(base64_encode($tempPassword)));
                            $user->setFieldActivation(null);
                            echo '<form class="form-horizontal" action="../../includes/form_user.php?function=login' . $lang_url . '" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="auto-login" value="' . $result . '">
                      <button type="submit" class="btn btn-lg btn-primary btn-link text-primary" name="submit_param" value="submit_value" class="link-button">
                      Click here to login and continue to use your temporary password
                      </button>
                </form>';
                        } else {
                            unset($crypto);
                            unset($user);
                            header('Location: ./prompt.php?type=404');
                        }
                        unset($crypto);
                        unset($user);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php

    footerCode();

    ?>
</body>

</html>