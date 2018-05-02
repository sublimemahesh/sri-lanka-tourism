$(document).ready(function () {

    $('#start_date').change(function () {
        var start_date = $('#start_date').val();
        var days = parseInt($('#days').val());


        var result = new Date(start_date);
        result.setDate(result.getDate() + days);
        
        var year = result.getFullYear();
        var month = result.getMonth() + 1;
        var day = result.getDate();
        var m;
        var d;

        if(month < 10) {
            m = '0' + month;
        } else {
            m = month;
        }
        if(day < 10) {
            d = '0' + day;
        } else {
            d = day;
        }
        var end_date = year + '-' + m + '-' + d;

        $('#end_date').val(end_date);


    });
});

