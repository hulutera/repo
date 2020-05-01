<?php
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];
require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/cmn.user.php';
require_once $documnetRootPath . '/classes/cmn.class.php';

require_once $documnetRootPath . '/db/database.class.php';


global $connect, $lang, $str_url, $lang_url;
if (!isset($_SESSION['uID'])) {
    header('Location: ../../index.php' . $lang_url);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $lang['my page']; ?></title>
    <?php commonHeader(); ?>
    <link href="../../css/hulutera.unminified.css" rel="stylesheet">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div id="whole">
        <div id="wrapper">
            <?php headerAndSearchCode(""); ?>
            <div id="main_section">
                <div class="container-fluid alert alert-info" role="alert" style="color:black;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="h1 font-weight-bold">
                                        
                                            <?php echo $GLOBALS['lang']['my page header']; ?>
                                        
                                    </p>
                                    <p class="h3">
                                        <?php echo $GLOBALS['lang']['my-page msg']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-left:5%;margin-right:5%;">
                                    <div class="col-md-5" style="margin:20px; padding:20px; border-radius:15px;border:1px solid #c7c7c7;background-color:whitesmoke">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="../images/allitems.svg" style="margin-top:25%;width:100%;" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                        <p class="h2 font-weight-bold">
                                                                <?php echo $GLOBALS['lang']['My Items']; ?>
</p>
                                                        </div>
                                                        <div class="row">
                                                            <p>
                                                                <?php echo $lang['my-page msg2'] . ''; ?>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?php
                                                                echo '
                                                    <a href="../..//includes/template.content.php?type=userActive' .
                                                                    $str_url . '" type="button" class="btn btn-primary btn-lg active" 
                                                                style="float:right;">' . $lang['to my items'] . '</a>';

                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5" style="margin:20px; padding:20px; border-radius:15px;border:1px solid #c7c7c7;background-color:whitesmoke">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="../images/profile.svg" style="margin-top:25%;width:100%;" />
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <p class="h2 font-weight-bold">
                                                                <?php echo $GLOBALS['lang']['my profile']; ?>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <p>
                                                                <?php echo $lang['my-page msg3'] . ''; ?>
                                                            </p>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?php
                                                                echo '
                                                    <a href="../../includes/editProfile.php' . $lang_url . '&order=open" type="button" class="btn btn-primary btn-lg active" 
                                                                style="float:right;">' . $lang['to my profile'] . '</a>';

                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="push"></div>
        </div>
        <?php footerCode(); ?>
</body>

</html>