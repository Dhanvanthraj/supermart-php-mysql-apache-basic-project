<?php
include 'db.php';

$id = $_GET['order_id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM orders WHERE order_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}
header('Location: orders.php');
exit();
?>
