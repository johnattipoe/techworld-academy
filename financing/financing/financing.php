<?php
session_start();
include(__DIR__ . '/..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\includes\header\header.php');
include(__DIR__ . '/..\..\includes\navbar\navbar.php');
include(__DIR__ . '/..\..\includes\sidebar\sidebar.php');
?>

<div class="container mt-5 mb-5">

  <!-- Header Section -->
  <div class="text-center mb-5">
    <h1 class="fw-bold text-primary">Flexible Payment Options</h1>
    <p class="lead text-muted">Making quality education accessible to everyone</p>
    <hr class="mx-auto" style="width: 120px; border: 2px solid #0d6efd;">
  </div>

  <!-- Financing Overview -->
  <div class="row align-items-center mb-5">
    <div class="col-lg-6" data-aos="fade-right">
      <img src="assets/images/financing.jpg" class="img-fluid rounded shadow" alt="Flexible Payment Options">
    </div>
    <div class="col-lg-6" data-aos="fade-left">
      <h3 class="fw-bold mb-3">Empowering Students Through Flexibility</h3>
      <p>
        At <strong>TecWorld Academy</strong>, we believe that financial constraints should never be a barrier
        to quality education. Our financing options are designed to help students pursue their dreams without
        worrying about upfront costs.
      </p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Pay tuition in installments</li>
        <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Access early-bird and scholarship discounts</li>
        <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>Corporate sponsorship and student loans available</li>
        <li class="list-group-item"><i class="bi bi-check-circle-fill text-success me-2"></i>No-interest plans for select programs</li>
      </ul>
    </div>
  </div>

  <!-- Payment Plan Cards -->
  <div class="text-center mb-4">
    <h2 class="fw-bold">Choose a Payment Plan That Fits You</h2>
    <p class="text-muted">We offer several flexible options to make learning affordable for everyone.</p>
  </div>

  <div class="row g-4">
    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body text-center">
          <i class="bi bi-calendar2-week display-4 text-primary mb-3"></i>
          <h5 class="fw-bold">Monthly Installments</h5>
          <p>Spread your tuition over the duration of your program with easy monthly payments.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body text-center">
          <i class="bi bi-cash-stack display-4 text-success mb-3"></i>
          <h5 class="fw-bold">Pay-as-You-Go</h5>
          <p>Pay for each module or course individually, ideal for part-time learners or short programs.</p>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card border-0 shadow-sm h-100">
        <div class="card-body text-center">
          <i class="bi bi-gift display-4 text-warning mb-3"></i>
          <h5 class="fw-bold">Scholarships & Aid</h5>
          <p>Qualify for merit-based scholarships or financial aid programs to reduce tuition costs.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Call to Action -->
  <div class="alert alert-primary mt-5 text-center" role="alert">
    <h5 class="fw-bold mb-2"><i class="bi bi-info-circle me-2"></i>Need Help Choosing a Plan?</h5>
    <p class="mb-3">Our admissions and finance advisors are ready to assist you in finding the best payment option.</p>
    <a href="/contact/contact.php" class="btn btn-primary"><i class="bi bi-envelope me-1"></i> Contact Admissions</a>
  </div>

</div>

<?php
include(__DIR__ . '/..\..\Modals\modals\modals.php');
include(__DIR__ . '/..\..\includes\footer\footer.php');
?>
