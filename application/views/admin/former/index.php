<?php $this->load->view('admin/partials/admin_header.php'); ?>
<style>

    /* Tabs container */
    .r-tabs {
        position: relative;

        background-color: #3c8dbc;

        border-top: 1px solid #3c8dbc;
        border-right: 1px solid #3c8dbc;
        border-left: 1px solid #3c8dbc;
        border-bottom: 4px solid #3c8dbc;
        border-radius: 4px;

    }

    /* Tab element */
    .r-tabs .r-tabs-nav .r-tabs-tab {
        position: relative;
        background-color: #3c8dbc;
    }

    /* Tab anchor */
    .r-tabs .r-tabs-nav .r-tabs-anchor {
        display: inline-block;
        padding: 10px 12px;

        text-decoration: none;
        text-shadow: 0 1px rgba(0, 0, 0, 0.4);
        font-size: 14px;
        font-weight: bold;
        color: #fff;
    }

    /* Disabled tab */
    .r-tabs .r-tabs-nav .r-tabs-state-disabled {
        opacity: 0.5;
    }

    /* Active state tab anchor */
    .r-tabs .r-tabs-nav .r-tabs-state-active .r-tabs-anchor {
        color: #3c8dbc;
        text-shadow: none;

        background-color: white;

        border-top-right-radius: 4px;
        border-top-left-radius: 4px;
    }

    /* Tab panel */
    .r-tabs .r-tabs-panel {
        background-color: white;

        border-bottom: 4px solid white;

        border-bottom-right-radius: 4px;
        border-bottom-left-radius: 4px;

    }

    /* Accordion anchor */
    .r-tabs .r-tabs-accordion-title .r-tabs-anchor {
        display: block;
        padding: 10px;

        background-color: #3c8dbc;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
        text-shadow: 0 1px rgba(0, 0, 0, 0.4);
        font-size: 14px;

        border-top-right-radius: 4px;
        border-top-left-radius: 4px;
    }

    /* Active accordion anchor */
    .r-tabs .r-tabs-accordion-title.r-tabs-state-active .r-tabs-anchor {
        background-color: #fff;
        color: #3c8dbc;
        text-shadow: none;
    }

    /* Disabled accordion button */
    .r-tabs .r-tabs-accordion-title.r-tabs-state-disabled {
        opacity: 0.5;
    }

    .r-tabs .r-tabs-nav {
        margin: 0;
        padding: 0;
    }

    .r-tabs .r-tabs-tab {
        display: inline-block;
        margin: 0;
        list-style: none;
    }

    .r-tabs .r-tabs-panel {
        padding: 15px;
        display: none;
    }

    .r-tabs .r-tabs-accordion-title {
        display: none;
    }

    .r-tabs .r-tabs-panel.r-tabs-state-active {
        display: block;
    }

    .right_col{
        min-height: 1250px !important;
    }

    /* Accordion responsive breakpoint */
    @media only screen and (max-width: 768px) {
        .r-tabs .r-tabs-nav {
            display: none;
        }

        .r-tabs .r-tabs-accordion-title {
            display: block;
        }
    }

</style>
<link href="<?php echo base_url("assets/build/css/main.css"); ?>" rel="stylesheet">
<!-- page content -->
<div class="right_col" role="main">
    <div class="productsList">
        <div class="page-title">
            <div class="title_left">
                <h3>Formateurs</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                   Liste des formateurs
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <div class="x_content">
                            <table id="datatable-users"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th><?= lang('name'); ?></th>
                                    <th><?= lang('last_name'); ?></th>
                                    <th>Certifié</th>
                                    <th>Thème</th>
                                    <th>Nombre de formations</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th><?= lang('name'); ?></th>
                                    <th><?= lang('last_name'); ?></th>
                                    <th>Certifié</th>
                                    <th>Thème</th>
                                    <th>Nombre de formations</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ($formers as $former) {

                                    $certificated='Oui';
                                    if($former['certificated']==='false')
                                        $certificated='Non';
                                    ?>

                                    <tr>
                                        <td><?php echo $former["first_name"]; ?></td>
                                        <td><?php echo $former["last_name"]; ?></td>
                                        <td><?php echo $certificated; ?></td>
                                        <td><?php echo $former["title"]; ?></td>
                                        <td><?php echo $former["count_trainings"]; ?></td>
                                        <td>
                                            <a href=" <?php echo base_url(); ?>admin/former/editFormer/<?php echo $former['id']; ?>"
                                               class="btn btn-primary  btn-xs"><i class="fa fa-pencil"></i> Modifier</a>
                                            <button data-id="<?php echo $former['id']; ?>" class="btn btn-danger delete btn-xs"><i class="fa fa-tash"></i> Supprimer</button>
                                            <!--<a href=" <?php /*echo base_url(); */?>admin/trainee/show/<?php /*echo $user['id']; */?>"
                                               class="btn btn-info  btn-xs"><i class="fa fa-eye"></i></a>-->
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- /content -->
                        <?php if ($params["addUsers"] === "true") : ?>
                            <div class="text-right">
                                <button class="btn btn-info action"
                                        onclick="window.location.href='<?php echo base_url("admin/former/create"); ?>'">
                                    <span></span>Nouveau
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                    </div><!-- /content -->
            </div>
        </div>
            <!-- /x-panel -->
    </div>
</div>


<?php $this->load->view('admin/partials/admin_footer'); ?>
<script src="<?php echo base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?php echo base_url('assets/vendors/blueimp/js/vendor/jquery.ui.widget.js') ?>"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- blueimp Gallery script -->
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url('assets/vendors/blueimp/js/jquery.iframe-transport.js') ?>"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url('assets/vendors/blueimp/js/jquery.fileupload.js') ?>"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url('assets/vendors/blueimp/js/jquery.fileupload-process.js') ?>"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url('assets/vendors/blueimp/js/jquery.fileupload-image.js') ?>"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url('assets/vendors/blueimp/js/jquery.fileupload-audio.js') ?>"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url('assets/vendors/blueimp/js/jquery.fileupload-video.js') ?>"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url('assets/vendors/blueimp/js/jquery.fileupload-ui.js') ?>"></script>


<script>
    var deleteFormer_url='<?php echo base_url("admin/api/former/apiDelete"); ?>';
</script>
<script src="<?php echo base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-users").length) {
                $("#datatable-users").DataTable({
                    responsive: true,
                    aaSorting:[],
                    "language": {
                        "url": "<?php echo base_url("assets/vendors/datatables.net/French.json"); ?>"
                    }
                });
            }
        };

        TableManageButtons = function () {
            "use strict";
            return {

                init: function () {
                    handleDataTableButtons();
                }
            };
        }();

        TableManageButtons.init();
    });
</script>




<script>
    $(document).ready(function () {
        $('button.delete').on('click',function () {
           var id = $(this).attr('data-id');
           var data={
               'former_id':id
           };
            swal({
                    title: "Attention ! ",
                    text: swal_warning_delete_lang,
                    type: "warning",
                    showConfirmButton: true,
                    showCancelButton: true,
                    cancelButtonText: 'Non',
                    confirmButtonText: 'Oui'
                },
                function () {
                    apiRequest(deleteFormer_url,data);
                }
            );
        });
    });
</script>


