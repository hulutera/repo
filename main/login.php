<?php
global $connect;
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
 $errMsg = array(
     20 => "Login is success",
     21 => "Please enter your e-mail/እባክዎ የኢሜይል አድራሻ ያስገቡ።",
     22 => "Please enter the password./እባክዎ የሚስጥር ቃል ያስገቡ።",
     23 => "Please enter your e-mail and password.</br>እባክዎ የኢሜይል አድራሻ እና  የሚስጥር ቃል  ያስገቡ።",
     24 => "Your e-mail is invalid./ያስገቡት ኢሜይል ትክክል አይደለም።",
     25 => "Invalid e-mail or password. ኢሜይል  ወይም የምስጢር ቃል ትክክል አይደለም።",
     26 => "There is no user registered with this e-mail./ባስገቡት ኢሜይል አድራሻ  የተመዘገበ ደንበኛ የለንም ",
); 
 require_once $documnetRootPath.'/inc/headerSearchAndFooter.php';
 require_once $documnetRootPath.'/cmn/cmn.user.php';
 require_once $documnetRootPath.'/cmn/cmn.class.php';
if(isset($_POST['submit']))
{
	session_start();
	$result2 = userLogin($_POST['email'], $_POST['password']);
    if($result2 == 20) 
    {
        header('Location:../index.php');
    }
    else {
        $errorShow = $errMsg[$result2];
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
                    <form id="generalform" class="signin" method="post"
                        action="../main/login.php">
                        <div id="login-box">
                            <table>
                                <tr class="logInCol">
                                    <td class="logInHeader">
                                        <div class="logInHeaderEn">Log In</div>
                                        <div class="logInHeaderAm">ይግቡ</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="logInEmail">
                                        <div class="logInEmailEn">e-mail</div>
                                        <div class="logInEmailAm">ኢ-ሜይል</div>
                                    </td>
                                    <td><input id="username" name="email"
                                        value="<?php echo $_POST['email'];?>" type="text"
                                        autocomplete="on" placeholder="e-mail (ኢ-ሜይል)"></td>
                                </tr>
                                <tr>
                                    <td class="logInPassword">
                                        <div class="logInPasswordEn">Password</div>
                                        <div class="logInPasswordAm">የምስጢር ቃል</div>
                                    </td>
                                    <td><input id="password" name="password" value=""
                                        type="password" placeholder="password (የምስጢር ቃል)"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="logInButton"><div class="inputButton" ><input type="submit" name="submit"
                                        id="submit" class="button" value="Log In" /></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <div class="logInPassRecovery">
                                            <a class="forgot" href="../main/passRecovery.php">Forgot your
                                                password/የምስጢር ቃሎ ጠፋብዎ?</a>
                                        </div>

                                        <div class="logInRegister">
                                            <a class="forgot" href="../main/register.php">Register/ይመዝገቡ!</a>
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
