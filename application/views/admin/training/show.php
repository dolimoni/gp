<?php $this->load->view('admin/partials/admin_header.php'); ?>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .right_col {
        background-color: white !important;
    }

    .table-responsive {
        overflow-x: visible;
        margin: 0px;
    }

    tr {
        white-space: nowrap;
    }

    @media (max-width: 480px) {
        #datatable-reparation_filter {
            float: left !important;
            text-align: left !important;
        }

    }

    /* Invoice */

    .dummy-logo {
        border: #8da0aa dashed 1px;
        padding: 35px 25px;
        text-align: center;
        font-size: 22px;
        color: #8da0aa;
        margin-bottom: 15px;
    }

    .invoice-title {
        font-size: 32px;
        text-transform: uppercase;
    }

    .invoice-title + b {
        font-size: 18px;
        opacity: 0.7;
    }

    .invoice-address {
        line-height: 2em;
        font-size: 14px;
        margin: 0 0 10px;
    }

    .invoice-date {
        font-size: 18px;
        opacity: 0.5;
    }

    .invoice-client {
        font-size: 13px;
        text-transform: uppercase;
        margin: 10px 0 15px;
        font-weight: bold;
    }

    .invoice-client + .reset-ul li {
        padding: 0 0 15px;
    }

    .invoice-client + .reset-ul li b {
        width: 100px;
        display: inline-block;
        opacity: 0.6;
    }

    .invoice-client + h5 {
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .invoice-client + h5 + address {
        opacity: 0.5;
        line-height: 1.6em;
    }

    /* Labels */

    .bs-label {
        font-size: 80%;
        line-height: 1;
        display: inline;
        padding: .3em .6em .5em;
        text-align: center;
        text-transform: uppercase;
        vertical-align: baseline;
        white-space: nowrap;
        color: #fff;
        border-radius: .25em;
    }

    .content-box .bs-label {
        padding: .3em .6em .3em;
    }

    .bs-label[href]:hover,
    .bs-label[href]:focus {
        cursor: pointer;
        text-decoration: none;
        color: #fff;
    }

    .bs-label:empty {
        display: none;
    }

    .btn .bs-label {
        position: relative;
        top: -1px;
    }

    .label-default {
        background-color: #999;
    }

    .label-default[href]:hover,
    .label-default[href]:focus {
        background-color: #808080;
    }

    /* Badges */

    .badge,
    .bs-badge {
        font-size: 11px;
        font-weight: bold;
        line-height: 19px;
        display: inline-block;
        min-width: 20px;
        /*height: 20px;*/
        padding: 0 5px 0 4px;
        text-align: center;
        vertical-align: baseline;
        white-space: nowrap;
        color: #fff;
        border-radius: 10px;
    }

    .badge-success{
        background: green;
    }
    .badge-danger{
        background: red;
    }

    .badge-small {
        min-width: 10px;
        height: 10px;
    }

    .bs-badge:empty {
        display: none;
    }

    .btn .bs-badge {
        position: relative;
        top: -2px;
    }

    .bs-badge.badge-absolute {
        position: absolute;
        z-index: 5;
        top: -10px;
        left: -15px;
    }

    .bs-badge.badge-absolute.float-right {
        right: -15px;
        left: auto;
    }

    /* Status badge */

    .status-badge {
        position: relative;
        display: inline-block;
    }

    .status-badge .small-badge {
        position: absolute;
        right: 1px;
        bottom: -2px;
    }

    .small-badge {
        overflow: hidden;
        width: 12px;
        height: 12px;
        padding: 0;
        border: #fff solid 2px !important;
        border-radius: 20px;
    }

    .mrg10T {
        margin-top: 10px !important;
    }

    .stripe{
        background: red;
        color: white;
        padding: 11px 20px;
        border-radius: 6px;
    }
    .stripe-reverse{
        background: white;
        color: red;
        padding: 11px 20px;
        border-radius: 6px;
        border: solid red 1px;
    }
    .stripe a{
        color: white;
    }

</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="productsList">
        <div class="page-title">
            <div class="">
                <h3><?= lang("reparations_list") ?></h3>
            </div>
        </div>
        <div class="clearfix"></div>
        
        

        <div class="tile_count">
            <div class="text-center tile_stats_count">
                <div class="count">Groupe de Formation en <?php echo $training['title']; ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2 class="invoice-client mrg10T">informations Client :</h2>
                <h5><?php echo $training['c_name']; ?></h5>
                <address class="invoice-address">
                    <p><?php echo $training['c_address']; ?></p>
                    <p>Une autre information ici</p>
                </address>
            </div>
            <div class="col-md-4">
                <h2 class="invoice-client mrg10T">Formation</h2>
                <ul class="reset-ul">
                    <li><b>Date de début:</b> <?php echo $training['start_date'] ?></li>
                    <li><b>Date de fin:</b><?php echo $training['end_date']; ?></li>
                    <?php
                    $label = 'label-warning';
                    if (strtoupper($training['status']) === strtoupper('terminé')) {
                        $label = 'label-warning';
                    } else if (strtoupper($training['status']) === strtoupper('en cours')) {
                        $label = 'label-success';
                    } else {
                        $label = 'label-info';
                    } ?>
                    <li><b>Status:</b> <span
                                class="bs-label <?php echo $label; ?>"><?php echo $training['status']; ?></span></li>
                    <li><b>Id:</b> #<?php echo $training['id']; ?></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h2 class="invoice-client mrg10T">Description de la formation</h2>
                <p><?php echo $training['s_description'] ?></p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th class="bdwT-0">Paramètre</th>
                    <th class="bdwT-0">Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="fw-600">Activer les notifications par email</td>
                    <?php
                    $badgeLabel='badge-danger';
                    $response='Non';
                    if($training['enable_training_start_mail']==='true'){
                        $badgeLabel='badge-success';
                        $response='Oui';
                    }
                    ?>
                    <td><span class="badge <?php echo $badgeLabel; ?>"><?php echo $response; ?></span></td>
                </tr>
                <tr>
                    <td class="fw-600">Publier la synthèse de formation</td>
                    <?php
                    $badgeLabel='badge-danger';
                    $response='Non';
                    if($training['publish_synthesis']==='true'){
                        $badgeLabel='badge-success';
                        $response='Oui';
                    }
                    ?>
                    <td><span class="badge <?php echo $badgeLabel; ?>"><?php echo $response; ?></span>
                    </td>
                </tr>
                <tr>
                    <td class="fw-600">Publier le programme de la formation</td>
                    <?php
                    $badgeLabel='badge-danger';
                    $response='Non';
                    if($training['publish_program']==='true'){
                        $badgeLabel='badge-success';
                        $response='Oui';
                    }
                    ?>
                    <td><span class="badge <?php echo $badgeLabel; ?>"><?php echo $response; ?></span></td>
                </tr>
                <tr>
                    <td class="fw-600">Publier le support de la formation</td>
                    <?php
                    $badgeLabel='badge-danger';
                    $response='Non';
                    if($training['publish_course']==='true'){
                        $badgeLabel='badge-success';
                        $response='Oui';
                    }
                    ?>
                    <td><span class="badge <?php echo $badgeLabel; ?>"><?php echo $response; ?></span></td>
                </tr>
                <tr>
                    <td class="fw-600">Publier l'attestation de la formation</td>
                    <?php
                    $badgeLabel='badge-danger';
                    $response='Non';
                    if($training['publish_certificat']==='true'){
                        $badgeLabel='badge-success';
                        $response='Oui';
                    }
                    ?>
                    <td><span class="badge <?php echo $badgeLabel; ?>"><?php echo $response; ?></span></td>
                </tr>
                </tbody>
            </table>
        </div>

        <h3>Liste des stagiaires</h3>
        <div class="collapse" id="collapseExample">
            <form id="addTraineeForm" enctype="multipart/form-data">
                <fieldset>
                    <div class="row">
                        <input type="hidden" value="<?php echo $training['id'] ?>" name="training"/>
                        <div class="col-xs-6">
                            <br>
                            <label for="trainee">Stagiaire :</label>
                            <select class="form-control" name="trainee">
                                <?php foreach ($traineesInCompany as $traineeInCompany) { ?>
                                    <option value="<?php echo $traineeInCompany['id']; ?>"><?php echo $traineeInCompany['first_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-6">
                            <br>
                            <label for="scoreTest">Score Test :</label>
                            <input type="text" step="any" class="form-control" name="scoreTest"
                                   placeholder="<?= lang("last_name"); ?>" value="Non défini"
                                   required>
                        </div>
                    </div>
                    <br/>
                    <div class="text-right">
                        <input class="btn btn-success" type="submit" name="addTrainee"
                               value="<?= lang("confirme"); ?>"/>
                    </div>

                </fieldset>
            </form>
            <br>
        </div>

        <div class="collapse" id="editUser">
            <form id="editTraineeForm" enctype="multipart/form-data">
                <fieldset>
                    <div class="row">
                        <input type="hidden" value="<?php echo $training['id'] ?>" name="training"/>
                        <div class="col-xs-6">
                            <input type="hidden" name="user_id">
                            <br>
                            <label for="trainee">Stagiaire :</label>
                            <input type="text" step="any" class="form-control" name="name" disabled
                                   placeholder="<?= lang("last_name"); ?>" value="Non défini"
                                   required>
                        </div>
                        <div class="col-xs-6">
                            <br>
                            <label for="scoreTest">Score Test :</label>
                            <input type="text" step="any" class="form-control" name="scoreTest"
                                   placeholder="<?= lang("last_name"); ?>" value="Non défini"
                                   required>
                        </div>
                    </div>
                    <br/>
                    <div class="text-right">
                        <input class="btn btn-info" type="submit" name="editTrainee" value="<?= lang("edit"); ?>"/>
                    </div>

                </fieldset>
            </form>
            <br>
        </div>

        <div class="row table-responsive">
            <table id="datatable-trainees" class="table table-striped table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Score de test</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Score te test</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>

                <?php foreach ($trainees as $trainee) { ?>
                    <tr>
                        <td contenteditable><?php echo $trainee['first_name'] ?></td>
                        <td><?php echo $trainee['last_name'] ?></td>
                        <td><?php echo $trainee['email'] ?></td>
                        <td contenteditable
                            data-id="<?php echo $trainee['id'] ?>"><?php echo $trainee['scoreTest'] ?></td>
                        <td>
                            <button
                                    data-user-id="<?php echo $trainee['id'] ?>"
                                    data-user-firstName="<?php echo $trainee['first_name'] ?>"
                                    data-user-lastName="<?php echo $trainee['last_name'] ?>"
                                    data-scoreTest="<?php echo $trainee['scoreTest'] ?>"
                                    data-training-id="<?php echo $training['id'] ?>"
                                    class="btn btn-info btn-xs editUser"><?= lang("edit"); ?></button>
                            <button
                                    data-user-id="<?php echo $trainee['id'] ?>"
                                    data-training-id="<?php echo $training['id'] ?>"
                                    class="btn btn-danger btn-xs deleteUser"><?= lang("delete"); ?></button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <a class="btn btn-info" href="<?php echo base_url('admin/training/edit/' . $training['id']) ?>">Modifier le
            groupe</a>
        <a class="btn btn-primary" href="<?php echo base_url('admin/trainee/createUser') ?>">Créer un
            utilisateur</a>
        <button class="btn btn-warning addTrainee">Ajouter des stagiaires</button>
        <button class="btn btn-success addTraineeValidation">Terminer</button>
        <br/>


        <h3>Historique des notifications par email</h3>
        <div class="row table-responsive">
            <table id="datatable-notifications" class="table table-striped table-bordered dt-responsive nowrap"
                   cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Titre</th>
                    <th>Envoyé</th>
                    <th>Date d'envoie</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Type</th>
                    <th>Titre</th>
                    <th>Envoyé</th>
                    <th>Date d'envoie</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                <?php foreach ($emails as $email) {
                    $sent='Non';
                    $badgeLabel='badge-danger';
                    if($email['sent']==='true'){
                        $sent='Oui';
                        $badgeLabel='badge-success';
                    }
                    ?>
                    <tr>
                        <td><?php echo $email['type'] ?></td>
                        <td><?php echo $email['title'] ?></td>
                        <td>
                            <span class="badge <?php echo $badgeLabel; ?>">
                            <?php echo $sent; ?></td>
                        </span>

                        <td>
                            <?php
                            $dt = strtotime($email['sending_date']); //make timestamp with datetime string
                            echo date("d-m-Y", $dt); //echo the year of the datestamp just created
                            ?>
                        </td>
                        <td>

                            <button data-email-id="<?php echo $email['id'] ?>" data-training-id="<?php echo $email['training'] ?>" class="btn btn-success sendmail">Envoyer</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>



        <!--Documents-->
        <div class="container">
            <div class="row">
                <h2 class="row large-title mgbt10">Mes documents</h2>
                <div class="row mglt10 mgbt10">
                    <div class="col-md-6 stripe-reverse">
                        <div class="row">
                            <div class="col-md-6">Support de formation</div>
                            <?php
                                $course=$training['s_course'];
                                if($training['local_course']==='true'){
                                    $course=$training['course'];
                                }
                            ?>
                            <div class="col-md-6 text-right"><a target="_blank" href="<?php echo base_url($course); ?>">Télécharger</a></div>
                        </div>
                    </div>
                </div>
                <div class="row mglt10 mgbt10">
                    <div class="col-md-6 stripe">
                        <div class="row">
                            <div class="col-md-6">Programme de formation</div>
                            <?php
                            $program=$training['s_program'];
                            if($training['local_program']==='true'){
                                $program=$training['program'];
                            }
                            ?>

                            <div class="col-md-6 text-right"><a target="_blank" href="<?php echo base_url($program); ?>">Télécharger</a></div>
                        </div>
                    </div>
                </div>

                <div class="row mglt10 mgbt10">
                    <div class="col-md-6 stripe-reverse">
                        <div class="row">
                            <div class="col-md-6">Attestation</div>
                            <div class="col-md-6 text-right"><a target="_blank" href="<?php echo base_url('admin/training/certificate/'.$training['id']) ?>">Télécharger</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div hidden class="row">
            <form id="synthesisForm">
                <fieldset>
                    <input type="hidden" value="<?php echo $training['id']; ?>" name="training_id">
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="description">Description</label>
                            <textarea rows="6" type="textarea" class="form-control" name="description"
                                      placeholder="Description"><?php echo $training['ss_description']; ?></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="video">Vidéo</label>
                            <input type="file" class="form-control" name="video" size="50024000">
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="program">Programme de la formation</label>
                            <input type="file" class="form-control" name="program" size="50024000">
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $checked = '';
                            if ($training['enable_training_start_mail'] === 'true') {
                                $checked = 'checked';
                            }
                            ?>
                            <label><input <?php echo $checked; ?> type="checkbox" name="enable_training_start_mail"/>
                                Activer les notifications par email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $checked = '';
                            if ($training['publish_synthesis'] === 'true') {
                                $checked = 'checked';
                            }
                            ?>
                            <label><input <?php echo $checked; ?> type="checkbox" name="publish"/> Publier la synthèse
                                de formation</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $checked = '';
                            if ($training['publish_program'] === 'true') {
                                $checked = 'checked';
                            }
                            ?>
                            <label><input <?php echo $checked; ?> type="checkbox" name="publish_program"/> Publier le
                                programme de la formation</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <?php
                            $checked = '';
                            if ($training['publish_course'] === 'true') {
                                $checked = 'checked';
                            }
                            ?>
                            <label><input <?php echo $checked; ?> type="checkbox" name="publish_course"/> Publier le
                                support de la formation</label>
                        </div>
                    </div>
                    <br/>
                    <div class="from-control text-center">
                        <input class="btn btn-success" type="submit" name="add" value="Confirmer"/>
                    </div>
                </fieldset>
            </form>

        </div>
        <br/>


    </div>

</div>


<?php $this->load->view('admin/partials/admin_footer'); ?>
<script>
    var swal_success_operation_lang = "<?= lang("swal_success_operation"); ?>";
    var swal_error_lang = "<?= lang("swal_error"); ?>";
    var swal_success_edit_lang = "<?= lang("swal_success_edit"); ?>";
    var swal_warning_delete_lang = "<?= lang("swal_warning_delete"); ?>";
    var swal_success_delete_lang = "<?= lang("swal_success_delete"); ?>";
    var datatable_trainees,datatable_notifications;
</script>
<script src="<?php echo base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-trainees").length) {
                datatable_trainees = $("#datatable-trainees").DataTable({
                    "columns": [
                        {"data": "first_name"},
                        {"data": "last_name"},
                        {"data": "email"},
                        {"data": "scoreTest"},
                        {"data": "actions"}
                    ],
                    aaSorting: [[0, 'desc']],
                    responsive: true,
                    "bLengthChange": false,
                    "bInfo": false,
                    "language": {
                        "url": "<?php echo base_url("assets/vendors/datatables.net/French.json"); ?>"
                    }
                });
            }

            if ($("#datatable-notifications").length) {
                datatable_notifications = $("#datatable-notifications").DataTable({
                    "columns": [
                        {"data": "type"},
                        {"data": "content"},
                        {"data": "send_date"},
                        {"data": "trainees"},
                        {"data": "actions"}
                    ],
                    aaSorting: [[0, 'desc']],
                    responsive: true,
                    "bLengthChange": false,
                    "bInfo": false,
                    "searching": false,
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

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script>
    var addTraineesToTraining_url = "<?php echo base_url('admin/api/training/apiAddTraineesToTraining') ?>";
    var deleteTraineeFromTraining_url = "<?php echo base_url('admin/api/training/apiDeleteTraineeFromTraining') ?>";
    var editTrainee_url = "<?php echo base_url('admin/api/training/apiEditTrainee') ?>";
    var addSynthesis_url = "<?php echo base_url('admin/api/training/apiAddSynthesis') ?>";
    var sendemail_url = "<?php echo base_url('admin/api/training/apiSendEmail') ?>";

    var training_id = "<?php echo $training['id']; ?>";
    <?php
    $js_array = json_encode($traineesInCompanyNames);
    echo "var traineesInCompanyNames = " . $js_array . ";\n";
    ?>
    console.log(traineesInCompanyNames);
</script>

<script src="<?php echo base_url('assets/build2/js/training/show.js'); ?>"></script>

