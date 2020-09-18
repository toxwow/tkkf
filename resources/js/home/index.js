var isEnd = false;

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

    if(countChild > 4){
        var currentPosition = parseInt($(".match-ruller").css('top'));
        if(currentPosition == maxPostion){
            $(".match-ruller").css('top', '0px');
        }
        else{
            $(".match-ruller").css('top', currentPosition-90+'px');
        }
    }


    setTimeout(function() {
        isEnd = false;
    }, 500);

});

var SelectLeague;
$('.league-items').children().each(function(){
   var test = $(this);
   if(test.hasClass('active')){
       SelectLeague = this.id;
   }
   else{
       $('.league-items').children().first().addClass('active');
       SelectLeague = $('.league-items').children().first().attr("id");
   }
});

$('.timetable-wrapper').each(function (){
    $(this).hide();
    if(this.id === SelectLeague){
        $(this).show();
    }
})

$('.table-teams-wrapper').each(function (){
    $(this).hide();
    if(this.id === SelectLeague){
        $(this).show();
    }
})


$('.league-items').children().click(function (){
    SelectLeague = this.id;
    $('.league-items').children().removeClass('active');
    $(this).addClass('active');

    $('.timetable-wrapper').each(function (){
        $(this).hide();
        if(this.id === SelectLeague){
            $(this).show();
        }
    })

    $('.table-teams-wrapper').each(function (){
        $(this).hide();
        if(this.id === SelectLeague){
            $(this).show();
        }
    })
    countChild = $(".match-ruller:visible").children().length;
    maxPostion = 360 - 90*countChild;
});

var countChild = $(".match-ruller:visible").children().length;
var maxPostion = 360 - 90*countChild;


