$(function() {
    var slider = document.getElementById("movie_rating_range");
    var output = document.getElementById("movie_rating_label");
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = this.value;
    }
})



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


        // Get the filter type
        let filterTable = $(target).data('table');

        $.ajax({
        url: "/" + filterTable + "/sort/"+ $(target).data('filter') +"/"+ ordering,
        success: function(result){

            let singleResult = '';

            $("#"+ filterTable + "-results").empty();

            // Filter movies
            if(filterTable === "movies"){
                for(var i=0, keys=Object.keys(result), l=keys.length; i<l; i++) {

                    singleResult = "<tr>\n" +

                        "<td><img src="+ result[i].image +"></td>\n" +
                        "<td>" + result[i].title + "</td>\n" +
                        "<td>" + result[i].genre + "</td>\n" +
                        "<td>" + result[i].release_date + "</td>\n" +
                        "<td>" + result[i].rating + "</td>\n" +
                        "</tr>";

                    $("#"+ filterTable + "-results").append(singleResult);
                }
            }

            // Filter actors
            else if(filterTable === "actors") {
                for(var i=0, keys=Object.keys(result), l=keys.length; i<l; i++) {
                    singleResult = "<tr>\n" +

                        "<td><img src="+ result[i].image +"></td>\n" +
                        "<td>" + result[i].name + "</td>\n" +
                        "<td>" + result[i].birth_date + "</td>\n" +
                        "<td>10</td>\n" +
                        "</tr>";

                    $("#"+ filterTable + "-results").append(singleResult);
                }
            }

        }
    })
};


