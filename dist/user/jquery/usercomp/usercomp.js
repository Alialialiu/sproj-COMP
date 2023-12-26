$(document).ready(function(){

    
    $("#usercompforms").submit( function(e) {
		e.preventDefault();	
		var url = "php/usercompphp/usercomp.php";
		var data = $(this).serialize();
		$.post(url, data, function(response) {
			
			console.log(response);
			$(".status").html(response.message);
            alert(response.message);
		},"json");	
	});
});