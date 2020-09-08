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
    $(test.next()).slideToggle('slow');

});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

$(".alert-show").click(function() {
    console.log('test');
    $(".alert").addClass("show fade");
});

$(".alert-hide").click(function() {
    console.log('test1');
    $(".alert").removeClass("show");
});

