//tabs


function tab() {
    var li = $('.r-tabs-nav .r-tabs-tab');
    li.on('click', function () {
        console.log(li);
        var link = $(this).find("a").attr('href');
        console.log(link);

        li.removeClass('r-tabs-state-active');
        li.addClass('r-tabs-state-default');
        $(this).addClass('r-tabs-state-active');

        var panel = $('div.r-tabs-panel');

        panel.removeClass('r-tabs-state-active');
        panel.addClass('r-tabs-state-default');
        panel.css({'display': 'none'});


        $(link).addClass('r-tabs-state-active');
        $(link).css({
            'display': 'block'
        })


    });
}

function strPad(i, l, s) {
    var o = i.toString();
    if (!s) {
        s = '0';
    }
    while (o.length < l) {
        o = s + o;
    }
    return o;
};

function convertDate(date, separator1, separator2, type) {
    var response = "";
    if (!date) {
        return date;
    }
    switch (type) {
        case 1:
            //from dd-mm-yyyy to yyyy-mm-dd
            var datearray = date.split(separator1);
            response = datearray[2] + separator2 + datearray[1] + separator2 + datearray[0];
            break;
        case 2:
            //from yyyy-mm-dd to dd-mm-yyyy
            var datearray = date.split(separator1);
            response = datearray[0] + separator2 + datearray[1] + separator2 + datearray[2];
            break;
        case 3:
            //from yyyy-mm-dd to dd-mm-yyyy
            var datearrayTmp = date.split(" ");
            var datearray = datearrayTmp[0].split(separator1);
            response = datearray[2] + separator2 + datearray[1] + separator2 + datearray[0];
            break;
        case 4:
            //from mm-dd-yyyy to yyyy-mm-dd
            console.log(date);
            var datearray = date.split(separator1);
            response = datearray[2] + separator2 + datearray[0] + separator2 + datearray[1];
            break;
        default:

    }
    return response;
}


function getCurrentDate() {
    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate();

    var output = d.getFullYear() + '-' +
        (month < 10 ? '0' : '') + month + '-' +
        (day < 10 ? '0' : '') + day;

    return output;
}

function apiRequest(url, data, user_params, handleData) {
    var response = '';
    var params={
        'swal':'true',
        'callable':false,
        'reload':true,
        'callbackdata':null,
        'redirect':undefined,
        'warning_message':"Une erreur s'est produite"
    };
    if(user_params){
        params=user_params;
    }
    $.ajax({
        url: url,
        type: "POST",
        dataType: "json",
        data: data,
        beforeSend: function () {
            $('#loading').show();
        },
        complete: function () {
            $('#loading').hide();
        },
        success: function (data) {
            $('#loading').hide();
            if (data.status === "success") {
                if (params.swal === "true") {
                    swal({
                        title: "Success",
                        text: "Successs",
                        type: "success",
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
                if (params.reload) {
                    location.reload();
                }
                if(params.redirect){
                    window.location.href = params.redirect;
                }
            } else {
                swal({
                    title: "Erreur",
                    text:params['warning_message'] ,
                    type: "warning",
                    timer: 1500,
                    showConfirmButton: false
                });
            }
            if(!data.status){
                swal({
                    title: "Erreur",
                    text: "Une erreur s'est produite",
                    type: "warning",
                    timer: 1500,
                    showConfirmButton: false
                });
            }
            if (params.callable) {
                handleData(data, params.callbackdata);
            }
        },
        error: function (data) {
            swal({
                title: "Erreur",
                text: "Une erreur s'est produite",
                type: "error",
                timer: 1500,
                showConfirmButton: false
            });
            if (params.callable) {
                handleData(data);
            }
        }
    });
}

//form : jquery form selector
function besysValidateForm(form) {
    validate = true;
    $('.error-msg').fadeOut(50);
    let validations = form.find('.toBeValidated');
    $.each(validations, function (key, validation) {
        let required = $(validation).attr('data-required');
        let value = $(validation).val();
        if (required && value === '') {
            let name=$(validation).attr('name');
            let label=form.find('span.'+name+'-error');
            $(label).fadeIn(500);
            $(label).html('Veuillez remplir ce champ');
            scroll(label);
            validate = false;
        }
    });
    return validate;
}

function scroll(selector) {
    // Scroll
    $('html,body').animate({scrollTop: $(selector).offset().top}, 'slow');
}

$(document).ready(function () {
    tab();
});
