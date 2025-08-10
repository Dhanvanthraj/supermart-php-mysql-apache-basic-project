<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = $_POST['customer_id'] ?? '';
    $order_date = $_POST['order_date'] ?? '';
    $total_amount = $_POST['total_amount'] ?? '';
    if ($customer_id && $order_date && $total_amount) {
        $stmt = $conn->prepare("INSERT INTO orders (customer_id, order_date, total_amount) VALUES (?, ?, ?)");
        $stmt->bind_param('isd', $customer_id, $order_date, $total_amount);
        $stmt->execute();
        $stmt->close();
        header('Location: orders.php');
        exit();
    } else {
        $error = 'All fields are required.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Add New Order</h2>
            <?php if (!empty($error)) echo '<p class="text-danger">'.$error.'</p>'; ?>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Customer ID</label>
                    <input type="number" class="form-control" name="customer_id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Order Date</label>
                    <input type="date" class="form-control" name="order_date" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total Amount</label>
                    <input type="number" step="0.01" class="form-control" name="total_amount" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Order</button>
            </form>
            <a href="orders.php" class="btn btn-link mt-3 w-100">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>
