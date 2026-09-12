<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Real-Time Vote Tally | SRC Voting System</title>
  <link rel="icon" type="image/jpeg" href="images/srcs.jpg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="less.css">
  <style>
    :root {
      --primary-color: #474adb;
      --primary-hover: #0b0ec4;
      --bg-color: #f0f2f5;
    }
    body {
      background-color: var(--bg-color);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      color: #333;
    }
    .navbar {
      background-color: blue !important;
      padding: 8px 16px !important;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }
    .navbar .container-fluid, .navbar .container {
      min-height: auto !important;
      margin-top: 0 !important;
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 1.35rem;
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
    .main-container {
      padding-top: 85px;
      padding-bottom: 60px;
    }
    .hero-header {
      background: linear-gradient(135deg, #474adb, #2a2dbb);
      color: white;
      border-radius: 20px;
      padding: 30px;
      margin-bottom: 25px;
      box-shadow: 0 10px 25px rgba(71, 74, 219, 0.25);
    }
    .live-indicator {
      display: inline-flex;
      align-items: center;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(5px);
      padding: 6px 14px;
      border-radius: 30px;
      font-size: 0.85rem;
      font-weight: 700;
      letter-spacing: 0.5px;
    }
    .pulse-dot {
      width: 10px;
      height: 10px;
      background-color: #2ecc71;
      border-radius: 50%;
      display: inline-block;
      margin-right: 8px;
      box-shadow: 0 0 0 0 rgba(46, 204, 113, 0.7);
      animation: pulse 1.5s infinite;
    }
    @keyframes pulse {
      0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(46, 204, 113, 0.7);
      }
      70% {
        transform: scale(1);
        box-shadow: 0 0 0 10px rgba(46, 204, 113, 0);
      }
      100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(46, 204, 113, 0);
      }
    }
    .kpi-card {
      background: white;
      border: none;
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      height: 100%;
    }
    .kpi-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }
    .kpi-icon {
      width: 48px;
      height: 48px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.4rem;
      margin-bottom: 12px;
    }
    .kpi-val {
      font-size: 2rem;
      font-weight: 800;
      color: #1a1a2e;
      line-height: 1.1;
    }
    .kpi-label {
      font-size: 0.85rem;
      color: #6c757d;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .chart-card {
      background: white;
      border: none;
      border-radius: 18px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
      overflow: hidden;
      margin-bottom: 24px;
      transition: box-shadow 0.2s ease;
    }
    .chart-card:hover {
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    }
    .chart-card-header {
      background: linear-gradient(135deg, #474adb, #373ad6);
      color: white;
      padding: 16px 22px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .chart-body {
      padding: 20px;
    }
    .chart-wrapper {
      position: relative;
      height: 270px;
      width: 100%;
    }
    .candidate-photo {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #e2e8f0;
    }
    .candidate-row {
      padding: 10px 14px;
      border-radius: 12px;
      transition: background-color 0.15s ease;
    }
    .candidate-row:hover {
      background-color: #f8fafc;
    }
    .leader-badge {
      background: linear-gradient(135deg, #f59e0b, #d97706);
      color: white;
      font-size: 0.75rem;
      padding: 3px 8px;
      border-radius: 20px;
      font-weight: 700;
    }
    .view-toggle-btn {
      border-radius: 30px;
      padding: 6px 16px;
      font-weight: 600;
      font-size: 0.85rem;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
</head>
<body>

<!-- Top Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
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
          <a class="nav-link text-white fw-bold" href="voters.php">
            <i class="fa fa-id-card me-1"></i> VOTERS DIRECTORY
          </a>
        </li>
        <li class="nav-item me-2">
          <a class="nav-link text-white fw-bold active" href="totalvotes.php">
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

<div class="container main-container">
  <!-- Hero Banner -->
  <div class="hero-header d-flex flex-wrap justify-content-between align-items-center gap-3">
    <div>
      <div class="d-flex align-items-center gap-2 mb-2">
        <span class="live-indicator">
          <span class="pulse-dot"></span> LIVE REAL-TIME TALLY
        </span>
        <span class="text-white-50 fs-6" id="lastUpdatedText">Connecting...</span>
      </div>
      <h1 class="display-6 fw-bold mb-1 text-white">Supreme Student Council Election</h1>
      <p class="text-white-50 mb-0">Official live tally of votes recorded in real-time across all positions.</p>
    </div>
    <div class="d-flex gap-2 align-items-center">
      <button class="btn btn-light rounded-pill px-3 fw-bold shadow-sm" onclick="fetchLiveVotes()" id="btnManualRefresh">
        <i class="fa fa-sync-alt me-1" id="refreshIcon"></i> Refresh Now
      </button>
      <a href="index.php" class="btn btn-outline-light rounded-pill px-3 fw-bold">
        <i class="fa fa-arrow-left me-1"></i> Return
      </a>
    </div>
  </div>

  <!-- KPI Cards -->
  <div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
      <div class="kpi-card">
        <div class="kpi-icon bg-primary-subtle text-primary">
          <i class="fa fa-users"></i>
        </div>
        <div class="kpi-val" id="statTotalVoters">--</div>
        <div class="kpi-label">Registered Voters</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="kpi-card">
        <div class="kpi-icon bg-success-subtle text-success">
          <i class="fa fa-vote-yea"></i>
        </div>
        <div class="kpi-val" id="statVotedCount">--</div>
        <div class="kpi-label">Ballots Cast</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="kpi-card">
        <div class="kpi-icon bg-info-subtle text-info">
          <i class="fa fa-percentage"></i>
        </div>
        <div class="kpi-val" id="statTurnout">--%</div>
        <div class="kpi-label">Voter Turnout</div>
      </div>
    </div>
    <div class="col-6 col-md-3">
      <div class="kpi-card">
        <div class="kpi-icon bg-warning-subtle text-warning">
          <i class="fa fa-award"></i>
        </div>
        <div class="kpi-val" id="statPositions">--</div>
        <div class="kpi-label">Positions</div>
      </div>
    </div>
  </div>

  <!-- Filter & View Mode Controls -->
  <div class="card border-0 shadow-sm rounded-4 p-3 mb-4 bg-white">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
      <div class="d-flex align-items-center gap-2">
        <span class="fw-bold text-secondary fs-6"><i class="fa fa-sliders-h me-1"></i> View Mode:</span>
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-primary view-toggle-btn active" id="btnViewChart" onclick="setViewMode('charts')">
            <i class="fa fa-chart-bar me-1"></i> Charts
          </button>
          <button type="button" class="btn btn-outline-primary view-toggle-btn" id="btnViewDetails" onclick="setViewMode('details')">
            <i class="fa fa-list-ol me-1"></i> Leaderboard
          </button>
        </div>
      </div>

      <div class="d-flex align-items-center gap-3">
        <div class="form-check form-switch mb-0">
          <input class="form-check-input" type="checkbox" id="autoRefreshToggle" checked onchange="toggleAutoRefresh(this.checked)">
          <label class="form-check-label fw-semibold text-secondary" for="autoRefreshToggle">Auto-Refresh (2s)</label>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts & Positions Grid Container -->
  <div class="row g-4" id="chartsContainer">
    <div class="col-12 text-center py-5">
      <div class="spinner-border text-primary" role="status"></div>
      <p class="text-muted mt-3 fs-5">Loading live election tallies...</p>
    </div>
  </div>

  <!-- Return Link -->
  <div class="text-center mt-4">
    <a href="index.php" class="btn btn-outline-secondary rounded-pill px-4 fw-bold">
      <i class="fa fa-home me-1"></i> Return to Homepage
    </a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
let chartsInstances = {};
let liveDataCache = null;
let currentViewMode = 'charts';
let autoRefreshTimer = null;
const REFRESH_INTERVAL = 2500; // 2.5 seconds

// Chart Color Palette
const chartColors = [
  'rgba(71, 74, 219, 0.85)',
  'rgba(59, 130, 246, 0.85)',
  'rgba(16, 185, 129, 0.85)',
  'rgba(245, 158, 11, 0.85)',
  'rgba(239, 68, 68, 0.85)',
  'rgba(139, 92, 246, 0.85)',
  'rgba(236, 72, 153, 0.85)'
];

function setViewMode(mode) {
  currentViewMode = mode;
  document.getElementById('btnViewChart').classList.toggle('btn-primary', mode === 'charts');
  document.getElementById('btnViewChart').classList.toggle('btn-outline-primary', mode !== 'charts');
  document.getElementById('btnViewDetails').classList.toggle('btn-primary', mode === 'details');
  document.getElementById('btnViewDetails').classList.toggle('btn-outline-primary', mode !== 'details');

  if (liveDataCache) {
    renderUI(liveDataCache);
  }
}

function toggleAutoRefresh(enabled) {
  clearInterval(autoRefreshTimer);
  if (enabled) {
    autoRefreshTimer = setInterval(fetchLiveVotes, REFRESH_INTERVAL);
  }
}

async function fetchLiveVotes() {
  const refreshIcon = document.getElementById('refreshIcon');
  if (refreshIcon) refreshIcon.classList.add('fa-spin');

  try {
    const response = await fetch('fetch_votes.php?t=' + Date.now());
    const data = await response.json();

    if (data.success) {
      liveDataCache = data;
      updateStats(data.stats, data.timestamp);
      renderUI(data);
    }
  } catch (err) {
    console.error('Error fetching live votes:', err);
  } finally {
    if (refreshIcon) {
      setTimeout(() => refreshIcon.classList.remove('fa-spin'), 400);
    }
  }
}

function updateStats(stats, timestamp) {
  if (!stats) return;
  document.getElementById('statTotalVoters').textContent = Number(stats.total_voters).toLocaleString();
  document.getElementById('statVotedCount').textContent = Number(stats.voted_count).toLocaleString();
  document.getElementById('statTurnout').textContent = stats.turnout_percentage + '%';
  document.getElementById('statPositions').textContent = stats.total_positions;
  document.getElementById('lastUpdatedText').textContent = 'Last synced at ' + timestamp;
}

function renderUI(data) {
  const container = document.getElementById('chartsContainer');
  if (!data.positions || data.positions.length === 0) {
    container.innerHTML = '<div class="col-12 text-center py-5"><p class="text-muted">No positions configured.</p></div>';
    return;
  }

  if (currentViewMode === 'charts') {
    renderChartsView(container, data.positions);
  } else {
    renderLeaderboardView(container, data.positions);
  }
}

function renderChartsView(container, positions) {
  // Check if grid structure already exists to avoid recreating canvases
  let structureExists = document.querySelectorAll('.position-chart-card').length === positions.length;

  if (!structureExists) {
    // Destroy previous charts
    Object.keys(chartsInstances).forEach(id => {
      if (chartsInstances[id]) chartsInstances[id].destroy();
    });
    chartsInstances = {};

    let html = '';
    positions.forEach(pos => {
      html += `
        <div class="col-md-6 position-chart-card" id="pos_card_${pos.id}">
          <div class="chart-card">
            <div class="chart-card-header">
              <h5 class="mb-0 fw-bold"><i class="fa fa-award me-2"></i>${escapeHtml(pos.description)}</h5>
              <span class="badge bg-light text-primary rounded-pill px-3 py-1 fs-6 font-monospace" id="pos_total_${pos.id}">
                ${pos.total_votes} Votes
              </span>
            </div>
            <div class="chart-body">
              <div class="chart-wrapper">
                <canvas id="chart_${pos.id}"></canvas>
              </div>
            </div>
          </div>
        </div>
      `;
    });
    container.innerHTML = html;

    // Initialize Chart.js instances
    positions.forEach(pos => {
      initChart(pos);
    });
  } else {
    // Update existing charts reactively without recreating
    positions.forEach(pos => {
      const totalBadge = document.getElementById(`pos_total_${pos.id}`);
      if (totalBadge) totalBadge.textContent = `${pos.total_votes} Votes`;

      const chart = chartsInstances[pos.id];
      if (chart) {
        chart.data.labels = pos.candidates.map(c => c.name);
        chart.data.datasets[0].data = pos.candidates.map(c => c.votes);
        chart.update('active');
      } else {
        initChart(pos);
      }
    });
  }
}

function initChart(pos) {
  const canvas = document.getElementById(`chart_${pos.id}`);
  if (!canvas) return;
  const ctx = canvas.getContext('2d');

  const labels = pos.candidates.map(c => c.name);
  const dataVotes = pos.candidates.map(c => c.votes);

  chartsInstances[pos.id] = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Votes',
        data: dataVotes,
        backgroundColor: chartColors.slice(0, labels.length),
        borderRadius: 8,
        borderSkipped: false,
        barPercentage: 0.65,
        categoryPercentage: 0.8
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      animation: {
        duration: 400
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            precision: 0,
            color: '#64748b'
          },
          grid: {
            color: '#f1f5f9'
          }
        },
        x: {
          ticks: {
            color: '#334155',
            font: {
              weight: 'bold'
            }
          },
          grid: {
            display: false
          }
        }
      },
      plugins: {
        legend: {
          display: false
        },
        datalabels: {
          anchor: 'end',
          align: 'top',
          color: '#1e293b',
          font: {
            weight: 'bold',
            size: 12
          },
          formatter: (val) => val > 0 ? val : '0'
        },
        tooltip: {
          backgroundColor: '#1e293b',
          padding: 10,
          cornerRadius: 8,
          callbacks: {
            label: function(ctx) {
              const total = pos.total_votes;
              const pct = total > 0 ? ((ctx.parsed.y / total) * 100).toFixed(1) : '0';
              return ` ${ctx.parsed.y} votes (${pct}%)`;
            }
          }
        }
      }
    },
    plugins: [ChartDataLabels]
  });
}

function renderLeaderboardView(container, positions) {
  // Destroy canvas charts when in leaderboard mode
  Object.keys(chartsInstances).forEach(id => {
    if (chartsInstances[id]) chartsInstances[id].destroy();
  });
  chartsInstances = {};

  let html = '';
  positions.forEach(pos => {
    html += `
      <div class="col-md-6">
        <div class="chart-card">
          <div class="chart-card-header">
            <h5 class="mb-0 fw-bold"><i class="fa fa-award me-2"></i>${escapeHtml(pos.description)}</h5>
            <span class="badge bg-light text-primary rounded-pill px-3 py-1 fs-6 font-monospace">
              ${pos.total_votes} Votes Total
            </span>
          </div>
          <div class="chart-body p-3">
            <div class="d-flex flex-column gap-2">
              ${pos.candidates.map((c, index) => `
                <div class="candidate-row d-flex align-items-center justify-content-between border-bottom pb-2">
                  <div class="d-flex align-items-center gap-3">
                    <span class="fw-bold fs-6 text-muted" style="width: 20px;">#${index + 1}</span>
                    <img src="${escapeHtml(c.photo)}" alt="Candidate" class="candidate-photo shadow-sm">
                    <div>
                      <div class="fw-bold text-dark fs-6 d-flex align-items-center gap-2">
                        ${escapeHtml(c.name)}
                        ${c.is_leader ? '<span class="leader-badge"><i class="fa fa-crown me-1"></i>LEADER</span>' : ''}
                      </div>
                      <small class="text-muted">${c.percentage}% of total votes</small>
                    </div>
                  </div>
                  <div class="text-end">
                    <span class="fs-5 fw-extrabold text-primary font-monospace">${c.votes}</span>
                    <span class="text-muted d-block small">votes</span>
                  </div>
                </div>
              `).join('')}
            </div>
          </div>
        </div>
      </div>
    `;
  });
  container.innerHTML = html;
}

function escapeHtml(text) {
  if (!text) return '';
  return text.replace(/[&<>"']/g, function(m) {
    return {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#039;'
    }[m];
  });
}

// Initial fetch and start interval
fetchLiveVotes();
autoRefreshTimer = setInterval(fetchLiveVotes, REFRESH_INTERVAL);

window.addEventListener('beforeunload', () => {
  clearInterval(autoRefreshTimer);
});
</script>
</body>
</html>
