<?php $this->load->view('user/partials/user_header.php'); ?>
<style>
    .table-responsive {
        overflow-x: visible;
        margin: 0px;
    }
    tr{
        white-space: nowrap;
    }
    @media (max-width: 480px) {
        #datatable-coming-training_filter{
            float: left !important;
            text-align: left !important;
        }

    }
    tr{
        background-color: white;
    }
    thead tr{
        color:red;
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div>
        <div class="row">
                <div class="col-xs-12">
                    <h3 class="large-title mgbt10">Liste des formations</h3>
                    <h4><span>En cours</span></h4>
                </div>
        </div>
        <div class="clearfix"></div>

        <div class="row table-responsive">
                <table id="datatable-current-training" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Formation</th>
                        <th>Formateur</th>
                        <th>Entreprise</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Formation</th>
                        <th>Formateur</th>
                        <th>Entreprise</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($current_trainings as $current_training) { ?>
                        <tr>
                            <td><?php echo $current_training['title'];?></td>
                            <td><?php echo $current_training['f_first_name'];?></td>
                            <td><?php echo $current_training['c_name'];?></td>
                            <td><?php echo $current_training['start_date'];?></td>
                            <td><?php echo $current_training['end_date'];?></td>
                            <td><?php echo $current_training['status'];?></td>
                            <td>
                                <a href=" <?php echo base_url('user/training/show/' . $current_training['id']); ?>"
                                   class="btn btn-info btn-xs"><?= lang("show"); ?></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        <div class="row">
            <div class="col-xs-12">
                <h4><span>A venir</span></h4>
            </div>
        </div>

        <div class="row table-responsive">
                <table id="datatable-coming-training" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Formation</th>
                        <th>Formateur</th>
                        <th>Entreprise</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Formation</th>
                        <th>Formateur</th>
                        <th>Entreprise</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($coming_trainings as $coming_training) { ?>
                        <tr>
                            <td><?php echo $coming_training['title'];?></td>
                            <td><?php echo $coming_training['f_first_name'];?></td>
                            <td><?php echo $coming_training['c_name'];?></td>
                            <td><?php echo $coming_training['start_date'];?></td>
                            <td><?php echo $coming_training['end_date'];?></td>
                            <td><?php echo $coming_training['status'];?></td>
                            <td>
                                <a href=" <?php echo base_url('user/training/show/' . $coming_training['id']); ?>"
                                   class="btn btn-info btn-xs"><?= lang("show"); ?></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>


        <h4><span>Formations terminé</span></h4>
        <div class="row table-responsive">
                <table id="datatable-finished-training" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Formation</th>
                        <th>Formateur</th>
                        <th>Entreprise</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Formation</th>
                        <th>Formateur</th>
                        <th>Entreprise</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($finished_trainings as $finished_training) { ?>
                        <tr>
                            <td><?php echo $finished_training['title'];?></td>
                            <td><?php echo $finished_training['f_first_name'];?></td>
                            <td><?php echo $finished_training['c_name'];?></td>
                            <td><?php echo $finished_training['start_date'];?></td>
                            <td><?php echo $finished_training['end_date'];?></td>
                            <td><?php echo $finished_training['status'];?></td>
                            <td>
                                <a href=" <?php echo base_url('user/training/show/' . $finished_training['id']); ?>"
                                   class="btn btn-info btn-xs"><?= lang("show"); ?></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

    </div>
</div>


<?php $this->load->view('user/partials/user_footer'); ?>
<script>
    var swal_success_operation_lang = "<?= lang("swal_success_operation"); ?>";
    var swal_error_lang = "<?= lang("swal_error"); ?>";
    var swal_success_edit_lang = "<?= lang("swal_success_edit"); ?>";
    var swal_warning_delete_lang = "<?= lang("swal_warning_delete"); ?>";
    var swal_success_delete_lang = "<?= lang("swal_success_delete"); ?>";
</script>
<script src="<?php echo base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-current-training").length) {
                $("#datatable-current-training").DataTable({
                    'ordring':false,
                    "bLengthChange": false,
                    "bInfo": false,
                    responsive: true,
                    "language": {
                        "url": "<?php echo base_url("assets/vendors/datatables.net/French.json"); ?>"
                    }
                });
            }

            if ($("#datatable-coming-training").length) {
                $("#datatable-coming-training").DataTable({
                    'ordring':false,
                    "bLengthChange": false,
                    "bInfo": false,
                    responsive: true,
                    "language": {
                        "url": "<?php echo base_url("assets/vendors/datatables.net/French.json"); ?>"
                    }
                });
            }

            if ($("#datatable-finished-training").length) {
                $("#datatable-finished-training").DataTable({
                    'ordring':false,
                    "bLengthChange": false,
                    "bInfo": false,
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
        $('#addReparationForm').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('admin/budget/apiAddRepartion'); ?>",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                },
                success: function (data) {
                    swal({
                        title: "Success",
                        text: swal_success_operation_lang,
                        type: "success",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    location.reload();
                },
                error: function (data) {
                    console.log("error");
                    console.log(data);
                }
            });

        });

        $('#editAlertForm').on('submit', function (e) {
            e.preventDefault();

            var reparation = {
                'article': $("#editAlertForm input[name='article']").val(),
                'price': $("#editAlertForm input[name='price']").val(),
                'repairer': $("#editAlertForm input[name='repairer']").val(),
                'problem': $("#editAlertForm input[name='problem']").val()
            };
            var validForm=true;
            if (validForm) {
                $('#loading').show();
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('admin/budget/apiEditReparation'); ?>",
                    data: {reparation: reparation, 'id': $("#editAlertForm input[name='id']").val()},
                    dataType: "json",
                    beforeSend: function () {
                        $('#loading').show();
                    },
                    complete: function () {
                        $('#loading').hide();
                    },
                    success: function (data) {
                        $('#loading').hide();
                        if (data.status === "success") {
                            swal({
                                title: "Success",
                                text: swal_success_operation_lang,
                                type: "success",
                                timer: 1500,
                                showConfirmButton: false
                            });
                            location.reload();
                        } else {
                            swal({
                                title: "Erreur",
                                text: swal_error_lang,
                                type: "error",
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    },
                    error: function (data) {
                        $('#loading').show();
                        swal({
                            title: "Erreur",
                            text: swal_error_lang,
                            type: "error",
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                });
            }

        })


        $('button.deleteAlert').on('click', deleteAlertEvent);

        function deleteAlertEvent() {
            var reparation_id = $(this).closest('tr').attr('data-id');
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
                    $.ajax({
                        url: "<?php echo base_url('admin/budget/apiDeleteReparation'); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {'reparation_id': reparation_id},
                        beforeSend: function () {
                            $('#loading').show();
                        },
                        complete: function () {
                            $('#loading').hide();
                        },
                        success: function (data) {
                            if (data.status === 'success') {
                                swal({
                                    title: "Success",
                                    text: swal_error_lang,
                                    type: "success",
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                                location.reload();
                            }
                            else {
                                swal({
                                    title: "Erreur",
                                    text: swal_error_lang,
                                    type: "error",
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                            }
                        },
                        error: function (data) {
                            swal({
                                title: "Erreur",
                                text: swal_error_lang,
                                type: "error",
                                timer: 1500,
                                showConfirmButton: false
                            });
                        }
                    });

                });


        }

        $('.profile_details').on('click', function () {
            var id = $(this).attr('data-id');
            document.location.href = "<?php echo base_url(); ?>admin/employee/show/" + id;
        });
    });

</script>

<script>
    $(document).ready(function () {
        $(".editAlert").on('click', editAlertEvent);
        var l_id = -1;
        function editAlertEvent() {
            if ($(this).attr('data-id') === l_id || l_id === -1) {
                $('#editAlert').toggle('slow');
            }
            l_id = $(this).closest('tr').attr('data-id');
            var row = $(this).closest('tr');
            $('#editAlert input[name="article"]').val(row.find("[data-article]").attr('data-article'));
            $('#editAlert input[name="problem"]').val(row.find("[data-problem]").attr('data-problem'));
            $('#editAlert input[name="price"]').val(row.find("[data-price]").attr('data-price'));
            $('#editAlert input[name="repairer"]').val(row.find("[data-repairer]").attr('data-repairer'));

            $('#editAlert input[name="id"]').val(l_id);
        }
    });
</script>