
$( "td:contains('Niezaakceptowany')" ).css( "color", "red" );
$( "td:contains('Zakończony')" ).css( "color", "#9cde9c" );
// $('tr').hide();
// ($( "tr:contains('Niezaakceptowany')" ).show());

$('.filter').click(function (){
    if($(this).hasClass('active')){
        $(this).removeClass('active');
        $('tr').show();
    }
    else{
        $('.filter').removeClass('active');
        $(this).addClass('active');
        $('tr').hide();
        $('tr').first().show();
        let text = ($(this).text());
        $("tr:contains('" + text + "')").show();
    }


})

