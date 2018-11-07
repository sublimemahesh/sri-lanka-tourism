$(document).ready(function () {

    $.ajax({
        type: 'POST',
        url: 'ajax/price-range.php',
        dataType: "json",
        data: {actionMax: 'GETMAXPRICE'},
        success: function (resultmax) {
            var max = resultmax;

            $.ajax({
                type: 'POST',
                url: 'ajax/price-range.php',
                dataType: "json",
                data: {actionMin: 'GETMINPRICE'},
                success: function (resultmin) {
                    var min = resultmin;

                    $(function () {

                        $("#range").ionRangeSlider({
                            hide_min_max: true,
                            keyboard: true,
                            min: min,
                            max: max,
                            from: min,
                            to: max,
                            type: 'double',
                            step: 1,
                            prefix: "USD ",
                            grid: true
                        });

                    });
                }
            });
        }
    });



});





