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
    <style>
        body { min-height: 100vh; background: linear-gradient(135deg, #ff9966 0%, #ff5e62 100%); }
        .main-card { background: rgba(255,255,255,0.98); border-radius: 1.5rem; box-shadow: 0 8px 32px 0 rgba(255,153,102,0.15); padding: 2.5rem 2rem 2rem 2rem; border-top: 6px solid #ff5e62; }
        .form-label { font-weight: 600; color: #ff5e62; }
        .btn { border-radius: 0.75rem; font-weight: 600; }
        .icon-header { display: flex; align-items: center; gap: 0.7em; justify-content: center; }
    </style>
</head>
<body>
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="main-card mx-auto" style="max-width: 500px; width:100%;">
        <div class="icon-header mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#ff5e62" class="bi bi-box-seam" viewBox="0 0 16 16"><path d="M8.186.113a1.5 1.5 0 0 0-1.372 0l-6 3A1.5 1.5 0 0 0 0 4.382v7.236a1.5 1.5 0 0 0 .814 1.33l6 3a1.5 1.5 0 0 0 1.372 0l6-3A1.5 1.5 0 0 0 16 11.618V4.382a1.5 1.5 0 0 0-.814-1.33l-6-3ZM8 1.058a.5.5 0 0 1 .457 0l6 3A.5.5 0 0 1 14.5 4.382v.255l-6.5 3.25-6.5-3.25v-.255A.5.5 0 0 1 1.543 4.058l6-3ZM1 5.383l6.5 3.25v6.309a.5.5 0 0 1-.229-.057l-6-3A.5.5 0 0 1 1 11.618V5.383Zm7.5 9.502V8.633l6.5-3.25v6.235a.5.5 0 0 1-.271.44l-6 3a.5.5 0 0 1-.229.057Z"/></svg>
            <h2 class="card-title mb-0" style="color:#ff5e62; font-weight:700;">Add New Item</h2>
        </div>
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
            <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(90deg, #ff9966 0%, #ff5e62 100%); border: none;">Add Item</button>
        </form>
        <a href="items.php" class="btn btn-link mt-3 w-100">Back to List</a>
    </div>
</div>
</body>
</html>
