document.getElementById('loginForm').addEventListener('submit', function(e) {
    var user = document.getElementById('user_name').value.trim();
    var pass = document.getElementById('user_password').value.trim();
    if (!user || !pass) {
        e.preventDefault();
        document.getElementById('error-message').textContent = 'Please enter both username and password.';
    }
});
