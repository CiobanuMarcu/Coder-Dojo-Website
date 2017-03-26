console.log("hello");
$(function(){
    $('#jQuery').text('Nice!');
    $('.header').css({'background-color':'red'});
    $('<p>Eu sunt un tag generat dinamic.</p>').insertAfter('#jQuery');
})
