
function init() {

    $('#send').on('click', function (e) {
        e.preventDefault();
        let form =$('#addSubjectForm');

        let contacts=getContacts();

        let company ={
            'field1':$('input[name=field1]').val(),
            'field2':$('input[name=field2]').val(),
            'turnOver':$('input[name=turnOver]').val(),
        };

        var data ={
            'company':company,
            'contacts':contacts
        };
        console.log(data);
        apiRequest(createCompany_url,data);
    });

}


function getContacts(){
    let contacts=[];

    let phone=$('input[name=phone]').val();
    let gsm=$('input[name=gsm]').val();
    let email=$('input[name=email]').val();

    /*Contact 2*/

    let phone2=$('input[name=phone2]').val();
    let gsm2=$('input[name=gsm2]').val();
    let email2=$('input[name=email2]').val();


    /*Contact 3*/

    let phone3=$('input[name=phone3]').val();
    let gsm3=$('input[name=gsm3]').val();
    let email3=$('input[name=email3]').val();

    if(phone!=='' || gsm!=='' || email!==''){
        let contact={
            'phone':phone,
            'gsm':gsm,
            'email':email
        };
        contacts.push(contact);
    }

    if(phone2!=='' || gsm2!=='' || email2!==''){
        let contact={
            'phone':phone2,
            'gsm':gsm2,
            'email':email2
        };
        contacts.push(contact);
    }

    if(phone3!=='' || gsm3!=='' || email3!==''){
        let contact={
            'phone':phone3,
            'gsm':gsm3,
            'email':email3
        };
        contacts.push(contact);
    }


    return contacts;



}


$(document).ready(function () {
    init();
});
