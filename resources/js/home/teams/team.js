let  collapse;
var positionActive = $('.item').position();
var widthActive = $('.item').outerWidth(true);
$('.active-bg').css('left', positionActive.left + 'px');
$('.active-bg').css('width', widthActive + 'px');

$(window).on('resize', function(){
    var positionActive = $('.item').position();
    var widthActive = $('.item').outerWidth(true);
    $('.active-bg').css('left', positionActive.left + 'px');
    $('.active-bg').css('width', widthActive + 'px');
});

$('.item').click(function (){
    $('.team-menu-wrapper').children().removeClass('active');
    $(this).addClass('active');
    var positionActive = $(this).position();
    var widthActive = $(this).outerWidth(true);
    $('.active-bg').css('left', positionActive.left + 'px');
    $('.active-bg').css('width', widthActive + 'px');
    collapse = this.id+'-wrapper';
    $('.collapse-item').hide();
    $('.'+collapse).show();
})




