<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	if(isset($_POST['vote'])){
		if(count($_POST) == 1){
			$_SESSION['error'][] = 'Please vote at least one candidate';
		}
		else{
			$_SESSION['post'] = $_POST;
			$sql = "SELECT * FROM positions";
			$query = $conn->query($sql);
			$error = false;
			$votes_to_insert = array();
			$voter_db_id = (int)$voter['id'];

			while($row = $query->fetch_assoc()){
				$position = slugify($row['description']);
				$pos_id = (int)$row['id'];
				if(isset($_POST[$position])){
					if($row['max_vote'] > 1){
						if(count($_POST[$position]) > $row['max_vote']){
							$error = true;
							$_SESSION['error'][] = 'You can only choose '.$row['max_vote'].' candidates for '.$row['description'];
						}
						else{
							foreach($_POST[$position] as $key => $values){
								$votes_to_insert[] = array('cand_id' => (int)$values, 'pos_id' => $pos_id);
							}
						}
					}
					else{
						$candidate = (int)$_POST[$position];
						$votes_to_insert[] = array('cand_id' => $candidate, 'pos_id' => $pos_id);
					}
				}
			}

			if(!$error){
				$stmt = $conn->prepare("INSERT INTO votes (voters_id, candidate_id, position_id) VALUES (?, ?, ?)");
				foreach($votes_to_insert as $v_item){
					$cand_id = $v_item['cand_id'];
					$pos_id  = $v_item['pos_id'];
					$stmt->bind_param("iii", $voter_db_id, $cand_id, $pos_id);
					$stmt->execute();
				}
				$stmt->close();

				unset($_SESSION['post']);
				$_SESSION['success'] = 'Ballot Submitted';
			}
		}
	}
	else{
		$_SESSION['error'][] = 'Select candidates to vote first';
	}

	header('location: home.php');
	exit();
?>