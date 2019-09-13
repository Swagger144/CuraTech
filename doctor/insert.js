$('#blogshare').submit(function(){
    return false;
});

$('#share').click(function(){
    $.post(     
        "feed.php",
        $('#blogshare :input').serializeArray(),
        function(result){
            $('#blog-view').html(result);
        }
    );
    document.getElementById("blogshare").reset();
});



