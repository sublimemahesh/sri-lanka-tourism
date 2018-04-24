$(document).ready(function () {

    $('#front-picture').change(function () {
        $('#loading').show();
        var formData = new FormData($('#frontForm')[0]);

        $.ajax({
            url: "post-and-get/ajax/licence.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (mess) {

                $("#front_pic").attr("src", "../upload/transport/licence/" + mess.filename);
                $('#loading').hide();
                location.reload()
            },
            cache: false,
            contentType: false,
            processData: false
        });

    });

    $('#back-picture').change(function () {
        $('#loading').show();
        var formData = new FormData($('#backForm')[0]);

        $.ajax({
            url: "post-and-get/ajax/licence.php",
            type: "POST",
            data: formData,
            async: false,
            dataType: 'json',
            success: function (mess) {

                $("#back_pic").attr("src", "../upload/transport/licence/" + mess.filename);
                $('#loading').hide();
                location.reload()
            },
            cache: false,
            contentType: false,
            processData: false
        });

    });


});