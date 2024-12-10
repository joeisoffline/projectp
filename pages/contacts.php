<?php
session_start();
include('../includes/database.php');
include('../includes/header.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}

echo "<h1>Contacts</h1>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $pdo->prepare("INSERT INTO contacts (name, email, phone, address) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $phone, $address]);

    echo "Contact added!";
}

?>

<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email">
    <input type="text" name="phone" placeholder="Phone">
    <textarea name="address" placeholder="Address"></textarea>
    <button type="submit">Add Contact</button>
</form>

<?php
include('../includes/footer.php');
?>
