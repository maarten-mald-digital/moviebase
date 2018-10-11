// To make a new movie we use this function
// to make use of the dropzone
$(function() {
    $('#dropzone').on('dragover', function() {
        $(this).addClass('hover');
    });

    $('#dropzone').on('dragleave', function() {
        $(this).removeClass('hover');
    });

    $('#dropzone input').on('change', function(e) {
        var file = this.files[0];

        $('#dropzone').removeClass('hover');

        if (this.accept && $.inArray(file.type, this.accept.split(/, ?/)) == -1) {
            return alert('File type not allowed.');
        }

        $('#dropzone').addClass('dropped');
        $('#dropzone img').remove();

        if ((/^image\/(gif|png|jpeg)$/i).test(file.type)) {
            var reader = new FileReader(file);

            reader.readAsDataURL(file);

            reader.onload = function(e) {
                var data = e.target.result,
                    $img = $('<img />').attr('src', data).fadeIn();

                $('#dropzone div').html($img);
            };
        } else {
            var ext = file.name.split('.').pop();

            $('#dropzone div').html(ext);
        }
    });
});

// $( document ).ready(function() {
//     console.log("document ready");
// });

/* Generic ajax call to filter movies */
// function makeAjax(filterType){
    function makeAjax(event){

    // Item we clicked on
    const target = $(event.target);

    // Classes with filter on them
    const filters = $('.filter');

    // We can order asc or desc depending on toggled class
    let ordering = '';

    if (target.hasClass('toggled')) {
        console.log('filter aan')
        ordering = 'desc';
        filters.removeClass('toggled');
    }
    else {
        filters.removeClass('toggled');
        console.log('filter uit')
        ordering = 'asc';
        target.addClass('toggled');
    }

    $.ajax({
        url: "/movies/sort/"+ $(target).data('filter') +"/"+ ordering,
        success: function(result){

            let singleResult = '';

            $("#movie-results").empty();

            for(var i=0, keys=Object.keys(result), l=keys.length; i<l; i++) {

                singleResult = "<tr>\n" +

                    "<td><img src="+ result[i].image +"></td>\n" +


                    "<td>" + result[i].title + "</td>\n" +
                    "<td>" + result[i].genre + "</td>\n" +
                    "<td>" + result[i].release_date + "</td>\n" +
                    "<td>" + result[i].rating + "</td>\n" +
                    "</tr>";

                $("#movie-results").append(singleResult);
            }

        }
    })
};


