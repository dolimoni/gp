<?php $this->load->view('user/partials/user_header.php'); ?>

<style>
    input,
    input[type="radio"] + label,
    input[type="checkbox"] + label:before,
    select option,
    select {
        width: 100%;
        padding: 1em;
        line-height: 1.4;
        background-color: #f9f9f9;
        border: 1px solid #e5e5e5;
        color:black;
        border-radius: 3px;
        -webkit-transition: 0.35s ease-in-out;
        -moz-transition: 0.35s ease-in-out;
        -o-transition: 0.35s ease-in-out;
        transition: 0.35s ease-in-out;
        transition: all 0.35s ease-in-out;
    }
    input:focus {
        outline: 0;
        border-color: #ed1b24;
    }
    input:focus + .input-icon i {
        color: #ed1b24;
    }
    input:focus + .input-icon:after {
        border-right-color: #ed1b24;
    }
    input[type="radio"] {
        display: none;
    }
    input[type="radio"] + label,
    select {
        display: inline-block;
        width: 50%;
        text-align: center;
        float: left;
        border-radius: 0;
    }
    input[type="radio"] + label:first-of-type {
        border-top-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }
    input[type="radio"] + label:last-of-type {
        border-top-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }
    input[type="radio"] + label i {
        padding-right: 0.4em;
    }
    input[type="radio"]:checked + label,
    input:checked + label:before,
    select:focus,
    select:active {
        background-color: #ed1b24;
        color: #fff;
        border-color: #ed1b24;
    }
</style>
<title></title>

<!-- page content -->
<div class="right_col" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 mgtp10">
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
                                        ></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input disabled type="email" value="<?php echo $user['email']; ?>" id="email" name="email" required="required"
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
                            <label for="password" class="control-label col-md-3">Entreprise</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="password" data-validate-length="6,8"
                                       class="form-control col-md-7 col-xs-12" value="<?php echo $user['c_name']; ?>" required="required">
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


<?php $this->load->view('user/partials/user_footer'); ?>

<script>
    var swal_success_operation_lang = "<?= lang("swal_success_operation"); ?>";
    var swal_error_lang = "<?= lang("swal_error"); ?>";
    var swal_success_edit_lang = "<?= lang("swal_success_edit"); ?>";
    var swal_warning_delete_lang = "<?= lang("swal_warning_delete"); ?>";
    var swal_success_delete_lang = "<?= lang("swal_success_delete"); ?>";
</script>



<script>
    $(document).ready(function () {


        $("#send").on("click", function (e) {
            e.preventDefault();
            var id = $("input[name=id]").val();
            var password = $("input[name=password]").val();
            var user = {
                "last_name": $("input[name=last_name]").val(),
                "first_name": $("input[name=first_name]").val(),
                "email": $("input[name=email]").val(),
                "company": $("input[name=company]").val(),
                "sexe": $('input[name=gender]:checked').val(),
                "mobile": $("input[name=mobile]").val(),
                "address": $("input[name=address]").val(),
            };
            var myData = {
                "id": id,
                "user": user,
                "password": password,
            };
            apiRequest("<?php echo base_url('user/api/trainee/apiEditUser'); ?>",myData);
        });

    });
</script>


