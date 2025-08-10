<?php
include 'db.php';
$id = $_GET['id'] ?? 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['item_name'];
    $price = $_POST['item_price'];
    $mdate = $_POST['item_manufactured_date'];
    $edate = $_POST['item_expiry_date'];
    $suppliers = $_POST['item_suppliers'];
    $qty = $_POST['item_quantity'];
    $sql = "UPDATE items SET item_name=?, item_price=?, item_manufactured_date=?, item_expiry_date=?, item_suppliers=?, item_quantity=? WHERE item_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sisssii', $name, $price, $mdate, $edate, $suppliers, $qty, $id);
    $stmt->execute();
    header('Location: items.php');
    exit;
}
$sql = "SELECT * FROM items WHERE item_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$item = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Edit Item</h2>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="item_name" value="<?= htmlspecialchars($item['item_name']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" name="item_price" value="<?= $item['item_price'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Manufactured Date</label>
                    <input type="date" class="form-control" name="item_manufactured_date" value="<?= $item['item_manufactured_date'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Expiry Date</label>
                    <input type="date" class="form-control" name="item_expiry_date" value="<?= $item['item_expiry_date'] ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Suppliers</label>
                    <input type="text" class="form-control" name="item_suppliers" value="<?= htmlspecialchars($item['item_suppliers']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="item_quantity" value="<?= $item['item_quantity'] ?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Item</button>
            </form>
            <a href="items.php" class="btn btn-link mt-3 w-100">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>
