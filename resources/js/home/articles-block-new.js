
var activeStage = 0;


$('.nav-arrow.left').click(function(){
    if(activeStage != 0){

        activeStage = activeStage - 1;
        $('.articles-wrapper').css('left', '-'+ activeStage * 100+'%');
        $('.nav-lines').children().removeClass('active');
        $('.nav-lines').children().eq(activeStage).addClass('active');
    }



});
$('.nav-arrow.right').click(function(){
    if(activeStage+1 != countArtcile ){

        activeStage = activeStage + 1;
        $('.articles-wrapper').css('left', '-'+ activeStage * 100+'%');
        $('.nav-lines').children().removeClass('active');
        $('.nav-lines').children().eq(activeStage).addClass('active');
    }
    else{
        activeStage = 0;
        $('.articles-wrapper').css('left', '-'+ activeStage * 100+'%');
        $('.nav-lines').children().removeClass('active');
        $('.nav-lines').children().eq(activeStage).addClass('active');
    }
});
