let  collapse;
$('.team-menu-wrapper').children().click(function (){
    $('.team-menu-wrapper').children().removeClass('active');
    $(this).addClass('active');
    collapse = this.id+'-wrapper';
    $('.collapse-item').hide();
    $('.'+collapse).show();

})
