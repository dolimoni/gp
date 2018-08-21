<?php $this->load->view('admin/partials/admin_header.php'); ?>

<!-- Generic page styles -->
<!-- blueimp Gallery styles -->
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/blueimp/css/jquery.fileupload-ui.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/blueimp/css/jquery.fileupload.css') ?>">
<!-- CSS adjustments for browsers with JavaScript disabled -->
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
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h3>Suject</h3>
                    </div>
                    <div class="x_content">
                        <form id="addSubjectForm">
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="title"><?= lang("title"); ?> :</label>
                                        <span class="error-msg title-error">aaaa</span>
                                        <input type="text" class="form-control toBeValidated" data-required="true" name="title" id="title"
                                               placeholder="<?= lang("title"); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="description">Description</label>
                                        <textarea type="textarea" class="form-control toBeValidated" name="description"
                                                  placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <div class="x_title">
                                    <h3>Synthèse</h3>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="synthesis_description">Description</label>
                                        <textarea rows="6" type="textarea" class="form-control" name="synthesis_description"
                                                  placeholder="Description"></textarea>
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="title">Url</label>
                                        <input type="text" class="form-control" name="url" id="url"
                                               placeholder="Url" />
                                    </div>
                                </div>
                                <br/>
                                <br/>

                            </fieldset>
                        </form>

                        <form id="fileupload" action="<?php echo base_url('admin/subject/test'); ?>" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Image du thème</span>
                                        <input type="file" name="img" accept="image/*">
                                        </span>

                                        <span class="btn btn-info fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Support de formation</span>
                                        <input type="file" name="pdf" accept="application/pdf">
                                        </span>

                                        <span class="btn btn-info fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Programme de formation</span>
                                        <input type="file" name="pdf_program" accept="application/pdf">
                                        </span>

                                        <span class="btn btn-warning fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Vidéo de la synthèse</span>
                                        <input type="file" accept="video/mp4,video/x-m4v,video/*" name="video">
                                        </span>

                                        <span class="fileupload-buttonbar">
                                            <button class="btn btn-primary start">
                                                <i class="glyphicon glyphicon-upload"></i>
                                                <span>Start upload</span>
                                            </button>
                                        </span>

                                        <button class="btn btn-success sendForm" type="submit" name="add" value="<?= lang("add"); ?>">Envoyer</button>
                                    </div>
                                </div>

                                <table role="presentation" class="table table-striped mgtp10"><tbody class="files"></tbody></table>

                                <br/>
                                <div class="text-center hidden">
                                    <input class="btn btn-success" type="submit" name="add" value="<?= lang("add"); ?>"/>
                                </div>
                            </fieldset>

                            <!-- Redirect browsers with JavaScript disabled to the origin page -->
                            <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-12">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process"></span>
                                </div>
                                <!-- The global progress state -->
                                <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
                            </div>
                            <!-- The table listing the files available for upload/download -->

                        </form>
                    </div>

                </div>
            </div>

        </div>
            <!-- /x-panel -->
    </div>
</div>


<?php $this->load->view('admin/partials/admin_footer'); ?>
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


<script src="<?php echo base_url('assets/build2/js/subject/create.js'); ?>"></script>

<script>
    var allSubjects_url;
    var base_url="<?php echo base_url(); ?>";
    var addSubject_url="<?php echo base_url('admin/api/subject/apiAdd'); ?>";
    var upload_url="<?php echo base_url('admin/image/uploadSubjectFiles'); ?>";
    var uploads={};
    $(document).ready(function () {
         allSubjects_url='<?php echo base_url('admin/subject'); ?>';
    });
</script>


