$('#category-insert').submit(function(){
    return false;
});

$('#category-submit').click(function(){
    $.post(     
        "categoryUpdate.php",
        $('#category-insert :input').serializeArray(),
        function(result){
            $('#cat-result').html(result);
        }
    );
    window.location="newsfeed.php";
});



