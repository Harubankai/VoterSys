<?php
session_start();
include 'includes/conn.php';

// Check if 'admin' session variable is set
if (!isset($_SESSION['admin']) || trim($_SESSION['admin']) == '') {
    header('Location: index.php');
    exit;
}

// Fetch admin details from the database
$admin_id = (int)$_SESSION['admin'];
$stmt = $conn->prepare("SELECT * FROM admin WHERE id = ?");
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$query = $stmt->get_result();

if ($query->num_rows > 0) {
    $user = $query->fetch_assoc();
} else {
    // If the admin user is not found, log out and redirect
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}
$stmt->close();
?>
