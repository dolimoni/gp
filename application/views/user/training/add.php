<?php $this->load->view('admin/partials/admin_header.php'); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet">
<style>
    .profile_details:nth-child(2n) {
        clear: none;
    }
    .profile_details:nth-child(3n) {
        clear: none;
    }
</style>
<!-- page content -->
<div class="right_col" role="main">
    <div class="productsList">
        <div class="page-title">
            <div class="title_left">
                <h3>Ajouter une formation</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr>
        <form id="addProduct" method="post">
            <div class="row productsListContent">
                <div class="col-md-12 col-sm-12 col-xs-12 productItem" data-id="1">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Formation</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                <!--<li><a class="close-link"><i class="fa fa-close"></i></a></li>-->
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                                <fieldset>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                Entreprise :
                                                <select class="form-control" name="company">
<!--                                                    <option value="0">Aucune</option>-->
                                                    <?php foreach ($companies as $company) { ?>
                                                        <option
                                                                value="<?php echo $company['id']; ?>"><?php echo $company['name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                Formateur :
                                                <select class="form-control" name="former">
                                                    <!--<option value="0">Aucun</option>-->
                                                    <?php foreach ($formers as $former) { ?>
                                                        <option value="<?php echo $former['id']; ?>"><?php echo $former['first_name']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group">
                                                Type de formation :
                                                <select class="form-control" name="subject">
                                                    <!--<option value="0">Aucun</option>-->
                                                    <?php foreach ($subjects as $subject) { ?>
                                                        <option value="<?php echo $subject['id']; ?>"><?php echo $subject['title']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                Dates de formation
                                                <input name="dates" placeholder="Dates de formation" type="text" class="form-control date"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <label for="course">Support de formation :</label>
                                            <input type="file" class="form-control" name="course" size="10485760">
                                        </div>
                                    </div>
                                    <br/>
                                </fieldset>
                        </div> <!-- /content -->
                    </div><!-- /x-panel -->
                </div>
            </div>
            <div class="text-center">
                <input type="submit" name="buttonSubmit" value="Confirmer" class="btn btn-success"/>
            </div>
        </form>
    </div>

</div>
<?php $this->load->view('admin/partials/admin_footer'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<script>
    var swal_warning_obligatory_fields_lang="<?= lang("swal_warning_obligatory_fields"); ?>";

    var addCourse_url='<?php echo base_url("admin/api/training/apiAdd"); ?>';
    var showTraining_url='<?php echo base_url("admin/training/show/"); ?>';
</script>
<script>

    $(document).ready(function () {

        $('.date').datepicker({
            multidate: true,
            format:'dd-mm-yyyy'

        });

        $('.date').datepicker('setDates', [])

        $('#addProductt').submit( function (e) {
            e.preventDefault();  //prevent form from submitting

            var company = $('select[name=company]').val();
            var former = $('select[name=former]').val();
            var subject = $('select[name=subject]').val();
            var datesToConvert=$('input[name=dates]').val().split(',');
            var dates=[];

            $(datesToConvert).each(function( key,dateToConvert ) {
                console.log(dateToConvert);
                dates.push(convertDate(dateToConvert,'-','-',1));
            });
            console.log(dates);
            var data={
                'training':{
                    'company':company,
                    'former':former,
                    'subject':subject,
                },
                'training_dates':dates
            };
            apiRequest(addCourse_url,data);
        });

    });


</script>


<script>
    $(document).ready(function () {
        $('#addProduct').on('submit', function (e) {
            e.preventDefault();
            var company = $('select[name=company]').val();
            var former = $('select[name=former]').val();
            var subject = $('select[name=subject]').val();
            var datesToConvert=$('input[name=dates]').val().split(',');
            var dates=[];

            $(datesToConvert).each(function( key,dateToConvert ) {
                console.log(dateToConvert);
                dates.push(convertDate(dateToConvert,'-','-',1));
            });
            var formData = new FormData(this);

            formData['company']=company;
            formData['former']=former;
            formData['subject']=subject;
            formData.append("training_dates", dates);
            $('#loading').show();
            $.ajax({
                type: 'POST',
                url: addCourse_url,
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

                    window.location.replace(showTraining_url+data.training_id);
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
