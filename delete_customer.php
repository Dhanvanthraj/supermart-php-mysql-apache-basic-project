<?php
// db.php is assumed to have the database connection
include 'db.php';

$id = $_GET['customer_id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM customers WHERE customer_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}
header('Location: customers.php');
exit();
?>
