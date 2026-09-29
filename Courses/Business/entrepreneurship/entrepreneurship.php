<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- ENTREPRENEURSHIP.PHP -->

<section class="bg-info text-white py-5" style="background: linear-gradient(135deg, #1d4350 0%, #a43931 100%);" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-primary mb-3 shadow-sm">Business Studies</div>
        <h1 class="display-4 fw-bold mb-3">Entrepreneurship</h1>
        <p class="lead mb-4">Turn your ideas into successful ventures by learning startup strategies, innovation, and business planning.</p>
        <a href="/Admissions/General/admissions/admissions.php?course=entrepreneurship" class="btn btn-warning btn-lg px-4 text-dark shadow">Enroll Now - GH₵ 1800</a>
      </div>
      <div class="col-lg-6 text-center">
        <img src="/assets/project/e-commerce.jpeg" alt="Entrepreneurship" class="img-fluid rounded shadow-lg border border-3 border-light">
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light text-dark text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold">Course Overview</h2>
    <p class="lead">Develop entrepreneurial thinking, explore business models, and gain hands-on skills in starting and managing ventures.</p>
  </div>
</section>

<section id="curriculum" class="py-5" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold text-center mb-5">Curriculum Highlights</h2>
    <div class="row g-4">
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 1: Entrepreneurial Mindset</h5><p>Learn resilience, creativity, and risk-taking skills.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 2: Business Models</h5><p>Design innovative and sustainable business plans.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 3: Marketing & Sales</h5><p>Develop strategies to reach customers and grow markets.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 4: Startup Funding</h5><p>Understand financing options from investors to crowdfunding.</p></div></div></div>
    </div>
  </div>
</section>

<section class="py-5 bg-success text-white text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-4">Why Choose Entrepreneurship?</h2>
    <div class="row g-4">
      <div class="col-md-4"><i class="bi bi-lightbulb-fill display-5"></i><h5>Innovation</h5><p>Turn ideas into profitable ventures.</p></div>
      <div class="col-md-4"><i class="bi bi-rocket-takeoff-fill display-5"></i><h5>Growth</h5><p>Learn how to scale startups effectively.</p></div>
      <div class="col-md-4"><i class="bi bi-building-fill display-5"></i><h5>Independence</h5><p>Build your own path as a business owner.</p></div>
    </div>
  </div>
</section>

<section class="py-5 text-center" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-3">Start Your Entrepreneurial Journey</h2>
    <p class="lead mb-4">Enroll today and bring your ideas to life.</p>
    <a href="/Admissions/General/admissions/admissions.php?course=entrepreneurship" class="btn btn-lg btn-success px-5 shadow">Enroll Now</a>
  </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
