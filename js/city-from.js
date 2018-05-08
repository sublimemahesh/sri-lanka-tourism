$(document).ready(function () {
    $('#from').keyup(function (e) {

        var toId = $('#to-id').val();
        if (e.which != 38) {
            if (e.which != 40) {
                if (e.which != 13) {
                    var keyword = $('#from').val();
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/city-ajax.php',
                        dataType: "json",
                        data: {keyword: keyword},
                        success: function (result) {

                            var html = '';
                            $.each(result, function (key) {
                                if (toId !== this.id) {
                                    if (key === 0) {
                                        html += '<li id="c' + this.id + '" class="city selected">' + this.name + '</li>';
                                    } else {
                                        html += '<li id="c' + this.id + '" class="city">' + this.name + '</li>';
                                    }
                                }
                            });
                            $('#city-list-from').empty();
                            $('#city-list-from').append(html);
                        }
                    });
                }
            }
        }
    });

    $('#from').bind('keypress keydown keyup', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }

        var li = $('#city-list-from .city');
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
            $('#from-id').val(cityId);
            $('#from').val(cityname);
            $('#city-list-from').empty();

        }
    });

    $('#city-list-from').on('click', '.city', function () {
        var cityId = this.id;
        var cityName = $(this).text();
        $('#from-id').val(cityId.replace("c", ""));
        $('#from').val(cityName);
        $('#city-list-from').empty();
    });
    
    $('#city-list-from').on('mouseover', '.city', function () {
        var cityId = this.id;
        var cityName = $(this).text();
        $('#from-id').val(cityId.replace("c", ""));
        $('#from').val(cityName);
    });

    $('#from').bind('keypress keydown keyup', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    });

});
