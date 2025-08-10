<?php
session_start();

$host = 'localhost';
$db = 'supermart';
$user = 'supermart';
$pass = 'supermart123';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $conn->real_escape_string($_POST['user_name']);
    $password = $conn->real_escape_string($_POST['user_password']);

    $sql = "SELECT * FROM user WHERE user_name = '$username' AND user_password = '$password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        $_SESSION['user_name'] = $username;
        header('Location: dashboard.php'); // Redirect to a dashboard page
        exit();
    } else {
        echo '<script>alert("Invalid username or password."); window.location.href = "index.php";</script>';
    }
}
$conn->close();
?>
