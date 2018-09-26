$(function(){

    $('#result').hide();
    
    $('form').submit(function(e){

        e.preventDefault();

        $.ajax({
            type:'GET',
            url:'get_info.php',
            success:function(){

            },
            error:function(){

            }
        });


    });

})