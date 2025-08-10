<?php
// db.php is assumed to have the database connection
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['customer_email'] ?? '';
    $phone = $_POST['customer_mobile'] ?? '';
    $address = $_POST['customer_address'] ?? '';

    if ($name && $email && $phone && $address) {
        $stmt = $conn->prepare("INSERT INTO customers (customer_name, customer_email, customer_mobile, customer_address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $name, $email, $phone, $address);
        $stmt->execute();
        $stmt->close();
        header('Location: customers.php');
        exit();
    } else {
        $error = 'All fields are required.';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Add New Customer</h2>
            <?php if (!empty($error)) echo '<p class="text-danger">'.$error.'</p>'; ?>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="customer_email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="customer_mobile" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="customer_address" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Add Customer</button>
            </form>
            <a href="customers.php" class="btn btn-link mt-3 w-100">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>
