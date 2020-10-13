$(".deleteTeam").click(function(){
    var id = $(this).data("id");
    console.log(id);
    var token = $("input[name='_token']").attr("value");

    Swal.fire({
        title: 'Czy jesteś pewny aby usunąć drużynę?',
        text: "Zmiany nie będą mogły zostać cofnięte! Wszystkie mecze danej drużyny zostaną usunięte!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, usuń drużynę',
        cancelButtonText: 'Nie usuwaj',
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "druzyna/"+id,
                type: 'POST',
                data: {
                    "id": id,
                    '_method': 'DELETE',
                    "_token": token,
                },
                success: function (){
                    Swal.fire(
                        {
                            title: 'Drużyna została usunięta',
                            icon: 'success',
                            onClose: () => {
                                location.reload();
                            }
                        }
                    )
                }
            });
        }
    })
});


$("#veryfyPlayer").click(function(){
    var id = $(this).data("id");
    console.log(id);
    var token = $("input[name='_token']").attr("value");

    $.ajax({
        url: "zawodnik/"+id,
        type: 'POST',

        data: {
            "id": id,
            '_method': 'PATCH',
            "_token": token,
            "status": "zweryfikowany",
        },
        success: function (){
            Swal.fire(
                {
                    title: 'Zawodnik został zweryfikowany',
                    icon: 'success',
                    onClose: () => {
                        location.reload();
                    }
                }
            )
        }
    });

});

$(".deletePlayer").click(function(){
    var id = $(this).data("id");
    console.log(id);
    var token = $("input[name='_token']").attr("value");

    Swal.fire({
        title: 'Czy jesteś pewny aby usunąć zawodnika?',
        text: "Zmiany nie będą mogły zostać cofnięte!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, usuń zawodnika',
        cancelButtonText: 'Nie usuwaj',
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "zawodnik/"+id,
                type: 'POST',
                data: {
                    "id": id,
                    '_method': 'DELETE',
                    "_token": token,
                },
                success: function (){
                    Swal.fire(
                        {
                            title: 'Zawodnik został usunięty',
                            icon: 'success',
                            onClose: () => {
                                location.reload();
                            }
                        }
                    )
                }
            });
        }
    })


});

$(".deleteLeague").click(function(){
    var id = $(this).data("id");
    console.log(id);
    var token = $("input[name='_token']").attr("value");

    Swal.fire({
        title: 'Czy jesteś pewny aby usunąć ligę?',
        text: "Zmiany nie będą mogły zostać cofnięte!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, usuń ligę',
        cancelButtonText: 'Nie usuwaj',
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "liga/"+id,
                type: 'POST',
                data: {
                    "id": id,
                    '_method': 'DELETE',
                    "_token": token,
                },
                success: function (){
                    Swal.fire(
                        {
                            title: 'Liga została usunięta',
                            icon: 'success',
                            onClose: () => {
                                location.reload();
                            }
                        }
                    )
                }
            });
        }
    })


});
$(".deleteLeagueErorr").click(function(){


    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Cos poszło nie tak! Upewnij się, że w lidze nie znajdują się żadne drużyny!',
    })

});

$(".deleteTeamError").click(function(){


    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Cos poszło nie tak! Upewnij się, że w drużynie nie znajduje się żaden zawodnik!',
    })

});


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
