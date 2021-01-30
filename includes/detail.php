<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
global $lang;
$item = $_GET['type'];
$id = (int)$_GET['id'];
$status = $_GET['status'];
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
                            <?php
                            $viewObject = new HtMainView($item, $id, $status);
                            if (isset($viewObject)) {
                                $viewObject->showOneItemDetailed();
                            }
                            unset($viewObject);
                            ?>
                        </div>
                        <div class="row">
                            <?php
                            $viewObject = new HtMainView($item);
                            if (isset($viewObject)) {
                                $viewObject->listRelatedItem($status);
                            }
                            unset($viewObject);
                            ?>

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