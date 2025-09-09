<?php
// db.php is assumed to have the database connection
include 'db.php';

// Query to check table structure
$table_check = $conn->query("DESCRIBE customers");
if ($table_check) {
    while ($row = $table_check->fetch_assoc()) {
        error_log("Field: " . $row['Field'] . " Type: " . $row['Type']);
    }
}

$result = $conn->query("SELECT customer_id, customer_name, customer_email, customer_mobile, customer_address FROM customers");
if (!$result) {
    die("Error in query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Customers List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%); }
        .main-card { background: rgba(255,255,255,0.98); border-radius: 1.5rem; box-shadow: 0 8px 32px 0 rgba(116,235,213,0.15); padding: 2.5rem 2rem 2rem 2rem; border-top: 6px solid #2575fc; }
        .table thead { border-radius: 1rem; background: #2575fc; color: #fff; }
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
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#2575fc" class="bi bi-people" viewBox="0 0 16 16"><path d="M13 7a3 3 0 1 0-6 0 3 3 0 0 0 6 0Zm-3-2a2 2 0 1 1 0 4 2 2 0 0 1 0-4Zm5 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.07 10.28 9.5 8 9.5c-2.28 0-3.516.57-4.168 1.832C3.154 12.01 3.001 12.75 3 12.996V13h10v-.004Z"/></svg>
                <h2 class="fw-bold mb-0" style="color:#2575fc;">Customers List</h2>
            </div>
            <div>
                <a href="dashboard.php" class="btn btn-secondary me-2">&larr; Dashboard</a>
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
                        <a href="edit_customer.php?id=<?= $row['customer_id'] ?>" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i> Edit
                        </a>&nbsp;
                        <a href="delete_customer.php?id=<?= $row['customer_id'] ?>" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                </td>
            </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
