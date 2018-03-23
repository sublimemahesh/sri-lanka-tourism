
$(document).ready(function () {

    $('.update-price').change(function () {

        var data = $(this).val();
        var priceId = $(this).attr('priceid');
        var column = $(this).attr('column');


        swal({
            title: "Are you sure?",
            text: "Do you want to change Price?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#107d8d",
            confirmButtonText: "Yes, Change it!",
            closeOnConfirm: false
        }, function () {

            $.ajax({
                url: "post-and-get/ajax/update-room-price.php",
                type: "POST",
                data: {
                    id: priceId,
                    data: data,
                    column: column
                },
                dataType: "JSON",
                success: function (jsonStr) {
                    if (jsonStr.status) {

                        swal({
                            title: "Changed!",
                            text: "Room Price has been changed.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                }
            });
        });
    });
});