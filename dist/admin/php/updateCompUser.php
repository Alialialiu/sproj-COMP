<?php
	$a =  $_POST['status'];
	$id =  $_POST['ID'];

	$conn = mysqli_connect("locaLhost","root","","complain");
	
	$conn->query("UPDATE tb_usercomplain SET usrcomp_status = '$a' WHERE usrcomp_id = '$id'");
    $query = $conn->query("SELECT tb_usercomplain.*, tb_complaintype.comp_name FROM tb_usercomplain INNER JOIN tb_complaintype ON tb_usercomplain.usrcomp_fk = tb_complaintype.comp_id");
    $data = mysqli_fetch_array( $query );

	echo json_encode( 
		array(
			'ID' => $id,
			'a' => $data['usrcomp_fname'],
			'b' => $data['usrcomp_mname'],
			'c' => $data['usrcomp_lname'],
			'd' => $data['usrcomp_add'],
			'e' => $data['usrcomp_email'],
			'f' => $data['usrcomp_contact'],
			'g' => $data['usrcomp_'],
			'h' => $data['comp_name'],
			'message' => "<div class='alert alert-success animated pulse'> <i class='glyphicon glyphicon-ok'> </i> Successfully updated. </div>"		
		) 
	);
	
	
?>