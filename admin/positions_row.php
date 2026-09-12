<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = (int)$_POST['id'];
		$stmt = $conn->prepare("SELECT * FROM positions WHERE id = ?");
		$stmt->bind_param("i", $id);
		$stmt->execute();
		$row = $stmt->get_result()->fetch_assoc();
		$stmt->close();

		echo json_encode($row);
	}
?>