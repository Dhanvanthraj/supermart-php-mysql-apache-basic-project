<?php
// db.php is assumed to have the database connection
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['customer_name'] ?? '';
    $email = $_POST['customer_email'] ?? '';
    $phone = $_POST['customer_mobile'] ?? '';
    $address = $_POST['customer_address'] ?? '';

    if ($name && $email && $phone && $address) {
        $sql = "INSERT INTO customers (customer_name, customer_email, customer_mobile, customer_address) VALUES (?, ?, ?, ?)";
        echo '<pre style="color:blue;">SQL: ' . $sql . "\n";
        echo 'Values: ' . print_r([$name, $email, $phone, $address], true) . '</pre>';
        $stmt = $conn->prepare($sql);
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
    <style>
        body { min-height: 100vh; background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%); }
        .main-card { background: rgba(255,255,255,0.98); border-radius: 1.5rem; box-shadow: 0 8px 32px 0 rgba(116,235,213,0.15); padding: 2.5rem 2rem 2rem 2rem; border-top: 6px solid #2575fc; }
        .form-label { font-weight: 600; color: #2575fc; }
        .btn { border-radius: 0.75rem; font-weight: 600; }
        .icon-header { display: flex; align-items: center; gap: 0.7em; justify-content: center; }
    </style>
</head>
<body>
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="main-card mx-auto" style="max-width: 500px; width:100%;">
        <div class="icon-header mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#2575fc" class="bi bi-people" viewBox="0 0 16 16"><path d="M13 7a3 3 0 1 0-6 0 3 3 0 0 0 6 0Zm-3-2a2 2 0 1 1 0 4 2 2 0 0 1 0-4Zm5 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.07 10.28 9.5 8 9.5c-2.28 0-3.516.57-4.168 1.832C3.154 12.01 3.001 12.75 3 12.996V13h10v-.004Z"/></svg>
            <h2 class="card-title mb-0" style="color:#2575fc; font-weight:700;">Add New Customer</h2>
        </div>
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
            <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(90deg, #74ebd5 0%, #2575fc 100%); border: none;">Add Customer</button>
        </form>
        <a href="customers.php" class="btn btn-link mt-3 w-100">Back to List</a>
    </div>
</div>
</body>
</html>
