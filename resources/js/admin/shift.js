let  collapse;
$('.table-tabs').click(function (){
    $('.table-name').children().removeClass('title');
    $(this).addClass('title');
    collapse = this.id+'Match';
    $('.table-wrapper').children().hide();
    var count = $("#selected ul").children().length;
    $('#'+collapse).show();
})

let numberReffil, numberPast, numberFuture;

numberReffil = $('.reffilRow').length;
numberPast = $('.pastRow').length;
numberFuture = $('.futureRow').length;
console.log(numberFuture);

$( "#badgePast" ).append( numberPast);
$( "#badgeFuture" ).append( numberFuture);
$( "#badgeReffil" ).append( numberReffil );

// $(".shiftButton").click(function(){
//     var match = $(this).data("match");
//     var team = $(this).data("team");
//     var token = $("input[name='_token']").attr("value");
//
//     Swal.fire({
//         title: 'Czy jesteś pewny aby przełożyć mecz?',
//         text: "Zmiany nie będą mogły zostać cofnięte! Wszystkie mecze danej drużyny zostaną usunięte!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Tak, przełóż mecz',
//         cancelButtonText: 'Nie przegładaj',
//     }).then((result) => {
//         if (result.isConfirmed) {
//
//             $.ajax({
//                 url: "mecze/"+match,
//                 type: 'POST',
//                 data: {
//                     "match": match,
//                     '_method': 'PATCH',
//                     "_token": token,
//                     "status": "przelozony",
//                 },
//                 success: function (){
//                     $.ajax({
//                         url: "druzyna/" + team,
//                         type: 'POST',
//                         data: {
//                             "match": team,
//                             '_method': 'PATCH',
//                             "_token": token,
//                         },success: function (){
//
//                         Swal.fire(
//                             {
//                                 title: 'Mecz został przełożony',
//                                 icon: 'success',
//                                 onClose: () => {
//                                     location.reload();
//                                 }
//                             }
//                         )}
//                     })
//                 }
//             });
//         }
//     })
// });
