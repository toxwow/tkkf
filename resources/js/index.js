$( document ).ready(function() {



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
