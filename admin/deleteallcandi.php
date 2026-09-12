<?php
session_start();
include 'includes/conn.php';

$sql = "DELETE FROM candidates";
if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = "All records have been deleted successfully.";
} else {
    $_SESSION['error'] = "Error deleting records: " . $conn->error;
}

header("Location: candidates.php"); // Change this to your actual page
exit();
?>
