<?php

//require_once ('../scripts/app_config.php');
require_once ('../scripts/database_connection.php');
require_once ('../scripts/db_reservations.php');
require_once ('admin_views.php');

// Change status
if (isset($_GET['status']) && isset($_GET['reserv_id'])) {
    $reservation_status = $_GET['status'];
    $reserv_id = $_GET['reserv_id'];

    if ($reservation_status == 1) { //confirm reservation
        $change_status_query = "UPDATE reservations SET status_id = '1' WHERE id = '{$reserv_id}'";
        $change_status_result = mysqli_query($con, $change_status_query);

        echo <<<EOD
	<script>
	  alert('Your changes has been saved successfully!');
	</script>
EOD;

    } else if ($reservation_status == 2) {  //cancel reservation
        $change_status_query = "UPDATE reservations SET status_id = '2' WHERE id = '{$reserv_id}'";
        $change_status_result = mysqli_query($con, $change_status_query);

        echo <<<EOD
	<script>
	  alert('Your changes has been saved successfully!');
	</script>
EOD;

    } else if ($reservation_status == 3) {  //delete reservation
        $reserv_query = "SELECT * FROM reservations WHERE id='{$reserv_id}'";
        $reserv_result = mysqli_query($con, $reserv_query);
        $reserv_row = mysqli_fetch_array($reserv_result); //echo $reserv_row['customer_id'];

        $delete_query = "DELETE FROM customers WHERE id = '{$reserv_row['customer_id']}'";
        $delete_result = mysqli_query($con, $delete_query);

        $delete_query = "DELETE FROM reservations WHERE id = '{$reserv_id}'";
        $delete_result = mysqli_query($con, $delete_query);

        echo <<<EOD
 	<script>
	  alert('Your changes has been saved successfully!');
	</script>
EOD;

    }
}
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
                    <div class="col-lg-12" style="margin-top: 10px;margin-bottom: 10px">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped display" id="datatable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Purchaser</th>
                                    <th>Plate Number</th>
                                    <th>Pickup</th>
                                    <th>Drop Off</th>
                                    <th>Days</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //evresi kratisis
                                //$reserv_query = "SELECT * FROM reservations ORDER BY ID DESC LIMIT 20";
                                //$reserv_result = mysqli_query($con, $reserv_query);
                                $reserv_result = getLastReservations($con);
                                //echo $reserv_row['pickup_datetime'];

                                while($reserv_row = mysqli_fetch_array($reserv_result)) {

                                    //evresi customer
                                    $custom_query = "SELECT * FROM customers WHERE id='{$reserv_row['customer_id']}'";
                                    $custom_result = mysqli_query($con, $custom_query);
                                    $custom_row = mysqli_fetch_array($custom_result);
                                    //echo $custom_row['name'];

                                    //evresi oximatos
                                    $item_query = "SELECT * FROM car_items WHERE id='{$reserv_row['car_id']}'";
                                    $item_result = mysqli_query($con, $item_query);
                                    $item_row = mysqli_fetch_array($item_result);
                                    //echo $item_row['plate_number'];


                                    //sinolikes meres kratisis
                                    //$pickup_date = date('d-m-Y h:m:s', strtotime($reserv_row['pickup_datetime']));
                                    //$dropoff_date = date('d-m-Y h:m:s', strtotime($reserv_row['dropoff_datetime']));
                                    $diff = abs(strtotime($reserv_row['dropoff_datetime']) - strtotime($reserv_row['pickup_datetime']));
                                    $years = floor($diff / (365*60*60*24));
                                    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                                    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                    $total_days = $years + $months + $days;

                                    // Status twn enoikiasewn (confirmed - standby - cancelled)
                                    $status = $reserv_row['status_id'];

                                    if ($status == 0) {
                                        $color = 'red';
                                        $status_txt = 'Standby';
                                    } else if ($status == 1) {
                                        $color = 'green';
                                        $status_txt = 'Confirmed';
                                    } else if ($status == 2) {
                                        $color = 'red';
                                        $status_txt = 'Canceled';
                                    }
                 echo <<<EOD
			     <tr>
				  <td>{$reserv_row['id']}</td>
				  <td><a href="../rental_details.php?reserv_id={$reserv_row['id']}&total_days={$total_days}&status={$status}">{$reserv_row['reserv_date']}</a></td>
				  <td>Name:{$custom_row['name']} Last Name:{$custom_row['lastname']} email:{$custom_row['email']}</td>
				  <td>{$item_row['plate_number']}</td>
				  <td>{$reserv_row['pickup_datetime']}</td>
				  <td>{$reserv_row['dropoff_datetime']}</td>
				  <td>{$total_days}</td>
				  <td>{$reserv_row['amount']}</td>
				  <td style="color:{$color};">{$status_txt}</td>
				  <td style="text-align:center;"><img src="../images/other/delete.png" width="15" /></a></td>
				 </tr>
EOD;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php
    $jqScript = <<<EOD
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
    <script>
    $(document).ready( function () {
        $('#datatable').DataTable();

    });
    </script>
EOD;

// Requires the footer (JS declarations) part of the page
display_footer($jqScript);


