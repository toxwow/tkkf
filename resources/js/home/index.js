var isEnd = false;
var countChild = $(".match-ruller").children().length;
var maxPostion = 360 - 90*countChild;
$('div.up.nav').click(function (){
    if (isEnd) {
        return;
    }
    isEnd = true;
    var currentPosition = parseInt($(".match-ruller").css('top'));
    if(currentPosition !=0){
        $(".match-ruller").css('top', currentPosition+90+'px')
    }

    setTimeout(function() {
        isEnd = false;
    }, 500);
});
$('div.down.nav').click(function (){
    if (isEnd) {
        return;
    }
    isEnd = true;
    var currentPosition = parseInt($(".match-ruller").css('top'));
    if(currentPosition == maxPostion){
        $(".match-ruller").css('top', '0px');
    }
    else{
        $(".match-ruller").css('top', currentPosition-90+'px');
    }

    setTimeout(function() {
        isEnd = false;
    }, 500);

    console.log(currentPosition);
});
