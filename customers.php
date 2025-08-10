<?php
// db.php is assumed to have the database connection
include 'db.php';

$result = $conn->query("SELECT * FROM customers");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customers List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Customers List</h2>
        <div>
            <a href="dashboard.php" class="btn btn-secondary">&larr; Dashboard</a>
            <a href="add_customer.php" class="btn btn-primary">Add New Customer</a>
        </div>
    </div>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['customer_id'] ?></td>
            <td><?= htmlspecialchars($row['customer_name']) ?></td>
            <td><?= htmlspecialchars($row['customer_email']) ?></td>
            <td><?= htmlspecialchars($row['customer_mobile']) ?></td>
            <td><?= htmlspecialchars($row['customer_address']) ?></td>
            <td>
                <a href="edit_customer.php?customer_id=<?= $row['customer_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete_customer.php?customer_id=<?= $row['customer_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this customer?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
