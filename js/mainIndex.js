$(document).on("click", ".buttonVote", function(){
    $.ajax({
        url: 'vote.php',
        method: 'POST',
        data: {id: $(this).attr('data-id')}
    });
});


/**
 *     $(".buttonVote").click(function(){
        console.log( $.ajax({
            url: 'vote.php'
            method: 'POST'
            data: {id: $(this).attr('data-id')
        }).done(function(data){
            $(".nbreVote").html();
        });
    );
    });
 */