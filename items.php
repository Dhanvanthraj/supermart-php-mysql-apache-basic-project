<?php
include 'db.php';
$result = $conn->query('SELECT * FROM items');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Items List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body { min-height: 100vh; background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%); }
        .main-card { background: rgba(255,255,255,0.98); border-radius: 1.5rem; box-shadow: 0 8px 32px 0 rgba(255,153,102,0.15); padding: 2.5rem 2rem 2rem 2rem; border-top: 6px solid #ff5e62; }
        .table thead { border-radius: 1rem; background: #ff5e62; color: #fff; }
        .table th, .table td { vertical-align: middle; }
        .btn { border-radius: 0.75rem; font-weight: 600; }
        .icon-header { display: flex; align-items: center; gap: 0.7em; }
    </style>
</head>
<body>
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="main-card w-100" style="max-width: 1100px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="icon-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#ff5e62" class="bi bi-box-seam" viewBox="0 0 16 16"><path d="M8.186.113a1.5 1.5 0 0 0-1.372 0l-6 3A1.5 1.5 0 0 0 0 4.382v7.236a1.5 1.5 0 0 0 .814 1.33l6 3a1.5 1.5 0 0 0 1.372 0l6-3A1.5 1.5 0 0 0 16 11.618V4.382a1.5 1.5 0 0 0-.814-1.33l-6-3ZM8 1.058a.5.5 0 0 1 .457 0l6 3A.5.5 0 0 1 14.5 4.382v.255l-6.5 3.25-6.5-3.25v-.255A.5.5 0 0 1 1.543 4.058l6-3ZM1 5.383l6.5 3.25v6.309a.5.5 0 0 1-.229-.057l-6-3A.5.5 0 0 1 1 11.618V5.383Zm7.5 9.502V8.633l6.5-3.25v6.235a.5.5 0 0 1-.271.44l-6 3a.5.5 0 0 1-.229.057Z"/></svg>
                <h2 class="fw-bold mb-0" style="color:#ff5e62;">Items List</h2>
            </div>
            <div>
                <a href="dashboard.php" class="btn btn-secondary me-2">&larr; Dashboard</a>
                <a href="add_item.php" class="btn btn-primary">Add New Item</a>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th><th>Name</th><th>Price</th><th>Manufactured</th><th>Expiry</th><th>Suppliers</th><th>Quantity</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['item_id'] ?></td>
                <td><?= htmlspecialchars($row['item_name']) ?></td>
                <td><?= $row['item_price'] ?></td>
                <td><?= $row['item_manufactured_date'] ?></td>
                <td><?= $row['item_expiry_date'] ?></td>
                <td><?= htmlspecialchars($row['item_suppliers']) ?></td>
                <td><?= $row['item_quantity'] ?></td>
                <td>
                    <a href="edit_item.php?id=<?= $row['item_id'] ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                    <a href="delete_item.php?id=<?= $row['item_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
