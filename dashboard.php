<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Supermart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body text-center">
                <h2 class="card-title mb-3">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
                <p class="mb-4">You have successfully logged in to Supermart.</p>
                <a href="items.php" class="btn btn-primary w-100 mb-3">Go to Items Management</a>
                <form action="logout.php" method="post">
                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
