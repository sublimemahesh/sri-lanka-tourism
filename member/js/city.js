$(document).ready(function () {
    $('#city').keyup(function (e) {


        if (e.which != 38) {
            if (e.which != 40) {
                if (e.which != 13) {
                    var keyword = $('#city').val();
                    $.ajax({
                        type: 'POST',
                        url: 'post-and-get/ajax/city-ajax.php',
                        dataType: "json",
                        data: {keyword: keyword},
                        success: function (result) {

                            var html = '';
                            $.each(result, function (key) {
                                if (key === 0) {
                                    html += '<li id="c' + this.id + '" class="city selected">' + this.name + '</li>';
                                } else {
                                    html += '<li id="c' + this.id + '" class="city">' + this.name + '</li>';
                                }
                            });
                            $('#city-list').empty();
                            $('#city-list').append(html);
                        }
                    });
                }
            }
        }
    });

    $('#city').bind('keypress keydown keyup', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }

        var li = $('#city-list .city');
        var liSelected;
        if (e.which === 40) {
            if (liSelected) {
                liSelected.removeClass('selected');
                next = liSelected.next();
                if (next.length > 0) {
                    liSelected = next.addClass('selected');
                } else {
                    liSelected = li.eq(0).addClass('selected');
                }
            } else {
                liSelected = li.eq(0).addClass('selected');
            }
        } else if (e.which === 38) {
            if (liSelected) {
                liSelected.removeClass('selected');
                next = liSelected.prev();
                if (next.length > 0) {
                    liSelected = next.addClass('selected');
                } else {
                    liSelected = li.last().addClass('selected');
                }
            } else {
                liSelected = li.last().addClass('selected');
            }

        } else if (e.which === 13) {

            var selected = $('.selected').attr("id");
            var cityname = $('.selected').text();
            var cityId = selected.replace("c", "");
            $('#city-id').val(cityId);
            $('#city').val(cityname);
            $('#city-list').empty();

        }
    });

    $('#city-list').on('click', '.city', function () {
        var cityId = this.id;
        var cityName = $(this).text();
        $('#city-id').val(cityId.replace("c", ""));
        $('#city').val(cityName);
        $('#city-list').empty();
    });

    $('#city-list').on('mouseover', '.city', function () {
        var cityId = this.id;
        var cityName = $(this).text();
        $('#city-id').val(cityId.replace("c", ""));
        $('#city').val(cityName);
    });

    $('#city').bind('keypress keydown keyup', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    });

});
