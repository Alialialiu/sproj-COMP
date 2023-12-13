<?php 
$conn = mysqli_connect('localhost', 'root', '', 'complain');

$firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$email = mysqli_real_escape_string($conn, $_POST['gmail']);
$addr = mysqli_real_escape_string($conn, $_POST['address']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

$checkQuery = "SELECT * FROM user WHERE username = '$username'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows > 0) {
    // Username is already taken, return an error message
    $response = array(
        'success' => false,
        'message' => "<div class='alert alert-info' role='alert'>
        Username Already Taken
      </div>"
    );

} else {
    // Username is not taken, proceed with the insertion
    $insertQuery = "INSERT INTO user (firstname, lastname, gender, gmail, address, username, password)
        VALUES ('$firstname', '$lastname','$gender', '$email', '$addr', '$username', '$password')";

    if ($conn->query($insertQuery) === TRUE) {
        // Registration successful
        $response = array(
            'success' => true,
            'message' => "<div class='alert alert-info' role='alert'>Register Done!</div>"
        );
    } else {
        // Registration failed
        $response = array(
            'success' => false,
            'message' => "<div class='alert alert-info' role='alert'>
            There was an Error to you data
          </div>"
        );
    }
}

// Close the database connection
mysqli_close($conn);

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
