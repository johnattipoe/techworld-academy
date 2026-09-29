<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>


<!-- STUDENT SUPPORT PAGE -->

<!-- Hero Section -->
<section class="py-5 text-white" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
  <div class="container text-center">
    <h1 class="display-4 fw-bold mb-3">Student Support Services</h1>
    <p class="lead mb-4">Comprehensive support to ensure your success throughout your academic journey</p>
    <p class="mb-0">We're committed to your wellbeing, growth, and achievement</p>
  </div>
</section>

<!-- Overview Section -->
<section class="py-5 bg-light" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 mx-auto text-center">
        <h2 class="fw-bold mb-3">What We Offer</h2>
        <p class="lead mb-4">Our student support services are designed to help you succeed in your academic journey and beyond.</p>
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>Academic Support</span>
            <span class="badge bg-primary rounded-pill">GH₵ 500</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>Career Guidance</span>
            <span class="badge bg-primary rounded-pill">Free</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>Mental Health Support</span>
            <span class="badge bg-primary rounded-pill">GH₵ 1000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>Financial Aid</span>
            <span class="badge bg-primary rounded-pill">GH₵ 2000</span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-success text-white" data-aos="fade-up">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8">
        <h2 class="fw-bold mb-3">Ready to Get Support?</h2>
        <p class="lead mb-0">Don't hesitate to reach out. Our support team is ready to assist you.</p>
      </div>
      <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
        <a href="/contact/contact.php" class="btn btn-light btn-lg px-5">Contact Support</a>
      </div>
    </div>
  </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php');
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
