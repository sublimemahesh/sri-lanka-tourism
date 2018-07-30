$(document).ready(function () {

    $('#subsection-picture').change(function () {
        var image = $("#subsection-picture").val();

        $('#loading').show();

        $.ajax({
            url: "post-and-get/ajax/post-tour-subsection-images.php",
            type: "POST",
            dataType: "json",
            data: {
                image:image,
                option:'ADDIMAGE'
            },
            
            success: function (mess) {

                var arr = mess.filename.split('.');

                var html = '';
                html += '<div class="col-md-2 bottom-top" id="col_' + arr[0] + '" style="padding-bottom: 3px;">';
                html += '<img src="../upload/tour-package/sub-section/thumb/' + mess.filename + '"  class="img img-responsive">';
                html += '<input type="hidden" name="tour-packages-images[]" value="' + mess.filename + '"/>';
                html += '<i class="img-tour-package-delete delete-icon btn btn-danger btn-md fa fa-trash-o"  id="' + arr[0] + '"></i>';
                html += '</div>';
                $('#image-list').prepend(html);
                $('#loading').hide();
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('#image-list').on('click', '.img-tour-package-delete', function () {

        $('#col_' + this.id).remove();
    });
});
