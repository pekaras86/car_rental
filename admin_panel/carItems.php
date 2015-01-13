<?php

require_once ('admin_views.php');

// Requires the <HEAD></HEAD> part of the page
display_head("Thessaloniki Car Rentals Administration");

// Requires the navbar
$tag = "caTypes";
display_navbar($tag);

?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="carItemsTableContainer" style="margin-top: 10px"></div>

                            <script type="text/javascript">

                                $(document).ready(function () {

                                    //Prepare jTable
                                    $('#carItemsTableContainer').jtable({
                                        title: 'Car Items',
                                        actions: {
                                            listAction: 'ajax_scripts/carItemsActions.php?action=list',
                                            createAction: 'ajax_scripts/carItemsActions.php?action=create',
                                            updateAction: 'ajax_scripts/carItemsActions.php?action=update',
                                            deleteAction: 'ajax_scripts/carItemsActions.php?action=delete'
                                        },
                                        fields: {
                                            id: {
                                                key: true,
                                                create: false,
                                                edit: false,
                                                list: false
                                            },
                                            plate_number: {
                                                title: 'Plate Number',
                                                width: '10%'
                                            },
                                            car_type_id: {
                                                title: 'Car Type',
                                                width: '30%',
                                                options: 'ajax_scripts/carItemsActions.php?action=getCarTypes'
                                            },
                                            location_ID: {
                                                title: 'Car Location',
                                                width: '30%',
                                                options: 'ajax_scripts/carItemsActions.php?action=getCarLocations'
                                            }


                                        }
                                    });

                                    //Load person list from server
                                    $('#carItemsTableContainer').jtable('load');

                                });

                            </script>
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
    <!-- jtable.org jquery plugin -->
        <script src="../plugins/jtable/jquery.jtable.min.js" type="text/javascript"></script>
EOD;

// Requires the footer (JS declarations) part of the page
display_footer($jqScript);
