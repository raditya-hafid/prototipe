?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Webcourse</title>
</head>
<body>
<?php if (isset($_SESSION['loggedin'])): ?>
    <h2>Selamat datang <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
    <p><a href="?logout=1">Logout</a></p>
<?php else: ?>
    <h2>Login</h2>
    <?php if ($login_error): ?>
        <p><b><?php echo $login_error; ?></b></p>
    <?php endif; ?>
    <form method="post">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
<?php endif; ?>
</body>
</html>
<!-- Gilang gtg -->