<?php
// db.php is assumed to have the database connection
include 'db.php';

$id = $_GET['customer_id'] ?? null;
if (!$id) {
    header('Location: customers.php');
    exit();
}

$stmt = $conn->prepare("SELECT * FROM customers WHERE customer_id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$customer = $result->fetch_assoc();
$stmt->close();

if (!$customer) {
    header('Location: customers.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['customer_name'] ?? '';
    $email = $_POST['customer_email'] ?? '';
    $phone = $_POST['customer_mobile'] ?? '';
    $address = $_POST['customer_address'] ?? '';

    if ($name && $email && $phone && $address) {
        $stmt = $conn->prepare("UPDATE customers SET customer_name=?, customer_email=?, customer_mobile=?, customer_address=? WHERE `customer_id`=?");
        $stmt->bind_param('ssssi', $name, $email, $phone, $address, $id);
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
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">Edit Customer</h2>
            <?php if (!empty($error)) echo '<p class="text-danger">'.$error.'</p>'; ?>
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" name="customer_name" value="<?php echo htmlspecialchars($customer['customer_name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="customer_email" value="<?php echo htmlspecialchars($customer['customer_email']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="form-control" name="customer_mobile" value="<?php echo htmlspecialchars($customer['customer_mobile']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="customer_address" value="<?php echo htmlspecialchars($customer['customer_address']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Update Customer</button>
            </form>
            <a href="customers.php" class="btn btn-link mt-3 w-100">Back to List</a>
        </div>
    </div>
</div>
</body>
</html>
