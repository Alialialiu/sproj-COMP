$(document).ready(function(){
    
	$("#adminCompTable").dataTable();
	$('#adminCompTable').on('click','.edit', function() {
		$('#editUserComp').modal();
		var url = 'php/editUserComp.php';
		var getID = $(this).attr("id");
		var me = $(this);
		$.post(url,{ akoSiID: getID },function(response) {
			
			$('.userCompBody').html(response);
			
		});
	});

	$("#editCompModal").on("submit","#updateUser", function(e) {
		
		e.preventDefault();	
		var url = "php/updateCompUser.php";
		var data = $(this).serialize();
		$.post(url, data, function(response) {
			
			console.log(response);
			$("#updateUser .status").html(response.message);
			alert(response.status)
			$('#tr_'+response.ID).html('<td class="sorting_1"> '+response.ID+' </td><td> '+response.username+'</td><td> '+response.password+' </td><td> <button class="tablebtnComp edit" id="<?php echo $data['usrcomp_id'] ?> type="button"  data-bs-toggle="modal" data-bs-target="#editCompModal"><i class='bx bx-folder-open fs-2'></i></button> </td>');
		},"json");	
		
	});
});