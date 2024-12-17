<?php
session_start();
include('..includes/database.php'); // Your database connection file
include('..auth/login.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input from the registration form
    $username = $_POST['username'];
    $password = $_POST['password'];  // This is the plain-text password entered by the user

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert the user data into the database
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->execute(['username' => $username, 'password' => $hashed_password]);

    echo "User registered successfully!";
}
?>

<!-- Registration Form -->
<form method="POST" action="register.php">
    <input type="text" name="username" required placeholder="Username">
    <input type="password" name="password" required placeholder="Password">
    <button type="submit">Register</button>
</form>
