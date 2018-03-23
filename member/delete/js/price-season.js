$(document).ready(function () {

    $('.delete-price-season').click(function () {

        var start = $(this).attr('start');
        var end = $(this).attr('end');
        var id = $(this).attr('row_id');

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {

            $.ajax({
                url: "delete/ajax/price-season.php",
                type: "POST",
                data: {
                    start: start,
                    end: end
                },
                dataType: "JSON",
                success: function (jsonStr) {
                    if (jsonStr.status) {

                        swal({
                            title: "Deleted!",
                            text: "Price Season has been deleted.",
                            type: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        window.location.reload();
                    }
                }
            });
        });
    });
});