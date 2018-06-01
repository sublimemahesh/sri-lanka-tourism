$(document).ready(function () {

    setRooms();

    $("#checkin, #checkout").change(function () {
        setRooms();
        tabDis();
    });

});
function setRooms() {
    var date1 = $.trim($("#checkin").val());
    var date2 = $.trim($("#checkout").val());
    if ((date1.length > 0) && (date2.length > 0))
    {
        var checkin = $("#checkin").val();
        var checkout = $("#checkout").val();
        var accommodation = $("#accommodation").val();

        $.ajax({

            url: "ajax/room-price.php",
            type: 'POST',
            data: {checkin: checkin, checkout: checkout, accommodation: accommodation},
            dataType: 'JSON',
            success: function (returndata) {

                $.each(returndata, function (key, value) {

                    $("#" + key + "-available").text(value.available);
                    var available = parseInt($("#" + key + "-available").text());

                    $.each(value.prices, function (index, price) {

                        var selectId = key + '-' + index;
                        $('#' + selectId).empty();

                        var html = '<option selected="" value="0" each-price="0">- Please Select -</option>';
                        for (var i = 1; i <= available; i++) {

                            price = (parseFloat(price)).toFixed(2);
                            var thisPrice = (price * i).toFixed(2);

                            if (!thisPrice.trim() || isNaN(thisPrice)) {
                                $('#' + selectId).empty();
                            } else {
                                var letterS = 's';
                                if (i === 1) {
                                    letterS = '';
                                }
                                html += '<option value="' + i + 'XXX'+ thisPrice +'" each-price="' + thisPrice + '">' + i + ' Room' + letterS + ' - LKR ' + ((parseInt(thisPrice)) + (0 * i)) * value.days + '</option>';
                            }




                        }

                        $('#' + selectId).append(html);

                    });

                });

            }

        });
    }


}
