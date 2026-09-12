<?php
session_start();
require("includes/conn.php");

header('Content-Type: application/json');

if (!isset($_POST['otp'])) {
    echo json_encode(['success' => false, 'message' => 'OTP is required.']);
    exit;
}

$enteredOtp = trim($_POST['otp']);

if (!isset($_SESSION['otp_code']) || !isset($_SESSION['otp_email']) || !isset($_SESSION['otp_expiry'])) {
    echo json_encode(['success' => false, 'message' => 'No OTP found. Please request a new one.']);
    exit;
}

// Check expiry
if (time() > $_SESSION['otp_expiry']) {
    unset($_SESSION['otp_code'], $_SESSION['otp_expiry']);
    echo json_encode(['success' => false, 'message' => 'OTP has expired. Please request a new one.']);
    exit;
}

// Verify OTP
if ($enteredOtp !== $_SESSION['otp_code']) {
    echo json_encode(['success' => false, 'message' => 'Invalid OTP. Please try again.']);
    exit;
}

// OTP is valid - mark as verified
$_SESSION['otp_verified'] = true;
$verifiedEmail = $_SESSION['otp_email'];

// Clear OTP from session but keep verified flag & email
unset($_SESSION['otp_code'], $_SESSION['otp_expiry']);

echo json_encode(['success' => true, 'message' => 'OTP verified successfully.', 'email' => $verifiedEmail]);
?>
