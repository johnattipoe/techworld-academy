<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- MAINTENANCE.PHP -->

<!-- Page Hero Section -->
<section class="bg-warning text-white py-5" data-aos="fade-down">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8 mx-auto text-center">
          <h1 class="display-4 fw-bold mb-3">Maintenance</h1>
          <p class="lead mb-4">Our technical team is currently performing maintenance on our systems. We apologize for any inconvenience this may cause.</p>
        </div>
      </div>
    </div>
</section>

<section class="py-5 bg-light" aria-labelledby="maintenance-status-title">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body p-4 p-lg-5">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
              <div>
                <span class="badge bg-warning text-dark mb-2">Live system update</span>
                <h2 id="maintenance-status-title" class="h3 mb-1">We are making things better</h2>
                <p class="text-muted mb-0">Our team is working through scheduled platform improvements.</p>
              </div>
              <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">
                <i class="bi bi-check-circle-fill me-1"></i> Systems protected
              </span>
            </div>

            <div class="mb-4">
              <div class="d-flex justify-content-between mb-2">
                <span class="fw-semibold">Maintenance progress</span>
                <span class="text-muted">65%</span>
              </div>
              <div class="progress" role="progressbar" aria-label="Maintenance progress" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="height: 10px;">
                <div class="progress-bar bg-success" style="width: 65%"></div>
              </div>
            </div>

            <div class="row g-3 mb-4">
              <div class="col-md-4">
                <div class="border rounded p-3 h-100">
                  <i class="bi bi-database-check text-success fs-4"></i>
                  <h3 class="h6 mt-2 mb-1">Data services</h3>
                  <span class="small text-success">Operational</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="border rounded p-3 h-100">
                  <i class="bi bi-mortarboard text-warning fs-4"></i>
                  <h3 class="h6 mt-2 mb-1">Learning portal</h3>
                  <span class="small text-warning">Being updated</span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="border rounded p-3 h-100">
                  <i class="bi bi-credit-card text-success fs-4"></i>
                  <h3 class="h6 mt-2 mb-1">Payments</h3>
                  <span class="small text-success">Operational</span>
                </div>
              </div>
            </div>

            <div class="d-flex flex-wrap gap-2">
              <button type="button" class="btn btn-primary" id="refreshStatus">
                <i class="bi bi-arrow-clockwise me-1"></i> Refresh status
              </button>
              <a href="/index/index.php" class="btn btn-outline-secondary">
                <i class="bi bi-house me-1"></i> Return home
              </a>
              <a href="/contact/contact.php" class="btn btn-outline-secondary">
                <i class="bi bi-envelope me-1"></i> Contact support
              </a>
            </div>
            <p class="small text-muted mt-3 mb-0">Last checked: <time id="lastChecked">just now</time></p>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-body p-4">
            <h2 class="h5 mb-3"><i class="bi bi-list-check text-primary me-2"></i>Update checklist</h2>
            <ul class="list-group list-group-flush">
              <li class="list-group-item px-0 d-flex justify-content-between">Backups completed <i class="bi bi-check-circle-fill text-success"></i></li>
              <li class="list-group-item px-0 d-flex justify-content-between">Security checks <i class="bi bi-check-circle-fill text-success"></i></li>
              <li class="list-group-item px-0 d-flex justify-content-between">Portal deployment <i class="bi bi-arrow-repeat text-warning"></i></li>
              <li class="list-group-item px-0 d-flex justify-content-between">Final verification <i class="bi bi-hourglass-split text-muted"></i></li>
            </ul>
            <div class="alert alert-info mt-4 mb-0 small">
              <i class="bi bi-info-circle me-1"></i>
              Your account and course progress remain preserved while maintenance is in progress.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const refreshButton = document.getElementById('refreshStatus');
    const lastChecked = document.getElementById('lastChecked');

    if (refreshButton) {
      refreshButton.addEventListener('click', function () {
        refreshButton.disabled = true;
        refreshButton.innerHTML = '<span class="spinner-border spinner-border-sm me-1" aria-hidden="true"></span> Refreshing...';
        window.setTimeout(function () {
          window.location.reload();
        }, 400);
      });
    }

    if (lastChecked) {
      lastChecked.textContent = new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
    }
  });
</script>

<?php include(__DIR__ . '/../../../includes/footer/footer.php'); ?>

