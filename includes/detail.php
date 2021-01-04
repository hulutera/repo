<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
global $lang;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php commonHeader(); ?>
    <title><?php echo $lang['My Items']; ?></title>
</head>

<body>
    <?php
    headerAndSearchCode("");
    ?>
    <div id="whole">
        <div id="wrapper">
            <div id="main_section">
                <div id="mainColumn">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                $item = $_GET['type'];
                                                $id = (int)$_GET['id'];
                                                (new  HtMainView($item, $id, 'active'))->showOneItemDetailed();
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php
                                                echo '<p class="h3">'.$lang['related items'].'</p>';
                                                ?>
                                                <?php
                                                $item = $_GET['type'];
                                                $skipId = (int)$_GET['id'];
                                                $skipPagination = true;
                                                (new HtMainView($item))->listRelatedItem('active');
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
    <?php commonHeaderJs();
    footerCode(); ?>
</body>

</html>