<?php $this->load->view('user/partials/user_header.php'); ?>
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
                                    <div class="col-md-6 col-sm-4 col-xs-12">
                                        <img src="<?= base_url('assets/images/' . $params['photo']); ?>" alt="icon">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            Historique de formations
                                        </div>
                                        <div class="x_content">
                                            <table id="datatable-users"
                                                   class="table table-striped table-bordered dt-responsive nowrap"
                                                   cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th><?= lang('title'); ?></th>
                                                    <th>Formateur</th>
                                                    <th>Score test</th>
                                                    <th>Date de début</th>
                                                    <th>Date de fin</th>
                                                    <th>Actions</th>

                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>
                                                    <th><?= lang('title'); ?></th>
                                                    <th>Formateur</th>
                                                    <th>Score test</th>
                                                    <th>Date de début</th>
                                                    <th>Date de fin</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </tfoot>
                                                <tbody>
                                                <?php foreach ($trainings as $training) { ?>
                                                    <tr>
                                                        <td><?php echo $training["title"]; ?></td>
                                                        <td><?php echo $training['f_first_name'].' '.$training['f_last_name'] ?></td>
                                                        <td><?php echo $training["scoreTest"]; ?></td>
                                                        <td><?php echo $training["start_date"]; ?></td>
                                                        <td><?php echo $training["end_date"]; ?></td>
                                                        <td>
                                                            <a href=" <?php echo base_url('user/training/show/' . $training['id']); ?>"
                                                               class="btn btn-info btn-xs"><?= lang("show"); ?></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div> <!-- /content -->
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


