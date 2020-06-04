<?php
session_start();
$documnetRootPath = $_SERVER['DOCUMENT_ROOT'];

require_once $documnetRootPath . '/includes/headerSearchAndFooter.php';
require_once $documnetRootPath . '/includes/message.php';
require_once $documnetRootPath . '/classes/reflection/HtUserAll.php';
require_once $documnetRootPath . '/includes/validate.php';
require_once $documnetRootPath . '/includes/cmn.content.php';
require_once $documnetRootPath . '/includes/common.inc.php';

?>


<!DOCTYPE html>
<html>

<head>
    <?php commonHeader(); ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
    <!-- Our Custom CSS -->

    <!-- Font Awesome JS -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->
    <!-- <link href="../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/hulutera.unminified.css" rel="stylesheet">
    <link href="../../css/font-awesome.min.css" rel="stylesheet"> -->

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
                <h3>Hulutera Admin Panel</h3>
                <strong>HT</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <?php
                    echo <<<EOD
                    <a href="./admin.php{$lang_url}&order=open&function=edit-profile">
                    <i class="fas fa-user"></i>
                    Your Profile
                    </a>
EOD;
                    ?>
                </li>
                <li>
                    <?php
                    echo <<<EOD
                    <a href="./admin.php{$lang_url}&order=open&function=message">
                    <i class="fas fa-envelope"></i>
                    Messages
                    </a>
EOD;
                    ?>
                    <!-- <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                        <i class="fas fa-copy"></i>
                        Actions List
                    </a> -->
                    <!-- <ul class="collapse list-unstyled" id="pageSubmenu"> -->
                <li>
                    <a href="#" class="text-info bg-dark"><i class="fas fa-users"></i> All Users</a>
                </li>

                <li>
                    <?php
                    echo <<<EOD
                    <a href="./admin.php{$lang_url}&order=open&function=activity-table">
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
                    <a href="../../index.php" class="text-uppercase font-weight-bold">
                        <i class="fas fa-home"></i>
                        To Hulutera.com
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->

        <div id="mainColumn">

            <h2>Welcome to your Admin Panel Abiy</h2>

            <?php
            if (isset($_GET['function'])) {
                if ($_GET['function'] == 'edit-profile') {
                    editProfile();
                } else if ($_GET['function'] == 'message') {
                    message();
                }
                if ($_GET['function'] == 'activity-table') {
                    activityTable();
                }
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

        function showPassword() {
            var fieldPassword = document.getElementById("fieldPassword");
            var fieldPasswordRepeat = document.getElementById("fieldPasswordRepeat");
            var fieldPasswordRepeat2 = document.getElementById("fieldPasswordRepeat2");
            fieldPassword.type = (fieldPassword.type === "password") ? "text" : "password";
            fieldPasswordRepeat.type = (fieldPasswordRepeat.type === "password") ? "text" : "password";
            fieldPasswordRepeat2.type = (fieldPasswordRepeat2.type === "password") ? "text" : "password";
        }

        $(document).ready(function() {
            $("#activity-search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#activity-table tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        // $(document).ready(function() {
        //     $('#dtBasicExample').DataTable();
        //     $('.dataTables_length').addClass('bs-select');
        // });

        $(document).ready(function() {
            $('#dtBasicExample').DataTable({
                "scrollX": true
            });
            $('.dataTables_length').addClass('bs-select');
        });

        $(document).ready(function() {

            // $(".myBtn").click(function() {
            //     var id = $(this).attr('id');
            //     $('#myModal').modal('show');
            //     var idStr = id.toString();
            //     var array = idStr.split('_');
            //     if (array[1].indexOf("delete") >= 0)
            //     {
            //         $('#myModal .modal-title').text('Action :' + array[1].toUpperCase());
            //         $('#myModal .modal-body').text('Are you sure you want to change status to '+  array[1] + '?');
            //     }
            //     if (array[1].indexOf("activate") >= 0)
            //     {
            //         $('#myModal .modal-title').text('Action :' + array[1].toUpperCase());
            //         $('#myModal .modal-body').text('Are you sure you want to change status to '+  array[1] + '?');
            //     }


            // });
        });
    </script>

</body>

</html>