<?php 
session_start();
include(__DIR__ . '/../../../includes/lang/lang.php');
include(__DIR__ . '/../../../includes/header/header.php');
include(__DIR__ . '/../../../includes/navbar/navbar.php'); 
include(__DIR__ . '/../../../includes/sidebar/sidebar.php');
?>

<!-- GRAPHIC DESIGN.PHP -->

<!-- Course Hero Section -->
<section class="bg-primary text-dark py-5" style="background: linear-gradient(135deg, #e65c00 0%, #f9d423 100%);" data-aos="fade-down">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="badge bg-light text-dark mb-3">Digital Skills</div>
        <h1 class="display-4 fw-bold mb-3">Graphic Design</h1>
        <p class="lead mb-4">Unleash your creativity with professional design tools to create stunning visuals and digital artwork.</p>
        <a href="/Admissions/General/admissions/admissions.php?course=graphic-design" class="btn btn-dark btn-lg px-4 shadow">Enroll Now - GH₵ 1600</a>
      </div>
      <div class="col-lg-6 text-center">
        <img src="/assets/project/fitness tracker.jpeg" alt="Graphic Design" class="img-fluid rounded shadow-lg border border-3 border-dark">
      </div>
    </div>
  </div>
</section>

<!-- Course Overview Section -->
<section class="py-5 bg-light text-dark text-center">
  <div class="container">
    <h2 class="fw-bold">Course Overview</h2>
    <p class="lead">Master Adobe Photoshop, Illustrator, and Canva while learning design principles for branding, advertising, and creative projects.</p>
  </div>
</section>

<!-- Curriculum Highlights Section -->
<section id="curriculum" class="py-5">
  <div class="container">
    <h2 class="fw-bold text-center mb-5">Curriculum Highlights</h2>
    <div class="row g-4">
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 1: Design Principles</h5><p>Understand color theory, typography, and layout.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 2: Photoshop & Illustrator</h5><p>Create and edit professional digital artwork.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 3: Branding & Logos</h5><p>Design logos and identity systems for businesses.</p></div></div></div>
      <div class="col-md-6"><div class="card shadow-sm"><div class="card-body"><h5>Module 4: Digital Projects</h5><p>Work on flyers, posters, and web graphics.</p></div></div></div>
    </div>
  </div>
</section>

<!-- Why Study Graphic Design? Section -->
<section class="py-5 bg-dark text-white text-center">
  <div class="container">
    <h2 class="fw-bold mb-4">Why Study Graphic Design?</h2>
    <div class="row g-4">
      <div class="col-md-4"><i class="bi bi-palette-fill display-5"></i><h5>Creativity</h5><p>Express yourself with powerful tools.</p></div>
      <div class="col-md-4"><i class="bi bi-briefcase-fill display-5"></i><h5>Career</h5><p>Work as a freelancer or in creative agencies.</p></div>
      <div class="col-md-4"><i class="bi bi-layers-fill display-5"></i><h5>Portfolio</h5><p>Build a strong portfolio of digital projects.</p></div>
    </div>
  </div>
</section>

<!-- Enroll Now Section -->
<section class="py-5 text-center">
  <div class="container">
    <h2 class="fw-bold mb-3">Unleash Your Creativity</h2>
    <a href="/Admissions/General/admissions/admissions.php?course=graphic-design" class="btn btn-lg btn-warning px-5 shadow">Enroll Now</a>
  </div>
</section>

<?php
include(__DIR__ . '/../../../Modals/modals/modals.php'); 
include(__DIR__ . '/../../../includes/footer/footer.php'); 
?>
