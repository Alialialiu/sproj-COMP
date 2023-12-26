<?php
session_start(); ob_start();
$conn = mysqli_connect('localhost', 'root', '', 'complain');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];

$checkQuery = "SELECT user_id, username, password FROM tb_user WHERE username = '$username'";
$checkResult = $conn->query($checkQuery);

if ($checkResult->num_rows === 1) {
    // Username exists, fetch the stored hashed password and user ID
    $row = $checkResult->fetch_assoc();
    $storedPassword = $row['password'];
    $userId = $row['user_id'];

    // Verify the provided password against the stored hashed password
    if (password_verify($password, $storedPassword)) {
        // Login successful
        $_SESSION['user_id'] = $userId; // Add user ID to the session
        $_SESSION['user'] = $username;

        if ($username === 'admin') {
            $redirect = 'dashboard.php';
        } else {
            $redirect = 'user/form.php';
        }

        $response = array(
            'success' => true,
            'message' => "Login successful",
            'redirect' => $redirect
        );
    } else {
        // Login failed
        $response = array(
            'success' => false,
            'message' => "Log in failed"
        );
    }
} else {
    // Username doesn't exist in the database
    $response = array(
        'success' => false,
        'message' => "Username does not exist."
    );
}

// Close the database connection
mysqli_close($conn);

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
