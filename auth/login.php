<?php
session_start();
include('../includes/database.php');

// Handle login if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the query to check if the user exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // If user exists and password is correct, log the user in
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];
        header('Location: ../pages/dashboard.php');
        exit;
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="content">
            <h1>Welcome to the CRM System</h1>

            <?php
            if (isset($error)) {
                echo "<p class='error'>$error</p>";
            }
            ?>

            <form method="POST">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
                
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                
                <!-- Move the login button here to be under the form -->
                <button type="submit">Login</button>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 CRM System. All rights reserved.</p>
    </footer>
</body>
</html>
