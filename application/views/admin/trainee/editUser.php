<?php $this->load->view('admin/partials/admin_header.php'); ?>

<link href="<?php echo base_url("assets/css/createUserForm.css"); ?>" rel="stylesheet">

<title></title>


<!-- page content -->
<div class="right_col" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Informations
                        <small><?= lang('edit'); ?></small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="form-horizontal form-label-left" novalidate>

                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>"/>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?= lang('name'); ?> <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="last_name" value="<?php echo $user['last_name']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                       data-validate-words="2" name="last_name" placeholder="<?= lang('name'); ?>"
                                       required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?= lang("last_name"); ?> <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="first_name" value="<?php echo $user['first_name']; ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                       data-validate-words="2" name="first_name" placeholder="<?= lang("last_name"); ?>"
                                       required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?= lang('email'); ?> <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" value="<?php echo $user['email']; ?>" id="email" name="email" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password" class="control-label col-md-3"><?= lang('password'); ?></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" type="password" name="password" data-validate-length="6,8"
                                       class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password" class="control-label col-md-3">Sexe</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-8">

                                        <?php
                                        $checked_man='checked';
                                        $checked_women='';
                                        if($user['sexe']==='homme'){
                                            $checked_man='checked';
                                            $checked_women='';
                                        }else{
                                            $checked_man='';
                                            $checked_women='checked';
                                        }
                                        ?>
                                        <div class="form-control-group">
                                            <input <?php echo $checked_man; ?> type="radio" name="gender" value="homme" id="gender-male"/>
                                            <label for="gender-male">Homme</label>
                                            <input <?php echo $checked_women; ?> type="radio" name="gender" value="femme" id="gender-female"/>
                                            <label for="gender-female">Femme</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Entreprise<span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="company" class="form-control col-md-7 col-xs-12">
                                    <option value="0">Choisisez une entreprise</option>
                                    <?php foreach ($companies as $company){
                                    $selected='';
                                    if($company['id']===$user['company']){
                                        $selected='selected';
                                    }
                                    ?>
                                    <option <?php echo $selected; ?> value="<?php echo $company['id']; ?>"><?php echo $company['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password" class="control-label col-md-3">Téléphone</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="mobile" data-validate-length="6,8"
                                       class="form-control col-md-7 col-xs-12" value="<?php echo $user['mobile']; ?>" >
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password" class="control-label col-md-3">Adresse</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="address" data-validate-length="6,8"
                                       class="form-control col-md-7 col-xs-12" value="<?php echo $user['address']; ?>">
                            </div>
                        </div>

                        <!--<div class="item form-group">
                            <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Confirmation</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password2" type="password" name="password2" data-validate-linked="password"
                                       class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                        </div>-->

                        <div class="form-group">
                            <div class="text-center">
                                <!--<button type="submit" class="btn btn-primary">Annuler</button>-->
                                <button id="send" class="btn btn-success"><?= lang('send'); ?></button>
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
    var swal_success_operation_lang = "<?= lang("swal_success_operation"); ?>";
    var swal_error_lang = "<?= lang("swal_error"); ?>";
    var swal_success_edit_lang = "<?= lang("swal_success_edit"); ?>";
    var swal_warning_delete_lang = "<?= lang("swal_warning_delete"); ?>";
    var swal_success_delete_lang = "<?= lang("swal_success_delete"); ?>";
</script>

<script src="<?php echo base_url("assets/build2/js/kendo.all.min.js"); ?>"></script>


<script>
    $(document).ready(function () {


        $("#send").on("click", function (e) {
            e.preventDefault();


            var id = $("input[name=id]").val();
            var password = $("input[name=password]").val();
            var company = $('select[name=company]').val();
            var user = {
                "last_name": $("input[name=last_name]").val(),
                "first_name": $("input[name=first_name]").val(),
                "email": $("input[name=email]").val(),
                "sexe": $('input[name=gender]:checked').val(),
                "mobile": $("input[name=mobile]").val(),
                "address": $("input[name=address]").val(),
                "company": company,
            }
            var myData = {
                "id": id,
                "user": user,
                "password": password
            }
            $.ajax({
                url: "<?php echo base_url('admin/api/trainee/apiEditUser'); ?>",
                type: "POST",
                dataType: "json",
                data: myData,
                beforeSend: function () {
                    $('#loading').show();
                },
                complete: function () {
                    $('#loading').hide();
                },
                success: function (data) {
                    if (data.status === "success") {
                        swal({
                            title: "Success",
                            text:swal_success_operation_lang,
                            type: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });
                    } else {
                        swal({
                            title: "Erreur",
                            text: swal_error_lang,
                            type: "warning",
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                },
                error: function (data) {
                    swal({
                        title: "Erreur",
                        text: swal_error_lang,
                        type: "warning",
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });

        });

    });
</script>


