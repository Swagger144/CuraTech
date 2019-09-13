$('#cmntshare').submit(function(){
    return false;
});

$('#cmntbtn').click(function(){
    $.post(     
        "comment.php",
        $('#cmntshare :input').serializeArray(),
        function(result){
            $('#cmnt-view').html(result);
        }
    );
    document.getElementById("cmntshare").reset();
});




