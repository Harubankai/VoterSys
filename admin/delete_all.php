<?php
session_start();
include 'includes/conn.php';

$sql = "DELETE FROM voters";
if ($conn->query($sql) === TRUE) {
    $_SESSION['success'] = "All records have been deleted successfully.";
} else {
    $_SESSION['error'] = "Error deleting records: " . $conn->error;
}

header("Location: voters.php"); // Change this to your actual page
exit();
?>
