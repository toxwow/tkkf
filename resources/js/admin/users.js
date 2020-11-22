var options = {
    valueNames: [ 'name', 'email', 'team' ]
};

var hackerList = new List('all-users', options);

$(".restPassword").click(function(){
    var id = $(this).data("id");
    console.log(id);
    var token = $("input[name='_token']").attr("value");

    Swal.fire({
        title: 'Chcesz przyznać dostęp?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Tak, przyznaj',
        cancelButtonText: 'Nie przyznawaj',
    }).then((result) => {
        if (result.isConfirmed) {

            $.ajax({
                url: "zmienHaslo/"+id,
                type: 'GET',
                data: {
                },
                success: function (){
                    Swal.fire(
                        {
                            title: 'Dostęp został przyznany',
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
