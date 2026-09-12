<?php
session_start(); 
include 'includes/conn.php';

if (isset($_POST['add'])) {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $year = $_POST['year'];
    $department = $_POST['department'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gmail = trim($_POST['gmail']);
    $filename = $_FILES['photo']['name'];

    if (!empty($filename)) {
        move_uploaded_file($_FILES['photo']['tmp_name'], './images/' . $filename);
    }

    $stmt1 = $conn->prepare("SELECT * FROM voters WHERE firstname = ? AND lastname = ?");
    $stmt1->bind_param("ss", $firstname, $lastname);
    $stmt1->execute();
    $result1 = $stmt1->get_result();

    $stmt2 = $conn->prepare("SELECT * FROM voters WHERE gmail = ?");
    $stmt2->bind_param("s", $gmail);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if ($result1->num_rows > 0) {
        $_SESSION['error'] = 'Account is already exist!';
    } elseif ($result2->num_rows > 0) {
        $_SESSION['error'] = 'Gmail is already exist!';
    } else {
        $set = '123456789ABCDEFGHJKLMNOPQRSTUVWXYZ';
        $voter = substr(str_shuffle($set), 0, 3);

        $stmt = $conn->prepare("INSERT INTO voters (voters_id, password, firstname, lastname, year, department, gmail, photo) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $voter, $password, $firstname, $lastname, $year, $department, $gmail, $filename);

        if ($stmt->execute()) {
            $_SESSION['success'] = 'Voter added successfully!';
        } else {
            $_SESSION['error'] = 'Database error: ' . $stmt->error;
        }
    }
} else {
    $_SESSION['error'] = 'Fill up the form first';
}

header('Location: voters.php');
exit();
?>
