<?php

include("../../../database/connect.php");


$username = $_POST['login_username'];
$password = $_POST['login_password'];

$checkResult = $conn->prepare("SELECT * FROM tb_user WHERE username = ?");
$checkResult->bind_param("s", $username);
$checkResult->execute();

$result = $checkResult->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $storedPassword = $row['password'];

    if (password_verify($password, $storedPassword)) {
        session_start();

        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['user'] = $row['username'];

        if ($_SESSION['user_type']) {
            $redirect = '../admin/index.php';
        } else if (!$_SESSION['user_type']) {
            $redirect = '../user/index.php';
        }

        $response = array(
            'success' => true,
            'redirect' => $redirect
        );
    } else {
        $response = array(
            'success' => false,
            'message' => "Username or password did not match"
        );
    }
} else {
    $response = array(
        'success' => false,
        'message' => "Username does not exist."
    );
}
header('Content-Type: application/json');
echo json_encode($response);

mysqli_close($conn);
