$( document ).ready(function() {

    var leagueSelect = $("select[name='league']" );
    var homeSelect = $("select[name='teamHome']" );
    var awaySelect = $("select[name='teamAway']" );
    $( leagueSelect ).change(function() {
        homeSelect.children().hide();
        homeSelect.children('#league-'+leagueSelect.val()).show();
        awaySelect.children().hide();
        awaySelect.children('#league-'+leagueSelect.val()).show();
    });

    $(homeSelect).change(function (){
        awaySelect.children().children().attr("disabled", false);
        awaySelect.children().children("option[value='"+ ($(this).val()) +"']").attr("disabled", true);
    });

    $(awaySelect).change(function (){
        homeSelect.children().children().attr("disabled", false);
        homeSelect.children().children("option[value='"+ ($(this).val()) +"']").attr("disabled", true);
    });




    var x = $("input[name='teamAwayScore']" ).val();
    var y = $("input[name='teamHomeScore']" ).val();
    if(parseInt(x) + parseInt(y) <=2){
        $("input[name='enemyPointSet3']").val('').attr("disabled", true);
        $("input[name='homePointSet3']").val('').attr("disabled", true);
    }
    else  if($("input[name='homePointSet3']" ).val() && $("input[name='enemyPointSet3']" ).val() != ''){
        $("input[name='enemyPointSet3']").attr("disabled", false);
        $("input[name='homePointSet3']").attr("disabled", false);
    }
    else{
        $("input[name='enemyPointSet3']").val('').attr("disabled", false);
        $("input[name='homePointSet3']").val('').attr("disabled", false);
    }

    $( "input[name='teamAwayScore']" ).change(function(  ) {
        var x = $("input[name='teamAwayScore']" ).val();
        var y = $("input[name='teamHomeScore']" ).val();
        if(parseInt(x) + parseInt(y) <=2){
            $("input[name='enemyPointSet3']").val('').attr("disabled", true);
            $("input[name='homePointSet3']").val('').attr("disabled", true);
        }
        else{
            $("input[name='enemyPointSet3']").val('').attr("disabled", false);
            $("input[name='homePointSet3']").val('').attr("disabled", false);
        }
    });

    $( "input[name='teamHomeScore']" ).change(function(  ) {
        var x = $("input[name='teamAwayScore']" ).val();
        var y = $("input[name='teamHomeScore']" ).val();
        if(parseInt(x) + parseInt(y) <=2){
            $("input[name='enemyPointSet3']").val('').attr("disabled", true);
            $("input[name='homePointSet3']").val('').attr("disabled", true);
        }
        else{
            $("input[name='enemyPointSet3']").val('').attr("disabled", false);
            $("input[name='homePointSet3']").val('').attr("disabled", false);
        }
    });
});
