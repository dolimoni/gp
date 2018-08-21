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
                    <h2>Ajouter une entreprise
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
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Raison social <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $company['id'] ?>" name="id" type="hidden" />
                                    <input value="<?php echo $company['field1']; ?>" id="field1" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                           data-validate-words="2" name="field1" placeholder="Raison social"
                                           required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Effectif <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $company['field2']; ?>" id="field2" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                           data-validate-words="2" name="field2" placeholder="Effectif"
                                           required="required" type="text">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Chiffre d'affaire <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input value="<?php echo $company['turnOver']; ?>" type="number" id="turnOver" name="turnOver" placeholder="Chiffre d'affaire" required="required"
                                           class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div>
                                <span class="section">Contact 1</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Téléphone
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input
                                                data-id="<?php echo isset($contacts[0])?$contacts[0]['id']:'-1'  ?>"
                                                value="<?php echo isset($contacts[0])?$contacts[0]['phone']:''  ?>" id="phone" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                               data-validate-words="2" name="phone" placeholder="Téléphone"
                                               type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gsm">GSM
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input

                                                value="<?php echo isset($contacts[0])?$contacts[0]['gsm']:''  ?>"
                                                id="gsm" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                               data-validate-words="2" name="gsm" placeholder="GSM"
                                               type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="<?php echo isset($contacts[0])?$contacts[0]['email']:''  ?>" type="email" id="email" name="email" placeholder="email"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div>
                                    <button href="#contact2" data-toggle="collapse" aria-expanded="false"
                                            aria-controls="contact2" class="btn btn-success">Contact 2</button>

                                </div>
                            </div>


                            <div id="contact2" class="collapse">
                                <span class="section">Contact 2</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone2">Téléphone
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input
                                                data-id="<?php echo isset($contacts[1])?$contacts[1]['id']:'-1'  ?>"
                                                value="<?php echo isset($contacts[1])?$contacts[1]['phone']:''  ?>" id="phone2" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                               data-validate-words="2" name="phone2" placeholder="Téléphone"
                                               type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gsm2">GSM
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="<?php echo isset($contacts[1])?$contacts[1]['gsm']:''  ?>" id="gsm2" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                               data-validate-words="2" name="gsm2" placeholder="GSM"
                                               type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email2">Email
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="<?php echo isset($contacts[1])?$contacts[1]['email']:''  ?>" type="email" id="email2" name="email2" placeholder="Email"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <button href="#contact3" data-toggle="collapse" aria-expanded="false"
                                        aria-controls="contact3" class="btn btn-success">Contact 3</button>
                            </div>


                            <div id="contact3" class="collapse">
                                <span class="section">Contact 3</span>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone3">Téléphone
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input
                                                data-id="<?php echo isset($contacts[2])?$contacts[2]['id']:'-1'  ?>"
                                                value="<?php echo isset($contacts[2])?$contacts[2]['phone']:''  ?>" id="phone3" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                               data-validate-words="2" name="phone3" placeholder="Téléphone"
                                               type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="gsm3">GSM
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="<?php echo isset($contacts[2])?$contacts[2]['gsm']:''  ?>" id="gsm3" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                               data-validate-words="2" name="gsm3" placeholder="GSM"
                                               type="text">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email3">Email
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input value="<?php echo isset($contacts[2])?$contacts[2]['email']:''  ?>" type="email" id="email3" name="email3" placeholder="email"
                                               class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                            </div>


                        </form>




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

<script>
    var editCompany_url="<?php echo base_url('admin/api/company/apiEdit'); ?>";
</script>

<script src="<?php echo base_url('assets/build2/js/company/edit.js'); ?>"></script>



