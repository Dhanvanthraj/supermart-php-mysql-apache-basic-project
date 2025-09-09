<?php
include 'db.php';
$id = $_GET['id'] ?? 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['item_name'];
    $price = $_POST['item_price'];
    $mdate = $_POST['item_manufactured_date'];
    $edate = $_POST['item_expiry_date'];
    $suppliers = $_POST['item_suppliers'];
    $qty = $_POST['item_quantity'];
    $sql = "UPDATE items SET item_name=?, item_price=?, item_manufactured_date=?, item_expiry_date=?, item_suppliers=?, item_quantity=? WHERE item_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sisssii', $name, $price, $mdate, $edate, $suppliers, $qty, $id);
    $stmt->execute();
    header('Location: items.php');
    exit;
}
$sql = "SELECT * FROM items WHERE item_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);
$stmt->execute();
$item = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }
        .main-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(118, 75, 162, 0.2);
            padding: 2rem;
        }
        .header {
            color: #764ba2;
            font-size: 2.2rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        .icon {
            font-size: 2.5rem;
            color: #667eea;
            text-align: center;
            margin-bottom: 1rem;
        }
        .form-label {
            color: #4a5568;
            font-weight: 600;
            font-size: 0.95rem;
        }
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        }
        .btn-custom {
            background: linear-gradient(90deg, #667eea, #764ba2);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background: linear-gradient(90deg, #764ba2, #667eea);
            transform: translateY(-2px);
            color: white;
        }
        .back-link {
            display: inline-block;
            color: #764ba2;
            text-decoration: none;
            font-weight: 600;
            margin-top: 1rem;
            transition: all 0.3s ease;
        }
        .back-link:hover {
            color: #667eea;
            transform: translateX(-5px);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .alert {
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="main-card">
                    <div class="icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h2 class="header">Edit Item</h2>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <div class="form-group">
                            <label class="form-label">Item Name</label>
                            <input type="text" class="form-control" name="item_name" value="<?= htmlspecialchars($item['item_name']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" class="form-control" name="item_price" value="<?= $item['item_price'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Manufacturing Date</label>
                            <input type="date" class="form-control" name="item_manufactured_date" value="<?= $item['item_manufactured_date'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Expiry Date</label>
                            <input type="date" class="form-control" name="item_expiry_date" value="<?= $item['item_expiry_date'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Suppliers</label>
                            <input type="text" class="form-control" name="item_suppliers" value="<?= htmlspecialchars($item['item_suppliers']) ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="item_quantity" value="<?= $item['item_quantity'] ?>" required>
                        </div>
                        <button type="submit" class="btn btn-custom w-100">
                            <i class="fas fa-save me-2"></i>Update Item
                        </button>
                    </form>
                    <div class="text-center">
                        <a href="items.php" class="back-link">
                            <i class="fas fa-arrow-left me-2"></i>Back to Items
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
