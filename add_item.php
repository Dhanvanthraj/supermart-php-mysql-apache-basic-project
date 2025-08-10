<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['item_name'];
    $price = $_POST['item_price'];
    $mdate = $_POST['item_manufactured_date'];
    $edate = $_POST['item_expiry_date'];
    $suppliers = $_POST['item_suppliers'];
    $qty = $_POST['item_quantity'];
    $sql = "INSERT INTO items (item_name, item_price, item_manufactured_date, item_expiry_date, item_suppliers, item_quantity) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sisssi', $name, $price, $mdate, $edate, $suppliers, $qty);
    $stmt->execute();
    header('Location: items.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Add New Item</h2>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="item_name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" class="form-control" name="item_price" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Manufactured Date</label>
                    <input type="date" class="form-control" name="item_manufactured_date" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Expiry Date</label>
                    <input type="date" class="form-control" name="item_expiry_date" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Suppliers</label>
                    <input type="text" class="form-control" name="item_suppliers" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="item_quantity" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Item</button>
            </form>
            <a href="items.php" class="btn btn-link mt-3 w-100">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>
