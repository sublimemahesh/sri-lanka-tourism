$(document).ready(function () {

    $('#room-picture').change(function () {

        var fi = document.getElementById('room-picture'); // GET THE FILE INPUT.
        if (fi.files.length > 0) {
            for (var i = 0; i <= fi.files.length - 1; i++) {
                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                if (Math.round((fsize / 1024)) > 10000) {
                    swal({
                        title: "Error!",
                        text: "Image is too large and please upload a image size less than 10MB",
                        type: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    return false;
                }
            }
        }


        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index', '9999');
     
        var formData = new FormData($('#form-new-room-photo')[0]);

        $.ajax({
            url: "post-and-get/ajax/add-room-photo.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (mess) {

                var arr = mess.filename.split('.');

                var html = '';
                html += '<div class="col-md-3" style="padding-bottom: 15px" id="div_' + mess.id + '">';
                html += '<img src="../upload/accommodation/rooms/thumb/' + mess.filename + '" class="img-responsive "> ';
                html += '<a class="aa">';
                html += '<button class="delete-room-photo delete-icon btn btn-danger btn-md fa fa-trash-o" data-id="' + mess.id + '"></button>';
                html += '</a>';
                html += '</div>';
                $('#image-list').prepend(html);
               $('.box').jmspinner(false);
                $('.box').removeClass('well');
                $('.box').css('z-index', '-1111');
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

});
