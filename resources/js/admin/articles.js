
$(".deleteArticle").click(function(){
    var id = $(this).data("id");
    console.log(id);
    var token = $("input[name='_token']").attr("value");

    Swal.fire({
        title: 'Czy jesteś pewny aby usunąć artykuł?',
        text: "Zmiany nie będą mogły zostać cofnięte!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, usuń artykuł',
        cancelButtonText: 'Nie usuwaj',
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "artykuly/"+id,
                type: 'POST',
                data: {
                    "id": id,
                    '_method': 'DELETE',
                    "_token": token,
                },
                success: function (){
                    Swal.fire(
                        {
                            title: 'Artykuł został usunięty',
                            icon: 'success',
                            onClose: () => {

                            }
                        }
                    )
                }
            });
        }
    })
});
