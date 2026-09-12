<?php
	include 'includes/session.php';
	include 'includes/slugify.php';

	$output = array('error'=>false,'list'=>'');

	$sql = "SELECT * FROM positions";
	$query = $conn->query($sql);

	while($row = $query->fetch_assoc()){
		$position = slugify($row['description']);
		$pos_id = (int)$row['id'];
		if(isset($_POST[$position])){
			if($row['max_vote'] > 1){
				if(count($_POST[$position]) > $row['max_vote']){
					$output['error'] = true;
					$output['message'][] = '<li>You can only choose '.$row['max_vote'].' candidates for '.$row['description'].'</li>';
				}
				else{
					foreach($_POST[$position] as $key => $values){
						$cand_id = (int)$values;
						$stmt = $conn->prepare("SELECT * FROM candidates WHERE id = ?");
						$stmt->bind_param("i", $cand_id);
						$stmt->execute();
						$cmquery = $stmt->get_result();
						if($cmrow = $cmquery->fetch_assoc()){
							$output['list'] .= "
								<div class='row votelist'>
			                      	<span><span><b>".htmlspecialchars($row['description'])." :</b></span></span> 
			                      	<span>".htmlspecialchars($cmrow['firstname'])." ".htmlspecialchars($cmrow['lastname'])."</span>
			                    </div>
							";
						}
						$stmt->close();
					}
				}
			}
			else{
				$candidate = (int)$_POST[$position];
				$stmt = $conn->prepare("SELECT * FROM candidates WHERE id = ?");
				$stmt->bind_param("i", $candidate);
				$stmt->execute();
				$csquery = $stmt->get_result();
				if($csrow = $csquery->fetch_assoc()){
					$output['list'] .= "
						<div class='row votelist'>
	                      	<span ><span ><b>".htmlspecialchars($row['description'])." :</b></span></span> 
	                      	<span>".htmlspecialchars($csrow['firstname'])." ".htmlspecialchars($csrow['lastname'])."</span>
	                    </div>
					";
				}
				$stmt->close();
			}
		}
	}

	echo json_encode($output);
?>