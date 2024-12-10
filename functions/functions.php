<?php
session_start();
include 'database.php';

// Function to check if the user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Function to add a customer
function addCustomer($first_name, $last_name, $email, $phone, $address) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO customers (first_name, last_name, email, phone, address) 
                           VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$first_name, $last_name, $email, $phone, $address]);
}

// Function to get all customers
function getAllCustomers() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM customers");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to get a customer by ID
function getCustomer($id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM customers WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Function to update a customer's information
function updateCustomer($id, $first_name, $last_name, $email, $phone, $address) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE customers SET first_name = ?, last_name = ?, email = ?, phone = ?, address = ? WHERE id = ?");
    return $stmt->execute([$first_name, $last_name, $email, $phone, $address, $id]);
}

// Function to delete a customer
function deleteCustomer($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM customers WHERE id = ?");
    return $stmt->execute([$id]);
}
?>
