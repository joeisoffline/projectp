<?php
// contacts.php
session_start();
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Database interaction to fetch Contacts data will go here

?>

<h2>Contacts List</h2>
<!-- Table for displaying contacts -->
<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Location</th>
    </tr>
    <!-- Loop to fetch and display contacts data -->
</table>

<?php
include 'includes/footer.php';
?>
