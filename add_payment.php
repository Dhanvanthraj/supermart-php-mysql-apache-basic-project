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
    <style>
        body { min-height: 100vh; background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
        .main-card { background: rgba(255,255,255,0.98); border-radius: 1.5rem; box-shadow: 0 8px 32px 0 rgba(17,153,142,0.15); padding: 2.5rem 2rem 2rem 2rem; border-top: 6px solid #11998e; }
        .form-label { font-weight: 600; color: #11998e; }
        .btn { border-radius: 0.75rem; font-weight: 600; }
        .icon-header { display: flex; align-items: center; gap: 0.7em; justify-content: center; }
    </style>
</head>
<body>
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="main-card mx-auto" style="max-width: 500px; width:100%;">
        <div class="icon-header mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#11998e" class="bi bi-credit-card" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 3H1v6a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V6z"/></svg>
            <h2 class="card-title mb-0" style="color:#11998e; font-weight:700;">Add New Payment</h2>
        </div>
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
            <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(90deg, #11998e 0%, #38ef7d 100%); border: none;">Add Payment</button>
        </form>
        <a href="payments.php" class="btn btn-link mt-3 w-100">Back to List</a>
    </div>
</div>
</body>
</html>
