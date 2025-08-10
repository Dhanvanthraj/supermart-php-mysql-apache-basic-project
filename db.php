<?php
$host = 'localhost';
$user = 'supermart';
$pass = 'supermart123';
$db = 'supermart';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
?>
