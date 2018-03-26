
$(document).ready(function () {

    $(".roomtype").change(function (e) {


        var id = $(this).attr("day");

        var year = $(".date").attr("year");
        var month = $(".date").attr("month");
        var day = id;
        var room = $("#room_" + id).attr("roomid");
        var availableNow = $(this).attr('available');
        var newrooms = $("#room_" + id).val();
        $.ajax({
            url: "post-and-get/ajax/update-availability.php",
            type: "POST",
            data: {
                date: year + '-' + month + '-' + day,
                room: room,
                availablenow: availableNow,
                newrooms: newrooms
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
                } else {
                    location.reload();
                }
            }
        });

    });

});
