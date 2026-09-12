<?php
  session_start();
  include 'includes/conn.php';

  // Fetch all voters grouped by department/course
  $voters_by_dept = array();
  $total_voters_count = 0;
  $sql = "SELECT voters_id, firstname, lastname, year, department FROM voters ORDER BY department ASC, lastname ASC, firstname ASC";
  $query = $conn->query($sql);
  if($query){
    while($row = $query->fetch_assoc()){
      $dept = !empty($row['department']) ? strtoupper(trim($row['department'])) : 'OTHER';
      $voters_by_dept[$dept][] = $row;
      $total_voters_count++;
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voters Directory by Course</title>
  <link rel="icon" type="image/jpeg" href="images/srcs.jpg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="less.css">
  <style>
    body {
      background-color: #f4f6f9;
      min-height: 100vh;
    }
    .navbar {
      background-color: blue !important;
      padding: 6px 16px !important;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
      min-height: auto !important;
      height: auto !important;
    }
    .navbar .container-fluid,
    .navbar .container {
      min-height: auto !important;
      margin-top: 0 !important;
      padding-top: 0 !important;
      padding-bottom: 0 !important;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.4rem;
      color: white !important;
    }
    .navbar-logo {
      height: 35px;
      width: auto;
      border-radius: 50px;
    }
    .dcs-logo {
      height: 30px;
      width: auto;
      border-radius: 50px;
    }
    .main-content {
      padding-top: 80px;
      padding-bottom: 50px;
    }
    .dept-pill {
      cursor: pointer;
      font-weight: 600;
      border-radius: 30px;
      padding: 8px 20px;
      transition: all 0.2s ease;
    }
    .dept-pill.active {
      background-color: #0d6efd !important;
      color: #fff !important;
    }
    .voter-card-header {
      background: linear-gradient(135deg, #0d6efd, #0b5ed7);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img src="images/image.png" alt="Logo" class="navbar-logo me-2"> SRC Online Voting System
    </a>

    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <i class="fa fa-bars text-white"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item me-2">
          <a class="nav-link text-white fw-bold" href="index.php">
            <i class="fa fa-sign-in-alt me-1"></i> SIGN IN
          </a>
        </li>
        <li class="nav-item me-2">
          <a class="nav-link text-white fw-bold active" href="voters.php">
            <i class="fa fa-id-card me-1"></i> VOTERS DIRECTORY
          </a>
        </li>
        <li class="nav-item me-2">
          <a class="nav-link text-white fw-bold" href="totalvotes.php">
            <i class="fa fa-chart-bar me-1"></i> VOTE TALLY
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="https://www.facebook.com/profile.php?id=100092207244275">
            <img src="images/dcs.png" alt="Logo" class="dcs-logo me-1"> Department of Computer Studies
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container main-content">
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
    <div>
      <span class="badge bg-primary px-3 py-2 rounded-pill fs-6 mb-2"><i class="fa fa-users me-1"></i> Registered Directory</span>
      <h2 class="fw-bold text-dark mb-1">List of Voters by Course</h2>
      <p class="text-muted mb-0">Browse all registered voters categorized by department/course and view their Voter IDs.</p>
    </div>
    <div>
      <a href="index.php" class="btn btn-outline-primary rounded-pill px-4 fw-bold">
        <i class="fa fa-arrow-left me-1"></i> Back to Sign In
      </a>
    </div>
  </div>

  <!-- Search & Filter Controls -->
  <div class="card border-0 shadow-sm rounded-4 p-3 mb-4">
    <div class="row g-3 align-items-center">
      <div class="col-md-6">
        <div class="input-group input-group-lg rounded-pill overflow-hidden border">
          <span class="input-group-text bg-white border-0 ps-3"><i class="fa fa-search text-muted"></i></span>
          <input type="text" id="voterSearchInput" class="form-control border-0 fs-6" placeholder="Search voter name, Voter ID, or course..." onkeyup="filterVoters()">
          <button class="btn btn-link text-secondary text-decoration-none pe-3" type="button" onclick="clearVoterSearch()"><i class="fa fa-times-circle"></i></button>
        </div>
      </div>
      <div class="col-md-6">
        <div class="d-flex flex-wrap gap-2 justify-content-md-end justify-content-start" id="courseFilterPills">
          <button type="button" class="btn btn-outline-primary dept-pill active shadow-sm" onclick="filterCourse('ALL', this)">
            ALL COURSES <span class="badge bg-secondary ms-1"><?php echo $total_voters_count; ?></span>
          </button>
          <?php foreach($voters_by_dept as $dept_name => $dept_voters): ?>
            <button type="button" class="btn btn-outline-primary dept-pill shadow-sm" onclick="filterCourse('<?php echo htmlspecialchars($dept_name); ?>', this)">
              <?php echo htmlspecialchars($dept_name); ?> 
              <span class="badge bg-primary ms-1"><?php echo count($dept_voters); ?></span>
            </button>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Voters Directory List per Course -->
  <div class="row g-4" id="votersContainer">
    <?php if(!empty($voters_by_dept)): ?>
      <?php foreach($voters_by_dept as $dept_name => $dept_voters): ?>
        <div class="col-12 course-section-block" data-dept="<?php echo htmlspecialchars($dept_name); ?>">
          <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">
            <div class="card-header voter-card-header text-white d-flex justify-content-between align-items-center py-3 px-4">
              <h5 class="mb-0 fw-bold"><i class="fa fa-graduation-cap me-2"></i><?php echo htmlspecialchars($dept_name); ?> Department</h5>
              <span class="badge bg-light text-primary fs-6 rounded-pill px-3 py-1"><?php echo count($dept_voters); ?> Voters</span>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 voter-table">
                  <thead class="table-light">
                    <tr>
                      <th class="ps-4" style="width: 70px;">#</th>
                      <th style="width: 220px;">Voter ID</th>
                      <th>Student Name</th>
                      <th style="width: 150px;">Year Level</th>
                      <th style="width: 150px;" class="pe-4">Department</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $count = 1; foreach($dept_voters as $v): ?>
                      <tr class="voter-row" 
                          data-name="<?php echo htmlspecialchars(strtolower($v['firstname'].' '.$v['lastname'].' '.$v['lastname'].', '.$v['firstname'])); ?>" 
                          data-voterid="<?php echo htmlspecialchars(strtolower($v['voters_id'])); ?>" 
                          data-dept="<?php echo htmlspecialchars(strtolower($v['department'])); ?>">
                        <td class="ps-4 fw-semibold text-muted"><?php echo $count++; ?></td>
                        <td>
                          <span class="badge bg-dark-subtle text-dark border border-secondary px-3 py-2 font-monospace fs-6 rounded-3">
                            <i class="fa fa-id-badge text-primary me-1"></i><?php echo htmlspecialchars($v['voters_id']); ?>
                          </span>
                        </td>
                        <td class="fw-bold text-dark">
                          <?php echo htmlspecialchars($v['lastname'] . ', ' . $v['firstname']); ?>
                        </td>
                        <td>
                          <span class="badge bg-info-subtle text-info-emphasis px-3 py-1 rounded-pill">
                            <?php echo htmlspecialchars($v['year']); ?> Year
                          </span>
                        </td>
                        <td class="pe-4">
                          <span class="badge bg-secondary-subtle text-secondary-emphasis px-2 py-1">
                            <?php echo htmlspecialchars($v['department']); ?>
                          </span>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col-12 text-center py-5">
        <p class="text-muted fs-5">No registered voters found in the database.</p>
      </div>
    <?php endif; ?>
  </div>

  <!-- No match message -->
  <div id="noResultsMsg" class="text-center py-5 d-none">
    <i class="fa fa-user-slash fs-1 text-muted mb-3 d-block"></i>
    <h4 class="fw-bold text-secondary">No voters found</h4>
    <p class="text-muted">Try adjusting your search keyword or course filter.</p>
  </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
let currentCourseFilter = 'ALL';

function filterCourse(course, btn) {
  currentCourseFilter = course;
  document.querySelectorAll('#courseFilterPills .dept-pill').forEach(p => p.classList.remove('active'));
  btn.classList.add('active');
  filterVoters();
}

function clearVoterSearch() {
  document.getElementById('voterSearchInput').value = '';
  filterVoters();
}

function filterVoters() {
  const query = document.getElementById('voterSearchInput').value.trim().toLowerCase();
  const blocks = document.querySelectorAll('.course-section-block');
  let totalVisibleRows = 0;

  blocks.forEach(block => {
    const dept = block.getAttribute('data-dept');
    const courseMatches = (currentCourseFilter === 'ALL' || currentCourseFilter === dept);
    
    if (!courseMatches) {
      block.style.display = 'none';
      return;
    }

    const rows = block.querySelectorAll('.voter-row');
    let visibleRowsInBlock = 0;

    rows.forEach(row => {
      const name = row.getAttribute('data-name') || '';
      const voterId = row.getAttribute('data-voterid') || '';
      const deptAttr = row.getAttribute('data-dept') || '';

      const matchesSearch = !query || name.includes(query) || voterId.includes(query) || deptAttr.includes(query);

      if (matchesSearch) {
        row.style.display = '';
        visibleRowsInBlock++;
        totalVisibleRows++;
      } else {
        row.style.display = 'none';
      }
    });

    if (visibleRowsInBlock > 0) {
      block.style.display = '';
    } else {
      block.style.display = 'none';
    }
  });

  const noResults = document.getElementById('noResultsMsg');
  if (totalVisibleRows === 0) {
    noResults.classList.remove('d-none');
  } else {
    noResults.classList.add('d-none');
  }
}
</script>

</body>
</html>
