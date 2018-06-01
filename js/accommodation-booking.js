$(document).ready(function () {
    $(".prices-list").change(function () {

        $(".each-main-type").each(function (index) {
            var typeOfThis = $(this).attr('typeid');
        });

        var selectedRooms = $(this).val();
        var selectedRoomId = $(this).attr('rtype');
        var selectedRbasis = $(this).attr('rbasis');


        var roomsCount = 0;
        var subTotal = 0.00;
        var roomsPrice = 0.00;

        $(".prices-list").each(function (index) {
            roomsCount += parseInt($(this).val());
            roomsPrice += parseFloat($(this).find('option:selected').attr('each-price'));


        });


        $("#selected-rooms").text(roomsCount);
        $("#total-price").text(roomsPrice);
        $("#total").val(roomsPrice);
    });

//    $("#book").click(function (e) {
//
//        var date = $("#date_time_booked").val();
//        var first_name = $("#first_name").val();
//        var second_name = $("#second_name").val();
//        var visitor_name = first_name + " " + second_name;
//        var checkin = $("#checkin").val();
//        var checkout = $("#checkout").val();
//        var accommodation = $("#accommodation").val();
//        var total = $("#total").text();
//
//
//        $.ajax({
//            url: "ajax/room-booking.php",
//            type: "POST",
//            data: {
//                date: date,
//                first_name: first_name,
//                second_name: second_name,
//                visitor_name: visitor_name,
//                checkin: checkin,
//                checkout: checkout,
//                accommodation: accommodation,
//                total: total,
//                actionAddBooking: 'ADDBOOKING'
//            },
//            dataType: "JSON",
//            success: function (result) {
//                if (result.error === 1) {
//                    $('body').loadingModal('destroy');
//                    $('#captchacode').focus();
//                    swal(
//                            'Error...',
//                            'Incorrect security code!',
//                            'error'
//                            );
//
//                } else if (result.error === 2) {
//                    swal(
//                            'Error...',
//                            'Technical error!',
//                            'error'
//                            );
//
//                } else {
//                    var id = result.bookingid;
//                    var advance = result.advanceprice;
//                    var res = advance.split(".");
//                    var advancerice1 = res[0] + res[1];
//
//                    $("input[name=vpc_Amount]").val(advancerice1);
//                    $("input[name=vpc_OrderInfo]").val(id);
//
//                    var uniqueone = Date.now();
//                    $("input[name=vpc_MerchTxnRef]").val(id + '-' + uniqueone);
//
//                    $("#payments").submit();
//                }
//            }
//        });
//    });

}
);