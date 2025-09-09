<?php
include 'db.php';

if (!isset($_GET['id'])) {
    echo '<div class="alert alert-danger">No customer ID provided.</div>';
    exit;
}

$customer_id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT customer_id, customer_name, customer_email, customer_mobile, customer_address FROM customers WHERE customer_id = ?");
$stmt->bind_param('i', $customer_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo '<div class="alert alert-danger">Customer not found.</div>';
    exit;
}

$customer = $result->fetch_assoc();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['customer_name'] ?? '';
    $email = $_POST['customer_email'] ?? '';
    $phone = $_POST['customer_mobile'] ?? '';
    $address = $_POST['customer_address'] ?? '';

    if ($name && $email && $phone && $address) {
        $stmt = $conn->prepare("UPDATE customers SET customer_name=?, customer_email=?, customer_mobile=?, customer_address=? WHERE customer_id=?");
        $stmt->bind_param('ssssi', $name, $email, $phone, $address, $customer_id);
        
        if ($stmt->execute()) {
            echo '<div class="alert alert-success">Customer updated successfully!</div>';
            $customer['customer_name'] = $name;
            $customer['customer_email'] = $email;
            $customer['customer_mobile'] = $phone;
            $customer['customer_address'] = $address;
        } else {
            echo '<div class="alert alert-danger">Error updating customer: ' . $conn->error . '</div>';
        }
        $stmt->close();
    } else {
        echo '<div class="alert alert-danger">All fields are required.</div>';
    }
}
?>
<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(120deg, #89f7fe 0%, #66a6ff 100%);
            min-height: 100vh;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(102,166,255,0.15);
            background: rgba(255,255,255,0.95);
        }
        .header {
            font-size: 2.3rem;
            font-weight: 700;
            color: #2b5876;
            text-align: center;
            margin-bottom: 1.2rem;
            letter-spacing: 1px;
        }
        .icon {
            font-size: 2.8rem;
            color: #66a6ff;
            text-align: center;
            margin-bottom: 0.7rem;
        }
        .form-label {
            font-weight: 500;
            color: #2b5876;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #66a6ff;
        }
        .btn-custom {
            background: linear-gradient(90deg, #66a6ff 0%, #89f7fe 100%);
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(102,166,255,0.15);
        }
        .btn-custom:hover {
            background: linear-gradient(90deg, #89f7fe 0%, #66a6ff 100%);
            color: #fff;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.2rem;
            color: #2b5876;
            text-decoration: none;
            font-weight: 500;
        }
        .back-link:hover {
            text-decoration: underline;
            color: #66a6ff;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card p-4">
                    <div class="icon"><i class="fa-solid fa-user-edit"></i></div>
                    <div class="header">Edit Customer</div>
                    <form method="post" autocomplete="off">
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo htmlspecialchars($customer['customer_name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="customer_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="customer_email" name="customer_email" value="<?php echo htmlspecialchars($customer['customer_email']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="customer_mobile" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="customer_mobile" name="customer_mobile" value="<?php echo htmlspecialchars($customer['customer_mobile']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="customer_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="customer_address" name="customer_address" value="<?php echo htmlspecialchars($customer['customer_address']); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Update Customer</button>
                    </form>
                    <a href="customers.php" class="back-link"><i class="fa fa-arrow-left"></i> Back to Customers</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
