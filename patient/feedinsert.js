$('#feedshare').submit(function(){
    return false;
});

$('#post_patient').click(function(){
    $.post(     
        "patient-feed.php",
        $('#feedshare :input').serializeArray(),
        function(result){
            $('#blog-view').html(result);
        }
    );
    document.getElementById("feedshare").reset();
});


