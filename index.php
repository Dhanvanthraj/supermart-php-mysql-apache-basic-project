<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supermart Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body style="background: linear-gradient(135deg, #43cea2 0%, #185a9d 100%); min-height: 100vh;">
    <div class="container min-vh-100 d-flex align-items-center justify-content-center">
        <div class="card shadow-lg p-4 border-0" style="width: 100%; max-width: 400px; background: rgba(255,255,255,0.97);">
            <div class="text-center mb-4">
                <img src="https://cdn-icons-png.flaticon.com/512/263/263142.png" alt="Supermart" width="64" height="64">
                <h2 class="mt-2 mb-0" style="color:#2575fc; font-weight:700;">Supermart Login</h2>
                <small class="text-muted">Sign in to your account</small>
            </div>
            <div class="alert alert-info text-center mb-3" style="font-size:1.05rem;">
                Welcome! Please sign in to access your Supermart account.
            </div>
            <form id="loginForm" action="login.php" method="POST" autocomplete="off">
                <div class="mb-3">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="text" id="user_name" name="user_name" class="form-control" placeholder="Enter username" required autofocus>
                </div>
                <div class="mb-3 position-relative">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" name="user_password" class="form-control pr-5" placeholder="Enter password" required>
                    <span class="position-absolute end-0 me-3" style="top: 38px; cursor:pointer;" onclick="togglePassword()">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="#2575fc" viewBox="0 0 16 16">
                          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.12 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.133 13.133 0 0 1 1.172 8z"/>
                          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zm0 1a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/>
                        </svg>
                    </span>
                </div>
                <div id="error-message" class="text-danger mb-3"></div>
                <button type="submit" class="btn btn-primary w-100" style="background: linear-gradient(90deg, #2575fc 0%, #6a11cb 100%); border: none; font-weight:600;">Login</button>
            </form>
        </div>
    </div>
    <script>
    function togglePassword() {
        var pwd = document.getElementById('user_password');
        var icon = document.getElementById('eyeIcon');
        if (pwd.type === 'password') {
            pwd.type = 'text';
            icon.innerHTML = '<path d="M13.359 11.238l1.387 1.387a.5.5 0 0 1-.708.708l-1.387-1.387C11.12 12.332 9.88 13.5 8 13.5c-5 0-8-5.5-8-5.5a15.978 15.978 0 0 1 2.634-3.262l-1.387-1.387a.5.5 0 1 1 .708-.708l1.387 1.387C4.88 3.668 6.12 2.5 8 2.5c5 0 8 5.5 8 5.5a15.978 15.978 0 0 1-2.634 3.262zM8 4.5c-1.657 0-3.156.672-4.242 1.758A13.133 13.133 0 0 0 1.172 8c.058.087.122.183.195.288.335.48.83 1.12 1.465 1.755C4.121 11.332 5.88 12.5 8 12.5c1.657 0 3.156-.672 4.242-1.758A13.133 13.133 0 0 0 14.828 8c-.058-.087-.122-.183-.195-.288-.335-.48-.83-1.12-1.465-1.755C11.879 4.668 10.12 3.5 8 3.5z"/>';
        } else {
            pwd.type = 'password';
            icon.innerHTML = '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.12 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.133 13.133 0 0 1 1.172 8z"/><path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zm0 1a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3z"/>';
        }
    }
    </script>
    <script src="login.js"></script>
</body>
</html>
