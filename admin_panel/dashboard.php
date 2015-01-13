<?php

require_once ('admin_views.php');
require_once ('../scripts/database_connection.php');
require_once('db.php');

// Requires the <HEAD></HEAD> part of the page
display_head("Thessaloniki Car Rentals Administration");

// Requires the navbar
$tag = "last_reservations";
display_navbar($tag);

?>

    <!-- Page Content -->
    <div id="page-wrapper">
       <div class="container-fluid">
       <div class="row">
            <!-- /.row -->
           <div class="row">
               <div class="col-lg-12">
                   <h2 class="page-header"> Car Reservations Overview</h2>
               </div>
               <!-- /.col-lg-12 -->
           </div>
           <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"> <?php echo getReservationsCountbyDate($con, date('Y-m-d')); ?> </div>
                                    <div>New Reservations Today!</div>
                                    <div><?php echo date('d/m/Y') ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo getWeekReservationsCountbyDate($con, date('Y-m-d')); ?></div>
                                    <div>Reservations this week!</div>
                                    <div><?php echo getWeekDates(getYearOfDate(date('Y-m-d')),getWeekIndexByDate(date('Y-m-d')), true,2) . " - " . getWeekDates(getYearOfDate(date('Y-m-d')),getWeekIndexByDate(date('Y-m-d')), false ,2) ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo getMonthReservationsCountbyDate($con, date('Y-m-d')); ?></div>
                                    <div>Reservations this month!</div>
                                    <div><?php echo date('01/m/Y') . " - " . date('t/m/Y')  ?></div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
            <!-- /.row -->
            <!-- /.row -->
         </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

<?php

// Requires the footer (JS declarations) part of the page
display_footer('');
