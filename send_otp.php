<?php
session_start();
require("includes/conn.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

header('Content-Type: application/json');

if (!isset($_POST['gmail'])) {
    echo json_encode(['success' => false, 'message' => 'Email is required.']);
    exit;
}

$userEmail = trim($_POST['gmail']);

// Check 2-minute cooldown
if (isset($_SESSION['otp_sent_time']) && (time() - $_SESSION['otp_sent_time']) < 120) {
    $remaining = 120 - (time() - $_SESSION['otp_sent_time']);
    echo json_encode(['success' => false, 'cooldown' => true, 'remaining' => $remaining, 'message' => "Please wait $remaining seconds before resending."]);
    exit;
}

// Check if email exists
$stmt = mysqli_prepare($conn, "SELECT * FROM `voters` WHERE `gmail` = ?");
mysqli_stmt_bind_param($stmt, 's', $userEmail);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) != 1) {
    echo json_encode(['success' => false, 'message' => 'Email not found in our records.']);
    exit;
}

// Generate 6-digit OTP
$otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
$otp_expiry = time() + 600; // 10 minutes expiry

// Store OTP in session
$_SESSION['otp_code']      = $otp;
$_SESSION['otp_email']     = $userEmail;
$_SESSION['otp_expiry']    = $otp_expiry;
$_SESSION['otp_sent_time'] = time();

// Send email
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'akatsukiharold25@gmail.com';
    $mail->Password   = 'sbge iemg quon gdev';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('akatsukiharold25@gmail.com', 'SRC Voting System');
    $mail->addAddress($userEmail);

    // Embed logo
    $logoPath = __DIR__ . '/images/srcs.jpg';
    if (file_exists($logoPath)) {
        $mail->addEmbeddedImage($logoPath, 'src_logo');
    }

    $mail->isHTML(true);
    $mail->Subject = 'Your Password Reset OTP - SRC Voting System';
    
    $logoHtml = file_exists($logoPath) ? "<div style='text-align: center; margin-bottom: 20px;'><img src='cid:src_logo' alt='SRC Logo' style='max-width: 100px; height: auto; border-radius: 8px;'></div>" : "";

    $mail->Body    = "
        <div style='font-family: Arial, sans-serif; max-width: 500px; margin: 0 auto; padding: 30px; background: #ffffff; border: 1px solid #e0e0e0; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);'>
            $logoHtml
            <h2 style='color: #1a1a2e; text-align: center; margin-top: 0;'>Password Reset OTP</h2>
            <p style='color: #555; text-align: center;'>You requested a password reset for your <strong>SRC Voting System</strong> account.</p>
            <div style='background: #1a1a2e; color: #ffffff; font-size: 36px; font-weight: bold; text-align: center; padding: 20px; border-radius: 8px; letter-spacing: 10px; margin: 25px 0;'>
                $otp
            </div>
            <p style='color: #555; text-align: center;'>This code is valid for <strong>10 minutes</strong>. Do not share this with anyone.</p>
            <hr style='border: none; border-top: 1px solid #eeeeee; margin: 20px 0;'>
            <p style='color: #999; font-size: 12px; text-align: center; margin: 0;'>If you did not request this, please ignore this email.</p>
        </div>
    ";
    $mail->AltBody = "Your OTP code is: $otp - Valid for 10 minutes.";

    $mail->send();
    echo json_encode(['success' => true, 'message' => 'OTP sent to your email.']);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => 'Mail error: ' . $mail->ErrorInfo]);
}
?>
