<?php
include 'db.php';
$result = $conn->query('SELECT * FROM items');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Items List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Items List</h2>
        <div>
            <a href="dashboard.php" class="btn btn-secondary">&larr; Dashboard</a>
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
                <a href="edit_item.php?id=<?= $row['item_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete_item.php?id=<?= $row['item_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this item?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
