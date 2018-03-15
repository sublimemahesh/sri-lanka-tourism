$(document).ready(function () {

    $('#tour-sub-picture').change(function () {

        $('#loading').show();
        var formData = new FormData($('#form-tour-sub-section-package')[0]);

        $.ajax({
            url: "post-and-get/ajax/post-tour-package-images.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
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
