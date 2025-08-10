<?php
include 'db.php';

$result = $conn->query("SELECT * FROM payments");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payments List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
        .main-card { background: rgba(255,255,255,0.98); border-radius: 1.5rem; box-shadow: 0 8px 32px 0 rgba(17,153,142,0.15); padding: 2.5rem 2rem 2rem 2rem; border-top: 6px solid #11998e; }
        .table thead { border-radius: 1rem; background: #11998e; color: #fff; }
        .table th, .table td { vertical-align: middle; }
        .btn { border-radius: 0.75rem; font-weight: 600; }
        .icon-header { display: flex; align-items: center; gap: 0.7em; }
    </style>
</head>
<body>
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="main-card w-100" style="max-width: 950px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="icon-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#11998e" class="bi bi-credit-card" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 3H1v6a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V6z"/></svg>
                <h2 class="fw-bold mb-0" style="color:#11998e;">Payments List</h2>
            </div>
            <div>
                <a href="dashboard.php" class="btn btn-secondary me-2">&larr; Dashboard</a>
                <a href="add_payment.php" class="btn btn-primary">Add New Payment</a>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Order ID</th>
                    <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Payment Method</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['payment_id'] ?></td>
                <td><?= htmlspecialchars($row['order_id']) ?></td>
                <td><?= htmlspecialchars($row['payment_date']) ?></td>
                <td><?= htmlspecialchars($row['amount']) ?></td>
                <td><?= htmlspecialchars($row['payment_method']) ?></td>
                <td>
                    <a href="edit_payment.php?payment_id=<?= $row['payment_id'] ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                    <a href="delete_payment.php?payment_id=<?= $row['payment_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this payment?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
