console.log("hello");
$(function(){
    $('#jQuery').text('Nice!');
    $('.header').css({'background-color':'red'});
    $('<p>Eu sunt un tag generat dinamic.</p>').insertAfter('#jQuery');

    $('.subscribe-button').on('click',function(){
       var id= $(this).attr('id');
        //alert('Ai apasat subscribe' + id);
        var value = $(this).attr('value');
        var request = $.ajax({
            url: 'logic/register_to_session.php',
            method: 'POST',
            data: {
                id : id,
                action : value
            },
            success:  function(data){

                location.reload();
            }

        });

    });

});


