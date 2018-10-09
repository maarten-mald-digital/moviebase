console.log("script.js geladen");

$( document ).ready(function() {

    $('#titleSort').click(function(e){

        console.log("geklikt op title sort");

        $.ajax({url: "demo_test.txt", success: function(result){
                $("#div1").html(result);
            }});

    });


});
