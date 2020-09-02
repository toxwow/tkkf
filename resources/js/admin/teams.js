$('#selectLeague').on('change', function() {
    if(this.value === 'all'){
        $('.leagueTable').removeClass('d-none');
    }
    else{
        $('.leagueTable').addClass('d-none')
        $('#league-'+this.value).removeClass('d-none');
    }
});

$( "[id^='team-click-']" ).click(function() {
    var test = ($(this).parent().parent());
    if(test.next().css('display') ===  'none'){
        console.log('1');

        $(test.next()).slideToggle('slow');
        if($(this).text() == 'Schowaj zawodników'){
            $(this).text('Pokaż zawodników');
        } else {
            $(this).text('Schowaj zawodników');
        }
    }
    else{
        test.next().css('display', 'none');
        $(this).text('Pokaż zawodników');
    }







});

