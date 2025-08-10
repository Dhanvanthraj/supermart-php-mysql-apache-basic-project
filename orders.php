<?php
include 'db.php';

$result = $conn->query("SELECT * FROM orders");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Orders List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; background: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%); }
        .main-card { background: rgba(255,255,255,0.98); border-radius: 1.5rem; box-shadow: 0 8px 32px 0 rgba(161,140,209,0.15); padding: 2.5rem 2rem 2rem 2rem; border-top: 6px solid #a18cd1; }
        .table thead { border-radius: 1rem; background: #a18cd1; color: #fff; }
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
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#a18cd1" class="bi bi-receipt" viewBox="0 0 16 16"><path d="M1.92.506A.5.5 0 0 1 2.5 0h11a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-.854.354L12 14.207l-1.146 1.147a.5.5 0 0 1-.708 0L9 14.207l-1.146 1.147a.5.5 0 0 1-.708 0L6 14.207l-1.146 1.147A.5.5 0 0 1 4 15.5v-15a.5.5 0 0 1 .854-.354L6 1.793l1.146-1.147a.5.5 0 0 1 .708 0L9 1.793l1.146-1.147a.5.5 0 0 1 .708 0L12 1.793l1.146-1.147a.5.5 0 0 1 .774.36ZM2 1.707V14.293l1-1V2.707l-1-1Zm12 0-1 1v10.586l1 1V1.707ZM8 2.207 6.854 1.06a.5.5 0 0 0-.708 0L5 2.207V13.793l1.146-1.147a.5.5 0 0 1 .708 0L8 13.793l1.146-1.147a.5.5 0 0 1 .708 0L11 13.793V2.207l-1.146-1.147a.5.5 0 0 0-.708 0L8 2.207Z"/></svg>
                <h2 class="fw-bold mb-0" style="color:#a18cd1;">Orders List</h2>
            </div>
            <div>
                <a href="dashboard.php" class="btn btn-secondary me-2">&larr; Dashboard</a>
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
                    <a href="edit_order.php?order_id=<?= $row['order_id'] ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                    <a href="delete_order.php?order_id=<?= $row['order_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this order?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
