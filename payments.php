<?php
include 'db.php';

$result = $conn->query("SELECT * FROM payments");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payments List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Payments List</h2>
        <div>
            <a href="dashboard.php" class="btn btn-secondary">&larr; Dashboard</a>
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
                <a href="edit_payment.php?payment_id=<?= $row['payment_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete_payment.php?payment_id=<?= $row['payment_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this payment?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
