<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath.'/includes/headerSearchAndFooter.php';
require_once $documnetRootPath.'/includes/cmn.user.php';
require_once $documnetRootPath.'/classes/cmn.class.php';

 require_once $documnetRootPath.'/db/database.class.php';

 global $connect, $lang, $str_url, $lang_url;
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Mypage</title>
<?php commonHeader();?>
</head>
<body>
    <div id="whole">
        <div id="wrapper">
            <?php headerAndSearchCode(""); ?>
            <div id="main_section">
				<div id="mainColumn">
                    <div id="mypage-list">
                        <ul>
                            <?php echo  '<li class="list-header"> ' . $lang['my activities'] . '</li>
                                        <a href="../../includes/template.proxy.php?type=help' .$str_url. '"><li>' .$lang['My Items']. '</li></a>
                                        <a href="../../includes/upload.php' . $lang_url. '"><li> ' . $lang['Post Items'] . ' </li></a>
                                        <a href="../../includes/editProfile.php' .$lang_url. '"><li> ' . $lang['Edit Profile'] . ' </li></a>
                                        <a href="../../includes/logout.php' .$lang_url. '"><li> ' . $lang['Logout'] . ' </li></a>'; 
                            ?>                      
                        </ul>
                    </div>  
                    <div class="login-msg"><img src="../images/login_welcome.jpg" align="left"/> <p><?php echo $lang['my-page msg'] . '<a href="../../includes/template.proxy.php?type=contact' .$str_url.'">' . $lang['here'] . '</a>';?></p> </div>
                </div>
                
            </div>

        </div>    
        <div class="push"></div>
    </div>
    <?php footerCode(); ?>
</body>
</html>
