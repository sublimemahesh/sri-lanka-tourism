$(document).ready(function () {
    $('#to').keyup(function (e) {
        var fromId = $('#from-id').val();
        if (e.which != 38) {
            if (e.which != 40) {
                if (e.which != 13) {
                    var keyword = $('#to').val();
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/city-ajax.php',
                        dataType: "json",
                        data: {keyword: keyword},
                        success: function (result) {

                            var html = '';
                            $.each(result, function (key) {
                                if (fromId !== this.id) {
                                    if (key === 0) {
                                        html += '<li id="c' + this.id + '" class="city selected">' + this.name + '</li>';
                                    } else {
                                        html += '<li id="c' + this.id + '" class="city">' + this.name + '</li>';
                                    }
                                }
                            });
                            $('#city-list-to').empty();
                            $('#city-list-to').append(html);
                        }
                    });
                }
            }
        }
    });

    $('#city-list-to').on('click', '.city', function () {
        var cityId = this.id;
        var cityName = $(this).text();
        $('#to-id').val(cityId.replace("c", ""));
        $('#to').val(cityName);
        $('#city-list-to').empty();
    });

    $('#city-list-to').on('mouseover', '.city', function () {
        var cityId = this.id;
        var cityName = $(this).text();
        $('#to-id').val(cityId.replace("c", ""));
        $('#to').val(cityName);
    });

    $(window).keydown(function (e) {
        var li = $('#city-list-to .city');
        var liSelected;
        var next = '';
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
            $('#to-id').val(cityId);
            $('#to').val(cityname);
            $('#city-list-to').empty();
        }
    });

    $('#to').bind('keypress keydown keyup', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    });
});
