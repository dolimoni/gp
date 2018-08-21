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
        #datatable-reparation_filter{
            float: left !important;
            text-align: left !important;
        }

    }
    .profile_details .profile_view .bottom{
        background: red;
    }
    .btn.download{
        background: white;
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

    .content-box .bs-label { padding:.3em .6em .3em; }

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

    /*.training_course_details{
        background: url('<?php echo base_url($training["s_image"]) ?>') no-repeat;
        opacity: 0.1;
        -webkit-background-size: 100% auto;
        -moz-background-size: 100% auto;
        -o-background-size: 100% auto;
        background-size: 100% auto;
        height: 300px;
    }*/
    .bgimg {
        background-image:url('<?php echo base_url($training["s_image"]); ?>');
        background-position:center;
        background-repeat:no-repeat;
        background-size: auto 100%;
        min-height: 100px;
        width: 290px;
        margin: 10px 0px;
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
                <div class="count">Formation en <?php echo $training['title']; ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2 class="invoice-client mrg10T">Formation</h2>
                <ul class="reset-ul">
                    <li><b>Date de début:</b> <?php echo $training['start_date'] ?></li>
                    <li><b>Date de fin:</b><?php echo $training['end_date']; ?></li>
                    <?php
                    $label='label-warning';
                    if(strtoupper($training['status'])===strtoupper('terminé')){
                        $label='label-warning';
                    }
                    else if(strtoupper($training['status'])===strtoupper('en cours')){
                        $label='label-success';
                    }else{
                        $label='label-info';
                    }?>
                    <li><b>Status:</b> <span class="bs-label <?php echo $label; ?>"><?php echo $training['status']; ?></span></li>
                </ul>
            </div>

            <?php  if($training['s_description']!==''){ ?>
            <div class="col-md-4">
                <h2 class="invoice-client mrg10T">Description de la formation</h2>
                <p><?php echo $training['s_description'] ?></p>
            </div>
            <?php } ?>

            <div class="col-md-4">
                <h2 class="invoice-client mrg10T">Entreprise :</h2>
                <h5><?php echo $training['c_name']; ?></h5>
                <!--<address class="invoice-address">
                    <p><?php /*echo $training['c_address']; */?></p>
                    <p>Une autre information ici</p>
                </address>-->
            </div>
        </div>
        <br/>

        <!--        Synthèse de la formations-->
        <h2 class="large-title mgbt10">Synthèse</h2>

        <?php
        if($training['publish_synthesis']==='true' and
            (($training['local_synthesis']==='false' and $training['path']!=='') or
                ($training['local_synthesis']==='true' and $training['synthesis_video']!==''))){
            ?>
        <div class="row text-center">
            <div class="col-md-12">
                <p>
                    <?php
                    $src=base_url($training['synthesis_video']);
                    if($training['url']!==''){
                        $src=$training['url'];
                        ?>

                        <iframe width="80%" height="500px"
                                src="<?php echo $src; ?>">
                        </iframe>
                    <?php }else{ ?>
                        <video width="80%" height="auto" controls>
                            <source src="<?php echo $src; ?>" type="video/mp4">
                        </video>
                    <?php } ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p>
                    <?php echo $training['synthesis_description']; ?>
                </p>
            </div>
        </div>
        <br/>

        <?php } else{ ?>
        <p>La synthèse de formation sera bientôt disponible.</p>
        <?php } ?>

        <h2 class="large-title mgbt10">Mes documents</h2>

        <div class="row">
            <?php if($training['publish_program']==='true') { ?>
            <div class="col-md-4 col-sm-4 col-xs-12 profile_details training_program">
                <div class="well profile_view" style="cursor: default;">
                    <div class="col-sm-12 training_course_details">
                        <h4 class="brief"><i>Programme de formation</i></h4>
                        <div class="bgimg">
                        </div>
                    </div>
                    <div class="col-xs-12 bottom text-right">

                        <div class="col-xs-12 emphasis">
                            <a target="_blank" href="<?php echo base_url($training['program']); ?>"
                                    class="btn btn-xs download">
                                <i class="fa fa-download"> </i>Télécharger
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if($training['publish_course']==='true') { ?>
            <div class="col-md-4 col-sm-4 col-xs-12 profile_details training_course">
                <div class="well profile_view" style="cursor: default;" >
                    <div class="col-sm-12 training_course_details">
                        <h4 class="brief"><i>Support de formation</i></h4>
                        <div class="bgimg">
                        </div>
                    </div>
                    <div class="col-xs-12 bottom text-right">

                        <div class="col-xs-12 emphasis">
                            <?php
                                $training_course=$training['s_course'];
                                if($training['local_course']==='true'){
                                    $training_course=$training['course'];
                                }
                            ?>
                            <a target="_blank" href="<?php echo base_url($training_course);?>"
                                    class="btn btn-xs download">
                                <i class="fa fa-download"> </i>Télécharger
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <?php if($training['publish_certificat']==='true') { ?>
            <div class="col-md-4 col-sm-4 col-xs-12 profile_details training_course">
                <div class="well profile_view" style="cursor: default;" >
                    <div class="col-sm-12 training_course_details">
                        <h4 class="brief"><i>Attestation de formation</i></h4>
                        <div class="bgimg">
                        </div>
                    </div>
                    <div class="col-xs-12 bottom text-right">

                        <div class="col-xs-12 emphasis">
                            <a target="_blank" href="<?php echo base_url('admin/training/certificate/'.$training['id']) ?>"
                                    class="btn btn-xs download">
                                <i class="fa fa-download"> </i>Télécharger
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
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
            if ($("#datatable-trainees").length) {
                $("#datatable-trainees").DataTable({
                    aaSorting: [[0, 'desc']],
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


<script src="<?php echo base_url('assets/build2/js/training/show.js'); ?>"></script>

<script>
        var addTraineeToTraining_url="<?php echo base_url('admin/api/training/apiAddTraineeToTraining') ?>";
        var deleteTraineeFromTraining_url="<?php echo base_url('admin/api/training/apiDeleteTraineeFromTraining') ?>";
        var editTrainee_url="<?php echo base_url('admin/api/training/apiEditTrainee') ?>";
        var addSynthesis_url="<?php echo base_url('admin/api/training/apiAddSynthesis') ?>";
</script>
