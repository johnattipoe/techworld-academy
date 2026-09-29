<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- DIGITAL LITERACY.PHP -->

<!-- Course Hero Section -->
<section class="bg-primary text-white py-5" style="background: linear-gradient(135deg, #0072ff 0%, #00c6ff 100%);" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-dark mb-3">Digital Skills</div>
        <h1 class="display-4 fw-bold mb-3">Digital Literacy</h1>
        <p class="lead mb-4">Gain essential computer and internet skills to thrive in today’s digital-first world.</p>
        <a href="/Admissions/General/admissions/admissions.php?course=digital-literacy" class="btn btn-warning btn-lg px-4 text-dark shadow">Enroll Now - GH₵ 900</a>
      </div>
      <div class="col-lg-6 text-center">
        <img src="/assets/images/user.png" alt="Digital Literacy" class="img-fluid rounded shadow-lg border border-3 border-light">
      </div>
    </div>
  </div>
</section>

<!-- Course Overview Section -->
<section class="py-5 bg-light text-dark text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold">Course Overview</h2>
    <p class="lead">Learn how to use computers, the internet, email, and productivity tools to confidently navigate the digital world.</p>
  </div>
</section>

<!-- Curriculum Highlights Section -->
<section id="curriculum" class="py-5" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold text-center mb-5">Curriculum Highlights</h2>
    <div class="row g-4">
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 1: Basic Computer Skills</h5><p>Introduction to hardware, software, and operating systems.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 2: Internet & Email</h5><p>How to browse safely, search effectively, and use email professionally.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 3: Office Tools</h5><p>Learn Word, Excel, and PowerPoint for productivity.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 4: Online Safety</h5><p>Protect yourself from scams, viruses, and data theft.</p></div></div></div>
    </div>
  </div>
</section>

<!-- Why Choose Digital Literacy Section -->
<section class="py-5 bg-primary text-white text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-4">Why Choose Digital Literacy?</h2>
    <div class="row g-4">
      <div class="col-md-4"><i class="bi bi-laptop display-5"></i><h5>Essential Skills</h5><p>Use digital tools for work and study.</p></div>
      <div class="col-md-4"><i class="bi bi-globe display-5"></i><h5>Stay Connected</h5><p>Communicate and collaborate online.</p></div>
      <div class="col-md-4"><i class="bi bi-shield-check display-5"></i><h5>Stay Safe</h5><p>Protect your privacy and identity online.</p></div>
    </div>
  </div>
</section>

<!-- Enroll Now Section -->
<section class="py-5 text-center" style="background: linear-gradient(135deg, #0072ff 0%, #00c6ff 100%);" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-3">Start Your Digital Journey</h2>
    <a href="/Admissions/General/admissions/admissions.php?course=digital-literacy" class="btn btn-lg btn-success px-5 shadow">Enroll Now</a>
  </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
