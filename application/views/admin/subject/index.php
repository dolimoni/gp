<?php $this->load->view('admin/partials/admin_header.php'); ?>
<style>

    tr {
        white-space: nowrap;
    }
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
                <h3>Sujets</h3>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                   Sujets
                </div>
                <div class="x_content">
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <div class="x_content">
                            <table id="datatable-subjects"
                                   class="table table-striped table-bordered dt-responsive nowrap"
                                   cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th><?= lang('title'); ?></th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th><?= lang('title'); ?></th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php foreach ($subjects as $subject) { ?>
                                    <?php
                                    $dots='';
                                    if(strlen($subject["Description"])>80){
                                        $dots='...';
                                    }
                                    ?>
                                    <tr>
                                        <td><?php echo $subject["title"]; ?></td>
                                        <td><?php echo substr($subject["Description"], 0, 80).' '.$dots;  ?></td>
                                        <td>
                                            <!--<a href=" <?php /*echo base_url(); */?>admin/subject/edit/<?php /*echo $subject['id']; */?>"
                                               class="btn btn-primary  btn-xs"><i class="fa fa-pencil"></i> Modifier</a>-->
                                            <a href="<?php echo base_url('admin/subject/show/'.$subject["id"]) ?>" class="btn btn-success deleteSubject btn-xs"><i class="fa"></i>Aperçu</a>

                                            <a href="<?php echo base_url('admin/subject/edit/'.$subject["id"]) ?>" class="btn btn-info deleteSubject btn-xs"><i class="fa"></i>Modifier</a>
                                            <button data-id="<?php echo $subject["id"]; ?>" class="btn btn-danger deleteSubject btn-xs"><i class="fa"></i>Supprimer</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div> <!-- /content -->
                        <?php if ($params["addUsers"] === "true") : ?>
                            <div class="text-right">
                                <button class="btn btn-info action"
                                        onclick="window.location.href='<?php echo base_url("admin/subject/create"); ?>'">
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
<script>
    $(document).ready(function () {
        var handleDataTableButtons = function () {
            if ($("#datatable-subjects").length) {
                $("#datatable-subjects").DataTable({
                    responsive: true,
                    "aaSorting": [],
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
    var deleteSubject_url='<?php echo base_url('admin/api/subject/apiDelete');?>';
</script>

<script src="<?php echo base_url('assets/build2/js/subject/index.js'); ?>"></script>






