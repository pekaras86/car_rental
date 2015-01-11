<?php

// Requires the <HEAD></HEAD> part of a page
function display_head($page_title = "")
{
    echo <<<EOD
        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">

            <title>SB Admin 2 - Bootstrap Admin Theme</title>

            <!-- Bootstrap Core CSS -->
            <link href="../bootstrap-3.3.1/css/bootstrap.min.css" rel="stylesheet">

            <!-- MetisMenu CSS -->
            <link href="admin_components/metismenu/metisMenu.min.css" rel="stylesheet">

            <!-- Custom CSS -->
            <link href="admin_components/sb-admin2/sb-admin-2.css" rel="stylesheet">

            <!-- Custom Fonts -->
            <link href="admin_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

            <link href="http://code.jquery.com/ui/1.11.2/themes/ui-lightness/jquery-ui.css" rel="stylesheet">

            <!-- jquery datatables -->
            <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">

            <!-- jtable.org CSS -->
            <link href="../plugins/jtable/themes/metro/blue/jtable.css" rel="stylesheet" type="text/css" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

        </head>
EOD;
}

// Requires the navbar
function display_navbar($tag = NULL)
{
    $dashboard = NULL;
    $carLocations = NULL;
    $carCategories = NULL;
    $lastReservations = NULL;

    switch($tag) {
        case "dashboard":
            $dashboard = "active";
            break;
        case "carLocations":
            $carLocations = "active";
            break;
        case "carCategories":
            $carCategories = "active";
            break;
        case "lastReservations":
            $lastReservations = "active";
            break;
    }
    echo <<<EOD
        <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Thessaloniki Car Rental Administration</a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="<?php {$dashboard} ?>">
                                <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li class="<?php {$lastReservations} ?>">
                                <a href="last_reservations.php"><i class="fa fa-table fa-fw"></i> Latest Reservations</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-table fa-fw"></i> Tables<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li class="<?php {$carLocations} ?>">
                                        <a href="carlocations.php">Car Locations</a>
                                    </li>
                                    <li class="<?php {$carCategories} ?>">
                                        <a href="car_categories.php">Car Categories</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>
EOD;
}


// Requires the footer part of the page
function display_footer($jqScripts)
{

    echo <<<EOD
        <!-- jQuery -->

            <!-- Placed at the end of the document so the pages load faster -->


            <!-- Bootstrap Core JavaScript -->
            <script src="../bootstrap-3.3.1/js/bootstrap.min.js"></script>

            <!-- Metis Menu Plugin JavaScript -->
            <script src="admin_components/metismenu/metisMenu.min.js"></script>

            <!-- Custom Theme JavaScript -->
            <script src="admin_components/sb-admin2/sb-admin-2.js"></script>

            {$jqScripts}
        </body>

        </html>
EOD;
}
