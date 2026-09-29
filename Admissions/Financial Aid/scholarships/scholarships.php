<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>


<!-- SCHOLARSHIPS PAGE -->

<!-- Hero Section -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
    <div class="container text-center">
        <h1 class="fw-bold mb-3">Scholarships</h1>
        <p class="lead">Learn more about our scholarships and support programs.</p>
    </div>
</section>

<!-- Scholarships Section -->
<section class="py-5">
  <div class="container">
    <h1 class="fw-bold text-success mb-4">Scholarships</h1>
    <p class="lead">TecWorld Academy offers a variety of scholarships to support students financially and reward excellence.</p>

    <div class="row g-4 mt-4">
      <div class="col-md-6">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <h5 class="fw-bold text-primary">Merit-Based Scholarship</h5>
            <p>Available for students with outstanding academic performance. Covers up to 50% of tuition fees.</p>
          </div>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body">
            <h5 class="fw-bold text-primary">Need-Based Scholarship</h5>
            <p>Supports students from low-income backgrounds. Covers partial tuition and selected fees.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="mt-4">
      <a href="../../apply-now.php" class="btn btn-success btn-lg shadow">Apply for Scholarship</a>
    </div>
  </div>
</section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
 ?>
