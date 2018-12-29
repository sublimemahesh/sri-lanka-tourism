$(document).ready(function (e) {
 
    var tourid = $('#tour').val();
    $.ajax({
        type: 'POST',
        url: 'post-and-get/ajax/post-tour-package-images.php',
        dataType: "json",
        data: {
            tour: tourid,
            option: 'GETTOURSUBSECTIONDETAILS'
        },
        success: function (subsections) {
            $.each(subsections, function (key, subsection) {
                $('#title-' + subsection.sort).val(subsection.title);
                $('#description-' + subsection.sort).val(subsection.description);
                var tags = subsection.locations;
                var locations = tags.split(',');

                $.each(locations, function (key, location) {
                    $.ajax({
                        type: 'POST',
                        url: 'post-and-get/ajax/post-tour-package-images.php',
                        dataType: "json",
                        data: {
                            location: location,
                            option: 'GETLOCATIONNAME'
                        },
                        success: function (location) {
                            var loc = location.location;
                            if (loc.length !== 0) {
                                var html = '';

                                html += '<li class="addedTag addedTag-' + subsection.sort + ' saveValue" id="addedTag-' + location.id + '">' + location.location + '<span onclick="$(this).parent().remove();" class="tagRemove">x</span>';
                                html += '<input type="hidden" class="h-tags" name="tags[]" value="' + location.id + '">';
                                html += '</li>';

                                $('#tag-list-' + subsection.sort).append(html);
                            }
                        }
                    });
                });

                var subid = subsection.id;
                $.ajax({
                    type: 'POST',
                    url: 'post-and-get/ajax/post-tour-package-images.php',
                    dataType: "json",
                    data: {
                        subsection: subid,
                        option: 'GETSUBSECTIONPHOTOS'
                    },
                    success: function (photos) {

                        $.each(photos, function (key, photo) {
                            var html = '';
                            html += '<div class="col-md-2 bottom-top" id="col_' + photo.id + '" style="padding-bottom: 3px;">';
                            html += '<img src="../upload/tour-package/sub-section/thumb/' + photo.image_name + '"  class="img img-responsive">';
                            html += '<input type="hidden" name="tour-packages-images[]" value="' + photo.image_name + '"/>';
                            html += '<i class="img-tour-package-delete delete-icon btn btn-danger btn-md fa fa-trash-o"  id="' + photo.id + '"></i>';
                            html += '</div>';
                            $('#image-list-' + photo.tour_sub_section).prepend(html);
                        });
                    }
                });

                $.ajax({
                    type: 'POST',
                    url: 'post-and-get/ajax/post-tour-package-images.php',
                    dataType: "json",
                    data: {
                        subsection: subid,
                        option: 'GETSUBSECTIONPHOTOCOUNT'
                    },
                    success: function (count) {

                        if (count.count < 4) {
                            $('#tour-sub-picture-' + count.subid).prop('disabled', false);
                        } else {
                            $('#tour-sub-picture-' + count.subid).prop('disabled', true);
                        }
                    }
                });
            });
        }
    });

    $('.tour-sub-picture').change(function () {

        if (Math.round((this.files[0].size / 1024)) > 10000) {
            swal({
                title: "Error!",
                text: "Image is too large and please upload a image size less than 10MB",
                type: 'error',
                timer: 2000,
                showConfirmButton: false
            });
            return false;
        }

        var sort = $(this).attr('sort');

        $('.box').jmspinner('large');
        $('.box').addClass('well');
        $('.box').css('z-index', '9999');
            
        var formData = new FormData($('#form-tours-' + sort)[0]);
        $.ajax({
            type: "POST",
            url: "post-and-get/ajax/post-tour-package-images.php",
            dataType: 'json',
            data: formData,
            async: false,
            success: function (mess) {

                var html = '';
                html += '<div class="col-md-2 bottom-top" id="col_' + mess.id + '" style="padding-bottom: 3px;">';
                html += '<img src="../upload/tour-package/sub-section/thumb/' + mess.filename + '"  class="img img-responsive">';
                html += '<input type="hidden" name="tour-packages-images[]" value="' + mess.filename + '"/>';
                html += '<i class="img-tour-package-delete delete-icon btn btn-danger btn-md fa fa-trash-o"  id="' + mess.id + '"></i>';
                html += '</div>';
                $('#image-list-' + mess.toursubsection).prepend(html);
                $('.box').jmspinner(false);
                $('.box').removeClass('well');
                $('.box').css('z-index', '-1111');
                $.ajax({
                    type: 'POST',
                    url: 'post-and-get/ajax/post-tour-package-images.php',
                    dataType: "json",
                    data: {
                        subsection: mess.toursubsection,
                        option: 'GETSUBSECTIONPHOTOCOUNT'
                    },
                    success: function (count) {

                        if (count.count < 4) {
                            $('#tour-sub-picture-' + count.subid).prop('disabled', false);
                        } else {
                            $('#tour-sub-picture-' + count.subid).prop('disabled', true);
                        }
                    }
                });
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('.image-list').on('click', '.img-tour-package-delete', function () {

        var photoid = this.id;
        $.ajax({
            type: 'POST',
            url: 'post-and-get/ajax/post-tour-package-images.php',
            dataType: "json",
            data: {
                photoid: photoid,
                option: 'DELETEIMAGE'
            },
            success: function (result) {
                if (result.status == 'TRUE') {
                    swal({
                        title: "Deleted!",
                        text: "Photo has been deleted.",
                        type: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $('#col_' + result.id).remove();

                    $.ajax({
                        type: 'POST',
                        url: 'post-and-get/ajax/post-tour-package-images.php',
                        dataType: "json",
                        data: {
                            subsection: result.subid,
                            option: 'GETSUBSECTIONPHOTOCOUNT'
                        },
                        success: function (count) {

                            if (count.count < 4) {
                                $('#tour-sub-picture-' + count.subid).prop('disabled', false);
                            } else {
                                $('#tour-sub-picture-' + count.subid).prop('disabled', true);
                            }
                        }
                    });
                }
            }
        });
    });
});