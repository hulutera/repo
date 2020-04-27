<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
require_once $documnetRootPath.'/includes/cmn.user.php';
require_once $documnetRootPath.'/classes/cmn.class.php';

 require_once $documnetRootPath.'/db/database.class.php';


 global $connect, $lang, $str_url, $lang_url;
if (!isset($_SESSION['uID'])) {
    header('Location: ../../index.php'.$lang_url);
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $lang['my page']; ?></title>
<?php commonHeader();?>
</head>
<body>
    <div id="whole">
        <div id="wrapper">
            <?php headerAndSearchCode(""); ?>
            <div id="main_section">
				<div id="mainColumn">
                    <div class="LeftNav" style="width:18%;box-sizing:border-box;margin-left:0px">
                        <ul>
                            <?php echo  '<li class="list-header" style="background-color:#378de5; color: #fff"> ' . $lang['my activities'] . '</li>
                                        <a href="../..//includes/template.content.php?type=userActive' .$str_url. '"><li>' .$lang['My Items']. '</li></a>
                                        <a href="../../includes/upload.php' . $lang_url. '"><li> ' . $lang['Post Items'] . ' </li></a>
                                        <a href="../../includes/editProfile.php' .$lang_url. '"><li> ' . $lang['Edit Profile'] . ' </li></a>
                                        <a href="../../includes/logout.php' .$lang_url. '"><li> ' . $lang['Logout'] . ' </li></a>'; 
                            ?>                      
                        </ul>
                    </div>  
                    <div class="login-msg"><img src="../images/login_welcome.jpg" align="left"/> 
                        <div class="welcome-txt"><p><?php echo $lang['my-page msg'] . '';?></p> </div>
                    </div>
                </div>
                
            </div>

        </div>    
        <div class="push"></div>
    </div>
    <?php footerCode(); ?>
</body>
</html>
