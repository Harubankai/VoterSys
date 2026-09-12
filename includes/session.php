<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['voter'])){
		$voter_id = (int)$_SESSION['voter'];
		$stmt = $conn->prepare("SELECT * FROM voters WHERE id = ?");
		$stmt->bind_param("i", $voter_id);
		$stmt->execute();
		$query = $stmt->get_result();
		$voter = $query->fetch_assoc();
		$stmt->close();
	}
	else{
		header('location: index.php');
		exit();
	}
?>