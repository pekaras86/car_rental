<?php

require_once ('admin_views.php');

// Requires the <HEAD></HEAD> part of the page
display_head("Thessaloniki Car Rentals Administration");

// Requires the navbar
$tag = "carLocations";
display_navbar($tag);

?>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="carLocationsTableContainer" style="width: 600px; margin-top: 10px"></div>

                            <script type="text/javascript">

                                $(document).ready(function () {

                                    //Prepare jTable
                                    $('#carLocationsTableContainer').jtable({
                                        title: 'Car Locations',
                                        actions: {
                                            listAction: 'ajax_scripts/carLocationsActions.php?action=list',
                                            createAction: 'ajax_scripts/carLocationsActions.php?action=create',
                                            updateAction: 'ajax_scripts/carLocationsActions.php?action=update',
                                            deleteAction: 'ajax_scripts/carLocationsActions.php?action=delete'
                                        },
                                        fields: {
                                            id: {
                                                key: true,
                                                create: false,
                                                edit: false,
                                                list: false
                                            },
                                            name: {
                                                title: 'Location Name',
                                                width: '30%'
                                            },
                                            description: {
                                                title: 'Description',
                                                width: '30%',
                                                defaultValue: null // defaultvalue: null simainei oti to pedio den einai ypoxrewtiko
                                            },
                                            lat: {
                                                title: 'Latitude',
                                                width: '20%',
                                                defaultValue: 0

                                            },
                                            long: {
                                                title: 'Longitude',
                                                width: '20%',
                                                defaultValue: 0
                                            }
                                        }
                                    });

                                    //Load person list from server
                                    $('#carLocationsTableContainer').jtable('load');

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
