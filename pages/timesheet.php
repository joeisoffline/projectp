<?php
session_start();
include('../includes/database.php');
include('../includes/header.php');

// Timesheet form for employees
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $work_order_id = $_POST['work_order_id'];
    $hours = $_POST['hours'];
    $date = $_POST['date'];

    $stmt = $pdo->prepare("INSERT INTO timesheets (user_id, work_order_id, hours, date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $work_order_id, $hours, $date]);

    echo "Timesheet submitted!";
}

echo "<h1>Timesheets</h1>";

?>
<form method="POST">
    <input type="number" name="work_order_id" placeholder="Work Order ID" required>
    <input type="number" step="0.01" name="hours" placeholder="Hours Worked" required>
    <input type="date" name="date" required>
    <button type="submit">Submit Timesheet</button>
</form>

<?php
include('../includes/footer.php');
?>
