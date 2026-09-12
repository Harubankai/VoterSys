<?php
session_start();
include 'includes/conn.php';

date_default_timezone_set('Asia/Manila');
$current_time = date("H:i");

$start_time = "07:00"; 
$end_time = "17:00"; 

if (isset($_POST['login'])) {

    if ($current_time < $start_time || $current_time > $end_time) {
        $_SESSION['error'] = 'Voting is only allowed from 7:00 AM to 5:00 PM.';
        header('location: index.php');
        exit();
    }

    $voter = $_POST['voter'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM voters WHERE voters_id = ?");
    $stmt->bind_param("s", $voter);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        $_SESSION['error'] = 'Cannot find voter with the ID';
    } else {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['voter'] = $row['id'];
        } else {
            $_SESSION['error'] = 'Incorrect password';
        }
    }

    $stmt->close();

} else {
    $_SESSION['error'] = 'Input voter credentials first';
}

header('location: index.php');
?>
