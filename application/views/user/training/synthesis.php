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
                <div class="count">Syntèses de formation</div>
            </div>
        </div>
        <br/>

        <!--        Synthèse de la formations-->

        <?php
            $synthesis_count=0;
        ?>
        <div class="row">

            <?php foreach ($trainings as $training){
                if($training['publish_synthesis']==='true' and
                    (($training['local_synthesis']==='false' and $training['path']!=='') or
                    ($training['local_synthesis']==='true' and $training['synthesis_video']!==''))) {
                    $synthesis_count++;
                ?>
                    <div class="incsriptionArtcle">
                        <div class="pnlCreateAccount frm-holder rte pdt20">
                            <div style="margin-bottom:10px;color:#000000">
                                <h3>Mettre un titre ici</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias delectus ea eaque explicabo facere iste iusto laborum laudantium, magnam modi, necessitatibus non nulla possimus rerum sit totam veniam veritatis voluptas.
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <a href="<?php echo base_url('user/training/synthesis/'.$training['id']); ?>">
                        <div class="col-md-3">
                            <div class="text-center gray">
                                <img style="min-height: 133px;" class="half-width" src="<?php echo base_url($training['s_image']); ?>"/>
                            </div>
                            <div class="courseTitle"><?php echo $training['title']; ?></div>
                        </div>
                    </a>
                <?php }} ?>


                <?php if($synthesis_count===0){
                    ?>
                    <div class="incsriptionArtcle">
                        <div class="pnlCreateAccount frm-holder rte pdt20">
                            <div style="margin-bottom:10px;color:#000000">
                                <h3 class="text-center">Vous n'avez aucune synthèse</h3>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias delectus ea eaque explicabo facere iste iusto laborum laudantium, magnam modi, necessitatibus non nulla possimus rerum sit totam veniam veritatis voluptas.
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <a class="red" href="<?php echo base_url('user/welcome') ?>">Acceuil</a>
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
