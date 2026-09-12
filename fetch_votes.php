<?php
header('Content-Type: application/json');
include 'includes/conn.php';

try {
    // 1. Overview Statistics
    $total_voters = 0;
    $voters_res = $conn->query("SELECT COUNT(*) as total FROM voters");
    if ($voters_res) {
        $total_voters = (int)$voters_res->fetch_assoc()['total'];
    }

    $voted_count = 0;
    $voted_res = $conn->query("SELECT COUNT(DISTINCT voters_id) as total FROM votes");
    if ($voted_res) {
        $voted_count = (int)$voted_res->fetch_assoc()['total'];
    }

    $total_votes_cast = 0;
    $votes_cast_res = $conn->query("SELECT COUNT(*) as total FROM votes");
    if ($votes_cast_res) {
        $total_votes_cast = (int)$votes_cast_res->fetch_assoc()['total'];
    }

    $turnout_pct = ($total_voters > 0) ? round(($voted_count / $total_voters) * 100, 1) : 0;

    // 2. Positions and Candidate Votes
    $positions = [];
    $pos_sql = "SELECT * FROM positions ORDER BY priority ASC";
    $pos_res = $conn->query($pos_sql);

    if ($pos_res) {
        while ($pos = $pos_res->fetch_assoc()) {
            $pos_id = (int)$pos['id'];
            
            // Get candidates for this position with their vote counts
            $cand_sql = "SELECT c.id, c.position_id, c.firstname, c.lastname, c.photo, 
                                COUNT(v.id) AS vote_count
                         FROM candidates c
                         LEFT JOIN votes v ON v.candidate_id = c.id
                         WHERE c.position_id = ?
                         GROUP BY c.id
                         ORDER BY vote_count DESC, c.lastname ASC";
            
            $stmt = $conn->prepare($cand_sql);
            $stmt->bind_param("i", $pos_id);
            $stmt->execute();
            $cand_res = $stmt->get_result();

            $candidates = [];
            $pos_total_votes = 0;
            $max_votes_in_pos = -1;

            while ($cand = $cand_res->fetch_assoc()) {
                $votes = (int)$cand['vote_count'];
                $pos_total_votes += $votes;
                if ($votes > $max_votes_in_pos) {
                    $max_votes_in_pos = $votes;
                }

                $candidates[] = [
                    'id' => (int)$cand['id'],
                    'firstname' => $cand['firstname'],
                    'lastname' => $cand['lastname'],
                    'name' => $cand['lastname'] . ', ' . $cand['firstname'],
                    'photo' => !empty($cand['photo']) ? 'images/' . $cand['photo'] : 'images/profile.jpg',
                    'votes' => $votes,
                    'is_leader' => false
                ];
            }
            $stmt->close();

            // Calculate percentages and mark leader(s)
            foreach ($candidates as &$c) {
                $c['percentage'] = ($pos_total_votes > 0) ? round(($c['votes'] / $pos_total_votes) * 100, 1) : 0;
                if ($c['votes'] > 0 && $c['votes'] === $max_votes_in_pos) {
                    $c['is_leader'] = true;
                }
            }
            unset($c);

            $positions[] = [
                'id' => $pos_id,
                'description' => $pos['description'],
                'priority' => (int)$pos['priority'],
                'max_vote' => (int)$pos['max_vote'],
                'total_votes' => $pos_total_votes,
                'candidates' => $candidates
            ];
        }
    }

    echo json_encode([
        'success' => true,
        'timestamp' => date('h:i:s A'),
        'stats' => [
            'total_voters' => $total_voters,
            'voted_count' => $voted_count,
            'turnout_percentage' => $turnout_pct,
            'total_votes_cast' => $total_votes_cast,
            'total_positions' => count($positions)
        ],
        'positions' => $positions
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
