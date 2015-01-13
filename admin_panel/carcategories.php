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
                    <div id="carCategoriesTableContainer" style="width:400px; margin-top: 10px"></div>

                            <script type="text/javascript">

                                $(document).ready(function () {

                                    //Prepare jTable
                                    $('#carCategoriesTableContainer').jtable({
                                        title: 'Car Categories',
                                        actions: {
                                            listAction: 'ajax_scripts/carCategoriesActions.php?action=list',
                                            createAction: 'ajax_scripts/carCategoriesActions.php?action=create',
                                            updateAction: 'ajax_scripts/carCategoriesActions.php?action=update',
                                            deleteAction: 'ajax_scripts/carCategoriesActions.php?action=delete'
                                        },
                                        fields: {
                                            id: {
                                                key: true,
                                                create: false,
                                                edit: false,
                                                list: false
                                            },
                                            name: {
                                                title: 'Category',
                                                width: '30%'
                                            }
                                        }
                                    });

                                    //Load person list from server
                                    $('#carCategoriesTableContainer').jtable('load');

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
