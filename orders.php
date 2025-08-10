<?php
include 'db.php';

$result = $conn->query("SELECT * FROM orders");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Orders List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Orders List</h2>
        <div>
            <a href="dashboard.php" class="btn btn-secondary">&larr; Dashboard</a>
            <a href="add_order.php" class="btn btn-primary">Add New Order</a>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['order_id'] ?></td>
            <td><?= htmlspecialchars($row['customer_id']) ?></td>
            <td><?= htmlspecialchars($row['order_date']) ?></td>
            <td><?= htmlspecialchars($row['total_amount']) ?></td>
            <td>
                <a href="edit_order.php?order_id=<?= $row['order_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete_order.php?order_id=<?= $row['order_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this order?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
