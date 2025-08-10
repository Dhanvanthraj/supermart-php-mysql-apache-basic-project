<?php
include 'db.php';

$id = $_GET['order_id'] ?? null;
if (!$id) {
    header('Location: orders.php');
    exit();
}

$stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();

if (!$order) {
    header('Location: orders.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = $_POST['customer_id'] ?? '';
    $order_date = $_POST['order_date'] ?? '';
    $total_amount = $_POST['total_amount'] ?? '';
    if ($customer_id && $order_date && $total_amount) {
        $stmt = $conn->prepare("UPDATE orders SET customer_id=?, order_date=?, total_amount=? WHERE order_id=?");
        $stmt->bind_param('isdi', $customer_id, $order_date, $total_amount, $id);
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
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Edit Order</h2>
            <?php if (!empty($error)) echo '<p class="text-danger">'.$error.'</p>'; ?>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Customer ID</label>
                    <input type="number" class="form-control" name="customer_id" value="<?php echo htmlspecialchars($order['customer_id']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Order Date</label>
                    <input type="date" class="form-control" name="order_date" value="<?php echo htmlspecialchars($order['order_date']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Total Amount</label>
                    <input type="number" step="0.01" class="form-control" name="total_amount" value="<?php echo htmlspecialchars($order['total_amount']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Order</button>
            </form>
            <a href="orders.php" class="btn btn-link mt-3 w-100">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>
