<?php 
session_start();
include(__DIR__ . '/..\..\..\includes\lang\lang.php');
include(__DIR__ . '/..\..\..\includes\header\header.php');
include(__DIR__ . '/..\..\..\includes\navbar\navbar.php'); 
include(__DIR__ . '/..\..\..\includes\sidebar\sidebar.php');
?>

<!-- DIGITAL MARKETING.PHP -->

<!-- Course Hero Section -->
<section class="bg-danger text-white py-5" style="background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-dark mb-3">Digital Skills</div>
        <h1 class="display-4 fw-bold mb-3">Digital Marketing</h1>
        <p class="lead mb-4">Learn SEO, social media, email, and content marketing to build powerful online brands and campaigns.</p>
        <a href="/Admissions/General/admissions/admissions.php?course=digital-marketing" class="btn btn-light btn-lg px-4 text-dark shadow">Enroll Now - GH₵ 2000</a>
      </div>
      <div class="col-lg-6 text-center">
        <img src="/assets/blog/career tip.jpeg" alt="Digital Marketing" class="img-fluid rounded shadow-lg border border-3 border-light">
      </div>
    </div>
  </div>
</section>

<!-- Course Overview Section -->
<section class="py-5 bg-light text-dark text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
  <div class="container">
    <h2 class="fw-bold">Course Overview</h2>
    <p class="lead">Master online marketing strategies to reach global audiences, increase engagement, and drive sales.</p>
  </div>
</section>

<!-- Curriculum Highlights Section -->
<section id="curriculum" class="py-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
  <div class="container">
    <h2 class="fw-bold text-center mb-5">Curriculum Highlights</h2>
    <div class="row g-4">
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 1: SEO & Content</h5><p>Boost website visibility with keyword optimization and blog strategies.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 2: Social Media</h5><p>Run campaigns on Facebook, Instagram, LinkedIn, and TikTok.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 3: Email Marketing</h5><p>Create automated campaigns with strong conversions.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 4: Analytics</h5><p>Use Google Analytics to measure performance and ROI.</p></div></div></div>
    </div>
  </div>
</section>

<!-- Why Study Digital Marketing? Section -->
<section class="py-5 bg-dark text-white text-center" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
  <div class="container">
    <h2 class="fw-bold mb-4">Why Learn Digital Marketing?</h2>
    <div class="row g-4">
      <div class="col-md-4"><i class="bi bi-graph-up-arrow display-5"></i><h5>Boost Businesses</h5><p>Help brands grow with digital tools.</p></div>
      <div class="col-md-4"><i class="bi bi-globe-americas display-5"></i><h5>Global Reach</h5><p>Connect with international audiences.</p></div>
      <div class="col-md-4"><i class="bi bi-currency-exchange display-5"></i><h5>High Demand</h5><p>Digital marketers are in demand everywhere.</p></div>
    </div>
  </div>
</section>

<!-- Enroll Now Section -->
<section class="py-5 text-center" style="background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%);" data-aos="fade-up">
  <div class="container">
    <h2 class="fw-bold mb-3">Grow Your Digital Career</h2>
    <a href="/Admissions/General/admissions/admissions.php?course=digital-marketing" class="btn btn-lg btn-danger px-5 shadow">Enroll Now</a>
  </div>
</section>

<?php
include(__DIR__ . '/..\..\..\Modals\modals\modals.php'); 
include(__DIR__ . '/..\..\..\includes\footer\footer.php');
 ?>
