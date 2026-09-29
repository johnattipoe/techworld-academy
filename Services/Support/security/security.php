<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>


<!-- SECURITY.PHP -->

<!-- Page Hero Section -->
<section class="bg-danger text-white py-5" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 mx-auto text-center">
        <h1 class="display-4 fw-bold mb-3">Security</h1>
        <p class="lead mb-4">Protect your devices and data from cyber threats with our security services.</p>
      </div>
    </div>
  </div>
</section>

<!-- Services Section -->
<section class="py-5 bg-light" id="services" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-4">Our Services</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Firewall Installation</h5>
            <p class="card-text">Secure your network from unauthorized access with our expert firewall installation services.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Vulnerability Scanning</h5>
            <p class="card-text">Identify and address security vulnerabilities in your systems with our expert vulnerability scanning services.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">Penetration Testing</h5>
            <p class="card-text">Test your systems for vulnerabilities and weaknesses with our expert penetration testing services.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white" data-aos="fade-up">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-3">Protect Your Business from Cyber Threats</h2>
          <p class="lead mb-0">Get a free security assessment and discover how our security services can help your business stay secure.</p>
        </div>
        <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
          <a href="/contact/contact.php?service=security" class="btn btn-light btn-lg px-5">Get Free Assessment</a>
        </div>
      </div>
    </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
