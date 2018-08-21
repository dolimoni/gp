<?php $this->load->view('admin/partials/admin_header.php'); ?>
<style>
    .table-responsive {
        overflow-x: visible;
        margin: 0px;
    }
    tr{
        white-space: normal;
    }
    tr{
        background-color: white;
    }
    thead tr,tfoot tr{
        color:red;
    }
    @media (max-width: 480px) {
        #datatable-training_filter{
            float: left !important;
            text-align: left !important;
        }

    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div>
        <div class="row">
                <div class="col-xs-12">
                    <h3>Liste des formations</h3>
                </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table id="datatable-training" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Formation</th>
                            <th>Formateur</th>
                            <th>Entreprise</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Participants</th>
                            <th>Nombre de jours</th>
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
                            <th>Participants</th>
                            <th>Nombre de jours</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        <?php foreach ($trainings as $training) {
                            $synthesis_label='label-danger';
                            if($training['publish_synthesis']==='true'){
                                $synthesis_label='label-success';
                            }


                            $notification='fa-bell-slash';
                            $notification_color='label-danger';
                            if($training['enable_training_start_mail']==='true'){
                                $notification='fa-bell';
                                $notification_color='label-success';
                            }

                            ?>
                            <tr>
                                <td><?php echo $training['title'];?></td>
                                <td><?php echo $training['f_first_name'];?></td>
                                <td><?php echo $training['c_name'];?></td>
                                <td><?php echo $training['start_date'];?></td>
                                <td><?php echo $training['end_date'];?></td>
                                <td><?php echo $training['participants'];?></td>
                                <td><?php echo $training['days'];?></td>
                                <td><?php echo $training['status'];?></td>
                                <td>
                                    <a href=" <?php echo base_url('admin/training/show/' . $training['id']); ?>"
                                       class="btn btn-success btn-xs"><?= lang("show"); ?></a>
                                    <a href=" <?php echo base_url('admin/training/edit/' . $training['id']); ?>"
                                       class="btn btn-info btn-xs"><?= lang("edit"); ?></a>
                                    <button data-id="<?php echo $training['id']; ?>"
                                       class="btn btn-danger btn-xs deleteTraining"><?= lang("delete"); ?></button>
                                    <!--<li class="fa fa-university <?php /*echo $synthesis_label; */?>" style="font-size:18px;padding: 1px 4px;color: #fff;"></li>
                                    <li class="fa <?php /*echo $notification; */?> <?php /*echo $notification_color; */?>" style="font-size:18px;padding: 1px 4px;color: #fff;"></li>-->
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>


<?php $this->load->view('admin/partials/admin_footer'); ?>
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
            if ($("#datatable-training").length) {
                $("#datatable-training").DataTable({
                    'ordring':false,
                    responsive: true,
                    "columns": [
                        {"data": "training"},
                        {"data": "former"},
                        {"data": "company"},
                        {"data": "start_date"},
                        {"data": "end_date"},
                        {"data": "participants"},
                        {"data": "days"},
                        {"data": "status"},
                        {"data": "actions"}
                    ],
                    "columnDefs": [
                        { "width": "5%", "targets": 0 },
                        { "width": "10%", "targets": 4 },
                        { "width": "5%", "targets": 5 },
                        { "width": "5%", "targets": 6 }
                    ],
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

        $('button.deleteTraining').on('click', deleteTrainingEvent);
        function deleteTrainingEvent() {
            var id = $(this).attr('data-id');
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
                    apiRequest("<?php echo base_url('admin/api/training/apiDelete'); ?>",{'id':id});
            });
        }

    });

</script>

