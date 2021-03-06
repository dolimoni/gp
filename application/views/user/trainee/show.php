<?php $this->load->view('user/partials/user_header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/blueimp/css/jquery.fileupload-ui.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/blueimp/css/jquery.fileupload.css') ?>">

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

    #previewTarget{
        height: 190px;
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

        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-6">
                            <?= lang('my_informations'); ?>
                        </div>
                        <!--<div class="col-md-6">
                            <div class="text-right">
                                <button class="btn btn-xs btn-info action"
                                        onclick="window.location.href='<?php /*echo base_url("admin/config/createUser"); */?>'">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </div>
                        </div>-->
                    </div>
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <div id="myTabContent" class="tab-content col-md-12 col-sm-12 col-xs-12">
                            <!--------------------------------------------Products Tab------------------------------------------------------>
                            <div role="tabpanel" class="tab-pane fade active in" id="tab_products"
                                 aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6 col-sm-8 col-xs-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label><?= lang('name'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $user['last_name']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label><?= lang('last_name'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $user['first_name']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label><?= lang('telephone'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $user['mobile']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label><?= lang('email'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $user['email']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label><?= lang('address'); ?></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <?php echo $user['address']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <br/>
                                        <!--<button class="btn btn-info action"
                                                onclick="window.location.href='<?php /*echo base_url("admin/config/editUser/" . $user['id']); */?>'">
                                            <span></span>Modifier
                                        </button>-->
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <img class="width100" id="previewTarget" src="<?= base_url($user['image']); ?>" alt="icon">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <form id="fileupload" action="<?php echo base_url('admin/subject/test'); ?>" method="POST" enctype="multipart/form-data">
                                            <fieldset>
                                                <div class="row mgtp10">
                                                    <div class="col-xs-12 col-md-12">
                                                       <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>Télécharger votre photo</span>
                                                        <input type="file" name="img" accept="image/*">
                                                        </span>
                                                        <a href="<?php echo base_url('user/trainee/edit'); ?>" class="btn btn-info">Modifier vos informations</a>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="text-center hidden">
                                                    <input class="btn btn-success" type="submit" name="add" value="<?= lang("add"); ?>"/>
                                                </div>
                                            </fieldset>

                                            <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--------------------------------------------End Products Tab------------------------------------------------------>
                        </div>



                    </div><!-- /content -->
            </div>
        </div>
            <!-- /x-panel -->
    </div>
</div>


<?php $this->load->view('user/partials/user_footer'); ?>
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
        var upload_url="<?php echo base_url('user/api/trainee/apiEditImage'); ?>";
        var uploads={};
        var base_url="<?php echo base_url(); ?>";
    </script>
<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-users").length) {
                $("#datatable-users").DataTable({
                    responsive: true,
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
        $('a.deleteUser').on('click', deleteUser);


        function deleteUser() {
            var user_id = $(this).attr('data-id');
            $(this).closest('tr').hide();
            swal({
                    title: "Attention ! ",
                    text: "Vous voulez vraiment supprimer cet utilisateur ?",
                    type: "warning",
                    showConfirmButton: true,
                    showCancelButton: true,
                    cancelButtonText: 'Non',
                    confirmButtonText: 'Oui'
                },
                function () {
                    $('#loading').show();
                    $.ajax({
                        url: "<?php echo base_url('admin/config/apiDeleteUser'); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {'user_id': user_id},
                        success: function (data) {
                            $('#loading').hide();
                            if (data.status === 'success') {
                                swal({
                                    title: "Success",
                                    text: "L'utilisateur a été bien supprimé",
                                    type: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                                location.reload();
                            }
                            else {
                                swal({
                                    title: "Erreur",
                                    text: "Une erreur s'est produite",
                                    type: "error",
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            }
                        },
                        error: function (data) {
                            $('#loading').hide();
                            swal({
                                title: "Erreur",
                                text: "Une erreur s'est produite",
                                type: "error",
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    });

                });


        }
    });
</script>



<script>
    $(document).ready(function () {
        $("input[name=editParameters]").on("click",editParametersEvent);
        function editParametersEvent(){
            var orderReception = $('input[name="orderReception"]').is(':checked');
            var orderPayment = $('input[name="orderPayment"]').is(':checked');
            var editOrderDate = $('input[name="editOrderDate"]').is(':checked');
            var editConsumptionDate = $('input[name="editConsumptionDate"]').is(':checked');
            var addStockAfterOrder = $('input[name="addStockAfterOrder"]').is(':checked');
            var disableConsumptionProducts = $('input[name="disableConsumptionProducts"]').is(':checked');

            var parameters={
                "orderReception": orderReception,
                "orderPayment": orderPayment,
                "editOrderDate": editOrderDate,
                "editConsumptionDate": editConsumptionDate,
                "addStockAfterOrder": addStockAfterOrder,
                "disableConsumptionProducts": disableConsumptionProducts,
            };
            console.log(parameters);
            $.ajax({
                    url: "<?php echo base_url("admin/config/apiEditParameters"); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {'parameters': parameters},
                    beforeSend: function () {
                        $('#loading').show();
                    },
                    complete: function () {
                        $('#loading').hide();
                    },
                    success: function (data) {
                           if(data.status==="success"){
                               swal({
                                   title: "Success",
                                   text: "L'opération a été bien effecuté",
                                   type: "success",
                                   timer: 1500,
                                   showConfirmButton: false
                               });
                           }else{
                                   swal({
                                       title: "Erreur",
                                       text: "Une erreur s'est produite",
                                       type: "warning",
                                       timer: 1500,
                                       showConfirmButton: false
                                   });
                                }
                            },
                            error: function (data) {
                                swal({
                                    title: "Erreur",
                                    text: "Une erreur s'est produite",
                                    type: "warning",
                                    timer: 1500,
                                    showConfirmButton: false
                            });
                    }
            });
        }
    });
</script>


<script src="<?php echo base_url('assets/build2/js/user/trainee/show.js'); ?>"></script>


