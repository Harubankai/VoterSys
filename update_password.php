<?php
session_start();
require("includes/conn.php");

header('Content-Type: application/json');

// Must be OTP-verified
if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
    echo json_encode(['success' => false, 'message' => 'Unauthorized. Please complete OTP verification first.']);
    exit;
}

if (!isset($_POST['UpdatePassword']) || !isset($_POST['gmail']) || !isset($_POST['password'])) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields.']);
    exit;
}

$gmail    = trim($_POST['gmail']);
$password = $_POST['password'];

// Make sure the email matches what was OTP-verified
if ($gmail !== $_SESSION['otp_email']) {
    echo json_encode(['success' => false, 'message' => 'Email mismatch. Please restart the process.']);
    exit;
}

if (strlen($password) < 6) {
    echo json_encode(['success' => false, 'message' => 'Password must be at least 6 characters.']);
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$sql = "UPDATE `voters` SET `password` = ?, `resettoken` = NULL, `resettokenexpire` = NULL WHERE `gmail` = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, 'ss', $hashedPassword, $gmail);
    if (mysqli_stmt_execute($stmt)) {
        // Clear OTP session
        unset($_SESSION['otp_verified'], $_SESSION['otp_email'], $_SESSION['otp_sent_time']);
        echo json_encode(['success' => true, 'message' => 'Password updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update password. Please try again.']);
    }
    mysqli_stmt_close($stmt);
} else {
    echo json_encode(['success' => false, 'message' => 'Database error. Please try again.']);
}
?>
