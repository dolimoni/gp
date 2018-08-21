<?php $this->load->view('admin/partials/admin_header.php'); ?>

<link href="<?php echo base_url("assets/css/createUserForm.css"); ?>" rel="stylesheet">

<title></title>

<link href="<?php echo base_url("assets/build2/css/kendo.common.min.css"); ?>" rel="stylesheet"/>
<link href="<?php echo base_url("assets/build2/css/kendo.default.min.css"); ?>" rel="stylesheet"/>
<link href="<?php echo base_url("assets/build2/css/kendo.mobile.all.min.css"); ?>" rel="stylesheet"/>
<link href="<?php echo base_url("assets/build2/css/font-awesome.min.css"); ?>" rel="stylesheet"/>

<link rel="stylesheet" href="<?php echo base_url('assets/vendors/blueimp/css/jquery.fileupload-ui.css') ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/vendors/blueimp/css/jquery.fileupload.css') ?>">

<!-- page content -->
<div class="right_col" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ajouter un formateur
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="form-horizontal form-label-left" novalidate>
                        <span class="section">Informations</span>


                        <form class="sendForm">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input hidden value="<?php echo $former['id']; ?>" name="id">
                                    <input value="<?php echo $former['last_name']; ?>" id="last_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                           data-validate-words="2" name="last_name" placeholder="Nom"
                                           required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prénom <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $former['first_name']; ?>" id="first_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                           data-validate-words="2" name="first_name" placeholder="Prénom"
                                           required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Expérience <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $former['experience']; ?>" type="number" id="experience" name="experience" placeholder="Nombre d'année d'expérience" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="password" class="control-label col-md-3">Certifié
                                    <span class="required">*</span>
                                </label>
                                <?php
                                $checked='';
                                if($former['certificated']==='true'){
                                    $checked='checked';
                                }

                                ?>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input <?php echo $checked; ?> id="certificated" type="checkbox" name="certificated"
                                           class="form-control col-md-7 col-xs-12"/>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="password" class="control-label col-md-3">
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea type="textarea" class="form-control" name="certificated_comment"
                                           placeholder="Commentaire"><?php echo $former['certificated_comment']; ?></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Thème<span
                                            class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select name="subject" class="form-control col-md-7 col-xs-12">
                                        <?php foreach ($subjects as $subject){
                                            $selected='';
                                            if($subject['id']===$former['subject']){
                                                $selected='selected';
                                            }
                                            ?>
                                            <option <?php echo $selected; ?> value="<?php echo $subject['id']; ?>"><?php echo $subject['title'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="certificated_comment" class="control-label col-md-3">
                                    Commentaire
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea type="textarea" class="form-control" name="comment"
                                           placeholder="Commentaire"><?php echo $former['comment']; ?></textarea>
                                </div>
                            </div>
                        </form>


                        <div class="item form-group" id="fileupload">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">CV<span
                                        class="required">*</span>
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <span class="btn btn-success fileinput-button">
                                        <i class="glyphicon glyphicon-plus"></i>
                                        <span>Télécharger</span>
                                        <input type="file" name="cv">
                                        </span>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="text-center">
                                <!-- <button type="reset" class="btn btn-primary">Annuler</button>-->
                                <button id="send" class="btn btn-success">Envoyer</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
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


<script src="<?php echo base_url("assets/build2/js/kendo.all.min.js"); ?>"></script>
<script>
    var editFormer_url="<?php echo base_url('admin/api/former/apiEdit'); ?>";
    var upload_url="<?php echo base_url('admin/image/upload'); ?>";
    var uploads={};
</script>

<script src="<?php echo base_url('assets/build2/js/former/edit.js'); ?>"></script>



