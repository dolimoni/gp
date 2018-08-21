<?php $this->load->view('admin/partials/admin_header.php'); ?>
<style>








    .right_col{
        min-height: 650px !important;
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
            </div>
        </div>

        <div class="tile_count">
            <div class="text-center tile_stats_count">
                <div class="count"><?php echo $subject['title']; ?></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img class="fullWith" src="<?php echo base_url($subject['image']); ?>"/>
            </div>
            <div class="col-md-8">
                <h4>Description:</h4>
                <?php echo $subject['Description']; ?>
            </div>
        </div>
        <h2 class="large-title mgbt10">Synthèse</h2>
        <div class="row text-center">
            <div class="col-md-12">
                <p>
                    <?php
                    $src=base_url($subject['ss_path']);
                    if($subject['url']!==''){
                        $src=$subject['url'];
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
                    <?php echo $subject['ss_description']; ?>
                </p>
            </div>
        </div>
        <h2 class="large-title mgbt10">Support de formation :
            <?php if($subject['course']!==''){ ?>
            <a href="<?php echo base_url($subject['course']); ?>" target="_blank">Cliquer ici pour télécharger</a>
            <?php } ?>
        </h2>
        <?php if($subject['course']!==''){ ?>
            <iframe width="100%" height="500" src="<?php echo base_url($subject['course']); ?>" allowfullscreen></iframe>
        <?php } ?>

        <br/>
    </div>
</div>


<?php $this->load->view('admin/partials/admin_footer'); ?>
<script src="<?php echo base_url("assets/vendors/datatables.net/js/jquery.dataTables.min.js"); ?>"></script>
<script>
    var allSubjects_url;
    $(document).ready(function () {
         allSubjects_url='<?php echo base_url('admin/subject'); ?>';
    });
</script>

<script>
    $(document).ready(function () {
        $('#editSubjectForm').on('submit', function (e) {
            e.preventDefault();
            var formData = new FormData(this);
            $('#loading').show();
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('admin/api/subject/apiEdit'); ?>",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    $('#loading').hide();
                    swal({
                        title: "Success",
                        text: swal_success_operation_lang,
                        type: "success",
                        timer: 1500,
                        showConfirmButton: false
                    });

                    window.location.replace(allSubjects_url);
                },
                error: function (data) {
                    $('#loading').hide();
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
    });

</script>

