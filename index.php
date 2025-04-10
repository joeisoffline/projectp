<?php
session_start();

// If the user is already logged in, redirect them to the dashboard
if (isset($_SESSION['user_id'])) {
    header('Location: pages/dashboard.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Push CRM - Login</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="auth/login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <h1>Welcome to PushCRM</h1>
        <p>This is your all-in-one platform</p>
        <p>To get started, please <a href="auth/login.php">login</a> to your account.</p>
    </div>

    <footer>
        <p>&copy; 2025 Push CRM. All rights reserved.</p>
    </footer>
</body>
</html>
