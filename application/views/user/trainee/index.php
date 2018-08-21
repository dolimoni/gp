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
            <div class="title_left">
                <h3>Utilisateurs</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                   Liste des utilisateurs
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
                                    <th><?= lang('email'); ?></th>
                                    <th>Entreprise</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th><?= lang('name'); ?></th>
                                    <th><?= lang('last_name'); ?></th>
                                    <th><?= lang('email'); ?></th>
                                    <th>Entreprise</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ($allUsers as $user) { ?>
                                    <tr>
                                        <td><?php echo $user["first_name"]; ?></td>
                                        <td><?php echo $user["last_name"]; ?></td>
                                        <td><?php echo $user["email"]; ?></td>
                                        <td><?php echo $user["c_name"]; ?></td>
                                        <td>
                                            <a href=" <?php echo base_url(); ?>admin/trainee/editUser/<?php echo $user['id']; ?>"
                                               class="btn btn-primary  btn-xs"><i class="fa fa-pencil"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- /content -->
                        <?php if ($params["addUsers"] === "true") : ?>
                            <div class="text-right">
                                <button class="btn btn-info action"
                                        onclick="window.location.href='<?php echo base_url("admin/trainee/createUser"); ?>'">
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


