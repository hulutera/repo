<?php
global $connect, $lang;
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
$errorShow = "";
if (isset($_GET['lan'])) {
	$lang_url = "?&lan=" . $_GET['lan'];
}
else { 
	$lang_url = "";
}
 
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
require_once $documnetRootPath.'/includes/cmn.user.php';
require_once $documnetRootPath.'/classes/cmn.class.php';

 require_once $documnetRootPath.'/db/database.class.php';
 
if(isset($_POST['submit']))
{
    if(session_status() !== PHP_SESSION_ACTIVE)
	{
        session_start();
    }
	$result2 = userLogin($_POST['email'], $_POST['password']);
    
    if($result2 == "LOGIN_SUCCESS") 
    {
        header("Location:../../includes/mypage.php" . $login_url . "");
    }
    else {
        $errorShow = $result2;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Log In | ይግቡ </title>
<?php commonHeader();?>
</head>
<body>
    <div id="whole">
        <div id="wrapper">
            <?php headerAndSearchCode(""); ?>
            <div id="outerLogin">
                <div id="innerLogin">
                    <?php echo '<form id="generalform" class="signin" method="post"
                        action="../includes/login.php' . $lang_url . '">';?>
                        <div id="login-box">
                            <table>
                                <tr class="logInCol">
                                    <td class="logInHeader">
                                        <div class="logInHeaderEn"><?php echo $lang['login'];?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="logInEmail">
                                        <div class="logInEmailEn"><?php echo $lang['e-mail'];?></div>
                                    </td>
                                    <td><input id="username" name="email"
                                        value="" type="text"
                                        autocomplete="on" placeholder="<?php echo $lang['e-mail'];?>"></td>
                                </tr>
                                <tr>
                                    <td class="logInPassword">
                                        <div class="logInPasswordEn"><?php echo $lang['password'];?></div>
                                    </td>
                                    <td><input id="password" name="password" value=""
                                        type="password" placeholder="<?php echo $lang['password'];?>"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="logInButton"><div class="inputButton" ><input type="submit" name="submit"
                                        id="submit" class="button" value="<?php echo $lang['login'];?>" /></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="logInPassRecovery">
                                             <?php echo '<a class="forgot" href="../includes/passRecovery.php' . $lang_url . '">' . $lang['Forgot your password'] . ' </a> '; ?>
                                        </div>

                                        <div class="logInRegister">
                                            <?php echo '<a class="forgot" href="../includes/register.php' . $lang_url . '">' . $lang['Register'] . '</a>'; ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                    <div id="errorDisplay">
                        <?php echo $errorShow;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="push"></div>
    </div>
    <?php footerCode(); ?>
</body>
</html>
