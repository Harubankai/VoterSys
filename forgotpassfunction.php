<?php
require("includes/conn.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

function sendMail($email, $reset_token) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'akatsukiharold25@gmail.com';
        $mail->Password   = 'sbge iemg quon gdev';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('akatsukiharold25@gmail.com', 'SRC Voting System');
        $mail->addAddress($email);

        // Embed logo
        $logoPath = __DIR__ . '/images/srcs.jpg';
        if (file_exists($logoPath)) {
            $mail->addEmbeddedImage($logoPath, 'src_logo');
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'RESET PASSWORD LINK FROM SRC VOTING SYSTEM';

        $logoHtml = file_exists($logoPath) ? "<div style='text-align: center; margin-bottom: 20px;'><img src='cid:src_logo' alt='SRC Logo' style='max-width: 100px; height: auto; border-radius: 8px;'></div>" : "";

        $mail->Body = "
            <div style='font-family: Arial, sans-serif; max-width: 500px; margin: 0 auto; padding: 30px; background: #ffffff; border: 1px solid #e0e0e0; border-radius: 12px;'>
                $logoHtml
                <h2 style='color: #1a1a2e; text-align: center;'>Reset Password Request</h2>
                <p style='color: #555;'>We received a request to reset your password.</p>
                <p style='text-align: center; margin: 25px 0;'>
                    <a href='http://localhost:8080/votesystem/resetpassword.php?gmail=$email&reset_token=$reset_token' style='background: #007bff; color: #fff; text-decoration: none; padding: 12px 24px; border-radius: 5px; font-weight: bold;'>RESET PASSWORD</a>
                </p>
                <p style='color: #999; font-size: 12px;'>If you did not request this, please ignore this email.</p>
            </div>
        ";
        $mail->AltBody = "Visit this link to reset your password: http://localhost:8080/votesystem/resetpassword.php?gmail=$email&reset_token=$reset_token";

        $mail->send();
        return true;

    } catch (Exception $e) {
        echo "<script>alert('Mailer Error: {$mail->ErrorInfo}');</script>";
        return false;
    }
}

if (isset($_POST['link-email'])) {
    $userEmail = trim($_POST['gmail']);
    $stmt = $conn->prepare("SELECT * FROM voters WHERE gmail = ?");
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        if ($result->num_rows == 1) {
            $reset_token = bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Kolkata');
            $date = date("Y-m-d");

            $uStmt = $conn->prepare("UPDATE voters SET resettoken = ?, resettokenexpire = ? WHERE gmail = ?");
            $uStmt->bind_param("sss", $reset_token, $date, $userEmail);
            
            if ($uStmt->execute() && sendMail($userEmail, $reset_token)) {
                echo "<script>
                    alert('Password reset link sent to your email.');
                    window.location.href = 'index.php';
                </script>";
            } else {
                echo "<script>
                    alert('Server issue. Please try again later.');
                    window.location.href = 'index.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Email not found.');
                window.location.href = 'index.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Database query failed.');
            window.location.href = 'index.php';
        </script>";
    }
}
?>
