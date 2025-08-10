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
    <style>
        body { min-height: 100vh; background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%); }
        .main-card { background: rgba(255,255,255,0.98); border-radius: 1.5rem; box-shadow: 0 8px 32px 0 rgba(161,140,209,0.15); padding: 2.5rem 2rem 2rem 2rem; border-top: 6px solid #a18cd1; }
        .form-label { font-weight: 600; color: #a18cd1; }
        .btn { border-radius: 0.75rem; font-weight: 600; }
        .icon-header { display: flex; align-items: center; gap: 0.7em; justify-content: center; }
    </style>
</head>
<body>
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="main-card mx-auto" style="max-width: 500px; width:100%;">
        <div class="icon-header mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#a18cd1" class="bi bi-receipt" viewBox="0 0 16 16"><path d="M1.92.506A.5.5 0 0 1 2.5 0h11a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-.854.354L12 14.207l-1.146 1.147a.5.5 0 0 1-.708 0L9 14.207l-1.146 1.147a.5.5 0 0 1-.708 0L6 14.207l-1.146 1.147A.5.5 0 0 1 4 15.5v-15a.5.5 0 0 1 .854-.354L6 1.793l1.146-1.147a.5.5 0 0 1 .708 0L9 1.793l1.146-1.147a.5.5 0 0 1 .708 0L12 1.793l1.146-1.147a.5.5 0 0 1 .774.36ZM2 1.707V14.293l1-1V2.707l-1-1Zm12 0-1 1v10.586l1 1V1.707ZM8 2.207 6.854 1.06a.5.5 0 0 0-.708 0L5 2.207V13.793l1.146-1.147a.5.5 0 0 1 .708 0L8 13.793l1.146-1.147a.5.5 0 0 1 .708 0L11 13.793V2.207l-1.146-1.147a.5.5 0 0 0-.708 0L8 2.207Z"/></svg>
            <h2 class="card-title mb-0" style="color:#a18cd1; font-weight:700;">Add New Order</h2>
        </div>
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
            <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(90deg, #a18cd1 0%, #fbc2eb 100%); border: none;">Add Order</button>
        </form>
        <a href="orders.php" class="btn btn-link mt-3 w-100">Back to List</a>
    </div>
</div>
</body>
</html>
