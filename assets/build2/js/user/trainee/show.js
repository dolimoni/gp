
function init() {


    var filesList = [],
        paramNames = [],
        elem = $("#fileupload");
    let currentType='';


    var file_upload = elem.fileupload({
        autoUpload: true,
        fileInput: $("input:file"),
        singleFileUploads:false,
        url: upload_url,
        sequentialUploads:true,
        filesContainer: $('table tbody.files'),
        uploadTemplateId: null,
        downloadTemplateId: null,
        uploadTemplate:uploadTemplate,
        downloadTemplate:downloadTemplate,
        add:addImg,
    }).on("fileuploadadd", function(e, data){
        filesList.push(data.files[0]);
        let name=e.delegatedEvent.target.name;
        paramNames.push(name);
        currentType=name
    });

    function  addImg(e, data) {
        if (data.files && data.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#previewTarget').attr('src', e.target.result);
            }
            reader.readAsDataURL(data.files[0]);
            data.submit();
        }
    }

    $('#fileupload').bind('fileuploaddone', function (e, data) {
        let index=data.paramName[0];
        uploads[index]=data.result.files[0].url;
    });


    function uploadTemplate(o) {
        var rows = $();
        $('.template-upload.'+currentType).remove();
        $.each(o.files, function (index, file) {
            var row = $('<tr class="template-upload '+currentType+' fade">' +
                '<td><span class="preview"></span></td>' +
                '<td><p class="name"></p>' +
                '<div class="error"></div>' +
                '</td>' +
                '<td><p class="size"></p>' +
                '<div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>' +
                '</td>' +
                '<td hidden>' +
                (!index && !o.options.autoUpload ?
                    '<button class="start" disabled>Start</button>' : '') +
                (!index ? '<button class="cancel">Cancel</button>' : '') +
                '</td>' +
                '</tr>');
            row.find('.name').text(file.name);
            row.find('.size').text(o.formatFileSize(file.size));
            if (file.error) {
                row.find('.error').text(file.error);
            }

            rows = rows.add(row);
        });

        return rows;
    }
    function downloadTemplate(o) {
        var rows = $();
        $.each(o.files, function (index, file) {
            var row = $('<tr class="template-download fade">' +
                '<td><span class="preview"></span></td>' +
                '<td><p class="name"></p>' +
                (file.error ? '<div class="error"></div>' : '') +
                '</td>' +
                '<td><span class="size"></span></td>' +
                '<td hidden><button class="delete">Delete</button></td>' +
                '</tr>');
            row.find('.size').text(o.formatFileSize(file.size));
            if (file.error) {
                row.find('.name').text(file.name);
                row.find('.error').text(file.error);
            } else {
                row.find('.name').append($('<a></a>').text(file.name));
                if (file.thumbnailUrl) {
                    row.find('.preview').append(
                        $('<a></a>').append(
                            $('<img>').prop('src', base_url+file.thumbnailUrl)
                        )
                    );
                }
                row.find('a')
                    .attr('data-gallery', '')
                    .prop('href', file.url);
                row.find('button.delete')
                    .attr('data-type', file.delete_type)
                    .attr('data-url', file.delete_url);
            }
            rows = rows.add(row);
        });
        return rows;
    }
}


$(document).ready(function () {
    init();
});
