<?php
require_once '../../../database/connect.php';
$encode;

if (!empty($_POST['addcom_type']) && !empty($_POST['addcom_title']) && !empty($_POST['addcom_content'])) {
   $query = $conn->prepare(
      "INSERT INTO tb_usercomplain (
         usercomp_type,
         usrcomp_title,
         usrcomp_mess,
         usrcomp_status,
         usrcomp_reqBy
      ) VALUES (?, ?, ?, ?, ?)"
   );

   $type = $_POST['addcom_type'];
   $title = $_POST['addcom_title'];
   $content = $_POST['addcom_content'];
   $status = 1;
   $req = $_POST['addcom_id'];

   $query->bind_param("issii", $type, $title, $content, $status, $req);
   $query->execute();

   if ($query) {
      $encode = array(
         "code" => 1,
         "msg"  => 'Complaint successfully submitted'
      );
   } else {
      $encode = array(
         "code" => 2,
         "msg"  => 'Error in query'
      );
   }
} else {
   $encode = array(
      "code" => 2,
      "msg"  => 'All fields must be filled'
   );
}
echo json_encode($encode);
