$(document).ready(function () {
    $('#article-city').keyup(function (e) {

        if (e.which != 38) {
            if (e.which != 40) {
                if (e.which != 13) {
                    var keyword = $('#article-city').val();
                    
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/city-ajax.php',
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
                            
                            $('#article-city-list').empty();
                            $('#article-city-list').append(html);
                        }
                    });
                }
            }
        }
    });

    $('#article-city').bind('keypress keydown keyup', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }

        var li = $('#article-city-list .city');
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
            $('#article-city-id').val(cityId);
            $('#article-city').val(cityname);
            $('#article-city-list').empty();

        }
    });

    $('#article-city-list').on('click', '.city', function () {
        var cityId = this.id;
        var cityName = $(this).text();
        $('#article-city-id').val(cityId.replace("c", ""));
        $('#article-city').val(cityName);
        $('#article-city-list').empty();
    });
    
    $('#article-city-list').on('mouseover', '.city', function () {
        var cityId = this.id;
        var cityName = $(this).text();
        $('#article-city-id').val(cityId.replace("c", ""));
        $('#article-city').val(cityName);
    });

    $('#article-city').bind('keypress keydown keyup', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    });
    
});
