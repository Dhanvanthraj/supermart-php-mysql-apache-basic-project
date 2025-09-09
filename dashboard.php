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
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #ff9966 0%, #ff5e62 100%)#69450ffd;
        }
        .dashboard-card {
            background: rgba(255, 255, 255, 0.97);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.15);
            padding: 2.5rem 2rem 2rem 2rem;
        }
        .dashboard-title {
            color: #2575fc;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .dashboard-btn {
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 0.75rem;
            box-shadow: 0 2px 8px rgba(37,117,252,0.08);
            margin-bottom: 1rem;
            transition: transform 0.08s;
        }
        .dashboard-btn:hover {
            transform: translateY(-2px) scale(1.03);
        }
        .dashboard-icon {
            vertical-align: middle;
            margin-right: 0.7em;
        }
    </style>
</head>
<body>
    <div class="container min-vh-100 d-flex align-items-center justify-content-center flex-column">
        <header class="w-100 mb-4">
            <div class="text-center py-3 position-relative" style="background: #ffffffff; border-radius: 1.5rem; box-shadow: 0 4px 16px rgba(255,94,98,0.10);">
                <h1 class="fw-bold mb-0 d-inline-block" style="background: linear-gradient(90deg, #ff9966 0%, #ff5e62 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-fill-color: transparent; letter-spacing: 2px; font-size: 2.5rem;">Supermart</h1>
                <span tabindex="0" data-bs-toggle="tooltip" title="Supermart is a management system for handling items, customers, orders, and payments efficiently in your retail business." style="cursor:pointer; margin-left: 10px; vertical-align: middle;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#ffffffff" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 .875-.252 1.02-.797l.088-.416c.066-.308.118-.438.288-.438.145 0 .176.105.145.262l-.088.416c-.194.897.105 1.319.808 1.319.545 0 .875-.252 1.02-.797l.738-3.468c.194-.897-.105-1.319-.808-1.319-.545 0-.875.252-1.02.797l-.088.416c-.066.308-.118.438-.288.438-.145 0-.176-.105-.145-.262l.088-.416c.194-.897-.105-1.319-.808-1.319zM8 5.5a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z"/>
                    </svg>
                </span>
            </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>
        </header>
        <div class="dashboard-card mx-auto" style="max-width: 430px; width:100%;">
            <div class="text-center mb-4">
                <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Supermart" width="64" height="64">
                <h2 class="dashboard-title mt-2 mb-0">Supermart Dashboard</h2>
                <small class="text-muted">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</small>
            </div>
            <div class="mb-4 text-center">
                <span class="badge bg-success bg-gradient fs-6">You are logged in</span>
            </div>
            <a href="items.php" class="btn btn-primary dashboard-btn w-100">
                <span class="dashboard-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16"><path d="M8.186.113a1.5 1.5 0 0 0-1.372 0l-6 3A1.5 1.5 0 0 0 0 4.382v7.236a1.5 1.5 0 0 0 .814 1.33l6 3a1.5 1.5 0 0 0 1.372 0l6-3A1.5 1.5 0 0 0 16 11.618V4.382a1.5 1.5 0 0 0-.814-1.33l-6-3ZM8 1.058a.5.5 0 0 1 .457 0l6 3A.5.5 0 0 1 14.5 4.382v.255l-6.5 3.25-6.5-3.25v-.255A.5.5 0 0 1 1.543 4.058l6-3ZM1 5.383l6.5 3.25v6.309a.5.5 0 0 1-.229-.057l-6-3A.5.5 0 0 1 1 11.618V5.383Zm7.5 9.502V8.633l6.5-3.25v6.235a.5.5 0 0 1-.271.44l-6 3a.5.5 0 0 1-.229.057Z"/></svg></span>
                Items Management
            </a>
            <a href="customers.php" class="btn btn-success dashboard-btn w-100">
                <span class="dashboard-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16"><path d="M13 7a3 3 0 1 0-6 0 3 3 0 0 0 6 0Zm-3-2a2 2 0 1 1 0 4 2 2 0 0 1 0-4Zm5 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.07 10.28 9.5 8 9.5c-2.28 0-3.516.57-4.168 1.832C3.154 12.01 3.001 12.75 3 12.996V13h10v-.004Z"/></svg></span>
                Customers Management
            </a>
            <a href="orders.php" class="btn btn-warning dashboard-btn w-100">
                <span class="dashboard-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-receipt" viewBox="0 0 16 16"><path d="M1.92.506A.5.5 0 0 1 2.5 0h11a.5.5 0 0 1 .5.5v15a.5.5 0 0 1-.854.354L12 14.207l-1.146 1.147a.5.5 0 0 1-.708 0L9 14.207l-1.146 1.147a.5.5 0 0 1-.708 0L6 14.207l-1.146 1.147A.5.5 0 0 1 4 15.5v-15a.5.5 0 0 1 .854-.354L6 1.793l1.146-1.147a.5.5 0 0 1 .708 0L9 1.793l1.146-1.147a.5.5 0 0 1 .708 0L12 1.793l1.146-1.147a.5.5 0 0 1 .774.36ZM2 1.707V14.293l1-1V2.707l-1-1Zm12 0-1 1v10.586l1 1V1.707ZM8 2.207 6.854 1.06a.5.5 0 0 0-.708 0L5 2.207V13.793l1.146-1.147a.5.5 0 0 1 .708 0L8 13.793l1.146-1.147a.5.5 0 0 1 .708 0L11 13.793V2.207l-1.146-1.147a.5.5 0 0 0-.708 0L8 2.207Z"/></svg></span>
                Orders Management
            </a>
            <a href="payments.php" class="btn btn-info dashboard-btn w-100">
                <span class="dashboard-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 3H1v6a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V6z"/></svg></span>
                Payments Management
            </a>
            <form action="logout.php" method="post" class="mt-2">
                <button type="submit" class="btn btn-danger dashboard-btn w-100">
                    <span class="dashboard-icon"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1 .5-.5h3.793l-1.147-1.146a.5.5 0 0 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L14.293 13H10.5a.5.5 0 0 1-.5-.5ZM4.5 3A1.5 1.5 0 0 0 3 4.5v7A1.5 1.5 0 0 0 4.5 13H8a.5.5 0 0 0 0-1H4.5A.5.5 0 0 1 4 11.5v-7A.5.5 0 0 1 4.5 3H8a.5.5 0 0 0 0-1H4.5Z"/></svg></span>
                    Logout
                </button>
            </form>
        </div>
    </div>
</body>
</html>
