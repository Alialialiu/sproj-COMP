<?php
require_once '../../../database/connect.php';
$encode;

if (isset($_POST['id']) && isset($_POST['type'])) {
   $query = $conn->prepare("UPDATE tb_usercomplain SET usrcomp_status = ? WHERE usrcomp_id = ?");


   $id = $_POST['id'];
   $type = $_POST['type'];

   $query->bind_param("ii", $type, $id);
   $query->execute();

   if ($query) {
      $encode = array(
         "code" => 1,
         "msg"  => 'Complaint successfully modified'
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
      "msg"  => 'Hidden fields are empty'
   );
}
echo json_encode($encode);
