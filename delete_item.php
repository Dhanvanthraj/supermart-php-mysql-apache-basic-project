<?php
// Optionally, you can show a Bootstrap spinner or message here, but this file is a redirect script.
include 'db.php';
$id = $_GET['id'] ?? 0;
if ($id) {
    $sql = "DELETE FROM items WHERE item_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
}
// Show a quick Bootstrap message before redirect (optional)
echo '<!DOCTYPE html><html><head><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head><body class="bg-light"><div class="container mt-5 text-center"><div class="alert alert-info">Deleting item... Redirecting.</div></div></body></html>';
header('refresh:1;url=items.php');
exit;
