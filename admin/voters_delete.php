<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = (int)$_POST['id'];
		$stmt = $conn->prepare("DELETE FROM voters WHERE id = ?");
		$stmt->bind_param("i", $id);
		if($stmt->execute()){
			$_SESSION['success'] = 'Voter deleted successfully';
		}
		else{
			$_SESSION['error'] = $stmt->error;
		}
		$stmt->close();
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: voters.php');
	exit();
?>