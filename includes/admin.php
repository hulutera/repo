<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/headerSearchAndFooter.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/validate.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/cmn.content.php';
?>


<!DOCTYPE html>
<html>

<head>
    <?php commonHeader(); ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title><?php echo $GLOBALS['lang']['admin-panel'];?></title>


    <link rel="stylesheet" href="../../css/style4.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <style>
        .dtHorizontalExampleWrapper {
            max-width: 600px;
            margin: 0 auto;
        }

        #dtBasicExample th,
        td {
            white-space: nowrap;
        }

        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }
    </style>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">

                <?php
                $user = new HtUserAll($_SESSION['uID']);
                echo '<h4>Hi! ' . $user->getFieldUserName() . '</h4>';

                ?>
                <strong>HT</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <?php
                    echo <<<EOD
                    <a   href="./admin.php{$lang_url}&order=open&function=edit-profile">
                    <i class="fas fa-user"></i>
                    Your Profile
                    </a>
EOD;
                    ?>
                </li>
                <li>

                    <?php
                    $style1 = "";
                    $style2 = "";
                    if ((isset($_GET['function']) && $_GET['function'] == 'all-users') ||
                        (isset($_GET['allUserId']) && $_GET['allUserId'] !== '')
                    ) {
                        $style1 = ' style="background-color:white;"';
                    }
                    echo <<<EOD
                    <a   href="./admin.php{$lang_url}&order=open&function=all-users" '.$style1.'">
                    <i class="fas fa-users"></i>
                    All Users
                    </a>
EOD;
                    ?>

                </li>

                <li>
                    <?php
                    if ((isset($_GET['function']) && $_GET['function'] == 'activity-table') ||
                        (isset($_GET['activityTableId']) && $_GET['activityTableId'] !== '')
                    ) {
                        $style2 = ' style="background-color:white;"';
                    }
                    echo <<<EOD
                    <a   href="./admin.php{$lang_url}&order=open&function=activity-table" '.$style2.'>
                    <i class="fas fa-crosshairs"></i>
                    Activity Table
                    </a>
EOD;
                    ?>
                </li>
                <?php

                ?>
                <!-- </ul> -->
                </li>
                <li>
                    <a   href="../../index.php" class="text-uppercase font-weight-bold">
                        <i class="fas fa-home"></i>
                        To Hulutera.com
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->

        <div id="mainColumn">
            <?php
            if ((isset($_GET['function']) && $_GET['function'] == 'edit-profile')) {
                editProfile();
            } else if ((isset($_GET['function']) && $_GET['function'] == 'all-users') || isset($_GET['allUserId'])) {
                allUsers();
            } else if ((isset($_GET['function']) && $_GET['function'] == 'activity-table') || isset($_GET['activityTableId'])) {
                activityTable();
            } else {
                adminWelcomePage();
            }
            ?>
        </div>
    </div>
    </div>


    <script type="text/javascript" charset="utf8" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });

        $(document).ready(function() {
            $("#activity-search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#activity-table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(document).ready(function() {
            $('#dtBasicExample').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
        });

        function ask() {
            var adminTask = document.getElementById("admin-task").value;
            var message = '';
            if (adminTask == 'field_status-erase') {
                message = 'Are you sure you want Close user account and delete data? ' +
                    '\n\nAfter this action user will be removed from hulutera.com' +
                    ' and any data in relation to the user will be erased and are unrecoverable.' +
                    ' \n\nIf you want to erase user click "OK" , otherwise "Cancel" to exit operation.';
            } else {
                return;
            }


            // 0 => ["field_privilege-default" => "Choose task"],
            // 1 => ["field_privilege-webmaster" => "Update user privilege to Webmaster"],
            // 2 => ["field_privilege-administrator" => "Update user privilege to Administrator"],
            // 3 => ["field_privilege-moderator" => "Update user privilege to Moderator"],
            // 4 => ["field_privilege-user" => "Update user privilege to User"],
            // 5 => ["field_status-activate" => "Activate user account"],
            // 6 => ["field_status-deactivate" => "Deactivate user account"],
            // 7 => ["field_status-erase" => "Close user account"],
            return confirm(message);
        }
    </script>
</body>

</html>