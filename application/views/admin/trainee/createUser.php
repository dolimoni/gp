<?php $this->load->view('admin/partials/admin_header.php'); ?>

<link href="<?php echo base_url("assets/css/createUserForm.css"); ?>" rel="stylesheet">

<title></title>

<link href="<?php echo base_url("assets/build2/css/kendo.common.min.css"); ?>" rel="stylesheet"/>
<link href="<?php echo base_url("assets/build2/css/kendo.default.min.css"); ?>" rel="stylesheet"/>
<link href="<?php echo base_url("assets/build2/css/kendo.mobile.all.min.css"); ?>" rel="stylesheet"/>
<link href="<?php echo base_url("assets/build2/css/font-awesome.min.css"); ?>" rel="stylesheet"/>

<!-- page content -->
<div class="right_col" role="main">

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ajouter
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

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nom <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="last_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                       data-validate-words="2" name="last_name" placeholder="Nom"
                                       required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prénom <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="first_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                       data-validate-words="2" name="first_name" placeholder="Prénom"
                                       required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="email" id="email" name="email" placeholder="Email" required="required"
                                       class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password" class="control-label col-md-3">Mot de passe
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" type="password" name="password" placeholder="Mot de passe" data-validate-length="6,8"
                                       class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label for="password" class="control-label col-md-3">Sexe</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-control-group">
                                            <input checked type="radio" name="gender" value="homme" id="gender-male"/>
                                            <label for="gender-male">Homme</label>
                                            <input type="radio" name="gender" value="femme" id="gender-female"/>
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
                                    <?php foreach ($companies as $company){ ?>
                                        <option value="<?php echo $company['id']; ?>"><?php echo $company['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Téléphone <span
                                        ></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="tel"id="number" name="mobile" placeholder="Téléphone" required="required"
                                       data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Adresse <span
                                        ></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="address" name="address" placeholder="Adresse" required="required"
                                       data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="item form-group" hidden>
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="role">Role <span
                                        class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="role" class="form-control col-md-7 col-xs-12">
                                   <option data-role="user">Stagiaire</option>
                                   <option data-role="rh">RH</option>
                                   <option data-role="admin">Administrateur</option>
                               </select>
                            </div>
                        </div>

                        <!--<div class="item form-group">
                            <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Confirmation</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password2" type="password" name="password2" data-validate-linked="password"
                                       class="form-control col-md-7 col-xs-12" required="required">
                            </div>
                        </div>-->

                        <div class="ln_solid"></div>

                        <div class="item form-group aclList" hidden>
                            <label for="password2"
                                   class="control-label col-md-3 col-sm-3 col-xs-12">Droits d accèss</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="demo-section k-content">
                                    <div>
                                        <div id="treeview"></div>
                                    </div>
                                </div>
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


<script src="<?php echo base_url("assets/build2/js/kendo.all.min.js"); ?>"></script>
<script>
    var createUser_url="<?php echo base_url('admin/api/trainee/apiCreateUser'); ?>"
</script>

<script>
    $(document).ready(function () {

        var role="user";

        treeView = $("#treeview").data("kendoTreeView");
        $("#send").on("click", function (e) {
            e.preventDefault();

            var company = $('select[name=company]').val();


            var id = $("input[name=id]").val();
            var password = $("input[name=password]").val();
            var user = {
                "last_name": $("input[name=last_name]").val(),
                "first_name": $("input[name=first_name]").val(),
                "email": $("input[name=email]").val(),
                "mobile": $("input[name=mobile]").val(),
                "address": $("input[name=address]").val(),
                "sexe":$('input[name=gender]:checked').val(),
                "type": role,
                "company": company,
                "date_of_birth": '00-00-0000',
            };
            var myData = {
                "id": id,
                "user": user,
                "password": password,
            };
            $.ajax({
                url: createUser_url,
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
                            text: "L'opération a été bien effecuté",
                            type: "success",
                            timer: 1500,
                            showConfirmButton: false
                        });
                        document.location.href = "<?php echo base_url("admin/trainee/getAll"); ?>";
                    }
                    else if (data.status === "warning") {
                        swal({
                            title: "Success",
                            text: data.message,
                            type: "warning",
                            timer: 1500,
                            showConfirmButton: false
                        });
                    } else {
                        swal({
                            title: "Erreur",
                            text: "Une erreur s'est produite",
                            type: "warning",
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }
                },
                error: function (data) {
                   // document.location.href = "<?php echo base_url("admin/config"); ?>";
                    /*swal({
                        title: "Erreur",
                        text: "Une erreur s'est produite",
                        type: "error",
                        timer: 1500,
                        showConfirmButton: false
                    });*/
                }
            });

        });

    });
</script>


