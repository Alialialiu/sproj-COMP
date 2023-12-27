<?php
// Database connection
include("../../../database/connect.php");

// Sanitize and validate user inputs
$firstname = mysqli_real_escape_string($conn, $_POST['register_fname']);
$lastname = mysqli_real_escape_string($conn, $_POST['register_lname']);
$address = mysqli_real_escape_string($conn, $_POST['register_address']);
$username = mysqli_real_escape_string($conn, $_POST['register_username']);
$password = password_hash($_POST['register_password'], PASSWORD_DEFAULT);


// Check if the username already exists in the database
$checkQuery = "SELECT * FROM tb_user WHERE username = '$username'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
    // Username is already taken, return an error message
    $response = array(
        'success' => false,
        'message' => "username is already taken"
    );
} else {
    // Username is not taken, proceed with the insertion
    $insertQuery = "INSERT INTO tb_user (firstname, lastname, address, username, password)
        VALUES ('$firstname', '$lastname', '$address', '$username', '$password')";

    if ($conn->query($insertQuery) === TRUE) {
        // Registration successful
        $response = array(
            'success' => true,
            'message' => "Your Sign Up!"
        );
    } else {
        // Registration failed
        $response = array(
            'success' => false,
            'message' => "There was an error to your data"
        );
    }
}


mysqli_close($conn);

header('Content-Type: application/json');
echo json_encode($response);
?>
