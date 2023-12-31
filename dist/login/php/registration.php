<?php
// Database connection
include("../../../database/connect.php");

// Sanitize and validate user inputs
$firstname = $_POST['register_fname'];
$lastname = $_POST['register_lname'];
$address = $_POST['register_address'];
$username = $_POST['register_username'];
$password = $_POST['register_password'];
$repassword = $_POST['register_repassword'];

$checkResult = $conn->prepare("SELECT * FROM tb_user WHERE username = ?");
$checkResult->bind_param("s", $username);
$checkResult->execute();
$checkResult->store_result();

if ($checkResult->num_rows > 0) {
   $response = array(
      'success' => false,
      'message' => "Username is already taken"
   );
} else if ($repassword !== $password) {
   $response = array(
      'success' => false,
      'message' => "Passwords does not match"
   );
} else {
   $u = 0;
   $passwordTrue = password_hash($password, PASSWORD_DEFAULT);
   $insertQuery = $conn->prepare(
      "INSERT INTO tb_user (
         user_type, 
         firstname, 
         lastname, 
         address, 
         username, 
         password
         )
      VALUES (?, ?, ?, ?, ?, ?)"
   );
   $insertQuery->bind_param("isssss", $u, $firstname, $lastname, $address, $username, $passwordTrue);
   $insertQuery->execute();

   if ($insertQuery) {
      session_start();
      $userId = $conn->insert_id;

      $_SESSION['user_id'] = $userId;
      $_SESSION['user_type'] = 0;

      $response = array(
         'success' => true,
         'url' => "../user/index.php"
      );
      $insertQuery->close();
   } else {
      $response = array(
         'success' => false,
         'message' => "Registration failed. There is a problem in the database"
      );
   }
}
echo json_encode($response);
$conn->close();
