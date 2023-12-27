$(document).ready(function(){
    $("#form-reg").submit(function(e){
        e.preventDefault();
        var url ="php/registration.php";
        
        var data = $(this).serialize();
        $.post(url, data,function(response){
            console.log(response);
            $('#error-message').html(response.message).fadeIn();
            setTimeout(() =>{
            $('#error-message').fadeOut();
        },5000);
                if(response.success){
                    $('#form-reg')[0].reset();
                    $('#error-message').html(response.message).fadeIn();
                    setTimeout(() =>{
                        $('#error-message').fadeOut();
                    },5000);
                }
        },"json");
    });
});