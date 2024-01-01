<?php
require_once '../../../database/connect.php';
session_start();

$encode;

if (isset($_POST['data'])) {

   parse_str($_POST['data'], $formData);
   $landing_header = $formData['landing_header'];
   $landing_body = $formData['landing_content'];

   if ($_FILES["file"]["error"] > 0) {
      $encode = array(
         "code" => 0,
         "msg" => "ERROR: " . $_FILES["file"]["error"]
      );
   } else {
      $fileName = $_FILES["file"]["name"];
      $fileTmpName = $_FILES["file"]["tmp_name"];

      $uploadDir = '../../../src/img/';
      $accessDir = '../../src/img/';

      $extension = pathinfo($fileName, PATHINFO_EXTENSION);
      $new_filename = uniqid() . "_landing." . $extension;

      $accessDir = $accessDir . $new_filename;
      $destination = $uploadDir .  $new_filename;

      if (move_uploaded_file($fileTmpName, $destination)) {
         $query = $conn->prepare("UPDATE system_info SET content = ? WHERE label = 'landing_header'");
         $query->bind_param("s", $landing_header);
         $query->execute();

         $query = $conn->prepare("UPDATE system_info SET content = ? WHERE label = 'landing_header_content'");
         $query->bind_param("s", $landing_body);
         $query->execute();

         $query = $conn->prepare("UPDATE system_info SET content = ? WHERE label = 'landing_header_img'");
         $query->bind_param("s", $accessDir);
         $query->execute();

         if ($query) {
            echo "Landing info successfully modified";
         }
      } else {
         echo "Error uploading file.";
      }
   }
}
