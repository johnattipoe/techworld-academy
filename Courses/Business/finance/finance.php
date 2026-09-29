<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<!-- FINANCIAL MANAGEMENT.PHP -->

<!-- Hero Section -->
<section class="bg-dark text-white py-5" style="background: linear-gradient(135deg, #283c86 0%, #45a247 100%);" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-dark mb-3 shadow-sm">Business Studies</div>
        <h1 class="display-4 fw-bold mb-3">Financial Management</h1>
        <p class="lead mb-4">Learn how to analyze, plan, and control financial resources to ensure business growth and sustainability.</p>
        <div class="d-flex gap-3">
          <a href="/Admissions/General/admissions/admissions.php?course=finance" class="btn btn-success btn-lg px-4 shadow">Enroll Now - GH₵ 1800</a>
          <a href="#curriculum" class="btn btn-outline-light btn-lg px-4">View Curriculum</a>
        </div>
      </div>
      <div class="col-lg-6 text-center">
        <img src="/assets/project/sale prediction.jpeg" alt="Financial Management" class="img-fluid rounded shadow-lg border border-3 border-light">
      </div>
    </div>
  </div>
</section>

<!-- Overview -->
<section class="py-5 bg-light text-dark" data-aos="fade-up">
  <div class="container text-center">
    <h2 class="fw-bold">Course Overview</h2>
    <p class="lead">Gain insights into corporate finance, investment analysis, risk management, and budgeting practices to enhance financial decision-making.</p>
  </div>
</section>

<!-- Curriculum -->
<section id="curriculum" class="py-5" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold text-center mb-5">Curriculum Highlights</h2>
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card shadow-sm h-100"><div class="card-body">
          <h5 class="card-title">Module 1: Financial Principles</h5>
          <p>Understand core concepts like cash flow, balance sheets, and income statements.</p>
        </div></div>
      </div>
      <div class="col-md-6">
        <div class="card shadow-sm h-100"><div class="card-body">
          <h5 class="card-title">Module 2: Budgeting & Forecasting</h5>
          <p>Learn effective methods for business planning and resource allocation.</p>
        </div></div>
      </div>
      <div class="col-md-6">
        <div class="card shadow-sm h-100"><div class="card-body">
          <h5 class="card-title">Module 3: Corporate Finance</h5>
          <p>Explore capital structure, investments, and dividend policies.</p>
        </div></div>
      </div>
      <div class="col-md-6">
        <div class="card shadow-sm h-100"><div class="card-body">
          <h5 class="card-title">Module 4: Risk & Portfolio Management</h5>
          <p>Develop strategies to mitigate financial risks and maximize returns.</p>
        </div></div>
      </div>
    </div>
  </div>
</section>

<!-- Benefits -->
<section class="py-5 bg-success text-white text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-4">Why Study Financial Management?</h2>
    <div class="row g-4">
      <div class="col-md-4"><i class="bi bi-cash-coin display-5"></i><h5 class="mt-3">Financial Control</h5><p>Learn to manage and grow financial resources.</p></div>
      <div class="col-md-4"><i class="bi bi-graph-up display-5"></i><h5 class="mt-3">Investment Skills</h5><p>Analyze markets and make profitable decisions.</p></div>
      <div class="col-md-4"><i class="bi bi-bank display-5"></i><h5 class="mt-3">Career Opportunities</h5><p>Open doors in banking, consulting, and corporate finance.</p></div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="py-5 text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-3">Become a Financial Leader</h2>
    <p class="lead mb-4">Enroll today and master the art of financial decision-making.</p>
    <a href="/Admissions/General/admissions/admissions.php?course=finance" class="btn btn-lg btn-success px-5 shadow">Enroll Now</a>
  </div>
</section>

<?php include(__DIR__ . '/..\..\..\includes\footer\footer.php'); ?>
