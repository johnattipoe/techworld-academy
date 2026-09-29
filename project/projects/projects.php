<?php
session_start();
include(__DIR__ . '/../../includes/lang/lang.php');
include(__DIR__ . '/../../includes/header/header.php');
include(__DIR__ . '/../../includes/navbar/navbar.php');
include(__DIR__ . '/../../includes/sidebar/sidebar.php');
?>

<!-- Student Projects Page -->
<div class="container mt-5 mb-5">
  <div class="text-center mb-5">
    <h1 class="fw-bold">Student Projects</h1>
    <p class="lead text-muted">
      Explore outstanding projects built by TecWorld Academy students across different disciplines.
    </p>
  </div>

  <!-- Filters Section -->
  <div class="text-center mb-4">
    <button class="btn btn-outline-primary btn-sm mx-1">All</button>
    <button class="btn btn-outline-success btn-sm mx-1">Data Science</button>
    <button class="btn btn-outline-info btn-sm mx-1">Mobile Development</button>
    <button class="btn btn-outline-warning btn-sm mx-1">UI/UX Design</button>
    <button class="btn btn-outline-danger btn-sm mx-1">Cybersecurity</button>
    <button class="btn btn-outline-secondary btn-sm mx-1">Web Development</button>
  </div>

  <!-- Projects Grid -->
  <div class="row g-4">
    <!-- Project 1 -->
    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <img src="../assets/images/project1.jpg" class="card-img-top" alt="E-Commerce Platform">
        <div class="card-body">
          <span class="badge bg-primary mb-2">Web Development</span>
          <h5 class="card-title">E-Commerce Platform</h5>
          <p class="card-text small">An online marketplace with payment gateway, cart system, and admin panel.</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">By Kofi Mensah</small>
            <div>
              <a href="#" class="text-primary me-2"><i class="bi bi-github"></i></a>
              <a href="#" class="text-primary"><i class="bi bi-box-arrow-up-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Project 2 -->
    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <img src="../assets/images/project2.jpg" class="card-img-top" alt="Sales Dashboard">
        <div class="card-body">
          <span class="badge bg-success mb-2">Data Science</span>
          <h5 class="card-title">Sales Prediction Dashboard</h5>
          <p class="card-text small">A forecasting tool using ML to predict and visualize future sales trends.</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">By Ama Darko</small>
            <div>
              <a href="#" class="text-primary me-2"><i class="bi bi-github"></i></a>
              <a href="#" class="text-primary"><i class="bi bi-box-arrow-up-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Project 3 -->
    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <img src="../assets/images/project3.jpg" class="card-img-top" alt="Fitness Tracking App">
        <div class="card-body">
          <span class="badge bg-info mb-2">Mobile Development</span>
          <h5 class="card-title">Fitness Tracking App</h5>
          <p class="card-text small">Cross-platform fitness app with GPS, goal tracking, and health monitoring.</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">By Yaw Boateng</small>
            <div>
              <a href="#" class="text-primary me-2"><i class="bi bi-github"></i></a>
              <a href="#" class="text-primary"><i class="bi bi-box-arrow-up-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Project 4 -->
    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <img src="../assets/images/project4.jpg" class="card-img-top" alt="Cybersecurity Tool">
        <div class="card-body">
          <span class="badge bg-danger mb-2">Cybersecurity</span>
          <h5 class="card-title">Network Vulnerability Scanner</h5>
          <p class="card-text small">A custom-built tool that scans and reports system vulnerabilities securely.</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">By Akua Ofori</small>
            <div>
              <a href="#" class="text-primary me-2"><i class="bi bi-github"></i></a>
              <a href="#" class="text-primary"><i class="bi bi-box-arrow-up-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Project 5 -->
    <div class="col-lg-4 col-md-6">
      <div class="card border-0 shadow-sm h-100">
        <img src="../assets/images/project5.jpg" class="card-img-top" alt="UI UX App">
        <div class="card-body">
          <span class="badge bg-warning text-dark mb-2">UI/UX Design</span>
          <h5 class="card-title">Smart Home Control Interface</h5>
          <p class="card-text small">A beautifully designed dashboard for controlling smart home devices.</p>
          <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">By Nana Adjei</small>
            <div>
              <a href="#" class="text-primary me-2"><i class="bi bi-dribbble"></i></a>
              <a href="#" class="text-primary"><i class="bi bi-box-arrow-up-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php
include(__DIR__ . '/../../Modals/modals/modals.php');
include(__DIR__ . '/../../includes/footer/footer.php');
?>
