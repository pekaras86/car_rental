<?php

require_once ('admin_views.php');

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
                <div class="col-lg-12">

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

<?php

// Requires the footer (JS declarations) part of the page
display_footer();
