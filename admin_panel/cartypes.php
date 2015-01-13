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
                    <div id="carTypesTableContainer" style="margin-top: 10px"></div>

                            <script type="text/javascript">

                                $(document).ready(function () {

                                    //Prepare jTable
                                    $('#carTypesTableContainer').jtable({
                                        title: 'Car Types',
                                        actions: {
                                            listAction: 'ajax_scripts/carTypesActions.php?action=list',
                                            //createAction: 'ajax_scripts/carTypesActions.php?action=create',
                                            updateAction: 'ajax_scripts/carTypesActions.php?action=update',
                                            deleteAction: 'ajax_scripts/carTypesActions.php?action=delete'
                                        },
                                        fields: {
                                            id: {
                                                key: true,
                                                create: false,
                                                edit: false,
                                                list: false
                                            },
                                            name: {
                                                title: 'Car Type Name',
                                                width: '30%'
                                            },
                                            pic_path: {
                                                title: 'pic_path',
                                                type: 'textarea',
                                                width: '20%'
                                            },
                                            description: {
                                                title: 'Description',
                                                width: '30%',
                                                type: 'textarea',
                                                defaultValue: null // defaultvalue: null simainei oti to pedio den einai ypoxrewtiko
                                            },
                                            price: {
                                                title: 'Price',
                                                width: '20%',
                                                defaultValue: 0

                                            }

                                        }
                                    });

                                    //Load person list from server
                                    $('#carTypesTableContainer').jtable('load');

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
