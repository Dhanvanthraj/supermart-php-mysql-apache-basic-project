<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header('Location: index.php');
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
                    <a href="items.php" class="btn btn-primary w-100 mb-3">
                        <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16"><path d="M8.186.113a1.5 1.5 0 0 0-1.372 0l-6 3A1.5 1.5 0 0 0 0 4.382v7.236a1.5 1.5 0 0 0 .814 1.33l6 3a1.5 1.5 0 0 0 1.372 0l6-3A1.5 1.5 0 0 0 16 11.618V4.382a1.5 1.5 0 0 0-.814-1.33l-6-3ZM8 1.058a.5.5 0 0 1 .457 0l6 3A.5.5 0 0 1 14.5 4.382v.255l-6.5 3.25-6.5-3.25v-.255A.5.5 0 0 1 1.543 4.058l6-3ZM1 5.383l6.5 3.25v6.309a.5.5 0 0 1-.229-.057l-6-3A.5.5 0 0 1 1 11.618V5.383Zm7.5 9.502V8.633l6.5-3.25v6.235a.5.5 0 0 1-.271.44l-6 3a.5.5 0 0 1-.229.057Z"/></svg></span>
                        Go to Items Management
                    </a>
                    <a href="customers.php" class="btn btn-success w-100 mb-3">
                        <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16"><path d="M13 7a3 3 0 1 0-6 0 3 3 0 0 0 6 0Zm-3-2a2 2 0 1 1 0 4 2 2 0 0 1 0-4Zm5 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.07 10.28 9.5 8 9.5c-2.28 0-3.516.57-4.168 1.832C3.154 12.01 3.001 12.75 3 12.996V13h10v-.004Z"/></svg></span>
                        Go to Customers Management
                    </a>
                    <form action="logout.php" method="post">
                        <button type="submit" class="btn btn-danger w-100">
                            <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 13H10.5a.5.5 0 0 1-.5-.5ZM4.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13H8a.5.5 0 0 0 0-1H4.5A.5.5 0 0 1 4 11.5v-7A.5.5 0 0 1 4.5 3H8a.5.5 0 0 0 0-1H4.5Z"/></svg></span>
                            Logout
                        </button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>
