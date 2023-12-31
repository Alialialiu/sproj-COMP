<?php 
$a = $_POST['fname'];
$b = $_POST['mname'];
$c = $_POST['lname'];
$d = $_POST['addr'];
$e = $_POST['email'];
$f = $_POST['numb'];
$g = $_POST['mess'];
$h = $_POST['complains'];
$i = 'Pending';
$conn = mysqli_connect("locaLhost","root","","complain");
$conn->query("INSERT INTO tb_usercomplain (usrcomp_fname,usrcomp_mname,usrcomp_lname,usrcomp_addr,usrcomp_email,usrcomp_contact,usrcomp_mess,usrcomp_fk,usrcomp_status) VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i')");

 echo json_encode(
    array(
        'message' =>'done'
    )
 );

?>