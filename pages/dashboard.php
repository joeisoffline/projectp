<?php
session_start();
include('../includes/database.php');
include('../includes/header.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}

echo "<h1>Welcome to Push CRM Dashboard</h1>";

// Dashboard content here based on user role
if ($_SESSION['role'] == 'admin') {
    echo "<a href='workorders.php'>Work Orders</a> | <a href='contacts.php'>Contacts</a> | <a href='invoices.php'>Invoices</a> | <a href='payroll.php'>Payroll</a>";
} elseif ($_SESSION['role'] == 'employee') {
    echo "<a href='timesheets.php'>Submit Timesheets</a>";
} elseif ($_SESSION['role'] == 'manager') {
    echo "<a href='hr.php'>HR Management</a>";
}

include('../includes/footer.php');
?>
