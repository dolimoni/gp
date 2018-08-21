
function init() {
    $('#addTraineeForm').submit(function (e) {
        e.preventDefault();
       var trainee_id = $('select[name=trainee]').val();
       var scoreTest = $('input[name=scoreTest]').val();
       var training_id = $('input[name=training]').val();
       var data={
          'data': {
              'trainee':trainee_id,
              'scoreTest':scoreTest,
              'training':training_id,
          }
       };
       var params={
           'swal':'true',
           'callable':false,
           'reload':true,
           'callbackdata':null
       };
       console.log(data);
       apiRequest(addTraineeToTraining_url,data,params);
    });

    $('#editTraineeForm').on('submit', function (e) {
        e.preventDefault();
        var scoreTest = $('#editUser input[name=scoreTest]').val();
        var training_id = $('input[name=training]').val();
        var trainee_id = $('#editUser input[name=user_id]').val();
        var data={
            'data': {
                'trainee':trainee_id,
                'scoreTest':scoreTest,
                'training':training_id,
            }
        };
        var params={
            'swal':'true',
            'callable':false,
            'reload':true,
            'callbackdata':null
        };
        console.log(data);
        apiRequest(editTrainee_url,data,params);
    });


    $('#synthesisForm').on('submit', function (e) {
        e.preventDefault();
        var publish = $(this).find("input[type=checkbox][name=publish]");
        var publish_program = $(this).find("input[type=checkbox][name=publish_program]");
        var publish_course = $(this).find("input[type=checkbox][name=publish_course]");
        var enable_training_start_mail = $(this).find("input[type=checkbox][name=enable_training_start_mail]");
        var formData = new FormData(this);
        if(publish.is(":checked")){
            formData.append('publish', true);
        }else {
            formData.append('publish', false);
        }
        if(enable_training_start_mail.is(":checked")){
            formData.append('enable_training_start_mail', true);
        }else {
            formData.append('enable_training_start_mail', false);
        }
        if(publish_program.is(":checked")){
            formData.append('publish_program', true);
        }else {
            formData.append('publish_program', false);
        }
        if(publish_course.is(":checked")){
            formData.append('publish_course', true);
        }else {
            formData.append('publish_course', false);
        }
        $('#loading').show();
        $.ajax({
            type: 'POST',
            url: addSynthesis_url,
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
                location.reload();
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

    $(".editUser").on('click', editUserEvent);

    var l_id = -1;
    function editUserEvent() {
        if ($(this).attr('data-user-id') === l_id || l_id === -1) {
            $('#editUser').toggle('slow');
        }
        l_id = $(this).attr('data-user-id');

        $('#editUser input[name="name"]').val($(this).attr('data-user-firstName')+' '+$(this).attr('data-user-lastName'));
        $('#editUser input[name="scoreTest"]').val($(this).attr('data-scoreTest'));
        $('#editUser input[name="user_id"]').val(l_id);

        console.log(l_id);
        scroll("editUser");
    }


    function scroll(id) {
        // Scroll
        $('html,body').animate({scrollTop: $("#" + id).offset().top}, 'slow');
    }

    $('button.deleteUser').on('click',function (e) {
        e.preventDefault();
       var trainee_id = $(this).attr('data-user-id');
       var training_id = $('input[name=training]').val();
       var data={
          'data': {
              'trainee':trainee_id,
              'training':training_id,
          }
       };
       var params={
           'swal':'true',
           'callable':false,
           'reload':true,
           'callbackdata':null
       };
       console.log(data);
       apiRequest(deleteTraineeFromTraining_url,data,params);
    });

    $('.sendmail').on('click',function () {
       let training_id = $(this).attr('data-training-id');
       let email_id = $(this).attr('data-email-id');
       let data={
           'training_id':training_id,
           'email_id':email_id,
       };
       let params={
           'warning_message':'L\'email n\'a pas pu être envoyé'
        };
       apiRequest(sendemail_url,data,params);
    });

}



function addTrainee(){
    $(".addTrainee").on("click", addNewMealEvent);
    $('.addTraineeValidation').on('click',function () {
        let trainees=[];
        let training=training_id;
        datatable_trainees.rows().every( function ( rowIdx, tableLoop, rowLoop ) {
            var data = this.data();
            var row = $(this.node());
            console.log(row);
            let id =row.find('td').eq(3).attr('data-id');
            let scoreTest =row.find('td').eq(3).html();
            let trainee={
                'id':id,
                'scoreTest':scoreTest
            };
            trainees.push(trainee);
        } );
        let params={'reload':false};
        apiRequest(addTraineesToTraining_url,{'trainees':trainees,'training':training},params);
    });
}

function addNewMealEvent(){
    var rowNode = datatable_trainees.row.add( {
        "first_name":"",
        "last_name":"",
        "email":"",
        "scoreTest":"",
        "actions":""
        }
    ).draw( false ).node();

    $( rowNode ).find('td').eq(0).attr("contenteditable",true);
    $( rowNode ).find('td').eq(0).focus();

    $( rowNode ).find('td').eq(0).autocomplete({
        source: traineesInCompanyNames,
        select: function (event, ui) {
            var label = ui.item.label;
            var value = ui.item.value;
            var id = ui.item.id;
            var last_name = ui.item.last_name;
            var email = ui.item.email;
            var target= $(this);
            $( rowNode ).find('td').eq(0).html(value);
            $( rowNode ).find('td').eq(1).html(last_name);
            $( rowNode ).find('td').eq(2).html(email);
            $( rowNode ).find('td').eq(3).html('0');
            $( rowNode ).find('td').eq(3).attr("contenteditable",true);
            $( rowNode ).find('td').eq(3).attr("data-id",id);

            traineesInCompanyNames = jQuery.grep(traineesInCompanyNames, function(element) {
                return element.id != ui.item.id;
            });
            $(this).autocomplete('option', 'source', traineesInCompanyNames)

            //searchMealEvent(target,value);
        }
    });


}


$(document).ready(function () {
    var addTraineeToTraining_url;
    init();
    addTrainee();
});
