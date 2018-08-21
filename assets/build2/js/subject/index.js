
function init() {
    $('button.deleteSubject').on('click',function (e) {

        e.preventDefault();

       var data={
           'subject_id':$(this).attr('data-id')
       };
       apiRequest(deleteSubject_url,data);
    });

}


$(document).ready(function () {
    init();
});
