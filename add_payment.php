<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'] ?? '';
    $payment_date = $_POST['payment_date'] ?? '';
    $amount = $_POST['amount'] ?? '';
    $payment_method = $_POST['payment_method'] ?? '';
    if ($order_id && $payment_date && $amount && $payment_method) {
        $stmt = $conn->prepare("INSERT INTO payments (order_id, payment_date, amount, payment_method) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('isds', $order_id, $payment_date, $amount, $payment_method);
        $stmt->execute();
        $stmt->close();
        header('Location: payments.php');
        exit();
    } else {
        $error = 'All fields are required.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Add New Payment</h2>
            <?php if (!empty($error)) echo '<p class="text-danger">'.$error.'</p>'; ?>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Order ID</label>
                    <input type="number" class="form-control" name="order_id" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Payment Date</label>
                    <input type="date" class="form-control" name="payment_date" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Amount</label>
                    <input type="number" step="0.01" class="form-control" name="amount" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Payment Method</label>
                    <input type="text" class="form-control" name="payment_method" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Payment</button>
            </form>
            <a href="payments.php" class="btn btn-link mt-3 w-100">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>
