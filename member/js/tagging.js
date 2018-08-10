$(document).ready(function () {

    $('.tagRemove').click(function (event) {
        event.preventDefault();
        $(this).parent().remove();
    });


    $('.tags').click(function (e) {
        e.preventDefault();
        var sort = $(this).attr('sort');

        $('#tags-field-' + sort).focus();
        
        $('#tags-field-' + sort).blur(function() {
            $('#tags-field-' + sort).val('');
        });

        $('#tags-field-' + sort).keyup(function (e) {
            var search = $('#tags-field-' + sort).val();

            $.ajax({
                type: 'POST',
                url: 'post-and-get/ajax/location.php',
                dataType: "json",
                data: {keyword: search, option: 'GETLOCATIONS'},
                success: function (result) {
                    if (result.length !== 0) {
                        var html = '';
                        html += '<select id="custom-headers-' + sort + '" class="searchable" multiple="multiple">';
                        $.each(result, function (key) {
                            html += '<option id="list-' + this.id + '" class="list-values" location="' + this.location + '" value="' + this.id + '">' + this.location + '</option>';
                        });
                        html += '</select>';


                        $('#select-box-' + sort).empty();
                        $('#select-box-' + sort).append(html);
                    }

                    var tags;

                    $("#tags-" + sort + " .addedTag.saveValue").each(function (index) {
                        tags = $(this).find('.h-tags').val();
                        $('#list-' + tags).addClass('hidden');
                    });

                    if ($('.list-values:visible').size() === 0) {
                        $('#select-box-' + sort).empty();
                    }

                }
            });

//            $('#tags-field-' + sort).keypress(function (event) {
//                if (event.which == '13') {
//                    event.preventDefault();
//                    if ($(this).val() != '') {
//                        $('<li class="addedTag">' + $(this).val() + '<span class="tagRemove" onclick="$(this).parent().remove();">x</span><input type="hidden" class="h-tags" value="' + $(this).val() + '" name="tags[]"></li>').insertBefore('#tags-' + sort + ' .tagAdd');
//                        $(this).val('');
//                    }
//                }
//            });
        });
        $('#select-box-' + sort).on('click', '.list-values', function () {
            var id = $(this).val();
            var loc = $(this).attr('location');
            $('#list-' + id).addClass('hidden');

            $('<li class="addedTag addedTag-' + sort + ' hidden" id="addedTag-' + sort + '-' + id + '">' + loc + '<span class="tagRemove" onclick="$(this).parent().remove();">x</span><input type="hidden" class="h-tags" value="' + id + '" name="tags[]"></li>').insertBefore('#tags-' + sort + ' .tagAdd');
            $('#tags-field-' + sort).val('');
            $('#select-box-' + sort).empty();

            $('#addedTag-' + sort + '-' + id).last().removeClass('hidden');
            $('#addedTag-' + sort + '-' + id).last().addClass('saveValue');



        });


    });

});


