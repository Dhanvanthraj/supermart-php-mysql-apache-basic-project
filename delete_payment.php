<?php
include 'db.php';

$id = $_GET['payment_id'] ?? null;
if ($id) {
    $stmt = $conn->prepare("DELETE FROM payments WHERE payment_id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
}
header('Location: payments.php');
exit();
?>
