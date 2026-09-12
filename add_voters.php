<?php
session_start(); 
include 'includes/conn.php';

if (isset($_POST['add'])) {
    $firstname  = trim($_POST['firstname']);
    $lastname   = trim($_POST['lastname']);
    $year       = $_POST['year'];
    $department = $_POST['department'];
    $password   = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gmail      = trim($_POST['gmail']);

    // Handle photo upload — default to empty string if none provided
    $filename = '';
    if (!empty($_FILES['photo']['name'])) {
        $filename = basename($_FILES['photo']['name']);
        move_uploaded_file($_FILES['photo']['tmp_name'], './images/' . $filename);
    }

    // Check if name already exists
    $stmt1 = $conn->prepare("SELECT voters_id FROM voters WHERE firstname = ? AND lastname = ?");
    $stmt1->bind_param("ss", $firstname, $lastname);
    $stmt1->execute();
    $stmt1->store_result();
    $nameExists = $stmt1->num_rows > 0;
    $stmt1->close();

    // Check if gmail already exists
    $stmt2 = $conn->prepare("SELECT voters_id FROM voters WHERE gmail = ?");
    $stmt2->bind_param("s", $gmail);
    $stmt2->execute();
    $stmt2->store_result();
    $gmailExists = $stmt2->num_rows > 0;
    $stmt2->close();

    if ($nameExists) {
        $_SESSION['error'] = 'A voter with the name "' . $firstname . ' ' . $lastname . '" already exists!';
    } elseif ($gmailExists) {
        $_SESSION['error'] = 'The Gmail "' . $gmail . '" is already registered!';
    } else {
        // Generate sequential voter ID in format YYYY-NNNN
        $currentYear = date('Y');

        // Find the highest number already used this year
        $chk = $conn->prepare(
            "SELECT voters_id FROM voters 
             WHERE voters_id LIKE ? 
             ORDER BY voters_id DESC LIMIT 1"
        );
        $likePattern = $currentYear . '-%';
        $chk->bind_param("s", $likePattern);
        $chk->execute();
        $chk->bind_result($lastId);
        $chk->fetch();
        $chk->close();

        if ($lastId) {
            $lastNum = (int) substr($lastId, 5);
            $nextNum = $lastNum + 1;
        } else {
            $nextNum = 1;
        }

        $voter = $currentYear . '-' . str_pad($nextNum, 4, '0', STR_PAD_LEFT);

        $stmt = $conn->prepare("INSERT INTO voters (voters_id, password, firstname, lastname, year, department, gmail, photo) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $voter, $password, $firstname, $lastname, $year, $department, $gmail, $filename);

        if ($stmt->execute()) {
            $_SESSION['success'] = 'Registered successfully! Your Voter ID is: ' . $voter;
        } else {
            $_SESSION['error'] = 'Database error: ' . $stmt->error;
        }
        $stmt->close();
    }
} else {
    $_SESSION['error'] = 'Please fill up the form first.';
}

header('Location: index.php');
exit();
?>
