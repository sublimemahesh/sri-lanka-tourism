$(document).ready(function () {
    $('#accommodation-picture').change(function () {
        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index','9999');
        var formData = new FormData($('#form-accommodation')[0]);
        $.ajax({
            url: "post-and-get/ajax/post-accommodation-images.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (mess) {

                var arr = mess.filename.split('.');

                var html = '';
                html += '<div class="col-md-2 bottom-top" id="col_' + arr[0] + '" style="padding-bottom: 3px;">';
                html += '<img src="../upload/accommodation/thumb/' + mess.filename + '"  class="img img-responsive">';
                html += '<input type="hidden" name="accommodation-images[]" value="' + mess.filename + '"/>';
                html += '<i class="img-accommodation-delete delete-icon btn btn-danger btn-md fa fa-trash-o"  id="' + arr[0] + '"></i>';
                html += '</div>';
                $('#image-list').prepend(html);

                $('.box').jmspinner(false);
                $('.box').removeClass('well');
                $('.box').css('z-index','-1111');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('#image-list').on('click', '.img-accommodation-delete', function () {

        $('#col_' + this.id).remove();

    });
});
